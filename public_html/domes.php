<?php
/**
 * Glamp Inn Valley - Domes & Rates
 * Production implementation of Domes.dc.html Claude Design.
 */
require_once __DIR__ . '/includes/config.php';
$svg_paths = require __DIR__ . '/includes/svg-paths.php';

$page_title = 'Domes & Rates';
$page_description = 'Eight geodesic domes across four tiers in the Vikarabad Hills. View weekday and weekend rates, amenities, and compare features.';
$active_nav = 'domes';
$is_dark_hero = true;

$domes = get_domes_data();
$inclusions = get_inclusions_data();
$policies = get_policies_data();

$facts = [
    ['k' => 'Domes', 'v' => '8'],
    ['k' => 'Sleeps', 'v' => '2 per dome'],
    ['k' => 'Size', 'v' => '450–550 sq ft'],
    ['k' => 'Check-in', 'v' => '2:00 pm'],
    ['k' => 'Check-out', 'v' => '11:00 am']
];

$tiers = ['All', 'Twin Valley', 'Standalone', 'Hammock', 'Signature'];

$compareCols = [
    ['name' => 'Twin Valley', 'sub' => 'Right · Left'],
    ['name' => 'Standalone', 'sub' => 'Nubra · Araku'],
    ['name' => 'Hammock', 'sub' => 'Sangla · Silent'],
    ['name' => 'Signature', 'sub' => 'Solang · Spiti']
];

$compareRows = [
    ['label' => 'Size', 'cells' => ['450 sq ft', '450 sq ft', '450 sq ft', '550 sq ft']],
    ['label' => 'Deck', 'cells' => ['Shared, two domes', 'Private', 'Private', 'Private, larger']],
    ['label' => 'Infinity hammock', 'cells' => ['—', '—', 'Yes', 'Yes']],
    ['label' => 'Seating nook', 'cells' => ['—', '—', '—', 'Yes']],
    ['label' => 'Bathroom', 'cells' => ['Attached', 'Attached', 'Attached', 'Attached']],
    ['label' => 'Best for', 'cells' => ['Friends & families', 'Couples', 'Couples, quiet', 'Anniversaries, proposals']],
    ['label' => 'Weekdays', 'cells' => ['₹9,999', '₹10,499', '₹11,499', '₹14,499']],
    ['label' => 'Weekends', 'cells' => ['₹11,999', '₹12,499', '₹13,499', '₹16,499']]
];

$hero_slides = [
    [
        'src' => 'assets/images/banner4.webp',
        'alt' => 'Twin Valley domes from above on the panoramic ridge terrace',
        'caption' => 'Twin Valley · Panoramic Ridge Terrace'
    ],
    [
        'src' => 'assets/images/banner3.webp',
        'alt' => 'Golden quilted dome interior with lounge nook and wide window',
        'caption' => 'Signature Suite · Quilted Golden Interior'
    ],
    [
        'src' => 'assets/images/home-slider.webp',
        'alt' => 'Sunset over ridge deck and cantilevered infinity hammock',
        'caption' => 'The Ridge Drop · Infinity Hammock at Dusk'
    ],
    [
        'src' => 'assets/images/banner2.webp',
        'alt' => 'The infinity pool overlooking the Vikarabad forest hills',
        'caption' => 'The Infinity Pool · Edge of the Hills'
    ],
    [
        'src' => 'assets/images/banner5.webp',
        'alt' => 'Stargazer chairs facing the rolling forest hills',
        'caption' => 'Stargazer Decks · Rolling Valley Horizon'
    ],
    [
        'src' => 'assets/images/deck-dome-hd.webp',
        'alt' => 'Morning mist and sunrise light across the valley and deck',
        'caption' => 'Dawn on the Ridge · Sunrise Light'
    ],
    [
        'src' => 'assets/images/hammock-deck-hd.webp',
        'alt' => 'Domes glowing against dramatic evening twilight and hammock deck',
        'caption' => 'Nocturnal Sanctuary · Twilight on the Hills'
    ]
];

require __DIR__ . '/includes/header.php';
?>

<!-- =========================================================================
     PAGE HEAD · Green Ground
     ========================================================================= -->
<section style="position:relative;background:linear-gradient(180deg,#0f1f23 0%,#1f3b34 100%);color:var(--color-text-light);overflow:hidden;padding:clamp(130px,18vh,190px) 0 0;">
  <div aria-hidden="true" style="position:absolute;inset:0;background-image:radial-gradient(circle,rgba(241,233,218,.6) 0 1px,transparent 1.6px),radial-gradient(circle,rgba(217,169,98,.5) 0 1px,transparent 1.7px);background-size:230px 230px,410px 410px;background-position:40px 20px,180px 100px;mask-image:linear-gradient(180deg,#000 0%,transparent 80%);-webkit-mask-image:linear-gradient(180deg,#000 0%,transparent 80%);"></div>

  <div style="position:relative;max-width:1440px;margin:0 auto;padding:0 clamp(20px,5vw,64px);">
    <p style="margin:0 0 20px;display:flex;align-items:center;gap:14px;font-size:12px;letter-spacing:.24em;text-transform:uppercase;color:var(--color-accent-gold);">
      <span style="display:block;width:36px;height:1px;background:var(--color-accent-gold);"></span>Stay · Eight domes on the ridge
    </p>
    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(min(100%,320px),1fr));gap:clamp(20px,4vw,56px);align-items:end;">
      <h1 style="margin:0;font-family:var(--font-heading);font-weight:300;font-size:clamp(48px,7.4vw,112px);line-height:.94;letter-spacing:-.025em;text-wrap:balance;">
        Each dome, named for a <em style="font-style:italic;color:var(--color-accent-gold);">valley.</em>
      </h1>
      <p style="margin:0 0 clamp(6px,1vw,16px);max-width:42ch;font-size:clamp(15px,1.15vw,18px);line-height:1.6;color:var(--color-text-light-soft);text-wrap:pretty;">
        Twin Valley, Nubra, Araku, Sangla, Silent Valley, Solang and Spiti. All sleep two, all face the forest, and every one has its own deck. The difference is size, seclusion and whether a hammock hangs over the drop.
      </p>
    </div>
  </div>

  <!-- Hero Lattice Arch Plate Slideshow -->
  <div style="position:relative;max-width:1440px;margin:clamp(36px,6vh,72px) auto 0;padding:0 clamp(20px,5vw,64px);">
    <div class="giv-hero-arch-slider" id="domesHeroSlider">
      <div class="giv-hero-arch-track">
        <?php foreach ($hero_slides as $hIdx => $hSlide): ?>
          <div class="giv-hero-arch-slide <?= ($hIdx === 0) ? 'active' : '' ?>" data-index="<?= $hIdx ?>" data-caption="<?= htmlspecialchars($hSlide['caption']) ?>">
            <img src="<?= htmlspecialchars($hSlide['src']) ?>" alt="<?= htmlspecialchars($hSlide['alt']) ?>" loading="<?= ($hIdx === 0) ? 'eager' : 'lazy' ?>">
          </div>
        <?php endforeach; ?>
      </div>

      <svg viewBox="0 0 400 200" preserveAspectRatio="none" aria-hidden="true" class="giv-hero-arch-lattice">
        <path d="<?= $svg_paths['latticeD'] ?>" fill="none" stroke="#f1e9da" stroke-width=".6" vector-effect="non-scaling-stroke"></path>
      </svg>

      <!-- Slide Caption -->
      <div class="giv-hero-arch-caption" id="heroArchCaption">
        <?= htmlspecialchars($hero_slides[0]['caption']) ?>
      </div>

      <!-- Arrow Controls -->
      <button type="button" class="giv-hero-arch-arrow giv-hero-arch-prev" aria-label="Previous view">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M15 18l-6-6 6-6"/></svg>
      </button>
      <button type="button" class="giv-hero-arch-arrow giv-hero-arch-next" aria-label="Next view">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M9 18l6-6-6-6"/></svg>
      </button>

      <!-- Pagination Dots -->
      <div class="giv-hero-arch-dots" role="tablist" aria-label="Hero vista slideshow">
        <?php foreach ($hero_slides as $hIdx => $hSlide): ?>
          <button type="button" class="giv-hero-arch-dot <?= ($hIdx === 0) ? 'active' : '' ?>" data-index="<?= $hIdx ?>" role="tab" aria-selected="<?= ($hIdx === 0) ? 'true' : 'false' ?>" aria-label="Slide <?= $hIdx + 1 ?> of <?= count($hero_slides) ?>"></button>
        <?php endforeach; ?>
      </div>
    </div>
  </div>

  <!-- Wave Divider into Cream -->
  <svg viewBox="0 0 1440 90" preserveAspectRatio="none" aria-hidden="true" style="display:block;width:100%;height:clamp(40px,6vw,90px);margin-top:-1px;background:#1f3b34;">
    <path d="M0 90 L0 62 C120 48 200 30 320 36 C420 41 470 60 560 52 C660 43 720 14 840 20 C940 25 990 52 1090 48 C1190 44 1250 24 1330 28 C1380 31 1410 44 1440 50 L1440 90 Z" fill="#f3efe6"></path>
  </svg>
</section>

<!-- =========================================================================
     QUICK FACTS + TIER FILTER
     ========================================================================= -->
<section style="padding:clamp(40px,6vw,80px) 0 0;">
  <div style="max-width:1440px;margin:0 auto;padding:0 clamp(20px,5vw,64px);">
    <!-- Facts Grid -->
    <div class="giv-facts-grid" style="display:grid;grid-template-columns:repeat(auto-fit,minmax(min(100%,180px),1fr));border-top:1px solid var(--color-border-dark);border-bottom:1px solid var(--color-border-dark);">
      <?php foreach ($facts as $f): ?>
        <div style="padding:22px 20px 22px 0;border-right:1px solid var(--color-border-dark-subtle);">
          <div style="font-size:11px;letter-spacing:.16em;text-transform:uppercase;color:var(--color-text-secondary);"><?= $f['k'] ?></div>
          <div style="font-family:var(--font-heading);font-size:26px;font-weight:400;line-height:1.1;margin-top:6px;font-variant-numeric:tabular-nums;"><?= $f['v'] ?></div>
        </div>
      <?php endforeach; ?>
    </div>

    <!-- Filter Buttons Row -->
    <div style="display:flex;flex-wrap:wrap;gap:16px 24px;align-items:center;justify-content:space-between;margin-top:clamp(28px,4vw,48px);">
      <div style="display:flex;flex-wrap:wrap;gap:8px;" role="tablist" aria-label="Dome Category Filters">
        <?php foreach ($tiers as $idx => $t): ?>
          <button class="giv-filter-btn giv-tier-btn <?= ($idx === 0) ? 'active' : '' ?>" data-tier="<?= $t ?>" type="button">
            <?= $t ?>
          </button>
        <?php endforeach; ?>
      </div>
      <div style="display:flex;flex-wrap:wrap;gap:12px;align-items:center;">
        <span style="font-size:13px;color:var(--color-text-secondary);" id="domeCountLabel">
          8 domes · rates per night for two
        </span>
        <a href="<?= DRIVE_TARIFF_URL ?>" target="_blank" rel="noopener" class="giv-btn-outline" style="height:38px;padding:0 16px;font-size:12px;display:inline-flex;align-items:center;gap:6px;white-space:nowrap;">
          <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="flex-shrink:0;"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg> Official Tariff Card (PDF) ↗
        </a>
      </div>
    </div>
  </div>
</section>

<!-- =========================================================================
     DOME LIST (All 8 Domes)
     ========================================================================= -->
<section style="padding:clamp(28px,4vw,48px) 0 0;">
  <div style="max-width:1440px;margin:0 auto;padding:0 clamp(20px,5vw,64px);">
    <div style="border-top:1px solid var(--color-border-dark);" id="domesContainer">
      <?php foreach ($domes as $dm): 
        $gallery = !empty($dm['gallery']) ? $dm['gallery'] : [
            ['src' => $dm['img'], 'alt' => $dm['alt'], 'caption' => $dm['name']]
        ];
        $gallery_count = count($gallery);
      ?>
        <article id="<?= $dm['id'] ?>" class="giv-dome-card" data-tier="<?= $dm['tier'] ?>" style="display:grid;grid-template-columns:repeat(auto-fit,minmax(min(100%,320px),1fr));gap:clamp(20px,3vw,48px);padding:clamp(28px,3.5vw,48px) 0;border-bottom:1px solid var(--color-border-dark);align-items:center;">
          <div class="giv-dome-slider" data-dome-slider style="border-radius:0;" aria-roledescription="carousel" aria-label="<?= htmlspecialchars($dm['name']) ?> photo gallery">
            <div class="giv-dome-slider-track">
              <?php foreach ($gallery as $gIdx => $gItem): ?>
                <a href="<?= htmlspecialchars($dm['href']) ?>" class="giv-dome-slide <?= ($gIdx === 0) ? 'active' : '' ?>" aria-label="View <?= htmlspecialchars($dm['name']) ?> details - Photo <?= $gIdx + 1 ?>" tabindex="-1">
                  <img src="<?= htmlspecialchars($gItem['src']) ?>" alt="<?= htmlspecialchars($gItem['alt']) ?>" loading="<?= ($gIdx === 0) ? 'eager' : 'lazy' ?>" draggable="false">
                </a>
              <?php endforeach; ?>
            </div>

            <!-- Number & Size Badge (Pinned Bottom-Left) -->
            <span class="giv-dome-slider-badge">
              <?= $dm['n'] ?> · <?= $dm['size'] ?>
            </span>

            <?php if ($gallery_count > 1): ?>
              <!-- Photo Counter Badge (Pinned Top-Right) -->
              <span class="giv-dome-slider-count" aria-live="polite">
                1 / <?= $gallery_count ?>
              </span>

              <!-- Navigation Arrows -->
              <button type="button" class="giv-dome-slider-arrow giv-dome-slider-prev" aria-label="Previous photo for <?= htmlspecialchars($dm['name']) ?>">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M15 18l-6-6 6-6"/></svg>
              </button>
              <button type="button" class="giv-dome-slider-arrow giv-dome-slider-next" aria-label="Next photo for <?= htmlspecialchars($dm['name']) ?>">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M9 18l6-6-6-6"/></svg>
              </button>

              <!-- Pagination Dots -->
              <div class="giv-dome-slider-dots" role="tablist" aria-label="<?= htmlspecialchars($dm['name']) ?> photos">
                <?php foreach ($gallery as $gIdx => $gItem): ?>
                  <button type="button" class="giv-dome-slider-dot <?= ($gIdx === 0) ? 'active' : '' ?>" data-index="<?= $gIdx ?>" role="tab" aria-selected="<?= ($gIdx === 0) ? 'true' : 'false' ?>" aria-label="Photo <?= $gIdx + 1 ?> of <?= $gallery_count ?>"></button>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>
          </div>

          <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(min(100%,230px),1fr));gap:24px;align-items:start;">
            <div>
              <div style="font-size:11px;letter-spacing:.16em;text-transform:uppercase;color:var(--color-accent);margin-bottom:10px;"><?= $dm['kicker'] ?></div>
              <h2 style="margin:0 0 10px;font-family:var(--font-heading);font-weight:400;font-size:clamp(30px,2.8vw,44px);line-height:1.02;letter-spacing:-.01em;">
                <a href="<?= htmlspecialchars($dm['href']) ?>" style="color:inherit;">
                  <?= $dm['name'] ?>
                </a>
              </h2>
              <p style="margin:0 0 14px;font-size:14px;color:var(--color-text-muted);line-height:1.65;text-wrap:pretty;"><?= $dm['body'] ?></p>
              <div style="display:flex;flex-wrap:wrap;gap:8px 18px;font-size:12px;color:var(--color-text-secondary);">
                <?php foreach ($dm['features'] as $ft): ?>
                  <span style="border-bottom:1px solid rgba(47,90,76,.35);padding-bottom:2px;"><?= $ft ?></span>
                <?php endforeach; ?>
              </div>
            </div>

            <div style="display:flex;flex-direction:column;gap:14px;">
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
              <div style="display:flex;flex-wrap:wrap;gap:12px;align-items:center;">
                <a href="<?= htmlspecialchars($dm['wa']) ?>" target="_blank" rel="noopener" class="giv-btn-outline">
                  Enquire on WhatsApp
                </a>
                <a href="<?= htmlspecialchars($dm['href']) ?>" class="giv-btn-link" style="white-space:nowrap;display:inline-flex;align-items:center;gap:8px;height:48px;padding:0 6px;">
                  View dome <span aria-hidden="true">→</span>
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
     COMPARE MATRIX · Green Ground
     ========================================================================= -->
<!-- Top wave divider into green -->
<svg viewBox="0 0 1440 90" preserveAspectRatio="none" aria-hidden="true" style="display:block;width:100%;height:clamp(40px,6vw,90px);margin-bottom:-1px;background:#f3efe6;">
  <path d="M0 90 L0 70 C150 60 260 30 380 34 C480 38 540 70 640 66 C760 61 820 22 940 24 C1040 26 1090 58 1190 56 C1290 54 1360 34 1440 38 L1440 90 Z" fill="#1f3b34"></path>
</svg>
<section style="position:relative;background:linear-gradient(180deg,#1f3b34 0%,#25453b 60%,#1f3b34 100%);color:var(--color-text-light);">


  <div style="max-width:1440px;margin:0 auto;padding:clamp(40px,6vw,80px) clamp(20px,5vw,64px) clamp(64px,9vw,130px);">
    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(min(100%,300px),1fr));align-items:end;gap:20px;margin-bottom:clamp(28px,4vw,48px);">
      <div>
        <p style="margin:0 0 22px;display:flex;align-items:center;gap:14px;font-size:12px;letter-spacing:.24em;text-transform:uppercase;color:var(--color-accent-gold);">
          <span style="display:block;width:36px;height:1px;background:var(--color-accent-gold);"></span>Compare
        </p>
        <h2 style="margin:0;font-family:var(--font-heading);font-weight:300;font-size:clamp(36px,4.6vw,68px);line-height:1.02;letter-spacing:-.02em;text-wrap:balance;">
          Same view. Four ways to sleep in it.
        </h2>
      </div>
      <p class="giv-section-subhead-right" style="margin:0;font-size:14px;color:var(--color-text-light-muted);max-width:44ch;text-wrap:pretty;justify-self:end;">
        Every dome is air-conditioned with an attached bathroom, a king bed facing the valley, stargazer chairs and a private deck. Here is what changes between them.
      </p>
    </div>

    <!-- Responsive Comparison Table -->
    <div class="giv-table-scroll-hint">✦ Swipe table horizontally to compare all 4 tiers ✦</div>
    <div class="giv-compare-table-wrapper" style="overflow-x:auto;-webkit-overflow-scrolling:touch;">
      <table class="giv-compare-table" style="width:100%;min-width:720px;border-collapse:collapse;font-size:14px;font-variant-numeric:tabular-nums;">
        <thead>
          <tr>
            <th style="text-align:left;padding:14px 16px 14px 0;font-weight:400;font-size:11px;letter-spacing:.16em;text-transform:uppercase;color:var(--color-text-light-subtle);border-bottom:1px solid rgba(241,233,218,.25);"></th>
            <?php foreach ($compareCols as $c): ?>
              <th style="text-align:left;padding:14px 16px;font-weight:400;border-bottom:1px solid rgba(241,233,218,.25);">
                <div style="font-family:var(--font-heading);font-size:22px;line-height:1.1;"><?= $c['name'] ?></div>
                <div style="font-size:11px;letter-spacing:.14em;text-transform:uppercase;color:var(--color-text-light-subtle);margin-top:4px;"><?= $c['sub'] ?></div>
              </th>
            <?php endforeach; ?>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($compareRows as $r): ?>
            <tr>
              <th style="text-align:left;padding:14px 16px 14px 0;font-weight:400;color:var(--color-text-light-muted);border-bottom:1px solid rgba(241,233,218,.12);white-space:nowrap;"><?= $r['label'] ?></th>
              <?php foreach ($r['cells'] as $cell): ?>
                <td style="padding:14px 16px;border-bottom:1px solid rgba(241,233,218,.12);color:var(--color-text-light);"><?= $cell ?></td>
              <?php endforeach; ?>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>

  <svg viewBox="0 0 1440 90" preserveAspectRatio="none" aria-hidden="true" style="display:block;width:100%;height:clamp(40px,6vw,90px);background:#1f3b34;">
    <path d="M0 90 L0 58 C120 46 210 22 330 28 C430 34 480 66 580 60 C690 54 750 18 870 24 C970 29 1020 58 1120 54 C1220 50 1290 28 1370 32 C1410 34 1425 44 1440 48 L1440 90 Z" fill="#f3efe6"></path>
  </svg>
</section>

<!-- =========================================================================
     INCLUDED + POLICIES
     ========================================================================= -->
<section style="padding:clamp(48px,7vw,100px) 0 clamp(80px,12vw,160px);">
  <div style="max-width:1440px;margin:0 auto;padding:0 clamp(20px,5vw,64px);display:grid;grid-template-columns:repeat(auto-fit,minmax(min(100%,320px),1fr));gap:clamp(32px,5vw,96px);align-items:start;">
    <!-- Inclusions -->
    <div>
      <p style="margin:0 0 22px;display:flex;align-items:center;gap:14px;font-size:12px;letter-spacing:.24em;text-transform:uppercase;color:var(--color-accent);">
        <span style="display:block;width:36px;height:1px;background:var(--color-accent);"></span>With every stay
      </p>
      <h2 style="margin:0 0 24px;font-family:var(--font-heading);font-weight:300;font-size:clamp(34px,4vw,56px);line-height:1.04;letter-spacing:-.02em;">
        What the rate includes.
      </h2>
      <ul style="list-style:none;margin:0;padding:0;border-top:1px solid var(--color-border-dark);">
        <?php foreach ($inclusions as $i): ?>
          <li style="display:grid;grid-template-columns:28px 1fr;gap:12px;padding:14px 0;border-bottom:1px solid var(--color-border-dark);font-size:15px;color:var(--color-text-muted);">
            <span style="color:var(--color-accent);font-family:var(--font-heading);font-size:18px;line-height:1.3;">✦</span>
            <span><?= $i ?></span>
          </li>
        <?php endforeach; ?>
      </ul>
      <p style="margin:14px 0 0;font-size:12px;color:var(--color-text-subtle);">All standard inclusions complimentary with every confirmed dome reservation.</p>
    </div>

    <!-- Policies & Good to Know -->
    <div>
      <p style="margin:0 0 22px;display:flex;align-items:center;gap:14px;font-size:12px;letter-spacing:.24em;text-transform:uppercase;color:var(--color-accent);">
        <span style="display:block;width:36px;height:1px;background:var(--color-accent);"></span>Good to know
      </p>
      <h2 style="margin:0 0 24px;font-family:var(--font-heading);font-weight:300;font-size:clamp(34px,4vw,56px);line-height:1.04;letter-spacing:-.02em;">
        Before you book.
      </h2>

      <!-- Extra Guest & Child Tariffs Highlight -->
      <div style="background:#ffffff;border:1px solid var(--color-border-dark-subtle);border-radius:var(--radius-md);padding:18px 20px;margin-bottom:20px;box-shadow:var(--shadow-sm);">
        <div style="font-size:11px;letter-spacing:.14em;text-transform:uppercase;color:var(--color-accent);font-weight:600;margin-bottom:8px;">
          Extra Guest &amp; Children Tariffs (3–12 Years)
        </div>
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:12px;font-size:13.5px;color:var(--color-text-muted);">
          <div style="border-right:1px solid var(--color-border-dark-subtle);padding-right:10px;">
            <div style="font-weight:600;color:var(--color-text);">Weekdays (Mon–Thu)</div>
            <div style="font-size:16px;color:var(--color-accent);font-family:var(--font-heading);margin-top:2px;">₹2,000/-</div>
            <div style="font-size:11px;color:var(--color-text-secondary);">per extra adult or child</div>
          </div>
          <div>
            <div style="font-weight:600;color:var(--color-text);">Weekends (Fri–Sun)</div>
            <div style="font-size:16px;color:var(--color-accent);font-family:var(--font-heading);margin-top:2px;">₹2,500/-</div>
            <div style="font-size:11px;color:var(--color-text-secondary);">per extra adult or child</div>
          </div>
        </div>
        <div style="font-size:12px;color:var(--color-text-secondary);margin-top:10px;padding-top:8px;border-top:1px solid var(--color-border-dark-subtle);">
          ✦ Children under 3 years stay free with parents.
        </div>
      </div>

      <!-- Critical Advisories -->
      <div style="background:#ffffff;border-left:3px solid var(--color-accent);border-radius:var(--radius-sm);padding:14px 16px;margin-bottom:20px;font-size:13px;line-height:1.6;color:var(--color-text-muted);border-top:1px solid var(--color-border-dark-subtle);border-right:1px solid var(--color-border-dark-subtle);border-bottom:1px solid var(--color-border-dark-subtle);">
        <p style="margin:0 0 6px;"><strong>Pool Attire Policy:</strong> <?= POOL_POLICY_NOTE ?></p>
        <p style="margin:0;font-style:italic;color:var(--color-text-secondary);">**<?= WEATHER_POLICY_NOTE ?></p>
      </div>

      <dl style="margin:0;border-top:1px solid var(--color-border-dark);">
        <?php foreach ($policies as $p): ?>
          <div style="display:grid;grid-template-columns:minmax(120px,1fr) 2fr;gap:16px;padding:14px 0;border-bottom:1px solid var(--color-border-dark);">
            <dt style="font-size:11px;letter-spacing:.14em;text-transform:uppercase;color:var(--color-text-secondary);padding-top:4px;"><?= $p['k'] ?></dt>
            <dd style="margin:0;font-size:15px;color:var(--color-text-muted);line-height:1.55;"><?= $p['v'] ?></dd>
          </div>
        <?php endforeach; ?>
      </dl>
      <div style="margin-top:20px;display:flex;flex-wrap:wrap;gap:16px;align-items:center;">
        <a href="faq.php" class="giv-btn-link">
          All stay policies, FAQ &amp; packing tips <span aria-hidden="true">→</span>
        </a>
        <a href="<?= DRIVE_TARIFF_URL ?>" target="_blank" rel="noopener" class="giv-btn-outline" style="font-size:12px;height:38px;padding:0 14px;">
          Download Tariff Card (PDF) ↗
        </a>
      </div>
    </div>
  </div>
</section>

<!-- Mobile Sticky Booking Bar -->
<?php require __DIR__ . '/includes/booking-bar.php'; ?>

<!-- Master Footer -->
<?php
$footer_kicker = 'Pick a dome';
$footer_title = 'Tell us the dates. We\'ll hold the valley.';
require __DIR__ . '/includes/footer.php';
?>
