<?= $this->extend('layouts/main') ?>

<?= $this->section('schema') ?>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "SearchResultsPage",
  "name": "Global Index Search | Ziibay Soft",
  "description": "Instant search across all digital services, engineering capabilities, sector solutions, and architectural case studies.",
  "url": "<?= base_url('search') ?>"
}
</script>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- 1. HERO -->
<section style="padding:48px 16px 32px;">
    <div class="framed-panel" style="position:relative; padding:72px 24px 56px; text-align:center;">
        <span class="corner-stat tl">( Fast ) instant filter</span>
        <span class="corner-stat tr">( 100% ) directory index</span>
        <span class="corner-stat bl">( 05 ) core services</span>
        <span class="corner-stat br">( 08 ) vertical sectors</span>

        <div style="max-width:840px; margin:0 auto;" data-rv="blur-rise">
            <div class="eyebrow" style="margin-bottom:14px;">SYSTEM DIRECTORY</div>
            <h1 class="serif-heading" style="font-size:clamp(2.4rem, 6vw, 4.4rem); line-height:1.1; margin-bottom:20px;">
                global search
            </h1>
            <p style="font-size:16px; line-height:1.7; color:var(--muted); max-width:680px; margin:0 auto 28px;">
                Filter across all engineering capabilities, specialized industries, case archives, and locations.
            </p>

            <!-- Large Mono Input -->
            <div style="max-width:600px; margin:0 auto 20px; position:relative;">
                <input type="text" id="liveSearchInput" placeholder="TYPE TO FILTER CAPABILITIES (E.G. WEB, SEO, FLUTTER, ERP)..." 
                       value="<?= esc($query ?? '') ?>"
                       style="width:100%; padding:16px 20px; font-family:var(--mono); font-size:13px; letter-spacing:0.04em; background:var(--card); border:1px solid var(--ink); border-radius:6px; color:var(--ink); outline:none; text-transform:uppercase;">
            </div>
            
            <div style="display:flex; justify-content:center; gap:8px; flex-wrap:wrap;">
                <span class="chip filter-chip" style="cursor:pointer;" onclick="quickFilter('')">ALL</span>
                <span class="chip filter-chip" style="cursor:pointer;" onclick="quickFilter('web')">WEB</span>
                <span class="chip filter-chip" style="cursor:pointer;" onclick="quickFilter('software')">SOFTWARE</span>
                <span class="chip filter-chip" style="cursor:pointer;" onclick="quickFilter('app')">APP</span>
                <span class="chip filter-chip" style="cursor:pointer;" onclick="quickFilter('seo')">SEO</span>
                <span class="chip filter-chip" style="cursor:pointer;" onclick="quickFilter('social')">SOCIAL</span>
            </div>
        </div>
    </div>
</section>

<!-- 2. SEARCH RESULTS INDEX -->
<section style="padding:24px 16px 56px;">
    <div id="searchGrid" style="display:grid; grid-template-columns:repeat(auto-fit, minmax(300px, 1fr)); gap:20px; max-width:1100px; margin:0 auto;">

        <!-- Item: Web Development -->
        <article class="search-item framed-panel" data-keywords="web development php laravel codeigniter next.js frontend backend ecommerce store" style="background:var(--card); padding:28px 24px; display:flex; flex-direction:column; position:relative;">
            <div class="chip" style="align-self:flex-start; margin-bottom:12px;">SERVICE</div>
            <h3 class="serif-heading" style="font-size:1.4rem; margin-bottom:8px;">Web Development</h3>
            <p style="font-size:13px; line-height:1.6; color:var(--muted); margin:0 0 16px;">
                Custom, high-performance web applications, enterprise portals, headless e-commerce, and robust backend systems.
            </p>
            <a href="<?= url_to('service-detail', 'web-development') ?>" class="chip" style="align-self:flex-start; margin-top:auto; font-size:10px;">EXPLORE SERVICE →</a>
        </article>

        <!-- Item: Software Development -->
        <article class="search-item framed-panel" data-keywords="software development custom erp crm saas workflow automation apis python golang" style="background:var(--card); padding:28px 24px; display:flex; flex-direction:column; position:relative;">
            <div class="chip" style="align-self:flex-start; margin-bottom:12px;">SERVICE</div>
            <h3 class="serif-heading" style="font-size:1.4rem; margin-bottom:8px;">Software Development</h3>
            <p style="font-size:13px; line-height:1.6; color:var(--muted); margin:0 0 16px;">
                Bespoke software solutions, custom ERP/CRM tools, enterprise SaaS platforms, and distributed systems.
            </p>
            <a href="<?= url_to('service-detail', 'software-development') ?>" class="chip" style="align-self:flex-start; margin-top:auto; font-size:10px;">EXPLORE SERVICE →</a>
        </article>

        <!-- Item: App Development -->
        <article class="search-item framed-panel" data-keywords="app development mobile ios android flutter react native cross platform tablet" style="background:var(--card); padding:28px 24px; display:flex; flex-direction:column; position:relative;">
            <div class="chip" style="align-self:flex-start; margin-bottom:12px;">SERVICE</div>
            <h3 class="serif-heading" style="font-size:1.4rem; margin-bottom:8px;">App Development</h3>
            <p style="font-size:13px; line-height:1.6; color:var(--muted); margin:0 0 16px;">
                Native and cross-platform mobile apps for iOS and Android with smooth 60fps UX and offline sync.
            </p>
            <a href="<?= url_to('service-detail', 'app-development') ?>" class="chip" style="align-self:flex-start; margin-top:auto; font-size:10px;">EXPLORE SERVICE →</a>
        </article>

        <!-- Item: SEO -->
        <article class="search-item framed-panel" data-keywords="seo search engine optimization technical speed rankings traffic google audit" style="background:var(--card); padding:28px 24px; display:flex; flex-direction:column; position:relative;">
            <div class="chip" style="align-self:flex-start; margin-bottom:12px;">SERVICE</div>
            <h3 class="serif-heading" style="font-size:1.4rem; margin-bottom:8px;">Search Engine Optimization</h3>
            <p style="font-size:13px; line-height:1.6; color:var(--muted); margin:0 0 16px;">
                Data-driven technical SEO, site speed optimization, schema architecture, and authority building for organic growth.
            </p>
            <a href="<?= url_to('service-detail', 'seo') ?>" class="chip" style="align-self:flex-start; margin-top:auto; font-size:10px;">EXPLORE SERVICE →</a>
        </article>

        <!-- Item: Social Media Management -->
        <article class="search-item framed-panel" data-keywords="social media management content marketing brand growth campaigns creative production" style="background:var(--card); padding:28px 24px; display:flex; flex-direction:column; position:relative;">
            <div class="chip" style="align-self:flex-start; margin-bottom:12px;">SERVICE</div>
            <h3 class="serif-heading" style="font-size:1.4rem; margin-bottom:8px;">Social Media Management</h3>
            <p style="font-size:13px; line-height:1.6; color:var(--muted); margin:0 0 16px;">
                Strategic social media management, brand positioning, creative content production, and conversion campaigns.
            </p>
            <a href="<?= url_to('service-detail', 'social-media-management') ?>" class="chip" style="align-self:flex-start; margin-top:auto; font-size:10px;">EXPLORE SERVICE →</a>
        </article>

        <!-- Item: Case Studies -->
        <article class="search-item framed-panel" data-keywords="case studies proof results aura kinetix pulsecare metrics uptime roi" style="background:var(--card); padding:28px 24px; display:flex; flex-direction:column; position:relative;">
            <div class="chip" style="align-self:flex-start; margin-bottom:12px;">ARCHIVES</div>
            <h3 class="serif-heading" style="font-size:1.4rem; margin-bottom:8px;">Case Studies</h3>
            <p style="font-size:13px; line-height:1.6; color:var(--muted); margin:0 0 16px;">
                Empirical evidence detailing our technical challenges, architectures deployed, and verified business results.
            </p>
            <a href="<?= url_to('case-studies') ?>" class="chip" style="align-self:flex-start; margin-top:auto; font-size:10px;">VIEW CASE STUDIES →</a>
        </article>

        <!-- Item: Portfolio -->
        <article class="search-item framed-panel" data-keywords="portfolio selected work deployments flagship projects aura kinetix pulse" style="background:var(--card); padding:28px 24px; display:flex; flex-direction:column; position:relative;">
            <div class="chip" style="align-self:flex-start; margin-bottom:12px;">PORTFOLIO</div>
            <h3 class="serif-heading" style="font-size:1.4rem; margin-bottom:8px;">Selected Work</h3>
            <p style="font-size:13px; line-height:1.6; color:var(--muted); margin:0 0 16px;">
                Explore flagship engineered builds across e-commerce, cloud software, healthcare apps, and fintech portals.
            </p>
            <a href="<?= url_to('portfolio') ?>" class="chip" style="align-self:flex-start; margin-top:auto; font-size:10px;">VIEW WORK →</a>
        </article>

        <!-- Item: Locations -->
        <article class="search-item framed-panel" data-keywords="locations united states united kingdom australia global hubs new york london sydney" style="background:var(--card); padding:28px 24px; display:flex; flex-direction:column; position:relative;">
            <div class="chip" style="align-self:flex-start; margin-bottom:12px;">HUBS</div>
            <h3 class="serif-heading" style="font-size:1.4rem; margin-bottom:8px;">Delivery Hubs</h3>
            <p style="font-size:13px; line-height:1.6; color:var(--muted); margin:0 0 16px;">
                Our strategic remote delivery locations across the US, UK, and Australia with timezone-aligned collaboration.
            </p>
            <a href="<?= url_to('locations') ?>" class="chip" style="align-self:flex-start; margin-top:auto; font-size:10px;">VIEW HUBS →</a>
        </article>

    </div>

    <!-- No results message -->
    <div id="noResultsMsg" style="display:none; text-align:center; padding:48px 16px;">
        <div class="serif-heading" style="font-size:1.8rem; margin-bottom:10px;">No exact index matches found</div>
        <p style="font-size:14px; color:var(--muted); margin-bottom:20px;">Try searching for "web", "software", "app", "seo", "industries", or "case studies".</p>
        <a href="<?= url_to('services') ?>" class="chip">VIEW ALL SERVICES →</a>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('liveSearchInput');
    const items = document.querySelectorAll('.search-item');
    const noResults = document.getElementById('noResultsMsg');

    function filterGrid(term) {
        const q = term.toLowerCase().trim();
        let matchCount = 0;

        items.forEach(item => {
            const keywords = (item.getAttribute('data-keywords') || '').toLowerCase();
            const text = item.innerText.toLowerCase();
            if (!q || keywords.includes(q) || text.includes(q)) {
                item.style.display = 'flex';
                matchCount++;
            } else {
                item.style.display = 'none';
            }
        });

        if (noResults) {
            noResults.style.display = matchCount === 0 ? 'block' : 'none';
        }
    }

    if (input) {
        input.addEventListener('input', (e) => filterGrid(e.target.value));
        if (input.value) {
            filterGrid(input.value);
        }
    }

    window.quickFilter = function(term) {
        if (input) {
            input.value = term;
            filterGrid(term);
        }
    };
});
</script>

<?= $this->endSection() ?>
