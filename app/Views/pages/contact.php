<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?><?= esc($title) ?><?= $this->endSection() ?>
<?= $this->section('meta_description') ?><?= esc($meta_description) ?><?= $this->endSection() ?>
<?= $this->section('canonical') ?><?= esc($canonical_url) ?><?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- Hero Section -->
<section class="pt-32 pb-16 bg-surface transition-colors duration-300 relative overflow-hidden">
    <div class="absolute top-0 right-0 w-1/2 h-1/2 bg-brand-primary/10 blur-[100px] rounded-full pointer-events-none"></div>
    <div class="container mx-auto px-4 relative z-10 text-center max-w-4xl">
        <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-text mb-6">Let's Build Something <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-primary to-brand-secondary">That Matters</span>.</h1>
        <p class="text-xl text-text-muted">
            Tell us what you're planning and our team will get back to you with the technical foundation you need.
        </p>
    </div>
</section>

<!-- Contact Form & Info -->
<section class="py-12 bg-surface transition-colors duration-300">
    <div class="container mx-auto px-4 max-w-6xl">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            
            <!-- Contact Info -->
            <div class="lg:col-span-1 space-y-8">
                <div class="bg-surface-secondary p-8 rounded-3xl border border-border">
                    <h3 class="text-2xl font-bold text-text mb-6">Get in Touch</h3>
                    
                    <div class="space-y-6">
                        <div class="flex items-start">
                            <div class="w-10 h-10 rounded-full bg-brand-primary/10 text-brand-primary flex items-center justify-center shrink-0 mt-1">
                                <i class="fa-solid fa-envelope"></i>
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-bold text-text-muted uppercase tracking-wider mb-1">Email Us</div>
                                <a href="mailto:<?= esc(config('App')->adminEmail ?? 'hello@ziibaysoft.com') ?>" class="text-text hover:text-brand-primary font-medium transition-colors">
                                    <?= esc(config('App')->adminEmail ?? 'hello@ziibaysoft.com') ?>
                                </a>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="w-10 h-10 rounded-full bg-brand-primary/10 text-brand-primary flex items-center justify-center shrink-0 mt-1">
                                <i class="fa-solid fa-phone"></i>
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-bold text-text-muted uppercase tracking-wider mb-1">Call Us</div>
                                <a href="tel:<?= esc(config('App')->businessPhone ?? '+1234567890') ?>" class="text-text hover:text-brand-primary font-medium transition-colors">
                                    <?= esc(config('App')->businessPhone ?? '+1 (234) 567-890') ?>
                                </a>
                            </div>
                        </div>
                    </div>

                    <hr class="border-border my-8">

                    <h4 class="text-lg font-bold text-text mb-4">Direct Messaging</h4>
                    <a href="https://wa.me/<?= esc(config('App')->whatsappNumber ?? '1234567890') ?>?text=<?= urlencode("Hello Ziibay Soft, I would like to discuss a project.") ?>" target="_blank" rel="noopener noreferrer" class="flex items-center justify-center w-full py-4 bg-[#25D366] text-white rounded-xl font-bold hover:bg-[#1DA851] transition-colors shadow-lg">
                        <i class="fa-brands fa-whatsapp text-xl mr-2"></i> Chat on WhatsApp
                    </a>
                </div>
            </div>

            <!-- Form -->
            <div class="lg:col-span-2">
                <div class="bg-surface p-8 lg:p-12 rounded-3xl border border-border shadow-xl">
                    
                    <?php if (session()->getFlashdata('success')): ?>
                        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-6 mb-8 rounded" role="alert">
                            <p class="font-bold">Success</p>
                            <p><?= esc(session()->getFlashdata('success')) ?></p>
                        </div>
                    <?php endif; ?>

                    <?php if (session()->getFlashdata('error')): ?>
                        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-6 mb-8 rounded" role="alert">
                            <p class="font-bold">Error</p>
                            <p><?= esc(session()->getFlashdata('error')) ?></p>
                        </div>
                    <?php endif; ?>

                    <?php if (session()->getFlashdata('errors')): ?>
                        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-6 mb-8 rounded" role="alert">
                            <p class="font-bold">Please fix the following errors:</p>
                            <ul class="list-disc ml-5 mt-2">
                                <?php foreach (session()->getFlashdata('errors') as $error): ?>
                                    <li><?= esc($error) ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <form action="<?= base_url('contact') ?>" method="POST" class="space-y-6">
                        <?= csrf_field() ?>
                        <input type="hidden" name="source" value="Contact Page">
                        <!-- Honeypot -->
                        <div style="display:none;" aria-hidden="true">
                            <label for="website_url_hp">Leave this field empty</label>
                            <input type="text" name="website_url_hp" id="website_url_hp" tabindex="-1" autocomplete="off">
                        </div>

                        <!-- Personal Info -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block text-sm font-bold text-text mb-2">Full Name <span class="text-red-500">*</span></label>
                                <input type="text" id="name" name="name" value="<?= old('name') ?>" required class="w-full px-4 py-3 bg-surface-secondary border border-border rounded-xl text-text focus:outline-none focus:ring-2 focus:ring-brand-primary focus:border-transparent transition-colors" placeholder="John Doe">
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-bold text-text mb-2">Email Address <span class="text-red-500">*</span></label>
                                <input type="email" id="email" name="email" value="<?= old('email') ?>" required class="w-full px-4 py-3 bg-surface-secondary border border-border rounded-xl text-text focus:outline-none focus:ring-2 focus:ring-brand-primary focus:border-transparent transition-colors" placeholder="john@company.com">
                            </div>
                            <div>
                                <label for="phone" class="block text-sm font-bold text-text mb-2">Phone / WhatsApp</label>
                                <input type="tel" id="phone" name="phone" value="<?= old('phone') ?>" class="w-full px-4 py-3 bg-surface-secondary border border-border rounded-xl text-text focus:outline-none focus:ring-2 focus:ring-brand-primary focus:border-transparent transition-colors" placeholder="+1 (555) 000-0000">
                            </div>
                            <div>
                                <label for="company" class="block text-sm font-bold text-text mb-2">Company Name</label>
                                <input type="text" id="company" name="company" value="<?= old('company') ?>" class="w-full px-4 py-3 bg-surface-secondary border border-border rounded-xl text-text focus:outline-none focus:ring-2 focus:ring-brand-primary focus:border-transparent transition-colors" placeholder="Optional">
                            </div>
                        </div>

                        <!-- Services Checkboxes -->
                        <div class="pt-4 border-t border-border">
                            <label class="block text-sm font-bold text-text mb-4">Services Required</label>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <?php foreach ($services as $srv): ?>
                                    <label class="flex items-center p-4 border border-border rounded-xl cursor-pointer hover:border-brand-primary bg-surface-secondary transition-colors">
                                        <input type="checkbox" name="services[]" value="<?= esc($srv['id']) ?>" 
                                            class="w-5 h-5 text-brand-primary bg-surface border-border rounded focus:ring-brand-primary"
                                            <?= ($preselected_service === $srv['slug']) ? 'checked' : '' ?>
                                            <?= is_array(old('services')) && in_array($srv['id'], old('services')) ? 'checked' : '' ?>>
                                        <span class="ml-3 text-text font-medium"><?= esc($srv['name']) ?></span>
                                    </label>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <!-- Project Details -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-4 border-t border-border">
                            <div>
                                <label for="budget" class="block text-sm font-bold text-text mb-2">Budget Range</label>
                                <select id="budget" name="budget" class="w-full px-4 py-3 bg-surface-secondary border border-border rounded-xl text-text focus:outline-none focus:ring-2 focus:ring-brand-primary focus:border-transparent transition-colors appearance-none">
                                    <option value="" disabled selected>Select budget...</option>
                                    <option value="Not sure yet" <?= old('budget') == 'Not sure yet' ? 'selected' : '' ?>>Not sure yet</option>
                                    <option value="Under $1,000" <?= old('budget') == 'Under $1,000' ? 'selected' : '' ?>>Under $1,000</option>
                                    <option value="$1,000–$5,000" <?= old('budget') == '$1,000–$5,000' ? 'selected' : '' ?>>$1,000–$5,000</option>
                                    <option value="$5,000–$10,000" <?= old('budget') == '$5,000–$10,000' ? 'selected' : '' ?>>$5,000–$10,000</option>
                                    <option value="$10,000+" <?= old('budget') == '$10,000+' ? 'selected' : '' ?>>$10,000+</option>
                                </select>
                            </div>
                            <div>
                                <label for="timeline" class="block text-sm font-bold text-text mb-2">Timeline</label>
                                <select id="timeline" name="timeline" class="w-full px-4 py-3 bg-surface-secondary border border-border rounded-xl text-text focus:outline-none focus:ring-2 focus:ring-brand-primary focus:border-transparent transition-colors appearance-none">
                                    <option value="" disabled selected>Select timeline...</option>
                                    <option value="ASAP" <?= old('timeline') == 'ASAP' ? 'selected' : '' ?>>ASAP</option>
                                    <option value="1–2 Months" <?= old('timeline') == '1–2 Months' ? 'selected' : '' ?>>1–2 Months</option>
                                    <option value="3–6 Months" <?= old('timeline') == '3–6 Months' ? 'selected' : '' ?>>3–6 Months</option>
                                    <option value="6+ Months" <?= old('timeline') == '6+ Months' ? 'selected' : '' ?>>6+ Months</option>
                                    <option value="Not Sure" <?= old('timeline') == 'Not Sure' ? 'selected' : '' ?>>Not Sure</option>
                                </select>
                            </div>
                            <div class="md:col-span-2">
                                <label for="country" class="block text-sm font-bold text-text mb-2">Country</label>
                                <input type="text" id="country" name="country" value="<?= old('country') ?>" class="w-full px-4 py-3 bg-surface-secondary border border-border rounded-xl text-text focus:outline-none focus:ring-2 focus:ring-brand-primary focus:border-transparent transition-colors" placeholder="e.g. United States">
                            </div>
                        </div>

                        <!-- Message -->
                        <div class="pt-4 border-t border-border">
                            <label for="message" class="block text-sm font-bold text-text mb-2">Project Details & Requirements <span class="text-red-500">*</span></label>
                            <textarea id="message" name="message" rows="5" required class="w-full px-4 py-3 bg-surface-secondary border border-border rounded-xl text-text focus:outline-none focus:ring-2 focus:ring-brand-primary focus:border-transparent transition-colors resize-none" placeholder="Tell us about your project, goals, and any specific technical requirements..."><?= esc(old('message')) ?></textarea>
                        </div>

                        <!-- Submit -->
                        <div class="pt-6">
                            <p class="text-xs text-text-muted mb-6">
                                By submitting this form, you agree that Ziibay Soft may use your information to respond to your inquiry in accordance with our <a href="<?= base_url('privacy') ?>" class="text-brand-primary hover:underline">Privacy Policy</a>.
                            </p>
                            <button type="submit" class="w-full py-4 bg-brand-primary text-white font-bold rounded-xl hover:bg-brand-secondary transition-colors shadow-lg">
                                Send Inquiry
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>
