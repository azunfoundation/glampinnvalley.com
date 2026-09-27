<?php
/**
 * Glamp Inn Valley - Master Configuration & Data Source
 * Central configuration file for site metadata, booking engine, WhatsApp concierge,
 * dome inventory, rates, experiences, policies, and contact information.
 */

// Basic Site Settings
define('SITE_NAME', 'Glamp Inn Valley');
define('SITE_TAGLINE', 'Luxury Dome Stays in the Vikarabad Hills');
define('SITE_DESCRIPTION', 'Eight geodesic domes on a forested ridge two hours from Hyderabad. An infinity pool at the edge of the hills, private decks, starlit fires, and unforgettable valley views.');
define('SITE_LOCATION_SHORT', 'Vikarabad Hills · Telangana');
define('SITE_COORDINATES', '18° 12′ N · 77° 50′ E');
define('SITE_ADDRESS', 'Sy.no 50, Thirmalapur Village, Pudur Mandal, Vikarabad, Telangana 501101');

// Contact Information
define('PHONE_DISPLAY', '+91 70954 66999');
define('PHONE_RAW', '+917095466999');
define('WHATSAPP_NUMBER', '917095466999');
define('CONTACT_EMAIL', 'glampinnvalley01@gmail.com');
define('MAPS_URL', 'https://maps.app.goo.gl/mjQFYyVS2K94BtcE6');
define('INSTAGRAM_URL', 'https://www.instagram.com/glampinnvalley/');
define('FACEBOOK_URL', 'https://www.facebook.com/profile.php?id=100095675161083');

// Community & Drive Assets
define('WHATSAPP_COMMUNITY_URL', 'https://chat.whatsapp.com/CuyoXln21ieBkS2hkd86cF');
define('DRIVE_TARIFF_URL', 'https://drive.google.com/file/d/1-QSUfJAX_7VIYqMDXdvTfR4S6ZzdP-0X/view?usp=drivesdk');
define('DRIVE_GALLERY_URL', 'https://drive.google.com/drive/folders/1HLYZ87oSRCsywrNyJrXRZww9Grb2ugQx?usp=sharing');
define('DRIVE_ACTIVITIES_GALLERY_URL', 'https://drive.google.com/drive/folders/16cEVYBRBaRoUCrPIXxTLvtx7OZ6p0zAB');

// Core Timings & Critical Policies
define('CHECKIN_TIME', '2:00 PM');
define('CHECKOUT_TIME', '11:00 AM');
define('POOL_POLICY_NOTE', 'Wearing proper swimming attire made of nylon fabric is mandatory for entry into the pool. This policy ensures hygiene, safety, and best swimming experience for all.');
define('WEATHER_POLICY_NOTE', 'If there’s rainfall outdoor activities might not happen');

// Booking Engine Configuration
// If an external booking engine (e.g. Sirvoy, Cloudbeds, Booking.com) is used, place the URL here.
// When empty, the system defaults smoothly to direct WhatsApp concierge booking.
define('EXTERNAL_BOOKING_URL', '');

/**
 * Generate a WhatsApp Concierge link with prefilled message
 */
function get_whatsapp_url($message = "Hi Glamp Inn Valley, I'd like to check availability for a dome stay.") {
    return 'https://wa.me/' . WHATSAPP_NUMBER . '?text=' . rawurlencode($message);
}

/**
 * Central booking button URL resolver.
 * Routes to EXTERNAL_BOOKING_URL if configured, otherwise generates targeted WhatsApp link.
 */
function get_booking_url($dome_name = '', $dates = '') {
    if (!empty(EXTERNAL_BOOKING_URL)) {
        return EXTERNAL_BOOKING_URL;
    }
    if (!empty($dome_name)) {
        return get_whatsapp_url("Hi Glamp Inn Valley, I'd like to check availability for {$dome_name}.");
    }
    return get_whatsapp_url();
}

/**
 * Domes inventory & pricing data
 */
function get_domes_data() {
    $base_features = ['Attached bathroom', 'King bed', 'Air-conditioned', 'Stargazer chairs', 'Private deck'];

    return [
        [
            'id' => 'twin-right',
            'n' => '01',
            'tier' => 'Twin Valley',
            'name' => 'Twin Valley · Right',
            'kicker' => 'Shared deck · 450 sq ft',
            'size' => '450 sq ft',
            'body' => 'One of a pair on a single wide deck, ideal for two couples or a family travelling together. Book both for the whole terrace.',
            'description_long' => 'Positioned on the expansive east terrace of the ridge, Twin Valley Right shares an elevated 1,200 sq ft panoramic deck with its sister dome, Twin Valley Left. Perfect for friends, two couples, or families travelling together who desire both a grand shared celebratory terrace and private sanctuary. Features an attached luxury en-suite bathroom, plush king bed facing the valley window, premium climate control, and dedicated outdoor stargazer chairs.',
            'features' => array_merge($base_features, ['Shared deck with Twin Left', 'Valley window', '24/7 Hot water']),
            'specs' => [
                'Size' => '450 sq ft interior + shared terrace',
                'Capacity' => '2 Adults (1 child under 5 free)',
                'Bed' => 'Handcrafted King-size plush mattress',
                'Deck' => 'Elevated timber deck shared with Twin Left',
                'View' => 'Forested valley & eastern sunrise horizon',
                'Climate' => 'Inverter air conditioning & ventilation',
                'Bathroom' => 'Attached en-suite with hot water & organic toiletries'
            ],
            'gallery' => [
                ['src' => 'assets/images/twin-right-hd.webp', 'alt' => 'Twin Valley Right exterior perspective on wide deck', 'caption' => 'Twin Valley Right · Front Perspective'],
                ['src' => 'assets/images/banner4.webp', 'alt' => 'Aerial view of Twin Valley on the wide terrace', 'caption' => 'Twin Valley Terrace · Aerial Vista'],
                ['src' => 'assets/images/banner3.webp', 'alt' => 'Luxury interior with plush king bed and ambient lighting', 'caption' => 'Master Bedroom & Golden Interior'],
                ['src' => 'assets/images/banner5.webp', 'alt' => 'Stargazer deck chairs facing the hills', 'caption' => 'Deck Living & Valley Overlook'],
                ['src' => 'assets/images/hammock-deck-hd.webp', 'alt' => 'Terrace lounge facing sunset horizon', 'caption' => 'Terrace Lounge & Sunset Horizon']
            ],
            'weekday' => '₹9,999',
            'weekend' => '₹11,999',
            'img' => 'assets/images/twin-right-hd.webp',
            'alt' => 'Twin Valley Right on wide ridge terrace',
            'radius' => '0',
            'wa' => get_whatsapp_url("Hi Glamp Inn Valley, I'd like to check availability for Twin Valley Right."),
            'href' => 'dome.php?id=twin-right'
        ],
        [
            'id' => 'twin-left',
            'n' => '02',
            'tier' => 'Twin Valley',
            'name' => 'Twin Valley · Left',
            'kicker' => 'Shared deck · 450 sq ft',
            'size' => '450 sq ft',
            'body' => 'The mirror of Twin Right, facing the same sweep of forest. Quiet on its own; a private compound when booked with its twin.',
            'description_long' => 'The harmonious companion to Twin Right, Twin Valley Left overlooks the northern curve of the forest canopy. Booked alone, it offers a tranquil hillside retreat; booked together with Twin Right, the entire panoramic deck transforms into an exclusive private hilltop compound. Inside, quilted geometric walls insulate against sound and climate, framing a restful king bed and an en-suite designer bathroom.',
            'features' => array_merge($base_features, ['Shared deck with Twin Right', 'Valley window', '24/7 Hot water']),
            'specs' => [
                'Size' => '450 sq ft interior + shared terrace',
                'Capacity' => '2 Adults (1 child under 5 free)',
                'Bed' => 'Handcrafted King-size plush mattress',
                'Deck' => 'Elevated timber deck shared with Twin Right',
                'View' => 'Panoramic northern ridge & forest expanse',
                'Climate' => 'Inverter air conditioning & silent ventilation',
                'Bathroom' => 'Attached en-suite with hot shower & amenities'
            ],
            'gallery' => [
                ['src' => 'assets/images/twin-left-hd.webp', 'alt' => 'Twin Valley Left exterior and wooden deck', 'caption' => 'Twin Valley Left · Deck & Shell'],
                ['src' => 'assets/images/banner4.webp', 'alt' => 'Twin Valley shared panoramic terrace', 'caption' => 'Panoramic Terrace from Above'],
                ['src' => 'assets/images/banner3.webp', 'alt' => 'Plush king bed inside golden quilted dome suite', 'caption' => 'Plush King Bed & Quilted Finish'],
                ['src' => 'assets/images/banner5.webp', 'alt' => 'Stargazer chairs overlooking Vikarabad hills', 'caption' => 'Deck Sunset Viewpoint'],
                ['src' => 'assets/images/deck-dome-hd.webp', 'alt' => 'Terrace viewpoint over the northern hills', 'caption' => 'Northern Ridge & Forest Expanse']
            ],
            'weekday' => '₹9,999',
            'weekend' => '₹11,999',
            'img' => 'assets/images/twin-left-hd.webp',
            'alt' => 'Twin Valley Left on deck',
            'radius' => '0',
            'wa' => get_whatsapp_url("Hi Glamp Inn Valley, I'd like to check availability for Twin Valley Left."),
            'href' => 'dome.php?id=twin-left'
        ],
        [
            'id' => 'nubra',
            'n' => '03',
            'tier' => 'Standalone',
            'name' => 'Nubra Valley',
            'kicker' => 'Standalone · 450 sq ft',
            'size' => '450 sq ft',
            'body' => 'A standalone dome set a little apart along the stone path, with its own deck turned toward the morning light.',
            'description_long' => 'Named after the tranquil high-altitude Himalayan valley, Nubra is completely standalone, surrounded by wild grasses and flowering shrubs along the estate stone walkway. Its private deck is orientated directly east to greet the first golden amber hues of sunrise over the Vikarabad hills. Featuring full glass framing, an attached en-suite bath, and bespoke timber deck chairs.',
            'features' => array_merge($base_features, ['Own deck', 'East-facing sunrise view', 'Artisanal tea station']),
            'specs' => [
                'Size' => '450 sq ft private interior & deck',
                'Capacity' => '2 Adults (1 child under 5 free)',
                'Bed' => 'King-size premium pocket-spring bed',
                'Deck' => 'Private standalone deck with morning sun orientation',
                'View' => 'Open forest, sunrise horizon & wildflower meadow',
                'Climate' => 'High-capacity whisper-quiet air conditioner',
                'Bathroom' => 'Attached bathroom with rainfall shower & hot water'
            ],
            'gallery' => [
                ['src' => 'assets/images/dome-standalone-hd.webp', 'alt' => 'Nubra Valley standalone dome on deck in tall grass', 'caption' => 'Nubra Valley · Standalone Ridge Deck'],
                ['src' => 'assets/images/banner5.webp', 'alt' => 'Deck chairs facing the forest hills in morning sun', 'caption' => 'Private Morning Coffee Deck'],
                ['src' => 'assets/images/banner3.webp', 'alt' => 'Interior facing panoramic valley window', 'caption' => 'Sunrise Window & Valley View'],
                ['src' => 'assets/images/deck-dome-hd.webp', 'alt' => 'Dome deck overlooking the open ridge', 'caption' => 'Meadow Perspective & Sunset Sky'],
                ['src' => 'assets/images/banner4.webp', 'alt' => 'Ridge perspective over the forested hills', 'caption' => 'Ridge Overlook & Distant Hills']
            ],
            'weekday' => '₹10,499',
            'weekend' => '₹12,499',
            'img' => 'assets/images/dome-standalone-hd.webp',
            'alt' => 'Nubra Valley standalone dome in greenery',
            'radius' => '0',
            'wa' => get_whatsapp_url("Hi Glamp Inn Valley, I'd like to check availability for Nubra Valley."),
            'href' => 'dome.php?id=nubra'
        ],
        [
            'id' => 'araku',
            'n' => '04',
            'tier' => 'Standalone',
            'name' => 'Araku Valley',
            'kicker' => 'Standalone · 450 sq ft',
            'size' => '450 sq ft',
            'body' => 'Standalone, screened by foliage on the pool side. The closest dome to the infinity edge.',
            'description_long' => 'Araku Valley provides the best of both worlds: complete standalone seclusion screened by leafy trees and vibrant foliage, combined with the closest proximity to Glamp Inn Valley’s breathtaking infinity pool. Walk out from your morning coffee directly down the stone path to the pool deck, or relax in privacy on your secluded deck overlooking the lush green hillside.',
            'features' => array_merge($base_features, ['Own deck', 'Nearest the pool', 'Foliage privacy screen']),
            'specs' => [
                'Size' => '450 sq ft standalone sanctuary',
                'Capacity' => '2 Adults (1 child under 5 free)',
                'Bed' => 'King-size luxury bed facing valley window',
                'Deck' => 'Private standalone deck screened by hillside trees',
                'View' => 'Forest valley vista & proximity to infinity pool edge',
                'Climate' => 'Air-conditioning with personalized temperature control',
                'Bathroom' => 'Attached bathroom with hot water & fresh linens'
            ],
            'gallery' => [
                ['src' => 'assets/images/dome-standalone-hd.webp', 'alt' => 'Araku Valley dome exterior on private deck in hillside grass', 'caption' => 'Araku Valley · Standalone Deck & Foliage'],
                ['src' => 'assets/images/banner2.webp', 'alt' => 'The nearby infinity pool overlooking the hills', 'caption' => 'Nearby Infinity Pool at Dusk'],
                ['src' => 'assets/images/banner3.webp', 'alt' => 'Valley window view from inside the luxury suite', 'caption' => 'Scenic Valley Window Suite'],
                ['src' => 'assets/images/banner5.webp', 'alt' => 'Private secluded timber deck chairs', 'caption' => 'Secluded Hillside Timber Deck'],
                ['src' => 'assets/images/hammock-deck-hd.webp', 'alt' => 'Ridge horizon at sunset near pool', 'caption' => 'Golden Sunset Horizon']
            ],
            'weekday' => '₹10,499',
            'weekend' => '₹12,499',
            'img' => 'assets/images/dome-standalone-hd.webp',
            'alt' => 'Araku Valley dome on deck in tall grass',
            'radius' => '0',
            'wa' => get_whatsapp_url("Hi Glamp Inn Valley, I'd like to check availability for Araku Valley."),
            'href' => 'dome.php?id=araku'
        ],
        [
            'id' => 'sangla',
            'n' => '05',
            'tier' => 'Hammock',
            'name' => 'Sangla Valley',
            'kicker' => 'Infinity hammock · 450 sq ft',
            'size' => '450 sq ft',
            'body' => 'The same 450 sq ft, with an infinity hammock hung out from the deck over the hillside.',
            'description_long' => 'Suspended high above the tree canopy, Sangla Valley introduces the signature infinity hammock net cantilevered directly from the wooden deck out over the ridge drop. Lie weightlessly suspended between sky and earth with unhindered views of the valley beneath. Inside, enjoy the plush king bed, arched panoramic window, and warm golden quilted interior.',
            'features' => array_merge($base_features, ['Infinity hammock', 'Cantilevered valley view']),
            'specs' => [
                'Size' => '450 sq ft dome + cantilevered hammock deck',
                'Capacity' => '2 Adults (1 child under 5 free)',
                'Bed' => 'King-size luxury bed facing the forest',
                'Deck' => 'Private timber deck with suspended safety-rated infinity net',
                'View' => 'Sweeping vertical and panoramic valley vistas',
                'Climate' => 'Full air conditioning & quiet cooling',
                'Bathroom' => 'Attached en-suite bathroom with hot rainfall shower'
            ],
            'gallery' => [
                ['src' => 'assets/images/hammock-deck-hd.webp', 'alt' => 'Sangla Valley cantilevered infinity hammock over valley', 'caption' => 'The Infinity Hammock & Forest Vista'],
                ['src' => 'assets/images/home-slider.webp', 'alt' => 'Sunset over the deck and suspended hammock', 'caption' => 'Extended Deck & Sunset Sky'],
                ['src' => 'assets/images/banner3.webp', 'alt' => 'Plush king bed and golden quilted wall inside', 'caption' => 'Quilted Bedroom Sanctuary'],
                ['src' => 'assets/images/deck-dome-hd.webp', 'alt' => 'Deck lounge overlooking rolling hills', 'caption' => 'Deck Living & Hillside Overlook'],
                ['src' => 'assets/images/banner5.webp', 'alt' => 'Timber deck chairs facing forest valley', 'caption' => 'Private Deck Leisure']
            ],
            'weekday' => '₹11,499',
            'weekend' => '₹13,499',
            'img' => 'assets/images/hammock-deck-hd.webp',
            'alt' => 'Sangla Valley infinity hammock over the drop',
            'radius' => '0',
            'wa' => get_whatsapp_url("Hi Glamp Inn Valley, I'd like to check availability for Sangla Valley."),
            'href' => 'dome.php?id=sangla'
        ],
        [
            'id' => 'silent',
            'n' => '06',
            'tier' => 'Hammock',
            'name' => 'Silent Valley',
            'kicker' => 'Infinity hammock · 450 sq ft',
            'size' => '450 sq ft',
            'body' => 'The furthest dome from the common areas, with the hammock and the quietest deck on the ridge.',
            'description_long' => 'Situated at the quietest, most secluded corner of the Glamp Inn Valley ridge, Silent Valley is enveloped in stillness and birdsong. Ideal for writers, deep rest seekers, and couples celebrating undisturbed intimacy. Equipped with an outdoor infinity hammock hung out over the slope, stargazer deck chairs, and an expansive curved window framing mist rolling across the trees.',
            'features' => array_merge($base_features, ['Infinity hammock', 'Most secluded location', 'Acoustic tranquility']),
            'specs' => [
                'Size' => '450 sq ft secluded forest sanctuary',
                'Capacity' => '2 Adults (1 child under 5 free)',
                'Bed' => 'King-size handcrafted bed with organic linens',
                'Deck' => 'Private secluded deck with infinity hammock net',
                'View' => 'Deep undisturbed forest valley & mist-covered hills',
                'Climate' => 'Multi-stage air conditioning and airflow control',
                'Bathroom' => 'Attached bathroom with luxury shower & amenities'
            ],
            'gallery' => [
                ['src' => 'assets/images/deck-dome-hd.webp', 'alt' => 'Silent Valley secluded dome deck and forest view', 'caption' => 'Silent Valley · Secluded Deck & Sunset'],
                ['src' => 'assets/images/hammock-deck-hd.webp', 'alt' => 'Infinity hammock net suspended over tree canopy', 'caption' => 'Cantilevered Net & Forest Below'],
                ['src' => 'assets/images/banner5.webp', 'alt' => 'Stargazer chairs facing misty forest hills', 'caption' => 'Stargazer Chairs on the Ridge'],
                ['src' => 'assets/images/banner3.webp', 'alt' => 'Plush king bed in quiet interior suite', 'caption' => 'Quiet Interior Retreat'],
                ['src' => 'assets/images/banner4.webp', 'alt' => 'Forest valley ridge perspective', 'caption' => 'Deep Undisturbed Forest Ridge']
            ],
            'weekday' => '₹11,499',
            'weekend' => '₹13,499',
            'img' => 'assets/images/deck-dome-hd.webp',
            'alt' => 'Silent Valley secluded dome on deck',
            'radius' => '0',
            'wa' => get_whatsapp_url("Hi Glamp Inn Valley, I'd like to check availability for Silent Valley."),
            'href' => 'dome.php?id=silent'
        ],
        [
            'id' => 'solang',
            'n' => '07',
            'tier' => 'Signature',
            'name' => 'Solang Valley',
            'kicker' => 'Signature · 550 sq ft',
            'size' => '550 sq ft',
            'body' => 'The larger shell: 550 sq ft with a seating nook, the infinity hammock, and the widest window on the ridge.',
            'description_long' => 'The premier luxury tier of Glamp Inn Valley. Solang boasts an expanded 550 sq ft geodesic footprint featuring an intimate lounge seating nook, custom armchairs, an extra-wide panoramic valley window, and the signature infinity hammock net cantilevered above the cliffside. The acoustic quilted golden walls create an opulent, warm glow as sunset lights up the valley.',
            'features' => array_merge($base_features, ['Infinity hammock', 'Seating nook', 'Widest view', 'Expanded 550 sq ft shell']),
            'specs' => [
                'Size' => '550 sq ft spacious luxury suite & extended deck',
                'Capacity' => '2 Adults (extra bed on request)',
                'Bed' => 'Grand King-size pillowtop luxury bed',
                'Deck' => 'Extra-wide private terrace with infinity hammock',
                'View' => 'Widest panoramic sweep of the Vikarabad hills',
                'Climate' => 'High-capacity climate system with silent operation',
                'Bathroom' => 'Spacious en-suite bathroom with premium rainfall shower'
            ],
            'gallery' => [
                ['src' => 'assets/images/banner3.webp', 'alt' => 'Golden quilted dome interior with lounge nook and wide window', 'caption' => 'Signature 550 sq ft Suite & Lounge Nook'],
                ['src' => 'assets/images/home-slider.webp', 'alt' => 'Sunset over wide deck and infinity net', 'caption' => 'Extended Deck & Infinity Hammock'],
                ['src' => 'assets/images/deck-dome-hd.webp', 'alt' => 'Grand terrace and wide panoramic window', 'caption' => 'Grand Terrace & Wide Panorama'],
                ['src' => 'assets/images/banner5.webp', 'alt' => 'Wraparound terrace with stargazer chairs', 'caption' => 'Wraparound Stargazer Terrace'],
                ['src' => 'assets/images/banner2.webp', 'alt' => 'The infinity pool overlooking the hills', 'caption' => 'Infinity Pool Overlooking the Valley']
            ],
            'weekday' => '₹14,499',
            'weekend' => '₹16,499',
            'img' => 'assets/images/banner3.webp',
            'alt' => 'Solang Valley golden quilted dome interior',
            'radius' => '0',
            'wa' => get_whatsapp_url("Hi Glamp Inn Valley, I'd like to check availability for Solang Valley."),
            'href' => 'dome.php?id=solang'
        ],
        [
            'id' => 'spiti',
            'n' => '08',
            'tier' => 'Signature',
            'name' => 'Spiti Valley',
            'kicker' => 'Signature · 550 sq ft',
            'size' => '550 sq ft',
            'body' => 'Signature size at the high end of the ridge, first to catch the sunrise. Hammock, nook and the long view west at dusk.',
            'description_long' => 'Perched at the highest vantage point of the entire estate, Spiti Valley is the crown jewel of Glamp Inn Valley. It catches the dawn sun earlier than any other dome, and commands an unobstructed 270-degree panorama of rolling forest and morning mist. Features 550 sq ft of luxury interior space, private seating nook, suspended hammock, expansive wraparound deck, and total ridge dominance.',
            'features' => array_merge($base_features, ['Infinity hammock', 'Seating nook', 'Sunrise side', 'Expanded 550 sq ft shell', 'Highest ridge viewpoint']),
            'specs' => [
                'Size' => '550 sq ft crown suite & expansive curved deck',
                'Capacity' => '2 Adults (extra bed on request)',
                'Bed' => 'Grand King-size plush mattress with valley orientation',
                'Deck' => 'Wraparound panoramic deck at the highest ridge crest',
                'View' => '270° forest panoramic view & first sunrise light',
                'Climate' => 'Premium dual climate control system',
                'Bathroom' => 'Attached designer bathroom with hot rainfall shower'
            ],
            'gallery' => [
                ['src' => 'assets/images/banner5.webp', 'alt' => 'Stargazer chairs facing the rolling hills on high ridge', 'caption' => 'Spiti Valley · Wraparound Horizon Deck'],
                ['src' => 'assets/images/dome-standalone-hd.webp', 'alt' => 'High ridge crest standalone dome and private deck platform', 'caption' => 'High Ridge Crest Standalone Dome'],
                ['src' => 'assets/images/banner3.webp', 'alt' => 'Signature luxury interior with seating nook', 'caption' => '550 sq ft Signature Interior Suite'],
                ['src' => 'assets/images/hammock-deck-hd.webp', 'alt' => 'High crest cantilevered hammock and deck', 'caption' => 'High Crest Cantilevered Hammock'],
                ['src' => 'assets/images/home-slider.webp', 'alt' => 'Evening glow over the high ridge', 'caption' => 'Twilight Over the Highest Ridge Crest']
            ],
            'weekday' => '₹14,499',
            'weekend' => '₹16,499',
            'img' => 'assets/images/banner5.webp',
            'alt' => 'Spiti Valley deck chairs facing the hills',
            'radius' => '0',
            'wa' => get_whatsapp_url("Hi Glamp Inn Valley, I'd like to check availability for Spiti Valley."),
            'href' => 'dome.php?id=spiti'
        ]
    ];
}

/**
 * Retrieve single dome by ID
 */
function get_dome_by_id($id) {
    $domes = get_domes_data();
    foreach ($domes as $dome) {
        if ($dome['id'] === $id) {
            return $dome;
        }
    }
    return null;
}

/**
 * Retrieve adjacent previous & next domes for navigation
 */
function get_adjacent_domes($current_id) {
    $domes = get_domes_data();
    $count = count($domes);
    $prev = null;
    $next = null;
    foreach ($domes as $i => $dome) {
        if ($dome['id'] === $current_id) {
            $prev = $domes[($i - 1 + $count) % $count];
            $next = $domes[($i + 1) % $count];
            break;
        }
    }
    return ['prev' => $prev, 'next' => $next];
}

/**
 * Summary dome categories for homepage & rates
 */
function get_homepage_domes_data() {
    return [
        [
            'kicker' => 'Twin Valley · Right & Left',
            'name' => 'Twin Valley',
            'body' => 'Two domes on one shared deck, ideal for friends or family travelling together. 450 sq ft each.',
            'features' => ['Attached bathroom', 'Stargazer chairs', 'Private deck', '450 sq ft'],
            'weekday' => '₹9,999',
            'weekend' => '₹11,999',
            'img' => 'assets/images/banner4.webp',
            'alt' => 'Twin Valley domes from above',
            'wa' => get_whatsapp_url("Hi Glamp Inn Valley, I'd like to check availability for Twin Valley."),
            'radius' => '0'
        ],
        [
            'kicker' => 'Nubra · Araku',
            'name' => 'Nubra & Araku',
            'body' => 'Standalone domes set a little apart, each with a quiet deck facing the forest. 450 sq ft.',
            'features' => ['Attached bathroom', 'Stargazer chairs', 'Private deck', '450 sq ft'],
            'weekday' => '₹10,499',
            'weekend' => '₹12,499',
            'img' => 'assets/images/dome-standalone-hd.webp',
            'alt' => 'Dome interior looking out to the valley',
            'wa' => get_whatsapp_url("Hi Glamp Inn Valley, I'd like to check availability for Nubra or Araku Valley."),
            'radius' => '0'
        ],
        [
            'kicker' => 'Sangla · Silent Valley',
            'name' => 'Sangla & Silent Valley',
            'body' => 'The same 450 sq ft, with an infinity hammock hung out over the hillside from your deck.',
            'features' => ['Attached bathroom', 'Stargazer chairs', 'Private deck', 'Infinity hammock', '450 sq ft'],
            'weekday' => '₹11,499',
            'weekend' => '₹13,499',
            'img' => 'assets/images/hammock-deck-hd.webp',
            'alt' => 'Dome window with the hammock and valley beyond',
            'wa' => get_whatsapp_url("Hi Glamp Inn Valley, I'd like to check availability for Sangla or Silent Valley."),
            'radius' => '0'
        ],
        [
            'kicker' => 'Solang · Spiti Valley',
            'name' => 'Solang & Spiti Valley',
            'body' => 'The largest domes on the ridge at 550 sq ft, with the infinity hammock and the widest view.',
            'features' => ['Attached bathroom', 'Stargazer chairs', 'Private deck', 'Infinity hammock', '550 sq ft'],
            'weekday' => '₹14,499',
            'weekend' => '₹16,499',
            'img' => 'assets/images/banner3.webp',
            'alt' => 'Golden quilted dome interior',
            'wa' => get_whatsapp_url("Hi Glamp Inn Valley, I'd like to check availability for Solang or Spiti Valley."),
            'radius' => '0'
        ]
    ];
}

/**
 * Curated Experiences Data
 */
function get_experiences_data() {
    return [
        [
            'n' => '01',
            'title' => 'Morning Guided Trekking',
            'body' => 'Scenic guided trail through the forest to Bhiravakona, a 400-year-old Siva temple hidden in the Vikarabad hills.',
            'when' => '7:00 AM',
            'price' => 'Complimentary with Stay',
            'badge' => 'Included',
            'type' => 'included',
            'img' => 'assets/images/guided-trekking.png',
            'alt' => 'Guest with arms wide over the green fields on morning trek'
        ],
        [
            'n' => '02',
            'title' => 'Horse Ranch Access & Riding',
            'body' => 'Complimentary walk through our estate ranch to meet gentle thoroughbred horses. Guided trail rides: 15 mins for ₹399/- or ₹400/- per head.',
            'when' => 'Morning · 4:30 PM',
            'price' => 'Ranch Free · Ride ₹399/- (or Active Package)',
            'badge' => 'Active Package',
            'type' => 'active',
            'img' => 'assets/images/horse-ride.png',
            'alt' => 'Horse ride past the domes'
        ],
        [
            'n' => '03',
            'title' => 'Archery Challenge',
            'body' => 'Test your focus and precision with 10 target archery shots under experienced instructors on the ridge lawn.',
            'when' => 'Morning · Afternoon',
            'price' => '₹399/- (10 shots) · Included in Active Package',
            'badge' => 'Active Package',
            'type' => 'active',
            'img' => 'assets/images/guided-trekking.png',
            'alt' => 'Archery target on the grass'
        ],
        [
            'n' => '04',
            'title' => 'Target Shooting',
            'body' => 'Sharpen your aim with 10 air-rifle target shooting shots in a safe, guided open-air shooting station.',
            'when' => 'Morning · Afternoon',
            'price' => '₹399/- (10 shots) · Included in Active Package',
            'badge' => 'Active Package',
            'type' => 'active',
            'img' => 'assets/images/guided-trekking.png',
            'alt' => 'Target shooting in the outdoors'
        ],
        [
            'n' => '05',
            'title' => 'Jungle Safari (1 Hour)',
            'body' => 'An exhilarating 1-hour open safari excursion through the rugged Vikarabad reserve woodland and offbeat nature tracks.',
            'when' => 'Morning · Late Afternoon',
            'price' => '₹399/- in Active Package (₹550/- per head separate)',
            'badge' => 'Active Package',
            'type' => 'active',
            'img' => 'assets/images/guided-trekking.png',
            'alt' => 'Jungle safari ride through the Vikarabad forest'
        ],
        [
            'n' => '06',
            'title' => 'Floating Breakfast',
            'body' => 'Deluxe morning feast served on a handcrafted floating wicker tray in our cliffside infinity pool, facing the endless horizon.',
            'when' => '8:30 AM – 10:30 AM',
            'price' => '₹2,000/- (for 2 adults)',
            'badge' => 'Add-On',
            'type' => 'addon',
            'img' => 'assets/images/floating-breakfast.webp',
            'alt' => 'Floating breakfast tray in the infinity pool'
        ],
        [
            'n' => '07',
            'title' => 'Candlelight Dinner Setup',
            'body' => 'An intimate dinner table set under lantern-strung trees with custom romantic decor and warm candlelight.',
            'when' => 'Evening / Night',
            'price' => '₹1,500/- (per setup)',
            'badge' => 'Add-On',
            'type' => 'addon',
            'img' => 'assets/images/candle-light-dinner.webp',
            'alt' => 'Candlelit dinner table under glowing lanterns'
        ],
        [
            'n' => '08',
            'title' => 'Private Bonfire Setup',
            'body' => 'A private crackling bonfire lit right beside your personal dome deck with firewood, seating, and starlit serenity.',
            'when' => 'Night',
            'price' => '₹1,000/- (per dome)',
            'badge' => 'Add-On',
            'type' => 'addon',
            'img' => 'assets/images/private-bonfire.webp',
            'alt' => 'Private bonfire crackling beside a dome'
        ],
        [
            'n' => '09',
            'title' => 'Tabletop Barbecue Setup',
            'body' => 'A live charcoal tabletop grill setup on the ridge lawn as dusk falls and the valley sparkles below.',
            'when' => 'Evening',
            'price' => '₹900/- (per setup)',
            'badge' => 'Add-On',
            'type' => 'addon',
            'img' => 'assets/images/barbeque.webp',
            'alt' => 'Barbecue dinner under the evening sky'
        ],
        [
            'n' => '10',
            'title' => 'Evening Musical Bonfire',
            'body' => 'Communal campfire on the central lawn with acoustic melodies, warm drinks, and stargazing conversations.',
            'when' => '7:30 PM',
            'price' => 'Complimentary with Stay',
            'badge' => 'Included',
            'type' => 'included',
            'img' => 'assets/images/musical-bonfire.png',
            'alt' => 'Friends enjoying musical bonfire'
        ],
        [
            'n' => '11',
            'title' => 'Telescope Moongazing',
            'body' => 'Peer through our astronomical telescope at lunar craters, planetary alignments, and the celestial Milky Way.',
            'when' => '8:30 PM onwards',
            'price' => 'Complimentary with Stay',
            'badge' => 'Included',
            'type' => 'included',
            'img' => 'assets/images/banner5.webp',
            'alt' => 'Telescope for stargazing and moongazing'
        ],
        [
            'n' => '12',
            'title' => 'Heritage Expedition',
            'body' => 'Self-guided or concierge trail to Damagundam Ramalingeshwara Swami Temple, an 800-year-old architectural sanctuary nestled in Pudur.',
            'when' => 'Morning · Evening',
            'price' => 'Complimentary / Concierge Trail',
            'badge' => 'Explore',
            'type' => 'included',
            'img' => 'assets/images/gallery-4.webp',
            'alt' => 'Stone path lined with red foliage leading toward the forest'
        ]
    ];
}

/**
 * A Day Here Timeline
 */
function get_day_timeline() {
    $plateC = 'width:100%;aspect-ratio:3/4;object-fit:cover;display:block;border:6px solid #ece6d8;outline:1px solid rgba(29,42,38,.16);filter:sepia(.15) saturate(.9) contrast(1.04);';
    $raw = [
        ['time' => '6 am', 'title' => 'Sunrise Delight', 'body' => 'Crisp morning air and a panoramic view of the Vikarabad forest from your deck.', 'img' => 'assets/images/sunrise-delight.webp', 'alt' => 'Sunrise from a dome deck'],
        ['time' => '7 am', 'title' => 'Guided Trek', 'body' => 'Walk out to Bhiravakona, a 400-year-old Siva temple in the hills.', 'img' => 'assets/images/guided-trekking.png', 'alt' => 'Guest with arms wide over the fields'],
        ['time' => '8:30 am', 'title' => 'Horse Ride', 'body' => 'Well-trained horses, quiet paths through the greenery.', 'img' => 'assets/images/horse-ride.png', 'alt' => 'Horse ride past the domes'],
        ['time' => 'Late morning', 'title' => 'Floating Breakfast', 'body' => 'Served on the water, with the hills as your table setting.', 'img' => 'assets/images/floating-breakfast.webp', 'alt' => 'Floating breakfast tray in the pool'],
        ['time' => 'Afternoon', 'title' => 'The Pool', 'body' => 'Nothing to do but watch the weather move across the valley.', 'img' => 'assets/images/gallery-b3.webp', 'alt' => 'Infinity pool looking over the valley'],
        ['time' => '6 pm', 'title' => 'Sunset Spectacle', 'body' => 'The sky turns, and the domes glow.', 'img' => 'assets/images/sunset-spectacle.png', 'alt' => 'Domes at sunset'],
        ['time' => '7:30 pm', 'title' => 'Musical Bonfire', 'body' => 'Barbecue, music and a cozy fire under the stars.', 'img' => 'assets/images/musical-bonfire.png', 'alt' => 'Friends around a bonfire'],
        ['time' => 'Night', 'title' => 'Candlelight Dinner', 'body' => 'A table under the lanterns, then a sky full of stars.', 'img' => 'assets/images/candle-light-dinner.webp', 'alt' => 'Candlelit dinner table under lantern-lit trees']
    ];

    $count = count($raw);
    $out = [];
    foreach ($raw as $i => $d) {
        $t = $count > 1 ? $i / ($count - 1) : 0;
        $lift = round(sin($t * M_PI) * -36);
        $radius = ($i % 2 === 1) ? '999px 999px 0 0' : '0';
        $d['lift'] = $lift . 'px';
        $d['radius'] = $radius;
        $d['imgStyle'] = $plateC . 'border-radius:' . $radius . ';';
        $out[] = $d;
    }
    return $out;
}

/**
 * Reviews & Testimonials
 */
function get_reviews_data() {
    return [
        [
            'quote' => 'Glamp Inn Valley exceeded my expectations! The Domes were a dream, and the stargazing sessions were simply magical.',
            'name' => 'Shruthi Kumari',
            'handle' => '@ShruKu',
            'img' => 'assets/images/rev-shruthi.webp'
        ],
        [
            'quote' => "Glamp Inn Valley's eco-luxury concept is outstanding. A haven for nature enthusiasts and comfort seekers alike.",
            'name' => 'V Rahul',
            'handle' => '@rahul06',
            'img' => 'assets/images/rev-rahul.webp'
        ],
        [
            'quote' => 'Glamp Inn Valley is a hidden gem. Hiking and luxury seamlessly blend in this breathtaking retreat.',
            'name' => 'Awanthika P V',
            'handle' => '@awanthi996',
            'img' => 'assets/images/rev-awanthika.webp'
        ]
    ];
}

/**
 * Celebrations & Events
 */
function get_events_data() {
    return [
        [
            'title' => 'Proposals',
            'body' => 'Marry me in lights on the private lawn with lantern paths and bespoke floral setups.',
            'img' => 'assets/images/proposal.webp',
            'alt' => 'Marry me in lights on the lawn',
            'wa' => get_whatsapp_url("Hi Glamp Inn Valley, I'd like to plan a proposal.")
        ],
        [
            'title' => 'Birthdays',
            'body' => 'Intimate birthday decor under the stars with barbecue and personalized arrangements.',
            'img' => 'assets/images/birthday.webp',
            'alt' => 'Birthday decor at the valley',
            'wa' => get_whatsapp_url("Hi Glamp Inn Valley, I'd like to plan a birthday.")
        ],
        [
            'title' => 'Private Events',
            'body' => 'Exclusive dome compound bookings for family reunions and close-knit celebrations.',
            'img' => 'assets/images/private-events.webp',
            'alt' => 'Private event setup on the ridge',
            'wa' => get_whatsapp_url("Hi Glamp Inn Valley, I'd like to plan a private event.")
        ],
        [
            'title' => 'Weddings',
            'body' => 'Boutique hill weddings with panoramic valley backdrops and complete ridge exclusivity.',
            'img' => 'assets/images/wedding.webp',
            'alt' => 'Wedding decor overlooking the hills',
            'wa' => get_whatsapp_url("Hi Glamp Inn Valley, I'd like to plan a wedding.")
        ]
    ];
}

/**
 * Standard Inclusions (All 12 Stay Inclusions)
 */
function get_inclusions_data() {
    return [
        'Complimentary Breakfast for two, served fresh each morning',
        'Hi-Tea served in the refreshing hill breeze',
        'Evening snacks and savouries',
        'Access to Common Infinity Pool overlooking the valley',
        'Access to Horse Ranch & equestrian interaction',
        'Morning Guided Trekking to 400-year-old Bhiravakona temple',
        'Evening Musical Bonfire under the starlit sky',
        'Board Games for outdoor deck leisure (Chess, Carrom, Jenga)',
        'Continuous RO Purified Drinking Water',
        'Trampoline for children',
        'Dedicated Kids Play Area',
        'Telescope for Moongazing & celestial stargazing'
    ];
}

/**
 * Detailed Inclusions with icons and descriptions
 */
function get_inclusions_detailed() {
    return [
        ['icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 11l19-9-9 19-2-8-8-2z"/></svg>', 'title' => 'Breakfast', 'desc' => 'Wholesome morning breakfast spread prepared fresh daily for two guests.'],
        ['icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M18 8h1a4 4 0 0 1 0 8h-1"/><path d="M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z"/><line x1="6" y1="1" x2="6" y2="4"/><line x1="10" y1="1" x2="10" y2="4"/><line x1="14" y1="1" x2="14" y2="4"/></svg>', 'title' => 'Hi-Tea', 'desc' => 'Artisanal hot tea and coffee served against the scenic hill breeze.'],
        ['icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 2h18"/><path d="M3 2l2 20h14L21 2"/><path d="M8 10h8M7 15h10"/></svg>', 'title' => 'Evening Snacks', 'desc' => 'Delectable hot evening snacks as the sunset begins over the ridge.'],
        ['icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M2 12h20M2 12c0 5.523 4.477 10 10 10s10-4.477 10-10M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10"/><path d="M12 2v20"/></svg>', 'title' => 'Access to Common Infinity Pool', 'desc' => 'Perched right at the cliff edge with an uninterrupted valley panorama.'],
        ['icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="5" r="2"/><path d="M12 7v6l3 3"/><path d="M5.636 10.364A9 9 0 1 0 18.364 10.364"/><path d="M10 15l-3 3 3 3"/></svg>', 'title' => 'Access to Horse Ranch', 'desc' => 'Complimentary ranch visit to interact with our gentle thoroughbred horses.'],
        ['icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 17l4-8 4 4 4-6 4 10"/><circle cx="5" cy="19" r="1"/><circle cx="19" cy="19" r="1"/></svg>', 'title' => 'Morning Guided Trekking', 'desc' => 'Scenic guided trail through the forest to Bhiravakona 400-year Siva temple.'],
        ['icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 2c0 0-4 4-4 9a4 4 0 0 0 8 0c0-5-4-9-4-9z"/><path d="M12 11v3"/><line x1="8" y1="22" x2="16" y2="22"/></svg>', 'title' => 'Evening Musical Bonfire', 'desc' => 'Acoustic songs and storytelling around the glowing central campfire.'],
        ['icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="2" y="2" width="20" height="20" rx="2"/><rect x="7" y="7" width="4" height="4"/><rect x="13" y="7" width="4" height="4"/><rect x="7" y="13" width="4" height="4"/><rect x="13" y="13" width="4" height="4"/></svg>', 'title' => 'Board Games', 'desc' => 'Classic strategy & family deck games for quiet afternoon relaxation.'],
        ['icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 2v4M6.343 6.343l-2.828-2.828M4 12H2M6.343 17.657l-2.828 2.828M12 20v2M17.657 17.657l2.828 2.828M20 12h2M17.657 6.343l2.828-2.828"/><circle cx="12" cy="12" r="4"/></svg>', 'title' => 'RO Water', 'desc' => 'Pure, multi-stage mineral filtered drinking water throughout your stay.'],
        ['icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 2L2 7l10 5 10-5-10-5z"/><path d="M2 17l10 5 10-5"/><path d="M2 12l10 5 10-5"/></svg>', 'title' => 'Trampoline for Children', 'desc' => 'Safe spring-loaded outdoor trampoline fun for little adventurers.'],
        ['icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 3.582-7 8-7s8 3 8 7"/></svg>', 'title' => 'Kids Play Area', 'desc' => 'Safe open-air lawn play area designed for young children.'],
        ['icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/><line x1="11" y1="8" x2="11" y2="14"/><line x1="8" y1="11" x2="14" y2="11"/></svg>', 'title' => 'Telescope for Moongazing', 'desc' => 'High-power astronomical telescope for spotting lunar craters and constellations.']
    ];
}

/**
 * Active Adventure Package & Individual Activity Tariffs
 */
function get_active_package_data() {
    return [
        'title' => 'All-Together Active Package',
        'subtitle' => '4 Signature Hill Adventures in One Complete Combo',
        'combo_price' => '₹1,199',
        'combo_price_num' => 1199,
        'unit' => 'per person',
        'individual_total' => '₹1,594',
        'savings' => 'Save ₹395 per person',
        'single_price' => '₹399',
        'single_rule' => 'If guest asks or takes separate activity, guest needs to pay ₹399/- per person.',
        'gallery_url' => DRIVE_ACTIVITIES_GALLERY_URL,
        'activities' => [
            [
                'name' => 'Archery',
                'spec' => '10 shots',
                'price' => '₹399/-',
                'desc' => 'Recurve bow target archery with safety gear and coaching.'
            ],
            [
                'name' => 'Shooting',
                'spec' => '10 shots',
                'price' => '₹399/-',
                'desc' => 'Air-rifle precision target shooting challenge in open air.'
            ],
            [
                'name' => 'Horse Ride',
                'spec' => '15 mins',
                'price' => '₹399/-',
                'desc' => 'Scenic trail equestrian ride on gentle, trained ranch horses.'
            ],
            [
                'name' => 'Jungle Safari',
                'spec' => '1 hour',
                'price' => '₹399/-',
                'desc' => 'Exciting 1-hour open safari through rugged Vikarabad forest tracks.'
            ]
        ]
    ];
}

/**
 * Curated Special Experience & Dining Add-Ons
 */
function get_paid_addons_data() {
    return [
        [
            'name' => 'Floating Breakfast',
            'price' => '₹2,000/-',
            'unit' => '2 adults',
            'desc' => 'Deluxe morning feast served on a handcrafted floating wicker tray in the infinity pool.',
            'img' => 'assets/images/floating-breakfast.webp'
        ],
        [
            'name' => 'Candle Light Dinner Setup',
            'price' => '₹1,500/-',
            'unit' => 'per setup',
            'desc' => 'Romantic lantern-lit dining table arrangement with floral decoration under the trees.',
            'img' => 'assets/images/candle-light-dinner.webp'
        ],
        [
            'name' => 'Safari Ride',
            'price' => '₹550/-',
            'unit' => 'per head',
            'desc' => 'Standalone 1-hour open forest safari through scenic Vikarabad woodland trails.',
            'img' => 'assets/images/guided-trekking.png'
        ],
        [
            'name' => 'Private Bonfire',
            'price' => '₹1,000/-',
            'unit' => 'per dome',
            'desc' => 'Personal crackling fire lit beside your dome deck with firewood and warm seating.',
            'img' => 'assets/images/private-bonfire.webp'
        ],
        [
            'name' => 'Horse Riding',
            'price' => '₹400/-',
            'unit' => 'per head',
            'desc' => 'Dedicated trail horseback riding experience with professional handlers.',
            'img' => 'assets/images/horse-ride.png'
        ],
        [
            'name' => 'Barbecue Setup',
            'price' => '₹900/-',
            'unit' => 'per setup',
            'desc' => 'Tabletop live charcoal grill arrangement on the ridge lawn as dusk settles.',
            'img' => 'assets/images/barbeque.webp'
        ]
    ];
}

/**
 * WhatsApp Community Benefits
 */
function get_community_benefits_data() {
    return [
        ['icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg>', 'title' => 'Last Minute Booking Updates', 'desc' => 'Instant alerts on last-minute weekend cancellations & open slots.'],
        ['icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 12 20 22 4 22 4 12"/><rect x="2" y="7" width="20" height="5"/><line x1="12" y1="22" x2="12" y2="7"/><path d="M12 7H7.5a2.5 2.5 0 0 1 0-5C11 2 12 7 12 7z"/><path d="M12 7h4.5a2.5 2.5 0 0 0 0-5C13 2 12 7 12 7z"/></svg>', 'title' => 'Exclusive Offers', 'desc' => 'Member-only promotional tariffs, seasonal packages, and discounts.'],
        ['icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>', 'title' => 'Upcoming Events', 'desc' => 'Priority announcements for stargazing nights, musical festivals & retreats.'],
        ['icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>', 'title' => 'Collaborations', 'desc' => 'Partnerships for creators, wellness coaches, photographers & influencers.'],
        ['icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg>', 'title' => 'Corporate Discounts', 'desc' => 'Bespoke corporate offsite packages and group property buyouts.'],
        ['icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg>', 'title' => 'Customer Stories', 'desc' => 'Real guest photo stories, travel diaries, and memorable valley reels.']
    ];
}

/**
 * Stay Policies & Essential Information
 */
function get_policies_data() {
    return [
        ['k' => 'Check-in / out', 'v' => 'Check-in 2:00 PM · Check-out 11:00 AM. Early check-in or late check-out on prior request, subject to availability.'],
        ['k' => 'Extra Occupants', 'v' => 'Extra Adult: ₹2,000/- on Weekdays | ₹2,500/- on Weekends. Extra Kid (3–12 yrs): ₹2,000/- on Weekdays | ₹2,500/- on Weekends. Children under 3 stay free with parents.'],
        ['k' => 'Tariff Calendar', 'v' => 'Weekdays: Monday to Thursday · Weekends: Friday to Sunday.'],
        ['k' => 'Pool Attire Rule', 'v' => 'Wearing proper swimming attire made of nylon fabric is mandatory for entry into the pool. This policy ensures hygiene, safety, and best swimming experience for all.'],
        ['k' => 'Weather Notice', 'v' => 'If there is rainfall, outdoor activities might not happen for guest safety.'],
        ['k' => 'Payment Policy', 'v' => '50% advance to confirm reservation, balance payable at check-in. UPI, cards and bank transfer accepted.'],
        ['k' => 'Cancellation', 'v' => 'Full refund up to 7 days before arrival; 50% refund up to 72 hours; non-refundable within 72 hours.'],
        ['k' => 'Pets & Smoking', 'v' => 'No pets allowed to protect indigenous wildlife. No smoking inside the domes; outdoor private decks are fine.']
    ];
}
