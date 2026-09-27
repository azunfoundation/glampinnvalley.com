<?php
/**
 * Glamp Inn Valley - Contact Us
 * Direct concierge channels, property address, contact inquiry form, and Google Maps.
 */
if (session_status() === PHP_SESSION_NONE && !headers_sent()) {
    session_start();
}
require_once __DIR__ . '/includes/config.php';
$svg_paths = require __DIR__ . '/includes/svg-paths.php';

$page_title = 'Contact Us';
$page_description = 'Get in touch with Glamp Inn Valley. Direct property phone, WhatsApp, email, reservation inquiry form, and Google Maps directions to our Vikarabad sanctuary.';
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
        $form_error = 'Invalid security token. Please refresh and try again.';
    }
    // 2. Honeypot check
    elseif (!empty($_POST['website_url'])) {
        $form_error = 'Spam submission detected.';
    } else {
        $first_name = trim(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $last_name  = trim(filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $phone      = trim(filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $email      = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
        $message    = trim(filter_input(INPUT_POST, 'message', FILTER_SANITIZE_FULL_SPECIAL_CHARS));

        $full_name = trim($first_name . ' ' . $last_name);

        if (empty($first_name) || empty($phone)) {
            $form_error = 'Please enter both your name and phone number.';
        } else {
            // Send email notification via PHP mail()
            $to = CONTACT_EMAIL;
            $subject = "New Contact Inquiry from {$full_name} - Glamp Inn Valley";
            $email_body = "Name: {$full_name}\n"
                        . "Phone: {$phone}\n"
                        . "Email: " . ($email ?: 'Not provided') . "\n"
                        . "Message: " . ($message ?: 'None') . "\n"
                        . "Date: " . date('Y-m-d H:i:s') . "\n";
            $headers = "From: " . CONTACT_EMAIL . "\r\n";
            if (!empty($email)) {
                $headers .= "Reply-To: {$email}\r\n";
            }
            $headers .= "X-Mailer: PHP/" . phpversion();

            @mail($to, $subject, $email_body, $headers);

            $form_success = true;
            // Refresh token
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
      <span style="display:block;width:36px;height:1px;background:var(--color-accent-gold);"></span>Direct Concierge
    </p>
    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(min(100%,320px),1fr));gap:clamp(20px,4vw,56px);align-items:end;">
      <h1 style="margin:0;font-family:var(--font-heading);font-weight:300;font-size:clamp(48px,7.4vw,104px);line-height:.96;letter-spacing:-.025em;text-wrap:balance;">
        Contact <em style="font-style:italic;color:var(--color-accent-gold);">Us</em>
      </h1>
      <p style="margin:0 0 clamp(6px,1vw,16px);max-width:44ch;font-size:clamp(16px,1.2vw,20px);line-height:1.6;color:var(--color-text-light-soft);font-family:var(--font-heading);font-style:italic;">
        Let us guide you in crafting your perfect experience amid nature’s elegance.
      </p>
    </div>
  </div>

  <svg viewBox="0 0 1440 90" preserveAspectRatio="none" aria-hidden="true" style="display:block;width:100%;height:clamp(40px,6vw,90px);margin-top:clamp(40px,6vh,80px);margin-bottom:-1px;background:#1f3b34;">
    <path d="M0 90 L0 62 C120 48 200 30 320 36 C420 41 470 60 560 52 C660 43 720 14 840 20 C940 25 990 52 1090 48 C1190 44 1250 24 1330 28 C1380 31 1410 44 1440 50 L1440 90 Z" fill="#f3efe6"></path>
  </svg>
</section>

<!-- =========================================================================
     WELCOME & CONTACT CHANNELS (RECREATION OF OLD SITE HERO BANNER)
     ========================================================================= -->
<section style="padding:clamp(56px,8vw,100px) 0;position:relative;">
  <div style="max-width:1440px;margin:0 auto;padding:0 clamp(20px,5vw,64px);">
    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(min(100%,340px),1fr));gap:clamp(32px,5vw,64px);align-items:center;">

      <!-- Left Card: Welcome Message with Brand Mark -->
      <div style="background:#ffffff;border:1px solid var(--color-border-dark-subtle);border-radius:var(--radius-md);padding:clamp(32px,5vw,48px);box-shadow:var(--shadow-sm);position:relative;overflow:hidden;">
        <div style="margin-bottom:24px;display:flex;align-items:center;gap:16px;">
          <img src="assets/images/logo-1.webp" alt="Glamp Inn Valley" style="height:56px;width:auto;display:block;">
          <div>
            <div style="font-family:var(--font-heading);font-size:22px;color:var(--color-text);font-weight:400;letter-spacing:.05em;">GLAMP INN VALLEY</div>
            <div style="font-size:11px;letter-spacing:.18em;text-transform:uppercase;color:var(--color-accent);font-weight:600;">Vikarabad Hills · Telangana</div>
          </div>
        </div>

        <blockquote style="margin:0;font-size:clamp(15px,1.05vw,17px);line-height:1.8;color:var(--color-text-muted);font-style:normal;border-left:3px solid var(--color-accent-gold);padding-left:20px;">
          “Welcome to Glamp Inn Valley’s contact page! We’re thrilled you’re here. Our dedicated team is ready to assist you with any inquiries, reservations, or special requests. Feel free to reach out, and let us help you embark on your unforgettable staycation with us.”
        </blockquote>

        <div style="margin-top:28px;display:flex;flex-wrap:wrap;gap:12px;">
          <a href="<?= htmlspecialchars(get_booking_url()) ?>" target="_blank" rel="noopener" class="giv-btn-gold">
            Book on WhatsApp
          </a>
          <a href="contact.php" class="giv-btn-outline">
            Driving Directions &amp; Route
          </a>
        </div>
      </div>

      <!-- Right Card: Contact Channels with Circular Badges -->
      <div style="display:flex;flex-direction:column;gap:20px;">

        <!-- 1. WhatsApp -->
        <a href="<?= htmlspecialchars(get_whatsapp_url('Hi Glamp Inn Valley Concierge, I would like to inquire about staying at your resort.')) ?>" target="_blank" rel="noopener" style="background:#ffffff;border:1px solid var(--color-border-dark-subtle);border-radius:var(--radius-md);padding:22px 24px;display:grid;grid-template-columns:56px 1fr;gap:20px;align-items:center;text-decoration:none;transition:transform .2s ease,border-color .2s ease;box-shadow:var(--shadow-sm);" onmouseover="this.style.borderColor='var(--color-accent)'" onmouseout="this.style.borderColor='var(--color-border-dark-subtle)'">
          <div style="width:56px;height:56px;border-radius:50%;border:2px solid var(--color-accent);display:flex;align-items:center;justify-content:center;color:var(--color-accent);flex-shrink:0;background:rgba(182,130,53,.06);">
            <!-- Phone Icon -->
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
          </div>
          <div>
            <div style="font-size:12px;letter-spacing:.18em;text-transform:uppercase;color:var(--color-accent);font-weight:600;margin-bottom:4px;">WhatsApp &amp; Call</div>
            <div style="font-family:var(--font-heading);font-size:24px;color:var(--color-text);line-height:1.2;"><?= PHONE_DISPLAY ?></div>
            <div style="font-size:13px;color:var(--color-text-secondary);margin-top:4px;">Tap to message our 24/7 property concierge</div>
          </div>
        </a>

        <!-- 2. Mail -->
        <a href="mailto:<?= CONTACT_EMAIL ?>" style="background:#ffffff;border:1px solid var(--color-border-dark-subtle);border-radius:var(--radius-md);padding:22px 24px;display:grid;grid-template-columns:56px 1fr;gap:20px;align-items:center;text-decoration:none;transition:transform .2s ease,border-color .2s ease;box-shadow:var(--shadow-sm);" onmouseover="this.style.borderColor='var(--color-accent)'" onmouseout="this.style.borderColor='var(--color-border-dark-subtle)'">
          <div style="width:56px;height:56px;border-radius:50%;border:2px solid var(--color-accent);display:flex;align-items:center;justify-content:center;color:var(--color-accent);flex-shrink:0;background:rgba(182,130,53,.06);">
            <!-- Mail Icon -->
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
          </div>
          <div>
            <div style="font-size:12px;letter-spacing:.18em;text-transform:uppercase;color:var(--color-accent);font-weight:600;margin-bottom:4px;">Mail</div>
            <div style="font-family:var(--font-heading);font-size:22px;color:var(--color-text);line-height:1.2;word-break:break-all;"><?= CONTACT_EMAIL ?></div>
            <div style="font-size:13px;color:var(--color-text-secondary);margin-top:4px;">Inquiries, corporate retreats &amp; event requests</div>
          </div>
        </a>

        <!-- 3. Address -->
        <div style="background:#ffffff;border:1px solid var(--color-border-dark-subtle);border-radius:var(--radius-md);padding:22px 24px;display:grid;grid-template-columns:56px 1fr;gap:20px;align-items:center;box-shadow:var(--shadow-sm);">
          <div style="width:56px;height:56px;border-radius:50%;border:2px solid var(--color-accent);display:flex;align-items:center;justify-content:center;color:var(--color-accent);flex-shrink:0;background:rgba(182,130,53,.06);">
            <!-- Map Pin Icon -->
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"/><circle cx="12" cy="10" r="3"/></svg>
          </div>
          <div>
            <div style="font-size:12px;letter-spacing:.18em;text-transform:uppercase;color:var(--color-accent);font-weight:600;margin-bottom:4px;">Address</div>
            <div style="font-size:15px;color:var(--color-text);line-height:1.6;"><?= SITE_ADDRESS ?></div>
            <a href="<?= MAPS_URL ?>" target="_blank" rel="noopener" style="font-size:13px;color:var(--color-accent);text-decoration:underline;margin-top:4px;display:inline-block;">
              Open in Google Maps ↗
            </a>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>

<!-- =========================================================================
     LET'S CONNECT - INQUIRY FORM SECTION
     ========================================================================= -->
<section style="background:#ffffff;padding:clamp(64px,9vw,110px) 0;border-top:1px solid var(--color-border-dark-subtle);border-bottom:1px solid var(--color-border-dark-subtle);">
  <div style="max-width:880px;margin:0 auto;padding:0 clamp(20px,5vw,48px);">

    <div style="text-align:center;margin-bottom:clamp(36px,5vw,56px);">
      <p style="margin:0 0 14px;font-size:12px;letter-spacing:.24em;text-transform:uppercase;color:var(--color-accent);">Get In Touch</p>
      <h2 style="margin:0 0 14px;font-family:var(--font-heading);font-weight:300;font-size:clamp(38px,5vw,64px);line-height:1.02;letter-spacing:-.01em;">
        LET’S CONNECT
      </h2>
      <p style="margin:0 auto;max-width:48ch;font-size:15px;color:var(--color-text-secondary);line-height:1.65;">
        Have a question or planning a retreat? Leave us a message below and our team will get back to you shortly.
      </p>
    </div>

    <!-- Feedback messages -->
    <?php if ($form_success): ?>
      <div style="padding:20px;background:#e2efe6;color:#1e4c2e;border:1px solid #c2e0cb;border-radius:var(--radius-md);margin-bottom:28px;font-size:15px;line-height:1.6;box-shadow:var(--shadow-sm);">
        <strong style="display:block;font-size:17px;margin-bottom:6px;">Thank you! Your message has been sent successfully.</strong>
        We have received your details. For immediate assistance or instantaneous dome reservations, you may also message our team directly on WhatsApp.
        <div style="margin-top:14px;">
          <a href="<?= htmlspecialchars(get_whatsapp_url('Hi Glamp Inn Valley, I just submitted an inquiry on your Contact Us page.')) ?>" target="_blank" rel="noopener" class="giv-btn-gold" style="color:#1d2a26;border-color:var(--color-accent);color:var(--color-accent);height:40px;font-size:14px;">
            Open WhatsApp Concierge
          </a>
        </div>
      </div>
    <?php endif; ?>

    <?php if (!empty($form_error)): ?>
      <div style="padding:16px 20px;background:#faeae8;color:#8f201d;border:1px solid #f2c7c5;border-radius:var(--radius-md);margin-bottom:28px;font-size:15px;">
        <?= htmlspecialchars($form_error) ?>
      </div>
    <?php endif; ?>

    <!-- Interactive Form -->
    <div style="background:var(--color-bg);padding:clamp(28px,5vw,48px);border-radius:var(--radius-md);border:1px solid var(--color-border-dark);box-shadow:var(--shadow-sm);">
      <form method="POST" action="contact-us.php">
        <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']) ?>">
        
        <!-- Spam honeypot -->
        <div style="display:none;" aria-hidden="true">
          <input type="text" name="website_url" tabindex="-1" autocomplete="off">
        </div>

        <div class="giv-form-row-2col">
          <div class="giv-form-group">
            <label for="name" class="giv-label">Name *</label>
            <input type="text" id="name" name="name" class="giv-input" required placeholder="First Name">
          </div>
          <div class="giv-form-group">
            <label for="last_name" class="giv-label">Last Name</label>
            <input type="text" id="last_name" name="last_name" class="giv-input" placeholder="Last Name">
          </div>
        </div>

        <div class="giv-form-row-2col">
          <div class="giv-form-group">
            <label for="phone" class="giv-label">Phone Number *</label>
            <input type="tel" id="phone" name="phone" class="giv-input" required placeholder="+91 98765 43210">
          </div>
          <div class="giv-form-group">
            <label for="email" class="giv-label">Email</label>
            <input type="email" id="email" name="email" class="giv-input" placeholder="your.name@example.com">
          </div>
        </div>

        <div class="giv-form-group">
          <label for="message" class="giv-label">Message</label>
          <textarea id="message" name="message" class="giv-textarea" rows="4" placeholder="How can our team help you? Let us know about special occasions, group dates, or inquiries..."></textarea>
        </div>

        <button type="submit" class="giv-btn-gold" style="width:100%;height:52px;font-size:18px;color:#1d2a26;border-color:var(--color-accent);color:var(--color-accent);cursor:pointer;margin-top:10px;">
          Submit
        </button>
      </form>
    </div>

  </div>
</section>

<!-- =========================================================================
     GOOGLE MAPS EMBED SECTION
     ========================================================================= -->
<section style="padding:clamp(56px,8vw,100px) 0;position:relative;">
  <div style="max-width:1440px;margin:0 auto;padding:0 clamp(20px,5vw,64px);">
    <div style="display:flex;flex-wrap:wrap;justify-content:space-between;align-items:end;gap:20px;margin-bottom:28px;">
      <div>
        <p style="margin:0 0 10px;font-size:12px;letter-spacing:.24em;text-transform:uppercase;color:var(--color-accent);">Location &amp; Coordinates</p>
        <h2 style="margin:0;font-family:var(--font-heading);font-weight:300;font-size:clamp(32px,4vw,52px);line-height:1.05;">
          Find Us in Vikarabad
        </h2>
      </div>
      <div style="display:flex;flex-wrap:wrap;gap:12px;">
        <a href="<?= MAPS_URL ?>" target="_blank" rel="noopener" class="giv-btn-gold" style="color:#1d2a26;border-color:var(--color-accent);color:var(--color-accent);">
          Open Full Google Maps ↗
        </a>
        <a href="contact.php" class="giv-btn-outline">
          Step-by-Step Directions
        </a>
      </div>
    </div>

    <!-- Responsive Iframe Container -->
    <div style="width:100%;height:clamp(360px,50vh,520px);border-radius:var(--radius-md);overflow:hidden;border:1px solid var(--color-border-dark);box-shadow:var(--shadow-md);background:#eaeaea;">
      <iframe 
        src="https://maps.google.com/maps?q=GlampInn-Valley&t=m&z=11&output=embed&iwloc=near" 
        width="100%" 
        height="100%" 
        style="border:0;display:block;" 
        allowfullscreen="" 
        loading="lazy" 
        referrerpolicy="no-referrer-when-downgrade"
        title="Glamp Inn Valley Location Map">
      </iframe>
    </div>
  </div>
</section>

<!-- Mobile Sticky Booking Bar -->
<?php require __DIR__ . '/includes/booking-bar.php'; ?>

<!-- Master Footer -->
<?php
$footer_kicker = 'Plan your escape';
$footer_title = 'The valley is closer than you think.';
require __DIR__ . '/includes/footer.php';
?>
