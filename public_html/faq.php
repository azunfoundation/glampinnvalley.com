<?php
/**
 * Glamp Inn Valley - FAQ & Policies Page
 * Categorized Accordions covering bookings, stay rules, dining, and packing advice.
 */
require_once __DIR__ . '/includes/config.php';
$svg_paths = require __DIR__ . '/includes/svg-paths.php';

$page_title = 'Frequently Asked Questions & Policies';
$page_description = 'Find answers to common questions about reservations, check-in policies, dome amenities, infinity pool access, dining, and packing advice.';
$active_nav = 'faq';
$is_dark_hero = true;

$faq_categories = [
    'Bookings & Payments' => [
        [
            'q' => 'How do I reserve a dome at Glamp Inn Valley?',
            'a' => 'You can reserve directly via our WhatsApp Concierge (' . PHONE_DISPLAY . ') or by clicking the reservation buttons across the site. A 50% advance payment is required to hold and confirm your chosen dates, with the balance payable upon arrival.'
        ],
        [
            'q' => 'What payment methods do you accept?',
            'a' => 'We accept all major UPI apps (Google Pay, PhonePe, Paytm), Credit/Debit cards (Visa, MasterCard, RuPay), and direct NEFT/IMPS bank transfers.'
        ],
        [
            'q' => 'Where can I view the official Tariff Card and Photo Galleries?',
            'a' => 'You can access our official Domes Tariff Card PDF directly via Google Drive at: <a href="' . DRIVE_TARIFF_URL . '" target="_blank" rel="noopener" style="color:var(--color-accent);text-decoration:underline;">Domes Tariff Card (PDF)</a>. For visitor photography, view our <a href="' . DRIVE_GALLERY_URL . '" target="_blank" rel="noopener" style="color:var(--color-accent);text-decoration:underline;">Photo Gallery</a> and our <a href="' . DRIVE_ACTIVITIES_GALLERY_URL . '" target="_blank" rel="noopener" style="color:var(--color-accent);text-decoration:underline;">Activities Photo Gallery</a>.'
        ],
        [
            'q' => 'What is the cancellation and refund policy?',
            'a' => 'Reservations cancelled 7 days or more before scheduled check-in receive a 100% full refund. Cancellations made between 7 days and 72 hours before arrival receive a 50% refund. Cancellations within 72 hours of check-in are non-refundable.'
        ],
        [
            'q' => 'What defines Weekday vs. Weekend rates?',
            'a' => 'Weekday rates apply for stays from Monday afternoon through Friday morning (Monday–Thursday nights). Weekend rates apply for Friday, Saturday, and Sunday nights, as well as designated public holiday periods.'
        ]
    ],
    'Check-in & Occupancy Guidelines' => [
        [
            'q' => 'What are the check-in and check-out timings?',
            'a' => 'Standard check-in is at ' . CHECKIN_TIME . ' and check-out is by ' . CHECKOUT_TIME . '. Early check-in or late check-out is subject to dome availability and prior confirmation with our property concierge.'
        ],
        [
            'q' => 'What are the charges for children and extra guests?',
            'a' => 'Children under 3 years of age stay complimentary with parents. For children aged 3–12 years: ₹2,000/- per night on Weekdays (Mon–Thu) and ₹2,500/- per night on Weekends (Fri–Sun). For extra adults: ₹2,000/- per night on Weekdays and ₹2,500/- per night on Weekends.'
        ],
        [
            'q' => 'What identification documents are required?',
            'a' => 'In accordance with local hospitality regulations, all adult guests must present a valid government-issued photo ID (Aadhar Card, Passport, or Driver\'s License) during check-in.'
        ],
        [
            'q' => 'Are pets allowed at the property?',
            'a' => 'To safeguard indigenous wildlife corridors and avoid disturbing the resident peafowl and birds in the Vikarabad forest reserve, pets are not permitted at Glamp Inn Valley.'
        ]
    ],
    'Pool, Attire & Weather Policies' => [
        [
            'q' => 'Is there a mandatory swimming pool attire policy?',
            'a' => 'Yes. ' . POOL_POLICY_NOTE
        ],
        [
            'q' => 'What happens to outdoor activities if it rains?',
            'a' => 'As a safety precaution: ' . WEATHER_POLICY_NOTE . '. In case of rainfall, indoor board games, covered deck relaxation, and cozy dining setups remain fully operational.'
        ],
        [
            'q' => 'What is the climate like in the Vikarabad Hills and what should I pack?',
            'a' => 'Sitting at approximately 650 meters elevation, the Vikarabad ridge is typically 3–5°C cooler than Hyderabad city with gentle hill breezes. We recommend packing proper nylon swimwear for the infinity pool, comfortable walking shoes for guided morning treks, and a light jacket for cool evenings around the bonfire.'
        ]
    ],
    'Activities, Packages & Dining' => [
        [
            'q' => 'What is included in the All-Together Active Package?',
            'a' => 'Our All-Together Active Package bundles 4 signature hill adventures for just ₹1,199/- per person (individual total ₹1,594/-; you save ₹395!). It includes Archery (10 shots), Target Shooting (10 shots), Horse ride (15 mins), and Jungle Safari (1 hour). If you prefer taking individual activities separately, each costs ₹399/- per person.'
        ],
        [
            'q' => 'What stay inclusions are complimentary?',
            'a' => 'Every dome booking includes 12 complimentary features: Fresh Breakfast for two, Hi-Tea, Evening Snacks, Access to Common Infinity Pool, Access to Horse Ranch, Morning Guided Trekking to 400-year-old Bhiravakona temple, Evening Musical Bonfire, Board Games, continuous RO Purified Water, Trampoline for children, Kids Play Area, and high-power Telescope for Moongazing.'
        ],
        [
            'q' => 'What curated dining and bespoke add-ons can be booked?',
            'a' => 'You can pre-book Floating Breakfast on the infinity pool (₹2,000/- for 2 adults), Candle Light Dinner Setup under lantern-lit trees (₹1,500/-), Private Bonfire beside your dome (₹1,000/-), Tabletop Barbecue Setup (₹900/-), Standalone Safari Ride (₹550/- per head), and Horse Riding (₹400/- per head).'
        ]
    ],
    'WhatsApp Community & Perks' => [
        [
            'q' => 'What is the Glampinn-Valley WhatsApp Community and how do I join?',
            'a' => 'The Glampinn-Valley Community is our exclusive WhatsApp group where members receive: Last Minute Booking Updates, Exclusive Promo Offers, Upcoming Stargazing &amp; Musical Events, Collaborations, Corporate Discounts, and Customer Stories. You can join free anytime at: <a href="' . WHATSAPP_COMMUNITY_URL . '" target="_blank" rel="noopener" style="color:var(--color-accent);text-decoration:underline;">Join WhatsApp Community</a>.'
        ],
        [
            'q' => 'How far is Glamp Inn Valley from Hyderabad and how do we reach?',
            'a' => 'Glamp Inn Valley is located in Vikarabad (Sy.no 50, Thirmalapur Village, Pudur Mandal), approximately 75 km (~2 hours driving) west of Hyderabad via the Chevella Road (NH 163). Navigate directly using Google Maps: <a href="' . MAPS_URL . '" target="_blank" rel="noopener" style="color:var(--color-accent);text-decoration:underline;">Open in Google Maps</a>.'
        ]
    ]
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
      <span style="display:block;width:36px;height:1px;background:var(--color-accent-gold);"></span>Guest Information
    </p>
    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(min(100%,320px),1fr));gap:clamp(20px,4vw,56px);align-items:end;">
      <h1 style="margin:0;font-family:var(--font-heading);font-weight:300;font-size:clamp(48px,7.4vw,112px);line-height:.94;letter-spacing:-.025em;text-wrap:balance;">
        Everything you need <em style="font-style:italic;color:var(--color-accent-gold);">to know.</em>
      </h1>
      <p style="margin:0 0 clamp(6px,1vw,16px);max-width:42ch;font-size:clamp(15px,1.15vw,18px);line-height:1.6;color:var(--color-text-light-soft);text-wrap:pretty;">
        From reservation terms and check-in guidance to dome amenities, pool hours, and seasonal packing tips for your stay in the Vikarabad Hills.
      </p>
    </div>
  </div>

  <svg viewBox="0 0 1440 90" preserveAspectRatio="none" aria-hidden="true" style="display:block;width:100%;height:clamp(40px,6vw,90px);margin-top:clamp(40px,6vh,80px);margin-bottom:-1px;background:#1f3b34;">
    <path d="M0 90 L0 62 C120 48 200 30 320 36 C420 41 470 60 560 52 C660 43 720 14 840 20 C940 25 990 52 1090 48 C1190 44 1250 24 1330 28 C1380 31 1410 44 1440 50 L1440 90 Z" fill="#f3efe6"></path>
  </svg>
</section>

<!-- =========================================================================
     CATEGORIZED FAQ ACCORDIONS
     ========================================================================= -->
<section style="padding:clamp(56px,8vw,110px) 0;">
  <div style="max-width:1040px;margin:0 auto;padding:0 clamp(20px,5vw,64px);">
    <?php foreach ($faq_categories as $catTitle => $items): ?>
      <div style="margin-bottom:clamp(40px,6vw,64px);">
        <h2 style="font-family:var(--font-heading);font-size:clamp(28px,3.2vw,40px);font-weight:400;margin-bottom:20px;border-bottom:1px solid var(--color-border-dark);padding-bottom:12px;color:var(--color-text);">
          <?= $catTitle ?>
        </h2>
        <div style="display:flex;flex-direction:column;gap:12px;">
          <?php foreach ($items as $item): ?>
            <details style="background:#ffffff;border:1px solid var(--color-border-dark-subtle);border-radius:var(--radius-md);padding:18px 22px;transition:border-color 0.2s ease;">
              <summary style="font-family:var(--font-heading);font-size:21px;font-weight:500;color:var(--color-text);cursor:pointer;list-style:none;display:flex;justify-content:space-between;align-items:center;">
                <span><?= htmlspecialchars($item['q']) ?></span>
                <span style="color:var(--color-accent);font-size:22px;line-height:1;margin-left:14px;">+</span>
              </summary>
              <div style="margin-top:14px;padding-top:14px;border-top:1px solid var(--color-border-dark-subtle);font-size:15px;color:var(--color-text-muted);line-height:1.7;">
                <?= $item['a'] ?>
              </div>
            </details>
          <?php endforeach; ?>
        </div>
      </div>
    <?php endforeach; ?>

    <!-- Still have questions? -->
    <div style="margin-top:clamp(48px,7vw,80px);background:#ffffff;border:1px solid var(--color-border-dark);border-radius:var(--radius-md);padding:clamp(28px,5vw,48px);text-align:center;">
      <h3 style="margin:0 0 12px;font-family:var(--font-heading);font-size:32px;font-weight:400;">
        Have a specific question?
      </h3>
      <p style="margin:0 0 24px;font-size:15px;color:var(--color-text-secondary);max-width:52ch;margin-left:auto;margin-right:auto;">
        Our property manager is available to assist with special dietary needs, group buyouts, custom celebrations, or transport arrangements.
      </p>
      <div style="display:flex;flex-wrap:wrap;gap:14px;justify-content:center;">
        <a href="<?= htmlspecialchars(get_whatsapp_url("Hi Glamp Inn Valley, I have a question regarding my stay.")) ?>" target="_blank" rel="noopener" class="giv-btn-gold" style="color:#1d2a26;border-color:var(--color-accent);color:var(--color-accent);">
          Ask on WhatsApp
        </a>
        <a href="tel:<?= PHONE_RAW ?>" class="giv-btn-outline">
          Call <?= PHONE_DISPLAY ?>
        </a>
      </div>
    </div>
  </div>
</section>

<!-- Mobile Sticky Booking Bar -->
<?php require __DIR__ . '/includes/booking-bar.php'; ?>

<!-- Master Footer -->
<?php
$footer_kicker = 'Ready for the valley?';
$footer_title = 'The valley is closer than you think.';
require __DIR__ . '/includes/footer.php';
?>
