/**
 * Glamp Inn Valley - Production JavaScript
 * High performance, zero dependency vanilla script for all interactions.
 */

document.addEventListener('DOMContentLoaded', () => {
  // 1. Elements Cache
  const header = document.querySelector('.giv-header');
  const menuBtns = document.querySelectorAll('.giv-menu-btn, .giv-bottom-menu-btn, [data-action="open-menu"]');
  const drawer = document.querySelector('.giv-mobile-drawer');
  const drawerClose = document.querySelector('.giv-drawer-close');
  const stickyBar = document.querySelector('.giv-sticky-bookbar');
  const parallaxEls = document.querySelectorAll('[data-parallax]');
  const sunEl = document.querySelector('[data-sun]');
  const revealEls = document.querySelectorAll('[data-reveal]');
  const logo = document.querySelector('.giv-logo');

  let isDarkHero = header && header.dataset.darkHero === 'true';
  let menuOpen = false;

  // 2. Mobile Menu Toggle
  function openMenu() {
    if (!drawer) return;
    menuOpen = true;
    drawer.classList.add('open');
    document.body.style.overflow = 'hidden';
    if (stickyBar) stickyBar.classList.remove('visible');
  }

  function closeMenu() {
    if (!drawer) return;
    menuOpen = false;
    drawer.classList.remove('open');
    document.body.style.overflow = '';
    onScroll();
  }

  menuBtns.forEach(btn => btn.addEventListener('click', openMenu));
  if (drawerClose) drawerClose.addEventListener('click', closeMenu);

  if (drawer) {
    drawer.querySelectorAll('a').forEach(link => {
      link.addEventListener('click', () => {
        closeMenu();
      });
    });
  }

  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
      if (menuOpen) closeMenu();
      closeLightbox();
    }
  });

  // 3. Scroll Handler (Header, Sticky Bar, Parallax, Sun Arc)
  let ticking = false;

  function onScroll() {
    const y = window.scrollY;
    const vh = window.innerHeight;

    // Header State
    if (header) {
      if (y > 40) {
        header.classList.add('scrolled');
        if (logo) logo.style.filter = 'brightness(1.25)';
      } else {
        header.classList.remove('scrolled');
        if (logo) {
          logo.style.filter = isDarkHero ? 'brightness(1.25)' : 'none';
        }
      }
    }

    // Mobile Sticky Quick Action Bar
    if (stickyBar && !menuOpen && window.innerWidth < 861) {
      if (y > 100) {
        stickyBar.classList.add('visible');
      } else {
        stickyBar.classList.remove('visible');
      }
    }

    // Parallax elements
    if (parallaxEls.length > 0) {
      parallaxEls.forEach(el => {
        const rect = el.getBoundingClientRect();
        const p = (rect.top + rect.height / 2 - vh / 2) / vh;
        const val = parseFloat(el.dataset.parallax) || 0;
        el.style.transform = `translateY(${(p * val).toFixed(1)}px)`;
      });
    }

    // Dynamic Sun Arc Gradient
    if (sunEl) {
      const rect = sunEl.getBoundingClientRect();
      const t = Math.min(1, Math.max(0, (vh - rect.top) / (vh + rect.height)));
      const x = 12 + t * 76;
      const yPos = 78 - Math.sin(t * Math.PI) * 60;
      const warm = t > 0.7 ? '226,140,94' : '226,168,94';
      sunEl.style.background = `radial-gradient(circle at ${x.toFixed(1)}% ${yPos.toFixed(1)}%, rgba(${warm},.34) 0%, rgba(${warm},.12) 18%, rgba(${warm},0) 42%)`;
    }

    ticking = false;
  }

  window.addEventListener('scroll', () => {
    if (!ticking) {
      requestAnimationFrame(onScroll);
      ticking = true;
    }
  }, { passive: true });

  window.addEventListener('resize', () => {
    onScroll();
  });

  onScroll();

  // 4. Scroll Reveal Animations via IntersectionObserver
  if ('IntersectionObserver' in window && revealEls.length > 0) {
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('revealed');
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: 0.08 });

    revealEls.forEach(el => observer.observe(el));
  } else {
    revealEls.forEach(el => el.classList.add('revealed'));
  }

  // 5. Interactive Experiences Switcher
  const actItems = document.querySelectorAll('.giv-activity-item');
  const actPreviewImg = document.querySelector('#actPreviewImg');
  const actPreviewTitle = document.querySelector('#actPreviewTitle');
  const actPreviewIndex = document.querySelector('#actPreviewIndex');

  if (actItems.length > 0) {
    actItems.forEach((item, idx) => {
      const updateAct = () => {
        actItems.forEach(it => it.classList.remove('active'));
        item.classList.add('active');
        if (actPreviewImg) {
          const img = item.dataset.img;
          const title = item.dataset.title;
          const count = String(idx + 1).padStart(2, '0') + ' / ' + String(actItems.length).padStart(2, '0');

          actPreviewImg.style.opacity = '0.3';
          setTimeout(() => {
            actPreviewImg.src = img;
            actPreviewImg.alt = title;
            if (actPreviewTitle) actPreviewTitle.textContent = title;
            if (actPreviewIndex) actPreviewIndex.textContent = count;
            actPreviewImg.style.opacity = '1';
          }, 150);
        }
      };

      item.addEventListener('mouseenter', updateAct);
      item.addEventListener('click', updateAct);
    });
  }

  // 5b. Night on the Ridge Rituals Interactive Switcher
  const nightRitualsData = [
    {
      pill: 'OBSERVATORY POOL · RIDGE ELEVATION 700M',
      title: 'VALLEY PANORAMA · CLEAR SKY',
      sub: 'Pristine waters meeting endless forest canopy · 17:00',
      archImg: 'assets/images/night-ridge-arch.webp',
      archAlt: 'Hillside infinity pool overlooking the Vikarabad valley with astronomical dome grid',
      hotspotHref: 'experiences.php',
      hotspotTitle: 'Explore Hillside Infinity Pool',
      satelliteImg: 'assets/images/night-ridge-fire.webp',
      satelliteAlt: 'Private Bonfire Hearth beside your dome',
      satelliteTag: 'PRIVATE BONFIRE',
      satelliteType: 'fire',
      satelliteTarget: 1,
      satelliteTooltip: 'Switch to Private Bonfire Hearth'
    },
    {
      pill: 'PRIVATE BONFIRE HEARTH · STARLIT EVENINGS',
      title: 'PRIVATE BONFIRE HEARTH',
      sub: 'Crackling firewood & cozy stargazing seating beside your dome · 19:30',
      archImg: 'assets/images/night-ridge-bonfire.jpg',
      archAlt: 'Private bonfire hearth with crackling fire and stargazing seating beside luxury geodesic dome',
      hotspotHref: 'experiences.php',
      hotspotTitle: 'Discover Evenings by the Fire',
      satelliteImg: 'assets/images/night-ridge-arch.webp',
      satelliteAlt: 'Hillside Infinity Pool',
      satelliteTag: 'INFINITY POOL',
      satelliteType: 'pool',
      satelliteTarget: 0,
      satelliteTooltip: 'Switch to Hillside Infinity Pool'
    },
    {
      pill: 'DARK-SKY OBSERVATORY · BORTLE CLASS 3',
      title: 'DARK-SKY MILKY WAY',
      sub: 'Bortle Class 3 observatory darkness with zero city glare · 21:00',
      archImg: 'assets/images/night-ridge-milkyway.jpg',
      archAlt: 'Bortle Class 3 starlit night sky with luminous Milky Way core arching over the ridge',
      hotspotHref: 'experiences.php',
      hotspotTitle: 'Explore Dark-Sky Milky Way Stargazing',
      satelliteImg: 'assets/images/night-ridge-bonfire.jpg',
      satelliteAlt: 'Private Bonfire Hearth beside your dome',
      satelliteTag: 'PRIVATE BONFIRE',
      satelliteType: 'fire',
      satelliteTarget: 1,
      satelliteTooltip: 'Switch to Private Bonfire Hearth'
    }
  ];

  const ritualItems = document.querySelectorAll('.giv-night-ritual-item');
  const archVisual = document.getElementById('givArchVisual');
  const archPillText = document.getElementById('givArchPillText');
  const archTitle = document.getElementById('givArchTitle');
  const archSub = document.getElementById('givArchSub');
  const archCaptionText = document.querySelector('.giv-arch-caption-text');
  const archHotspot = document.getElementById('givArchHotspot');
  const archDots = document.querySelectorAll('.giv-arch-dot');
  const satelliteWrap = document.getElementById('givNightSatelliteWrap');
  const satelliteImg = document.getElementById('givSatelliteImg');
  const satelliteTag = document.getElementById('givSatelliteTag');
  const satelliteTagText = document.getElementById('givSatelliteTagText');

  if (ritualItems.length > 0 && archVisual) {
    let currentRitual = 0;
    let isTransitioning = false;

    // Preload ritual images into memory for instant transitions
    nightRitualsData.forEach(item => {
      const preloadArch = new Image();
      preloadArch.src = item.archImg;
      const preloadSat = new Image();
      preloadSat.src = item.satelliteImg;
    });

    function switchRitual(index) {
      if (index < 0 || index >= nightRitualsData.length) return;
      if (index === currentRitual && !archVisual.classList.contains('fading')) return;
      if (isTransitioning) return;
      isTransitioning = true;
      currentRitual = index;
      const data = nightRitualsData[index];

      // Update button active states
      ritualItems.forEach((btn, i) => {
        const isActive = i === index;
        btn.classList.toggle('active', isActive);
        btn.setAttribute('aria-selected', isActive ? 'true' : 'false');
      });

      // Update pagination dots
      archDots.forEach((dot, i) => {
        dot.classList.toggle('active', i === index);
      });

      // Subtle crossfade transition
      if (archVisual) archVisual.classList.add('fading');
      if (satelliteImg) satelliteImg.classList.add('fading');
      if (archCaptionText) archCaptionText.classList.add('fading');

      setTimeout(() => {
        // Update main arch image and text
        if (archVisual) {
          archVisual.src = data.archImg;
          archVisual.alt = data.archAlt;
        }
        if (archPillText) archPillText.textContent = data.pill;
        if (archTitle) archTitle.textContent = data.title;
        if (archSub) archSub.textContent = data.sub;
        if (archHotspot) {
          archHotspot.href = data.hotspotHref;
          archHotspot.title = data.hotspotTitle;
          archHotspot.setAttribute('aria-label', data.hotspotTitle);
        }

        // Update satellite portal
        if (satelliteImg) {
          satelliteImg.src = data.satelliteImg;
          satelliteImg.alt = data.satelliteAlt;
        }
        if (satelliteTagText) satelliteTagText.textContent = data.satelliteTag;
        if (satelliteTag) satelliteTag.dataset.type = data.satelliteType;
        if (satelliteWrap) {
          satelliteWrap.dataset.type = data.satelliteType;
          satelliteWrap.dataset.target = data.satelliteTarget;
          satelliteWrap.title = data.satelliteTooltip;
          satelliteWrap.setAttribute('aria-label', data.satelliteTooltip);
        }

        // Reveal
        if (archVisual) archVisual.classList.remove('fading');
        if (satelliteImg) satelliteImg.classList.remove('fading');
        if (archCaptionText) archCaptionText.classList.remove('fading');

        isTransitioning = false;
      }, 180);
    }

    // Attach click & keyboard listeners to ritual buttons
    ritualItems.forEach((btn, idx) => {
      btn.addEventListener('click', (e) => {
        e.preventDefault();
        switchRitual(idx);
      });
      btn.addEventListener('keydown', (e) => {
        if (e.key === 'Enter' || e.key === ' ') {
          e.preventDefault();
          switchRitual(idx);
        }
      });
    });

    // Attach click listeners to pagination dots
    archDots.forEach((dot, idx) => {
      dot.addEventListener('click', (e) => {
        e.preventDefault();
        e.stopPropagation();
        switchRitual(idx);
      });
    });

    // Clicking satellite circle switches to its paired ritual
    if (satelliteWrap) {
      const handleSatelliteActivate = (e) => {
        e.preventDefault();
        const target = parseInt(satelliteWrap.dataset.target, 10);
        if (!isNaN(target)) {
          switchRitual(target);
        }
      };

      satelliteWrap.addEventListener('click', handleSatelliteActivate);
      satelliteWrap.addEventListener('keydown', (e) => {
        if (e.key === 'Enter' || e.key === ' ') {
          handleSatelliteActivate(e);
        }
      });
    }

    // Touch swipe support on Night Arch Card for mobile
    const archCardEl = document.getElementById('givNightArchCard');
    if (archCardEl) {
      let archTouchStartX = 0;
      let archTouchStartY = 0;
      archCardEl.addEventListener('touchstart', (e) => {
        if (e.touches && e.touches[0]) {
          archTouchStartX = e.touches[0].clientX;
          archTouchStartY = e.touches[0].clientY;
        }
      }, { passive: true });

      archCardEl.addEventListener('touchend', (e) => {
        if (!archTouchStartX) return;
        const archTouchEndX = e.changedTouches[0].clientX;
        const archTouchEndY = e.changedTouches[0].clientY;
        const diffX = archTouchStartX - archTouchEndX;
        const diffY = archTouchStartY - archTouchEndY;

        if (Math.abs(diffX) > Math.abs(diffY) && Math.abs(diffX) > 40) {
          if (diffX > 0) {
            // Swipe left -> next ritual
            switchRitual((currentRitual + 1) % nightRitualsData.length);
          } else {
            // Swipe right -> prev ritual
            switchRitual((currentRitual - 1 + nightRitualsData.length) % nightRitualsData.length);
          }
        }
        archTouchStartX = 0;
      }, { passive: true });
    }
  }

  // 6. Domes Tier Filter (for domes.php)
  const tierBtns = document.querySelectorAll('.giv-tier-btn');
  const domeCards = document.querySelectorAll('.giv-dome-card');
  const countLabel = document.querySelector('#domeCountLabel');

  if (tierBtns.length > 0 && domeCards.length > 0) {
    tierBtns.forEach(btn => {
      btn.addEventListener('click', () => {
        tierBtns.forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
        const tier = btn.dataset.tier;
        let visibleCount = 0;

        domeCards.forEach(card => {
          if (tier === 'All' || card.dataset.tier === tier) {
            card.style.display = '';
            visibleCount++;
          } else {
            card.style.display = 'none';
          }
        });

        if (countLabel) {
          countLabel.textContent = `${visibleCount} ${visibleCount === 1 ? 'dome' : 'domes'} · rates per night for two · taxes as applicable`;
        }
      });
    });
  }

  // 7. Lightbox Functionality
  const lightbox = document.querySelector('.giv-lightbox');
  const lightboxImg = document.querySelector('.giv-lightbox-img');
  const lightboxCloseBtn = document.querySelector('.giv-lightbox-close');

  function openLightbox(src, alt) {
    if (!lightbox || !lightboxImg) return;
    lightboxImg.src = src;
    lightboxImg.alt = alt || 'Glamp Inn Valley';
    lightbox.classList.add('active');
    document.body.style.overflow = 'hidden';
  }

  function closeLightbox() {
    if (!lightbox) return;
    lightbox.classList.remove('active');
    document.body.style.overflow = '';
  }

  if (lightboxCloseBtn) lightboxCloseBtn.addEventListener('click', closeLightbox);
  if (lightbox) {
    lightbox.addEventListener('click', (e) => {
      if (e.target === lightbox) closeLightbox();
    });
  }

  document.querySelectorAll('[data-lightbox]').forEach(img => {
    img.style.cursor = 'pointer';
    img.addEventListener('click', () => {
      openLightbox(img.src, img.alt);
    });
  });

  // 8. Horizontal Timeline Scroll & Drag (A Day Here Section)
  const timelineTrack = document.getElementById('dayTimelineTrack');
  const scrollNextBtn = document.getElementById('timelineScrollNext');
  const scrollPrevBtn = document.getElementById('timelineScrollPrev');
  const floatNextBtn = document.getElementById('timelineFloatNext');
  const floatPrevBtn = document.getElementById('timelineFloatPrev');

  if (timelineTrack) {
    function getScrollStep() {
      const card = timelineTrack.querySelector('.giv-timeline-card');
      if (card) {
        const style = window.getComputedStyle(timelineTrack);
        const gap = parseFloat(style.columnGap || style.gap) || 20;
        const cardWidthWithGap = card.getBoundingClientRect().width + gap;
        // On desktop, scroll 2 cards at a time; on mobile/narrow screens, 1 card
        const visibleCards = Math.max(1, Math.floor(timelineTrack.clientWidth / cardWidthWithGap));
        const count = Math.max(1, Math.min(visibleCards, 2));
        return cardWidthWithGap * count;
      }
      return timelineTrack.clientWidth * 0.75;
    }

    function updateControls() {
      const maxScroll = Math.max(0, timelineTrack.scrollWidth - timelineTrack.clientWidth);
      const currentScroll = timelineTrack.scrollLeft;
      const isAtStart = currentScroll <= 10;
      const isAtEnd = currentScroll >= maxScroll - 15;

      // Update Prev button states
      if (scrollPrevBtn) {
        scrollPrevBtn.disabled = isAtStart;
        scrollPrevBtn.style.opacity = isAtStart ? '0.35' : '1';
        scrollPrevBtn.style.pointerEvents = isAtStart ? 'none' : 'auto';
        scrollPrevBtn.style.cursor = isAtStart ? 'default' : 'pointer';
      }
      if (floatPrevBtn) {
        floatPrevBtn.classList.toggle('disabled', isAtStart);
      }

      // Update Next button states
      if (floatNextBtn) {
        floatNextBtn.classList.toggle('disabled', isAtEnd);
      }

      // Update "Scroll sideways" text and icon when reached the end
      if (scrollNextBtn) {
        const label = scrollNextBtn.querySelector('.giv-timeline-btn-text');
        if (label) {
          label.textContent = isAtEnd ? 'Back to start' : 'Scroll sideways';
        }
        const circle = scrollNextBtn.querySelector('.giv-timeline-nav-circle');
        if (circle) {
          circle.innerHTML = isAtEnd
            ? '<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M1 4v6h6M23 20v-6h-6"/><path d="M20.49 9A9 9 0 0 0 5.64 5.64L1 10m22 4l-4.64 4.36A9 9 0 0 1 3.51 15"/></svg>'
            : '<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M12 5l7 7-7 7"/></svg>';
        }
        scrollNextBtn.setAttribute('title', isAtEnd ? 'Scroll back to start' : 'Next activities');
      }
    }

    function scrollForward() {
      const maxScroll = Math.max(0, timelineTrack.scrollWidth - timelineTrack.clientWidth);
      if (timelineTrack.scrollLeft >= maxScroll - 15) {
        timelineTrack.scrollTo({ left: 0, behavior: 'smooth' });
      } else {
        timelineTrack.scrollBy({ left: getScrollStep(), behavior: 'smooth' });
      }
    }

    function scrollBackward() {
      if (timelineTrack.scrollLeft <= 15) {
        const maxScroll = Math.max(0, timelineTrack.scrollWidth - timelineTrack.clientWidth);
        timelineTrack.scrollTo({ left: maxScroll, behavior: 'smooth' });
      } else {
        timelineTrack.scrollBy({ left: -getScrollStep(), behavior: 'smooth' });
      }
    }

    if (scrollNextBtn) scrollNextBtn.addEventListener('click', scrollForward);
    if (scrollPrevBtn) scrollPrevBtn.addEventListener('click', scrollBackward);
    if (floatNextBtn) floatNextBtn.addEventListener('click', scrollForward);
    if (floatPrevBtn) floatPrevBtn.addEventListener('click', scrollBackward);

    timelineTrack.addEventListener('scroll', updateControls, { passive: true });
    window.addEventListener('resize', updateControls);

    // Initial check
    setTimeout(updateControls, 100);

    // Mouse Drag-to-Scroll on Desktop
    let isDown = false;
    let startX = 0;
    let scrollLeft = 0;

    timelineTrack.addEventListener('mousedown', (e) => {
      if (e.target.closest('button')) return;
      isDown = true;
      timelineTrack.classList.add('is-dragging');
      startX = e.pageX - timelineTrack.offsetLeft;
      scrollLeft = timelineTrack.scrollLeft;
    });

    window.addEventListener('mousemove', (e) => {
      if (!isDown) return;
      e.preventDefault();
      const x = e.pageX - timelineTrack.offsetLeft;
      const walk = (x - startX) * 1.5;
      timelineTrack.scrollLeft = scrollLeft - walk;
    });

    const endDrag = () => {
      if (!isDown) return;
      isDown = false;
      timelineTrack.classList.remove('is-dragging');
      updateControls();
    };

    window.addEventListener('mouseup', endDrag);

    // Accessibility keyboard navigation
    timelineTrack.setAttribute('tabindex', '0');
    timelineTrack.setAttribute('role', 'region');
    timelineTrack.setAttribute('aria-label', 'A Day Here timeline of activities');
    timelineTrack.addEventListener('keydown', (e) => {
      if (e.key === 'ArrowRight') {
        e.preventDefault();
        scrollForward();
      } else if (e.key === 'ArrowLeft') {
        e.preventDefault();
        scrollBackward();
      }
    });
  }

  // 9. Cinematic Ridge Video Reel (Chapter IV · Night on the Ridge)
  const reelRoot = document.getElementById('ridgeVideoReel');
  if (reelRoot) {
    const container = reelRoot.querySelector('.giv-video-reel-container');
    const slides = reelRoot.querySelectorAll('.giv-video-reel-slide');
    const progressSegs = reelRoot.querySelectorAll('.giv-video-reel-progress-seg');
    const progressBars = reelRoot.querySelectorAll('.giv-video-reel-progress-bar');
    const dots = reelRoot.querySelectorAll('.giv-video-reel-dot');
    const captionEl = document.getElementById('reelCaption');
    const subCaptionEl = document.getElementById('reelSubCaption');
    const playPauseBtn = document.getElementById('reelPlayPauseBtn');
    const pauseIcon = playPauseBtn ? playPauseBtn.querySelector('.giv-reel-pause-icon') : null;
    const playIcon = playPauseBtn ? playPauseBtn.querySelector('.giv-reel-play-icon') : null;
    const prevBtn = document.getElementById('reelPrevBtn');
    const nextBtn = document.getElementById('reelNextBtn');

    const totalSlides = slides.length;
    const slideDuration = 5800; // ms per slide
    let currentIndex = 0;
    let isPlaying = true;
    let isVisible = true;
    let progressStartTime = performance.now();
    let elapsedBeforePause = 0;
    let rafId = null;

    function updateCaption(slide) {
      if (!captionEl) return;
      const title = slide.dataset.title || '';
      const sub = slide.dataset.sub || '';

      captionEl.style.opacity = '0';
      captionEl.style.transform = 'translateY(6px)';
      if (subCaptionEl) {
        subCaptionEl.style.opacity = '0';
      }

      setTimeout(() => {
        captionEl.textContent = title;
        if (subCaptionEl) subCaptionEl.textContent = sub;
        captionEl.style.opacity = '1';
        captionEl.style.transform = 'translateY(0)';
        if (subCaptionEl) subCaptionEl.style.opacity = '1';
      }, 200);
    }

    function renderSlide(index) {
      slides.forEach((s, idx) => {
        if (idx === index) {
          s.classList.add('active');
          const img = s.querySelector('img');
          if (img) {
            // Re-trigger Ken Burns animation
            img.style.animation = 'none';
            void img.offsetWidth; // force reflow
            img.style.animation = '';
          }
        } else {
          s.classList.remove('active');
        }
      });

      // Progress bars
      progressBars.forEach((bar, idx) => {
        if (idx < index) {
          bar.style.width = '100%';
        } else if (idx > index) {
          bar.style.width = '0%';
        } else {
          bar.style.width = '0%';
        }
      });

      // Dots
      dots.forEach((dot, idx) => {
        const isActive = idx === index;
        dot.classList.toggle('active', isActive);
        dot.setAttribute('aria-selected', isActive ? 'true' : 'false');
      });

      // Caption
      if (slides[index]) {
        updateCaption(slides[index]);
      }
    }

    function goToSlide(newIndex) {
      currentIndex = (newIndex + totalSlides) % totalSlides;
      elapsedBeforePause = 0;
      progressStartTime = performance.now();
      renderSlide(currentIndex);
    }

    function tick(now) {
      if (!isPlaying || !isVisible) return;

      const elapsed = (now - progressStartTime) + elapsedBeforePause;
      const progress = Math.min(1, elapsed / slideDuration);

      if (progressBars[currentIndex]) {
        progressBars[currentIndex].style.width = (progress * 100).toFixed(2) + '%';
      }

      if (progress >= 1) {
        goToSlide(currentIndex + 1);
      }

      rafId = requestAnimationFrame(tick);
    }

    function playReel() {
      if (isPlaying) return;
      isPlaying = true;
      progressStartTime = performance.now();
      if (container) container.classList.remove('is-paused');
      if (pauseIcon) pauseIcon.style.display = 'block';
      if (playIcon) playIcon.style.display = 'none';
      if (playPauseBtn) playPauseBtn.setAttribute('aria-label', 'Pause video reel');
      cancelAnimationFrame(rafId);
      rafId = requestAnimationFrame(tick);
    }

    function pauseReel() {
      if (!isPlaying) return;
      isPlaying = false;
      elapsedBeforePause += performance.now() - progressStartTime;
      cancelAnimationFrame(rafId);
      if (container) container.classList.add('is-paused');
      if (pauseIcon) pauseIcon.style.display = 'none';
      if (playIcon) playIcon.style.display = 'block';
      if (playPauseBtn) playPauseBtn.setAttribute('aria-label', 'Play video reel');
    }

    function togglePlayPause() {
      if (isPlaying) {
        pauseReel();
      } else {
        playReel();
      }
    }

    // Button event listeners
    if (playPauseBtn) {
      playPauseBtn.addEventListener('click', (e) => {
        e.stopPropagation();
        togglePlayPause();
      });
    }

    if (prevBtn) {
      prevBtn.addEventListener('click', (e) => {
        e.stopPropagation();
        goToSlide(currentIndex - 1);
      });
    }

    if (nextBtn) {
      nextBtn.addEventListener('click', (e) => {
        e.stopPropagation();
        goToSlide(currentIndex + 1);
      });
    }

    dots.forEach((dot) => {
      dot.addEventListener('click', (e) => {
        e.stopPropagation();
        const idx = parseInt(dot.dataset.index, 10);
        if (!isNaN(idx)) goToSlide(idx);
      });
    });

    progressSegs.forEach((seg) => {
      seg.addEventListener('click', (e) => {
        e.stopPropagation();
        const idx = parseInt(seg.dataset.index, 10);
        if (!isNaN(idx)) goToSlide(idx);
      });
    });

    // Touch Swipe Support
    let touchStartX = 0;
    let touchStartY = 0;
    if (container) {
      container.addEventListener('touchstart', (e) => {
        if (e.touches && e.touches[0]) {
          touchStartX = e.touches[0].clientX;
          touchStartY = e.touches[0].clientY;
        }
      }, { passive: true });

      container.addEventListener('touchend', (e) => {
        if (!touchStartX) return;
        const touchEndX = e.changedTouches[0].clientX;
        const touchEndY = e.changedTouches[0].clientY;
        const diffX = touchStartX - touchEndX;
        const diffY = touchStartY - touchEndY;

        if (Math.abs(diffX) > Math.abs(diffY) && Math.abs(diffX) > 40) {
          if (diffX > 0) {
            goToSlide(currentIndex + 1);
          } else {
            goToSlide(currentIndex - 1);
          }
        }
        touchStartX = 0;
      }, { passive: true });
    }

    // Pause on off-screen scroll to save battery and performance
    if ('IntersectionObserver' in window && container) {
      const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          isVisible = entry.isIntersecting;
          if (isVisible && isPlaying) {
            progressStartTime = performance.now();
            cancelAnimationFrame(rafId);
            rafId = requestAnimationFrame(tick);
          } else {
            cancelAnimationFrame(rafId);
          }
        });
      }, { threshold: 0.2 });

      observer.observe(container);
    }

    // Start reel
    renderSlide(0);
    rafId = requestAnimationFrame(tick);
  }

  // 10. Hero Arch Slideshow (for domes.php)
  const heroSlider = document.getElementById('domesHeroSlider');
  if (heroSlider) {
    const slides = heroSlider.querySelectorAll('.giv-hero-arch-slide');
    const dots = heroSlider.querySelectorAll('.giv-hero-arch-dot');
    const prevBtn = heroSlider.querySelector('.giv-hero-arch-prev');
    const nextBtn = heroSlider.querySelector('.giv-hero-arch-next');
    const captionEl = document.getElementById('heroArchCaption');
    const totalSlides = slides.length;
    let currentIndex = 0;
    let heroTimer = null;
    let isHovered = false;
    let isVisible = true;

    function renderHeroSlide(index) {
      currentIndex = (index + totalSlides) % totalSlides;
      slides.forEach((s, idx) => {
        const isActive = idx === currentIndex;
        s.classList.toggle('active', isActive);
      });

      dots.forEach((d, idx) => {
        const isActive = idx === currentIndex;
        d.classList.toggle('active', isActive);
        d.setAttribute('aria-selected', isActive ? 'true' : 'false');
      });

      if (captionEl && slides[currentIndex]) {
        const cap = slides[currentIndex].dataset.caption || '';
        captionEl.style.opacity = '0';
        captionEl.style.transform = 'translateY(4px)';
        setTimeout(() => {
          captionEl.textContent = cap;
          captionEl.style.opacity = '1';
          captionEl.style.transform = 'translateY(0)';
        }, 180);
      }
    }

    function startHeroTimer() {
      stopHeroTimer();
      if (!isHovered && isVisible && heroSlider.offsetParent !== null) {
        heroTimer = setInterval(() => {
          renderHeroSlide(currentIndex + 1);
        }, 5200);
      }
    }

    function stopHeroTimer() {
      if (heroTimer) {
        clearInterval(heroTimer);
        heroTimer = null;
      }
    }

    if (prevBtn) {
      prevBtn.addEventListener('click', (e) => {
        e.stopPropagation();
        renderHeroSlide(currentIndex - 1);
        startHeroTimer();
      });
    }

    if (nextBtn) {
      nextBtn.addEventListener('click', (e) => {
        e.stopPropagation();
        renderHeroSlide(currentIndex + 1);
        startHeroTimer();
      });
    }

    dots.forEach(dot => {
      dot.addEventListener('click', (e) => {
        e.stopPropagation();
        const idx = parseInt(dot.dataset.index, 10);
        if (!isNaN(idx)) {
          renderHeroSlide(idx);
          startHeroTimer();
        }
      });
    });

    heroSlider.addEventListener('mouseenter', () => {
      isHovered = true;
      stopHeroTimer();
    });

    heroSlider.addEventListener('mouseleave', () => {
      isHovered = false;
      startHeroTimer();
    });

    // Touch swipe for hero arch
    let touchStartX = 0;
    let touchStartY = 0;
    heroSlider.addEventListener('touchstart', (e) => {
      if (e.touches && e.touches[0]) {
        touchStartX = e.touches[0].clientX;
        touchStartY = e.touches[0].clientY;
        stopHeroTimer();
      }
    }, { passive: true });

    heroSlider.addEventListener('touchend', (e) => {
      if (!touchStartX) return;
      const touchEndX = e.changedTouches[0].clientX;
      const touchEndY = e.changedTouches[0].clientY;
      const diffX = touchStartX - touchEndX;
      const diffY = touchStartY - touchEndY;
      if (Math.abs(diffX) > Math.abs(diffY) && Math.abs(diffX) > 35) {
        if (diffX > 0) {
          renderHeroSlide(currentIndex + 1);
        } else {
          renderHeroSlide(currentIndex - 1);
        }
      }
      touchStartX = 0;
      startHeroTimer();
    }, { passive: true });

    if ('IntersectionObserver' in window) {
      const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          isVisible = entry.isIntersecting;
          if (isVisible) {
            startHeroTimer();
          } else {
            stopHeroTimer();
          }
        });
      }, { threshold: 0.15 });
      observer.observe(heroSlider);
    } else {
      startHeroTimer();
    }
  }

  // 11. Dome Cards Carousel Slideshow (for all dome cards on domes.php)
  const domeSliders = document.querySelectorAll('[data-dome-slider]');
  domeSliders.forEach((slider, sliderIdx) => {
    const track = slider.querySelector('.giv-dome-slider-track');
    const slides = slider.querySelectorAll('.giv-dome-slide');
    const prevBtn = slider.querySelector('.giv-dome-slider-prev');
    const nextBtn = slider.querySelector('.giv-dome-slider-next');
    const dots = slider.querySelectorAll('.giv-dome-slider-dot');
    const countBadge = slider.querySelector('.giv-dome-slider-count');
    const totalSlides = slides.length;
    if (totalSlides <= 1) return;

    let currentIndex = 0;
    let cardTimer = null;
    let isHovered = false;
    let isVisible = true;
    let isMouseDown = false;
    let mouseStartX = 0;
    let didDrag = false;

    function goToCardSlide(index) {
      currentIndex = (index + totalSlides) % totalSlides;
      if (track) {
        track.style.transform = `translateX(-${currentIndex * 100}%)`;
      }
      dots.forEach((d, idx) => {
        const isActive = idx === currentIndex;
        d.classList.toggle('active', isActive);
        d.setAttribute('aria-selected', isActive ? 'true' : 'false');
      });
      if (countBadge) {
        countBadge.textContent = `${currentIndex + 1} / ${totalSlides}`;
      }
    }

    function startCardTimer() {
      stopCardTimer();
      if (!isHovered && isVisible && slider.offsetParent !== null) {
        cardTimer = setInterval(() => {
          if (slider.offsetParent !== null && !isHovered) {
            goToCardSlide(currentIndex + 1);
          }
        }, 4600 + (sliderIdx % 4) * 350);
      }
    }

    function stopCardTimer() {
      if (cardTimer) {
        clearInterval(cardTimer);
        cardTimer = null;
      }
    }

    if (prevBtn) {
      prevBtn.addEventListener('click', (e) => {
        e.preventDefault();
        e.stopPropagation();
        goToCardSlide(currentIndex - 1);
        startCardTimer();
      });
    }

    if (nextBtn) {
      nextBtn.addEventListener('click', (e) => {
        e.preventDefault();
        e.stopPropagation();
        goToCardSlide(currentIndex + 1);
        startCardTimer();
      });
    }

    dots.forEach(dot => {
      dot.addEventListener('click', (e) => {
        e.preventDefault();
        e.stopPropagation();
        const idx = parseInt(dot.dataset.index, 10);
        if (!isNaN(idx)) {
          goToCardSlide(idx);
          startCardTimer();
        }
      });
    });

    slider.addEventListener('mouseenter', () => {
      isHovered = true;
      stopCardTimer();
    });

    slider.addEventListener('mouseleave', () => {
      isHovered = false;
      startCardTimer();
    });

    // Touch Swipe Support
    let touchStartX = 0;
    let touchStartY = 0;
    slider.addEventListener('touchstart', (e) => {
      if (e.touches && e.touches[0]) {
        touchStartX = e.touches[0].clientX;
        touchStartY = e.touches[0].clientY;
        stopCardTimer();
      }
    }, { passive: true });

    slider.addEventListener('touchend', (e) => {
      if (!touchStartX) return;
      const touchEndX = e.changedTouches[0].clientX;
      const touchEndY = e.changedTouches[0].clientY;
      const diffX = touchStartX - touchEndX;
      const diffY = touchStartY - touchEndY;

      if (Math.abs(diffX) > Math.abs(diffY) && Math.abs(diffX) > 35) {
        if (diffX > 0) {
          goToCardSlide(currentIndex + 1);
        } else {
          goToCardSlide(currentIndex - 1);
        }
      }
      touchStartX = 0;
      startCardTimer();
    }, { passive: true });

    // Mouse drag support & prevent accidental link activation
    slider.addEventListener('mousedown', (e) => {
      if (e.target.closest('button')) return;
      isMouseDown = true;
      didDrag = false;
      mouseStartX = e.clientX;
      stopCardTimer();
    });

    window.addEventListener('mousemove', (e) => {
      if (!isMouseDown) return;
      if (Math.abs(e.clientX - mouseStartX) > 8) {
        didDrag = true;
      }
    });

    window.addEventListener('mouseup', (e) => {
      if (!isMouseDown) return;
      isMouseDown = false;
      if (didDrag) {
        const diffX = mouseStartX - e.clientX;
        if (Math.abs(diffX) > 35) {
          if (diffX > 0) {
            goToCardSlide(currentIndex + 1);
          } else {
            goToCardSlide(currentIndex - 1);
          }
        }
        setTimeout(() => { didDrag = false; }, 60);
      }
      startCardTimer();
    });

    slides.forEach(slide => {
      slide.addEventListener('click', (e) => {
        if (didDrag) {
          e.preventDefault();
          e.stopPropagation();
        }
      });
    });

    // Viewport IntersectionObserver
    if ('IntersectionObserver' in window) {
      const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          isVisible = entry.isIntersecting;
          if (isVisible) {
            startCardTimer();
          } else {
            stopCardTimer();
          }
        });
      }, { threshold: 0.1 });
      observer.observe(slider);
    } else {
      startCardTimer();
    }
  });
});

