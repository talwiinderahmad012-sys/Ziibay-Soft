<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\SettingModel;
use App\Models\SchemaOverrideModel;

class SeoSettings extends BaseController
{
    public function index()
    {
        $settingModel = new SettingModel();

        $settingsRaw = $settingModel->whereIn('setting_key', [
            'schema_organization_name',
            'schema_organization_logo',
            'schema_organization_description',
            'schema_organization_email',
            'schema_organization_phone',
            'schema_social_profiles',
            'seo_robots_txt'
        ])->findAll();

        $settings = [];
        foreach ($settingsRaw as $s) {
            $settings[$s['setting_key']] = $s['setting_value'];
        }

        // Schema report
        $overrideModel = new SchemaOverrideModel();
        $overrides = $overrideModel->findAll();

        $data = [
            'title'     => 'SEO & Schema Settings',
            'settings'  => $settings,
            'overrides' => $overrides,
        ];

        return view('admin/seo_settings/index', $data);
    }

    public function update()
    {
        $settingModel = new SettingModel();

        $keys = [
            'schema_organization_name',
            'schema_organization_logo',
            'schema_organization_description',
            'schema_organization_email',
            'schema_organization_phone',
        ];

        foreach ($keys as $key) {
            $val = $this->request->getPost($key);
            $this->upsertSetting($settingModel, $key, $val);
        }

        // Handle JSON array of social profiles
        $socials = $this->request->getPost('schema_social_profiles');
        $socialJson = '[]';
        if ($socials) {
            // Assume it's a newline separated list from the textarea
            $lines = array_filter(array_map('trim', explode("\n", $socials)));
            $socialJson = json_encode(array_values($lines));
        }
        $this->upsertSetting($settingModel, 'schema_social_profiles', $socialJson);

        return redirect()->back()->with('success', 'SEO settings updated successfully.');
    }

    private function upsertSetting($model, $key, $value)
    {
        $existing = $model->where('setting_key', $key)->first();
        if ($existing) {
            $model->update($existing['id'], ['setting_value' => $value]);
        } else {
            $model->insert([
                'setting_key'   => $key,
                'setting_value' => $value,
                'type'          => 'string',
                'setting_group' => 'seo'
            ]);
        }
    }

    public function overrideSchema()
    {
        // For handling manual override submissions (typically via AJAX or a specific form)
        $overrideModel = new SchemaOverrideModel();
        
        $entityType = $this->request->getPost('entity_type');
        $entityId   = $this->request->getPost('entity_id');
        $isEnabled  = $this->request->getPost('is_enabled') ?? 1;
        $manualJson = $this->request->getPost('manual_json_ld');

        // Validation for JSON
        $warnings = '';
        if ($manualJson) {
            json_decode($manualJson);
            if (json_last_error() !== JSON_ERROR_NONE) {
                return redirect()->back()->with('error', 'Invalid JSON-LD format.');
            }
        }

        $existing = $overrideModel->where('entity_type', $entityType)->where('entity_id', $entityId)->first();
        if ($existing) {
            $overrideModel->update($existing['id'], [
                'is_enabled'     => $isEnabled,
                'manual_json_ld' => $manualJson,
                'warnings'       => $warnings,
            ]);
        } else {
            $overrideModel->insert([
                'entity_type'    => $entityType,
                'entity_id'      => $entityId,
                'is_enabled'     => $isEnabled,
                'manual_json_ld' => $manualJson,
                'warnings'       => $warnings,
            ]);
        }

        return redirect()->back()->with('success', 'Schema override saved.');
    }
}
