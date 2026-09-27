<?php
/**
 * Glamp Inn Valley - Navigation Bar & Mobile Drawer Partial
 */
$is_home = basename($_SERVER['PHP_SELF']) === 'index.php';
$nav_links = [
    ['label' => 'The Valley', 'href' => $is_home ? '#story' : 'about.php', 'page' => 'about'],
    ['label' => 'Domes & Rates', 'href' => 'domes.php', 'page' => 'domes'],
    ['label' => 'Experiences', 'href' => $is_home ? '#experiences' : 'experiences.php', 'page' => 'experiences'],
    ['label' => 'Gallery', 'href' => $is_home ? '#gallery' : 'gallery.php', 'page' => 'gallery'],
    ['label' => 'Getting Here', 'href' => $is_home ? '#location' : 'contact.php', 'page' => 'contact'],
    ['label' => 'FAQ', 'href' => 'faq.php', 'page' => 'faq']
];
?>
<header class="giv-header <?= (!$is_dark_hero) ? 'on-light-unscrolled' : '' ?>" data-dark-hero="<?= $is_dark_hero ? 'true' : 'false' ?>">
  <div class="giv-header-inner">
    <!-- Brand Logo -->
    <a href="index.php" class="giv-logo-link" aria-label="Glamp Inn Valley Home">
      <img src="assets/images/logo-1.webp" alt="Glamp Inn Valley" class="giv-logo" style="<?= $is_dark_hero ? 'filter: brightness(1.25);' : '' ?>">
    </a>

    <!-- Desktop Navigation Links -->
    <nav class="giv-nav-links giv-desktop-nav" aria-label="Primary Navigation">
      <?php foreach ($nav_links as $l): ?>
        <?php $isActive = (isset($active_nav) && $active_nav === $l['page']); ?>
        <a href="<?= htmlspecialchars($l['href']) ?>" class="giv-nav-link <?= $isActive ? 'active' : '' ?>">
          <?= htmlspecialchars($l['label']) ?>
        </a>
      <?php endforeach; ?>
    </nav>

    <!-- Header Actions -->
    <div style="display: flex; align-items: center; gap: 12px;">
      <a href="<?= htmlspecialchars(get_booking_url()) ?>" target="_blank" rel="noopener" class="giv-btn-nav giv-desktop-nav">
        Check Availability
      </a>
      <!-- Mobile Toggle -->
      <button class="giv-menu-btn giv-mobile-toggle" aria-label="Open Navigation Menu" type="button">
        <span class="giv-menu-icon"></span>
      </button>
    </div>
  </div>
</header>

<!-- Mobile Navigation Drawer -->
<div class="giv-mobile-drawer" id="mobileDrawer" role="dialog" aria-modal="true" aria-label="Mobile Navigation">
  <button class="giv-drawer-close" aria-label="Close Navigation Menu" type="button">×</button>
  <nav class="giv-drawer-nav">
    <?php foreach ($nav_links as $l): ?>
      <?php $isActive = (isset($active_nav) && $active_nav === $l['page']); ?>
      <a href="<?= htmlspecialchars($l['href']) ?>" class="<?= $isActive ? 'active' : '' ?>">
        <?= htmlspecialchars($l['label']) ?>
      </a>
    <?php endforeach; ?>
  </nav>
  <div class="giv-drawer-actions">
    <a href="<?= htmlspecialchars(get_booking_url()) ?>" target="_blank" rel="noopener" class="giv-drawer-btn-primary">
      Check Availability on WhatsApp
    </a>
    <a href="<?= WHATSAPP_COMMUNITY_URL ?>" target="_blank" rel="noopener" class="giv-drawer-btn-secondary">
      Join WhatsApp Community
    </a>
    <a href="tel:<?= PHONE_RAW ?>" class="giv-drawer-phone">
      <?= PHONE_DISPLAY ?>
    </a>
  </div>
</div>
