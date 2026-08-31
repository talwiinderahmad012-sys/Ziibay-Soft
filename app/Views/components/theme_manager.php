<!-- Tailwind Scripts -->
<script src="https://cdn.tailwindcss.com"></script>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,300;400;600&family=Inter:wght@400;500;600&family=Space+Mono:wght@400;700&display=swap" rel="stylesheet">

<style type="text/tailwindcss">
    :root {
        --paper: #ECECEA;
        --ink: #1E3448;
        --navy: #14222F;
        --mist: #A9C6DC;
        --crt: #59A7DC;
        --hairline-light: rgba(30, 52, 72, 0.25);
        --hairline-dark: rgba(169, 198, 220, 0.25);
    }

    body {
        background-color: var(--paper);
        color: var(--ink);
        font-family: 'Inter', sans-serif;
        position: relative;
        overflow-x: hidden;
    }

    /* SVG Noise Overlay */
    body::after {
        content: '';
        position: fixed;
        inset: 0;
        z-index: 9999;
        pointer-events: none;
        background: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noiseFilter'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.85' numOctaves='3' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noiseFilter)'/%3E%3C/svg%3E");
        opacity: 0.05;
        mix-blend-mode: multiply;
    }
    .bg-navy::after {
        mix-blend-mode: overlay;
        opacity: 0.06;
    }

    .font-serif-display {
        font-family: 'Fraunces', serif;
        letter-spacing: -0.04em;
    }
    
    .font-mono-tag {
        font-family: 'Space Mono', monospace;
        letter-spacing: 0.1em;
        text-transform: uppercase;
    }

    .hairline-b { border-bottom: 1px solid var(--hairline-light); }
    .hairline-t { border-top: 1px solid var(--hairline-light); }
    .hairline-l { border-left: 1px solid var(--hairline-light); }
    .hairline-r { border-right: 1px solid var(--hairline-light); }
    .hairline { border: 1px solid var(--hairline-light); }
    
    .bg-navy .hairline-b { border-bottom: 1px solid var(--hairline-dark); }
    .bg-navy .hairline-t { border-top: 1px solid var(--hairline-dark); }
    .bg-navy .hairline-l { border-left: 1px solid var(--hairline-dark); }
    .bg-navy .hairline-r { border-right: 1px solid var(--hairline-dark); }
    .bg-navy .hairline { border: 1px solid var(--hairline-dark); }

    .bg-navy { background-color: var(--navy); color: var(--mist); }

    .section-frame {
        margin: 1.5rem;
        border: 1px solid var(--hairline-light);
        border-radius: 8px;
        position: relative;
    }
    .bg-navy .section-frame {
        border-color: var(--hairline-dark);
    }

    .chip {
        @apply font-mono-tag border rounded-md px-3 py-1 text-xs inline-flex items-center transition-all duration-300;
        border-color: var(--hairline-light);
    }
    .bg-navy .chip {
        border-color: var(--hairline-dark);
    }
    .chip:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.05);
    }
    
    .btn {
        @apply font-mono-tag border rounded-md px-5 py-2 text-xs inline-flex items-center justify-center transition-all duration-300 cursor-pointer;
        border-color: var(--hairline-light);
        background: transparent;
    }
    .bg-navy .btn {
        border-color: var(--hairline-dark);
        color: var(--mist);
    }
    .btn:hover {
        transform: translateY(-2px);
        background: var(--ink);
        color: var(--paper);
    }
    .bg-navy .btn:hover {
        background: var(--mist);
        color: var(--navy);
    }
    .btn span.arrow {
        transition: transform 0.3s;
    }
    .btn:hover span.arrow {
        transform: translateX(4px);
    }

    .corner-stat {
        @apply absolute p-6 hidden md:block;
    }
    .corner-stat.tl { top: 0; left: 0; }
    .corner-stat.tr { top: 0; right: 0; text-align: right; }
    .corner-stat.bl { bottom: 0; left: 0; }
    .corner-stat.br { bottom: 0; right: 0; text-align: right; }
    
    .corner-stat .val {
        @apply font-mono-tag text-sm;
    }
    .corner-stat .lbl {
        @apply text-[10px] uppercase tracking-widest mt-1 opacity-70 font-sans;
    }

    /* Typography */
    h1, h2 {
        @apply font-serif-display lowercase text-5xl md:text-8xl leading-none text-center;
    }
    .eyebrow {
        @apply font-mono-tag text-xs text-center mb-6 tracking-[0.2em] uppercase;
    }
    
    /* Animations */
    .reveal-blur {
        opacity: 0;
        filter: blur(10px);
        transform: translateY(20px);
        transition: all 0.8s cubic-bezier(0.16, 1, 0.3, 1);
    }
    .reveal-blur.is-revealed {
        opacity: 1;
        filter: blur(0px);
        transform: translateY(0);
    }

    .rise {
        opacity: 0;
        transform: translateY(40px);
        transition: all 0.8s cubic-bezier(0.16, 1, 0.3, 1);
    }
    .rise.is-revealed {
        opacity: 1;
        transform: translateY(0);
    }

    /* CRT Effect */
    .crt-text {
        font-family: 'Space Mono', monospace;
        color: var(--crt);
        text-shadow: 0 0 5px rgba(89, 167, 220, 0.5);
    }
    .crt-cursor {
        display: inline-block;
        width: 8px;
        height: 15px;
        background-color: var(--crt);
        animation: blink 1s step-end infinite;
    }
    @keyframes blink {
        50% { opacity: 0; }
    }

    /* Expandable Cards */
    .expand-card {
        transition: flex 0.6s cubic-bezier(0.16, 1, 0.3, 1), background 0.3s;
        flex: 1;
        overflow: hidden;
        border-right: 1px solid var(--hairline-dark);
        cursor: pointer;
    }
    .expand-card:last-child {
        border-right: none;
    }
    .expand-card:hover {
        flex: 3;
        background: rgba(255,255,255,0.03);
    }
    .expand-content {
        opacity: 0;
        transition: opacity 0.4s;
        transition-delay: 0.1s;
    }
    .expand-card:hover .expand-content {
        opacity: 1;
    }
    .expand-card-title {
        transition: transform 0.6s;
    }
    .expand-card:hover .expand-card-title {
        transform: translateY(-10px);
    }
    
    /* Orbit */
    .orbit-ring {
        border: 1px dashed var(--hairline-dark);
        border-radius: 50%;
        position: absolute;
        top: 50%; left: 50%;
        transform: translate(-50%, -50%) rotateX(70deg);
        width: 600px; height: 600px;
        animation: rotate-orbit 20s linear infinite;
        transform-style: preserve-3d;
    }
    .orbit-chip-wrapper {
        position: absolute;
        top: 0; left: 50%;
        transform: translate(-50%, -50%);
        transform-style: preserve-3d;
    }
    .orbit-chip {
        background: var(--navy);
        animation: rotate-chip 20s linear infinite reverse;
    }
    @keyframes rotate-orbit {
        0% { transform: translate(-50%, -50%) rotateX(70deg) rotateZ(0deg); }
        100% { transform: translate(-50%, -50%) rotateX(70deg) rotateZ(360deg); }
    }
    @keyframes rotate-chip {
        0% { transform: rotateZ(0deg) rotateX(-70deg); }
        100% { transform: rotateZ(-360deg) rotateX(-70deg); }
    }

    /* Chart */
    .chart-col {
        transition: height 1s cubic-bezier(0.16, 1, 0.3, 1);
        border: 1px solid var(--hairline-light);
        border-bottom: none;
        border-radius: 8px 8px 0 0;
        position: relative;
    }
    .chart-col:hover {
        background: rgba(30, 52, 72, 0.05);
    }
    
    .eco-curve {
        stroke: var(--hairline-light);
        stroke-dasharray: 4;
        stroke-width: 1;
        fill: none;
    }
</style>

<script>
    tailwind.config = {
        theme: {
            extend: {
                colors: {
                    paper: 'var(--paper)',
                    ink: 'var(--ink)',
                    navy: 'var(--navy)',
                    mist: 'var(--mist)',
                    crt: 'var(--crt)',
                }
            }
        }
    }
</script>
