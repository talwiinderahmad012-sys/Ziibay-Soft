<!-- ZIIBAY SOFT - PREMIUM CINEMATIC DESIGN SYSTEM -->
<!-- Global Design Tokens, Typography, & Visual Language -->

<style>
:root {
    /* ============================================================
       DARK MODE (Primary)
       ============================================================ */
    
    /* Background Colors - Deep Cinematic */
    --color-bg-primary: #070B10;
    --color-bg-secondary: #0B1622;
    --color-bg-tertiary: #102333;
    --color-bg-quaternary: #142B3B;
    
    /* Surface Colors */
    --color-surface: rgba(15, 23, 42, 0.5);
    --color-surface-elevated: rgba(30, 41, 59, 0.6);
    --color-surface-hover: rgba(51, 65, 85, 0.4);
    
    /* Text Colors */
    --color-text-primary: #F5F7FA;
    --color-text-secondary: #B8C5D1;
    --color-text-muted: #7D8B98;
    
    /* Accent Colors */
    --color-accent-cyan: #06B6D4;
    --color-accent-cyan-light: #22D3EE;
    --color-accent-blue: #3B82F6;
    --color-accent-blue-light: #60A5FA;
    --color-accent-violet: rgba(99, 102, 241, 0.1);
    
    /* Accents with Glow */
    --color-glow-cyan: rgba(6, 182, 212, 0.2);
    --color-glow-blue: rgba(59, 130, 246, 0.15);
    
    /* Borders */
    --color-border: rgba(148, 163, 184, 0.15);
    --color-border-light: rgba(148, 163, 184, 0.25);
    --color-border-accent: rgba(6, 182, 212, 0.3);
    
    /* Spacing System */
    --spacing-xs: 0.25rem;
    --spacing-sm: 0.5rem;
    --spacing-md: 1rem;
    --spacing-lg: 1.5rem;
    --spacing-xl: 2rem;
    --spacing-2xl: 3rem;
    --spacing-3xl: 4rem;
    --spacing-4xl: 6rem;
    --spacing-5xl: 8rem;
    
    /* Border Radius */
    --radius-sm: 4px;
    --radius-md: 8px;
    --radius-lg: 12px;
    --radius-xl: 16px;
    --radius-2xl: 20px;
    --radius-full: 9999px;
    
    /* Shadows */
    --shadow-sm: 0 1px 2px rgba(0, 0, 0, 0.05);
    --shadow-md: 0 4px 6px rgba(0, 0, 0, 0.1);
    --shadow-lg: 0 10px 15px rgba(0, 0, 0, 0.1);
    --shadow-xl: 0 20px 25px rgba(0, 0, 0, 0.1);
    --shadow-2xl: 0 25px 50px rgba(0, 0, 0, 0.25);
    --shadow-glow: 0 0 30px rgba(6, 182, 212, 0.2);
    --shadow-glow-blue: 0 0 30px rgba(59, 130, 246, 0.15);
    
    /* Motion */
    --duration-fast: 150ms;
    --duration-base: 300ms;
    --duration-slow: 500ms;
    --duration-slower: 700ms;
    --easing-ease-out: cubic-bezier(0.4, 0, 0.2, 1);
    --easing-ease-in: cubic-bezier(0.4, 0, 1, 1);
    --easing-ease-in-out: cubic-bezier(0.4, 0, 0.2, 1);
    
    /* Container Widths */
    --container-sm: 480px;
    --container-md: 768px;
    --container-lg: 1024px;
    --container-xl: 1280px;
    --container-2xl: 1440px;
    
    /* Grid & Layout */
    --grid-columns: 12;
    --grid-gap: 1.5rem;
    
    /* Film Grain Opacity */
    --grain-opacity: 0.015;
}

html.dark {
    color-scheme: dark;
}

html.light,
body.light {
    /* ============================================================
       LIGHT MODE (Secondary)
       ============================================================ */
    --color-bg-primary: #F5F7F8;
    --color-bg-secondary: #FFFFFF;
    --color-bg-tertiary: #EEF2F4;
    --color-bg-quaternary: #E5EAF0;
    
    --color-surface: rgba(255, 255, 255, 0.6);
    --color-surface-elevated: rgba(255, 255, 255, 0.9);
    --color-surface-hover: rgba(248, 250, 252, 0.95);
    
    --color-text-primary: #101722;
    --color-text-secondary: #394858;
    --color-text-muted: #667585;
    
    --color-accent-cyan: #06B6D4;
    --color-accent-cyan-light: #0891B2;
    --color-accent-blue: #3B82F6;
    --color-accent-blue-light: #2563EB;
    
    --color-glow-cyan: rgba(6, 182, 212, 0.1);
    --color-glow-blue: rgba(59, 130, 246, 0.1);
    
    --color-border: rgba(100, 116, 139, 0.15);
    --color-border-light: rgba(100, 116, 139, 0.2);
    --color-border-accent: rgba(6, 182, 212, 0.3);
}

/* ============================================================
   GLOBAL TYPOGRAPHY SYSTEM
   ============================================================ */

@import url('https://fonts.googleapis.com/css2?family=Manrope:wght@200;300;400;500;600;700;800&display=swap');
@import url('https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;500;600;700&display=swap');

/* Display Font (Editorial Headlines) */
@font-face {
    font-family: 'Oswald';
    src: url('https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&display=swap');
}

body {
    font-family: 'Manrope', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
    background-color: var(--color-bg-primary);
    color: var(--color-text-primary);
    line-height: 1.6;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}

/* Typography Scale */
h1 {
    font-size: clamp(2rem, 5vw, 4rem);
    line-height: 1.2;
    letter-spacing: -0.02em;
    font-weight: 700;
    font-family: 'Oswald', 'Manrope', sans-serif;
}

h2 {
    font-size: clamp(1.5rem, 3.5vw, 2.5rem);
    line-height: 1.3;
    letter-spacing: -0.015em;
    font-weight: 700;
}

h3 {
    font-size: clamp(1.25rem, 2.5vw, 1.75rem);
    line-height: 1.4;
    font-weight: 600;
}

h4 {
    font-size: 1.125rem;
    font-weight: 600;
}

h5, h6 {
    font-size: 1rem;
    font-weight: 600;
}

p {
    font-size: 1rem;
    line-height: 1.7;
    color: var(--color-text-secondary);
}

.text-sm {
    font-size: 0.875rem;
    line-height: 1.5;
}

.text-xs {
    font-size: 0.75rem;
    line-height: 1.5;
}

/* Metadata Typography */
.text-meta {
    font-family: 'JetBrains Mono', monospace;
    font-size: 0.6875rem;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    font-weight: 500;
    color: var(--color-text-muted);
}

.text-caption {
    font-size: 0.65rem;
    letter-spacing: 0.08em;
    text-transform: uppercase;
    font-weight: 600;
    color: var(--color-accent-cyan);
}

/* ============================================================
   FILM GRAIN TEXTURE
   ============================================================ */

html::before {
    content: '';
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    pointer-events: none;
    z-index: 1;
    background-image: 
        url("data:image/svg+xml,%3Csvg viewBox='0 0 400 400' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noiseFilter'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' seed='2'/%3E%3C/filter%3E%3Crect width='400' height='400' filter='url(%23noiseFilter)' opacity='0.05'/%3E%3C/svg%3E");
    opacity: var(--grain-opacity);
    animation: grain-drift 20s infinite linear;
}

@keyframes grain-drift {
    0% { transform: translate(0, 0); }
    100% { transform: translate(40px, 60px); }
}

/* ============================================================
   SCROLL PROGRESS INDICATOR
   ============================================================ */

.scroll-progress {
    position: fixed;
    top: 0;
    left: 0;
    height: 2px;
    background: linear-gradient(90deg, var(--color-accent-cyan), var(--color-accent-blue));
    width: 0%;
    z-index: 100;
    transition: width var(--duration-base) var(--easing-ease-out);
}

/* ============================================================
   SECTION COLOR TRANSITIONS
   ============================================================ */

.section-dark {
    background-color: var(--color-bg-primary);
}

.section-dark-alt {
    background-color: var(--color-bg-secondary);
}

.section-light {
    background-color: #F5F7F8;
    color: #101722;
}

.section-light.light {
    background-color: #FFFFFF;
}

/* Animated section borders */
.section-transition {
    position: relative;
    overflow: hidden;
}

.section-transition::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 1px;
    background: linear-gradient(90deg, transparent, var(--color-accent-cyan), transparent);
    opacity: 0.5;
}

/* ============================================================
   TECHNICAL GRID
   ============================================================ */

.tech-grid-bg {
    position: relative;
    background-image: 
        linear-gradient(90deg, var(--color-border) 1px, transparent 1px),
        linear-gradient(0deg, var(--color-border) 1px, transparent 1px);
    background-size: 60px 60px;
    opacity: 0.3;
}

.tech-grid-animated {
    animation: grid-drift 30s infinite linear;
}

@keyframes grid-drift {
    0% { background-position: 0 0; }
    100% { background-position: 60px 60px; }
}

/* ============================================================
   COMPONENT STYLES
   ============================================================ */

/* Buttons - Premium Technical Treatment */
.btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 0.75rem 1.5rem;
    border-radius: var(--radius-md);
    font-size: 0.875rem;
    font-weight: 600;
    transition: all var(--duration-base) var(--easing-ease-out);
    cursor: pointer;
    border: 1px solid transparent;
    text-decoration: none;
    white-space: nowrap;
}

.btn-primary {
    background-color: var(--color-accent-cyan);
    color: #000;
    border-color: var(--color-accent-cyan);
    box-shadow: 0 0 20px var(--color-glow-cyan);
}

.btn-primary:hover {
    background-color: var(--color-accent-cyan-light);
    transform: translateY(-2px);
    box-shadow: 0 0 30px var(--color-glow-cyan);
}

.btn-secondary {
    background-color: transparent;
    color: var(--color-accent-cyan);
    border-color: var(--color-accent-cyan);
}

.btn-secondary:hover {
    background-color: var(--color-glow-cyan);
    transform: translateY(-2px);
}

.btn-ghost {
    background-color: transparent;
    color: var(--color-text-primary);
    border-color: transparent;
}

.btn-ghost:hover {
    color: var(--color-accent-cyan);
}

.btn:focus-visible {
    outline: 2px solid var(--color-accent-cyan);
    outline-offset: 2px;
}

/* Links with Animated Arrow */
.link-arrow {
    position: relative;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    text-decoration: none;
    color: var(--color-accent-cyan);
    transition: gap var(--duration-base);
}

.link-arrow::after {
    content: '→';
    transition: transform var(--duration-base) var(--easing-ease-out);
}

.link-arrow:hover::after {
    transform: translateX(4px);
}

/* Forms - Premium Technical Interface */
input,
textarea,
select {
    background-color: var(--color-surface);
    color: var(--color-text-primary);
    border: 1px solid var(--color-border);
    border-radius: var(--radius-md);
    padding: 0.75rem 1rem;
    font-family: inherit;
    transition: all var(--duration-base);
}

input:focus,
textarea:focus,
select:focus {
    outline: none;
    border-color: var(--color-accent-cyan);
    box-shadow: 0 0 0 3px var(--color-glow-cyan);
}

input::placeholder {
    color: var(--color-text-muted);
}

/* Cards / Panels */
.card {
    background-color: var(--color-surface-elevated);
    border: 1px solid var(--color-border);
    border-radius: var(--radius-lg);
    padding: var(--spacing-xl);
    transition: all var(--duration-base);
}

.card:hover {
    background-color: var(--color-surface-hover);
    border-color: var(--color-border-light);
}

.card-tech {
    background: linear-gradient(135deg, var(--color-surface) 0%, var(--color-surface-elevated) 100%);
    border: 1px solid var(--color-border-accent);
    box-shadow: var(--shadow-glow);
}

/* ============================================================
   REVEAL ANIMATIONS
   ============================================================ */

.reveal-on-scroll {
    opacity: 0;
    transform: translateY(20px);
    transition: opacity var(--duration-slow) var(--easing-ease-out), 
                transform var(--duration-slow) var(--easing-ease-out);
}

.reveal-on-scroll.is-revealed {
    opacity: 1;
    transform: translateY(0);
}

.fade-in {
    animation: fade-in var(--duration-slow) var(--easing-ease-out) forwards;
}

@keyframes fade-in {
    from { opacity: 0; }
    to { opacity: 1; }
}

.slide-up {
    animation: slide-up var(--duration-slow) var(--easing-ease-out) forwards;
}

@keyframes slide-up {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* ============================================================
   ACCESSIBILITY
   ============================================================ */

@media (prefers-reduced-motion: reduce) {
    * {
        animation-duration: 0.01ms !important;
        animation-iteration-count: 1 !important;
        transition-duration: 0.01ms !important;
    }
    
    html::before {
        animation: none;
    }
}

/* ============================================================
   RESPONSIVE ADJUSTMENTS
   ============================================================ */

@media (max-width: 768px) {
    :root {
        --grid-gap: 1rem;
        --grain-opacity: 0.02;
    }
    
    h1 {
        font-size: clamp(1.5rem, 4vw, 2.5rem);
    }
    
    h2 {
        font-size: clamp(1.25rem, 3vw, 1.75rem);
    }
}

/* Respect prefers-color-scheme */
@media (prefers-color-scheme: light) {
    html {
        --color-bg-primary: #F5F7F8;
        --color-bg-secondary: #FFFFFF;
        --color-text-primary: #101722;
        --color-text-secondary: #394858;
    }
}
</style>
