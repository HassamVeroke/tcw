/* ============================================
   GSAPify — Shared Animation Library
   Reusable GSAP animations driven by data attributes.
   ============================================ */

(function() {
  'use strict';

  gsap.registerPlugin(ScrollTrigger);

  // Standard easing curves
  const EASE = {
    smooth: "power2.out",
    enter: "power3.out",
    exit: "power2.in",
    bounce: "back.out(1.7)",
    textReveal: "power4.out",
    elastic: "elastic.out(1, 0.3)",
  };

  // ScrollTrigger defaults
  ScrollTrigger.defaults({
    start: "top 85%",
    toggleActions: "play none none none",
  });

  /* --- Fade Up Animations --- */
  function initFadeUp() {
    gsap.utils.toArray('[data-gsap="fade-up"]').forEach(el => {
      const delay = parseFloat(el.dataset.gsapDelay) || 0;
      gsap.from(el, {
        y: 50,
        opacity: 0,
        duration: 0.9,
        delay: delay,
        ease: EASE.enter,
        scrollTrigger: { trigger: el, start: "top 88%" },
      });
    });
  }

  /* --- Fade In Animations --- */
  function initFadeIn() {
    gsap.utils.toArray('[data-gsap="fade-in"]').forEach(el => {
      const delay = parseFloat(el.dataset.gsapDelay) || 0;
      gsap.from(el, {
        opacity: 0,
        duration: 1,
        delay: delay,
        ease: EASE.smooth,
        scrollTrigger: { trigger: el, start: "top 88%" },
      });
    });
  }

  /* --- Stagger Children --- */
  function initStaggerChildren() {
    gsap.utils.toArray('[data-gsap="stagger-children"]').forEach(parent => {
      const children = parent.children;
      const stagger = parseFloat(parent.dataset.gsapStagger) || 0.1;
      gsap.from(children, {
        y: 40,
        opacity: 0,
        duration: 0.7,
        stagger: stagger,
        ease: EASE.enter,
        scrollTrigger: { trigger: parent, start: "top 85%" },
      });
    });
  }

  /* --- Scale Up --- */
  function initScaleUp() {
    gsap.utils.toArray('[data-gsap="scale-up"]').forEach(el => {
      gsap.from(el, {
        scale: 0.9,
        opacity: 0,
        duration: 0.8,
        ease: EASE.enter,
        scrollTrigger: { trigger: el, start: "top 85%" },
      });
    });
  }

  /* --- Counter Animation --- */
  function initCounters() {
    gsap.utils.toArray('[data-gsap="counter"]').forEach(el => {
      const target = parseInt(el.dataset.target) || 0;
      const suffix = el.dataset.suffix || '';
      const prefix = el.dataset.prefix || '';
      const obj = { val: 0 };
      gsap.to(obj, {
        val: target,
        duration: 2,
        ease: "power2.out",
        snap: { val: 1 },
        scrollTrigger: { trigger: el, start: "top 85%" },
        onUpdate: () => {
          el.textContent = prefix + Math.round(obj.val).toLocaleString() + suffix;
        }
      });
    });
  }

  /* --- Line Reveal (green underline) --- */
  function initLineReveal() {
    gsap.utils.toArray('[data-gsap="line-reveal"]').forEach(el => {
      gsap.from(el, {
        scaleX: 0,
        transformOrigin: "left center",
        duration: 0.8,
        ease: EASE.enter,
        scrollTrigger: { trigger: el, start: "top 88%" },
      });
    });
  }

  /* --- Initialize All --- */
  function initAll() {
    initFadeUp();
    initFadeIn();
    initStaggerChildren();
    initScaleUp();
    initCounters();
    initLineReveal();
  }

  // Run on DOM ready
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initAll);
  } else {
    initAll();
  }

  // Expose
  window.GSAPify = window.GSAPify || {};
  window.GSAPify.EASE = EASE;
  window.GSAPify.initAnimations = initAll;
})();
