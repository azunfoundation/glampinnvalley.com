<?php
/**
 * Glamp Inn Valley - 404 Error Page
 */
http_response_code(404);
require_once __DIR__ . '/includes/config.php';

$page_title = 'Page Not Found';
$page_description = 'The page you are looking for does not exist on the Glamp Inn Valley ridge.';
$active_nav = '';
$is_dark_hero = true;

require __DIR__ . '/includes/header.php';
?>

<section style="min-height:80vh;display:flex;align-items:center;justify-content:center;position:relative;background:linear-gradient(180deg,#0f1f23 0%,#14262a 50%,#1f3b34 100%);color:var(--color-text-light);padding:clamp(120px,16vh,180px) 20px 80px;text-align:center;">
  <!-- Twinkling stars background -->
  <div aria-hidden="true" style="position:absolute;inset:0;background-image:radial-gradient(circle,rgba(241,233,218,.7) 0 1px,transparent 1.6px),radial-gradient(circle,rgba(217,169,98,.6) 0 1px,transparent 1.6px);background-size:220px 220px,380px 380px;opacity:.8;"></div>

  <div style="position:relative;max-width:680px;margin:0 auto;">
    <div style="font-family:var(--font-heading);font-size:clamp(80px,14vw,140px);font-weight:300;line-height:1;color:var(--color-accent-gold);margin-bottom:10px;">
      404
    </div>
    <p style="margin:0 0 16px;font-size:12px;letter-spacing:.24em;text-transform:uppercase;color:var(--color-accent-gold);">
      Off the Path
    </p>
    <h1 style="margin:0 0 20px;font-family:var(--font-heading);font-weight:300;font-size:clamp(36px,5vw,56px);line-height:1.1;">
      The coordinates lead <em style="font-style:italic;color:var(--color-accent-gold);">nowhere.</em>
    </h1>
    <p style="margin:0 0 32px;font-size:16px;color:var(--color-text-light-soft);line-height:1.7;">
      The trail you followed doesn't exist on this ridge. Let us guide you back to the warmth of the domes.
    </p>

    <div style="display:flex;flex-wrap:wrap;gap:14px;justify-content:center;">
      <a href="index.php" class="giv-btn-gold">
        Return to Sanctuary
      </a>
      <a href="domes.php" style="display:inline-flex;align-items:center;gap:10px;height:52px;padding:0 24px;color:var(--color-text-light);font-family:var(--font-heading);font-weight:500;font-size:18px;border:1px solid rgba(241,233,218,.4);border-radius:4px;">
        View Domes &amp; Rates
      </a>
    </div>
  </div>
</section>

<!-- Master Footer -->
<?php
$footer_kicker = 'Need Assistance?';
$footer_title = 'Our concierge is here to help.';
require __DIR__ . '/includes/footer.php';
?>
