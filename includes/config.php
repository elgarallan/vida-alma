<?php
/**
 * Site-wide settings. Edit these values to update contact details everywhere.
 */

const SITE_NAME    = 'Vida Alma';
const SITE_TAGLINE = 'The soul of every action.';
const SITE_EMAIL   = 'vidaalmaorganization@gmail.com';
// Leave phone or address empty ('') to hide them on the site.
const SITE_PHONE   = '';
const SITE_ADDRESS = '';

// Donation QR code shown on Get Involved. Save the image as assets/img/donation-qr.png
// (or change the path) and it replaces the placeholder automatically.
const DONATION_QR_IMAGE     = 'assets/img/donation-qr.png';
// Optional: account name shown under the QR code. Leave '' to hide it.
const DONATION_ACCOUNT_NAME = '';

const SOCIAL_LINKS = [
    'Instagram' => [
        'url'    => 'https://www.instagram.com/vidaalma.ph/',
        'handle' => '@vidaalma.ph',
        'icon'   => 'instagram',
    ],
    'Facebook' => [
        'url'    => 'https://www.facebook.com/profile.php?id=61596114922131',
        'handle' => 'Vida Alma The Soul of Life',
        'icon'   => 'facebook',
    ],
];

const NAV_ITEMS = [
    'home'          => ['Home', 'index.php'],
    'about'         => ['About', 'about.php'],
    'our-work'      => ['Our Work', 'our-work.php'],
    'get-involved'  => ['Get Involved', 'get-involved.php'],
    'updates'       => ['Updates', 'updates.php'],
    'contact'       => ['Contact', 'contact.php'],
];
