<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>
<div class="px-6 py-8">
    <div class="flex items-center gap-3 mb-8">
        <a href="<?= base_url('admin/faqs') ?>" class="text-text-muted hover:text-brand-primary transition-colors">
            <i class="fa-solid fa-arrow-left"></i>
        </a>
        <h1 class="text-3xl font-bold text-text">Create FAQ</h1>
    </div>

    <?php if (session()->getFlashdata('errors')): ?>
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-8 rounded shadow-sm">
            <p class="font-bold">Please fix the following errors:</p>
            <ul class="list-disc ml-5 mt-2">
                <?php foreach (session()->getFlashdata('errors') as $error): ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?= base_url('admin/faqs') ?>" method="POST" class="grid grid-cols-1 xl:grid-cols-3 gap-8">
        <?= csrf_field() ?>
        
        <!-- Left Column: Main Content -->
        <div class="xl:col-span-2 space-y-6">
            <div class="bg-surface rounded-2xl border border-border shadow-sm p-6 space-y-6">
                <div>
                    <label for="question" class="block text-sm font-bold text-text mb-2">Question <span class="text-red-500">*</span></label>
                    <input type="text" id="question" name="question" value="<?= old('question') ?>" required class="w-full px-4 py-3 bg-surface-secondary border border-border rounded-xl text-text focus:outline-none focus:ring-2 focus:ring-brand-primary" placeholder="e.g. What services do you offer?">
                </div>
                
                <div>
                    <label for="answer" class="block text-sm font-bold text-text mb-2">Answer <span class="text-red-500">*</span></label>
                    <p class="text-xs text-text-muted mb-2">You can use basic HTML like &lt;br&gt;, &lt;strong&gt;, or &lt;a href="..."&gt;</p>
                    <textarea id="answer" name="answer" rows="6" required class="w-full px-4 py-3 bg-surface-secondary border border-border rounded-xl text-text focus:outline-none focus:ring-2 focus:ring-brand-primary"><?= esc(old('answer')) ?></textarea>
                </div>
            </div>
        </div>
        
        <!-- Right Column: Settings & Relationships -->
        <div class="space-y-6">
            <div class="bg-surface rounded-2xl border border-border shadow-sm p-6 space-y-6">
                <h3 class="font-bold text-text border-b border-border pb-3">Settings</h3>
                
                <div>
                    <label for="status" class="block text-sm font-bold text-text mb-2">Status</label>
                    <select id="status" name="status" class="w-full px-4 py-2 bg-surface-secondary border border-border rounded-lg text-text focus:outline-none focus:ring-2 focus:ring-brand-primary">
                        <option value="active" <?= old('status') === 'active' ? 'selected' : '' ?>>Active</option>
                        <option value="inactive" <?= old('status') === 'inactive' ? 'selected' : '' ?>>Inactive</option>
                    </select>
                </div>
                
                <div>
                    <label for="sort_order" class="block text-sm font-bold text-text mb-2">Sort Order</label>
                    <input type="number" id="sort_order" name="sort_order" value="<?= old('sort_order', 0) ?>" class="w-full px-4 py-2 bg-surface-secondary border border-border rounded-lg text-text focus:outline-none focus:ring-2 focus:ring-brand-primary">
                    <p class="text-xs text-text-muted mt-1">Lower numbers appear first.</p>
                </div>
            </div>

            <!-- Relationships -->
            <div class="bg-surface rounded-2xl border border-border shadow-sm p-6 space-y-6">
                <h3 class="font-bold text-text border-b border-border pb-3">Contextual Display (Optional)</h3>
                <p class="text-xs text-text-muted mb-4">Select where this FAQ should appear. If nothing is selected, it can only be shown on a global FAQ page.</p>

                <!-- Services -->
                <?php if (!empty($services)): ?>
                <div>
                    <label class="block text-sm font-bold text-text mb-2">Services</label>
                    <div class="max-h-40 overflow-y-auto bg-surface-secondary border border-border rounded-lg p-3 space-y-2">
                        <?php foreach ($services as $srv): ?>
                            <label class="flex items-center">
                                <input type="checkbox" name="services[]" value="<?= $srv['id'] ?>" class="rounded border-border text-brand-primary focus:ring-brand-primary" <?= is_array(old('services')) && in_array($srv['id'], old('services')) ? 'checked' : '' ?>>
                                <span class="ml-2 text-sm text-text"><?= esc($srv['name']) ?></span>
                            </label>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php endif; ?>

                <!-- Industries -->
                <?php if (!empty($industries)): ?>
                <div>
                    <label class="block text-sm font-bold text-text mb-2">Industries</label>
                    <div class="max-h-40 overflow-y-auto bg-surface-secondary border border-border rounded-lg p-3 space-y-2">
                        <?php foreach ($industries as $ind): ?>
                            <label class="flex items-center">
                                <input type="checkbox" name="industries[]" value="<?= $ind['id'] ?>" class="rounded border-border text-brand-primary focus:ring-brand-primary" <?= is_array(old('industries')) && in_array($ind['id'], old('industries')) ? 'checked' : '' ?>>
                                <span class="ml-2 text-sm text-text"><?= esc($ind['name']) ?></span>
                            </label>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php endif; ?>

            </div>
            
            <button type="submit" class="w-full py-3 bg-brand-primary text-white font-bold rounded-xl hover:bg-brand-secondary transition-colors shadow-lg">
                Create FAQ
            </button>
        </div>
    </form>
</div>
<?= $this->endSection() ?>
