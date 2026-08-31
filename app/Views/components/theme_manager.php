<!-- Tailwind & Alpine Scripts -->
<script src="https://cdn.tailwindcss.com"></script>
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

<!-- Premium Design System -->
<?= $this->include('components/design_system') ?>

<!-- Theme Variables (Light & Dark) -->
<style type="text/tailwindcss">
    :root {
        /* LIGHT MODE - soft, editorial, premium neutral */
        --bg-color: #eef2f5;
        --bg-color-alt: #e5eaef;
        --surface-color: rgba(255, 255, 255, 0.7);
        --surface-hover: rgba(248, 250, 252, 0.95);
        --border-color: rgba(100, 116, 139, 0.18);
        
        --text-color: #0f172a;
        --text-muted: #475569;
        --text-on-primary: #ffffff;
        
        --primary-color: #0ea5e9;
        --primary-hover: #0284c7;
        --primary-light: #7dd3fc;
        --primary-glow: rgba(14, 165, 233, 0.18);
        
        --accent-violet: #6366f1;
        --accent-teal: #38bdf8;
        --accent-amber: #d97706;

        --glass-bg: rgba(255, 255, 255, 0.65);
        --glass-border: rgba(148, 163, 184, 0.2);

        --glass-heavy-bg: rgba(255, 255, 255, 0.8);
        --glass-heavy-border: rgba(148, 163, 184, 0.22);
    }

    .dark {
        /* DARK MODE - Cinematic, deep graphite, midnight navy */
        --bg-color: #040914;
        --bg-color-alt: #0a1120;
        --surface-color: rgba(15, 23, 42, 0.6);
        --surface-hover: rgba(30, 41, 59, 0.8);
        --border-color: rgba(51, 65, 85, 0.5);
        
        --text-color: #f8fafc;
        --text-muted: #94a3b8;
        --text-on-primary: #ffffff;
        
        /* Accents - Subtle cyan illumination */
        --primary-color: #06b6d4;
        --primary-hover: #0891b2;
        --primary-light: #22d3ee;
        --primary-glow: rgba(6, 182, 212, 0.3);
        
        --accent-violet: #818cf8;
        --accent-teal: #14b8a6;
        --accent-amber: #f59e0b;

        --glass-bg: rgba(15, 23, 42, 0.45);
        --glass-border: rgba(51, 65, 85, 0.6);

        --glass-heavy-bg: rgba(4, 9, 20, 0.85);
        --glass-heavy-border: rgba(51, 65, 85, 0.8);
    }

    /* Global Body resets based on theme */
    body {
        background-color: #edf3f5;
        color: var(--text-color);
        background-image:
            radial-gradient(circle at 50% 0%, rgba(255,255,255,0.8), transparent 30%),
            linear-gradient(to right, rgba(136,146,160,0.16) 1px, transparent 1px),
            linear-gradient(to bottom, rgba(136,146,160,0.16) 1px, transparent 1px);
        background-size: auto, 96px 96px, 96px 96px;
        background-attachment: fixed;
        background-position: center top, center top, center top;
        position: relative;
    }
    
    body::before {
        content: '';
        position: fixed;
        inset: 0;
        background: radial-gradient(circle at 50% 22%, rgba(14,165,233,0.08), transparent 28%);
        z-index: -1;
        pointer-events: none;
    }

    /* Glass Panels */
    .glass-panel {
        background: var(--glass-bg);
        backdrop-filter: blur(16px);
        -webkit-backdrop-filter: blur(16px);
        border: 1px solid var(--glass-border);
    }
    
    .glass-panel-heavy {
        background: var(--glass-heavy-bg);
        backdrop-filter: blur(24px);
        -webkit-backdrop-filter: blur(24px);
        border-bottom: 1px solid var(--glass-heavy-border);
    }

    .hero-matrix-soft {
        background:
            radial-gradient(circle at center, rgba(14, 165, 233, 0.08), transparent 25%),
            linear-gradient(180deg, rgba(255,255,255,0.12), rgba(255,255,255,0.0));
    }

    .hero-editorial {
        font-family: Georgia, 'Times New Roman', serif;
        font-weight: 500;
        letter-spacing: -0.05em;
    }

    .glow-primary {
        box-shadow: 0 0 24px var(--primary-glow);
    }

    /* Focus rings for accessibility */
    *:focus-visible {
        outline: 2px solid var(--primary-color);
        outline-offset: 2px;
    }

    /* Typography Levels */
    @layer components {
        h1, .h1 { @apply text-4xl md:text-5xl lg:text-7xl font-extrabold tracking-tighter text-text; }
        h2, .h2 { @apply text-3xl md:text-4xl lg:text-5xl font-bold tracking-tight text-text; }
        h3, .h3 { @apply text-2xl md:text-3xl font-semibold tracking-tight text-text; }
        h4, .h4 { @apply text-xl md:text-2xl font-semibold text-text; }
        .text-body { @apply text-base md:text-lg text-text-muted leading-relaxed; }
        .text-small { @apply text-sm text-text-muted; }
        .text-caption { @apply text-xs text-text-muted uppercase tracking-[0.2em] font-bold; }
        
        /* Interactive Elements */
        .tech-link { @apply relative inline-flex items-center text-primary font-medium hover:text-primary-light transition-colors duration-300; }
        .tech-link::after { @apply content-[''] absolute -bottom-1 left-0 w-0 h-[2px] bg-primary transition-all duration-300; }
        .tech-link:hover::after { @apply w-full; }
    }

    .btn-primary,
    .btn-secondary {
        border-radius: 9999px !important;
        letter-spacing: -0.02em;
    }

    /* Subtle Animations */
    @keyframes float {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-10px); }
    }
    @keyframes pulse-glow {
        0%, 100% { opacity: 0.8; }
        50% { opacity: 0.4; }
    }
    @keyframes slide-up-fade {
        0% { opacity: 0; transform: translateY(20px); }
        100% { opacity: 1; transform: translateY(0); }
    }
    @keyframes shimmer {
        100% { transform: translateX(100%); }
    }
    
    .animate-float { animation: float 6s ease-in-out infinite; }
    .animate-pulse-glow { animation: pulse-glow 4s ease-in-out infinite; }
    .animate-slide-up { animation: slide-up-fade 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards; }
    .animate-shimmer { animation: shimmer 1.5s infinite; }

    /* Shining Text Effect */
    .shining-text {
        background: linear-gradient(110deg, var(--primary) 20%, var(--primary-light) 40%, var(--accent-violet) 60%, var(--primary) 80%);
        background-size: 200% auto;
        color: transparent;
        -webkit-background-clip: text;
        background-clip: text;
        animation: shine 4s linear infinite;
    }
    @keyframes shine {
        to { background-position: 200% center; }
    }

    /* --- 21st.dev Interaction Styles --- */
    
    /* 1. Spotlight Card */
    .spotlight-card {
        position: relative;
        overflow: hidden;
    }
    .spotlight-card::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        pointer-events: none;
        background: radial-gradient(
            600px circle at var(--mouse-x, 50%) var(--mouse-y, 50%),
            rgba(255,255,255,0.06),
            transparent 40%
        );
        z-index: 10;
        opacity: 0;
        transition: opacity 0.5s;
    }
    .dark .spotlight-card::before {
        background: radial-gradient(
            600px circle at var(--mouse-x, 50%) var(--mouse-y, 50%),
            rgba(255,255,255,0.08),
            transparent 40%
        );
    }
    .spotlight-card:hover::before {
        opacity: 1;
    }

    /* 2. Custom Cursor */
    .custom-cursor {
        position: fixed;
        top: -15px;
        left: -15px;
        width: 30px;
        height: 30px;
        border: 1px solid var(--primary);
        border-radius: 50%;
        pointer-events: none;
        z-index: 9999;
        transition: width 0.3s, height 0.3s, top 0.3s, left 0.3s, background-color 0.3s;
        mix-blend-mode: difference;
    }
    .custom-cursor-dot {
        position: fixed;
        top: -3px;
        left: -3px;
        width: 6px;
        height: 6px;
        background-color: var(--primary);
        border-radius: 50%;
        pointer-events: none;
        z-index: 10000;
        transition: transform 0.1s;
    }
    .cursor-hover.custom-cursor {
        width: 50px;
        height: 50px;
        top: -25px;
        left: -25px;
        background-color: rgba(255,255,255,0.1);
        border-color: transparent;
    }
    .cursor-hover.custom-cursor-dot {
        transform: scale(0);
    }
    /* Hide default cursor only on large screens */
    @media (pointer: fine) {
        body { cursor: none; }
        a, button, input, select, textarea { cursor: none; }
    }

    /* 3. Scroll Choreography */
    .reveal-on-scroll {
        opacity: 0;
        transform: translateY(30px);
        transition: opacity 0.8s cubic-bezier(0.16, 1, 0.3, 1), transform 0.8s cubic-bezier(0.16, 1, 0.3, 1);
        will-change: opacity, transform;
    }
    .reveal-on-scroll.is-revealed {
        opacity: 1;
        transform: translateY(0);
    }
    /* Staggered reveals */
    .reveal-delay-100 { transition-delay: 100ms; }
    .reveal-delay-200 { transition-delay: 200ms; }
    .reveal-delay-300 { transition-delay: 300ms; }
    .reveal-delay-400 { transition-delay: 400ms; }

    /* 4. Tubelight Navbar (Scrolled state) */
    .nav-scrolled {
        background-color: rgba(255, 255, 255, 0.82) !important;
        box-shadow: 0 10px 30px -15px rgba(15, 23, 42, 0.18);
        border-color: var(--border-color);
        top: 10px !important;
    }
    .dark .nav-scrolled {
        background-color: rgba(10, 17, 32, 0.85) !important;
        box-shadow: 0 10px 40px -10px rgba(0, 0, 0, 0.8), inset 0 -1px 0 rgba(255,255,255,0.05);
    }

    /* Tubelight Nav Items */
    .nav-item {
        position: relative;
    }
    .nav-item::before {
        content: "";
        position: absolute;
        top: -4px;
        left: 50%;
        transform: translateX(-50%) scaleX(0);
        width: 30px;
        height: 2px;
        background: var(--primary);
        box-shadow: 0 0 10px var(--primary-glow);
        transition: transform 0.3s;
        border-radius: 2px;
    }
    .nav-item:hover::before, .nav-item.active::before {
        transform: translateX(-50%) scaleX(1);
    }

    /* 5. Liquid Button / Spotlight Button styles */
    .btn-liquid {
        position: relative;
        overflow: hidden;
    }
    .btn-liquid::after {
        content: "";
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: linear-gradient(to right, transparent, rgba(255,255,255,0.2), transparent);
        transform: rotate(30deg) translateX(-100%);
        transition: transform 0.7s cubic-bezier(0.16, 1, 0.3, 1);
    }
    .btn-liquid:hover::after {
        transform: rotate(30deg) translateX(100%);
    }

    /* 6. Shimmer Button */
    .btn-shimmer {
        position: relative;
        overflow: hidden;
    }
    .btn-shimmer::before {
        content: "";
        position: absolute;
        top: 0;
        left: -100%;
        width: 50%;
        height: 100%;
        background: linear-gradient(to right, transparent, rgba(255,255,255,0.3), transparent);
        transform: skewX(-20deg);
        animation: shimmer-btn 3s infinite;
    }
    @keyframes shimmer-btn {
        0% { left: -100%; }
        20% { left: 200%; }
        100% { left: 200%; }
    }

    /* Motion preferences */
    @media (prefers-reduced-motion: reduce) {
        *, ::before, ::after {
            animation-duration: 0.01ms !important;
            animation-iteration-count: 1 !important;
            transition-duration: 0.01ms !important;
            scroll-behavior: auto !important;
        }
        .reveal-on-scroll { opacity: 1; transform: none; transition: none; }
    }
</style>

<!-- Tailwind Config overriding default theme with CSS variables -->
<script>
    tailwind.config = {
        darkMode: 'class',
        theme: {
            container: {
                center: true,
                padding: {
                    DEFAULT: '1.5rem',
                    sm: '2rem',
                    lg: '4rem',
                    xl: '5rem',
                    '2xl': '6rem',
                },
                screens: {
                    sm: '640px',
                    md: '768px',
                    lg: '1024px',
                    xl: '1280px',
                    '2xl': '1440px',
                }
            },
            extend: {
                colors: {
                    background: 'var(--bg-color)',
                    'background-alt': 'var(--bg-color-alt)',
                    surface: 'var(--surface-color)',
                    'surface-hover': 'var(--surface-hover)',
                    border: 'var(--border-color)',
                    primary: {
                        DEFAULT: 'var(--primary-color)',
                        hover: 'var(--primary-hover)',
                        light: 'var(--primary-light)',
                        glow: 'var(--primary-glow)'
                    },
                    accent: {
                        violet: 'var(--accent-violet)',
                        teal: 'var(--accent-teal)',
                        amber: 'var(--accent-amber)'
                    },
                    text: {
                        DEFAULT: 'var(--text-color)',
                        muted: 'var(--text-muted)',
                        onprimary: 'var(--text-on-primary)'
                    }
                },
                fontFamily: {
                    sans: ['Inter', 'system-ui', 'sans-serif'],
                    display: ['Inter', 'system-ui', 'sans-serif'],
                    mono: ['JetBrains Mono', 'Menlo', 'monospace'],
                },
                boxShadow: {
                    'glass': '0 8px 32px 0 rgba(0, 0, 0, 0.05)',
                    'glass-dark': '0 8px 32px 0 rgba(0, 0, 0, 0.3)',
                    'tech': '0 0 0 1px var(--border-color), 0 4px 12px var(--primary-glow)',
                },
                backgroundImage: {
                    'gradient-radial': 'radial-gradient(var(--tw-gradient-stops))',
                    'gradient-tech': 'linear-gradient(135deg, var(--bg-color) 0%, var(--bg-color-alt) 100%)',
                }
            }
        }
    }
</script>

<!-- Theme initialization script (prevents FOUC) -->
<script>
    (function() {
        const storedTheme = localStorage.getItem('theme');

        if (storedTheme === 'dark') {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    })();
</script>
