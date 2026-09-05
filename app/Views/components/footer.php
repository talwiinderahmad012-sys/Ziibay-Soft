<footer class="dark-panel" style="margin:32px 14px 0 14px; padding:64px 24px 32px 24px;">
    <!-- CTA section -->
    <div style="text-align:center; margin-bottom:40px;" data-rv="blur-rise">
        <div class="eyebrow" style="margin-bottom:12px;">TURN AMBITIOUS IDEAS INTO POWERFUL SOFTWARE</div>
        <h2 class="serif-heading" style="font-size:clamp(2.2rem,5vw,3.8rem); line-height:1.15; margin-bottom:24px;">
            want software?<br>let's create!
        </h2>
        <a href="<?= url_to('contact') ?>" class="chip cta shine-hover" style="background:var(--ink);color:#ffffff;border:1px solid var(--gold);">→ GET A FREE CONSULTATION</a>
    </div>

    <!-- Footer Columns -->
    <div style="display:flex; flex-wrap:wrap; justify-content:space-between; gap:28px; border-top:1px solid var(--line); padding-top:28px; margin-bottom:28px;">
        <div>
            <div style="font-family:var(--mono); font-size:11px; text-transform:uppercase; letter-spacing:0.12em; opacity:0.6; margin-bottom:14px;">CORE SERVICES</div>
            <div style="display:flex; flex-direction:column; gap:10px;">
                <a href="<?= url_to('service-detail', 'web-development') ?>" style="text-decoration:none; font-size:13px;">Web Development</a>
                <a href="<?= url_to('service-detail', 'software-development') ?>" style="text-decoration:none; font-size:13px;">Software Development</a>
                <a href="<?= url_to('service-detail', 'app-development') ?>" style="text-decoration:none; font-size:13px;">App Development</a>
            </div>
        </div>
        <div>
            <div style="font-family:var(--mono); font-size:11px; text-transform:uppercase; letter-spacing:0.12em; opacity:0.6; margin-bottom:14px;">GROWTH</div>
            <div style="display:flex; flex-direction:column; gap:10px;">
                <a href="<?= url_to('service-detail', 'seo') ?>" style="text-decoration:none; font-size:13px;">SEO Services</a>
                <a href="<?= url_to('service-detail', 'social-media-management') ?>" style="text-decoration:none; font-size:13px;">Social Media Management</a>
            </div>
        </div>
        <div>
            <div style="font-family:var(--mono); font-size:11px; text-transform:uppercase; letter-spacing:0.12em; opacity:0.6; margin-bottom:14px;">COMPANY</div>
            <div style="display:flex; flex-direction:column; gap:10px;">
                <a href="<?= url_to('about') ?>" style="text-decoration:none; font-size:13px;">About Us</a>
                <a href="<?= url_to('portfolio') ?>" style="text-decoration:none; font-size:13px;">Portfolio</a>
                <a href="<?= url_to('case-studies') ?>" style="text-decoration:none; font-size:13px;">Case Studies</a>
                <a href="<?= url_to('faq') ?>" style="text-decoration:none; font-size:13px;">FAQ</a>
            </div>
        </div>
        <div>
            <div style="font-family:var(--mono); font-size:11px; text-transform:uppercase; letter-spacing:0.12em; opacity:0.6; margin-bottom:14px;">SECTORS</div>
            <div style="display:flex; flex-direction:column; gap:10px;">
                <a href="<?= url_to('industries') ?>" style="text-decoration:none; font-size:13px;">Industries Index</a>
                <a href="<?= url_to('services') ?>" style="text-decoration:none; font-size:13px;">All Capabilities</a>
                <a href="<?= base_url('search') ?>" style="text-decoration:none; font-size:13px;">Knowledge Search</a>
                <a href="<?= url_to('contact') ?>" style="text-decoration:none; font-size:13px;">Contact Engineering →</a>
            </div>
        </div>
        <div>
            <div style="font-family:var(--mono); font-size:11px; text-transform:uppercase; letter-spacing:0.12em; opacity:0.6; margin-bottom:14px;">LOCATIONS</div>
            <div style="display:flex; flex-direction:column; gap:10px;">
                <a href="<?= base_url('locations') ?>" style="text-decoration:none; font-size:13px;">All Locations</a>
                <a href="<?= base_url('locations/united-states') ?>" style="text-decoration:none; font-size:13px;">United States</a>
                <a href="<?= base_url('locations/united-kingdom') ?>" style="text-decoration:none; font-size:13px;">United Kingdom</a>
                <a href="<?= base_url('locations/australia') ?>" style="text-decoration:none; font-size:13px;">Australia</a>
            </div>
        </div>
    </div>

    <!-- Bottom Bar -->
    <div style="display:flex; justify-content:space-between; align-items:center; border-top:1px solid var(--line); padding-top:20px; opacity:0.7; font-size:12px;">
        <div>© <?= date('Y') ?> Ziibay Soft. All rights reserved. Precision software engineering.</div>
        <div style="display:flex; gap:20px;">
            <a href="<?= base_url('privacy') ?>" style="color:inherit; text-decoration:none;">Privacy Policy</a>
            <a href="<?= base_url('terms') ?>" style="color:inherit; text-decoration:none;">Terms of Service</a>
        </div>
    </div>
</footer>
