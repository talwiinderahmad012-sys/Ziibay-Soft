<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title><?= esc($title ?? 'Admin Panel') ?> | Ziibay Soft</title>

    <!-- Shared Theme System -->
    <?= $this->include('components/theme_manager') ?>

    <style type="text/tailwindcss">
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
        body { font-family: 'Inter', sans-serif; background-color: var(--bg-color); color: var(--text-color); }
        .sidebar-link { @apply flex items-center px-4 py-3 rounded-lg text-sm transition-all text-text-muted hover:bg-surface-hover hover:text-text; }
        .sidebar-link.active { @apply bg-surface-hover text-text font-medium; }
    </style>
</head>
<body class="antialiased flex h-screen overflow-hidden" x-data="{ sidebarOpen: false }">

    <!-- Mobile sidebar backdrop -->
    <div x-show="sidebarOpen" class="fixed inset-0 z-20 bg-black/50 lg:hidden" @click="sidebarOpen = false"></div>

    <!-- Sidebar -->
    <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'" class="fixed inset-y-0 left-0 z-30 w-64 bg-surface border-r border-border transition duration-300 lg:static lg:translate-x-0 flex flex-col">
        <div class="flex items-center justify-center h-20 border-b border-border">
            <a href="<?= base_url('admin/dashboard') ?>" class="text-2xl font-bold text-text tracking-tight">Ziibay <span class="text-primary">Admin</span></a>
        </div>
        <nav class="flex-1 overflow-y-auto p-4 space-y-2">
            <a href="<?= base_url('admin/dashboard') ?>" class="sidebar-link <?= (url_is('admin/dashboard')) ? 'active' : '' ?>">Dashboard</a>
            <a href="<?= base_url('admin/services') ?>" class="sidebar-link <?= (url_is('admin/services*')) ? 'active' : '' ?>">Services</a>
            <a href="<?= base_url('admin/industries') ?>" class="sidebar-link <?= (url_is('admin/industries*')) ? 'active' : '' ?>">Industries</a>
            <a href="<?= base_url('admin/locations') ?>" class="sidebar-link <?= (url_is('admin/locations*') && !url_is('admin/location-services*') && !url_is('admin/location-matrix*')) ? 'active' : '' ?>">Locations</a>
            <a href="<?= base_url('admin/location-services') ?>" class="sidebar-link <?= (url_is('admin/location-services*')) ? 'active' : '' ?>">Location Pages</a>
            <a href="<?= base_url('admin/location-matrix') ?>" class="sidebar-link <?= (url_is('admin/location-matrix*')) ? 'active' : '' ?>">Location Matrix</a>
            <a href="<?= base_url('admin/portfolio') ?>" class="sidebar-link <?= (url_is('admin/portfolio*')) ? 'active' : '' ?>">Portfolio</a>
            <a href="<?= base_url('admin/case-studies') ?>" class="sidebar-link <?= (url_is('admin/case-studies*')) ? 'active' : '' ?>">Case Studies</a>
            <a href="<?= base_url('admin/blog') ?>" class="sidebar-link <?= (url_is('admin/blog*') && !url_is('admin/blog-categories*') && !url_is('admin/blog-tags*')) ? 'active' : '' ?>">Blog Posts</a>
            <a href="<?= base_url('admin/blog-categories') ?>" class="sidebar-link <?= (url_is('admin/blog-categories*')) ? 'active' : '' ?>">Blog Categories</a>
            <a href="<?= base_url('admin/blog-tags') ?>" class="sidebar-link <?= (url_is('admin/blog-tags*')) ? 'active' : '' ?>">Blog Tags</a>
            <a href="<?= base_url('admin/content-dashboard') ?>" class="sidebar-link <?= (url_is('admin/content-dashboard*')) ? 'active' : '' ?>"><i class="bi bi-diagram-3"></i> Content Arch</a>
            <a href="<?= base_url('admin/seo-audit') ?>" class="sidebar-link <?= (url_is('admin/seo-audit*')) ? 'active' : '' ?>"><i class="bi bi-heart-pulse"></i> Technical SEO</a>
            <a href="<?= base_url('admin/seo-keywords') ?>" class="sidebar-link <?= (url_is('admin/seo-keywords*')) ? 'active' : '' ?>">SEO Keywords</a>
            <a href="<?= base_url('admin/leads') ?>" class="sidebar-link <?= (url_is('admin/leads*')) ? 'active' : '' ?>">Leads</a>
            <a href="<?= base_url('admin/faqs') ?>" class="sidebar-link <?= (url_is('admin/faqs*')) ? 'active' : '' ?>">FAQs</a>
            <a href="<?= base_url('admin/internal-links') ?>" class="sidebar-link <?= (url_is('admin/internal-links*')) ? 'active' : '' ?>">Link Audit</a>
            <a href="<?= base_url('admin/seo-settings') ?>" class="sidebar-link <?= (url_is('admin/seo-settings*')) ? 'active' : '' ?>">Global SEO</a>
        </nav>
        <div class="p-4 border-t border-border">
            <a href="<?= base_url('admin/logout') ?>" class="sidebar-link text-red-400 hover:text-red-300">Logout</a>
        </div>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col min-w-0 overflow-hidden bg-background">
        <header class="h-20 flex items-center justify-between px-6 border-b border-border bg-surface lg:justify-end">
            <button @click="sidebarOpen = true" class="text-text-muted hover:text-text lg:hidden">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" /></svg>
            </button>
            <div class="flex items-center space-x-4">
                <!-- Admin Theme Toggle -->
                <button id="admin-theme-toggle" type="button" class="text-text-muted hover:text-text focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary rounded-md p-2 transition-colors" aria-label="Toggle Dark Mode">
                    <svg id="admin-dark-icon" class="w-5 h-5 hidden" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                    </svg>
                    <svg id="admin-light-icon" class="w-5 h-5 hidden" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4.22 1.364a1 1 0 011.415 0l.707.707a1 1 0 01-1.414 1.415l-.707-.707a1 1 0 010-1.415zM18 10a1 1 0 01-1 1h-1a1 1 0 110-2h1a1 1 0 011 1zM15.636 15.636a1 1 0 010 1.415l-.707.707a1 1 0 01-1.415-1.414l.707-.707a1 1 0 011.415 0zM10 16a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zm-4.22-1.364a1 1 0 01-1.415 0l-.707-.707a1 1 0 011.414-1.415l.707.707a1 1 0 010 1.415zM2 10a1 1 0 011-1h1a1 1 0 110 2H3a1 1 0 01-1-1zM4.364 4.364a1 1 0 010-1.415l.707-.707a1 1 0 011.414 1.415l-.707.707a1 1 0 01-1.415 0z" clip-rule="evenodd"></path>
                    </svg>
                </button>
                <span class="text-sm text-text-muted">Welcome, <?= esc(session()->get('name')) ?></span>
            </div>
        </header>
        
        <main class="flex-1 overflow-y-auto p-6">
            <?php if (session()->getFlashdata('error')) : ?>
                <div class="bg-danger/10 border border-danger text-danger px-4 py-3 rounded-lg mb-6"><?= esc(session()->getFlashdata('error')) ?></div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('success')) : ?>
                <div class="bg-success/10 border border-success text-success px-4 py-3 rounded-lg mb-6"><?= esc(session()->getFlashdata('success')) ?></div>
            <?php endif; ?>
            
            <?= $this->renderSection('content') ?>
        </main>
    </div>

<script>
    // Admin theme toggle (uses same localStorage key as public site)
    const adminToggle = document.getElementById('admin-theme-toggle');
    const adminDarkIcon = document.getElementById('admin-dark-icon');
    const adminLightIcon = document.getElementById('admin-light-icon');

    if (document.documentElement.classList.contains('dark')) {
        adminLightIcon.classList.remove('hidden');
    } else {
        adminDarkIcon.classList.remove('hidden');
    }

    adminToggle.addEventListener('click', function() {
        adminDarkIcon.classList.toggle('hidden');
        adminLightIcon.classList.toggle('hidden');

        if (document.documentElement.classList.contains('dark')) {
            document.documentElement.classList.remove('dark');
            localStorage.setItem('theme', 'light');
        } else {
            document.documentElement.classList.add('dark');
            localStorage.setItem('theme', 'dark');
        }
    });
</script>
</body>
</html>
