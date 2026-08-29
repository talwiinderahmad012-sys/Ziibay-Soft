<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\SettingModel;

class Settings extends BaseController
{
    public function index()
    {
        $settingModel = new SettingModel();
        
        $settingsRaw = $settingModel->whereIn('setting_key', [
            'whatsapp_enabled',
            'whatsapp_number',
            'whatsapp_message'
        ])->findAll();

        $settings = [];
        foreach ($settingsRaw as $s) {
            $settings[$s['setting_key']] = $s['setting_value'];
        }

        $data = [
            'title'     => 'General Settings',
            'settings'  => $settings,
        ];

        return view('admin/settings/index', $data);
    }

    public function update()
    {
        $settingModel = new SettingModel();
        
        $fields = [
            'whatsapp_enabled',
            'whatsapp_number',
            'whatsapp_message'
        ];

        foreach ($fields as $field) {
            $val = $this->request->getPost($field);
            // Check if exists
            $existing = $settingModel->where('setting_key', $field)->first();
            if ($existing) {
                $settingModel->update($existing['id'], ['setting_value' => $val]);
            } else {
                $settingModel->insert([
                    'setting_key' => $field,
                    'setting_value' => $val,
                    'setting_group' => 'general'
                ]);
            }
        }

        return redirect()->back()->with('success', 'Settings updated successfully.');
    }
}
