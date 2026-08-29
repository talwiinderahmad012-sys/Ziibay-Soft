<?= $this->extend('admin/layouts/main') ?>
<?= $this->section('content') ?>
<div class="container-fluid px-4 py-5">
    <h1 class="h3 mb-4 text-gray-800">General Settings</h1>

    <?php if(session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">WhatsApp Configuration</h6>
        </div>
        <div class="card-body">
            <form action="<?= site_url('admin/settings/update') ?>" method="post">
                <?= csrf_field() ?>
                
                <div class="mb-3">
                    <label class="form-label">Enable WhatsApp Floating Button</label>
                    <select name="whatsapp_enabled" class="form-select">
                        <option value="1" <?= (isset($settings['whatsapp_enabled']) && $settings['whatsapp_enabled'] == '1') ? 'selected' : '' ?>>Enabled</option>
                        <option value="0" <?= (isset($settings['whatsapp_enabled']) && $settings['whatsapp_enabled'] == '0') ? 'selected' : '' ?>>Disabled</option>
                    </select>
                    <small class="text-muted">If disabled, the WhatsApp CTA will not appear on the public site.</small>
                </div>

                <div class="mb-3">
                    <label class="form-label">WhatsApp Number</label>
                    <input type="text" name="whatsapp_number" class="form-control" value="<?= esc($settings['whatsapp_number'] ?? '') ?>" placeholder="e.g. 1234567890">
                    <small class="text-muted">Include country code without + or spaces (e.g. 14155552671).</small>
                </div>

                <div class="mb-3">
                    <label class="form-label">Default Message</label>
                    <textarea name="whatsapp_message" class="form-control" rows="2" placeholder="Hello Ziibay Soft..."><?= esc($settings['whatsapp_message'] ?? 'Hello Ziibay Soft, I would like to discuss a project.') ?></textarea>
                    <small class="text-muted">The pre-filled message when a user clicks the WhatsApp button.</small>
                </div>

                <button type="submit" class="btn btn-primary">Save Settings</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
