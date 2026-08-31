<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?><?= esc($title) ?><?= $this->endSection() ?>
<?= $this->section('meta_description') ?><?= esc($meta_description) ?><?= $this->endSection() ?>
<?= $this->section('canonical') ?><?= esc($canonical_url) ?><?= $this->endSection() ?>
<?= $this->section('og_image') ?><?= esc($og_image) ?><?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- Article Header -->
<header class="pt-28 pb-12 bg-surface/30 border-b border-border/70">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Breadcrumbs -->
        <nav class="flex text-xs font-mono text-text-muted mb-8" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-2">
                <li>
                    <a href="<?= base_url() ?>" class="hover:text-primary transition-colors">Home</a>
                </li>
                <li class="text-text-dim">/</li>
                <li>
                    <a href="<?= base_url('blog') ?>" class="hover:text-primary transition-colors">Blog</a>
                </li>
                <?php if ($category): ?>
                <li class="text-text-dim">/</li>
                <li>
                    <a href="<?= base_url('blog/category/' . esc($category['slug'])) ?>" class="hover:text-primary transition-colors"><?= esc($category['name']) ?></a>
                </li>
                <?php endif; ?>
            </ol>
        </nav>

        <?php if ($category): ?>
            <a href="<?= base_url('blog/category/' . esc($category['slug'])) ?>" class="inline-block px-3 py-1 tech-badge text-[10px] font-mono font-bold uppercase tracking-wider rounded-full mb-4">
                <?= esc($category['name']) ?>
            </a>
        <?php endif; ?>

        <h1 class="h1 text-text mb-6 leading-tight">
            <?= esc($post['title']) ?>
        </h1>
        
        <p class="text-body text-lg text-text-muted mb-8 leading-relaxed border-l-2 border-primary pl-4">
            <?= esc($post['excerpt']) ?>
        </p>
        
        <!-- Author & Meta -->
        <div class="flex items-center justify-between border-t border-border/50 pt-6 pb-2">
            <div class="flex items-center">
                <?php if ($author && !empty($author['photo'])): ?>
                    <img src="<?= base_url(esc($author['photo'])) ?>" alt="<?= esc($author['name']) ?>" class="w-12 h-12 rounded-full object-cover mr-3.5 border border-border">
                <?php else: ?>
                    <div class="w-12 h-12 rounded-full bg-primary text-background flex items-center justify-center font-bold text-base mr-3.5">
                        <?= substr(esc($author['name'] ?? 'Z'), 0, 1) ?>
                    </div>
                <?php endif; ?>
                
                <div>
                    <?php if ($author && !empty($author['slug'])): ?>
                        <a href="<?= base_url('authors/'.esc($author['slug'])) ?>" class="text-text font-bold text-sm hover:text-primary transition-colors"><?= esc($author['name']) ?></a>
                    <?php else: ?>
                        <div class="text-text font-bold text-sm"><?= esc($author['name'] ?? 'Ziibay Soft Team') ?></div>
                    <?php endif; ?>
                    <div class="text-text-muted text-xs flex items-center gap-2 flex-wrap mt-0.5">
                        <span><?= esc($author['role'] ?? 'Editorial') ?></span>
                        <span class="text-border hidden sm:inline">&bull;</span>
                        <span class="font-mono text-[11px] text-text-dim"><?= date('M j, Y', strtotime($post['published_at'])) ?></span>
                        <span class="text-border hidden sm:inline">&bull;</span>
                        <span class="font-mono text-[11px] text-text-dim"><?= $readingTime ?> min read</span>
                        <?php if (strtotime($post['updated_at']) > strtotime($post['published_at']) + 86400): ?>
                            <span class="text-border hidden sm:inline">&bull;</span>
                            <span class="hidden sm:inline italic text-[11px]">Updated <?= date('M j, Y', strtotime($post['updated_at'])) ?></span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            
            <div class="hidden md:flex gap-2">
                <a href="https://twitter.com/intent/tweet?url=<?= urlencode($canonical_url) ?>&text=<?= urlencode($post['title']) ?>" target="_blank" rel="noopener noreferrer" class="w-8 h-8 rounded-lg bg-surface border border-border flex items-center justify-center text-text-muted hover:text-primary hover:border-primary/50 transition-colors" aria-label="Share on Twitter">
                    <i class="fa-brands fa-twitter text-xs"></i>
                </a>
                <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?= urlencode($canonical_url) ?>&title=<?= urlencode($post['title']) ?>" target="_blank" rel="noopener noreferrer" class="w-8 h-8 rounded-lg bg-surface border border-border flex items-center justify-center text-text-muted hover:text-primary hover:border-primary/50 transition-colors" aria-label="Share on LinkedIn">
                    <i class="fa-brands fa-linkedin-in text-xs"></i>
                </a>
            </div>
        </div>
    </div>
</header>

<!-- Featured Image -->
<?php if ($post['featured_image']): ?>
<section class="py-8 bg-surface/20">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="rounded-xl overflow-hidden shadow-2xl border border-border bg-surface">
            <img src="<?= base_url(esc($post['featured_image'])) ?>" alt="<?= esc($post['title']) ?>" class="w-full h-auto object-cover max-h-[70vh]" loading="eager">
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Main Content Area -->
<section class="py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row gap-12 justify-center">
            
            <!-- Left Sidebar (TOC) -->
            <div class="hidden xl:block w-56 shrink-0">
                <div class="sticky top-28 space-y-4">
                    <?php if (!empty($toc)): ?>
                        <div class="text-caption text-primary uppercase tracking-wider mb-3">Contents</div>
                        <ul class="space-y-2 text-xs">
                            <?php foreach ($toc as $item): ?>
                                <li class="<?= $item['level'] == '3' ? 'ml-3' : '' ?>">
                                    <a href="#<?= esc($item['id']) ?>" class="text-text-muted hover:text-primary transition-colors leading-relaxed block">
                                        <?= esc($item['title']) ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Article Body -->
            <article class="flex-grow max-w-3xl prose prose-base md:prose-lg dark:prose-invert prose-headings:font-bold prose-headings:text-text prose-p:text-text-muted prose-a:text-primary prose-a:no-underline hover:prose-a:underline prose-strong:text-text prose-code:text-primary prose-code:bg-surface prose-code:border prose-code:border-border prose-code:px-1.5 prose-code:py-0.5 prose-code:rounded prose-pre:bg-surface prose-pre:border prose-pre:border-border prose-pre:text-text">
                <?= $post['content'] ?>
                
                <?php if (!empty($faqs)): ?>
                    <div class="mt-16 pt-8 border-t border-border/70 not-prose">
                        <div class="text-caption text-primary mb-2">CLARIFICATIONS</div>
                        <h3 class="h3 text-text mb-6">Frequently Asked Questions</h3>
                        <div class="space-y-3">
                            <?php foreach ($faqs as $index => $faq): ?>
                                <div 
                                    x-data="{ expanded: false }" 
                                    class="tech-card rounded-xl overflow-hidden transition-all duration-300"
                                >
                                    <button 
                                        @click="expanded = !expanded" 
                                        class="w-full flex items-center justify-between p-5 text-left focus:outline-none"
                                        :aria-expanded="expanded"
                                    >
                                        <h4 class="text-sm md:text-base font-bold text-text pr-6" :class="expanded ? 'text-primary' : ''">
                                            <?= esc($faq['question']) ?>
                                        </h4>
                                        <span class="text-primary flex-shrink-0 transition-transform duration-200 text-xs" :class="expanded ? 'rotate-180' : ''">
                                            <i class="fa-solid fa-chevron-down"></i>
                                        </span>
                                    </button>
                                    
                                    <div 
                                        x-show="expanded" 
                                        x-collapse
                                        class="px-5 pb-5 text-text-muted text-sm border-t border-border/40 pt-3 leading-relaxed"
                                    >
                                        <?= $faq['answer'] ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </article>

            <!-- Right Sidebar (Relationships & CTA) -->
            <aside class="w-full lg:w-80 shrink-0 space-y-6">
                
                <?php if ($author): ?>
                    <div class="tech-panel p-6 rounded-xl">
                        <div class="text-caption text-text-dim uppercase tracking-wider mb-4">About the Author</div>
                        <div class="flex flex-col items-center text-center">
                            <?php if (!empty($author['photo'])): ?>
                                <img src="<?= base_url(esc($author['photo'])) ?>" alt="<?= esc($author['name']) ?>" class="w-20 h-20 rounded-full object-cover border-2 border-border mb-3">
                            <?php else: ?>
                                <div class="w-20 h-20 rounded-full bg-primary text-background flex items-center justify-center font-bold text-2xl mb-3">
                                    <?= substr(esc($author['name'] ?? 'Z'), 0, 1) ?>
                                </div>
                            <?php endif; ?>
                            <?php if (!empty($author['slug'])): ?>
                                <a href="<?= base_url('authors/'.esc($author['slug'])) ?>" class="text-base font-bold text-text mb-1 hover:text-primary transition-colors"><?= esc($author['name']) ?></a>
                            <?php else: ?>
                                <h4 class="text-base font-bold text-text mb-1"><?= esc($author['name']) ?></h4>
                            <?php endif; ?>
                            <p class="text-primary text-xs font-mono font-medium mb-3"><?= esc($author['role']) ?></p>
                            <p class="text-text-muted text-xs leading-relaxed"><?= esc($author['short_bio']) ?></p>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if (!empty($tags)): ?>
                    <div class="tech-panel p-6 rounded-xl">
                        <h4 class="text-caption text-text-dim uppercase tracking-wider mb-3">Topics</h4>
                        <div class="flex flex-wrap gap-1.5">
                            <?php foreach ($tags as $tag): ?>
                                <a href="<?= base_url('blog/tag/' . esc($tag['slug'])) ?>" class="tech-badge text-[11px] hover:text-primary hover:border-primary/50 transition-colors">
                                    <?= esc($tag['name']) ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Sticky CTA Widget -->
                <div class="sticky top-28 tech-panel p-6 rounded-xl border border-border/80 text-center">
                    <div class="text-caption text-primary mb-1">CONSULTATION</div>
                    <h4 class="text-base font-bold text-text mb-2">Need Expert Help?</h4>
                    <p class="text-xs text-text-muted mb-6 leading-relaxed">We build robust digital solutions for complex business problems.</p>
                    <a href="https://wa.me/<?= esc(config('App')->whatsappNumber ?? '1234567890') ?>?text=<?= urlencode("Hello Ziibay Soft, I was reading your article about '" . $post['title'] . "' and would like to discuss a project.") ?>" target="_blank" rel="noopener noreferrer" class="btn-secondary w-full text-xs text-center !py-2.5 mb-2.5 flex items-center justify-center gap-2">
                        <i class="fa-brands fa-whatsapp text-emerald-500 text-sm"></i> WhatsApp Us
                    </a>
                </div>

            </aside>
        </div>
    </div>
</section>

<!-- Related Articles -->
<?php if (!empty($relatedPosts)): ?>
<section class="py-16 bg-surface/50 border-t border-border/70">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="h3 text-text mb-8 text-center">Related Articles</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <?php foreach ($relatedPosts as $rp): ?>
                <a href="<?= base_url('blog/' . esc($rp['slug'])) ?>" class="group flex flex-col tech-card rounded-xl overflow-hidden">
                    <div class="relative h-44 bg-surface-hover overflow-hidden border-b border-border/50">
                        <?php if ($rp['featured_image']): ?>
                            <img src="<?= base_url(esc($rp['featured_image'])) ?>" alt="<?= esc($rp['title']) ?>" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500" loading="lazy">
                        <?php else: ?>
                            <div class="w-full h-full flex items-center justify-center text-text-muted">
                                <i class="fa-regular fa-image text-4xl"></i>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="p-5 flex flex-col flex-grow">
                        <?php if ($rp['category_name']): ?>
                            <div class="text-caption text-primary mb-1"><?= esc($rp['category_name']) ?></div>
                        <?php endif; ?>
                        <h3 class="text-sm font-bold text-text mb-1.5 group-hover:text-primary transition-colors line-clamp-2 leading-snug"><?= esc($rp['title']) ?></h3>
                        <p class="text-xs text-text-muted line-clamp-2 leading-relaxed"><?= esc($rp['excerpt']) ?></p>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Continue with a related service (educational -> commercial transition) -->
<?php if (!empty($relatedServices)): ?>
<section class="py-16 border-t border-border/70">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="tech-panel p-8 rounded-xl flex flex-col md:flex-row items-start md:items-center justify-between gap-6 border-l-2 border-l-primary">
            <div class="max-w-xl">
                <div class="text-caption text-primary mb-1">TAKE THE NEXT STEP</div>
                <h2 class="text-xl font-bold text-text mb-2">Put this into practice with our team</h2>
                <p class="text-xs text-text-muted leading-relaxed">
                    This guide relates to the work we do every day. Explore
                    <?php foreach ($relatedServices as $i => $relService): ?>
                        <a href="<?= base_url('services/' . esc($relService['public_slug'])) ?>" class="text-primary font-semibold hover:underline"><?= esc(strtolower($relService['name'])) ?> services</a><?= $i < count($relatedServices) - 1 ? (count($relatedServices) === 2 ? ' ' : ', ') : '' ?>
                    <?php endforeach; ?>
                    or talk to us about your specific situation.
                </p>
            </div>
            <a href="<?= base_url('contact') ?>" class="btn-primary shrink-0 py-3 px-6 text-xs">
                Get a Free Consultation &rarr;
            </a>
        </div>

        <?php if (!empty($relatedIndustries)): ?>
            <div class="mt-6 flex flex-wrap items-center gap-2 text-xs">
                <span class="text-caption text-text-dim mr-1">RELEVANT SECTORS:</span>
                <?php foreach ($relatedIndustries as $relIndustry): ?>
                    <a href="<?= base_url('industries/' . esc($relIndustry['slug'])) ?>" class="tech-badge text-xs">
                        <?= esc($relIndustry['name']) ?>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
<?php endif; ?>

<!-- Schema.org Article, BreadcrumbList, FAQ -->
<script type="application/ld+json">
[
  {
    "@context": "https://schema.org",
    "@type": "BreadcrumbList",
    "itemListElement": [
      {
        "@type": "ListItem",
        "position": 1,
        "name": "Home",
        "item": "<?= base_url() ?>"
      },
      {
        "@type": "ListItem",
        "position": 2,
        "name": "Blog",
        "item": "<?= base_url('blog') ?>"
      }
      <?php if ($category): ?>,
      {
        "@type": "ListItem",
        "position": 3,
        "name": "<?= esc($category['name']) ?>",
        "item": "<?= base_url('blog/category/' . esc($category['slug'])) ?>"
      }
      <?php endif; ?>
    ]
  },
  {
    "@context": "https://schema.org",
    "@type": "BlogPosting",
    "mainEntityOfPage": {
      "@type": "WebPage",
      "@id": "<?= esc($canonical_url) ?>"
    },
    "headline": "<?= esc($post['seo_title'] ?? $post['title']) ?>",
    "description": "<?= esc($post['meta_description'] ?? $post['excerpt']) ?>",
    "image": "<?= esc($og_image) ?>",
    "author": {
      "@type": "Person",
      "name": "<?= esc($author['name'] ?? 'Ziibay Soft') ?>"
    },
    "publisher": {
      "@type": "Organization",
      "name": "Ziibay Soft",
      "logo": {
        "@type": "ImageObject",
        "url": "<?= base_url('assets/images/logo.png') ?>"
      }
    },
    "datePublished": "<?= date('c', strtotime($post['published_at'])) ?>",
    "dateModified": "<?= date('c', strtotime($post['updated_at'])) ?>"
  }
  <?php if (!empty($faqs)): ?>,
  {
    "@context": "https://schema.org",
    "@type": "FAQPage",
    "mainEntity": [
        <?php foreach ($faqs as $i => $faq): ?>
        {
            "@type": "Question",
            "name": <?= json_encode($faq['question']) ?>,
            "acceptedAnswer": {
                "@type": "Answer",
                "text": <?= json_encode(strip_tags($faq['answer'])) ?>
            }
        }<?= $i < count($faqs) - 1 ? ',' : '' ?>
        <?php endforeach; ?>
    ]
  }
  <?php endif; ?>
]
</script>

<?= $this->endSection() ?>
