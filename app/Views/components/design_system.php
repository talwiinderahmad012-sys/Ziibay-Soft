<style type="text/tailwindcss">
:root {
    --canvas: #F7F5F0;      /* porcelain warm white */
    --card: #FDFCFA;        /* plate white cards */
    --ink: #1C3569;         /* deep royal blue text */
    --muted: rgba(28,53,105,0.62);
    --line: rgba(28,53,105,0.22);
    --accent: #24417C;      /* royal blue (links, icons, arrows) */
    --accent-soft: #9FB3DC; /* periwinkle (icon tints, fills) */
    --gold: #C9A26B;        /* warm tan (secondary accent) */
    --accent-glow: rgba(36,65,124,0.22);
    --clay-fill: var(--accent-soft);
    --crt: #6FB4E4;
    --serif: 'Fraunces', serif;
    --mono: 'Space Mono', monospace;
    --sans: 'Inter', sans-serif;
}

body {
    margin: 0;
    padding: 0;
    background: var(--canvas);
    color: var(--ink);
    font-family: var(--sans);
    font-size: 15px;
    position: relative;
    overflow-x: hidden;
}

body::after {
    content: "";
    position: fixed;
    inset: 0;
    width: 100%;
    height: 100%;
    pointer-events: none;
    z-index: 2147483647;
    opacity: .07;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='300' height='300'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.72' numOctaves='2' stitchTiles='stitch'/%3E%3CfeColorMatrix type='saturate' values='0'/%3E%3C/filter%3E%3Crect width='300' height='300' filter='url(%23n)'/%3E%3C/svg%3E");
    animation: grain-jitter 1.4s steps(4) infinite;
}
@keyframes grain-jitter {
    0% { transform: translate(0,0) }
    25% { transform: translate(-2%,1.5%) }
    50% { transform: translate(1.5%,-2%) }
    75% { transform: translate(-1%,2%) }
    100% { transform: translate(2%,-1%) }
}
@media (prefers-reduced-motion: reduce) {
    body::after { animation: none }
}

/* Base Typo */
h1, h2, h3, h4, h5, h6, .serif-heading {
    font-family: var(--serif);
    color: var(--ink);
    margin: 0;
}
h1, h2, .hero-title, .section-title, .serif-heading{
    text-transform: capitalize;
}
h1, h2{
  opacity:0;
  filter:blur(10px);
  transform:translateY(24px);
  transition:opacity .9s cubic-bezier(.2,.7,.2,1),
             filter .9s cubic-bezier(.2,.7,.2,1),
             transform .9s cubic-bezier(.2,.7,.2,1);
}
h1.in, h2.in{opacity:1;filter:blur(0);transform:none}
@media (prefers-reduced-motion:reduce){
  h1,h2{opacity:1;filter:none;transform:none;transition:none}
}
.serif-display {
    font-size: clamp(2.5rem, 6vw, 4.5rem);
    line-height: 1.1;
    letter-spacing: -0.02em;
}

/* Section Polished */
.section-polished {
    position: relative;
    padding: 72px 24px;
}
.section-polished::before {
    content: "";
    position: absolute;
    left: 24px;
    right: 24px;
    top: 0;
    height: 1px;
    background: linear-gradient(90deg, transparent, var(--line), transparent);
}
@media (max-width: 767px) {
    .section-polished {
        padding: 44px 16px;
    }
    .section-polished::before {
        left: 16px;
        right: 16px;
    }
}

/* Light / Dark Panels */
.light-panel {
    margin: 16px auto;
    border: 1px solid var(--line);
    border-radius: 18px;
    background: transparent;
    position: relative;
}

.framed-panel {
    border: 1px solid var(--line);
    border-radius: 18px;
    background: linear-gradient(180deg, var(--card), color-mix(in srgb, var(--card) 92%, var(--accent-soft)));
    box-shadow: 0 22px 55px rgba(28,53,105,.10), inset 0 1px 0 rgba(255,255,255,.75);
}

.dark-panel {
    margin: 14px;
    border-radius: 18px;
    background: var(--canvas);
    border: 1px solid var(--line);
    color: var(--ink);
    position: relative;
}
.dark-panel h1, .dark-panel h2, .dark-panel h3, .dark-panel .serif-heading {
    color: var(--ink);
}

.eyebrow {
    font-family: var(--mono);
    font-size: 11px;
    text-transform: uppercase;
    letter-spacing: 0.14em;
    margin-bottom: 12px;
    color: var(--accent);
}

/* VIP Card Base (card, tech-card, svc-card, xcard, c-card, info-card) */
.card,
.tech-card,
.svc-card,
.xcard,
.c-card,
.info-card {
    position: relative;
    overflow: hidden;
    background: linear-gradient(180deg, var(--card), color-mix(in srgb, var(--card) 92%, var(--accent-soft)));
    border: 1px solid var(--line);
    border-radius: 18px;
    padding: 28px;
    box-shadow: 0 22px 55px rgba(28,53,105,.10), inset 0 1px 0 rgba(255,255,255,.75);
    transition: transform .45s cubic-bezier(.2,.7,.2,1), box-shadow .45s cubic-bezier(.2,.7,.2,1), border-color .45s ease;
    box-sizing: border-box;
}

.card::before,
.tech-card::before,
.svc-card::before,
.xcard::before,
.c-card::before,
.info-card::before {
    content: "";
    position: absolute;
    top: 16px;
    right: 16px;
    width: 34px;
    height: 2px;
    background: var(--gold);
    opacity: .75;
    z-index: 2;
    pointer-events: none;
}

.card::after,
.tech-card::after,
.svc-card::after,
.xcard::after,
.c-card::after,
.info-card::after {
    content: "";
    position: absolute;
    inset: 0;
    pointer-events: none;
    background: linear-gradient(120deg, transparent 25%, rgba(255,255,255,.55) 50%, transparent 75%);
    transform: translateX(-130%);
    transition: transform .9s ease;
    z-index: 3;
}

.card:hover,
.tech-card:hover,
.svc-card:hover,
.xcard:hover,
.c-card:hover,
.info-card:hover {
    transform: translateY(-7px);
    border-color: color-mix(in srgb, var(--accent) 55%, var(--line));
    box-shadow: 0 30px 70px rgba(28,53,105,.16), inset 0 1px 0 rgba(255,255,255,.85);
}

.card:hover::after,
.tech-card:hover::after,
.svc-card:hover::after,
.xcard:hover::after,
.c-card:hover::after,
.info-card:hover::after {
    transform: translateX(130%);
}

/* Typography / Readability */
.card h3,
.tech-card h3,
.svc-card h3,
.xcard h3,
.c-card h3,
.info-card h3 {
    color: var(--ink);
    font-weight: 700;
    letter-spacing: -.02em;
    line-height: 1.15;
    margin: 12px 0 8px;
}

.card p,
.tech-card p,
.svc-card p,
.xcard p,
.c-card p,
.info-card p {
    color: var(--muted);
    line-height: 1.75;
    font-size: 14px;
}

.card .tag,
.svc-card .tag,
.xcard .tag,
.info-card .tag {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: max-content;
    max-width: 190px;
    padding: 7px 12px;
    border: 1px solid var(--line);
    border-radius: 999px;
    background: rgba(255,255,255,.45);
    color: var(--accent);
    font: 700 10px var(--mono);
    letter-spacing: .14em;
    text-transform: uppercase;
}

/* Clay 3D Icons */
.clay-icon {
    width: 92px;
    height: 92px;
    display: block;
    margin: 0 0 18px;
    filter: drop-shadow(0 14px 22px rgba(28,53,105,.14));
    animation: clayFloat 6s ease-in-out infinite;
    transition: transform .45s ease;
}

.card:hover .clay-icon,
.svc-card:hover .clay-icon,
.xcard:hover .clay-icon,
.info-card:hover .clay-icon {
    transform: translateY(-6px) scale(1.06) rotate(-2deg);
}

@keyframes clayFloat {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-7px); }
}

/* Buttons / Links / Chips */
.mono-link,
.service-link,
.link-arrow,
.btn-primary,
.chip {
    position: relative;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    min-height: 40px;
    padding: 10px 16px;
    border-radius: 999px;
    border: 1px solid var(--line);
    color: var(--accent);
    background: rgba(255,255,255,.45);
    font: 700 11px var(--mono);
    letter-spacing: .13em;
    text-transform: uppercase;
    text-decoration: none;
    box-sizing: border-box;
    cursor: pointer;
    transition: transform .3s ease, border-color .3s ease, background .3s ease, color .3s ease, box-shadow .3s ease;
}

.mono-link:hover,
.service-link:hover,
.link-arrow:hover,
.btn-primary:hover,
.chip:hover {
    transform: translateY(-2px);
    border-color: var(--gold);
    background: var(--ink);
    color: #fff;
    box-shadow: 0 8px 24px rgba(28,53,105,.22);
}

.chip.active,
.chip.cta,
.chip[href*="contact"] {
    background: var(--ink);
    color: #ffffff;
    border-color: var(--gold);
}

.chip.active:hover,
.chip.cta:hover,
.chip[href*="contact"]:hover {
    background: var(--gold);
    color: var(--ink);
    border-color: var(--gold);
    box-shadow: 0 8px 24px rgba(201,162,107,.35);
}

.chip.shine-hover {
    overflow: hidden;
}
.chip.shine-hover::after {
    content: "";
    position: absolute;
    top: -50%;
    left: -60%;
    width: 40%;
    height: 200%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
    transform: rotate(30deg);
    transition: transform 0.6s ease;
    pointer-events: none;
}
.chip.shine-hover:hover::after {
    transform: rotate(30deg) translate(350%, 0);
}

.dark-panel .chip {
    border-color: var(--line);
    color: var(--accent);
    background: rgba(255,255,255,0.6);
}
.dark-panel .chip:hover {
    background: var(--ink);
    border-color: var(--gold);
    color: #ffffff;
}

/* Hairline Form Inputs */
.form-field input,
.form-field textarea,
.form-field select,
.hairline-input,
input:not([type="checkbox"]):not([type="radio"]):not([type="submit"]):not([type="button"]),
textarea,
select {
    width: 100%;
    padding: 14px 16px;
    font-family: var(--sans);
    font-size: 14px;
    background: rgba(255,255,255,.62);
    border: 1px solid var(--line);
    border-radius: 14px;
    color: var(--ink);
    outline: none;
    transition: border-color .3s ease, box-shadow .3s ease, background .3s ease;
    box-sizing: border-box;
}

.form-field input:focus,
.form-field textarea:focus,
.form-field select:focus,
.hairline-input:focus,
input:focus,
textarea:focus,
select:focus {
    border-color: var(--accent);
    box-shadow: 0 0 0 4px var(--accent-glow);
    background: #ffffff;
}

.hairline-label {
    display: block;
    font-family: var(--mono);
    font-size: 10px;
    font-weight: 700;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    color: var(--muted);
    margin-bottom: 8px;
}

/* Stat corner boxes */
.stat-corner {
    position: absolute;
    padding: 0;
    z-index: 5;
}
.stat-corner.tl { top: 80px; left: 24px; }
.stat-corner.tr { top: 80px; right: 24px; text-align: right; }
.stat-corner.bl { bottom: 24px; left: 24px; }
.stat-corner.br { bottom: 24px; right: 24px; text-align: right; }
.stat-val {
    font-family: var(--mono);
    font-size: 11px;
    letter-spacing: 0.12em;
    text-transform: uppercase;
    color: var(--gold);
    font-weight: 700;
}
.stat-lbl {
    font-family: var(--sans);
    font-size: 10px;
    color: var(--muted);
    margin-top: 4px;
}

.corner-stat {
    position: absolute;
    font-family: var(--mono);
    font-size: 10px;
    letter-spacing: 0.08em;
    text-transform: uppercase;
    color: var(--muted);
    z-index: 5;
}
.corner-stat.tl { top: 20px; left: 24px; }
.corner-stat.tr { top: 20px; right: 24px; text-align: right; }
.corner-stat.bl { bottom: 20px; left: 24px; }
.corner-stat.br { bottom: 20px; right: 24px; text-align: right; }

/* Hero CRT Mac */
.mac-wrap{position:relative;width:min(860px,94vw);margin:16px auto 24px}
.mac-img{width:100%;height:auto;display:block}
@keyframes blink{50%{opacity:0}}

/* Connected corner boxes (Why Choose) */
.connected-boxes {
    display: flex;
    justify-content: space-between;
    position: relative;
    margin-bottom: 32px;
}
.connected-boxes::before {
    content: "";
    position: absolute;
    top: 50%;
    left: 20px;
    right: 20px;
    height: 1px;
    background: var(--line);
    z-index: -1;
}

/* Clay Objects */
.clay {
    background: var(--card);
    border-radius: 8px;
    box-shadow: inset 0 2px 5px rgba(255,255,255,0.7), inset 0 -2px 5px rgba(0,0,0,0.06), 0 10px 20px rgba(28,43,58,0.08);
    border: 1px solid var(--line);
}
.clay-icon{
    width:96px;
    height:96px;
    display:block;
    margin:0 auto 18px;
    filter:drop-shadow(0 12px 20px rgba(28,43,58,.14));
    animation:clay-float 6s ease-in-out infinite;
}
.svc-card:nth-child(2) .clay-icon{animation-delay:.4s}
.svc-card:nth-child(3) .clay-icon{animation-delay:.8s}
.svc-card:nth-child(4) .clay-icon{animation-delay:1.2s}
.svc-card:nth-child(5) .clay-icon{animation-delay:1.6s}

@keyframes clay-float{
    0%,100%{transform:translateY(0) rotate(0deg)}
    50%{transform:translateY(-8px) rotate(-1.5deg)}
}

/* Globe Orbit */
.globe-wrap{position:relative;width:min(480px,56vw);aspect-ratio:1;
  margin:24px auto;animation:globe-float 9s ease-in-out infinite;z-index:0}
.globe-clip{position:absolute;inset:0;border-radius:50%;overflow:hidden;z-index:2}
.globe-spin{position:absolute;inset:0;animation:globe-spin 90s linear infinite}
.globe-spin img{width:100%;height:100%;object-fit:cover;transform:scale(1.25)}
@keyframes globe-spin{to{transform:rotate(360deg)}}
@keyframes globe-float{0%,100%{transform:translateY(0)}50%{transform:translateY(-6px)}}
@media (prefers-reduced-motion: reduce){.globe-spin,.globe-wrap{animation:none}}
.orbit{position:absolute;left:-20%;right:-20%;top:44%;height:28%;
  border:1px solid var(--accent);opacity:0.35;border-radius:50%;pointer-events:none}
.orbit.back{z-index:1;clip-path:inset(0 0 50% 0)}   /* top half behind */
.orbit.front{z-index:3;clip-path:inset(50% 0 0 0)}  /* bottom half in front */
.sat{position:absolute;font:700 9px var(--mono);letter-spacing:.1em;
  padding:5px 8px;border-radius:4px;white-space:nowrap;
  transform:translate(-50%,-50%);transition:opacity .3s}
.sat::before{content:"";position:absolute;left:50%;top:-9px;width:6px;height:6px;
  background:currentColor;transform:translateX(-50%)}
.sat.front{background:#fff;color:var(--ink);opacity:1;z-index:4;border:1px solid var(--line);}
.sat.front::before{background:var(--gold);}
.sat.back{background:rgba(28,53,105,.06);color:var(--muted);
  opacity:.55;z-index:1}

/* Section Title */
.section-title {
    max-width: 900px;
    margin: 0 auto 16px;
    text-align: center;
    font-size: clamp(2rem, 5vw, 3.5rem);
    white-space: normal;
}

/* Grid Spacing */
.services-grid,
.cards-grid,
.xcards,
.c-grid {
    display: grid;
    gap: 24px;
}
@media (min-width: 768px) {
    .services-grid,
    .cards-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }
}
@media (min-width: 1180px) {
    .services-grid,
    .cards-grid {
        grid-template-columns: repeat(3, minmax(0, 1fr));
    }
}
@media (max-width: 767px) {
    .card,
    .tech-card,
    .svc-card,
    .xcard,
    .c-card,
    .info-card {
        padding: 22px;
        border-radius: 15px;
    }
    .clay-icon {
        width: 76px;
        height: 76px;
    }
}

/* Expandable xcards */
.xrow {
    display: flex;
    gap: 16px;
    width: 100%;
    min-height: 520px;
    align-items: stretch;
}
@media (max-width: 992px) {
    .xrow {
        flex-direction: column;
        min-height: auto;
    }
}
.xcard {
    flex: 1;
    border: 1px solid var(--line);
    background: rgba(255,255,255,0.5);
    border-radius: 10px;
    transition: flex 0.7s cubic-bezier(0.16, 1, 0.3, 1), background 0.4s ease, box-shadow 0.4s ease;
    position: relative;
    overflow: hidden;
    padding: 24px 20px 48px;
    display: flex;
    flex-direction: column;
    cursor: pointer;
}
.xcard .tag, .xcard .chip {
    font: 700 10px var(--mono);
    letter-spacing: .12em;
    padding: 6px 10px;
    border: 1px solid var(--line);
    border-radius: 4px;
    background: #fff;
    color: var(--ink);
    align-self: flex-start;
    max-width: 170px;
    white-space: normal;
    line-height: 1.4;
    text-align: center;
    margin-bottom: 12px;
}
.xcard h3 {
    font: 700 1.15rem var(--sans);
    color: var(--ink);
    margin: 10px 0 6px;
}
.x-short {
    font: 13px/1.6 var(--sans);
    color: var(--muted);
    margin: 0 0 14px;
}
.x-num {
    font-family: var(--serif);
    font-size: 2.6rem;
    color: var(--gold);
    opacity: 0.55;
    position: absolute;
    bottom: 16px;
    right: 20px;
    line-height: 1;
    pointer-events: none;
    transition: opacity 0.3s ease, color 0.3s ease;
}
.xcard.open, .xcard:hover {
    flex: 2.6;
    background: var(--card);
    box-shadow: 0 16px 40px rgba(28,53,105,0.12);
}
.xcard.open .x-num, .xcard:hover .x-num {
    opacity: 1;
    color: var(--gold);
}
.more {
    max-height: 0;
    opacity: 0;
    overflow: hidden;
    transition: max-height 0.7s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.5s ease;
}
.xcard.open .more {
    max-height: 480px;
    opacity: 1;
}
@media (min-width: 993px) {
    .xcard:hover .more {
        max-height: 480px;
        opacity: 1;
    }
}
.more p {
    font-size: 12px;
    line-height: 1.6;
    color: var(--ink);
    opacity: 0.85;
    margin: 0 0 10px;
}
.more ul {
    list-style: none;
    padding: 0;
    margin: 10px 0 14px;
    display: flex;
    flex-direction: column;
    gap: 6px;
}
.more li {
    font-size: 12px;
    color: var(--muted);
    line-height: 1.4;
}
.more .mono-link {
    display: inline-block;
    font-family: var(--mono);
    font-size: 11px;
    font-weight: 700;
    color: var(--accent);
    text-decoration: none;
    letter-spacing: 0.05em;
    padding-top: 6px;
    transition: color 0.2s ease;
}
.more .mono-link:hover {
    color: var(--gold);
}

/* Category Divider Draw */
.cat-divider {
    height: 1px;
    background: var(--line);
    margin-bottom: 32px;
    position: relative;
    transform: scaleX(0);
    transform-origin: left;
    transition: transform 1.2s cubic-bezier(0.16, 1, 0.3, 1) 0.2s;
}
.in .cat-divider, .cat-divider.in, [data-rv].in .cat-divider {
    transform: scaleX(1);
}
.cat-divider::before {
    content: "";
    position: absolute;
    left: 0;
    top: -2px;
    width: 6px;
    height: 5px;
    background: var(--gold);
}

/* Marquee Strip */
.marquee {
    overflow: hidden;
    border-block: 1px solid var(--line);
    padding: 14px 0;
    background: rgba(255,255,255,0.3);
    margin: 0 auto 40px;
    max-width: 1240px;
}
.marquee-track {
    display: inline-block;
    white-space: nowrap;
    font: 700 12px var(--mono);
    letter-spacing: .2em;
    color: var(--muted);
    animation: mq 28s linear infinite;
}
.star-gold {
    color: var(--gold);
    margin: 0 4px;
}
@keyframes mq {
    to { transform: translateX(-50%); }
}

/* Carousel */
.c-card {
    background: var(--card);  /* SOLID, never rgba/transparent */
    border: 1px solid var(--line);
    border-radius: 10px;
    box-shadow: 0 20px 50px rgba(28,43,58,0.1);
    position: relative;
    width: 360px;
    min-width: 360px;
    display: flex;
    flex-direction: column;
    transition: all 0.5s cubic-bezier(0.16, 1, 0.3, 1);
    box-sizing: border-box;
}
.c-card.center {
    z-index: 3;
    opacity: 1;
    transform: none;
}
.c-card.side {
    z-index: 1;
    opacity: 0.45;
    transform: scale(0.94);
    pointer-events: none;
}
.os-header {
    border-bottom: 1px solid var(--line);
    padding: 10px 16px;
    font: 700 10px var(--mono);
    letter-spacing: 0.1em;
    color: var(--ink);
}

/* Service Cards */
.svc-card {
    background: var(--card);
    border: 1px solid var(--line);
    border-radius: 10px;
    padding: 28px;
    display: flex;
    flex-direction: column;
    gap: 14px;
    box-shadow: 0 10px 30px rgba(28,43,58,0.06);
    box-sizing: border-box;
}
html.js .svc-card {
    opacity: 0;
    transform: translateY(28px);
    transition: opacity .8s cubic-bezier(0.16, 1, 0.3, 1), transform .8s cubic-bezier(0.16, 1, 0.3, 1), box-shadow .4s ease;
}
html.js .svc-card.in {
    opacity: 1;
    transform: none;
}
.svc-card:nth-child(2) { transition-delay: .12s; }
.svc-card:nth-child(3) { transition-delay: .24s; }
.svc-card:nth-child(4) { transition-delay: .36s; }
.svc-card:nth-child(5) { transition-delay: .48s; }

/* Chart / Workflow Bars */
.bars { display: flex; align-items: flex-end; height: 260px; gap: 12px; border-bottom: 1px solid var(--line); }
.bar-col, .wf-col {
    flex: 1;
    border: 1px solid var(--line);
    border-bottom: none;
    border-radius: 6px 6px 0 0;
    position: relative;
    display: flex;
    flex-direction: column;
    align-items: center;
    padding-top: 16px;
    transform-origin: bottom;
    background: rgba(255,255,255,0.4);
}
.bar-col:hover, .wf-col:hover { background: rgba(255,255,255,0.65); }
.bar-col.highlight, .wf-col.highlight { background: var(--card); }

html.js .wf-col, html.js [data-rv="scale-y"] {
    transform: scaleY(0);
    transform-origin: bottom;
    transition: transform 1s cubic-bezier(0.16, 1, 0.3, 1);
}
html.js .wf-col.in, html.js [data-rv="scale-y"].in {
    transform: scaleY(1);
}

/* Animations [data-rv] */
@media (prefers-reduced-motion: no-preference) {
    [data-rv="blur-rise"] {
        opacity: 0;
        filter: blur(8px);
        transform: translateY(30px);
        transition: all 0.9s cubic-bezier(0.16, 1, 0.3, 1);
    }
    [data-rv="blur-rise"].in { opacity: 1; filter: blur(0); transform: translateY(0); }
    
    [data-rv="deck-rise"] {
        opacity: 0;
        transform: translateY(40px);
        transition: all 0.8s cubic-bezier(0.16, 1, 0.3, 1);
    }
    [data-rv="deck-rise"].in { opacity: 1; transform: translateY(0); }
}

/* Custom Alpine Dropdowns */
.dd {
    position: relative;
    width: 100%;
}
.dd-btn {
    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 10px;
    background: rgba(255,255,255,.62);
    border: 1px solid var(--line);
    border-radius: 14px;
    padding: 14px 16px;
    color: var(--ink);
    font: 600 14px var(--sans);
    cursor: pointer;
    text-align: left;
    transition: border-color .3s, box-shadow .3s, background .3s;
    box-sizing: border-box;
}
.dd-btn:hover {
    border-color: var(--accent);
    background: rgba(255,255,255,.85);
}
.dd-btn:focus-visible {
    outline: none;
    border-color: var(--accent);
    box-shadow: 0 0 0 4px var(--accent-glow);
}
.dd-btn svg {
    transition: transform .3s ease;
    color: var(--accent);
    flex-shrink: 0;
}
.dd-list {
    position: absolute;
    z-index: 40;
    top: calc(100% + 8px);
    left: 0;
    right: 0;
    background: var(--card);
    border: 1px solid var(--line);
    border-radius: 14px;
    box-shadow: 0 24px 60px rgba(28,53,105,.18);
    padding: 6px;
    overflow: hidden;
    box-sizing: border-box;
}
.dd-opt {
    display: flex;
    width: 100%;
    justify-content: space-between;
    align-items: center;
    padding: 12px 14px;
    border-radius: 10px;
    color: var(--ink);
    font: 500 14px var(--sans);
    cursor: pointer;
    text-align: left;
    transition: background .2s, color .2s;
    border: none;
    background: transparent;
    box-sizing: border-box;
}
.dd-opt:hover {
    background: color-mix(in srgb, var(--accent) 8%, #fff);
    color: var(--accent);
}
.dd-opt.sel {
    background: var(--accent);
    color: #fff;
}
.dd-opt.sel::after {
    content: "✓";
    color: var(--gold);
    font-weight: 700;
}

@keyframes ddShake {
    0%, 100% { transform: translateX(0); }
    20%, 60% { transform: translateX(-4px); }
    40%, 80% { transform: translateX(4px); }
}
.dd-shake {
    animation: ddShake 0.4s ease-in-out;
    border-color: #d9534f !important;
    box-shadow: 0 0 0 3px rgba(217,83,79,0.2) !important;
}
.dd-error-msg {
    font-family: var(--mono);
    font-size: 11px;
    color: #d9534f;
    margin-top: 4px;
    display: block;
    letter-spacing: .05em;
}

@media (prefers-reduced-motion: reduce) {
    html.js .svc-card, html.js .wf-col, html.js [data-rv="scale-y"], [data-rv="blur-rise"], [data-rv="deck-rise"] {
        opacity: 1;
        transform: none;
        filter: none;
        transition: none;
    }
}
</style>
