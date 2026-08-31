<style type="text/tailwindcss">
:root {
    --canvas: #E4E4E2;
    --ink: #1E3448;
    --muted: rgba(30,52,72,0.6);
    --line: rgba(30,52,72,0.25);
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

/* Light / Dark Panels */
.light-panel {
    margin: 16px auto;
    border: 1px solid var(--line);
    border-radius: 8px;
    background: transparent;
    position: relative;
}

.dark-panel {
    margin: 14px;
    border-radius: 10px;
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
    letter-spacing: 0.12em;
    margin-bottom: 12px;
    color: var(--ink);
}

/* Chips / Buttons / Labels */
.chip {
    font: 700 11px var(--mono);
    letter-spacing: 0.12em;
    border: 1px solid var(--line);
    border-radius: 6px;
    padding: 8px 12px;
    color: var(--ink);
    background: rgba(255,255,255,0.5);
    text-transform: uppercase;
    text-decoration: none;
    display: inline-block;
    transition: background 0.3s, transform 0.2s;
    cursor: pointer;
}
.chip:hover {
    background: rgba(255,255,255,0.8);
    transform: translateY(-1px);
}
.dark-panel .chip {
    border-color: var(--line);
    color: var(--ink);
    background: rgba(255,255,255,0.5);
}
.dark-panel .chip:hover {
    background: rgba(255,255,255,0.8);
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
    color: var(--ink);
}
.stat-lbl {
    font-family: var(--sans);
    font-size: 10px;
    color: var(--muted);
    margin-top: 4px;
}

/* Hero CRT Mac */
.mac-wrap{position:relative;width:min(720px,90vw);margin:16px auto 20px}
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
    background: #e2e2df;
    border-radius: 8px;
    box-shadow: inset 0 2px 5px rgba(255,255,255,0.7), inset 0 -2px 5px rgba(0,0,0,0.1), 0 10px 20px rgba(30,52,72,0.1);
    border: 1px solid #d1d1ce;
}
.clay-icon{width:96px;height:96px;display:block;margin:0 auto 18px;
filter:drop-shadow(0 12px 20px rgba(30,52,72,.16))}

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
  border:1px solid rgba(30,52,72,.45);border-radius:50%;pointer-events:none}
.orbit.back{z-index:1;clip-path:inset(0 0 50% 0)}   /* top half behind */
.orbit.front{z-index:3;clip-path:inset(50% 0 0 0)}  /* bottom half in front */
.sat{position:absolute;font:700 10px var(--mono);letter-spacing:.12em;
  padding:7px 10px;border-radius:4px;white-space:nowrap;
  transform:translate(-50%,-50%);transition:opacity .3s}
.sat::before{content:"";position:absolute;left:50%;top:-9px;width:6px;height:6px;
  background:currentColor;transform:translateX(-50%)}
.sat.front{background:#fff;color:var(--ink);opacity:1;z-index:4}
.sat.back{background:rgba(30,52,72,.06);color:var(--muted);
  opacity:.55;z-index:1}

/* Section Title */
.section-title {
    max-width: 900px;
    margin: 0 auto 16px;
    text-align: center;
    font-size: clamp(2rem, 5vw, 3.5rem);
    white-space: normal;
}

/* Expandable xcards */
.xrow { display: flex; gap: 12px; width: 100%; height: 440px; }
.xcard {
    flex: 1;
    border: 1px solid var(--line);
    background: rgba(255,255,255,0.35);
    border-radius: 8px;
    transition: flex 0.7s cubic-bezier(0.16, 1, 0.3, 1);
    position: relative;
    overflow: hidden;
    padding: 20px;
    display: flex;
    flex-direction: column;
}
.xcard .tag, .xcard .chip {
    max-width: 170px;
    white-space: normal;
    line-height: 1.5;
    text-align: center;
}
.xcard:hover { flex: 2.4; background: rgba(255,255,255,0.6); }
.xcontent { opacity: 0; transition: opacity 0.4s; transition-delay: 0.2s; }
.xcard:hover .xcontent { opacity: 1; }

/* Carousel */
.c-card {
    background: #F2F2F0;  /* SOLID, never rgba/transparent */
    border: 1px solid var(--line);
    border-radius: 10px;
    box-shadow: 0 20px 50px rgba(30,52,72,0.12);
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

/* Chart */
.bars { display: flex; align-items: flex-end; height: 260px; gap: 12px; border-bottom: 1px solid var(--line); }
.bar-col {
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
    background: rgba(255,255,255,0.35);
}
.bar-col:hover { background: rgba(255,255,255,0.5); }
.bar-col.highlight { background: rgba(255,255,255,0.8); }

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

    [data-rv="scale-y"] {
        transform: scaleY(0);
        transition: transform 1s cubic-bezier(0.16, 1, 0.3, 1);
    }
    [data-rv="scale-y"].in { transform: scaleY(1); }
}
</style>
