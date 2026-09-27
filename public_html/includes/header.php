<?php
/**
 * Glamp Inn Valley - Header Partial
 */
if (!defined('SITE_NAME')) {
    require_once __DIR__ . '/config.php';
}

$page_title = isset($page_title) ? $page_title . ' — ' . SITE_NAME : SITE_NAME . ' — ' . SITE_TAGLINE;
$page_description = isset($page_description) ? $page_description : SITE_DESCRIPTION;
$active_nav = isset($active_nav) ? $active_nav : '';
$is_dark_hero = isset($is_dark_hero) ? $is_dark_hero : true;
$og_image = isset($og_image) ? $og_image : 'assets/images/home-slider.webp';
$canonical_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . ($_SERVER['HTTP_HOST'] ?? 'glampinnvalley.com') . ($_SERVER['REQUEST_URI'] ?? '/');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
  <title><?= htmlspecialchars($page_title) ?></title>
  <meta name="description" content="<?= htmlspecialchars($page_description) ?>">
  <meta name="robots" content="index, follow">
  <link rel="canonical" href="<?= htmlspecialchars($canonical_url) ?>">

  <!-- Open Graph / Facebook -->
  <meta property="og:type" content="website">
  <meta property="og:url" content="<?= htmlspecialchars($canonical_url) ?>">
  <meta property="og:title" content="<?= htmlspecialchars($page_title) ?>">
  <meta property="og:description" content="<?= htmlspecialchars($page_description) ?>">
  <meta property="og:image" content="<?= htmlspecialchars($og_image) ?>">
  <meta property="og:site_name" content="<?= SITE_NAME ?>">

  <!-- Twitter -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:url" content="<?= htmlspecialchars($canonical_url) ?>">
  <meta name="twitter:title" content="<?= htmlspecialchars($page_title) ?>">
  <meta name="twitter:description" content="<?= htmlspecialchars($page_description) ?>">
  <meta name="twitter:image" content="<?= htmlspecialchars($og_image) ?>">

  <!-- Favicon -->
  <link rel="icon" type="image/webp" href="assets/images/logo-1.webp">

  <!-- Typography: Cormorant Garamond & Lora -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;1,300;1,400&family=Lora:ital,wght@0,400;0,500;1,400&display=swap" rel="stylesheet">

  <!-- Stylesheets -->
  <link rel="stylesheet" href="assets/css/classical.css">
  <link rel="stylesheet" href="assets/css/styles.css?v=<?= filemtime(__DIR__ . '/../assets/css/styles.css') ?>">

  <!-- Schema.org JSON-LD for Hospitality / Resort -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Resort",
    "name": "<?= SITE_NAME ?>",
    "description": "<?= SITE_DESCRIPTION ?>",
    "url": "<?= htmlspecialchars($canonical_url) ?>",
    "telephone": "<?= PHONE_RAW ?>",
    "email": "<?= CONTACT_EMAIL ?>",
    "address": {
      "@type": "PostalAddress",
      "streetAddress": "Sy.no 50, Thirmalapur Village, Pudur Mandal",
      "addressLocality": "Vikarabad",
      "addressRegion": "Telangana",
      "postalCode": "501101",
      "addressCountry": "IN"
    },
    "geo": {
      "@type": "GeoCoordinates",
      "latitude": 17.3364,
      "longitude": 77.9044
    },
    "priceRange": "₹9,999 - ₹16,499",
    "checkinTime": "14:00",
    "checkoutTime": "11:00",
    "amenityFeature": [
      { "@type": "LocationFeatureSpecification", "name": "Infinity Pool", "value": true },
      { "@type": "LocationFeatureSpecification", "name": "Geodesic Luxury Domes", "value": true },
      { "@type": "LocationFeatureSpecification", "name": "Stargazing and Bonfire", "value": true },
      { "@type": "LocationFeatureSpecification", "name": "Private Hill Deck", "value": true },
      { "@type": "LocationFeatureSpecification", "name": "Guided Forest Treks", "value": true }
    ]
  }
  </script>
</head>
<body>

<!-- Micro-texture noise overlay -->
<div class="giv-texture-grain" aria-hidden="true"></div>

<!-- Master Header Navigation -->
<?php require __DIR__ . '/nav.php'; ?>
<main id="main-content">
