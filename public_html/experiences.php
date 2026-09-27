<?php
/**
 * Glamp Inn Valley - Experiences & Activities Page
 * Curated adventure activities, active packages, stay inclusions, and bespoke add-ons.
 */
require_once __DIR__ . '/includes/config.php';
$svg_paths = require __DIR__ . '/includes/svg-paths.php';

$page_title = 'Experiences, Active Package & Activities';
$page_description = 'From morning treks and archery to horse rides, jungle safaris, floating breakfasts on the infinity pool, and private bonfires under the starlit Vikarabad sky.';
$active_nav = 'experiences';
$is_dark_hero = true;

$experiences = get_experiences_data();
$active_pkg = get_active_package_data();
$addons = get_paid_addons_data();
$inclusions = get_inclusions_detailed();

require __DIR__ . '/includes/header.php';
?>

<!-- =========================================================================
     PAGE HERO
     ========================================================================= -->
<section style="position:relative;background:linear-gradient(180deg,#0f1f23 0%,#1f3b34 100%);color:var(--color-text-light);overflow:hidden;padding:clamp(130px,18vh,190px) 0 0;">
  <div aria-hidden="true" style="position:absolute;inset:0;background-image:radial-gradient(circle,rgba(241,233,218,.6) 0 1px,transparent 1.6px),radial-gradient(circle,rgba(217,169,98,.5) 0 1px,transparent 1.7px);background-size:230px 230px,410px 410px;background-position:40px 20px,180px 100px;mask-image:linear-gradient(180deg,#000 0%,transparent 80%);-webkit-mask-image:linear-gradient(180deg,#000 0%,transparent 80%);"></div>

  <div style="position:relative;max-width:1440px;margin:0 auto;padding:0 clamp(20px,5vw,64px);">
    <p style="margin:0 0 20px;display:flex;align-items:center;gap:14px;font-size:12px;letter-spacing:.24em;text-transform:uppercase;color:var(--color-accent-gold);">
      <span style="display:block;width:36px;height:1px;background:var(--color-accent-gold);"></span>Sanctuary &amp; Adventure
    </p>
    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(min(100%,320px),1fr));gap:clamp(20px,4vw,56px);align-items:end;">
      <div>
        <h1 style="margin:0;font-family:var(--font-heading);font-weight:300;font-size:clamp(44px,7vw,104px);line-height:.96;letter-spacing:-.025em;text-wrap:balance;">
          Fill the day, or fill <em style="font-style:italic;color:var(--color-accent-gold);">none of it.</em>
        </h1>
        <p style="margin:20px 0 0;font-size:13px;letter-spacing:.14em;text-transform:uppercase;color:var(--color-accent-gold);">
          Check-in <?= CHECKIN_TIME ?> · Check-out <?= CHECKOUT_TIME ?>
        </p>
      </div>
      <div>
        <p style="margin:0 0 clamp(16px,2vw,24px);max-width:44ch;font-size:clamp(15px,1.15vw,18px);line-height:1.65;color:var(--color-text-light-soft);text-wrap:pretty;">
          Whether you crave high-adrenaline forest safaris, precision archery, and horseback trails or tranquil floating breakfasts on the infinity pool, Glamp Inn Valley curates moments you will remember forever.
        </p>
        <div style="display:flex;flex-wrap:wrap;gap:12px;">
          <a href="#active-package" class="giv-btn-gold" style="font-size:14px;padding:0 20px;height:46px;">
            View Active Package (₹1,199/-)
          </a>
          <a href="<?= DRIVE_ACTIVITIES_GALLERY_URL ?>" target="_blank" rel="noopener" class="giv-btn-outline" style="font-size:14px;padding:0 20px;height:46px;color:var(--color-text-light);border-color:rgba(241,233,218,.35);">
            Activities Photo Gallery ↗
          </a>
        </div>
      </div>
    </div>
  </div>

  <svg viewBox="0 0 1440 90" preserveAspectRatio="none" aria-hidden="true" style="display:block;width:100%;height:clamp(40px,6vw,90px);margin-top:clamp(40px,6vh,80px);margin-bottom:-1px;background:#1f3b34;">
    <path d="M0 90 L0 62 C120 48 200 30 320 36 C420 41 470 60 560 52 C660 43 720 14 840 20 C940 25 990 52 1090 48 C1190 44 1250 24 1330 28 C1380 31 1410 44 1440 50 L1440 90 Z" fill="#f3efe6"></path>
  </svg>
</section>

<!-- =========================================================================
     IMPORTANT POLICIES ALERT BANNER
     ========================================================================= -->
<section style="background:#f3efe6;padding:24px 0 0;">
  <div style="max-width:1440px;margin:0 auto;padding:0 clamp(20px,5vw,64px);">
    <div style="background:#ffffff;border-left:4px solid var(--color-accent);border-radius:var(--radius-md);padding:clamp(16px,2.5vw,24px);box-shadow:var(--shadow-sm);border-top:1px solid var(--color-border-dark-subtle);border-right:1px solid var(--color-border-dark-subtle);border-bottom:1px solid var(--color-border-dark-subtle);display:grid;grid-template-columns:auto 1fr;gap:clamp(12px,2vw,20px);align-items:center;">
      <div style="width:42px;height:42px;border-radius:50%;background:rgba(182,130,53,.12);color:var(--color-accent);display:flex;align-items:center;justify-content:center;flex-shrink:0;">
        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
      </div>
      <div style="display:flex;flex-direction:column;gap:6px;font-size:14px;color:var(--color-text-muted);line-height:1.6;">
        <div>
          <strong style="color:var(--color-text);">Swimming Pool Attire Policy:</strong>
          <?= POOL_POLICY_NOTE ?>
        </div>
        <div style="font-size:13px;color:var(--color-text-secondary);font-style:italic;">
          **<?= WEATHER_POLICY_NOTE ?>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- =========================================================================
     SECTION 1: THE SIGNATURE ACTIVE PACKAGE (Featured Spotlight)
     ========================================================================= -->
<section id="active-package" style="padding:clamp(48px,7vw,96px) 0 0;">
  <div style="max-width:1440px;margin:0 auto;padding:0 clamp(20px,5vw,64px);">
    <!-- Section Header -->
    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(min(100%,320px),1fr));gap:clamp(20px,3vw,48px);align-items:end;margin-bottom:clamp(28px,4vw,48px);">
      <div>
        <p style="margin:0 0 16px;display:flex;align-items:center;gap:12px;font-size:12px;letter-spacing:.22em;text-transform:uppercase;color:var(--color-accent);">
          <span style="display:block;width:32px;height:1px;background:var(--color-accent);"></span>Adventure Pass
        </p>
        <h2 style="margin:0;font-family:var(--font-heading);font-weight:300;font-size:clamp(34px,4.5vw,60px);line-height:1.04;letter-spacing:-.02em;">
          All-Together <em style="font-style:italic;color:#2f5a4c;">Active Package.</em>
        </h2>
      </div>
      <div>
        <p style="margin:0 0 10px;font-size:14px;color:var(--color-text-muted);line-height:1.65;">
          Combine 4 thrilling hill adventures in one pass for <strong><?= $active_pkg['combo_price'] ?>/- <?= $active_pkg['unit'] ?></strong> (Individual total: <?= $active_pkg['individual_total'] ?>/-). Or choose any activity separately at <strong><?= $active_pkg['single_price'] ?>/- per person</strong>.
        </p>
        <div style="display:inline-flex;align-items:center;gap:10px;background:rgba(47,90,76,.1);padding:6px 14px;border-radius:var(--radius-pill);color:#2f5a4c;font-size:13px;font-weight:500;">
          <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="flex-shrink:0;"><path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"/><line x1="7" y1="7" x2="7.01" y2="7"/></svg>
          <span><?= $active_pkg['savings'] ?></span>
        </div>
      </div>
    </div>

    <!-- 4-Activity Cards Grid -->
    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(min(100%,260px),1fr));gap:clamp(18px,2vw,28px);margin-bottom:clamp(32px,4vw,48px);">
      <?php foreach ($active_pkg['activities'] as $idx => $act): ?>
        <div style="background:#ffffff;border:1px solid var(--color-border-dark-subtle);border-radius:var(--radius-md);padding:24px 20px;box-shadow:var(--shadow-sm);display:flex;flex-direction:column;justify-content:space-between;position:relative;overflow:hidden;">
          <div style="position:absolute;top:0;left:0;right:0;height:3px;background:linear-gradient(90deg,var(--color-accent),#2f5a4c);"></div>
          <div>
            <div style="display:flex;justify-content:space-between;align-items:baseline;margin-bottom:12px;">
              <span style="font-family:var(--font-heading);font-size:24px;font-weight:400;color:var(--color-text);">
                <?= htmlspecialchars($act['name']) ?>
              </span>
              <span style="font-size:11px;letter-spacing:.12em;text-transform:uppercase;color:var(--color-accent);font-weight:600;background:rgba(182,130,53,.1);padding:3px 8px;border-radius:var(--radius-sm);">
                <?= htmlspecialchars($act['spec']) ?>
              </span>
            </div>
            <p style="margin:0 0 16px;font-size:13px;color:var(--color-text-muted);line-height:1.6;">
              <?= htmlspecialchars($act['desc']) ?>
            </p>
          </div>
          <div style="border-top:1px solid var(--color-border-dark-subtle);padding-top:14px;display:flex;justify-content:space-between;align-items:center;">
            <div>
              <div style="font-size:11px;letter-spacing:.1em;text-transform:uppercase;color:var(--color-text-secondary);">Separate Tariff</div>
              <div style="font-family:var(--font-heading);font-size:22px;color:var(--color-text);font-weight:400;"><?= $act['price'] ?></div>
            </div>
            <span style="font-size:12px;color:#2f5a4c;font-weight:500;">In Combo Pass ✓</span>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <!-- Active Package Callout Bar -->
    <div style="background:linear-gradient(135deg,#1f3b34 0%,#14262a 100%);color:var(--color-text-light);border-radius:var(--radius-md);padding:clamp(24px,4vw,40px);display:grid;grid-template-columns:repeat(auto-fit,minmax(min(100%,300px),1fr));gap:24px 40px;align-items:center;box-shadow:var(--shadow-md);">
      <div>
        <div style="display:flex;align-items:center;gap:10px;margin-bottom:8px;">
          <span style="font-size:11px;letter-spacing:.18em;text-transform:uppercase;color:var(--color-accent-gold);background:rgba(217,169,98,.18);padding:3px 10px;border-radius:var(--radius-pill);">Value Combo</span>
          <span style="font-size:13px;color:var(--color-text-light-subtle);"><?= $active_pkg['single_rule'] ?></span>
        </div>
        <h3 style="margin:0 0 10px;font-family:var(--font-heading);font-size:clamp(26px,3vw,38px);font-weight:300;">
          All 4 Activities: <span style="color:var(--color-accent-gold);font-weight:400;"><?= $active_pkg['combo_price'] ?>/-</span> <span style="font-size:16px;color:var(--color-text-light-soft);">per person</span>
        </h3>
        <p style="margin:0;font-size:14px;color:var(--color-text-light-soft);line-height:1.6;">
          Archery (10 shots) + Shooting (10 shots) + Horse ride (15 mins) + Jungle Safari (1 hour). Regular total: ₹1,594/-.
        </p>
      </div>
      <div style="display:flex;flex-wrap:wrap;gap:14px;align-items:center;justify-self:start;">
        <a href="<?= htmlspecialchars(get_whatsapp_url("Hi Glamp Inn Valley, I would like to book the All-Together Active Package (₹1,199/- per person).")) ?>" target="_blank" rel="noopener" class="giv-btn-gold">
          Book Active Package on WhatsApp
        </a>
        <a href="<?= DRIVE_ACTIVITIES_GALLERY_URL ?>" target="_blank" rel="noopener" class="giv-btn-outline" style="color:var(--color-text-light);border-color:rgba(241,233,218,.35);">
          Activities Photos (Drive) ↗
        </a>
      </div>
    </div>
  </div>
</section>

<!-- =========================================================================
     SECTION 2: COMPLIMENTARY WITH EVERY STAY (12 Inclusions)
     ========================================================================= -->
<section style="padding:clamp(56px,8vw,110px) 0 0;">
  <div style="max-width:1440px;margin:0 auto;padding:0 clamp(20px,5vw,64px);">
    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(min(100%,320px),1fr));gap:clamp(20px,3vw,48px);align-items:end;margin-bottom:clamp(32px,5vw,56px);">
      <div>
        <p style="margin:0 0 16px;display:flex;align-items:center;gap:12px;font-size:12px;letter-spacing:.22em;text-transform:uppercase;color:var(--color-accent);">
          <span style="display:block;width:32px;height:1px;background:var(--color-accent);"></span>Standard Hospitality
        </p>
        <h2 style="margin:0;font-family:var(--font-heading);font-weight:300;font-size:clamp(34px,4.5vw,60px);line-height:1.04;letter-spacing:-.02em;">
          Included with <em style="font-style:italic;color:#2f5a4c;">every stay.</em>
        </h2>
      </div>
      <p style="margin:0;font-size:14px;color:var(--color-text-muted);line-height:1.7;max-width:44ch;">
        Every confirmed dome reservation at Glamp Inn Valley includes full complimentary access to all 12 retreat experiences listed below.
      </p>
    </div>

    <!-- 12 Inclusions Grid -->
    <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(min(100%,280px),1fr));gap:clamp(16px,2vw,24px);">
      <?php foreach ($inclusions as $inc): ?>
        <div style="background:#ffffff;border:1px solid var(--color-border-dark-subtle);border-radius:var(--radius-md);padding:20px;box-shadow:var(--shadow-sm);display:flex;align-items:flex-start;gap:16px;">
          <div style="width:40px;height:40px;border-radius:50%;background:rgba(47,90,76,.08);color:#2f5a4c;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
            <?= $inc['icon'] ?>
          </div>
          <div>
            <h3 style="margin:0 0 6px;font-family:var(--font-heading);font-size:19px;font-weight:400;color:var(--color-text);">
              <?= htmlspecialchars($inc['title']) ?>
            </h3>
            <p style="margin:0;font-size:13px;color:var(--color-text-secondary);line-height:1.5;">
              <?= htmlspecialchars($inc['desc']) ?>
            </p>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- =========================================================================
     SECTION 3: CURATED SPECIAL EXPERIENCES & DINING ADD-ONS
     ========================================================================= -->
<section style="padding:clamp(56px,8vw,110px) 0 0;">
  <div style="max-width:1440px;margin:0 auto;padding:0 clamp(20px,5vw,64px);">
    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(min(100%,320px),1fr));gap:clamp(20px,3vw,48px);align-items:end;margin-bottom:clamp(32px,5vw,56px);">
      <div>
        <p style="margin:0 0 16px;display:flex;align-items:center;gap:12px;font-size:12px;letter-spacing:.22em;text-transform:uppercase;color:var(--color-accent);">
          <span style="display:block;width:32px;height:1px;background:var(--color-accent);"></span>Curated Moments
        </p>
        <h2 style="margin:0;font-family:var(--font-heading);font-weight:300;font-size:clamp(34px,4.5vw,60px);line-height:1.04;letter-spacing:-.02em;">
          Special Dining &amp; <em style="font-style:italic;color:#2f5a4c;">Ridge Add-Ons.</em>
        </h2>
      </div>
      <p style="margin:0;font-size:14px;color:var(--color-text-muted);line-height:1.7;max-width:44ch;">
        Bespoke setups crafted for anniversaries, birthdays, romantic evenings, or personalized hilltop leisure. Reserve with our property concierge in advance.
      </p>
    </div>

    <!-- Add-ons Cards Grid -->
    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(min(100%,320px),1fr));gap:clamp(20px,3vw,36px);">
      <?php foreach ($addons as $ad): ?>
        <article style="background:#ffffff;border-radius:var(--radius-md);overflow:hidden;box-shadow:var(--shadow-sm);border:1px solid var(--color-border-dark-subtle);display:flex;flex-direction:column;justify-content:space-between;">
          <div>
            <div style="position:relative;aspect-ratio:16/10;overflow:hidden;">
              <img src="<?= $ad['img'] ?>" alt="<?= htmlspecialchars($ad['name']) ?>" loading="lazy" style="width:100%;height:100%;object-fit:cover;" data-lightbox>
              <div style="position:absolute;top:14px;right:14px;background:rgba(15,31,35,.85);color:var(--color-accent-gold);font-family:var(--font-heading);font-size:18px;padding:4px 12px;border-radius:var(--radius-sm);backdrop-filter:blur(4px);">
                <?= $ad['price'] ?>
              </div>
            </div>
            <div style="padding:22px 20px 14px;">
              <div style="font-size:11px;letter-spacing:.14em;text-transform:uppercase;color:var(--color-text-secondary);margin-bottom:6px;">
                <?= htmlspecialchars($ad['unit']) ?>
              </div>
              <h3 style="margin:0 0 10px;font-family:var(--font-heading);font-size:24px;font-weight:400;">
                <?= htmlspecialchars($ad['name']) ?>
              </h3>
              <p style="margin:0;font-size:14px;color:var(--color-text-muted);line-height:1.6;">
                <?= htmlspecialchars($ad['desc']) ?>
              </p>
            </div>
          </div>
          <div style="padding:14px 20px 20px;border-top:1px solid var(--color-border-dark-subtle);display:flex;justify-content:space-between;align-items:center;">
            <span style="font-size:12px;color:var(--color-text-secondary);">Advance reservation</span>
            <a href="<?= htmlspecialchars(get_whatsapp_url("Hi Glamp Inn Valley, I'd like to book the {$ad['name']} ({$ad['price']}).")) ?>" target="_blank" rel="noopener" class="giv-btn-link" style="font-size:14px;">
              Reserve Setup <span aria-hidden="true">→</span>
            </a>
          </div>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- =========================================================================
     SPOTLIGHT: The Hillside Infinity Pool & Mandatory Nylon Attire Policy
     ========================================================================= -->
<!-- Top wave divider into green -->
<svg viewBox="0 0 1440 90" preserveAspectRatio="none" aria-hidden="true" style="display:block;width:100%;height:clamp(40px,6vw,90px);margin-bottom:-1px;background:#f3efe6;">
  <path d="M0 90 L0 66 C140 56 240 28 360 32 C460 36 520 66 620 62 C740 57 800 20 920 24 C1020 27 1070 58 1170 54 C1270 50 1340 32 1440 36 L1440 90 Z" fill="#1f3b34"></path>
</svg>
<section style="position:relative;background:linear-gradient(180deg,#1f3b34 0%,#25453b 60%,#1f3b34 100%);color:var(--color-text-light);padding:clamp(64px,9vw,120px) 0;">


  <div style="max-width:1440px;margin:0 auto;padding:0 clamp(20px,5vw,64px);">
    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(min(100%,340px),1fr));gap:clamp(32px,5vw,80px);align-items:center;">
      <figure style="margin:0;position:relative;">
        <img src="assets/images/banner2.webp" alt="The infinity pool looking over the Vikarabad valley" class="plate plate-arch" style="aspect-ratio:16/10;" data-lightbox>
        <figcaption style="margin-top:10px;font-size:12px;color:var(--color-text-light-subtle);font-style:italic;">
          The infinity edge perched above the Vikarabad deciduous forest canopy.
        </figcaption>
      </figure>
      <div>
        <p style="margin:0 0 20px;font-size:12px;letter-spacing:.24em;text-transform:uppercase;color:var(--color-accent-gold);">Feature Highlight &amp; Guidelines</p>
        <h2 style="margin:0 0 20px;font-family:var(--font-heading);font-weight:300;font-size:clamp(36px,4.4vw,64px);line-height:1.05;">
          Cut into the hillside. Facing the endless horizon.
        </h2>
        <p style="margin:0 0 16px;font-size:15px;line-height:1.7;color:var(--color-text-light-muted);">
          Our signature infinity pool is carved directly along the natural rock contour of the ridge. The water line seamlessly merges with the vast valley views below.
        </p>

        <!-- Pool Dress Code Notice Box -->
        <div style="background:rgba(15,31,35,.5);border:1px solid rgba(217,169,98,.4);border-radius:var(--radius-md);padding:18px;margin-bottom:24px;">
          <div style="font-size:11px;letter-spacing:.16em;text-transform:uppercase;color:var(--color-accent-gold);margin-bottom:6px;font-weight:600;">
            Mandatory Pool Attire Policy
          </div>
          <p style="margin:0;font-size:13.5px;color:var(--color-text-light);line-height:1.6;">
            <?= POOL_POLICY_NOTE ?>
          </p>
        </div>

        <div style="display:flex;flex-wrap:wrap;gap:14px;align-items:center;">
          <a href="<?= htmlspecialchars(get_booking_url()) ?>" target="_blank" rel="noopener" class="giv-btn-gold">
            Reserve a Dome Stay
          </a>
          <a href="<?= DRIVE_GALLERY_URL ?>" target="_blank" rel="noopener" class="giv-btn-outline" style="color:var(--color-text-light);border-color:rgba(241,233,218,.35);">
            Photo Gallery (Google Drive) ↗
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Mobile Sticky Booking Bar -->
<?php require __DIR__ . '/includes/booking-bar.php'; ?>

<!-- Master Footer -->
<?php
$footer_kicker = 'Plan your activities';
$footer_title = 'The valley is closer than you think.';
require __DIR__ . '/includes/footer.php';
?>
