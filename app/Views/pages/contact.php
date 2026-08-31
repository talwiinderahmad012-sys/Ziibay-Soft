<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?><?= esc($title) ?><?= $this->endSection() ?>
<?= $this->section('meta_description') ?><?= esc($meta_description) ?><?= $this->endSection() ?>
<?= $this->section('canonical') ?><?= esc($canonical_url) ?><?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- Hero Section -->
<section class="pt-24 pb-16 bg-surface/30 border-b border-border/70 relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center max-w-4xl">
        <div class="text-caption text-primary mb-3">INITIALIZE CONSULTATION</div>
        <h1 class="h1 text-text mb-6">Let's Build Something <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-accent-blue">That Matters</span>.</h1>
        <p class="text-body text-lg text-text-muted max-w-2xl mx-auto">
            Tell us what you're planning and our team will get back to you with the technical foundation you need.
        </p>
    </div>
</section>

<!-- Contact Form & Info -->
<section class="py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 max-w-6xl">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <!-- Contact Info -->
            <div class="lg:col-span-1 space-y-6">
                <div class="tech-panel p-6 sm:p-8 rounded-xl">
                    <div class="text-caption text-primary mb-2">DIRECT CHANNELS</div>
                    <h3 class="h3 text-text mb-6">Get in Touch</h3>
                    
                    <div class="space-y-6">
                        <div class="flex items-start">
                            <div class="w-10 h-10 rounded-lg bg-surface border border-border text-primary flex items-center justify-center shrink-0 mt-0.5">
                                <i class="fa-solid fa-envelope text-sm"></i>
                            </div>
                            <div class="ml-3.5">
                                <div class="text-caption text-text-dim mb-0.5">Email Engineering</div>
                                <a href="mailto:<?= esc(config('App')->adminEmail ?? 'hello@ziibaysoft.com') ?>" class="text-text hover:text-primary font-mono text-xs transition-colors">
                                    <?= esc(config('App')->adminEmail ?? 'hello@ziibaysoft.com') ?>
                                </a>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="w-10 h-10 rounded-lg bg-surface border border-border text-primary flex items-center justify-center shrink-0 mt-0.5">
                                <i class="fa-solid fa-phone text-sm"></i>
                            </div>
                            <div class="ml-3.5">
                                <div class="text-caption text-text-dim mb-0.5">Direct Line</div>
                                <a href="tel:<?= esc(config('App')->businessPhone ?? '+1234567890') ?>" class="text-text hover:text-primary font-mono text-xs transition-colors">
                                    <?= esc(config('App')->businessPhone ?? '+1 (234) 567-890') ?>
                                </a>
                            </div>
                        </div>
                    </div>

                    <hr class="border-border/50 my-6">

                    <h4 class="text-caption text-text-dim mb-3">INSTANT DISPATCH</h4>
                    <a href="https://wa.me/<?= esc(config('App')->whatsappNumber ?? '1234567890') ?>?text=<?= urlencode("Hello Ziibay Soft, I would like to discuss a project.") ?>" target="_blank" rel="noopener noreferrer" class="btn-secondary flex items-center justify-center w-full !py-3 gap-2 text-xs">
                        <i class="fa-brands fa-whatsapp text-emerald-500 text-base"></i> Chat on WhatsApp
                    </a>
                </div>
            </div>

            <!-- Form -->
            <div class="lg:col-span-2">
                <div class="tech-panel p-6 sm:p-10 rounded-xl">
                    
                    <?php if (session()->getFlashdata('success')): ?>
                        <div class="bg-emerald-500/10 border-l-2 border-emerald-500 text-emerald-400 p-4 mb-6 rounded-r-lg" role="alert">
                            <p class="font-bold text-xs font-mono uppercase">TRANSMISSION RECEIVED</p>
                            <p class="text-xs mt-1 text-text-muted"><?= esc(session()->getFlashdata('success')) ?></p>
                        </div>
                    <?php endif; ?>

                    <?php if (session()->getFlashdata('error')): ?>
                        <div class="bg-danger/10 border-l-2 border-danger text-red-400 p-4 mb-6 rounded-r-lg" role="alert">
                            <p class="font-bold text-xs font-mono uppercase">TRANSMISSION ERROR</p>
                            <p class="text-xs mt-1 text-text-muted"><?= esc(session()->getFlashdata('error')) ?></p>
                        </div>
                    <?php endif; ?>

                    <?php if (session()->getFlashdata('errors')): ?>
                        <div class="bg-danger/10 border-l-2 border-danger text-red-400 p-4 mb-6 rounded-r-lg" role="alert">
                            <p class="font-bold text-xs font-mono uppercase">VALIDATION EXCEPTIONS</p>
                            <ul class="list-disc ml-5 mt-2 text-xs text-text-muted space-y-1">
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
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="name" class="block text-xs font-mono text-text-dim uppercase tracking-wider mb-2">Full Name <span class="text-primary">*</span></label>
                                <input type="text" id="name" name="name" value="<?= old('name') ?>" required class="w-full px-3.5 py-2.5 bg-surface border border-border rounded-lg text-text text-sm focus:outline-none focus:border-primary transition-colors" placeholder="John Doe">
                            </div>
                            <div>
                                <label for="email" class="block text-xs font-mono text-text-dim uppercase tracking-wider mb-2">Email Address <span class="text-primary">*</span></label>
                                <input type="email" id="email" name="email" value="<?= old('email') ?>" required class="w-full px-3.5 py-2.5 bg-surface border border-border rounded-lg text-text text-sm focus:outline-none focus:border-primary transition-colors" placeholder="john@company.com">
                            </div>
                            <div>
                                <label for="phone" class="block text-xs font-mono text-text-dim uppercase tracking-wider mb-2">Phone / WhatsApp</label>
                                <input type="tel" id="phone" name="phone" value="<?= old('phone') ?>" class="w-full px-3.5 py-2.5 bg-surface border border-border rounded-lg text-text text-sm focus:outline-none focus:border-primary transition-colors" placeholder="+1 (555) 000-0000">
                            </div>
                            <div>
                                <label for="company" class="block text-xs font-mono text-text-dim uppercase tracking-wider mb-2">Company Name</label>
                                <input type="text" id="company" name="company" value="<?= old('company') ?>" class="w-full px-3.5 py-2.5 bg-surface border border-border rounded-lg text-text text-sm focus:outline-none focus:border-primary transition-colors" placeholder="Optional">
                            </div>
                        </div>

                        <!-- Services Checkboxes -->
                        <div class="pt-4 border-t border-border/50">
                            <label class="block text-xs font-mono text-text-dim uppercase tracking-wider mb-3">Services Required</label>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                <?php foreach ($services as $srv): ?>
                                    <label class="flex items-center p-3 border border-border rounded-lg cursor-pointer hover:border-primary/50 bg-surface transition-colors">
                                        <input type="checkbox" name="services[]" value="<?= esc($srv['id']) ?>" 
                                            class="w-4 h-4 text-primary bg-surface border-border rounded focus:ring-primary focus:ring-offset-0"
                                            <?= ($preselected_service === $srv['slug']) ? 'checked' : '' ?>
                                            <?= is_array(old('services')) && in_array($srv['id'], old('services')) ? 'checked' : '' ?>>
                                        <span class="ml-2.5 text-text font-medium text-xs"><?= esc($srv['name']) ?></span>
                                    </label>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <!-- Project Details -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 pt-4 border-t border-border/50">
                            <div>
                                <label for="budget" class="block text-xs font-mono text-text-dim uppercase tracking-wider mb-2">Budget Range</label>
                                <select id="budget" name="budget" class="w-full px-3.5 py-2.5 bg-surface border border-border rounded-lg text-text text-sm focus:outline-none focus:border-primary transition-colors appearance-none">
                                    <option value="" disabled selected>Select budget...</option>
                                    <option value="Not sure yet" <?= old('budget') == 'Not sure yet' ? 'selected' : '' ?>>Not sure yet</option>
                                    <option value="Under $1,000" <?= old('budget') == 'Under $1,000' ? 'selected' : '' ?>>Under $1,000</option>
                                    <option value="$1,000–$5,000" <?= old('budget') == '$1,000–$5,000' ? 'selected' : '' ?>>$1,000–$5,000</option>
                                    <option value="$5,000–$10,000" <?= old('budget') == '$5,000–$10,000' ? 'selected' : '' ?>>$5,000–$10,000</option>
                                    <option value="$10,000+" <?= old('budget') == '$10,000+' ? 'selected' : '' ?>>$10,000+</option>
                                </select>
                            </div>
                            <div>
                                <label for="timeline" class="block text-xs font-mono text-text-dim uppercase tracking-wider mb-2">Timeline</label>
                                <select id="timeline" name="timeline" class="w-full px-3.5 py-2.5 bg-surface border border-border rounded-lg text-text text-sm focus:outline-none focus:border-primary transition-colors appearance-none">
                                    <option value="" disabled selected>Select timeline...</option>
                                    <option value="ASAP" <?= old('timeline') == 'ASAP' ? 'selected' : '' ?>>ASAP</option>
                                    <option value="1–2 Months" <?= old('timeline') == '1–2 Months' ? 'selected' : '' ?>>1–2 Months</option>
                                    <option value="3–6 Months" <?= old('timeline') == '3–6 Months' ? 'selected' : '' ?>>3–6 Months</option>
                                    <option value="6+ Months" <?= old('timeline') == '6+ Months' ? 'selected' : '' ?>>6+ Months</option>
                                    <option value="Not Sure" <?= old('timeline') == 'Not Sure' ? 'selected' : '' ?>>Not Sure</option>
                                </select>
                            </div>
                            <div class="md:col-span-2">
                                <label for="country" class="block text-xs font-mono text-text-dim uppercase tracking-wider mb-2">Country</label>
                                <input type="text" id="country" name="country" value="<?= old('country') ?>" class="w-full px-3.5 py-2.5 bg-surface border border-border rounded-lg text-text text-sm focus:outline-none focus:border-primary transition-colors" placeholder="e.g. United States">
                            </div>
                        </div>

                        <!-- Message -->
                        <div class="pt-4 border-t border-border/50">
                            <label for="message" class="block text-xs font-mono text-text-dim uppercase tracking-wider mb-2">Project Details & Requirements <span class="text-primary">*</span></label>
                            <textarea id="message" name="message" rows="5" required class="w-full px-3.5 py-2.5 bg-surface border border-border rounded-lg text-text text-sm focus:outline-none focus:border-primary transition-colors resize-none leading-relaxed" placeholder="Tell us about your project, goals, and any specific technical requirements..."><?= esc(old('message')) ?></textarea>
                        </div>

                        <!-- Submit -->
                        <div class="pt-2">
                            <p class="text-[11px] text-text-dim mb-4 leading-relaxed">
                                By submitting this form, you agree that Ziibay Soft may use your information to respond to your inquiry in accordance with our <a href="<?= base_url('privacy') ?>" class="text-primary hover:underline">Privacy Policy</a>.
                            </p>
                            <button type="submit" class="btn-primary w-full py-3.5 text-sm">
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
