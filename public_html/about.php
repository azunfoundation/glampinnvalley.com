<?php
/**
 * Glamp Inn Valley - The Valley (About)
 * The story, eco-luxury philosophy, architecture, and ecology.
 */
require_once __DIR__ . '/includes/config.php';
$svg_paths = require __DIR__ . '/includes/svg-paths.php';

$page_title = 'The Valley & Story';
$page_description = 'Learn about Hyderabad\'s first eco-luxury geodesic dome sanctuary in the Vikarabad Hills. Architecture, wilderness, peacocks, and dark sky stargazing.';
$active_nav = 'about';
$is_dark_hero = true;

require __DIR__ . '/includes/header.php';
?>

<!-- =========================================================================
     PAGE HERO
     ========================================================================= -->
<section style="position:relative;background:linear-gradient(180deg,#0f1f23 0%,#1f3b34 100%);color:var(--color-text-light);overflow:hidden;padding:clamp(130px,18vh,190px) 0 0;">
  <div aria-hidden="true" style="position:absolute;inset:0;background-image:radial-gradient(circle,rgba(241,233,218,.6) 0 1px,transparent 1.6px),radial-gradient(circle,rgba(217,169,98,.5) 0 1px,transparent 1.7px);background-size:230px 230px,410px 410px;background-position:40px 20px,180px 100px;mask-image:linear-gradient(180deg,#000 0%,transparent 80%);-webkit-mask-image:linear-gradient(180deg,#000 0%,transparent 80%);"></div>

  <div style="position:relative;max-width:1440px;margin:0 auto;padding:0 clamp(20px,5vw,64px);">
    <p style="margin:0 0 20px;display:flex;align-items:center;gap:14px;font-size:12px;letter-spacing:.24em;text-transform:uppercase;color:var(--color-accent-gold);">
      <span style="display:block;width:36px;height:1px;background:var(--color-accent-gold);"></span>The Valley · Telangana
    </p>
    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(min(100%,320px),1fr));gap:clamp(20px,4vw,56px);align-items:end;">
      <h1 style="margin:0;font-family:var(--font-heading);font-weight:300;font-size:clamp(48px,7.4vw,112px);line-height:.94;letter-spacing:-.025em;text-wrap:balance;">
        Where luxury meets <em style="font-style:italic;color:var(--color-accent-gold);">the wilderness.</em>
      </h1>
      <p style="margin:0 0 clamp(6px,1vw,16px);max-width:42ch;font-size:clamp(15px,1.15vw,18px);line-height:1.6;color:var(--color-text-light-soft);text-wrap:pretty;">
        Glamp Inn Valley was conceived with a single guiding philosophy: to create an architectural retreat that feels like a quiet dream above the clouds without disturbing the sacred terrain of the Vikarabad forest.
      </p>
    </div>
  </div>

  <svg viewBox="0 0 1440 90" preserveAspectRatio="none" aria-hidden="true" style="display:block;width:100%;height:clamp(40px,6vw,90px);margin-top:clamp(40px,6vh,80px);margin-bottom:-1px;background:#1f3b34;">
    <path d="M0 90 L0 62 C120 48 200 30 320 36 C420 41 470 60 560 52 C660 43 720 14 840 20 C940 25 990 52 1090 48 C1190 44 1250 24 1330 28 C1380 31 1410 44 1440 50 L1440 90 Z" fill="#f3efe6"></path>
  </svg>
</section>

<!-- =========================================================================
     THE STORY & ETHOS
     ========================================================================= -->
<section style="padding:clamp(56px,8vw,110px) 0;position:relative;">
  <svg viewBox="0 0 1440 900" preserveAspectRatio="xMidYMin slice" aria-hidden="true" style="position:absolute;inset:0;width:100%;height:100%;pointer-events:none;">
    <path d="<?= $svg_paths['contourD'] ?>" fill="none" stroke="#2f5a4c" stroke-width=".7" opacity=".16"></path>
  </svg>

  <div style="max-width:1440px;margin:0 auto;padding:0 clamp(20px,5vw,64px);position:relative;">
    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(min(100%,320px),1fr));gap:clamp(32px,5vw,96px);align-items:center;">
      <div>
        <p style="margin:0 0 20px;font-size:12px;letter-spacing:.24em;text-transform:uppercase;color:var(--color-accent);">The Origin</p>
        <h2 style="margin:0 0 24px;font-family:var(--font-heading);font-weight:300;font-size:clamp(36px,4.5vw,64px);line-height:1.05;">
          A sanctuary on the edge of the forest.
        </h2>
        <p style="margin:0 0 16px;font-size:15px;line-height:1.75;color:var(--color-text-muted);">
          Just 75 kilometres west of Hyderabad's fast-moving tech corridor lies the undulating ridge of Vikarabad. Known for centuries as the source of the Musi River and surrounded by dense medicinal eucalyptus and teak groves, this highland retains a cooler microclimate and quiet nights.
        </p>
        <p style="margin:0 0 16px;font-size:15px;line-height:1.75;color:var(--color-text-muted);">
          Glamp Inn Valley was developed as Hyderabad's first geodesic dome glamping destination. By choosing self-supporting geodesic domes elevated on stilts rather than pouring heavy concrete slabs, we preserved the natural contours of the ridge and allowed wildlife corridors to remain open.
        </p>
        <p style="margin:0 0 24px;font-size:15px;line-height:1.75;color:var(--color-text-muted);">
          Here, you wake up to the call of native Indian peafowls, drink morning coffee as mist floats through the trees, and watch the sun dip below the hills from your private deck.
        </p>
      </div>

      <div style="position:relative;">
        <img src="assets/images/banner5.webp" alt="Stargazer chairs overlooking the valley" class="plate plate-arch" style="aspect-ratio:4/5;" data-lightbox>
        <div class="giv-about-elevation-badge">
          <div style="font-family:var(--font-heading);font-size:32px;font-weight:300;color:var(--color-accent-gold);line-height:1;">650 m</div>
          <div style="font-size:12px;color:var(--color-text-light-subtle);margin-top:6px;line-height:1.4;">Elevation above sea level, ensuring cool breezes year-round.</div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- =========================================================================
     FOUR PILLARS OF OUR STAY
     ========================================================================= -->
<section style="background:#ffffff;padding:clamp(64px,9vw,120px) 0;border-top:1px solid var(--color-border-dark-subtle);border-bottom:1px solid var(--color-border-dark-subtle);">
  <div style="max-width:1440px;margin:0 auto;padding:0 clamp(20px,5vw,64px);">
    <div style="text-align:center;max-width:680px;margin:0 auto clamp(40px,6vw,72px);">
      <p style="margin:0 0 16px;font-size:12px;letter-spacing:.24em;text-transform:uppercase;color:var(--color-accent);">Eco-Luxury Craft</p>
      <h2 style="margin:0 0 16px;font-family:var(--font-heading);font-weight:300;font-size:clamp(36px,4.5vw,60px);line-height:1.05;">
        Designed with intention.
      </h2>
      <p style="margin:0;font-size:15px;color:var(--color-text-secondary);line-height:1.6;">
        Every detail of Glamp Inn Valley balances luxurious comfort with ecological respect.
      </p>
    </div>

    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(min(100%,260px),1fr));gap:clamp(24px,3vw,40px);">
      <div style="padding:28px 24px;border:1px solid var(--color-border-dark-subtle);border-radius:var(--radius-md);">
        <div style="font-family:var(--font-heading);font-size:32px;color:var(--color-accent);margin-bottom:12px;">01</div>
        <h3 style="margin:0 0 10px;font-family:var(--font-heading);font-size:24px;font-weight:400;">Geodesic Shell</h3>
        <p style="margin:0;font-size:14px;color:var(--color-text-muted);line-height:1.65;">
          The triangular geodesic structure provides maximum internal space with minimal surface material, creating remarkable wind resilience and thermal efficiency.
        </p>
      </div>

      <div style="padding:28px 24px;border:1px solid var(--color-border-dark-subtle);border-radius:var(--radius-md);">
        <div style="font-family:var(--font-heading);font-size:32px;color:var(--color-accent);margin-bottom:12px;">02</div>
        <h3 style="margin:0 0 10px;font-family:var(--font-heading);font-size:24px;font-weight:400;">Dark Sky Nights</h3>
        <p style="margin:0;font-size:14px;color:var(--color-text-muted);line-height:1.65;">
          Shielded from metropolitan light pollution, our ridge opens up panoramic views of celestial constellations and the glowing path of the Milky Way.
        </p>
      </div>

      <div style="padding:28px 24px;border:1px solid var(--color-border-dark-subtle);border-radius:var(--radius-md);">
        <div style="font-family:var(--font-heading);font-size:32px;color:var(--color-accent);margin-bottom:12px;">03</div>
        <h3 style="margin:0 0 10px;font-family:var(--font-heading);font-size:24px;font-weight:400;">Native Wildlife</h3>
        <p style="margin:0;font-size:14px;color:var(--color-text-muted);line-height:1.65;">
          The surrounding forest is home to peacocks, spotted deer, hare, and rare birds. We maintain quiet retreat hours to respect their natural habitats.
        </p>
      </div>

      <div style="padding:28px 24px;border:1px solid var(--color-border-dark-subtle);border-radius:var(--radius-md);">
        <div style="font-family:var(--font-heading);font-size:32px;color:var(--color-accent);margin-bottom:12px;">04</div>
        <h3 style="margin:0 0 10px;font-family:var(--font-heading);font-size:24px;font-weight:400;">Heritage Trails</h3>
        <p style="margin:0;font-size:14px;color:var(--color-text-muted);line-height:1.65;">
          Footpaths lead through the trees to sacred historical sanctuaries like the 400-year-old Bhiravakona temple and the 800-year-old Damagundam temple.
        </p>
      </div>
    </div>
  </div>
</section>

<!-- Mobile Sticky Booking Bar -->
<?php require __DIR__ . '/includes/booking-bar.php'; ?>

<!-- Master Footer -->
<?php
$footer_kicker = 'Reserve your weekend';
$footer_title = 'The valley is closer than you think.';
require __DIR__ . '/includes/footer.php';
?>
