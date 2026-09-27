<?php
/**
 * Glamp Inn Valley - Single Dome Details & Complete Gallery
 * Dedicated individual dome page showcasing high-res photography, complete specifications,
 * amenities, narrative, pricing, and direct WhatsApp concierge reservation.
 */
require_once __DIR__ . '/includes/config.php';
$svg_paths = require __DIR__ . '/includes/svg-paths.php';

// Resolve dome ID from request parameter
$dome_id = isset($_GET['id']) ? trim($_GET['id']) : (isset($_GET['slug']) ? trim($_GET['slug']) : '');
$dome_id = preg_replace('/[^a-zA-Z0-9_-]/', '', $dome_id);

$dome = !empty($dome_id) ? get_dome_by_id($dome_id) : null;

// Fallback to first dome if no ID provided or not found
if (!$dome) {
    $all_domes = get_domes_data();
    $dome = $all_domes[0];
}

$adjacent = get_adjacent_domes($dome['id']);
$all_domes = get_domes_data();
$inclusions = get_inclusions_data();
$policies = get_policies_data();

$page_title = "{$dome['name']} — Luxury Dome at Glamp Inn Valley";
$page_description = "Complete details, specifications, photography gallery, and rates for {$dome['name']} at Glamp Inn Valley, Vikarabad Hills.";
$active_nav = 'domes';
$is_dark_hero = true;

require __DIR__ . '/includes/header.php';
?>

<!-- =========================================================================
     HERO SECTION · Full-Bleed Photo with Overlay
     ========================================================================= -->
<section style="position:relative;color:var(--color-text-light);overflow:hidden;min-height:clamp(460px,62vh,700px);display:flex;flex-direction:column;justify-content:flex-end;">
  <!-- Background Image -->
  <div style="position:absolute;inset:0;z-index:0;">
    <img src="<?= $dome['img'] ?>" alt="<?= htmlspecialchars($dome['alt']) ?>" style="width:100%;height:100%;object-fit:cover;object-position:center 40%;">
    <!-- Gradient overlay: transparent top → dark bottom-left -->
    <div style="position:absolute;inset:0;background:linear-gradient(to bottom, rgba(10,20,18,0.15) 0%, rgba(10,20,18,0.25) 40%, rgba(10,20,18,0.72) 75%, rgba(10,20,18,0.88) 100%);"></div>
    <div style="position:absolute;inset:0;background:linear-gradient(to right, rgba(10,20,18,0.5) 0%, rgba(10,20,18,0) 60%);"></div>
  </div>

  <!-- Navbar spacer so nav sits above image -->
  <div style="position:relative;z-index:1;height:clamp(70px,10vh,100px);"></div>

  <!-- Hero Content overlaid on image bottom-left -->
  <div style="position:relative;z-index:1;max-width:1440px;margin:0 auto;width:100%;padding:0 clamp(20px,5vw,64px) clamp(36px,5vw,64px);">
    <div style="max-width:580px;">
      <!-- Kicker -->
      <p style="margin:0 0 10px;font-size:11px;letter-spacing:.28em;text-transform:uppercase;color:var(--color-accent-gold);font-weight:500;">
        Luxury Dome
      </p>
      <!-- Dome Name -->
      <h1 style="margin:0 0 14px;font-family:var(--font-heading);font-weight:400;font-size:clamp(38px,5.5vw,72px);line-height:1.0;letter-spacing:-.02em;text-wrap:balance;text-shadow:0 2px 16px rgba(0,0,0,0.3);">
        <?= htmlspecialchars($dome['name']) ?>
      </h1>
      <!-- Icon Specs Row -->
      <div style="display:flex;align-items:center;gap:20px;margin-bottom:14px;font-size:13px;color:rgba(241,233,218,0.9);">
        <span style="display:flex;align-items:center;gap:6px;">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M3 9h18M9 3v18"/></svg>
          <?= $dome['size'] ?>
        </span>
        <span style="display:flex;align-items:center;gap:6px;">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><circle cx="9" cy="7" r="4"/><path d="M3 21v-2a4 4 0 0 1 4-4h4a4 4 0 0 1 4 4v2"/><circle cx="17" cy="7" r="3"/><path d="M21 21v-2a3 3 0 0 0-3-3"/></svg>
          2 Guests
        </span>
      </div>
      <!-- Short Description -->
      <p style="margin:0 0 22px;font-size:clamp(14px,1.1vw,16px);line-height:1.65;color:rgba(241,233,218,0.82);max-width:44ch;text-wrap:pretty;text-shadow:0 1px 8px rgba(0,0,0,0.25);">
        <?= htmlspecialchars($dome['body']) ?>
      </p>
      <!-- CTA Button -->
      <a href="<?= htmlspecialchars($dome['wa']) ?>" target="_blank" rel="noopener"
         style="display:inline-flex;align-items:center;gap:10px;background:#b67c35;color:#fff;font-size:14px;font-weight:600;letter-spacing:.06em;padding:13px 28px;border-radius:4px;text-decoration:none;">
        Check Availability
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" aria-hidden="true"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
      </a>
    </div>
  </div>
</section>



<!-- =========================================================================
     GALLERY SECTION · Explore the Dome · Two-Column Layout
     ========================================================================= -->
<section id="dome-photos" style="padding:clamp(48px,6vw,80px) 0;background:#faf8f4;">
  <div style="max-width:1440px;margin:0 auto;padding:0 clamp(20px,5vw,64px);">

    <!-- Section Header -->
    <div style="margin-bottom:clamp(24px,3vw,36px);">
      <div>
        <p style="margin:0 0 6px;font-size:11px;letter-spacing:.22em;text-transform:uppercase;color:#b67c35;display:flex;align-items:center;gap:10px;">
          <span style="display:block;width:28px;height:1px;background:#b67c35;"></span>
          Gallery
        </p>
        <h2 style="margin:0 0 6px;font-family:var(--font-heading);font-weight:300;font-size:clamp(28px,3.5vw,50px);line-height:1.06;letter-spacing:-.02em;">
          Explore <?= htmlspecialchars($dome['name']) ?>
        </h2>
        <p style="margin:0;font-size:14px;color:var(--color-text-secondary);">Take a closer look at the dome, its interiors and the stunning surroundings.</p>
      </div>
    </div>

    <!-- Two-Column Gallery Layout -->
    <div style="display:grid;grid-template-columns:1fr 1fr;gap:6px;align-items:stretch;" id="domeGalleryGrid">

      <?php
      // Prepare gallery images: main dome img + gallery items
      $galleryAll = array_merge([
          ['src' => $dome['img'], 'alt' => $dome['alt'], 'caption' => 'Aerial View', 'tag' => 'Aerial View']
      ], array_map(function($g, $i) {
          // Assign category tags based on caption keywords
          $cap = strtolower($g['caption']);
          if (strpos($cap, 'exterior') !== false || strpos($cap, 'perspective') !== false || strpos($cap, 'aerial') !== false || strpos($cap, 'terrace') !== false) {
              $tag = 'Exterior';
          } elseif (strpos($cap, 'bedroom') !== false || strpos($cap, 'interior') !== false || strpos($cap, 'bed') !== false || strpos($cap, 'suite') !== false) {
              $tag = 'Bedroom';
          } elseif (strpos($cap, 'bath') !== false) {
              $tag = 'Bathroom';
          } elseif (strpos($cap, 'deck') !== false || strpos($cap, 'terrace') !== false || strpos($cap, 'hammock') !== false) {
              $tag = 'Private Terrace';
          } elseif (strpos($cap, 'valley') !== false || strpos($cap, 'view') !== false || strpos($cap, 'horizon') !== false || strpos($cap, 'sunset') !== false || strpos($cap, 'ridge') !== false) {
              $tag = 'Valley View';
          } else {
              $tag = ucwords(explode(' ', $g['caption'])[0]);
          }
          $g['tag'] = $tag;
          return $g;
      }, $dome['gallery'], array_keys($dome['gallery'])));

      $totalImages = count($galleryAll);
      ?>

      <!-- Left: Large featured slideshow image -->
      <div style="position:relative;overflow:hidden;background:#111;" id="galleryFeatured">
        <?php foreach($galleryAll as $idx => $gi): ?>
        <div class="gallery-slide" style="display:<?= $idx === 0 ? 'block' : 'none' ?>;position:relative;">
          <img src="<?= $gi['src'] ?>" alt="<?= htmlspecialchars($gi['alt']) ?>"
               style="width:100%;aspect-ratio:4/5;object-fit:cover;display:block;cursor:pointer;"
               data-lightbox loading="<?= $idx === 0 ? 'eager' : 'lazy' ?>">
          <!-- Bottom label -->
          <div style="position:absolute;left:0;right:0;bottom:0;background:linear-gradient(transparent,rgba(0,0,0,0.65));padding:28px 20px 16px;color:#fff;pointer-events:none;">
            <div style="font-size:11px;letter-spacing:.2em;text-transform:uppercase;opacity:.8;margin-bottom:4px;">
              <?= sprintf('%02d / %02d', $idx + 1, $totalImages) ?> &nbsp;·&nbsp; <?= htmlspecialchars($gi['tag'] ?? 'Featured') ?>
            </div>
          </div>
        </div>
        <?php endforeach; ?>

        <!-- Prev/Next Arrows -->
        <button onclick="galleryNav(-1)" aria-label="Previous photo"
                style="position:absolute;left:12px;top:50%;transform:translateY(-50%);background:rgba(255,255,255,0.9);border:none;border-radius:50%;width:36px;height:36px;display:flex;align-items:center;justify-content:center;cursor:pointer;z-index:5;">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#1a1a1a" stroke-width="2.2"><path d="M15 18l-6-6 6-6"/></svg>
        </button>
        <button onclick="galleryNav(1)" aria-label="Next photo"
                style="position:absolute;right:12px;top:50%;transform:translateY(-50%);background:rgba(255,255,255,0.9);border:none;border-radius:50%;width:36px;height:36px;display:flex;align-items:center;justify-content:center;cursor:pointer;z-index:5;">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#1a1a1a" stroke-width="2.2"><path d="M9 18l6-6-6-6"/></svg>
        </button>
      </div>

      <!-- Right: 2×2 Category Grid -->
      <div style="display:grid;grid-template-columns:1fr 1fr;grid-template-rows:1fr 1fr;gap:6px;">
        <?php
        // Pick 4 images for the right grid (use gallery items, fallback to dome img)
        $rightImages = [];
        foreach ($galleryAll as $gi) {
            if (count($rightImages) >= 4) break;
            $rightImages[] = $gi;
        }
        // Pad if fewer than 4
        while (count($rightImages) < 4) {
            $rightImages[] = ['src' => $dome['img'], 'alt' => $dome['alt'], 'tag' => 'View'];
        }
        foreach ($rightImages as $ri):
        ?>
        <div style="position:relative;overflow:hidden;cursor:pointer;" data-lightbox>
          <img src="<?= $ri['src'] ?>" alt="<?= htmlspecialchars($ri['alt']) ?>"
               loading="lazy" style="width:100%;height:100%;object-fit:cover;aspect-ratio:1;display:block;transition:transform .4s ease;">
          <!-- Tag label -->
          <div style="position:absolute;left:10px;bottom:10px;background:rgba(0,0,0,0.6);color:#fff;font-size:10px;letter-spacing:.14em;text-transform:uppercase;padding:4px 10px;border-radius:2px;pointer-events:none;">
            <?= htmlspecialchars($ri['tag'] ?? $ri['caption'] ?? '') ?>
          </div>
        </div>
        <?php endforeach; ?>
      </div>

    </div><!-- /gallery grid -->
  </div>
</section>

<script>
(function(){
  var slides = document.querySelectorAll('.gallery-slide');
  if (!slides.length) return;
  var current = 0;
  window.galleryNav = function(dir) {
    slides[current].style.display = 'none';
    current = (current + dir + slides.length) % slides.length;
    slides[current].style.display = 'block';
  };

  var feat = document.getElementById('galleryFeatured');
  if (feat) {
    var startX = 0, startY = 0;
    feat.addEventListener('touchstart', function(e) {
      if (e.touches && e.touches[0]) {
        startX = e.touches[0].clientX;
        startY = e.touches[0].clientY;
      }
    }, { passive: true });

    feat.addEventListener('touchend', function(e) {
      if (!startX) return;
      var diffX = startX - e.changedTouches[0].clientX;
      var diffY = startY - e.changedTouches[0].clientY;
      if (Math.abs(diffX) > Math.abs(diffY) && Math.abs(diffX) > 35) {
        if (diffX > 0) {
          window.galleryNav(1);
        } else {
          window.galleryNav(-1);
        }
      }
      startX = 0;
    }, { passive: true });
  }
})();
</script>

<!-- =========================================================================
     DETAILED STORY, SPECIFICATIONS & BOOKING ROW
     ========================================================================= -->
<section style="padding:clamp(40px,6vw,90px) 0;background:var(--color-bg-cream-alt);position:relative;">
  <div style="max-width:1440px;margin:0 auto;padding:0 clamp(20px,5vw,64px);">
    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(min(100%,340px),1fr));gap:clamp(32px,5vw,80px);align-items:start;">

      <!-- Left Column: Narrative, Architectural Design & Amenities -->
      <div>
        <p style="margin:0 0 16px;font-size:11px;letter-spacing:.22em;text-transform:uppercase;color:var(--color-accent);">
          Architectural Details &amp; Experience
        </p>
        <h2 style="margin:0 0 24px;font-family:var(--font-heading);font-weight:300;font-size:clamp(32px,4vw,60px);line-height:1.04;letter-spacing:-.02em;">
          Designed for solitude and the open sky.
        </h2>
        <p style="margin:0 0 24px;font-size:16px;line-height:1.75;color:var(--color-text-muted);text-wrap:pretty;">
          <?= htmlspecialchars($dome['description_long']) ?>
        </p>

        <!-- Key Feature Tags -->
        <div style="margin-bottom:36px;">
          <h3 style="margin:0 0 16px;font-family:var(--font-heading);font-size:22px;font-weight:400;color:var(--color-text);">
            Key Highlights
          </h3>
          <div style="display:flex;flex-wrap:wrap;gap:10px;">
            <?php foreach ($dome['features'] as $f): ?>
              <span style="display:inline-flex;align-items:center;gap:8px;background:rgba(182,130,53,.1);border:1px solid rgba(182,130,53,.3);padding:7px 14px;border-radius:var(--radius-pill);font-size:13px;color:var(--color-accent-deep);">
                <span aria-hidden="true" style="color:var(--color-accent);">✦</span> <?= htmlspecialchars($f) ?>
              </span>
            <?php endforeach; ?>
          </div>
        </div>

        <!-- In-Depth Specifications Table -->
        <div style="border-top:1px solid var(--color-border-dark);padding-top:28px;">
          <h3 style="margin:0 0 18px;font-family:var(--font-heading);font-size:24px;font-weight:400;color:var(--color-text);">
            Technical Specifications
          </h3>
          <dl style="margin:0;display:grid;grid-template-columns:1fr;gap:14px;">
            <?php foreach ($dome['specs'] as $spec_k => $spec_v): ?>
              <div style="display:grid;grid-template-columns:minmax(110px,1fr) 2fr;gap:16px;padding-bottom:12px;border-bottom:1px solid var(--color-border-dark-subtle);align-items:baseline;">
                <dt style="font-size:11px;letter-spacing:.14em;text-transform:uppercase;color:var(--color-text-secondary);"><?= htmlspecialchars($spec_k) ?></dt>
                <dd style="margin:0;font-size:15px;color:var(--color-text-muted);"><?= htmlspecialchars($spec_v) ?></dd>
              </div>
            <?php endforeach; ?>
          </dl>
        </div>
      </div>

      <!-- Right Column: Rates & Direct Concierge Reservation Card -->
      <aside style="position:sticky;top:90px;">
        <div style="background:#f3efe6;border:1px solid var(--color-border-dark);border-radius:var(--radius-md);padding:clamp(28px,3.5vw,44px);box-shadow:0 12px 36px rgba(29,42,38,.06);">
          <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:16px;border-bottom:1px solid var(--color-border-dark);padding-bottom:16px;">
            <div>
              <span style="font-size:11px;letter-spacing:.18em;text-transform:uppercase;color:var(--color-accent);">Reservation</span>
              <h3 style="margin:4px 0 0;font-family:var(--font-heading);font-size:28px;font-weight:400;"><?= htmlspecialchars($dome['name']) ?></h3>
            </div>
            <span style="font-family:var(--font-heading);font-size:14px;letter-spacing:.16em;text-transform:uppercase;color:var(--color-text-secondary);background:var(--color-surface);padding:4px 10px;border-radius:var(--radius-sm);">
              <?= $dome['size'] ?>
            </span>
          </div>

          <!-- Pricing Grid -->
          <div style="display:grid;grid-template-columns:1fr 1fr;gap:16px;padding:16px 0;border-bottom:1px solid var(--color-border-dark);font-variant-numeric:tabular-nums;">
            <div>
              <div style="font-size:11px;letter-spacing:.14em;text-transform:uppercase;color:var(--color-text-secondary);">Weekdays (Mon–Thu)</div>
              <div style="font-family:var(--font-heading);font-size:34px;font-weight:400;line-height:1.1;margin-top:6px;color:var(--color-text);"><?= $dome['weekday'] ?></div>
              <div style="font-size:11px;color:var(--color-text-secondary);margin-top:2px;">per night for 2</div>
            </div>
            <div>
              <div style="font-size:11px;letter-spacing:.14em;text-transform:uppercase;color:var(--color-text-secondary);">Weekends (Fri–Sun)</div>
              <div style="font-family:var(--font-heading);font-size:34px;font-weight:400;line-height:1.1;margin-top:6px;color:var(--color-text);"><?= $dome['weekend'] ?></div>
              <div style="font-size:11px;color:var(--color-text-secondary);margin-top:2px;">per night for 2</div>
            </div>
          </div>

          <!-- Extra Occupant Rates & Schedule -->
          <div style="padding:14px 0;border-bottom:1px solid var(--color-border-dark);font-size:12.5px;color:var(--color-text-muted);display:flex;flex-direction:column;gap:6px;">
            <div style="display:flex;justify-content:space-between;flex-wrap:wrap;gap:4px 10px;">
              <span>Extra Adult / Kid (3–12 yrs):</span>
              <strong>₹2,000/- (Wkday) | ₹2,500/- (Wkend)</strong>
            </div>
            <div style="display:flex;justify-content:space-between;color:var(--color-text-secondary);font-size:12px;">
              <span>Check-in: <strong><?= CHECKIN_TIME ?></strong></span>
              <span>Check-out: <strong><?= CHECKOUT_TIME ?></strong></span>
            </div>
          </div>

          <!-- Inclusions Summary -->
          <div style="padding:18px 0;border-bottom:1px solid var(--color-border-dark);">
            <div style="font-size:11px;letter-spacing:.14em;text-transform:uppercase;color:var(--color-accent);margin-bottom:10px;font-weight:600;">Included with this stay</div>
            <ul style="list-style:none;margin:0;padding:0;font-size:13px;color:var(--color-text-muted);display:flex;flex-direction:column;gap:7px;">
              <li style="display:flex;align-items:center;gap:8px;"><span style="color:var(--color-accent);">✦</span> Complimentary breakfast for two</li>
              <li style="display:flex;align-items:center;gap:8px;"><span style="color:var(--color-accent);">✦</span> Hi-Tea &amp; Evening Snacks on the ridge</li>
              <li style="display:flex;align-items:center;gap:8px;"><span style="color:var(--color-accent);">✦</span> Access to Common Infinity Pool</li>
              <li style="display:flex;align-items:center;gap:8px;"><span style="color:var(--color-accent);">✦</span> Access to Horse Ranch &amp; ranch visit</li>
              <li style="display:flex;align-items:center;gap:8px;"><span style="color:var(--color-accent);">✦</span> Morning Guided Trekking to 400-yr temple</li>
              <li style="display:flex;align-items:center;gap:8px;"><span style="color:var(--color-accent);">✦</span> Evening Musical Bonfire &amp; Telescope moongazing</li>
              <li style="display:flex;align-items:center;gap:8px;"><span style="color:var(--color-accent);">✦</span> Board games, Trampoline, Kids Area &amp; RO water</li>
            </ul>
          </div>

          <!-- Pool Attire Alert -->
          <div style="background:rgba(182,130,53,.08);border-left:3px solid var(--color-accent);padding:10px 12px;margin-top:14px;border-radius:2px;font-size:12px;color:var(--color-text-muted);line-height:1.5;">
            <strong>Pool Attire:</strong> Proper nylon swimming attire mandatory for entry into pool.
          </div>

          <!-- CTAs -->
          <div style="margin-top:20px;display:flex;flex-direction:column;gap:12px;">
            <a href="<?= htmlspecialchars($dome['wa']) ?>" target="_blank" rel="noopener" class="giv-btn-gold" style="width:100%;text-align:center;box-sizing:border-box;background:#1f3b34;border-color:var(--color-accent);color:var(--color-text-light);">
              Reserve on WhatsApp
            </a>
            <a href="tel:<?= PHONE_RAW ?>" class="giv-btn-outline" style="width:100%;text-align:center;box-sizing:border-box;">
              Call Concierge: <?= PHONE_DISPLAY ?>
            </a>
            <div style="display:flex;justify-content:space-between;align-items:center;margin-top:6px;font-size:12px;">
              <a href="domes.php#compare" class="giv-btn-link">
                Compare all 8 domes <span aria-hidden="true">→</span>
              </a>
              <a href="<?= DRIVE_TARIFF_URL ?>" target="_blank" rel="noopener" class="giv-btn-link" style="color:var(--color-text-secondary);">
                Tariff Card (PDF) ↗
              </a>
            </div>
          </div>
        </div>
      </aside>

    </div>
  </div>
</section>

<!-- =========================================================================
     INCLUDED & POLICIES SUMMARY
     ========================================================================= -->
<section style="padding:clamp(48px,7vw,96px) 0;position:relative;">
  <div style="max-width:1440px;margin:0 auto;padding:0 clamp(20px,5vw,64px);display:grid;grid-template-columns:repeat(auto-fit,minmax(min(100%,320px),1fr));gap:clamp(32px,5vw,80px);align-items:start;">
    <!-- Inclusions -->
    <div>
      <p style="margin:0 0 16px;font-size:11px;letter-spacing:.2em;text-transform:uppercase;color:var(--color-accent);">Stay Inclusions</p>
      <h2 style="margin:0 0 20px;font-family:var(--font-heading);font-weight:300;font-size:clamp(30px,3.5vw,48px);line-height:1.06;">
        What comes with your key.
      </h2>
      <ul style="list-style:none;margin:0;padding:0;border-top:1px solid var(--color-border-dark);">
        <?php foreach ($inclusions as $inc): ?>
          <li style="display:grid;grid-template-columns:26px 1fr;gap:12px;padding:12px 0;border-bottom:1px solid var(--color-border-dark);font-size:14px;color:var(--color-text-muted);">
            <span style="color:var(--color-accent);font-family:var(--font-heading);font-size:18px;">✦</span>
            <span><?= htmlspecialchars($inc) ?></span>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>

    <!-- Policies -->
    <div>
      <p style="margin:0 0 16px;font-size:11px;letter-spacing:.2em;text-transform:uppercase;color:var(--color-accent);">Stay Policies</p>
      <h2 style="margin:0 0 20px;font-family:var(--font-heading);font-weight:300;font-size:clamp(30px,3.5vw,48px);line-height:1.06;">
        Good to know.
      </h2>
      <dl style="margin:0;border-top:1px solid var(--color-border-dark);">
        <?php foreach ($policies as $pol): ?>
          <div style="display:grid;grid-template-columns:minmax(110px,1fr) 2fr;gap:16px;padding:12px 0;border-bottom:1px solid var(--color-border-dark);">
            <dt style="font-size:11px;letter-spacing:.14em;text-transform:uppercase;color:var(--color-text-secondary);padding-top:2px;"><?= htmlspecialchars($pol['k']) ?></dt>
            <dd style="margin:0;font-size:14px;color:var(--color-text-muted);line-height:1.5;"><?= htmlspecialchars($pol['v']) ?></dd>
          </div>
        <?php endforeach; ?>
      </dl>
      <a href="faq.php" class="giv-btn-link" style="margin-top:18px;display:inline-flex;font-size:14px;">
        Read all stay policies and FAQ <span aria-hidden="true">→</span>
      </a>
    </div>
  </div>
</section>

<!-- =========================================================================
     EXPLORE ADJACENT & OTHER DOMES ON THE RIDGE
     ========================================================================= -->
<!-- Top wave divider into green -->
<svg viewBox="0 0 1440 90" preserveAspectRatio="none" aria-hidden="true" style="display:block;width:100%;height:clamp(40px,6vw,90px);margin-bottom:-1px;background:#f3efe6;">
  <path d="M0 90 L0 66 C140 56 240 28 360 32 C460 36 520 66 620 62 C740 57 800 20 920 24 C1020 27 1070 58 1170 54 C1270 50 1340 32 1440 36 L1440 90 Z" fill="#1f3b34"></path>
</svg>
<section style="position:relative;background:linear-gradient(180deg,#1f3b34 0%,#25453b 60%,#1f3b34 100%);color:var(--color-text-light);padding:clamp(60px,8vw,110px) 0 0;">


  <div style="max-width:1440px;margin:0 auto;padding:0 clamp(20px,5vw,64px);">
    <!-- Previous / Next Navigation Row -->
    <div class="giv-adjacent-nav" style="display:flex;justify-content:space-between;align-items:center;border-bottom:1px solid rgba(241,233,218,.2);padding-bottom:28px;margin-bottom:clamp(32px,5vw,56px);flex-wrap:wrap;gap:20px;">
      <?php if ($adjacent['prev']): ?>
        <a href="<?= htmlspecialchars($adjacent['prev']['href']) ?>" style="display:flex;flex-direction:column;gap:4px;color:var(--color-text-light);">
          <span style="font-size:11px;letter-spacing:.16em;text-transform:uppercase;color:var(--color-accent-gold);">← Previous Dome</span>
          <span style="font-family:var(--font-heading);font-size:22px;"><?= htmlspecialchars($adjacent['prev']['name']) ?></span>
        </a>
      <?php else: ?>
        <div></div>
      <?php endif; ?>

      <a href="domes.php" class="giv-btn-outline giv-adjacent-all" style="border-color:var(--color-accent-gold);color:var(--color-accent-gold);height:42px;font-size:15px;">
        View All 8 Domes
      </a>

      <?php if ($adjacent['next']): ?>
        <a href="<?= htmlspecialchars($adjacent['next']['href']) ?>" style="display:flex;flex-direction:column;align-items:flex-end;gap:4px;color:var(--color-text-light);text-align:right;">
          <span style="font-size:11px;letter-spacing:.16em;text-transform:uppercase;color:var(--color-accent-gold);">Next Dome →</span>
          <span style="font-family:var(--font-heading);font-size:22px;"><?= htmlspecialchars($adjacent['next']['name']) ?></span>
        </a>
      <?php endif; ?>
    </div>

    <!-- Other Domes Grid -->
    <div>
      <p style="margin:0 0 12px;font-size:11px;letter-spacing:.2em;text-transform:uppercase;color:var(--color-accent-gold);">The Ridge Collection</p>
      <h3 style="margin:0 0 32px;font-family:var(--font-heading);font-weight:300;font-size:clamp(28px,3.2vw,48px);">Other sanctuaries to explore.</h3>

      <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(min(100%,280px),1fr));gap:24px;">
        <?php 
        $other_domes = array_filter($all_domes, function($d) use ($dome) { return $d['id'] !== $dome['id']; });
        $other_slice = array_slice($other_domes, 0, 4);
        foreach ($other_slice as $od): 
        ?>
          <article style="border:1px solid rgba(241,233,218,.16);border-radius:var(--radius-md);overflow:hidden;background:rgba(15,31,35,.35);display:flex;flex-direction:column;">
            <a href="<?= htmlspecialchars($od['href']) ?>" style="display:block;aspect-ratio:16/10;overflow:hidden;">
              <img src="<?= $od['img'] ?>" alt="<?= htmlspecialchars($od['alt']) ?>" loading="lazy" style="width:100%;height:100%;object-fit:cover;">
            </a>
            <div style="padding:20px;display:flex;flex-direction:column;flex-grow:1;justify-content:space-between;gap:14px;">
              <div>
                <span style="font-size:11px;letter-spacing:.14em;text-transform:uppercase;color:var(--color-accent-gold);"><?= $od['kicker'] ?></span>
                <h4 style="margin:6px 0 0;font-family:var(--font-heading);font-size:24px;font-weight:400;color:var(--color-text-light);">
                  <a href="<?= htmlspecialchars($od['href']) ?>" style="color:inherit;"><?= htmlspecialchars($od['name']) ?></a>
                </h4>
              </div>
              <div style="display:flex;align-items:center;justify-content:space-between;border-top:1px solid rgba(241,233,218,.14);padding-top:12px;font-variant-numeric:tabular-nums;">
                <div>
                  <span style="font-size:11px;color:var(--color-text-light-subtle);display:block;">From</span>
                  <span style="font-family:var(--font-heading);font-size:20px;color:var(--color-text-light);"><?= $od['weekday'] ?></span>
                </div>
                <a href="<?= htmlspecialchars($od['href']) ?>" style="font-size:14px;color:var(--color-accent-gold);display:inline-flex;align-items:center;gap:6px;">
                  View dome →
                </a>
              </div>
            </div>
          </article>
        <?php endforeach; ?>
      </div>
    </div>
  </div>

  <!-- Bottom Wave -->
  <svg viewBox="0 0 1440 90" preserveAspectRatio="none" aria-hidden="true" style="display:block;width:100%;height:clamp(40px,6vw,90px);margin-top:clamp(44px,7vh,88px);margin-bottom:-1px;background:#1f3b34;">
    <path d="M0 90 L0 58 C120 46 210 22 330 28 C430 34 480 66 580 60 C690 54 750 18 870 24 C970 29 1020 58 1120 54 C1220 50 1290 28 1370 32 C1410 34 1425 44 1440 48 L1440 90 Z" fill="#f3efe6"></path>
  </svg>
</section>

<!-- Mobile Sticky Booking Bar Customized for this Dome -->
<div class="giv-sticky-bookbar" id="mobileStickyBar" aria-label="Quick Booking Bar">
  <div style="line-height:1.2;">
    <div style="font-size:10px;letter-spacing:.12em;text-transform:uppercase;color:var(--color-text-secondary);"><?= htmlspecialchars($dome['name']) ?></div>
    <div style="font-family:var(--font-heading);font-size:20px;font-weight:500;font-variant-numeric:tabular-nums;">
      <?= $dome['weekday'] ?> <span style="font-size:12px;font-family:var(--font-body);color:var(--color-text-secondary);">/ night</span>
    </div>
  </div>
  <a href="<?= htmlspecialchars($dome['wa']) ?>" target="_blank" rel="noopener" class="giv-btn-outline" style="height:44px;padding:0 16px;font-size:15px;">
    Book on WhatsApp
  </a>
</div>

<!-- Master Footer -->
<?php
$footer_kicker = "Reserve {$dome['name']}";
$footer_title = "Tell us your dates. We'll prepare your dome.";
require __DIR__ . '/includes/footer.php';
?>
