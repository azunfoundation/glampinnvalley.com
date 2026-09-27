<?php
/**
 * Glamp Inn Valley - Mobile Sticky Quick Action Bar
 * High-converting mobile action bar featuring direct Call and WhatsApp Check Availability.
 */
?>
<div class="giv-sticky-bookbar giv-quick-action-bar" id="mobileStickyBar" role="region" aria-label="Quick Actions">
  <div class="giv-quick-bar-inner">
    <!-- Call Action -->
    <a href="tel:<?= PHONE_RAW ?>" class="giv-quick-btn giv-quick-call" aria-label="Call <?= PHONE_DISPLAY ?>">
      <svg class="giv-quick-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
        <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
      </svg>
      <span class="giv-quick-label giv-quick-side-label">Call</span>
    </a>

    <!-- Primary WhatsApp / Check Availability Action -->
    <a href="<?= htmlspecialchars(get_booking_url()) ?>" target="_blank" rel="noopener" class="giv-quick-btn giv-quick-primary" aria-label="Check Availability on WhatsApp">
      <svg class="giv-quick-icon giv-quick-wa-icon" width="20" height="20" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
        <path d="M12.04 2C6.58 2 2.13 6.45 2.13 11.91C2.13 13.66 2.59 15.36 3.45 16.86L2.05 22L7.3 20.62C8.75 21.41 10.38 21.83 12.04 21.83C17.5 21.83 21.95 17.38 21.95 11.92C21.95 9.27 20.92 6.78 19.05 4.91C17.18 3.03 14.69 2 12.04 2ZM12.04 20.15C10.56 20.15 9.11 19.76 7.85 19.01L7.55 18.83L4.43 19.65L5.26 16.61L5.06 16.29C4.24 14.99 3.81 13.47 3.81 11.91C3.81 7.37 7.5 3.68 12.04 3.68C14.25 3.68 16.31 4.54 17.87 6.1C19.42 7.66 20.28 9.72 20.28 11.92C20.28 16.46 16.58 20.15 12.04 20.15ZM16.57 14.45C16.32 14.33 15.11 13.73 14.88 13.65C14.65 13.56 14.49 13.52 14.32 13.77C14.15 14.02 13.67 14.59 13.52 14.76C13.38 14.92 13.23 14.94 12.98 14.82C12.74 14.69 11.94 14.43 11 13.59C10.26 12.93 9.77 12.12 9.62 11.87C9.48 11.62 9.61 11.49 9.73 11.37C9.84 11.26 9.98 11.08 10.1 10.94C10.23 10.8 10.27 10.69 10.35 10.53C10.43 10.36 10.39 10.22 10.33 10.1C10.27 9.98 9.77 8.75 9.57 8.25C9.37 7.77 9.17 7.83 9.02 7.82C8.88 7.82 8.71 7.81 8.55 7.81C8.38 7.81 8.12 7.87 7.89 8.12C7.67 8.37 7.03 8.96 7.03 10.18C7.03 11.4 7.92 12.57 8.04 12.74C8.16 12.9 9.79 15.42 12.28 16.5C12.87 16.76 13.33 16.91 13.69 17.03C14.29 17.22 14.83 17.19 15.26 17.13C15.74 17.06 16.73 16.53 16.94 15.96C17.14 15.38 17.14 14.88 17.08 14.78C17.02 14.67 16.82 14.58 16.57 14.45Z"/>
      </svg>
      <span class="giv-quick-label giv-quick-primary-label">Check Availability</span>
    </a>
  </div>
</div>
