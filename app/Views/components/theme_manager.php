<!-- Tailwind & Alpine Scripts -->
<script src="https://cdn.tailwindcss.com"></script>
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

<!-- Theme Variables (Light & Dark) -->
<style type="text/tailwindcss">
    :root {
        --bg-color: #f8fafc;
        --surface-color: #ffffff;
        --surface-hover: #f1f5f9;
        --border-color: #e2e8f0;
        
        --text-color: #0f172a;
        --text-muted: #64748b;
        --text-on-primary: #ffffff;
        
        --primary-color: #0891b2; /* Slightly darker cyan for contrast in light mode */
        --primary-hover: #0e7490;
        --primary-light: #06b6d4;
        --primary-glow: rgba(8, 145, 178, 0.2);

        --glass-bg: rgba(255, 255, 255, 0.7);
        --glass-border: rgba(0, 0, 0, 0.05);

        --glass-heavy-bg: rgba(248, 250, 252, 0.85);
        --glass-heavy-border: rgba(0, 0, 0, 0.1);
    }

    .dark {
        --bg-color: #0a0f18;
        --surface-color: #111827;
        --surface-hover: #1f2937;
        --border-color: #374151;
        
        --text-color: #f9fafb;
        --text-muted: #9ca3af;
        --text-on-primary: #f9fafb;
        
        --primary-color: #06b6d4;
        --primary-hover: #0891b2;
        --primary-light: #22d3ee;
        --primary-glow: rgba(6, 182, 212, 0.4);

        --glass-bg: rgba(17, 24, 39, 0.7);
        --glass-border: rgba(255, 255, 255, 0.05);

        --glass-heavy-bg: rgba(10, 15, 24, 0.85);
        --glass-heavy-border: rgba(255, 255, 255, 0.05);
    }

    /* Global Body resets based on theme */
    body {
        background-color: var(--bg-color);
        color: var(--text-color);
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

    .glow-primary {
        box-shadow: 0 0 20px var(--primary-glow);
    }

    /* Focus rings for accessibility */
    *:focus-visible {
        outline: 2px solid var(--primary-color);
        outline-offset: 2px;
    }

    /* Typography Levels */
    @layer components {
        h1, .h1 { @apply text-4xl md:text-5xl lg:text-6xl xl:text-7xl font-bold tracking-tight text-text; }
        h2, .h2 { @apply text-3xl md:text-4xl lg:text-5xl font-bold tracking-tight text-text; }
        h3, .h3 { @apply text-2xl md:text-3xl font-semibold tracking-tight text-text; }
        h4, .h4 { @apply text-xl md:text-2xl font-semibold text-text; }
        .text-body { @apply text-base md:text-lg text-text-muted; }
        .text-small { @apply text-sm text-text-muted; }
        .text-caption { @apply text-xs text-text-muted uppercase tracking-wider font-semibold; }
    }

    /* Motion preferences */
    @media (prefers-reduced-motion: reduce) {
        * {
            animation-duration: 0.01ms !important;
            animation-iteration-count: 1 !important;
            transition-duration: 0.01ms !important;
            scroll-behavior: auto !important;
        }
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
                    DEFAULT: '1rem',
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
                    surface: 'var(--surface-color)',
                    'surface-hover': 'var(--surface-hover)',
                    border: 'var(--border-color)',
                    primary: {
                        DEFAULT: 'var(--primary-color)',
                        hover: 'var(--primary-hover)',
                        light: 'var(--primary-light)',
                        glow: 'var(--primary-glow)'
                    },
                    secondary: {
                        DEFAULT: '#6366f1',
                        hover: '#4f46e5'
                    },
                    text: {
                        DEFAULT: 'var(--text-color)',
                        muted: 'var(--text-muted)',
                        onprimary: 'var(--text-on-primary)'
                    },
                    success: '#10b981',
                    warning: '#f59e0b',
                    danger: '#ef4444'
                },
                fontFamily: {
                    sans: ['Inter', 'system-ui', 'sans-serif'],
                    display: ['Inter', 'system-ui', 'sans-serif'],
                }
            }
        }
    }
</script>

<!-- Theme initialization script (prevents FOUC) -->
<script>
    (function() {
        // Read theme from localStorage or system preference
        const storedTheme = localStorage.getItem('theme');
        const systemPrefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
        
        if (storedTheme === 'dark' || (!storedTheme && systemPrefersDark)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    })();
</script>
