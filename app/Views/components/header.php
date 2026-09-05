<header style="position:fixed;top:0;left:0;width:100%;z-index:100;padding:16px;">
    <div class="max-w-7xl mx-auto w-full" style="display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:10px;">
        <a href="<?= url_to('home') ?>" class="chip <?= (url_is('') || url_is('home')) ? 'active' : '' ?>"><span style="color:var(--gold);margin-right:2px;">✳</span> ZIIBAY SOFT</a>
        
        <nav style="display:flex;gap:8px;flex-wrap:wrap;" aria-label="Main Navigation">
            <a href="<?= url_to('home') ?>" class="chip <?= (url_is('') || url_is('home')) ? 'active' : '' ?>">HOME</a>
            <a href="<?= url_to('services') ?>" class="chip <?= url_is('services*') ? 'active' : '' ?>">SERVICES</a>
            <a href="<?= url_to('industries') ?>" class="chip <?= url_is('industries*') ? 'active' : '' ?>">INDUSTRIES</a>
            <a href="<?= url_to('portfolio') ?>" class="chip <?= url_is('portfolio*') ? 'active' : '' ?>">PORTFOLIO</a>
            <a href="<?= url_to('contact') ?>" class="chip <?= url_is('contact*') ? 'active' : '' ?>">CONTACT</a>
        </nav>
        
        <a href="<?= url_to('contact') ?>" class="chip shine-hover cta" style="background:var(--ink);color:#ffffff;border:1px solid var(--gold);">→ GET A FREE CONSULTATION</a>
    </div>
</header>

