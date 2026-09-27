<?php
/**
 * Glamp Inn Valley - Privacy Policy
 * Information disclosure, security, data handling, and guest privacy policies.
 */
require_once __DIR__ . '/includes/config.php';
$svg_paths = require __DIR__ . '/includes/svg-paths.php';

$page_title = 'Privacy Policy';
$page_description = 'Learn how Glamp Inn Valley collects, uses, and safeguards personal information when visiting www.glampinnvalley.com or reserving a stay.';
$active_nav = '';
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
      <span style="display:block;width:36px;height:1px;background:var(--color-accent-gold);"></span>Legal &amp; Transparency
    </p>
    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(min(100%,320px),1fr));gap:clamp(20px,4vw,56px);align-items:end;">
      <h1 style="margin:0;font-family:var(--font-heading);font-weight:300;font-size:clamp(48px,7.4vw,104px);line-height:.96;letter-spacing:-.025em;text-wrap:balance;">
        Privacy <em style="font-style:italic;color:var(--color-accent-gold);">Policy</em>
      </h1>
      <p style="margin:0 0 clamp(6px,1vw,16px);max-width:44ch;font-size:clamp(15px,1.15vw,18px);line-height:1.6;color:var(--color-text-light-soft);text-wrap:pretty;">
        Your privacy is paramount. Understand how your personal and browsing information is collected, safeguarded, and handled at Glamp Inn Valley.
      </p>
    </div>
  </div>

  <svg viewBox="0 0 1440 90" preserveAspectRatio="none" aria-hidden="true" style="display:block;width:100%;height:clamp(40px,6vw,90px);margin-top:clamp(40px,6vh,80px);margin-bottom:-1px;background:#1f3b34;">
    <path d="M0 90 L0 62 C120 48 200 30 320 36 C420 41 470 60 560 52 C660 43 720 14 840 20 C940 25 990 52 1090 48 C1190 44 1250 24 1330 28 C1380 31 1410 44 1440 50 L1440 90 Z" fill="#f3efe6"></path>
  </svg>
</section>

<!-- =========================================================================
     POLICY CONTENT
     ========================================================================= -->
<section style="padding:clamp(56px,8vw,110px) 0;position:relative;">
  <div style="max-width:960px;margin:0 auto;padding:0 clamp(20px,5vw,48px);">
    
    <!-- Introduction Card -->
    <div style="background:#ffffff;border:1px solid var(--color-border-dark-subtle);border-radius:var(--radius-md);padding:clamp(28px,5vw,48px);box-shadow:var(--shadow-sm);margin-bottom:32px;">
      <p style="margin:0 0 16px;font-size:16px;line-height:1.8;color:var(--color-text);">
        Thank you for visiting <strong>Glamp Inn Valley</strong>. This Privacy Policy is designed to inform you about the types of information we may collect when you visit our Website, <a href="https://www.glampinnvalley.com" style="color:var(--color-accent);text-decoration:underline;">www.glampinnvalley.com</a>, how we use that information, and the circumstances under which we may disclose it to third parties.
      </p>
      <p style="margin:0;font-size:15px;line-height:1.7;color:var(--color-text-secondary);background:var(--color-bg);padding:16px 20px;border-left:3px solid var(--color-accent);border-radius:var(--radius-sm);">
        By using the Website, you agree to the terms and conditions of this Privacy Policy.
      </p>
    </div>

    <!-- Structured Policy Blocks -->
    <div style="display:flex;flex-direction:column;gap:24px;">

      <!-- 1. Information We Collect -->
      <article style="background:#ffffff;border:1px solid var(--color-border-dark-subtle);border-radius:var(--radius-md);padding:clamp(24px,4vw,36px);">
        <div style="display:flex;align-items:center;gap:12px;margin-bottom:16px;">
          <span style="font-family:var(--font-heading);font-size:24px;color:var(--color-accent);line-height:1;">01</span>
          <h2 style="margin:0;font-family:var(--font-heading);font-size:clamp(26px,3vw,34px);font-weight:400;color:var(--color-text);">
            Information We Collect
          </h2>
        </div>
        <div style="display:flex;flex-direction:column;gap:16px;font-size:15px;color:var(--color-text-muted);line-height:1.75;">
          <div style="padding:14px 18px;background:rgba(182,130,53,.04);border-radius:var(--radius-sm);border:1px solid rgba(182,130,53,.15);">
            <strong style="color:var(--color-text);font-size:16px;display:block;margin-bottom:4px;">Personal Information</strong>
            We may collect personal information, such as your name, email address, and other contact details, when you voluntarily submit them on the Website.
          </div>
          <div style="padding:14px 18px;background:rgba(47,90,76,.04);border-radius:var(--radius-sm);border:1px solid rgba(47,90,76,.15);">
            <strong style="color:var(--color-text);font-size:16px;display:block;margin-bottom:4px;">Non-Personal Information</strong>
            We may also collect non-personal information, such as browser type, IP address, and browsing patterns, to enhance your experience on the Website.
          </div>
        </div>
      </article>

      <!-- 2. How We Use Your Information -->
      <article style="background:#ffffff;border:1px solid var(--color-border-dark-subtle);border-radius:var(--radius-md);padding:clamp(24px,4vw,36px);">
        <div style="display:flex;align-items:center;gap:12px;margin-bottom:16px;">
          <span style="font-family:var(--font-heading);font-size:24px;color:var(--color-accent);line-height:1;">02</span>
          <h2 style="margin:0;font-family:var(--font-heading);font-size:clamp(26px,3vw,34px);font-weight:400;color:var(--color-text);">
            How We Use Your Information
          </h2>
        </div>
        <p style="margin:0 0 14px;font-size:15px;color:var(--color-text-muted);line-height:1.75;">
          We may use the information we collect for the following purposes:
        </p>
        <ul style="margin:0;padding-left:22px;display:flex;flex-direction:column;gap:10px;font-size:15px;color:var(--color-text-muted);line-height:1.7;">
          <li>To provide, maintain, and improve our Website.</li>
          <li>To respond to your inquiries or comments.</li>
          <li>To send periodic emails or newsletters if you have opted in to receive them.</li>
          <li>To personalize your experience on the Website.</li>
        </ul>
      </article>

      <!-- 3. Disclosure of Information -->
      <article style="background:#ffffff;border:1px solid var(--color-border-dark-subtle);border-radius:var(--radius-md);padding:clamp(24px,4vw,36px);">
        <div style="display:flex;align-items:center;gap:12px;margin-bottom:16px;">
          <span style="font-family:var(--font-heading);font-size:24px;color:var(--color-accent);line-height:1;">03</span>
          <h2 style="margin:0;font-family:var(--font-heading);font-size:clamp(26px,3vw,34px);font-weight:400;color:var(--color-text);">
            Disclosure of Information
          </h2>
        </div>
        <p style="margin:0;font-size:15px;color:var(--color-text-muted);line-height:1.75;">
          We do not sell, trade, or otherwise transfer your personal information to third parties. However, we may share non-personal information with third-party service providers for the purpose of website analytics and improvement.
        </p>
      </article>

      <!-- 4. Security -->
      <article style="background:#ffffff;border:1px solid var(--color-border-dark-subtle);border-radius:var(--radius-md);padding:clamp(24px,4vw,36px);">
        <div style="display:flex;align-items:center;gap:12px;margin-bottom:16px;">
          <span style="font-family:var(--font-heading);font-size:24px;color:var(--color-accent);line-height:1;">04</span>
          <h2 style="margin:0;font-family:var(--font-heading);font-size:clamp(26px,3vw,34px);font-weight:400;color:var(--color-text);">
            Security
          </h2>
        </div>
        <p style="margin:0;font-size:15px;color:var(--color-text-muted);line-height:1.75;">
          We take reasonable measures to protect the information collected on the Website from unauthorized access or disclosure.
        </p>
      </article>

      <!-- 5. Cookies -->
      <article style="background:#ffffff;border:1px solid var(--color-border-dark-subtle);border-radius:var(--radius-md);padding:clamp(24px,4vw,36px);">
        <div style="display:flex;align-items:center;gap:12px;margin-bottom:16px;">
          <span style="font-family:var(--font-heading);font-size:24px;color:var(--color-accent);line-height:1;">05</span>
          <h2 style="margin:0;font-family:var(--font-heading);font-size:clamp(26px,3vw,34px);font-weight:400;color:var(--color-text);">
            Cookies
          </h2>
        </div>
        <p style="margin:0;font-size:15px;color:var(--color-text-muted);line-height:1.75;">
          Our Website may use cookies to enhance your browsing experience. You can choose to disable cookies through your browser settings.
        </p>
      </article>

      <!-- 6. Changes to This Privacy Policy -->
      <article style="background:#ffffff;border:1px solid var(--color-border-dark-subtle);border-radius:var(--radius-md);padding:clamp(24px,4vw,36px);">
        <div style="display:flex;align-items:center;gap:12px;margin-bottom:16px;">
          <span style="font-family:var(--font-heading);font-size:24px;color:var(--color-accent);line-height:1;">06</span>
          <h2 style="margin:0;font-family:var(--font-heading);font-size:clamp(26px,3vw,34px);font-weight:400;color:var(--color-text);">
            Changes to This Privacy Policy
          </h2>
        </div>
        <p style="margin:0;font-size:15px;color:var(--color-text-muted);line-height:1.75;">
          We reserve the right to update this Privacy Policy at any time. Any changes will be effective immediately upon posting.
        </p>
      </article>

      <!-- 7. Contact Us -->
      <article style="background:#ffffff;border:1px solid var(--color-border-dark-subtle);border-radius:var(--radius-md);padding:clamp(24px,4vw,36px);">
        <div style="display:flex;align-items:center;gap:12px;margin-bottom:16px;">
          <span style="font-family:var(--font-heading);font-size:24px;color:var(--color-accent);line-height:1;">07</span>
          <h2 style="margin:0;font-family:var(--font-heading);font-size:clamp(26px,3vw,34px);font-weight:400;color:var(--color-text);">
            Contact Us
          </h2>
        </div>
        <p style="margin:0 0 20px;font-size:15px;color:var(--color-text-muted);line-height:1.75;">
          If you have any questions or concerns about this Privacy Policy, please contact us at <a href="mailto:<?= CONTACT_EMAIL ?>" style="color:var(--color-accent);text-decoration:underline;"><?= CONTACT_EMAIL ?></a>.
        </p>

        <div style="display:flex;flex-wrap:wrap;gap:14px;padding-top:16px;border-top:1px solid var(--color-border-dark-subtle);">
          <a href="mailto:<?= CONTACT_EMAIL ?>" class="giv-btn-gold" style="color:#1d2a26;border-color:var(--color-accent);color:var(--color-accent);">
            Email Privacy Concierge
          </a>
          <a href="contact-us.php" class="giv-btn-outline">
            Visit Contact Us Page
          </a>
          <a href="<?= htmlspecialchars(get_whatsapp_url('Hi Glamp Inn Valley, I have an inquiry regarding your privacy policy.')) ?>" target="_blank" rel="noopener" class="giv-btn-outline">
            Message on WhatsApp
          </a>
        </div>
      </article>

    </div>
  </div>
</section>

<!-- Mobile Sticky Booking Bar -->
<?php require __DIR__ . '/includes/booking-bar.php'; ?>

<!-- Master Footer -->
<?php
$footer_kicker = 'Questions regarding your privacy?';
$footer_title = 'We are always here to assist you.';
require __DIR__ . '/includes/footer.php';
?>
