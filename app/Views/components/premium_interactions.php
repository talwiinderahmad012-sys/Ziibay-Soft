<!-- PREMIUM CINEMATIC INTERACTIONS LIBRARY -->
<!-- Scroll animations, micro-interactions, and advanced effects -->

<script>
document.addEventListener('DOMContentLoaded', () => {
    // ============================================================
    // 1. SCROLL PROGRESS INDICATOR
    // ============================================================
    
    const scrollProgress = document.createElement('div');
    scrollProgress.className = 'scroll-progress';
    document.body.appendChild(scrollProgress);
    
    window.addEventListener('scroll', () => {
        const scrollTop = window.scrollY;
        const docHeight = document.documentElement.scrollHeight - window.innerHeight;
        const scrolled = (scrollTop / docHeight) * 100;
        scrollProgress.style.width = scrolled + '%';
    }, { passive: true });
    
    // ============================================================
    // 2. INTERSECTION OBSERVER FOR REVEAL ANIMATIONS
    // ============================================================
    
    const observerOptions = {
        root: null,
        rootMargin: '0px 0px -100px 0px',
        threshold: 0.1
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                // Add reveal class
                entry.target.classList.add('is-revealed');
                
                // Stagger children if present
                const children = entry.target.querySelectorAll('[data-stagger]');
                children.forEach((child, index) => {
                    const delay = index * 50;
                    setTimeout(() => {
                        child.classList.add('is-revealed');
                    }, delay);
                });
            }
        });
    }, observerOptions);
    
    // Observe all reveal elements
    document.querySelectorAll('.reveal-on-scroll, [data-reveal]').forEach(el => {
        observer.observe(el);
    });
    
    // ============================================================
    // 3. CURSOR GLOW EFFECT (Desktop Only)
    // ============================================================
    
    if (window.matchMedia('(pointer: fine)').matches && !window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        const cursorGlow = document.createElement('div');
        cursorGlow.style.cssText = `
            position: fixed;
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, rgba(6, 182, 212, 0.15), transparent 70%);
            pointer-events: none;
            z-index: 1;
            display: none;
        `;
        document.body.appendChild(cursorGlow);
        
        let mouseX = 0;
        let mouseY = 0;
        
        document.addEventListener('mousemove', (e) => {
            mouseX = e.clientX;
            mouseY = e.clientY;
            
            cursorGlow.style.left = (mouseX - 150) + 'px';
            cursorGlow.style.top = (mouseY - 150) + 'px';
        });
        
        // Show glow only when pointer is over interactive elements
        const interactives = document.querySelectorAll('a, button, input, [role="button"], .interactive');
        interactives.forEach(el => {
            el.addEventListener('mouseenter', () => {
                cursorGlow.style.display = 'block';
            });
            el.addEventListener('mouseleave', () => {
                cursorGlow.style.display = 'none';
            });
        });
    }
    
    // ============================================================
    // 4. PARALLAX SCROLL EFFECT (Desktop, Respects Reduced Motion)
    // ============================================================
    
    if (!window.matchMedia('(prefers-reduced-motion: reduce)').matches && window.innerWidth > 768) {
        window.addEventListener('scroll', () => {
            document.querySelectorAll('[data-parallax]').forEach(el => {
                const speed = el.getAttribute('data-parallax') || 0.5;
                const yPos = window.scrollY * speed;
                el.style.transform = `translateY(${yPos}px)`;
            });
        }, { passive: true });
    }
    
    // ============================================================
    // 5. NUMBER COUNT-UP ANIMATION
    // ============================================================
    
    const animateCountUp = (element, target, duration = 1000) => {
        const start = 0;
        const startTime = Date.now();
        
        const animate = () => {
            const elapsed = Date.now() - startTime;
            const progress = Math.min(elapsed / duration, 1);
            const current = Math.floor(start + (target - start) * progress);
            element.textContent = current.toLocaleString();
            
            if (progress < 1) {
                requestAnimationFrame(animate);
            }
        };
        
        animate();
    };
    
    // Trigger count-ups when visible
    const countUpObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting && !entry.target.dataset.counted) {
                const target = parseInt(entry.target.getAttribute('data-target'));
                if (!isNaN(target)) {
                    animateCountUp(entry.target, target, 1200);
                    entry.target.dataset.counted = 'true';
                }
            }
        });
    }, { threshold: 0.5 });
    
    document.querySelectorAll('[data-count-up]').forEach(el => {
        countUpObserver.observe(el);
    });
    
    // ============================================================
    // 6. BUTTON MICRO-INTERACTIONS
    // ============================================================
    
    document.querySelectorAll('.btn, button').forEach(btn => {
        btn.addEventListener('mousedown', function() {
            this.style.transform = 'scale(0.98)';
        });
        btn.addEventListener('mouseup', function() {
            this.style.transform = 'scale(1)';
        });
        btn.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1)';
        });
    });
    
    // ============================================================
    // 7. LINK ARROW ANIMATION
    // ============================================================
    
    document.querySelectorAll('.link-arrow').forEach(link => {
        link.addEventListener('mouseenter', function() {
            this.querySelector('.arrow')?.style.setProperty('transform', 'translateX(4px)');
        });
        link.addEventListener('mouseleave', function() {
            this.querySelector('.arrow')?.style.setProperty('transform', 'translateX(0)');
        });
    });
    
    // ============================================================
    // 8. TECHNICAL GRID ANIMATION
    // ============================================================
    
    const gridElements = document.querySelectorAll('.tech-grid-animated');
    if (gridElements.length > 0 && !window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        let offset = 0;
        const animateGrid = () => {
            offset += 0.5;
            gridElements.forEach(el => {
                el.style.backgroundPosition = `${offset}px ${offset}px`;
            });
            requestAnimationFrame(animateGrid);
        };
        animateGrid();
    }
    
    // ============================================================
    // 9. SPOTLIGHT CARD EFFECT
    // ============================================================
    
    document.querySelectorAll('.spotlight-card').forEach(card => {
        card.addEventListener('mousemove', (e) => {
            const rect = card.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            
            card.style.setProperty('--mouse-x', `${x}px`);
            card.style.setProperty('--mouse-y', `${y}px`);
            
            // Subtle depth effect
            const centerX = rect.width / 2;
            const centerY = rect.height / 2;
            const rotateX = ((y - centerY) / rect.height) * 5;
            const rotateY = ((x - centerX) / rect.width) * -5;
            
            card.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg)`;
        });
        
        card.addEventListener('mouseleave', () => {
            card.style.transform = 'perspective(1000px) rotateX(0) rotateY(0)';
        });
    });
    
    // ============================================================
    // 10. FORM FIELD FOCUS ANIMATION
    // ============================================================
    
    document.querySelectorAll('input, textarea, select').forEach(field => {
        field.addEventListener('focus', function() {
            this.classList.add('field-focused');
            if (this.parentElement) {
                this.parentElement.classList.add('field-active');
            }
        });
        
        field.addEventListener('blur', function() {
            this.classList.remove('field-focused');
            if (!this.value && this.parentElement) {
                this.parentElement.classList.remove('field-active');
            }
        });
    });
    
    // ============================================================
    // 11. NAVBAR SCROLL TRANSFORM
    // ============================================================
    
    const navbar = document.getElementById('main-navbar') || document.getElementById('main-header');
    if (navbar && !window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        let lastScrollY = 0;
        
        window.addEventListener('scroll', () => {
            const currentScrollY = window.scrollY;
            
            if (currentScrollY > 100) {
                navbar.classList.add('navbar-scrolled');
            } else {
                navbar.classList.remove('navbar-scrolled');
            }
            
            lastScrollY = currentScrollY;
        }, { passive: true });
    }
    
    // ============================================================
    // 12. RESPECTS PREFERS-REDUCED-MOTION
    // ============================================================
    
    const mediaQueryList = window.matchMedia('(prefers-reduced-motion: reduce)');
    mediaQueryList.addEventListener('change', () => {
        if (mediaQueryList.matches) {
            document.documentElement.style.setProperty('--duration-base', '0.01ms');
            document.documentElement.style.setProperty('--duration-slow', '0.01ms');
        } else {
            document.documentElement.style.removeProperty('--duration-base');
            document.documentElement.style.removeProperty('--duration-slow');
        }
    });
});
</script>

<style>
/* Micro-interaction styles */
.field-focused {
    border-color: var(--color-accent-cyan) !important;
    box-shadow: 0 0 0 3px var(--color-glow-cyan) !important;
}

.navbar-scrolled {
    backdrop-filter: blur(20px);
    background-color: rgba(7, 11, 16, 0.95);
    border-bottom-color: rgba(148, 163, 184, 0.3);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
}

/* Smooth transitions for all interactive elements */
button,
a,
input,
textarea,
select {
    transition: all var(--duration-base) var(--easing-ease-out);
}

/* Stagger animation for children */
[data-stagger] {
    animation: stagger-in var(--duration-slow) var(--easing-ease-out) forwards;
    opacity: 0;
}

@keyframes stagger-in {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>
