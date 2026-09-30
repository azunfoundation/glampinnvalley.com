<?php
/**
 * Glamp Inn Valley - Homepage
 * Production implementation of Glamp Inn Valley Home v3 Claude Design.
 */
require_once __DIR__ . '/includes/config.php';
$svg_paths = require __DIR__ . '/includes/svg-paths.php';

$page_title = 'Glamp Inn Valley — Luxury Dome Stays in the Vikarabad Hills';
$page_description = 'Eight geodesic domes on a forested ridge two hours from Hyderabad. An infinity pool at the edge of the hills, a fire of your own, and nights with more stars than you remember.';
$active_nav = 'home';
$is_dark_hero = true;

$domes = get_homepage_domes_data();
$experiences = get_experiences_data();
$day_timeline = get_day_timeline();
$reviews = get_reviews_data();
$events = get_events_data();

$domeFeatures = [
    ['n' => '01', 'title' => 'Private deck', 'body' => 'Your own terrace over the hillside, with stargazer chairs for the evening show.'],
    ['n' => '02', 'title' => 'Valley window', 'body' => 'A full-height glazed panel facing east across the forest.'],
    ['n' => '03', 'title' => 'En-suite bath', 'body' => 'Attached bathroom with hot water, inside the dome.'],
    ['n' => '04', 'title' => 'Infinity hammock', 'body' => 'In Sangla, Silent, Solang and Spiti: a net hung out over the drop.']
];

$plateC = 'width:100%;height:100%;object-fit:cover;display:block;border:6px solid #ece6d8;outline:1px solid rgba(29,42,38,.16);filter:sepia(.15) saturate(.9) contrast(1.04);';

$gallery = [
    ['src' => 'assets/images/gallery-image.webp', 'alt' => 'Dome on its deck in tall grass', 'style' => $plateC . 'grid-column:span 2;grid-row:span 2;border-radius:999px 999px 0 0;'],
    ['src' => 'assets/images/gallery-1.webp', 'alt' => 'Bed and gold sconces inside a dome', 'style' => $plateC],
    ['src' => 'assets/images/gallery-3.webp', 'alt' => 'Twin Valley sign among red foliage', 'style' => $plateC],
    ['src' => 'assets/images/banner5.webp', 'alt' => 'Deck chairs facing the hills', 'style' => $plateC . 'grid-column:span 2;'],
    ['src' => 'assets/images/infinity-pool.webp', 'alt' => 'Guest in a hat by the infinity pool', 'style' => $plateC . 'grid-row:span 2;border-radius:0 0 999px 999px;'],
    ['src' => 'assets/images/gallery-2.webp', 'alt' => 'Chess set on the deck', 'style' => $plateC],
    ['src' => 'assets/images/barbeque.webp', 'alt' => 'Barbecue with friends at night', 'style' => $plateC],
    ['src' => 'assets/images/gallery-b5.webp', 'alt' => 'Barbecue table on the lawn above the pool', 'style' => $plateC . 'grid-column:span 2;']
];

require __DIR__ . '/includes/header.php';
?>

<!-- =========================================================================
     HERO SECTION · Night into Dawn
     ========================================================================= -->
<section id="top" class="giv-hero-section" style="position:relative;background:linear-gradient(180deg,#0f1f23 0%,#14262a 45%,#1f3b34 100%);color:var(--color-text-light);overflow:hidden;padding-top:clamp(120px,16vh,180px);">
  <!-- Twinkling starlight background -->
  <div aria-hidden="true" class="giv-hero-stars" style="position:absolute;inset:0;background-image:radial-gradient(circle,rgba(241,233,218,.7) 0 1px,transparent 1.6px),radial-gradient(circle,rgba(241,233,218,.45) 0 .8px,transparent 1.4px),radial-gradient(circle,rgba(217,169,98,.6) 0 1px,transparent 1.6px);background-size:220px 220px,140px 140px,380px 380px;background-position:0 0,60px 90px,140px 40px;opacity:.9;mask-image:linear-gradient(180deg,#000 0%,#000 40%,transparent 80%);-webkit-mask-image:linear-gradient(180deg,#000 0%,#000 40%,transparent 80%);"></div>

  <!-- Moon and constellation lines -->
  <svg viewBox="0 0 400 220" aria-hidden="true" class="giv-hero-moon" style="position:absolute;right:clamp(20px,8vw,140px);top:clamp(56px,7vh,88px);width:clamp(0px,(100vw - 760px) * 1.2,340px);height:auto;opacity:.75;pointer-events:none;">
    <path d="M318 26 A34 34 0 1 0 318 94 A27 27 0 1 1 318 26 Z" fill="none" stroke="#d9a962" stroke-width=".9"></path>
    <g fill="#f1e9da">
      <circle cx="40" cy="160" r="1.6"></circle>
      <circle cx="96" cy="118" r="1.3"></circle>
      <circle cx="150" cy="140" r="1.8"></circle>
      <circle cx="204" cy="96" r="1.3"></circle>
      <circle cx="236" cy="150" r="1.5"></circle>
      <circle cx="120" cy="60" r="1.2"></circle>
    </g>
    <path d="M40 160 L96 118 L150 140 L204 96 L236 150 M96 118 L120 60" fill="none" stroke="#f1e9da" stroke-width=".5" opacity=".45" stroke-dasharray="1 3"></path>
  </svg>

  <!-- Glowing Fireflies -->
  <div aria-hidden="true" class="giv-hero-fireflies" style="position:absolute;inset:0;pointer-events:none;overflow:hidden;">
    <?php
    $firefly_seeds = [
      ['left' => '15%', 'top' => '35%', 'dur' => '9.2s', 'del' => '-3.1s'],
      ['left' => '28%', 'top' => '65%', 'dur' => '12.4s', 'del' => '-7.4s'],
      ['left' => '42%', 'top' => '40%', 'dur' => '8.6s', 'del' => '-1.8s'],
      ['left' => '65%', 'top' => '55%', 'dur' => '14.1s', 'del' => '-9.2s'],
      ['left' => '78%', 'top' => '30%', 'dur' => '10.5s', 'del' => '-4.6s'],
      ['left' => '88%', 'top' => '72%', 'dur' => '11.8s', 'del' => '-6.3s'],
      ['left' => '35%', 'top' => '80%', 'dur' => '13.2s', 'del' => '-10.1s'],
      ['left' => '52%', 'top' => '25%', 'dur' => '8.9s', 'del' => '-2.4s'],
      ['left' => '70%', 'top' => '78%', 'dur' => '15.0s', 'del' => '-8.7s'],
      ['left' => '22%', 'top' => '50%', 'dur' => '10.8s', 'del' => '-5.5s'],
    ];
    foreach ($firefly_seeds as $ff): ?>
      <span style="position:absolute;left:<?= $ff['left'] ?>;top:<?= $ff['top'] ?>;width:3px;height:3px;border-radius:50%;background:#e8c07a;box-shadow:0 0 6px 2px rgba(232,192,122,.55);opacity:0;animation:giv-firefly <?= $ff['dur'] ?> ease-in-out <?= $ff['del'] ?> infinite alternate;"></span>
    <?php endforeach; ?>
  </div>

  <div class="giv-hero-content-wrap" style="position:relative;max-width:1440px;margin:0 auto;padding:0 clamp(20px,5vw,64px);">
    <div class="giv-hero-grid" style="display:grid;grid-template-columns:repeat(auto-fit,minmax(min(100%,320px),1fr));gap:clamp(20px,4vw,56px);align-items:end;">
      <div class="giv-hero-col-title">
        <p class="giv-hero-location" style="margin:0 0 20px;display:flex;align-items:center;gap:14px;font-size:12px;letter-spacing:.24em;text-transform:uppercase;color:var(--color-accent-gold);">
          <span class="giv-hero-location-bar" style="display:block;width:36px;height:1px;background:var(--color-accent-gold);"></span><?= SITE_LOCATION_SHORT ?>
        </p>
        <h1 class="giv-hero-heading" style="margin:0;font-family:var(--font-heading);font-weight:300;font-size:clamp(52px,8.4vw,132px);line-height:.92;letter-spacing:-.025em;text-wrap:balance;">
          Sleep under<br>the whole <em style="font-style:italic;font-weight:300;color:var(--color-accent-gold);">sky.</em>
        </h1>
      </div>
      <div class="giv-hero-col-copy" style="padding-bottom:clamp(6px,1.2vw,18px);">
        <p class="giv-hero-desc" style="margin:0 0 24px;max-width:40ch;font-size:clamp(15px,1.15vw,18px);line-height:1.6;color:var(--color-text-soft);text-wrap:pretty;">
          Eight geodesic domes on a forested ridge two hours from Hyderabad. An infinity pool at the edge of the hills, a fire of your own, and nights with more stars than you remember.
        </p>
        <div class="giv-hero-actions" style="display:flex;flex-wrap:wrap;gap:14px;align-items:center;">
          <a href="<?= htmlspecialchars(get_booking_url()) ?>" target="_blank" rel="noopener" class="giv-btn-gold giv-hero-btn-book">
            Check Availability
          </a>
          <a href="#story" class="giv-hero-btn-story" style="display:inline-flex;align-items:center;gap:10px;height:52px;color:var(--color-text-light);font-family:var(--font-heading);font-weight:500;font-size:19px;border-bottom:1px solid rgba(241,233,218,.4);">
            Begin the story <span aria-hidden="true">↓</span>
          </a>
        </div>
      </div>
    </div>
  </div>

  <!-- Dome-shaped hero plate with lattice overlay -->
  <div class="giv-hero-plate-wrap" style="position:relative;max-width:1440px;margin:clamp(36px,6vh,72px) auto 0;padding:0 clamp(20px,5vw,64px);">
    <div class="giv-hero-plate" style="position:relative;width:100%;aspect-ratio:2/1;min-height:clamp(260px,52vh,440px);max-height:70vh;border-radius:50% 50% 0 0 / 100% 100% 0 0;overflow:hidden;border:1px solid rgba(217,169,98,.5);border-bottom:0;">
      <img class="giv-hero-image" src="assets/images/home-slider.webp" alt="Sunset over the valley from a private dome deck" style="position:absolute;inset:0;width:100%;height:100%;object-fit:cover;object-position:70% 55%;">
      <div class="giv-hero-overlay" style="position:absolute;inset:0;background:linear-gradient(180deg,rgba(15,31,35,.35) 0%,rgba(15,31,35,0) 40%);"></div>
      <svg class="giv-hero-lattice" viewBox="0 0 400 200" preserveAspectRatio="xMidYEnd meet" aria-hidden="true" style="position:absolute;inset:0;width:100%;height:100%;opacity:.55;mix-blend-mode:screen;pointer-events:none;">
        <path d="<?= $svg_paths['logoDomeArchD'] ?>" fill="none" stroke="#f1e9da" stroke-width=".6" stroke-linecap="round" stroke-linejoin="round" vector-effect="non-scaling-stroke"></path>
      </svg>
      <div class="giv-hero-caption" style="position:absolute;left:0;right:0;bottom:0;display:flex;flex-wrap:wrap;gap:6px 16px;justify-content:space-between;align-items:flex-end;padding:clamp(14px,2.5vw,32px);font-size:11px;letter-spacing:.14em;text-transform:uppercase;color:var(--color-text-light);text-shadow:0 1px 8px rgba(0,0,0,.5);">
        <span><?= SITE_COORDINATES ?></span>
        <span style="display:inline-flex;align-items:center;gap:8px">
          <svg width="9" height="9" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><polygon points="6 3 20 12 6 21"></polygon></svg>
          Vikarabad Ridge Sanctuary
        </span>
      </div>
    </div>
  </div>

  <!-- Organic wave transition into cream -->
  <svg class="giv-hero-wave" viewBox="0 0 1440 90" preserveAspectRatio="none" aria-hidden="true" style="display:block;width:100%;height:clamp(40px,6vw,90px);margin-top:-1px;background:#1f3b34;">
    <path d="M0 90 L0 62 C120 48 200 30 320 36 C420 41 470 60 560 52 C660 43 720 14 840 20 C940 25 990 52 1090 48 C1190 44 1250 24 1330 28 C1380 31 1410 44 1440 50 L1440 90 Z" fill="#f3efe6"></path>
  </svg>
</section>

<!-- =========================================================================
     CHAPTER I · The Valley (Cream ground)
     ========================================================================= -->
<section id="story" style="padding:clamp(56px,9vw,130px) 0 0;position:relative;">
  <!-- Topographic contour background -->
  <svg viewBox="0 0 1440 900" preserveAspectRatio="xMidYMin slice" aria-hidden="true" style="position:absolute;inset:0;width:100%;height:100%;pointer-events:none;">
    <path d="<?= $svg_paths['contourD'] ?>" fill="none" stroke="#2f5a4c" stroke-width=".7" opacity=".16"></path>
  </svg>

  <!-- Swaying botanical fern frond with parallax -->
  <svg data-parallax="-40" viewBox="0 0 220 420" aria-hidden="true" style="position:absolute;left:clamp(-60px,-4vw,-20px);top:clamp(120px,14vw,220px);width:clamp(120px,14vw,220px);height:auto;pointer-events:none;transform-origin:bottom left;animation:giv-sway 9s ease-in-out infinite alternate;">
    <path d="<?= $svg_paths['fernD'] ?>" fill="none" stroke="#2f5a4c" stroke-width="1" stroke-linecap="round" opacity=".55"></path>
  </svg>

  <div style="max-width:1440px;margin:0 auto;padding:0 clamp(20px,5vw,64px);">
    <div data-reveal style="display:grid;grid-template-columns:repeat(auto-fit,minmax(min(100%,340px),1fr));gap:clamp(32px,5vw,96px);align-items:start;">
      <div>
        <p style="margin:0 0 22px;display:flex;align-items:center;gap:14px;font-size:12px;letter-spacing:.24em;text-transform:uppercase;color:var(--color-accent);">
          <span style="font-family:var(--font-heading);font-size:14px;font-variant-numeric:tabular-nums;">I</span>
          <span style="display:block;width:36px;height:1px;background:var(--color-accent);"></span>The valley
        </p>
        <h2 style="margin:0;font-family:var(--font-heading);font-weight:300;font-size:clamp(38px,4.8vw,72px);line-height:1.02;letter-spacing:-.02em;text-wrap:balance;">
          Perched above an endless valley, in the company of a <em style="font-style:italic;color:#2f5a4c;">verdant forest.</em>
        </h2>
      </div>
      <div style="padding-top:clamp(0px,1.5vw,20px);">
        <p style="margin:0 0 18px;font-size:clamp(15px,1.15vw,17px);line-height:1.75;color:var(--color-text-muted);text-align:justify;hyphens:auto;">
          As you climb the winding roads into the Vikarabad hills, the city thins out behind you. Your futuristic yet intimate abode waits on the ridge: a geodesic dome with a private deck, an infinity pool cut into the hillside, and evenings that end around a fire under a sky full of stars.
        </p>
        <p style="margin:0 0 30px;font-size:clamp(15px,1.15vw,17px);line-height:1.75;color:var(--color-text-muted);text-align:justify;hyphens:auto;">
          Glamp Inn Valley is Hyderabad's first stay of its kind — an eco-friendly haven where luxury finds its home amidst nature, and where peacocks are your only neighbours.
        </p>
        <div style="display:flex;flex-wrap:wrap;gap:20px clamp(24px,4vw,56px);border-top:1px solid var(--color-border-dark);padding-top:22px;font-family:var(--font-heading);">
          <div>
            <div style="font-size:40px;line-height:1;font-weight:300;font-variant-numeric:tabular-nums;">8</div>
            <div style="font-family:var(--font-body);font-size:11px;letter-spacing:.14em;text-transform:uppercase;color:var(--color-text-secondary);margin-top:8px;">Domes</div>
          </div>
          <div>
            <div style="font-size:40px;line-height:1;font-weight:300;font-variant-numeric:tabular-nums;">2 hrs</div>
            <div style="font-family:var(--font-body);font-size:11px;letter-spacing:.14em;text-transform:uppercase;color:var(--color-text-secondary);margin-top:8px;">From Hyderabad</div>
          </div>
          <div>
            <div style="font-size:40px;line-height:1;font-weight:300;font-variant-numeric:tabular-nums;">∞</div>
            <div style="font-family:var(--font-body);font-size:11px;letter-spacing:.14em;text-transform:uppercase;color:var(--color-text-secondary);margin-top:8px;">Pool · Stars</div>
          </div>
        </div>
      </div>
    </div>

    <!-- Layered plates: aerial arch + rectangle + drawn ridge -->
    <div data-reveal style="position:relative;display:flex;flex-wrap:wrap;gap:clamp(20px,2vw,28px);margin-top:clamp(48px,7vw,100px);align-items:flex-end;">
      <svg viewBox="0 0 800 160" preserveAspectRatio="none" aria-hidden="true" style="position:absolute;left:0;right:0;bottom:-6%;width:100%;height:38%;pointer-events:none;">
        <path d="M0 150 C90 120 140 70 230 82 C300 90 330 130 420 118 C520 104 560 40 660 52 C730 60 760 110 800 124" fill="none" stroke="#2f5a4c" stroke-width="1" stroke-dasharray="3 5" opacity=".5"></path>
      </svg>
      <figure style="margin:0;flex:1 1 420px;min-width:0;position:relative;">
        <img src="assets/images/banner4.webp" alt="Aerial view of two domes on a shared deck among the greenery" loading="lazy" class="plate" style="aspect-ratio:16/10;">
        <figcaption style="margin-top:10px;font-size:12px;color:var(--color-text-secondary);font-style:italic;">Twin Valley, seen from above the ridge.</figcaption>
      </figure>
      <figure class="giv-valley-plate-offset" style="margin:0;flex:1 1 260px;min-width:0;position:relative;">
        <img src="assets/images/gallery-4.webp" alt="Stone path lined with red foliage leading toward the forest" loading="lazy" class="plate plate-arch" style="aspect-ratio:4/5;">
        <figcaption style="margin-top:10px;font-size:12px;color:var(--color-text-secondary);font-style:italic;">The walk down to the pool.</figcaption>
      </figure>
    </div>
  </div>
</section>

<!-- =========================================================================
     CHAPTER II · The Dome (Forest Green Ground)
     ========================================================================= -->
<!-- Top wave divider into green -->
<svg viewBox="0 0 1440 90" preserveAspectRatio="none" aria-hidden="true" style="display:block;width:100%;height:clamp(40px,6vw,90px);margin-bottom:-1px;background:#f3efe6;">
  <path d="M0 90 L0 70 C150 60 260 30 380 34 C480 38 540 70 640 66 C760 61 820 22 940 24 C1040 26 1090 58 1190 56 C1290 54 1360 34 1440 38 L1440 90 Z" fill="#1f3b34"></path>
</svg>
<section id="dome" style="position:relative;background:linear-gradient(180deg,#1f3b34 0%,#25453b 60%,#1f3b34 100%);color:var(--color-text-light);">


  <!-- Gold contour lines -->
  <svg viewBox="0 0 1440 900" preserveAspectRatio="xMidYMid slice" aria-hidden="true" style="position:absolute;inset:0;width:100%;height:100%;pointer-events:none;">
    <path d="<?= $svg_paths['contourD'] ?>" fill="none" stroke="#d9a962" stroke-width=".7" opacity=".1"></path>
  </svg>

  <div style="position:relative;max-width:1440px;margin:0 auto;padding:clamp(48px,7vw,100px) clamp(20px,5vw,64px) clamp(64px,9vw,130px);">
    <div data-reveal style="display:grid;grid-template-columns:repeat(auto-fit,minmax(min(100%,340px),1fr));gap:clamp(32px,5vw,96px);align-items:center;">
      <div>
        <p style="margin:0 0 22px;display:flex;align-items:center;gap:14px;font-size:12px;letter-spacing:.24em;text-transform:uppercase;color:var(--color-accent-gold);">
          <span style="font-family:var(--font-heading);font-size:14px;">II</span>
          <span style="display:block;width:36px;height:1px;background:var(--color-accent-gold);"></span>The dome
        </p>
        <h2 style="margin:0 0 22px;font-family:var(--font-heading);font-weight:300;font-size:clamp(38px,4.8vw,72px);line-height:1.02;letter-spacing:-.02em;text-wrap:balance;">
          A room with no corners, and a window the size of the sky.
        </h2>
        <p style="margin:0 0 32px;max-width:44ch;font-size:clamp(15px,1.1vw,17px);line-height:1.7;color:var(--color-text-light-muted);text-wrap:pretty;">
          Geodesic geometry lets a single shell span the whole room with nothing to hold it up but its own triangles — so inside, there is only quilted gold, a king bed, and the valley.
        </p>
        <ol style="list-style:none;margin:0;padding:0;border-top:1px solid rgba(241,233,218,.18);">
          <?php foreach ($domeFeatures as $f): ?>
            <li style="display:grid;grid-template-columns:40px 1fr;gap:14px;padding:16px 0;border-bottom:1px solid rgba(241,233,218,.18);">
              <span style="font-family:var(--font-heading);font-size:15px;color:var(--color-accent-gold);font-variant-numeric:tabular-nums;padding-top:4px;"><?= $f['n'] ?></span>
              <div>
                <div style="font-family:var(--font-heading);font-size:24px;font-weight:400;line-height:1.15;"><?= $f['title'] ?></div>
                <div style="font-size:13px;color:var(--color-text-light-subtle);margin-top:4px;line-height:1.55;"><?= $f['body'] ?></div>
              </div>
            </li>
          <?php endforeach; ?>
        </ol>
      </div>

      <!-- Illustrated Dome Anatomy & Circular Plate -->
      <div style="position:relative;overflow:hidden;max-width:100%;">
        <svg viewBox="0 0 400 260" aria-hidden="true" style="width:100%;height:auto;display:block;">
          <path d="<?= $svg_paths['anatomyDomeD'] ?>" fill="none" stroke="#d9a962" stroke-width=".75" stroke-linecap="round" stroke-linejoin="round" opacity=".9"></path>
          <line x1="0" y1="200" x2="400" y2="200" stroke="#f1e9da" stroke-width=".8" opacity=".5"></line>
          <line x1="40" y1="200" x2="40" y2="228" stroke="#f1e9da" stroke-width=".8" opacity=".5"></line>
          <line x1="360" y1="200" x2="360" y2="228" stroke="#f1e9da" stroke-width=".8" opacity=".5"></line>
          <line x1="20" y1="228" x2="380" y2="228" stroke="#f1e9da" stroke-width=".8" opacity=".5" stroke-dasharray="2 4"></line>
          <circle cx="200" cy="10" r="2.4" fill="#d9a962"></circle>
          <circle cx="65.8" cy="86.9" r="2.4" fill="#d9a962"></circle>
          <circle cx="334.2" cy="86.9" r="2.4" fill="#d9a962"></circle>
          <circle cx="200" cy="200" r="2.4" fill="#d9a962"></circle>
          <text x="200" y="6" text-anchor="middle" fill="#f1e9da" font-family="Lora, serif" font-size="8" letter-spacing="1.5">01 · SHELL</text>
          <text x="14" y="82" fill="#f1e9da" font-family="Lora, serif" font-size="7.5" letter-spacing="1">02 · VALLEY WINDOW</text>
          <text x="386" y="82" text-anchor="end" fill="#f1e9da" font-family="Lora, serif" font-size="7.5" letter-spacing="1">03 · KING BED</text>
          <text x="200" y="246" text-anchor="middle" fill="#f1e9da" font-family="Lora, serif" font-size="8" letter-spacing="1.5">04 · PRIVATE DECK · 450–550 SQ FT</text>
        </svg>
        <img src="assets/images/banner3.webp" alt="Inside a dome: quilted golden walls and a wide window onto the valley" loading="lazy" style="position:absolute;left:50%;top:45%;transform:translate(-50%,-50%);width:52%;aspect-ratio:1;object-fit:cover;object-position:60% 50%;border-radius:50%;border:4px solid #1f3b34;outline:1px solid rgba(217,169,98,.6);filter:sepia(.1) saturate(.95);">
      </div>
    </div>
  </div>
</section>

<!-- =========================================================================
     CHAPTER III · A Day Here (Sun Arc & Timeline)
     ========================================================================= -->
<section id="day" style="padding:clamp(64px,10vw,140px) 0 0;position:relative;background:linear-gradient(180deg,#f3efe6 0%,#efe8d8 60%,#e9e2cf 100%);">
  <!-- Dynamic scroll-tracking sun gradient -->
  <div data-sun aria-hidden="true" style="position:absolute;inset:0;pointer-events:none;background:radial-gradient(circle at 20% 70%,rgba(226,168,94,.32) 0%,rgba(226,168,94,.12) 18%,rgba(226,168,94,0) 42%);"></div>

  <!-- Distant hill landscape silhouette -->
  <svg viewBox="0 0 1440 240" preserveAspectRatio="xMidYMax meet" aria-hidden="true" style="position:absolute;left:0;right:0;bottom:0;width:100%;height:auto;pointer-events:none;">
    <path d="<?= $svg_paths['landscapeD'] ?>" fill="none" stroke="#2f5a4c" stroke-width=".9" stroke-linejoin="round" stroke-linecap="round" opacity=".42"></path>
  </svg>

  <!-- Wild grasses parallax -->
  <svg data-parallax="-24" viewBox="0 0 600 300" aria-hidden="true" style="position:absolute;left:clamp(-40px,-2vw,0px);bottom:0;width:clamp(220px,28vw,420px);height:auto;pointer-events:none;">
    <path d="<?= $svg_paths['grassD'] ?>" fill="none" stroke="#2f5a4c" stroke-width="1" stroke-linecap="round" opacity=".5"></path>
  </svg>

  <div style="max-width:1440px;margin:0 auto;padding:0 clamp(20px,5vw,64px);">
    <div data-reveal style="display:grid;grid-template-columns:repeat(auto-fit,minmax(min(100%,300px),1fr));align-items:end;gap:20px;margin-bottom:clamp(20px,3vw,36px);">
      <div>
        <p style="margin:0 0 22px;display:flex;align-items:center;gap:14px;font-size:12px;letter-spacing:.24em;text-transform:uppercase;color:var(--color-accent);">
          <span style="font-family:var(--font-heading);font-size:14px;">III</span>
          <span style="display:block;width:36px;height:1px;background:var(--color-accent);"></span>A day here
        </p>
        <h2 style="margin:0;font-family:var(--font-heading);font-weight:300;font-size:clamp(38px,4.8vw,72px);line-height:1.02;letter-spacing:-.02em;text-wrap:balance;">
          From first light to the <em style="font-style:italic;color:#2f5a4c;">last ember.</em>
        </h2>
      </div>
      <div class="giv-timeline-nav" style="justify-self:end;display:inline-flex;align-items:center;gap:12px;">
        <button type="button" class="giv-timeline-nav-btn giv-timeline-prev" id="timelineScrollPrev" aria-label="Previous activities" title="Previous activities">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
        </button>
        <button type="button" class="giv-timeline-action-btn" id="timelineScrollNext" aria-label="Next activities" title="Next activities">
          <span class="giv-timeline-btn-text">Scroll sideways</span>
          <span class="giv-timeline-nav-circle">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
          </span>
        </button>
      </div>
    </div>
  </div>

  <!-- Horizontal Scroll Timeline Cards following Sun Arc -->
  <div data-reveal class="giv-timeline-wrapper" style="position:relative;">
    <svg viewBox="0 0 1440 120" preserveAspectRatio="none" aria-hidden="true" style="position:absolute;left:0;right:0;top:44%;width:100%;height:120px;pointer-events:none;opacity:.55;">
      <path d="M0 110 C300 -20 1140 -20 1440 110" fill="none" stroke="#b68235" stroke-width="1" stroke-dasharray="2 6"></path>
    </svg>

    <!-- Floating Arrow Buttons (Desktop) -->
    <button type="button" class="giv-timeline-float-arrow giv-timeline-float-prev" id="timelineFloatPrev" aria-label="Scroll left" title="Scroll left">
      <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M15 18l-6-6 6-6"/></svg>
    </button>
    <button type="button" class="giv-timeline-float-arrow giv-timeline-float-next" id="timelineFloatNext" aria-label="Scroll right" title="Scroll right">
      <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M9 18l6-6-6-6"/></svg>
    </button>

    <div id="dayTimelineTrack" class="giv-timeline-track" style="display:flex;gap:clamp(14px,2vw,28px);overflow-x:auto;scroll-snap-type:x proximity;scroll-padding-left:clamp(20px,5vw,64px);padding:52px clamp(20px,5vw,64px) 28px;scrollbar-width:none;-webkit-overflow-scrolling:touch;position:relative;">
      <?php foreach ($day_timeline as $d): ?>
        <figure class="giv-timeline-card" style="margin:0;flex:0 0 clamp(230px,24vw,320px);scroll-snap-align:start;transform:translateY(<?= $d['lift'] ?>);">
          <img src="<?= $d['img'] ?>" alt="<?= htmlspecialchars($d['alt']) ?>" loading="lazy" class="plate" draggable="false" style="aspect-ratio:3/4;border-radius:<?= $d['radius'] ?>;">
          <figcaption style="margin-top:14px;display:flex;flex-direction:column;gap:4px;">
            <span style="font-family:var(--font-heading);font-size:13px;letter-spacing:.16em;color:var(--color-accent);font-variant-numeric:tabular-nums;text-transform:uppercase;"><?= $d['time'] ?></span>
            <span style="font-family:var(--font-heading);font-size:26px;font-weight:400;line-height:1.1;"><?= $d['title'] ?></span>
            <span style="font-size:13px;color:var(--color-text-secondary);line-height:1.5;"><?= $d['body'] ?></span>
          </figcaption>
        </figure>
      <?php endforeach; ?>
      <div style="flex:0 0 clamp(20px, 5vw, 64px);flex-shrink:0;"></div>
    </div>
  </div>
</section>

<!-- =========================================================================
     CHAPTER IV · Night on the Ridge (Astronomical Luxury Design)
     ========================================================================= -->
<!-- Top wave divider into deep midnight forest -->
<svg viewBox="0 0 1440 90" preserveAspectRatio="none" aria-hidden="true" style="display:block;width:100%;height:clamp(40px,6vw,90px);margin-bottom:-1px;background:#e9e2cf;">
  <path d="M0 90 L0 56 C110 44 180 18 300 26 C400 33 450 66 560 60 C680 53 740 16 860 22 C960 27 1010 58 1110 54 C1210 50 1280 26 1360 30 C1400 32 1420 44 1440 48 L1440 90 Z" fill="#152b27"></path>
</svg>
<section id="night" class="giv-night-section">
  <!-- Nocturnal coordinate starfield grid -->
  <div class="giv-night-stars" aria-hidden="true"></div>

  <!-- Ambient glowing nebulae -->
  <div class="giv-night-nebula-cyan" aria-hidden="true"></div>
  <div class="giv-night-nebula-amber" aria-hidden="true"></div>

  <!-- Top-Right Celestial Illustration: Golden Crescent Moon & Constellation -->
  <div class="giv-night-celestial-chart" aria-hidden="true">
    <svg viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M50 18 A22 22 0 1 0 50 62 A18 18 0 1 1 50 18 Z" stroke="#d9a962" stroke-width="1.3" opacity="0.88"/>
      <line x1="126" y1="44" x2="164" y2="40" stroke="rgba(217,169,98,0.42)" stroke-width="0.75"/>
      <line x1="164" y1="40" x2="188" y2="52" stroke="rgba(217,169,98,0.42)" stroke-width="0.75"/>
      <line x1="164" y1="40" x2="148" y2="82" stroke="rgba(217,169,98,0.42)" stroke-width="0.75"/>
      <line x1="188" y1="52" x2="148" y2="82" stroke="rgba(217,169,98,0.42)" stroke-width="0.75"/>
      <line x1="148" y1="82" x2="114" y2="100" stroke="rgba(217,169,98,0.42)" stroke-width="0.75"/>
      <line x1="114" y1="100" x2="84" y2="120" stroke="rgba(217,169,98,0.3)" stroke-width="0.6"/>
      <circle cx="126" cy="44" r="1.8" fill="#f1e9da"/>
      <circle cx="164" cy="40" r="2.2" fill="#d9a962"/>
      <circle cx="188" cy="52" r="1.8" fill="#f1e9da"/>
      <circle cx="148" cy="82" r="2.2" fill="#d9a962"/>
      <circle cx="114" cy="100" r="1.6" fill="#f1e9da"/>
      <circle cx="84" cy="120" r="1.4" fill="#f1e9da"/>
      <text x="134" y="132" fill="rgba(217,169,98,0.6)" font-family="var(--font-heading)" font-size="8.5" letter-spacing="1">Vikarabad · 17°20'N</text>
    </svg>
  </div>

  <div class="giv-night-container">
    <!-- Top Metadata Bar -->
    <div class="giv-night-topbar" data-reveal>
      <div class="giv-night-kicker">
        <span class="giv-night-roman">IV</span>
        <span class="giv-night-dash" aria-hidden="true">—</span>
        <span class="giv-night-label">NIGHT ON THE RIDGE</span>
      </div>
      <div class="giv-night-coords" aria-hidden="true">
        <span class="giv-coord-dot"></span>
        <span>17°20'N · 77°54'E</span>
        <span class="giv-coord-sep">·</span>
        <span>700M ELEVATION</span>
        <span class="giv-coord-sep">·</span>
        <span>ZERO LIGHT POLLUTION</span>
      </div>
    </div>

    <!-- Main Asymmetric Stage Grid -->
    <div class="giv-night-stage-grid" data-reveal>
      <!-- Left Column: Story, Night Rituals & Attire Protocol -->
      <div class="giv-night-narrative-col">
        <h2 class="giv-night-headline">
          The pool ends where the hills begin.<br>
          <em class="giv-night-accent">The sky doesn't end at all.</em>
        </h2>

        <p class="giv-night-story">
          An infinity edge cut into the ridge, facing the full sweep of the valley. Swim as the sky turns from amber to deep sapphire, then find your way to the fire by lantern light. Far from the city, the Milky Way is a regular guest.
        </p>

        <!-- Curated Night Rituals -->
        <div class="giv-night-rituals" role="tablist" aria-label="Night on the Ridge Rituals">
          <button type="button" class="giv-night-ritual-item active" role="tab" aria-selected="true" data-ritual-index="0" aria-controls="givNightArchCard">
            <span class="giv-ritual-num">01</span>
            <div class="giv-ritual-info">
              <div class="giv-ritual-title">Hillside Infinity Pool</div>
              <div class="giv-ritual-desc">Unfiltered valley vistas meeting the endless horizon</div>
            </div>
            <svg class="giv-ritual-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
          </button>

          <button type="button" class="giv-night-ritual-item" role="tab" aria-selected="false" data-ritual-index="1" aria-controls="givNightArchCard">
            <span class="giv-ritual-num">02</span>
            <div class="giv-ritual-info">
              <div class="giv-ritual-title">Private Bonfire Hearth</div>
              <div class="giv-ritual-desc">Crackling firewood & cozy stargazing seating beside your dome</div>
            </div>
            <svg class="giv-ritual-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
          </button>

          <button type="button" class="giv-night-ritual-item" role="tab" aria-selected="false" data-ritual-index="2" aria-controls="givNightArchCard">
            <span class="giv-ritual-num">03</span>
            <div class="giv-ritual-info">
              <div class="giv-ritual-title">Dark-Sky Milky Way</div>
              <div class="giv-ritual-desc">Bortle Class 3 observatory darkness with zero city glare</div>
            </div>
            <svg class="giv-ritual-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
          </button>
        </div>
      </div>

      <!-- Right Column: Interlocking Celestial Visual Canvas -->
      <div class="giv-night-canvas-col">
        <div class="giv-night-canvas-stage">
          <!-- Main Observatory Arch Frame -->
          <div class="giv-night-arch-card" id="givNightArchCard">
            <!-- Arch Gold Apex Indicator -->
            <div class="giv-arch-apex-marker" aria-hidden="true"></div>

            <!-- Top Floating Status Pill -->
            <div class="giv-arch-pill" id="givArchPill">
              <span id="givArchPillText">OBSERVATORY POOL · RIDGE ELEVATION 700M</span>
            </div>

            <!-- Arch Image Viewport -->
            <div class="giv-arch-viewport">
              <img src="assets/images/night-ridge-arch.webp" 
                   alt="Valley Panorama — Hillside infinity pool overlooking the Vikarabad valley with astronomical dome grid" 
                   class="giv-arch-visual"
                   id="givArchVisual"
                   loading="eager">
              
              <!-- Dark Vignette Gradient -->
              <div class="giv-arch-vignette" aria-hidden="true"></div>

              <!-- Bottom Caption & Coordinates -->
              <div class="giv-arch-footer">
                <div class="giv-arch-caption-text">
                  <div class="giv-arch-title" id="givArchTitle">VALLEY PANORAMA · CLEAR SKY</div>
                  <div class="giv-arch-sub" id="givArchSub">Pristine waters meeting endless forest canopy · 17:00</div>
                </div>
                <div class="giv-arch-pagination" role="group" aria-label="Ritual slides">
                  <button type="button" class="giv-arch-dot active" data-dot-index="0" aria-label="Ritual 01: Hillside Infinity Pool" title="Hillside Infinity Pool"></button>
                  <button type="button" class="giv-arch-dot" data-dot-index="1" aria-label="Ritual 02: Private Bonfire Hearth" title="Private Bonfire Hearth"></button>
                  <button type="button" class="giv-arch-dot" data-dot-index="2" aria-label="Ritual 03: Dark-Sky Milky Way" title="Dark-Sky Milky Way"></button>
                </div>
              </div>

              <!-- Clickable Hotspot -->
              <a href="experiences.php" class="giv-night-hotspot" id="givArchHotspot" title="Explore Hillside Infinity Pool" aria-label="Explore Hillside Infinity Pool"></a>
            </div>
          </div>

          <!-- Interlocking Planetary Satellite: Bonfire Hearth Portal -->
          <div class="giv-night-satellite-wrap" id="givNightSatelliteWrap" role="button" tabindex="0" data-type="fire" data-target="1" title="Switch to Private Bonfire Hearth" aria-label="Switch to Private Bonfire Hearth">
            <!-- Concentric Outer Orbital Rings -->
            <div class="giv-satellite-orbit-outer" aria-hidden="true"></div>
            <div class="giv-satellite-orbit-middle" aria-hidden="true"></div>

            <!-- Circular Bonfire Portal -->
            <div class="giv-satellite-circle">
              <img src="assets/images/night-ridge-fire.webp" 
                   alt="Private Bonfire Hearth beside your dome" 
                   class="giv-satellite-img" 
                   id="givSatelliteImg"
                   loading="eager">
              <div class="giv-satellite-glow" aria-hidden="true"></div>
            </div>

            <!-- Satellite Floating Badge -->
            <div class="giv-satellite-tag" id="givSatelliteTag" data-type="fire">
              <span id="givSatelliteTagText">PRIVATE BONFIRE</span>
            </div>
          </div>
        </div>
      </div>
    </div>


    <!-- Authentic Reviews & Quotes -->
    <div data-reveal style="margin-top:clamp(64px,8vw,110px);display:grid;grid-template-columns:repeat(auto-fit,minmax(min(100%,280px),1fr));gap:clamp(24px,3vw,48px);border-top:1px solid rgba(241,233,218,.18);padding-top:clamp(32px,4vw,56px);">
      <?php foreach ($reviews as $rv): ?>
        <blockquote style="margin:0;display:flex;flex-direction:column;gap:22px;justify-content:space-between;">
          <p style="margin:0;font-family:var(--font-heading);font-style:italic;font-weight:300;font-size:clamp(24px,2vw,32px);line-height:1.3;text-wrap:pretty;">
            “<?= htmlspecialchars($rv['quote']) ?>”
          </p>
          <footer style="display:flex;align-items:center;gap:12px;">
            <img src="<?= $rv['img'] ?>" alt="" loading="lazy" style="width:38px;height:38px;border-radius:50%;object-fit:cover;outline:1px solid rgba(217,169,98,.6);outline-offset:2px;">
            <div>
              <div style="font-size:14px;"><?= htmlspecialchars($rv['name']) ?></div>
              <div style="font-size:12px;color:var(--color-text-light-subtle);"><?= htmlspecialchars($rv['handle']) ?></div>
            </div>
          </footer>
        </blockquote>
      <?php endforeach; ?>
    </div>
  </div>

  <!-- Wave transition into cream -->
  <svg viewBox="0 0 1440 90" preserveAspectRatio="none" aria-hidden="true" style="display:block;width:100%;height:clamp(40px,6vw,90px);background:#0a1614;margin-top:clamp(48px,7vw,90px);">
    <path d="M0 90 L0 60 C130 50 210 24 330 30 C430 36 480 68 580 62 C690 56 750 20 870 26 C970 31 1020 60 1120 56 C1220 52 1290 30 1370 34 C1410 36 1425 46 1440 50 L1440 90 Z" fill="#f3efe6"></path>
  </svg>
</section>

<!-- =========================================================================
     CHAPTER V · Stay (Domes & Rates Preview)
     ========================================================================= -->
<section id="domes" style="padding:clamp(48px,7vw,100px) 0 0;position:relative;">
  <svg aria-hidden="true" style="position:absolute;inset:0;width:100%;height:100%;pointer-events:none;opacity:.5;">
    <defs>
      <pattern id="giv-ridge" width="480" height="300" patternUnits="userSpaceOnUse">
        <path d="<?= $svg_paths['ridgeTileD'] ?>" fill="none" stroke="#b68235" stroke-width=".8" stroke-linecap="round" stroke-linejoin="round" opacity=".22"></path>
        <g fill="#b68235" opacity=".35">
          <circle cx="60" cy="40" r="1"></circle>
          <circle cx="210" cy="24" r=".8"></circle>
          <circle cx="330" cy="58" r="1.1"></circle>
          <circle cx="430" cy="30" r=".8"></circle>
          <circle cx="140" cy="88" r=".7"></circle>
        </g>
      </pattern>
    </defs>
    <rect width="100%" height="100%" fill="url(#giv-ridge)"></rect>
  </svg>

  <div style="max-width:1440px;margin:0 auto;padding:0 clamp(20px,5vw,64px);">
    <div data-reveal style="display:grid;grid-template-columns:repeat(auto-fit,minmax(min(100%,300px),1fr));align-items:end;gap:20px;margin-bottom:clamp(28px,4vw,48px);">
      <div>
        <p style="margin:0 0 22px;display:flex;align-items:center;gap:14px;font-size:12px;letter-spacing:.24em;text-transform:uppercase;color:var(--color-accent);">
          <span style="font-family:var(--font-heading);font-size:14px;">V</span>
          <span style="display:block;width:36px;height:1px;background:var(--color-accent);"></span>Stay
        </p>
        <h2 style="margin:0;font-family:var(--font-heading);font-weight:300;font-size:clamp(38px,4.8vw,72px);line-height:1.02;letter-spacing:-.02em;text-wrap:balance;">
          Eight domes, each named for a <em style="font-style:italic;color:#2f5a4c;">valley.</em>
        </h2>
      </div>
      <div class="giv-section-subhead-right" style="justify-self:end;text-align:right;">
        <p style="margin:0 0 10px;font-size:13px;color:var(--color-text-secondary);max-width:34ch;text-wrap:pretty;">
          All domes sleep two, with an attached bathroom, stargazer chairs and a private deck. Check-in 2 pm · Check-out 11 am.
        </p>
        <div style="display:flex;flex-wrap:wrap;gap:12px;justify-content:flex-end;">
          <a href="domes.php" class="giv-btn-link" style="font-size:15px;">
            All 8 domes &amp; full rates <span aria-hidden="true">→</span>
          </a>
          <a href="<?= DRIVE_TARIFF_URL ?>" target="_blank" rel="noopener" class="giv-btn-link" style="font-size:13px;color:var(--color-accent);">
            Tariff Card (PDF) ↗
          </a>
        </div>
      </div>
    </div>

    <!-- Dome Cards List -->
    <div data-reveal style="border-top:1px solid var(--color-border-dark);">
      <?php foreach ($domes as $dm): ?>
        <article style="display:grid;grid-template-columns:repeat(auto-fit,minmax(min(100%,300px),1fr));gap:clamp(20px,3vw,48px);padding:clamp(24px,3vw,40px) 0;border-bottom:1px solid var(--color-border-dark);align-items:center;">
          <img src="<?= $dm['img'] ?>" alt="<?= htmlspecialchars($dm['alt']) ?>" loading="lazy" class="plate" style="aspect-ratio:16/10;border-radius:<?= $dm['radius'] ?>;">
          <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(min(100%,220px),1fr));gap:24px;align-items:start;">
            <div>
              <div style="font-size:11px;letter-spacing:.16em;text-transform:uppercase;color:var(--color-accent);margin-bottom:10px;"><?= $dm['kicker'] ?></div>
              <h3 style="margin:0 0 10px;font-family:var(--font-heading);font-weight:400;font-size:clamp(30px,2.8vw,44px);line-height:1.02;letter-spacing:-.01em;"><?= $dm['name'] ?></h3>
              <p style="margin:0 0 14px;font-size:14px;color:var(--color-text-muted);line-height:1.65;text-wrap:pretty;"><?= $dm['body'] ?></p>
              <div style="display:flex;flex-wrap:wrap;gap:8px 18px;font-size:12px;color:var(--color-text-secondary);">
                <?php foreach ($dm['features'] as $ft): ?>
                  <span style="border-bottom:1px solid rgba(47,90,76,.35);padding-bottom:2px;"><?= $ft ?></span>
                <?php endforeach; ?>
              </div>
            </div>
            <div style="display:flex;flex-direction:column;gap:16px;">
              <div style="display:grid;grid-template-columns:1fr 1fr;gap:16px;border-top:1px solid var(--color-border-dark);border-bottom:1px solid var(--color-border-dark);padding:14px 0;font-variant-numeric:tabular-nums;">
                <div>
                  <div style="font-size:11px;letter-spacing:.14em;text-transform:uppercase;color:var(--color-text-secondary);">Weekdays</div>
                  <div style="font-family:var(--font-heading);font-size:30px;font-weight:400;line-height:1.1;margin-top:4px;"><?= $dm['weekday'] ?></div>
                </div>
                <div>
                  <div style="font-size:11px;letter-spacing:.14em;text-transform:uppercase;color:var(--color-text-secondary);">Weekends</div>
                  <div style="font-family:var(--font-heading);font-size:30px;font-weight:400;line-height:1.1;margin-top:4px;"><?= $dm['weekend'] ?></div>
                </div>
              </div>
              <div style="font-size:11px;color:var(--color-text-subtle);margin-top:-8px;">Per night, for two. Taxes as applicable.</div>
              <div style="display:flex;flex-wrap:wrap;gap:12px;align-items:center;">
                <a href="<?= htmlspecialchars($dm['wa']) ?>" target="_blank" rel="noopener" class="giv-btn-outline" style="align-self:flex-start;">
                  Enquire on WhatsApp <span aria-hidden="true">→</span>
                </a>
                <a href="domes.php" class="giv-btn-link" style="white-space:nowrap;display:inline-flex;align-items:center;gap:8px;height:48px;padding:0 6px;">
                  View dome details <span aria-hidden="true">→</span>
                </a>
              </div>
            </div>
          </div>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- =========================================================================
     CHAPTER VI · Experiences (Green Ground, Interactive Switcher)
     ========================================================================= -->
<!-- Top wave divider into green -->
<svg viewBox="0 0 1440 90" preserveAspectRatio="none" aria-hidden="true" style="display:block;width:100%;height:clamp(40px,6vw,90px);margin-bottom:-1px;background:#f3efe6;">
  <path d="M0 90 L0 66 C140 56 240 28 360 32 C460 36 520 66 620 62 C740 57 800 20 920 24 C1020 27 1070 58 1170 54 C1270 50 1340 32 1440 36 L1440 90 Z" fill="#1f3b34"></path>
</svg>
<section id="experiences" style="position:relative;background:linear-gradient(180deg,#1f3b34 0%,#25453b 60%,#1f3b34 100%);color:var(--color-text-light);">


  <!-- Swaying Branch Parallax -->
  <svg data-parallax="-30" viewBox="0 0 320 260" aria-hidden="true" style="position:absolute;right:clamp(-60px,-4vw,-20px);top:clamp(-10px,1vw,20px);width:clamp(160px,20vw,320px);height:auto;pointer-events:none;transform-origin:top right;animation:giv-sway 11s ease-in-out infinite alternate;">
    <path d="<?= $svg_paths['branchD'] ?>" fill="none" stroke="#d9a962" stroke-width="1" stroke-linecap="round" opacity=".45"></path>
  </svg>

  <div style="position:relative;max-width:1440px;margin:0 auto;padding:clamp(40px,6vw,80px) clamp(20px,5vw,64px) clamp(64px,9vw,130px);">
    <div data-reveal style="margin-bottom:clamp(28px,4vw,56px);">
      <p style="margin:0 0 22px;display:flex;align-items:center;gap:14px;font-size:12px;letter-spacing:.24em;text-transform:uppercase;color:var(--color-accent-gold);">
        <span style="font-family:var(--font-heading);font-size:14px;">VI</span>
        <span style="display:block;width:36px;height:1px;background:var(--color-accent-gold);"></span>Experiences
      </p>
      <h2 style="margin:0;font-family:var(--font-heading);font-weight:300;font-size:clamp(38px,4.8vw,72px);line-height:1.02;letter-spacing:-.02em;text-wrap:balance;max-width:20ch;">
        Fill the day, or fill none of it.
      </h2>
    </div>

    <div class="giv-experiences-grid" style="display:grid;grid-template-columns:repeat(auto-fit,minmax(min(100%,340px),1fr));gap:clamp(28px,5vw,80px);align-items:start;">
      <!-- Synchronized Image Preview (Sticky on desktop, clean relative card on mobile) -->
      <div class="giv-experiences-preview">
        <div class="giv-experiences-preview-card">
          <img src="<?= $experiences[0]['img'] ?>" alt="<?= htmlspecialchars($experiences[0]['alt']) ?>" id="actPreviewImg" loading="lazy" class="giv-experiences-preview-img">
          <div class="giv-experiences-preview-caption">
            <span style="font-style:italic;" id="actPreviewTitle"><?= $experiences[0]['title'] ?></span>
            <span style="font-variant-numeric:tabular-nums;" id="actPreviewIndex">01 / <?= str_pad(count($experiences), 2, '0', STR_PAD_LEFT) ?></span>
          </div>
        </div>
      </div>

      <!-- 12 Activity List -->
      <ol style="list-style:none;margin:0;padding:0;border-top:1px solid rgba(241,233,218,.18);">
        <?php foreach ($experiences as $i => $a): ?>
          <li class="giv-activity-item <?= ($i === 0) ? 'active' : '' ?>" data-img="<?= $a['img'] ?>" data-title="<?= htmlspecialchars($a['title']) ?>">
            <span class="giv-activity-num"><?= $a['n'] ?></span>
            <div class="giv-activity-content">
              <div class="giv-activity-header">
                <span class="giv-activity-title"><?= $a['title'] ?></span>
                <?php if (!empty($a['price'])): ?>
                  <span class="giv-activity-badge"><?= $a['price'] ?></span>
                <?php endif; ?>
              </div>
              <div class="giv-activity-body"><?= $a['body'] ?></div>
              <!-- Mobile inline thumbnail shown when active on mobile -->
              <div class="giv-activity-mobile-preview">
                <img src="<?= $a['img'] ?>" alt="<?= htmlspecialchars($a['alt']) ?>" loading="lazy">
              </div>
            </div>
            <span class="giv-activity-when"><?= $a['when'] ?></span>
          </li>
        <?php endforeach; ?>
      </ol>
    </div>

    <!-- Active Package Callout Banner -->
    <div style="margin-top:clamp(32px,5vw,56px);background:rgba(255,255,255,.05);border:1px solid rgba(217,169,98,.35);border-radius:var(--radius-md);padding:clamp(20px,3.5vw,32px);display:flex;flex-wrap:wrap;justify-content:space-between;align-items:center;gap:20px;box-shadow:var(--shadow-sm);">
      <div>
        <div style="font-size:11px;letter-spacing:.18em;text-transform:uppercase;color:var(--color-accent-gold);margin-bottom:6px;font-weight:600;display:flex;align-items:center;gap:6px;">
          <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="flex-shrink:0;"><circle cx="12" cy="12" r="10"/><polygon points="16.24 7.76 14.12 14.12 7.76 16.24 9.88 9.88 16.24 7.76"/></svg>
          Special Adventure Combo
        </div>
        <div style="font-family:var(--font-heading);font-size:clamp(22px,2.5vw,32px);color:var(--color-text-light);font-weight:300;">
          All-Together Active Package · <span style="color:var(--color-accent-gold);font-weight:400;">₹1,199/-</span> <span style="font-size:15px;color:var(--color-text-light-subtle);">per person</span>
        </div>
        <p style="margin:6px 0 0;font-size:13.5px;color:var(--color-text-light-muted);line-height:1.5;">
          Includes Archery (10 shots) + Shooting (10 shots) + Horse ride (15 mins) + Jungle Safari (1 hour). Save ₹395! Separate activity: ₹399/- each.
        </p>
      </div>
      <div style="display:flex;flex-wrap:wrap;gap:12px;align-items:center;">
        <a href="experiences.php#active-package" class="giv-btn-gold" style="font-size:13px;height:44px;padding:0 22px;">
          View All Activities &amp; Packages <span aria-hidden="true">→</span>
        </a>
      </div>
    </div>
  </div>

  <!-- Wave Divider into Cream -->
  <svg viewBox="0 0 1440 90" preserveAspectRatio="none" aria-hidden="true" style="display:block;width:100%;height:clamp(40px,6vw,90px);background:#1f3b34;">
    <path d="M0 90 L0 58 C120 46 210 22 330 28 C430 34 480 66 580 60 C690 54 750 18 870 24 C970 29 1020 58 1120 54 C1220 50 1290 28 1370 32 C1410 34 1425 44 1440 48 L1440 90 Z" fill="#f3efe6"></path>
  </svg>
</section>

<!-- =========================================================================
     CHAPTER VII · Gallery (Field Notes Plate Grid)
     ========================================================================= -->
<section id="gallery" style="padding:clamp(48px,7vw,100px) 0 0;">
  <div style="max-width:1440px;margin:0 auto;padding:0 clamp(20px,5vw,64px);">
    <div data-reveal style="display:grid;grid-template-columns:repeat(auto-fit,minmax(min(100%,300px),1fr));align-items:end;gap:20px;margin-bottom:clamp(28px,4vw,48px);">
      <div>
        <p style="margin:0 0 22px;display:flex;align-items:center;gap:14px;font-size:12px;letter-spacing:.24em;text-transform:uppercase;color:var(--color-accent);">
          <span style="font-family:var(--font-heading);font-size:14px;">VII</span>
          <span style="display:block;width:36px;height:1px;background:var(--color-accent);"></span>Field notes
        </p>
        <h2 style="margin:0;font-family:var(--font-heading);font-weight:300;font-size:clamp(38px,4.8vw,72px);line-height:1.02;letter-spacing:-.02em;">
          Kept from the valley.
        </h2>
      </div>
      <a href="<?= INSTAGRAM_URL ?>" target="_blank" rel="noopener" style="font-size:12px;letter-spacing:.14em;text-transform:uppercase;color:var(--color-text);border-bottom:1px solid rgba(29,42,38,.3);padding-bottom:3px;justify-self:end;">
        @glampinnvalley
      </a>
    </div>

    <!-- Editorial Plate Grid -->
    <div data-reveal class="giv-gallery-plate-grid" style="display:grid;grid-template-columns:repeat(auto-fill,minmax(min(100%,160px),1fr));grid-auto-rows:clamp(150px,20vw,230px);grid-auto-flow:dense;gap:clamp(10px,1.4vw,18px);">
      <?php foreach ($gallery as $g): ?>
        <img src="<?= $g['src'] ?>" alt="<?= htmlspecialchars($g['alt']) ?>" loading="lazy" style="<?= $g['style'] ?>" data-lightbox>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- =========================================================================
     CHAPTER VIII · Celebrations
     ========================================================================= -->
<section id="events" style="padding:clamp(64px,10vw,140px) 0 0;">
  <div style="max-width:1440px;margin:0 auto;padding:0 clamp(20px,5vw,64px);">
    <div data-reveal style="display:grid;grid-template-columns:repeat(auto-fit,minmax(min(100%,300px),1fr));gap:clamp(28px,4vw,64px);align-items:end;margin-bottom:clamp(28px,4vw,48px);">
      <div>
        <p style="margin:0 0 22px;display:flex;align-items:center;gap:14px;font-size:12px;letter-spacing:.24em;text-transform:uppercase;color:var(--color-accent);">
          <span style="font-family:var(--font-heading);font-size:14px;">VIII</span>
          <span style="display:block;width:36px;height:1px;background:var(--color-accent);"></span>Celebrations
        </p>
        <h2 style="margin:0;font-family:var(--font-heading);font-weight:300;font-size:clamp(38px,4.8vw,72px);line-height:1.02;letter-spacing:-.02em;text-wrap:balance;">
          The whole valley, for your <em style="font-style:italic;color:#2f5a4c;">occasion.</em>
        </h2>
      </div>
      <p style="margin:0;font-size:14px;color:var(--color-text-muted);line-height:1.7;max-width:46ch;text-wrap:pretty;">
        Proposals by lantern light, birthdays around the fire, intimate weddings on the ridge. Tell us the date and we'll shape the evening.
      </p>
    </div>

    <!-- Celebrations Cards -->
    <div data-reveal style="display:grid;grid-template-columns:repeat(auto-fit,minmax(min(100%,200px),1fr));gap:clamp(12px,1.6vw,24px);">
      <?php foreach ($events as $ev): ?>
        <a href="<?= htmlspecialchars($ev['wa']) ?>" target="_blank" rel="noopener" style="display:block;color:var(--color-text);">
          <img src="<?= $ev['img'] ?>" alt="<?= htmlspecialchars($ev['alt']) ?>" loading="lazy" class="plate plate-arch" style="aspect-ratio:4/5;">
          <div style="display:flex;justify-content:space-between;align-items:baseline;margin-top:12px;border-bottom:1px solid var(--color-border-dark);padding-bottom:10px;">
            <span style="font-family:var(--font-heading);font-size:24px;font-weight:400;"><?= $ev['title'] ?></span>
            <span style="font-size:11px;color:var(--color-accent);letter-spacing:.1em;text-transform:uppercase;">Plan →</span>
          </div>
        </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- =========================================================================
     CHAPTER IX · Getting Here (Vanishing Road Illustration)
     ========================================================================= -->
<section id="location" style="padding:clamp(64px,10vw,140px) 0 0;position:relative;">
  <!-- Road perspective illustration in background -->
  <svg viewBox="0 0 1440 520" preserveAspectRatio="xMidYMax slice" aria-hidden="true" style="position:absolute;left:0;right:0;bottom:0;width:100%;height:clamp(200px,36vw,520px);pointer-events:none;">
    <path d="<?= $svg_paths['roadD'] ?>" fill="none" stroke="#2f5a4c" stroke-width=".9" stroke-linejoin="round" stroke-linecap="round" opacity=".2"></path>
    <path d="<?= $svg_paths['roadDashD'] ?>" fill="none" stroke="#b68235" stroke-width="1" stroke-dasharray="6 10" stroke-linecap="round" opacity=".35"></path>
  </svg>

  <div style="max-width:1440px;margin:0 auto;padding:0 clamp(20px,5vw,64px);">
    <div data-reveal style="display:grid;grid-template-columns:repeat(auto-fit,minmax(min(100%,340px),1fr));gap:clamp(32px,5vw,96px);align-items:center;">
      <!-- Schematic Road Map -->
      <div style="position:relative;">
        <svg viewBox="0 0 400 400" aria-hidden="true" style="width:100%;height:auto;display:block;">
          <path d="M40 330 C80 320 90 260 130 250 C180 238 200 200 240 180 C280 160 300 120 350 96" fill="none" stroke="#2f5a4c" stroke-width="1.2" stroke-dasharray="3 5"></path>
          <path d="M20 360 C90 340 150 300 210 310 C270 320 320 290 380 300" fill="none" stroke="#b68235" stroke-width=".8" opacity=".6"></path>
          <path d="M60 130 C110 100 150 120 200 90 C250 60 300 80 360 50" fill="none" stroke="#b68235" stroke-width=".8" opacity=".35"></path>
          <circle cx="40" cy="330" r="3" fill="#1d2a26"></circle>
          <circle cx="130" cy="250" r="3" fill="#1d2a26"></circle>
          <circle cx="240" cy="180" r="3" fill="#1d2a26"></circle>
          <path d="M336 96 a14 14 0 0 1 28 0 Z" fill="none" stroke="#b68235" stroke-width="1.4"></path>
          <path d="M340 96 L350 82 L360 96 M350 82 L350 96" fill="none" stroke="#b68235" stroke-width=".8"></path>
          <text x="52" y="346" fill="#1d2a26" font-family="Lora, serif" font-size="10" letter-spacing="1.5">HYDERABAD</text>
          <text x="140" y="262" fill="#1d2a26" font-family="Lora, serif" font-size="10" letter-spacing="1.5">CHEVELLA</text>
          <text x="250" y="192" fill="#1d2a26" font-family="Lora, serif" font-size="10" letter-spacing="1.5">VIKARABAD</text>
          <text x="350" y="130" text-anchor="middle" fill="#b68235" font-family="Cormorant Garamond, serif" font-size="15" font-style="italic">Glamp Inn Valley</text>
          <text x="350" y="144" text-anchor="middle" fill="#5d6b66" font-family="Lora, serif" font-size="8" letter-spacing="1.5">THIRMALAPUR · PUDUR</text>
          <text x="20" y="380" fill="#8f9c95" font-family="Lora, serif" font-size="8" letter-spacing="1.5">NOT TO SCALE · ~2 HRS BY ROAD</text>
        </svg>
      </div>

      <div>
        <p style="margin:0 0 22px;display:flex;align-items:center;gap:14px;font-size:12px;letter-spacing:.24em;text-transform:uppercase;color:var(--color-accent);">
          <span style="font-family:var(--font-heading);font-size:14px;">IX</span>
          <span style="display:block;width:36px;height:1px;background:var(--color-accent);"></span>Getting here
        </p>
        <h2 style="margin:0 0 20px;font-family:var(--font-heading);font-weight:300;font-size:clamp(38px,4.8vw,72px);line-height:1.02;letter-spacing:-.02em;text-wrap:balance;">
          Leave the city after lunch. Watch the sunset from your deck.
        </h2>
        <p style="margin:0 0 28px;font-size:15px;color:var(--color-text-muted);line-height:1.75;text-wrap:pretty;">
          West of Hyderabad, roughly two hours by road. The drive is part of the escape: past Chevella, into Vikarabad, then a red-earth road through the trees to Thirmalapur.
        </p>
        <div style="display:flex;flex-wrap:wrap;gap:20px 32px;align-items:center;font-size:14px;">
          <a href="<?= MAPS_URL ?>" target="_blank" rel="noopener" class="giv-btn-outline">
            Open in Google Maps
          </a>
          <span style="color:var(--color-text-secondary);font-size:13px;line-height:1.5;">
            <?= SITE_ADDRESS ?>
          </span>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- =========================================================================
     CHAPTER X · WhatsApp Community (Exclusive Updates & Perks)
     ========================================================================= -->
<section id="community" style="padding:clamp(64px,10vw,120px) 0 0;">
  <div style="max-width:1440px;margin:0 auto;padding:0 clamp(20px,5vw,64px);">
    <div style="background:linear-gradient(135deg,#1f3b34 0%,#14262a 100%);color:var(--color-text-light);border-radius:var(--radius-md);padding:clamp(32px,6vw,64px);position:relative;overflow:hidden;box-shadow:var(--shadow-md);">
      <div aria-hidden="true" style="position:absolute;right:-5%;top:-10%;width:350px;height:350px;border-radius:50%;background:radial-gradient(circle,rgba(217,169,98,.15) 0%,transparent 70%);pointer-events:none;"></div>

      <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(min(100%,320px),1fr));gap:clamp(32px,5vw,64px);align-items:center;position:relative;">
        <div>
          <p style="margin:0 0 16px;display:flex;align-items:center;gap:12px;font-size:12px;letter-spacing:.24em;text-transform:uppercase;color:var(--color-accent-gold);">
            <span style="font-family:var(--font-heading);font-size:14px;">X</span>
            <span style="display:block;width:32px;height:1px;background:var(--color-accent-gold);"></span>Exclusive Access
          </p>
          <h2 style="margin:0 0 16px;font-family:var(--font-heading);font-weight:300;font-size:clamp(36px,4.5vw,64px);line-height:1.04;letter-spacing:-.02em;">
            Join the Glampinn-Valley <em style="font-style:italic;color:var(--color-accent-gold);">Community.</em>
          </h2>
          <p style="margin:0 0 28px;font-size:15px;color:var(--color-text-light-soft);line-height:1.65;max-width:44ch;">
            Connect with our inner circle for last-minute booking updates, exclusive member offers, upcoming retreats, and collaborations.
          </p>
          <div style="display:flex;flex-wrap:wrap;gap:16px;align-items:center;">
            <a href="<?= WHATSAPP_COMMUNITY_URL ?>" target="_blank" rel="noopener" class="giv-btn-gold" style="height:50px;padding:0 28px;font-size:15px;">
              Join WhatsApp Community ↗
            </a>
            <span style="font-size:12px;color:var(--color-text-light-subtle);letter-spacing:.08em;">
              Direct on WhatsApp · Free to Join
            </span>
          </div>
        </div>

        <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(min(100%,180px),1fr));gap:14px;">
          <?php 
          $comm_benefits = get_community_benefits_data();
          foreach ($comm_benefits as $b): ?>
            <div style="background:rgba(255,255,255,.05);border:1px solid rgba(241,233,218,.12);border-radius:var(--radius-sm);padding:16px;backdrop-filter:blur(4px);">
              <div style="width:38px;height:38px;border-radius:50%;background:rgba(217,169,98,.15);color:var(--color-accent-gold);display:flex;align-items:center;justify-content:center;flex-shrink:0;margin-bottom:10px;"><?= $b['icon'] ?></div>
              <div style="font-family:var(--font-heading);font-size:17px;font-weight:400;color:var(--color-text-light);line-height:1.2;margin-bottom:4px;"><?= htmlspecialchars($b['title']) ?></div>
              <div style="font-size:12px;color:var(--color-text-light-subtle);line-height:1.45;"><?= htmlspecialchars($b['desc']) ?></div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Mobile Sticky Booking Bar -->
<?php require __DIR__ . '/includes/booking-bar.php'; ?>

<!-- Master Footer -->
<?php
$footer_kicker = 'Your weekend, elsewhere';
$footer_title = 'The valley is closer than you <em style="font-style:italic;color:var(--color-accent-gold);">think.</em>';
require __DIR__ . '/includes/footer.php';
?>
