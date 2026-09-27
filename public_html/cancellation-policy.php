<?php
/**
 * Glamp Inn Valley - Cancellation & Rescheduling Policy
 * Official policies regarding cancellations, rescheduling eligibility, and support.
 */
require_once __DIR__ . '/includes/config.php';
$svg_paths = require __DIR__ . '/includes/svg-paths.php';

$page_title = 'Cancellation and Rescheduling Policy';
$page_description = 'Official cancellation, refund, and rescheduling guidelines for dome stays at Glamp Inn Valley in the Vikarabad Hills.';
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
      <span style="display:block;width:36px;height:1px;background:var(--color-accent-gold);"></span>Reservation Terms
    </p>
    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(min(100%,320px),1fr));gap:clamp(20px,4vw,56px);align-items:end;">
      <h1 style="margin:0;font-family:var(--font-heading);font-weight:300;font-size:clamp(44px,6.8vw,96px);line-height:.96;letter-spacing:-.025em;text-wrap:balance;">
        Cancellation &amp; Rescheduling <em style="font-style:italic;color:var(--color-accent-gold);">Policy</em>
      </h1>
      <p style="margin:0 0 clamp(6px,1vw,16px);max-width:44ch;font-size:clamp(15px,1.15vw,18px);line-height:1.6;color:var(--color-text-light-soft);text-wrap:pretty;">
        Important guidelines regarding your booking commitment, non-refundable terms, and eligible rescheduling windows.
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

    <!-- Key Policy Highlights Grid -->
    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(min(100%,280px),1fr));gap:20px;margin-bottom:36px;">
      <div style="background:#ffffff;border:1px solid var(--color-border-dark-subtle);border-left:4px solid #b68235;border-radius:var(--radius-md);padding:24px;">
        <span style="font-size:11px;letter-spacing:.16em;text-transform:uppercase;color:var(--color-accent);font-weight:600;display:block;margin-bottom:6px;">Booking Status</span>
        <div style="font-family:var(--font-heading);font-size:24px;color:var(--color-text);margin-bottom:6px;">Final &amp; Non-Refundable</div>
        <div style="font-size:14px;color:var(--color-text-secondary);line-height:1.5;">Bookings cannot be cancelled for refunds once confirmed.</div>
      </div>
      <div style="background:#ffffff;border:1px solid var(--color-border-dark-subtle);border-left:4px solid #2f5a4c;border-radius:var(--radius-md);padding:24px;">
        <span style="font-size:11px;letter-spacing:.16em;text-transform:uppercase;color:#2f5a4c;font-weight:600;display:block;margin-bottom:6px;">Rescheduling Window</span>
        <div style="font-family:var(--font-heading);font-size:24px;color:var(--color-text);margin-bottom:6px;">At Least 8 Days Prior</div>
        <div style="font-size:14px;color:var(--color-text-secondary);line-height:1.5;">Requests must be submitted 8+ days before original check-in.</div>
      </div>
      <div style="background:#ffffff;border:1px solid var(--color-border-dark-subtle);border-left:4px solid #14262a;border-radius:var(--radius-md);padding:24px;">
        <span style="font-size:11px;letter-spacing:.16em;text-transform:uppercase;color:#5d6b66;font-weight:600;display:block;margin-bottom:6px;">Support Turnaround</span>
        <div style="font-family:var(--font-heading);font-size:24px;color:var(--color-text);margin-bottom:6px;">2 Business Days</div>
        <div style="font-size:14px;color:var(--color-text-secondary);line-height:1.5;">Our reservation team evaluates eligibility within 48 hours.</div>
      </div>
    </div>

    <!-- Structured Policy Sections -->
    <div style="display:flex;flex-direction:column;gap:24px;">

      <!-- 1. No Cancellation Policy -->
      <article style="background:#ffffff;border:1px solid var(--color-border-dark-subtle);border-radius:var(--radius-md);padding:clamp(24px,4vw,36px);">
        <div style="display:flex;align-items:center;gap:12px;margin-bottom:16px;">
          <span style="font-family:var(--font-heading);font-size:24px;color:var(--color-accent);line-height:1;">01</span>
          <h2 style="margin:0;font-family:var(--font-heading);font-size:clamp(26px,3vw,34px);font-weight:400;color:var(--color-text);">
            No Cancellation Policy
          </h2>
        </div>
        <p style="margin:0;font-size:15px;color:var(--color-text-muted);line-height:1.8;">
          We currently do not offer any option for cancellations. Once a booking is made, it is considered final and non-refundable. However, we understand that unforeseen circumstances may arise.
        </p>
      </article>

      <!-- 2. Rescheduling Option -->
      <article style="background:#ffffff;border:1px solid var(--color-border-dark-subtle);border-radius:var(--radius-md);padding:clamp(24px,4vw,36px);">
        <div style="display:flex;align-items:center;gap:12px;margin-bottom:16px;">
          <span style="font-family:var(--font-heading);font-size:24px;color:var(--color-accent);line-height:1;">02</span>
          <h2 style="margin:0;font-family:var(--font-heading);font-size:clamp(26px,3vw,34px);font-weight:400;color:var(--color-text);">
            Rescheduling Option
          </h2>
        </div>
        <p style="margin:0 0 16px;font-size:15px;color:var(--color-text-muted);line-height:1.8;">
          If serious circumstances prevent you from attending, you may request to reschedule your booking. Rescheduling is only possible if the request is made at least <strong>8 days before the original booking date</strong>.
        </p>
        <div style="padding:14px 18px;background:#fff8ee;border:1px solid #f2dfc2;border-radius:var(--radius-sm);font-size:14px;color:#855d14;line-height:1.6;">
          <strong>Important Note:</strong> Please note that no refunds will be provided for any cancellations. Rescheduled dates are subject to dome availability and prevailing seasonal tariff.
        </div>
      </article>

      <!-- 3. How to Reschedule -->
      <article style="background:#ffffff;border:1px solid var(--color-border-dark-subtle);border-radius:var(--radius-md);padding:clamp(24px,4vw,36px);">
        <div style="display:flex;align-items:center;gap:12px;margin-bottom:16px;">
          <span style="font-family:var(--font-heading);font-size:24px;color:var(--color-accent);line-height:1;">03</span>
          <h2 style="margin:0;font-family:var(--font-heading);font-size:clamp(26px,3vw,34px);font-weight:400;color:var(--color-text);">
            How to Reschedule
          </h2>
        </div>
        <p style="margin:0 0 16px;font-size:15px;color:var(--color-text-muted);line-height:1.8;">
          To request a rescheduling of your booking, please contact our customer support at <a href="mailto:<?= CONTACT_EMAIL ?>?subject=Booking%20Rescheduling%20Request%20-%20Glamp%20Inn%20Valley" style="color:var(--color-accent);text-decoration:underline;font-weight:500;"><?= CONTACT_EMAIL ?></a> with your order details and reason for the rescheduling. We will confirm the rescheduling eligibility within <strong>2 business days</strong>.
        </p>

        <!-- Step-by-step guidance -->
        <div style="display:flex;flex-direction:column;gap:12px;margin:20px 0;background:var(--color-bg);padding:20px;border-radius:var(--radius-sm);border:1px solid var(--color-border-dark-subtle);">
          <div style="display:flex;gap:12px;align-items:flex-start;">
            <span style="background:var(--color-accent);color:#fff;width:24px;height:24px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:12px;flex-shrink:0;">1</span>
            <div style="font-size:14px;color:var(--color-text);">Locate your reservation confirmation or payment screenshot.</div>
          </div>
          <div style="display:flex;gap:12px;align-items:flex-start;">
            <span style="background:var(--color-accent);color:#fff;width:24px;height:24px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:12px;flex-shrink:0;">2</span>
            <div style="font-size:14px;color:var(--color-text);">Email <strong><?= CONTACT_EMAIL ?></strong> at least 8 days prior to check-in with your proposed new dates and reason.</div>
          </div>
          <div style="display:flex;gap:12px;align-items:flex-start;">
            <span style="background:var(--color-accent);color:#fff;width:24px;height:24px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:12px;flex-shrink:0;">3</span>
            <div style="font-size:14px;color:var(--color-text);">Our reservation desk reviews dome inventory and replies with confirmation within 2 business days.</div>
          </div>
        </div>

        <div style="display:flex;flex-wrap:wrap;gap:14px;">
          <a href="mailto:<?= CONTACT_EMAIL ?>?subject=Booking%20Rescheduling%20Request%20-%20Glamp%20Inn%20Valley" class="giv-btn-gold" style="color:#1d2a26;border-color:var(--color-accent);color:var(--color-accent);">
            Email Rescheduling Request
          </a>
          <a href="<?= htmlspecialchars(get_whatsapp_url('Hi Glamp Inn Valley, I have a query regarding rescheduling my dome reservation.')) ?>" target="_blank" rel="noopener" class="giv-btn-outline">
            Inquire via WhatsApp
          </a>
        </div>
      </article>

      <!-- 4. Contact Information -->
      <article style="background:#ffffff;border:1px solid var(--color-border-dark-subtle);border-radius:var(--radius-md);padding:clamp(24px,4vw,36px);">
        <div style="display:flex;align-items:center;gap:12px;margin-bottom:16px;">
          <span style="font-family:var(--font-heading);font-size:24px;color:var(--color-accent);line-height:1;">04</span>
          <h2 style="margin:0;font-family:var(--font-heading);font-size:clamp(26px,3vw,34px);font-weight:400;color:var(--color-text);">
            Contact Information
          </h2>
        </div>
        <p style="margin:0 0 16px;font-size:15px;color:var(--color-text-muted);line-height:1.8;">
          If you have any questions or need further clarification regarding this policy, please reach out to us at <a href="mailto:<?= CONTACT_EMAIL ?>" style="color:var(--color-accent);text-decoration:underline;"><?= CONTACT_EMAIL ?></a>.
        </p>
        <div style="font-size:14px;color:var(--color-text-secondary);display:flex;flex-direction:column;gap:6px;">
          <div><strong>WhatsApp / Phone:</strong> <a href="tel:<?= PHONE_RAW ?>" style="color:inherit;"><?= PHONE_DISPLAY ?></a></div>
          <div><strong>Property Address:</strong> <?= SITE_ADDRESS ?></div>
        </div>
      </article>

      <!-- 5. Policy Updates -->
      <article style="background:#ffffff;border:1px solid var(--color-border-dark-subtle);border-radius:var(--radius-md);padding:clamp(24px,4vw,36px);">
        <div style="display:flex;align-items:center;gap:12px;margin-bottom:16px;">
          <span style="font-family:var(--font-heading);font-size:24px;color:var(--color-accent);line-height:1;">05</span>
          <h2 style="margin:0;font-family:var(--font-heading);font-size:clamp(26px,3vw,34px);font-weight:400;color:var(--color-text);">
            Policy Updates
          </h2>
        </div>
        <p style="margin:0;font-size:15px;color:var(--color-text-muted);line-height:1.8;">
          We reserve the right to update or modify this policy at any time without prior notice. Any changes will be effective immediately upon posting on the website.
        </p>
      </article>

    </div>
  </div>
</section>

<!-- Mobile Sticky Booking Bar -->
<?php require __DIR__ . '/includes/booking-bar.php'; ?>

<!-- Master Footer -->
<?php
$footer_kicker = 'Planning your stay?';
$footer_title = 'The valley is closer than you think.';
require __DIR__ . '/includes/footer.php';
?>
