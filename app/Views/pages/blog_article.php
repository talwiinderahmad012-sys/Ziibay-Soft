<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?><?= esc($title) ?><?= $this->endSection() ?>
<?= $this->section('meta_description') ?><?= esc($meta_description) ?><?= $this->endSection() ?>
<?= $this->section('canonical') ?><?= esc($canonical_url) ?><?= $this->endSection() ?>
<?= $this->section('og_image') ?><?= esc($og_image) ?><?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- Article Header -->
<header class="pt-32 pb-12 bg-surface transition-colors duration-300">
    <div class="container mx-auto px-4 max-w-4xl">
        
        <!-- Breadcrumbs -->
        <nav class="flex text-sm text-text-muted mb-8" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="<?= base_url() ?>" class="hover:text-brand-primary transition-colors">Home</a>
                </li>
                <li>
                    <div class="flex items-center">
                        <i class="fa-solid fa-chevron-right text-xs mx-2"></i>
                        <a href="<?= base_url('blog') ?>" class="hover:text-brand-primary transition-colors">Blog</a>
                    </div>
                </li>
                <?php if ($category): ?>
                <li>
                    <div class="flex items-center">
                        <i class="fa-solid fa-chevron-right text-xs mx-2"></i>
                        <a href="<?= base_url('blog/category/' . esc($category['slug'])) ?>" class="hover:text-brand-primary transition-colors"><?= esc($category['name']) ?></a>
                    </div>
                </li>
                <?php endif; ?>
            </ol>
        </nav>

        <?php if ($category): ?>
            <a href="<?= base_url('blog/category/' . esc($category['slug'])) ?>" class="inline-block px-3 py-1 bg-brand-primary/10 text-brand-primary font-bold text-xs uppercase tracking-wider rounded-full mb-6">
                <?= esc($category['name']) ?>
            </a>
        <?php endif; ?>

        <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-text mb-6 leading-tight">
            <?= esc($post['title']) ?>
        </h1>
        
        <p class="text-xl text-text-muted mb-10 leading-relaxed font-light border-l-4 border-brand-primary pl-6">
            <?= esc($post['excerpt']) ?>
        </p>
        
        <!-- Author & Meta -->
        <div class="flex items-center justify-between border-t border-border pt-8 pb-4">
            <div class="flex items-center">
                <?php if ($author && !empty($author['photo'])): ?>
                    <img src="<?= base_url(esc($author['photo'])) ?>" alt="<?= esc($author['name']) ?>" class="w-14 h-14 rounded-full object-cover mr-4 shadow-sm border border-border">
                <?php else: ?>
                    <div class="w-14 h-14 rounded-full bg-brand-primary text-white flex items-center justify-center font-bold text-xl mr-4 shadow-sm">
                        <?= substr(esc($author['name'] ?? 'Z'), 0, 1) ?>
                    </div>
                <?php endif; ?>
                
                <div>
                    <?php if ($author && !empty($author['slug'])): ?>
                        <a href="<?= base_url('authors/'.esc($author['slug'])) ?>" class="text-text font-bold text-lg hover:text-brand-primary transition-colors"><?= esc($author['name']) ?></a>
                    <?php else: ?>
                        <div class="text-text font-bold text-lg"><?= esc($author['name'] ?? 'Ziibay Soft Team') ?></div>
                    <?php endif; ?>
                    <div class="text-text-muted text-sm flex items-center gap-3 flex-wrap">
                        <span><?= esc($author['role'] ?? 'Editorial') ?></span>
                        <span class="text-border hidden sm:inline">&bull;</span>
                        <span><?= date('M j, Y', strtotime($post['published_at'])) ?></span>
                        <span class="text-border hidden sm:inline">&bull;</span>
                        <span><?= $readingTime ?> min read</span>
                        <?php if (strtotime($post['updated_at']) > strtotime($post['published_at']) + 86400): ?>
                            <span class="text-border hidden sm:inline">&bull;</span>
                            <span class="hidden sm:inline italic">Updated <?= date('M j, Y', strtotime($post['updated_at'])) ?></span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            
            <div class="hidden md:flex gap-2">
                <a href="https://twitter.com/intent/tweet?url=<?= urlencode($canonical_url) ?>&text=<?= urlencode($post['title']) ?>" target="_blank" rel="noopener noreferrer" class="w-10 h-10 rounded-full bg-surface-secondary border border-border flex items-center justify-center text-text hover:text-white hover:bg-[#1DA1F2] hover:border-[#1DA1F2] transition-colors" aria-label="Share on Twitter">
                    <i class="fa-brands fa-twitter"></i>
                </a>
                <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?= urlencode($canonical_url) ?>&title=<?= urlencode($post['title']) ?>" target="_blank" rel="noopener noreferrer" class="w-10 h-10 rounded-full bg-surface-secondary border border-border flex items-center justify-center text-text hover:text-white hover:bg-[#0A66C2] hover:border-[#0A66C2] transition-colors" aria-label="Share on LinkedIn">
                    <i class="fa-brands fa-linkedin-in"></i>
                </a>
            </div>
        </div>
    </div>
</header>

<!-- Featured Image -->
<?php if ($post['featured_image']): ?>
<section class="bg-surface transition-colors duration-300">
    <div class="container mx-auto px-4 max-w-5xl">
        <div class="rounded-3xl overflow-hidden shadow-2xl border border-border bg-surface-secondary">
            <img src="<?= base_url(esc($post['featured_image'])) ?>" alt="<?= esc($post['title']) ?>" class="w-full h-auto object-cover max-h-[70vh]" loading="eager">
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Main Content Area -->
<section class="py-16 bg-surface transition-colors duration-300">
    <div class="container mx-auto px-4 max-w-7xl">
        <div class="flex flex-col lg:flex-row gap-16 justify-center">
            
            <!-- Left Sidebar (TOC) -->
            <div class="hidden xl:block w-56 shrink-0">
                <div class="sticky top-24 space-y-6">
                    <?php if (!empty($toc)): ?>
                        <div class="text-xs font-bold text-text-muted uppercase tracking-wider mb-4">Table of Contents</div>
                        <ul class="space-y-3 text-sm">
                            <?php foreach ($toc as $item): ?>
                                <li class="<?= $item['level'] == '3' ? 'ml-4' : '' ?>">
                                    <a href="#<?= esc($item['id']) ?>" class="text-text-muted hover:text-brand-primary transition-colors">
                                        <?= esc($item['title']) ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Article Body -->
            <article class="flex-grow max-w-3xl prose prose-lg md:prose-xl dark:prose-invert prose-headings:font-bold prose-headings:text-text prose-p:text-text-muted prose-a:text-brand-primary prose-a:no-underline hover:prose-a:underline prose-strong:text-text prose-code:text-brand-secondary prose-code:bg-surface-secondary prose-code:px-1 prose-code:rounded prose-pre:bg-surface-secondary prose-pre:border prose-pre:border-border prose-pre:text-text">
                <?= $post['content'] ?>
                
                <?php if (!empty($faqs)): ?>
                    <div class="mt-16 pt-8 border-t border-border not-prose">
                        <h3 class="text-2xl font-bold text-text mb-6">Frequently Asked Questions</h3>
                        <div class="space-y-4">
                            <?php foreach ($faqs as $index => $faq): ?>
                                <div 
                                    x-data="{ expanded: false }" 
                                    class="border border-border rounded-xl bg-surface-secondary overflow-hidden transition-all duration-300"
                                    :class="expanded ? 'border-brand-primary/50 shadow-md' : 'hover:border-border-hover'"
                                >
                                    <button 
                                        @click="expanded = !expanded" 
                                        class="w-full flex items-center justify-between p-6 text-left focus:outline-none"
                                        :aria-expanded="expanded"
                                    >
                                        <h4 class="text-lg font-bold text-text pr-8" :class="expanded ? 'text-brand-primary' : ''">
                                            <?= esc($faq['question']) ?>
                                        </h4>
                                        <span class="text-brand-primary flex-shrink-0 transition-transform duration-300" :class="expanded ? 'rotate-180' : ''">
                                            <i class="fa-solid fa-chevron-down"></i>
                                        </span>
                                    </button>
                                    
                                    <div 
                                        x-show="expanded" 
                                        x-collapse
                                        class="px-6 pb-4 text-text-muted prose prose-sm dark:prose-invert max-w-none"
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
            <aside class="w-full lg:w-80 shrink-0 space-y-10">
                
                <?php if ($author): ?>
                    <div class="bg-surface-secondary p-8 rounded-2xl border border-border">
                        <div class="text-xs font-bold text-text-muted uppercase tracking-wider mb-6">About the Author</div>
                        <div class="flex flex-col items-center text-center">
                            <?php if (!empty($author['photo'])): ?>
                                <img src="<?= base_url(esc($author['photo'])) ?>" alt="<?= esc($author['name']) ?>" class="w-24 h-24 rounded-full object-cover shadow-md border-4 border-surface mb-4">
                            <?php else: ?>
                                <div class="w-24 h-24 rounded-full bg-brand-primary text-white flex items-center justify-center font-bold text-3xl shadow-md border-4 border-surface mb-4">
                                    <?= substr(esc($author['name'] ?? 'Z'), 0, 1) ?>
                                </div>
                            <?php endif; ?>
                            <?php if (!empty($author['slug'])): ?>
                                <a href="<?= base_url('authors/'.esc($author['slug'])) ?>" class="text-xl font-bold text-text mb-1 hover:text-brand-primary transition-colors"><?= esc($author['name']) ?></a>
                            <?php else: ?>
                                <h4 class="text-xl font-bold text-text mb-1"><?= esc($author['name']) ?></h4>
                            <?php endif; ?>
                            <p class="text-brand-primary text-sm font-medium mb-4"><?= esc($author['role']) ?></p>
                            <p class="text-text-muted text-sm"><?= esc($author['short_bio']) ?></p>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if (!empty($tags)): ?>
                    <div class="pt-4">
                        <h4 class="text-sm font-bold text-text-muted uppercase tracking-wider mb-4">Topics</h4>
                        <div class="flex flex-wrap gap-2">
                            <?php foreach ($tags as $tag): ?>
                                <a href="<?= base_url('blog/tag/' . esc($tag['slug'])) ?>" class="px-3 py-1 bg-surface-secondary border border-border text-text text-xs font-medium rounded-full hover:bg-brand-primary/10 hover:text-brand-primary hover:border-brand-primary/30 transition-colors">
                                    <?= esc($tag['name']) ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Sticky CTA Widget -->
                <div class="sticky top-24 bg-gradient-to-br from-brand-primary to-brand-secondary p-8 rounded-3xl text-white shadow-xl shadow-brand-primary/20 mt-12 text-center">
                    <h4 class="text-2xl font-bold mb-4">Need Expert Help?</h4>
                    <p class="text-white/90 mb-8 text-sm">We build robust digital solutions for complex business problems.</p>
                    <a href="https://wa.me/<?= esc(config('App')->whatsappNumber ?? '1234567890') ?>?text=<?= urlencode("Hello Ziibay Soft, I was reading your article about '" . $post['title'] . "' and would like to discuss a project.") ?>" target="_blank" rel="noopener noreferrer" class="block w-full py-3 bg-white text-brand-primary rounded-xl font-bold hover:bg-gray-100 transition-colors shadow-lg">
                        <i class="fa-brands fa-whatsapp mr-2"></i> WhatsApp Us
                    </a>
                </div>

            </aside>
        </div>
    </div>
</section>

<!-- Related Articles -->
<?php if (!empty($relatedPosts)): ?>
<section class="py-20 bg-surface-secondary transition-colors duration-300 border-t border-border">
    <div class="container mx-auto px-4 max-w-6xl">
        <h2 class="text-3xl font-bold text-text mb-10 border-b border-border pb-6">Related Articles</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <?php foreach ($relatedPosts as $rp): ?>
                <a href="<?= base_url('blog/' . esc($rp['slug'])) ?>" class="group flex flex-col bg-surface border border-border rounded-2xl overflow-hidden shadow-sm hover:shadow-xl hover:border-brand-primary/50 transition-all duration-300">
                    <div class="relative h-48 bg-surface-secondary overflow-hidden">
                        <?php if ($rp['featured_image']): ?>
                            <img src="<?= base_url(esc($rp['featured_image'])) ?>" alt="<?= esc($rp['title']) ?>" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500" loading="lazy">
                        <?php else: ?>
                            <div class="w-full h-full flex items-center justify-center text-text-muted">
                                <i class="fa-regular fa-image text-4xl"></i>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="p-6 flex flex-col flex-grow">
                        <?php if ($rp['category_name']): ?>
                            <div class="text-brand-primary text-xs font-bold uppercase tracking-wider mb-2"><?= esc($rp['category_name']) ?></div>
                        <?php endif; ?>
                        <h3 class="text-xl font-bold text-text mb-3 group-hover:text-brand-primary transition-colors line-clamp-2"><?= esc($rp['title']) ?></h3>
                        <p class="text-text-muted text-sm line-clamp-2"><?= esc($rp['excerpt']) ?></p>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
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
