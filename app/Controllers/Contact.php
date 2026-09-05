<?php

namespace App\Controllers;

use App\Models\LeadModel;
use App\Models\LeadActivityLogModel;
use CodeIgniter\Exceptions\PageNotFoundException;
use Exception;

class Contact extends BaseController
{
    public function __construct()
    {
        helper(['form', 'url']);
    }

    public function index()
    {
        // Fetch published services from DB
        $db = \Config\Database::connect();
        $services = $db->table('services')->where('status', 'published')->get()->getResultArray();
        
        $data = [
            'title' => 'Contact Us | Ziibay Soft',
            'meta_description' => 'Get in touch with Ziibay Soft to discuss your web, software, or app development project.',
            'canonical_url' => base_url('contact'),
            'services' => $services,
            // Pre-fill context if coming from a specific page (e.g. ?service=web-development)
            'preselected_service' => $this->request->getGet('service') ?? ''
        ];
        
        return view('pages/contact', $data);
    }

    public function submit()
    {
        // Validate CSRF automatically handled if CSRF is enabled in Filters
        
        // 1. Basic validation rules
        $rules = [
            'name'    => 'required|min_length[2]|max_length[100]',
            'email'   => 'required|valid_email|max_length[255]',
            'phone'   => 'permit_empty|max_length[30]',
            'company' => 'permit_empty|max_length[100]',
            'country' => 'permit_empty|max_length[100]',
            'services' => 'permit_empty', // can be an array
            'service'  => 'permit_empty|max_length[100]',
            'project_type' => 'permit_empty|max_length[100]',
            'budget'  => 'permit_empty|max_length[50]',
            'timeline' => 'permit_empty|max_length[50]',
            'message' => 'required|min_length[10]|max_length[3000]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Honeypot check (hidden field)
        if (!empty($this->request->getPost('website_url_hp'))) {
            // Probably a bot, silently redirect
            return redirect()->to('contact')->with('success', 'Thank you. Your inquiry has been received. Our team will review it and get back to you.');
        }

        // Prepare data
        $leadData = [
            'name'       => strip_tags($this->request->getPost('name')),
            'email'      => strip_tags($this->request->getPost('email')),
            'phone'      => strip_tags($this->request->getPost('phone')),
            'company'    => strip_tags($this->request->getPost('company')),
            'country'    => strip_tags($this->request->getPost('country')),
            'project_type'=> strip_tags($this->request->getPost('service') ?: ($this->request->getPost('project_type') ?? '')),
            'budget'     => strip_tags($this->request->getPost('budget')),
            'timeline'   => strip_tags($this->request->getPost('timeline')),
            'message'    => strip_tags($this->request->getPost('message')),
            'status'     => 'New',
            'priority'   => 'Normal',
            'source_url' => substr($this->request->getServer('HTTP_REFERER') ?? '', 0, 255),
            'source_type'=> strip_tags($this->request->getPost('source') ?? 'Contact Page'),
            'landing_page'=> substr($this->request->getServer('REQUEST_URI') ?? '', 0, 255),
        ];

        try {
            $db = \Config\Database::connect();
            $db->transStart();

            $leadModel = new LeadModel();
            
            $leadId = $leadModel->insert($leadData, true);

            // Services Array processing
            $services = $this->request->getPost('services');
            if (is_array($services) && !empty($services)) {
                $leadServicesData = [];
                foreach ($services as $srvId) {
                    // Quick validation that it's an int
                    if (is_numeric($srvId)) {
                        $leadServicesData[] = [
                            'lead_id' => $leadId,
                            'service_id' => (int) $srvId
                        ];
                    }
                }
                if (!empty($leadServicesData)) {
                    $db->table('lead_services')->insertBatch($leadServicesData);
                }
            }

            // Log activity
            $activityModel = new LeadActivityLogModel();
            $activityModel->insert([
                'lead_id' => $leadId,
                'action' => 'Lead created',
                'details' => 'Lead submitted via ' . $leadData['source_type']
            ]);

            $db->transComplete();
            
            if ($db->transStatus() === false) {
                throw new Exception('Transaction failed.');
            }
            
            // Email Notification (Simulated)
            $this->sendNotificationEmail($leadData, clone $this->request);

            return redirect()->to('contact')->with('success', 'Thank you. Your inquiry has been received. Our team will review it and get back to you.');
            
        } catch (Exception $e) {
            log_message('error', '[Contact Form] DB Insert Failed: ' . $e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Something went wrong while sending your inquiry. Please try again or contact us directly.');
        }
    }

    private function sendNotificationEmail($leadData, $request)
    {
        // Use CodeIgniter's Email class if configured
        try {
            $email = \Config\Services::email();
            
            // We just attempt, catching failure so it doesn't break lead creation
            $email->setFrom('noreply@ziibaysoft.com', 'Ziibay Soft System');
            $email->setTo(config('App')->adminEmail ?? 'hello@ziibaysoft.com');
            $email->setSubject('New Lead Received: ' . $leadData['name']);
            
            $message = "A new lead was received.\n\n";
            $message .= "Name: {$leadData['name']}\n";
            $message .= "Email: {$leadData['email']}\n";
            $message .= "Company: {$leadData['company']}\n";
            $message .= "Budget: {$leadData['budget']}\n";
            $message .= "Message: \n{$leadData['message']}\n";
            
            $email->setMessage($message);
            @$email->send(); // Suppress errors if misconfigured locally
        } catch (\Exception $e) {
            log_message('error', 'Email notification failed: ' . $e->getMessage());
        }
    }
}
