<?php
/**
 * Glamp Inn Valley - Gallery Page
 * Comprehensive visual archive of property photography with category filters and lightbox.
 */
require_once __DIR__ . '/includes/config.php';
$svg_paths = require __DIR__ . '/includes/svg-paths.php';

$page_title = 'Gallery & Field Notes';
$page_description = 'Explore photography of our luxury geodesic domes, hillside infinity pool, private decks, starlit dining, and celebrations at Glamp Inn Valley.';
$active_nav = 'gallery';
$is_dark_hero = true;

$gallery_items = [
    ['cat' => 'domes', 'src' => 'assets/images/ridge-sanctuary-new.webp', 'alt' => 'Geodesic dome on private deck nestled in forest grass', 'title' => 'Ridge Sanctuary'],
    ['cat' => 'domes', 'src' => 'assets/images/banner4.webp', 'alt' => 'Aerial perspective of Twin Valley domes on elevated deck', 'title' => 'Twin Valley Aerial'],
    ['cat' => 'pool', 'src' => 'assets/images/banner2.webp', 'alt' => 'Infinity pool at dusk reflecting evening sky', 'title' => 'The Infinity Edge'],
    ['cat' => 'domes', 'src' => 'assets/images/banner3.webp', 'alt' => 'Quilted gold dome interior facing forest window', 'title' => 'Signature Dome Interior'],
    ['cat' => 'views', 'src' => 'assets/images/banner5.webp', 'alt' => 'Stargazer chairs overlooking Vikarabad hills', 'title' => 'Sunset Deck'],
    ['cat' => 'domes', 'src' => 'assets/images/gallery-0.webp', 'alt' => 'Dome window looking out to the infinity hammock', 'title' => 'The Infinity Hammock'],
    ['cat' => 'domes', 'src' => 'assets/images/gallery-1.webp', 'alt' => 'King bed and warm lighting inside dome', 'title' => 'Nocturnal Comfort'],
    ['cat' => 'views', 'src' => 'assets/images/gallery-2.webp', 'alt' => 'Outdoor chess set on wooden deck', 'title' => 'Deck Living'],
    ['cat' => 'views', 'src' => 'assets/images/gallery-3.webp', 'alt' => 'Twin Valley path markers among crimson leaves', 'title' => 'Valley Trails'],
    ['cat' => 'pool', 'src' => 'assets/images/gallery-4.webp', 'alt' => 'Stone pathway descending to the infinity pool', 'title' => 'Path to the Pool'],
    ['cat' => 'dining', 'src' => 'assets/images/gallery-7.webp', 'alt' => 'Evening fire pit with glowing embers', 'title' => 'Evening Bonfire'],
    ['cat' => 'pool', 'src' => 'assets/images/gallery-b3.webp', 'alt' => 'Panoramic vista of infinity pool and forest valley', 'title' => 'Valley Panorama'],
    ['cat' => 'domes', 'src' => 'assets/images/gallery-b4.webp', 'alt' => 'Dome interior looking out toward morning sun', 'title' => 'Morning Awakening'],
    ['cat' => 'dining', 'src' => 'assets/images/gallery-b5.webp', 'alt' => 'Barbecue dinner table set on upper lawn', 'title' => 'Lawn Dining'],
    ['cat' => 'pool', 'src' => 'assets/images/infinity-pool.webp', 'alt' => 'Poolside relaxation with mountain breeze', 'title' => 'Poolside Solitude'],
    ['cat' => 'dining', 'src' => 'assets/images/barbeque.webp', 'alt' => 'Guests gathered for a hilltop grill dinner', 'title' => 'Tabletop Barbecue'],
    ['cat' => 'dining', 'src' => 'assets/images/private-bonfire.webp', 'alt' => 'Private bonfire beside your own dome deck', 'title' => 'Private Bonfire'],
    ['cat' => 'dining', 'src' => 'assets/images/candle-light-dinner.webp', 'alt' => 'Romantic candlelight dinner table under lantern light', 'title' => 'Lantern-lit Dinner'],
    ['cat' => 'dining', 'src' => 'assets/images/floating-breakfast.webp', 'alt' => 'Floating breakfast tray served on infinity pool', 'title' => 'Floating Breakfast'],
    ['cat' => 'events', 'src' => 'assets/images/proposal.webp', 'alt' => 'Marry me lights for romantic marriage proposal', 'title' => 'Valley Proposals'],
    ['cat' => 'events', 'src' => 'assets/images/birthday.webp', 'alt' => 'Bespoke birthday celebrations under stars', 'title' => 'Birthday Celebrations'],
    ['cat' => 'events', 'src' => 'assets/images/wedding.webp', 'alt' => 'Hilltop wedding setup overlooking panoramic hills', 'title' => 'Ridge Weddings'],
    ['cat' => 'views', 'src' => 'assets/images/sunrise-delight.webp', 'alt' => 'Golden dawn rising over the forest ridge', 'title' => 'Vikarabad Sunrise'],
    ['cat' => 'views', 'src' => 'assets/images/sunset-spectacle.png', 'alt' => 'Domes silhouetted against glowing orange sunset', 'title' => 'Sunset Spectacle']
];

require __DIR__ . '/includes/header.php';
?>

<!-- =========================================================================
     PAGE HERO
     ========================================================================= -->
<section style="position:relative;background:linear-gradient(180deg,#0f1f23 0%,#1f3b34 100%);color:var(--color-text-light);overflow:hidden;padding:clamp(130px,18vh,190px) 0 0;">
  <div aria-hidden="true" style="position:absolute;inset:0;background-image:radial-gradient(circle,rgba(241,233,218,.6) 0 1px,transparent 1.6px),radial-gradient(circle,rgba(217,169,98,.5) 0 1px,transparent 1.7px);background-size:230px 230px,410px 410px;background-position:40px 20px,180px 100px;mask-image:linear-gradient(180deg,#000 0%,transparent 80%);-webkit-mask-image:linear-gradient(180deg,#000 0%,transparent 80%);"></div>

  <div style="position:relative;max-width:1440px;margin:0 auto;padding:0 clamp(20px,5vw,64px);">
    <p style="margin:0 0 20px;display:flex;align-items:center;gap:14px;font-size:12px;letter-spacing:.24em;text-transform:uppercase;color:var(--color-accent-gold);">
      <span style="display:block;width:36px;height:1px;background:var(--color-accent-gold);"></span>Field Notes
    </p>
    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(min(100%,320px),1fr));gap:clamp(20px,4vw,56px);align-items:end;">
      <h1 style="margin:0;font-family:var(--font-heading);font-weight:300;font-size:clamp(48px,7.4vw,112px);line-height:.94;letter-spacing:-.025em;text-wrap:balance;">
        Moments kept from <em style="font-style:italic;color:var(--color-accent-gold);">the ridge.</em>
      </h1>
      <div class="giv-section-subhead-right" style="justify-self:end;text-align:right;">
        <p style="margin:0 0 14px;font-size:15px;color:var(--color-text-light-soft);">
          Click any photo for high-resolution plate preview.
        </p>
        <div style="display:flex;flex-wrap:wrap;gap:10px;justify-content:flex-end;">
          <a href="<?= DRIVE_GALLERY_URL ?>" target="_blank" rel="noopener" class="giv-btn-gold" style="font-size:12px;height:38px;padding:0 16px;">
            Full Photo Gallery (Drive) ↗
          </a>
          <a href="<?= DRIVE_ACTIVITIES_GALLERY_URL ?>" target="_blank" rel="noopener" class="giv-btn-outline" style="font-size:12px;height:38px;padding:0 16px;color:var(--color-text-light);border-color:rgba(241,233,218,.35);">
            Activities Gallery (Drive) ↗
          </a>
          <a href="<?= INSTAGRAM_URL ?>" target="_blank" rel="noopener" class="giv-btn-outline" style="font-size:12px;height:38px;padding:0 16px;color:var(--color-text-light);border-color:rgba(241,233,218,.35);">
            @glampinnvalley ↗
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
     CATEGORY TABS & GALLERY GRID
     ========================================================================= -->
<section style="padding:clamp(40px,6vw,80px) 0 clamp(80px,12vw,140px);">
  <div style="max-width:1440px;margin:0 auto;padding:0 clamp(20px,5vw,64px);">
    <!-- Filter Tabs -->
    <div style="display:flex;flex-wrap:wrap;gap:10px;justify-content:center;margin-bottom:clamp(32px,5vw,56px);" role="tablist">
      <button class="giv-filter-btn giv-gallery-filter active" data-cat="all" type="button">All (<?= count($gallery_items) ?>)</button>
      <button class="giv-filter-btn giv-gallery-filter" data-cat="domes" type="button">The Domes</button>
      <button class="giv-filter-btn giv-gallery-filter" data-cat="pool" type="button">Infinity Pool</button>
      <button class="giv-filter-btn giv-gallery-filter" data-cat="views" type="button">Decks &amp; Views</button>
      <button class="giv-filter-btn giv-gallery-filter" data-cat="dining" type="button">Dining &amp; Bonfire</button>
      <button class="giv-filter-btn giv-gallery-filter" data-cat="events" type="button">Celebrations</button>
    </div>

    <!-- Gallery Grid -->
    <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(min(100%,300px),1fr));gap:clamp(16px,2vw,28px);" id="galleryGrid">
      <?php foreach ($gallery_items as $item): ?>
        <figure class="giv-gallery-item" data-cat="<?= $item['cat'] ?>" style="margin:0;position:relative;cursor:pointer;overflow:hidden;border-radius:var(--radius-md);">
          <img src="<?= $item['src'] ?>" alt="<?= htmlspecialchars($item['alt']) ?>" loading="lazy" class="plate" style="aspect-ratio:4/3;" data-lightbox>
          <figcaption style="margin-top:8px;font-size:13px;color:var(--color-text-secondary);display:flex;justify-content:space-between;align-items:baseline;">
            <span style="font-family:var(--font-heading);font-size:16px;color:var(--color-text);"><?= $item['title'] ?></span>
            <span style="font-size:11px;letter-spacing:.1em;text-transform:uppercase;color:var(--color-accent);"><?= ucfirst($item['cat']) ?></span>
          </figcaption>
        </figure>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<script>
// Filter script for gallery.php
document.addEventListener('DOMContentLoaded', () => {
  const filterBtns = document.querySelectorAll('.giv-gallery-filter');
  const items = document.querySelectorAll('.giv-gallery-item');

  filterBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      filterBtns.forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
      const cat = btn.dataset.cat;

      items.forEach(it => {
        if (cat === 'all' || it.dataset.cat === cat) {
          it.style.display = '';
        } else {
          it.style.display = 'none';
        }
      });
    });
  });
});
</script>

<!-- Mobile Sticky Booking Bar -->
<?php require __DIR__ . '/includes/booking-bar.php'; ?>

<!-- Master Footer -->
<?php
$footer_kicker = 'Reserve your dome';
$footer_title = 'Experience the valley in person.';
require __DIR__ . '/includes/footer.php';
?>
