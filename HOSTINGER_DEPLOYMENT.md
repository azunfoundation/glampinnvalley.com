# Hostinger Shared Hosting Deployment Guide: Glamp Inn Valley

This guide provides step-by-step instructions for deploying the **Glamp Inn Valley** production website to **Hostinger Shared Hosting** (Single, Premium, Business, or Cloud Startup hosting).

---

## 1. Hosting Compatibility & Requirements

* **Platform:** Hostinger Shared Hosting (cPanel / hPanel)
* **PHP Version:** **PHP 8.1, 8.2, or 8.3** (Recommended: **PHP 8.3**)
* **Required PHP Extensions:**
  * `curl`
  * `mbstring`
  * `openssl`
  * `session`
  *(All enabled by default on standard Hostinger PHP installations)*
* **Database:** **None required**. The site runs entirely on high-performance flat-file PHP and precomputed assets. Zero MySQL setup, maintenance, or connection overhead needed.
* **Background Process / Daemons:** **None required**. No Node.js, Python, Redis, or background workers needed.

---

## 2. Production File Structure

The entire contents of the `public_html/` folder are ready to be uploaded directly into your Hostinger account's `public_html/` root:

```text
public_html/
├── .htaccess                     # Apache rules: Gzip compression, browser caching, security headers, clean URLs
├── robots.txt                    # Search crawler instructions
├── sitemap.xml                   # XML sitemap for SEO
├── 404.php                       # Custom branded luxury 404 error page
├── index.php                     # Homepage (11 sections with exact Claude Design SVGs & interactions)
├── domes.php                     # Domes & Rates (all 8 domes, tier filter, comparison matrix, policies)
├── experiences.php               # Experiences (10 activities directory & hillside pool spotlight)
├── about.php                     # The Valley & Story (eco-luxury architecture, dark sky, peacocks)
├── gallery.php                   # Visual Field Notes (photo archive with category filters & lightbox)
├── contact.php                   # Getting Here & Contact (Hyderabad driving route guide & inquiry form)
├── faq.php                       # Frequently Asked Questions & Stay Policies (accordion layout)
├── includes/
│   ├── config.php                # Master configuration (contact info, rates, booking URLs, phone)
│   ├── header.php                # Universal header, Open Graph, Google Fonts, and Schema.org metadata
│   ├── footer.php                # Universal footer with nocturnal styling, legal info, and sitemap
│   ├── nav.php                   # Responsive header navigation & full-screen mobile drawer
│   ├── booking-bar.php           # Mobile sticky booking bar (shows when scrolling past hero)
│   └── svg-paths.php             # Precomputed mathematical vector paths from Claude Design
└── assets/
    ├── css/
    │   ├── classical.css         # Classical design system tokens & base elements
    │   └── styles.css            # Production stylesheet, responsive breakpoints, animations
    ├── js/
    │   └── main.js               # Lightweight vanilla JS for mobile menu, scroll header, reveals, lightbox
    └── images/                   # 65 high-quality WebP & PNG photography & logo assets
```

---

## 3. Step-by-Step Deployment Instructions

### Method A: Hostinger File Manager (Quickest & Recommended)

1. Log into your **Hostinger hPanel** ([hpanel.hostinger.com](https://hpanel.hostinger.com)).
2. Navigate to **Websites** and select **Manage** for `glampinnvalley.com`.
3. Under the **Files** section, click on **File Manager**.
4. Double-click to open the `public_html` directory.
5. If there is a default Hostinger `default.php` file, delete it.
6. On your local machine, compress the contents of `public_html` into a `.zip` archive (e.g. `glampinnvalley_deploy.zip`).
   * *Note: Zip the files inside `public_html`, not the outer folder itself.*
7. In the Hostinger File Manager top menu, click **Upload** -> **File**, and select your zip file.
8. Right-click the uploaded `.zip` file inside File Manager and select **Extract**.
9. Confirm extraction into the current directory (`/public_html`).
10. Delete the `.zip` file once extracted.

### Method B: FTP / SFTP Deployment (FileZilla / Cyberduck)

1. In hPanel, search for **FTP Accounts** to get your FTP Hostname, Username, and Password.
2. Open FileZilla and connect to your host.
3. Open the remote folder `/public_html`.
4. Upload all files and subdirectories from your local `public_html/` directly into remote `public_html/`.

---

## 4. Central Configuration & Booking URL

All contact details, phone numbers, email addresses, and booking links are centrally managed in:
`public_html/includes/config.php`

### Connecting an External Booking Engine (Optional)
If you decide to use an external booking engine in the future (e.g. Sirvoy, Cloudbeds, Booking.com, Airbnb):
1. Open `public_html/includes/config.php`.
2. Locate line 24:
   ```php
   define('EXTERNAL_BOOKING_URL', '');
   ```
3. Enter your booking engine URL:
   ```php
   define('EXTERNAL_BOOKING_URL', 'https://your-booking-engine-link.com');
   ```
4. Save the file. All "Check Availability" buttons across the site will automatically route guests to your booking engine.
5. If left empty (`''`), all buttons automatically route guests to the WhatsApp Concierge (`+91 70954 66999`) with pre-filled room details.

### Updating Contact Information
To update phone numbers, email, or address:
* Edit `PHONE_DISPLAY` and `PHONE_RAW` in `public_html/includes/config.php`.
* Edit `WHATSAPP_NUMBER` in `public_html/includes/config.php`.
* Edit `CONTACT_EMAIL` in `public_html/includes/config.php`.

---

## 5. Domain & HTTPS Setup in Hostinger

1. **Connect Domain:**
   * In hPanel, go to **Domains** -> select `glampinnvalley.com` -> ensure DNS records point to your Hostinger server IP.
   * If your domain is registered with an external registrar (e.g. GoDaddy, Namecheap), update nameservers to:
     * `ns1.dns-parking.com`
     * `ns2.dns-parking.com`
2. **Enable Free SSL (HTTPS):**
   * In hPanel, navigate to **Security** -> **SSL**.
   * Click **Install SSL** for `glampinnvalley.com`. Hostinger installs a lifetime Let's Encrypt certificate automatically.
   * Enable the toggle for **Force HTTPS** in hPanel.
3. **Apache `.htaccess` HTTPS Enforcement:**
   * In `public_html/.htaccess`, the HTTPS rewrite rule is already prepared. If hPanel force HTTPS is not used, you can uncomment lines 43-44 in `.htaccess`:
     ```apache
     RewriteCond %{HTTPS} off
     RewriteRule ^(.*)$ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]
     ```

---

## 6. Verification Checklist after Deployment

Visit `https://glampinnvalley.com/` in your browser and check:

- [ ] Homepage loads smoothly with starry night gradient and hero dome lattice.
- [ ] Navigation bar shrinks smoothly from 84px to 64px on scroll.
- [ ] Mobile menu opens and closes smoothly on smartphone viewports.
- [ ] Mobile sticky booking bar appears after scrolling past hero section.
- [ ] Click "Domes & Rates" to test the tier filter buttons (All, Twin Valley, Standalone, Hammock, Signature).
- [ ] Click an activity under "Experiences" to verify the photo updates in real time.
- [ ] Click gallery photos to verify the high-resolution lightbox modal.
- [ ] Click WhatsApp booking buttons to verify prefilled messages open in WhatsApp.
- [ ] Submit a test inquiry on the Contact page.
- [ ] Visit a non-existent URL (e.g. `/random-page`) to verify the custom luxury 404 page renders.
