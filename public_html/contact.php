<?php
/**
 * Glamp Inn Valley - Getting Here & Contact Page
 * Comprehensive travel guide from Hyderabad, route map, and secure inquiry form.
 */
if (session_status() === PHP_SESSION_NONE && !headers_sent()) {
    session_start();
}
require_once __DIR__ . '/includes/config.php';
$svg_paths = require __DIR__ . '/includes/svg-paths.php';

$page_title = 'Getting Here & Contact';
$page_description = 'Directions from Hyderabad to Glamp Inn Valley in the Vikarabad Hills. Route details, Google Maps, contact information, and reservation inquiries.';
$active_nav = 'contact';
$is_dark_hero = true;

// CSRF Token setup
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

$form_success = false;
$form_error = '';

if (($_SERVER['REQUEST_METHOD'] ?? '') === 'POST') {
    // 1. Check CSRF
    $token = $_POST['csrf_token'] ?? '';
    if (!hash_equals($_SESSION['csrf_token'], $token)) {
        $form_error = 'Invalid security token. Please try again.';
    }
    // 2. Honeypot check
    elseif (!empty($_POST['website_url'])) {
        $form_error = 'Spam submission detected.';
    } else {
        $name = trim(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
        $phone = trim(filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $dates = trim(filter_input(INPUT_POST, 'dates', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $tier = trim(filter_input(INPUT_POST, 'tier', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $message = trim(filter_input(INPUT_POST, 'message', FILTER_SANITIZE_FULL_SPECIAL_CHARS));

        if (empty($name) || empty($phone)) {
            $form_error = 'Please enter both your name and phone number.';
        } else {
            // Send email notification via PHP mail()
            $to = CONTACT_EMAIL;
            $subject = "New Stay Inquiry from {$name} - Glamp Inn Valley";
            $email_body = "Name: {$name}\nPhone: {$phone}\nEmail: {$email}\nPreferred Dates: {$dates}\nDome Tier: {$tier}\nMessage: {$message}\nDate: " . date('Y-m-d H:i:s');
            $headers = "From: " . CONTACT_EMAIL . "\r\nReply-To: {$email}\r\nX-Mailer: PHP/" . phpversion();

            @mail($to, $subject, $email_body, $headers);

            $form_success = true;
            // Generate a refreshed token
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }
    }
}

require __DIR__ . '/includes/header.php';
?>

<!-- =========================================================================
     PAGE HERO
     ========================================================================= -->
<section style="position:relative;background:linear-gradient(180deg,#0f1f23 0%,#1f3b34 100%);color:var(--color-text-light);overflow:hidden;padding:clamp(130px,18vh,190px) 0 0;">
  <div aria-hidden="true" style="position:absolute;inset:0;background-image:radial-gradient(circle,rgba(241,233,218,.6) 0 1px,transparent 1.6px),radial-gradient(circle,rgba(217,169,98,.5) 0 1px,transparent 1.7px);background-size:230px 230px,410px 410px;background-position:40px 20px,180px 100px;mask-image:linear-gradient(180deg,#000 0%,transparent 80%);-webkit-mask-image:linear-gradient(180deg,#000 0%,transparent 80%);"></div>

  <div style="position:relative;max-width:1440px;margin:0 auto;padding:0 clamp(20px,5vw,64px);">
    <p style="margin:0 0 20px;display:flex;align-items:center;gap:14px;font-size:12px;letter-spacing:.24em;text-transform:uppercase;color:var(--color-accent-gold);">
      <span style="display:block;width:36px;height:1px;background:var(--color-accent-gold);"></span>Getting Here &amp; Concierge
    </p>
    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(min(100%,320px),1fr));gap:clamp(20px,4vw,56px);align-items:end;">
      <h1 style="margin:0;font-family:var(--font-heading);font-weight:300;font-size:clamp(48px,7.4vw,112px);line-height:.94;letter-spacing:-.025em;text-wrap:balance;">
        Two hours from Hyderabad. <em style="font-style:italic;color:var(--color-accent-gold);">A world away.</em>
      </h1>
      <p style="margin:0 0 clamp(6px,1vw,16px);max-width:42ch;font-size:clamp(15px,1.15vw,18px);line-height:1.6;color:var(--color-text-light-soft);text-wrap:pretty;">
        Leave the city after lunch, drive west past Chevella into the hills, and arrive in time for sunset tea on your private deck.
      </p>
    </div>
  </div>

  <svg viewBox="0 0 1440 90" preserveAspectRatio="none" aria-hidden="true" style="display:block;width:100%;height:clamp(40px,6vw,90px);margin-top:clamp(40px,6vh,80px);margin-bottom:-1px;background:#1f3b34;">
    <path d="M0 90 L0 62 C120 48 200 30 320 36 C420 41 470 60 560 52 C660 43 720 14 840 20 C940 25 990 52 1090 48 C1190 44 1250 24 1330 28 C1380 31 1410 44 1440 50 L1440 90 Z" fill="#f3efe6"></path>
  </svg>
</section>

<!-- =========================================================================
     DIRECTIONS & SCHEMATIC ROUTE MAP
     ========================================================================= -->
<section style="padding:clamp(56px,8vw,110px) 0;position:relative;">
  <div style="max-width:1440px;margin:0 auto;padding:0 clamp(20px,5vw,64px);">
    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(min(100%,340px),1fr));gap:clamp(32px,5vw,80px);align-items:center;">
      <!-- Schematic Road Map -->
      <div style="background:#ffffff;padding:clamp(20px,4vw,36px);border-radius:var(--radius-md);border:1px solid var(--color-border-dark-subtle);box-shadow:var(--shadow-sm);">
        <svg viewBox="0 0 400 400" aria-hidden="true" style="width:100%;height:auto;display:block;">
          <path d="M40 330 C80 320 90 260 130 250 C180 238 200 200 240 180 C280 160 300 120 350 96" fill="none" stroke="#2f5a4c" stroke-width="1.2" stroke-dasharray="3 5"></path>
          <path d="M20 360 C90 340 150 300 210 310 C270 320 320 290 380 300" fill="none" stroke="#b68235" stroke-width=".8" opacity=".6"></path>
          <path d="M60 130 C110 100 150 120 200 90 C250 60 300 80 360 50" fill="none" stroke="#b68235" stroke-width=".8" opacity=".35"></path>
          <circle cx="40" cy="330" r="4" fill="#1d2a26"></circle>
          <circle cx="130" cy="250" r="4" fill="#1d2a26"></circle>
          <circle cx="240" cy="180" r="4" fill="#1d2a26"></circle>
          <path d="M336 96 a14 14 0 0 1 28 0 Z" fill="none" stroke="#b68235" stroke-width="1.4"></path>
          <path d="M340 96 L350 82 L360 96 M350 82 L350 96" fill="none" stroke="#b68235" stroke-width=".8"></path>
          <text x="52" y="346" fill="#1d2a26" font-family="Lora, serif" font-size="11" letter-spacing="1.5">HYDERABAD (ORR EXIT 18)</text>
          <text x="140" y="262" fill="#1d2a26" font-family="Lora, serif" font-size="11" letter-spacing="1.5">CHEVELLA</text>
          <text x="250" y="192" fill="#1d2a26" font-family="Lora, serif" font-size="11" letter-spacing="1.5">VIKARABAD</text>
          <text x="350" y="130" text-anchor="middle" fill="#b68235" font-family="Cormorant Garamond, serif" font-size="16" font-style="italic">Glamp Inn Valley</text>
          <text x="350" y="146" text-anchor="middle" fill="#5d6b66" font-family="Lora, serif" font-size="9" letter-spacing="1.5">THIRMALAPUR · PUDUR</text>
          <text x="20" y="385" fill="#8f9c95" font-family="Lora, serif" font-size="9" letter-spacing="1.5">APPROX. 75 KM FROM HYDERABAD · ~2 HOURS</text>
        </svg>
      </div>

      <!-- Step-by-step Route Guidance -->
      <div>
        <p style="margin:0 0 20px;font-size:12px;letter-spacing:.24em;text-transform:uppercase;color:var(--color-accent);">Driving Instructions</p>
        <h2 style="margin:0 0 22px;font-family:var(--font-heading);font-weight:300;font-size:clamp(34px,4vw,56px);line-height:1.05;">
          The route to the ridge.
        </h2>
        <div style="display:flex;flex-direction:column;gap:18px;">
          <div style="display:grid;grid-template-columns:36px 1fr;gap:12px;">
            <span style="font-family:var(--font-heading);font-size:22px;color:var(--color-accent);">01</span>
            <div>
              <strong style="font-size:15px;color:var(--color-text);">Take the Chevella Road (NH 163)</strong>
              <p style="margin:4px 0 0;font-size:14px;color:var(--color-text-muted);">From Gachibowli or Financial District, access the Outer Ring Road (ORR) and take Exit 18 toward Chevella.</p>
            </div>
          </div>
          <div style="display:grid;grid-template-columns:36px 1fr;gap:12px;">
            <span style="font-family:var(--font-heading);font-size:22px;color:var(--color-accent);">02</span>
            <div>
              <strong style="font-size:15px;color:var(--color-text);">Past Chevella into Vikarabad</strong>
              <p style="margin:4px 0 0;font-size:14px;color:var(--color-text-muted);">Drive through scenic agricultural fields and eucalyptus groves (~45 km). Continue on the state highway toward Vikarabad.</p>
            </div>
          </div>
          <div style="display:grid;grid-template-columns:36px 1fr;gap:12px;">
            <span style="font-family:var(--font-heading);font-size:22px;color:var(--color-accent);">03</span>
            <div>
              <strong style="font-size:15px;color:var(--color-text);">Pudur &amp; Thirmalapur Village</strong>
              <p style="margin:4px 0 0;font-size:14px;color:var(--color-text-muted);">Turn toward Pudur Mandal / Thirmalapur Village. A private red-earth pathway winds gently up through the trees to the resort gate.</p>
            </div>
          </div>
        </div>

        <div style="margin-top:32px;display:flex;flex-wrap:wrap;gap:16px;">
          <a href="<?= MAPS_URL ?>" target="_blank" rel="noopener" class="giv-btn-gold" style="height:48px;padding:0 24px;color:#1d2a26;border-color:var(--color-accent);color:var(--color-accent);">
            Open in Google Maps
          </a>
          <a href="tel:<?= PHONE_RAW ?>" class="giv-btn-outline" style="height:48px;padding:0 24px;">
            Call for Directions
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- =========================================================================
     CONTACT DETAILS & RESERVATION INQUIRY FORM
     ========================================================================= -->
<section style="background:#ffffff;padding:clamp(64px,9vw,120px) 0;border-top:1px solid var(--color-border-dark-subtle);">
  <div style="max-width:1440px;margin:0 auto;padding:0 clamp(20px,5vw,64px);">
    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(min(100%,320px),1fr));gap:clamp(32px,5vw,80px);align-items:start;">
      <!-- Contact Details -->
      <div>
        <p style="margin:0 0 20px;font-size:12px;letter-spacing:.24em;text-transform:uppercase;color:var(--color-accent);">Connect</p>
        <h2 style="margin:0 0 20px;font-family:var(--font-heading);font-weight:300;font-size:clamp(34px,4vw,56px);line-height:1.05;">
          Direct Property Concierge
        </h2>
        <p style="margin:0 0 28px;font-size:15px;color:var(--color-text-muted);line-height:1.7;">
          For reservations, corporate retreats, bespoke proposals, or road inquiries, contact our on-site team directly.
        </p>

        <div style="display:flex;flex-direction:column;gap:20px;font-size:15px;border-top:1px solid var(--color-border-dark-subtle);padding-top:24px;">
          <div>
            <div style="font-size:11px;letter-spacing:.14em;text-transform:uppercase;color:var(--color-text-secondary);margin-bottom:4px;">Phone &amp; WhatsApp</div>
            <a href="tel:<?= PHONE_RAW ?>" style="color:var(--color-text);font-family:var(--font-heading);font-size:24px;"><?= PHONE_DISPLAY ?></a>
          </div>
          <div>
            <div style="font-size:11px;letter-spacing:.14em;text-transform:uppercase;color:var(--color-text-secondary);margin-bottom:4px;">WhatsApp Community</div>
            <a href="<?= WHATSAPP_COMMUNITY_URL ?>" target="_blank" rel="noopener" style="color:var(--color-accent);font-weight:500;display:inline-flex;align-items:center;gap:6px;">
              Join Glampinn-Valley Community ↗
            </a>
          </div>
          <div>
            <div style="font-size:11px;letter-spacing:.14em;text-transform:uppercase;color:var(--color-text-secondary);margin-bottom:4px;">Email Inquiries</div>
            <a href="mailto:<?= CONTACT_EMAIL ?>" style="color:var(--color-text);"><?= CONTACT_EMAIL ?></a>
          </div>
          <div>
            <div style="font-size:11px;letter-spacing:.14em;text-transform:uppercase;color:var(--color-text-secondary);margin-bottom:4px;">Property Coordinates</div>
            <span style="color:var(--color-text);"><?= SITE_COORDINATES ?></span>
          </div>
          <div>
            <div style="font-size:11px;letter-spacing:.14em;text-transform:uppercase;color:var(--color-text-secondary);margin-bottom:4px;">Postal Address</div>
            <span style="color:var(--color-text);line-height:1.6;"><?= SITE_ADDRESS ?></span>
          </div>
          <div style="padding-top:10px;border-top:1px dashed var(--color-border-dark-subtle);display:flex;flex-direction:column;gap:8px;font-size:13px;">
            <a href="<?= DRIVE_TARIFF_URL ?>" target="_blank" rel="noopener" style="color:var(--color-accent);display:inline-flex;align-items:center;gap:7px;">
              <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="flex-shrink:0;"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>
              Download Domes Tariff Card (PDF) ↗
            </a>
            <a href="<?= DRIVE_GALLERY_URL ?>" target="_blank" rel="noopener" style="color:var(--color-accent);display:inline-flex;align-items:center;gap:7px;">
              <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="flex-shrink:0;"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
              View Google Drive Photo Gallery ↗
            </a>
            <a href="<?= DRIVE_ACTIVITIES_GALLERY_URL ?>" target="_blank" rel="noopener" style="color:var(--color-accent);display:inline-flex;align-items:center;gap:7px;">
              <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="flex-shrink:0;"><circle cx="12" cy="12" r="10"/><polygon points="16.24 7.76 14.12 14.12 7.76 16.24 9.88 9.88 16.24 7.76"/></svg>
              View Activities Photo Gallery ↗
            </a>
          </div>
        </div>
      </div>

      <!-- Inquiry Form -->
      <div style="background:var(--color-bg);padding:clamp(24px,4vw,40px);border-radius:var(--radius-md);border:1px solid var(--color-border-dark);">
        <h3 style="margin:0 0 10px;font-family:var(--font-heading);font-size:32px;font-weight:400;">
          Send an Inquiry
        </h3>
        <p style="margin:0 0 24px;font-size:14px;color:var(--color-text-secondary);">
          Our retreat manager will respond promptly via WhatsApp or phone.
        </p>

        <?php if ($form_success): ?>
          <div style="padding:18px;background:#e2efe6;color:#1e4c2e;border:1px solid #c2e0cb;border-radius:4px;margin-bottom:20px;font-size:14px;line-height:1.5;">
            <strong>Thank you for reaching out!</strong> Your inquiry has been received. You may also message us immediately on WhatsApp for instant confirmation.
            <div style="margin-top:12px;">
              <a href="<?= htmlspecialchars(get_whatsapp_url()) ?>" target="_blank" rel="noopener" class="giv-btn-outline" style="height:40px;font-size:14px;">
                Open in WhatsApp
              </a>
            </div>
          </div>
        <?php endif; ?>

        <?php if (!empty($form_error)): ?>
          <div style="padding:14px;background:#faeae8;color:#8f201d;border:1px solid #f2c7c5;border-radius:4px;margin-bottom:20px;font-size:14px;">
            <?= htmlspecialchars($form_error) ?>
          </div>
        <?php endif; ?>

        <form method="POST" action="contact.php">
          <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']) ?>">
          <!-- Anti-spam Honeypot -->
          <div style="display:none;" aria-hidden="true">
            <input type="text" name="website_url" tabindex="-1" autocomplete="off">
          </div>

          <div class="giv-form-group">
            <label for="name" class="giv-label">Your Name *</label>
            <input type="text" id="name" name="name" class="giv-input" required placeholder="e.g. Anand Sharma">
          </div>

          <div class="giv-form-row-2col">
            <div class="giv-form-group">
              <label for="phone" class="giv-label">Phone Number *</label>
              <input type="tel" id="phone" name="phone" class="giv-input" required placeholder="+91 98765 43210">
            </div>
            <div class="giv-form-group">
              <label for="email" class="giv-label">Email Address</label>
              <input type="email" id="email" name="email" class="giv-input" placeholder="anand@example.com">
            </div>
          </div>

          <div class="giv-form-row-2col">
            <div class="giv-form-group">
              <label for="dates" class="giv-label">Proposed Dates</label>
              <input type="text" id="dates" name="dates" class="giv-input" placeholder="e.g. Next Weekend">
            </div>
            <div class="giv-form-group">
              <label for="tier" class="giv-label">Dome Preference</label>
              <select id="tier" name="tier" class="giv-select">
                <option value="Twin Valley (₹9,999+)">Twin Valley</option>
                <option value="Nubra / Araku Valley (₹10,499+)">Nubra &amp; Araku</option>
                <option value="Sangla / Silent Valley with Hammock (₹11,499+)">Sangla &amp; Silent</option>
                <option value="Solang / Spiti Signature (₹14,499+)">Solang &amp; Spiti Signature</option>
                <option value="Celebrations / Whole Property">Whole Property / Event</option>
              </select>
            </div>
          </div>

          <div class="giv-form-group">
            <label for="message" class="giv-label">Message / Special Requests</label>
            <textarea id="message" name="message" class="giv-textarea" rows="3" placeholder="Tell us if you are celebrating an anniversary, need floating breakfast, or have dietary preferences..."></textarea>
          </div>

          <button type="submit" class="giv-btn-gold" style="width:100%;height:48px;font-size:17px;color:#1d2a26;border-color:var(--color-accent);color:var(--color-accent);">
            Submit Inquiry
          </button>
        </form>
      </div>
    </div>
  </div>
</section>

<!-- =========================================================================
     WHATSAPP COMMUNITY SPOTLIGHT
     ========================================================================= -->
<section style="padding:clamp(40px,6vw,80px) 0 0;">
  <div style="max-width:1440px;margin:0 auto;padding:0 clamp(20px,5vw,64px);">
    <div style="background:linear-gradient(135deg,#1f3b34 0%,#14262a 100%);color:var(--color-text-light);border-radius:var(--radius-md);padding:clamp(32px,5vw,56px);position:relative;overflow:hidden;box-shadow:var(--shadow-md);">
      <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(min(100%,320px),1fr));gap:clamp(28px,4vw,56px);align-items:center;">
        <div>
          <p style="margin:0 0 14px;font-size:12px;letter-spacing:.24em;text-transform:uppercase;color:var(--color-accent-gold);">Staycation Community</p>
          <h2 style="margin:0 0 16px;font-family:var(--font-heading);font-weight:300;font-size:clamp(32px,4vw,54px);line-height:1.06;">
            Join the Glampinn-Valley Community.
          </h2>
          <p style="margin:0 0 24px;font-size:15px;color:var(--color-text-light-soft);line-height:1.65;max-width:42ch;">
            Get immediate alerts for last-minute booking openings, corporate offsite discounts, exclusive offers, and customer stories.
          </p>
          <a href="<?= WHATSAPP_COMMUNITY_URL ?>" target="_blank" rel="noopener" class="giv-btn-gold">
            Join WhatsApp Community ↗
          </a>
        </div>
        <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(min(100%,160px),1fr));gap:12px;">
          <?php foreach (get_community_benefits_data() as $b): ?>
            <div style="background:rgba(255,255,255,.05);border:1px solid rgba(241,233,218,.14);border-radius:var(--radius-sm);padding:14px;">
              <div style="font-size:20px;margin-bottom:6px;"><?= $b['icon'] ?></div>
              <div style="font-family:var(--font-heading);font-size:16px;color:var(--color-text-light);"><?= htmlspecialchars($b['title']) ?></div>
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
$footer_kicker = 'Plan your journey';
$footer_title = 'The valley is closer than you think.';
require __DIR__ . '/includes/footer.php';
?>
