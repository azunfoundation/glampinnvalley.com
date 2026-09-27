<?php
/**
 * Glamp Inn Valley - Footer Partial
 */
$footer_kicker = isset($footer_kicker) ? $footer_kicker : 'Your weekend, elsewhere';
$footer_title = isset($footer_title) ? $footer_title : 'The valley is closer than you think.';
$svg_paths = require __DIR__ . '/svg-paths.php';
?>
</main> <!-- /#main-content -->

<!-- Footer Section -->
<footer class="giv-footer-section" style="position: relative; background: linear-gradient(180deg, var(--color-night-mid) 0%, var(--color-night-dark) 100%); color: var(--color-text-light); overflow: hidden; font-family: var(--font-body); margin-top: clamp(64px, 10vw, 140px);">
  <!-- Top Organic Transition Wave -->
  <svg viewBox="0 0 1440 90" preserveAspectRatio="none" aria-hidden="true" style="display: block; width: 100%; height: clamp(40px, 6vw, 90px); position: absolute; top: 0; left: 0; transform: translateY(-99%);">
    <path d="M0 90 L0 64 C130 54 220 26 340 30 C440 34 500 66 600 62 C720 57 780 22 900 26 C1000 29 1050 58 1150 54 C1250 50 1330 32 1440 36 L1440 90 Z" fill="#14262a"></path>
  </svg>

  <!-- Starry Background Points -->
  <div aria-hidden="true" style="position: absolute; inset: 0; background-image: radial-gradient(circle, rgba(241,233,218,.7) 0 1px, transparent 1.6px), radial-gradient(circle, rgba(217,169,98,.55) 0 1px, transparent 1.7px); background-size: 230px 230px, 410px 410px; background-position: 40px 20px, 180px 100px;"></div>

  <!-- Watermark Geodesic Lattice -->
  <svg viewBox="0 0 400 200" aria-hidden="true" style="position: absolute; right: -8%; bottom: 0; width: min(70vw, 820px); height: auto; opacity: .14; pointer-events: none;">
    <path d="<?= $svg_paths['latticeD'] ?>" fill="none" stroke="#d9a962" stroke-width=".7"></path>
  </svg>

  <!-- CTA Box -->
  <div style="position: relative; max-width: 1440px; margin: 0 auto; padding: clamp(64px, 9vw, 120px) clamp(20px, 5vw, 64px) clamp(48px, 6vw, 80px);">
    <p style="margin: 0 0 20px; display: flex; align-items: center; gap: 14px; font-size: 12px; letter-spacing: .24em; text-transform: uppercase; color: var(--color-accent-gold);">
      <span style="display: block; width: 36px; height: 1px; background: var(--color-accent-gold);"></span><?= htmlspecialchars($footer_kicker) ?>
    </p>
    <h2 style="margin: 0 0 30px; font-family: var(--font-heading); font-weight: 300; font-size: clamp(40px, 5.6vw, 84px); line-height: .98; letter-spacing: -.02em; max-width: 16ch; text-wrap: balance;">
      <?= $footer_title ?>
    </h2>
    <div style="display: flex; flex-wrap: wrap; gap: 16px 24px; align-items: center;">
      <a href="<?= htmlspecialchars(get_booking_url()) ?>" target="_blank" rel="noopener" class="giv-btn-gold">
        Check Availability on WhatsApp
      </a>
      <a href="<?= WHATSAPP_COMMUNITY_URL ?>" target="_blank" rel="noopener" class="giv-btn-outline" style="color:var(--color-text-light);border-color:rgba(217,169,98,.5);font-size:14px;height:48px;display:inline-flex;align-items:center;">
        Join WhatsApp Community ↗
      </a>
      <a href="tel:<?= PHONE_RAW ?>" style="color: var(--color-text-light); font-family: var(--font-heading); font-size: 20px; border-bottom: 1px solid rgba(241,233,218,.4); padding-bottom: 2px;">
        <?= PHONE_DISPLAY ?>
      </a>
    </div>
  </div>

  <!-- Sub-Footer / Navigation & Copyright -->
  <div style="position: relative; border-top: 1px solid rgba(241, 233, 218, 0.14); color: var(--color-text-light-subtle);">
    <div class="giv-subfooter-inner" style="max-width: 1440px; margin: 0 auto; padding: 32px clamp(20px, 5vw, 64px) calc(32px + env(safe-area-inset-bottom)); display: flex; flex-wrap: wrap; justify-content: space-between; gap: 24px 40px; font-size: 12px; letter-spacing: .04em;">
      <div style="display: flex; flex-direction: column; gap: 10px;">
        <img src="assets/images/logo-1.webp" alt="Glamp Inn Valley" style="height: 38px; width: auto; align-self: flex-start; filter: brightness(1.2);">
        <span>Glamping and Adventures · <?= SITE_ADDRESS ?></span>
      </div>
      <nav style="display: flex; flex-wrap: wrap; gap: 12px 24px;" aria-label="Footer Links">
        <a href="about.php" style="color: inherit;">The Valley</a>
        <a href="domes.php" style="color: inherit;">Domes &amp; Rates</a>
        <a href="experiences.php" style="color: inherit;">Experiences</a>
        <a href="gallery.php" style="color: inherit;">Gallery</a>
        <a href="contact-us.php" style="color: inherit;">Contact Us</a>
        <a href="contact.php" style="color: inherit;">Getting Here</a>
        <a href="faq.php" style="color: inherit;">FAQ</a>
        <a href="<?= WHATSAPP_COMMUNITY_URL ?>" target="_blank" rel="noopener" style="color: var(--color-accent-gold);">WhatsApp Community</a>
        <a href="<?= DRIVE_TARIFF_URL ?>" target="_blank" rel="noopener" style="color: inherit;">Tariff (PDF)</a>
        <a href="mailto:<?= CONTACT_EMAIL ?>" style="color: inherit;"><?= CONTACT_EMAIL ?></a>
        <a href="<?= INSTAGRAM_URL ?>" target="_blank" rel="noopener" style="color: inherit;">Instagram</a>
        <a href="<?= FACEBOOK_URL ?>" target="_blank" rel="noopener" style="color: inherit;">Facebook</a>
      </nav>
      <div class="giv-subfooter-legal" style="display: flex; flex-wrap: wrap; align-items: center; gap: 6px 12px;">
        <span>© <?= date('Y') ?> Glamping and Adventures. All rights reserved.</span>
        <span class="giv-credit-sep" style="opacity: 0.5;" aria-hidden="true">·</span>
        <a href="privacy-policy.php" style="color: inherit; text-decoration: underline; text-underline-offset: 3px;">Privacy Policy</a>
        <span class="giv-credit-sep" style="opacity: 0.5;" aria-hidden="true">·</span>
        <a href="cancellation-policy.php" style="color: inherit; text-decoration: underline; text-underline-offset: 3px;">Cancellation Policy</a>
        <span class="giv-credit-sep" style="opacity: 0.5;" aria-hidden="true">·</span>
        <span>Designed and developed by <a href="https://creativals.com" target="_blank" rel="noopener" class="giv-credit-link" style="color: var(--color-accent-gold); text-decoration: underline; text-underline-offset: 3px;">creativals.com</a></span>
      </div>
    </div>
  </div>
</footer>

<!-- Lightbox Modal Container -->
<div class="giv-lightbox" id="givLightbox" role="dialog" aria-modal="true" aria-label="Image Preview">
  <button class="giv-lightbox-close" type="button" aria-label="Close Preview">×</button>
  <img src="" alt="" class="giv-lightbox-img" id="givLightboxImg">
</div>

<!-- Scripts -->
<script src="assets/js/main.js?v=<?= filemtime(__DIR__ . '/../assets/js/main.js') ?>"></script>
</body>
</html>
