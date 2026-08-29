<?php

namespace App\Controllers;

use App\Models\SettingModel;

class Robots extends BaseController
{
    public function index()
    {
        $settingModel = new SettingModel();
        $setting = $settingModel->where('setting_key', 'seo_robots_txt')->first();
        
        $robotsContent = "User-agent: *\nDisallow: /admin/\nDisallow: /private/\n\nSitemap: " . site_url('sitemap.xml');
        
        if ($setting && !empty($setting['setting_value'])) {
            $robotsContent = $setting['setting_value'];
        }

        return $this->response->setContentType('text/plain')->setBody($robotsContent);
    }
}

