<?php
require __DIR__ . '/includes/bootstrap.php';

$page = 'get-involved';
$pageTitle = 'Get Involved';
$pageDescription = 'Volunteer, donate or partner with Vida Alma. Every contribution turns into action in our communities.';
$heroTitle = 'Every hand';
$heroAccent = 'makes it lighter.';
$heroLead = 'Whether you have an hour a month, a skill to share or resources to give, there\'s a place for you at Vida Alma.';
$heroScene = 'terracotta';
require __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/page-hero.php';
?>

<section class="section">
    <div class="container">
        <ul class="ways">
            <li class="way reveal">
                <?= icon('people', 'way__icon') ?>
                <h2 class="way__title">Volunteer</h2>
                <p>Help prepare supplies, organize activities, join outreach or share your skills.</p>
                <a class="link-arrow" href="#volunteer">Find out how <?= icon('arrow') ?></a>
            </li>
            <li class="way reveal">
                <?= icon('heart', 'way__icon') ?>
                <h2 class="way__title">Donate</h2>
                <p>Give funds or goods. Every contribution goes to the stated needs of each initiative.</p>
                <a class="link-arrow" href="#donate">Give today <?= icon('arrow') ?></a>
            </li>
            <li class="way reveal">
                <?= icon('handshake', 'way__icon') ?>
                <h2 class="way__title">Partner</h2>
                <p>Businesses, schools, nonprofits and community groups can sponsor or co-organize projects.</p>
                <a class="link-arrow" href="<?= e(mailto('Partnership inquiry')) ?>">Email us <?= icon('arrow') ?></a>
            </li>
        </ul>
    </div>
</section>

<section class="section section--tint" id="volunteer">
    <div class="container split split--form">
        <div class="split__text reveal">
            <h2 class="section__title">Volunteer with us</h2>
            <p>We welcome individuals, student groups and organizations who share our ideals of compassion and responsible community service. Depending on the initiative, volunteers may help prepare supplies, organize activities, assist with outreach or contribute relevant skills.</p>
            <ul class="checklist">
                <li><?= icon('check') ?>Open to all ages and backgrounds</li>
                <li><?= icon('check') ?>Join the initiatives that fit your schedule</li>
                <li><?= icon('check') ?>Opportunities announced on our official channels</li>
            </ul>
        </div>

        <div class="email-card reveal">
            <span class="email-card__icon"><?= icon('gmail') ?></span>
            <h3 class="email-card__title">Send us an email</h3>
            <p>Tell us a little about yourself and include:</p>
            <ul class="email-card__list">
                <li>Your name</li>
                <li>Which area you'd like to help with</li>
                <li>When you're usually available</li>
            </ul>
            <a class="btn btn--primary btn--block" href="<?= e(mailto('Volunteer sign-up', "Hi Vida Alma,\n\nI'd like to volunteer.\n\nName:\nArea I'd like to help with:\nAvailability:\n\nThank you!")) ?>">Email Us to Volunteer</a>
            <p class="email-card__address">or write to <a href="mailto:<?= e(SITE_EMAIL) ?>"><?= e(SITE_EMAIL) ?></a></p>
        </div>
    </div>
</section>

<section class="section" id="donate">
    <div class="container split split--form">
        <div class="split__text reveal">
            <h2 class="section__title">Make a donation</h2>
            <p>Every contribution supports the stated needs of each initiative, from essential supplies to outreach costs. We document how donations are used and share reports with our donors and sponsors.</p>
            <ol class="steps">
                <li><span class="steps__num">1</span><div><strong>Scan the QR code</strong> using your e-wallet or banking app.</div></li>
                <li><span class="steps__num">2</span><div><strong>Enter any amount</strong> you'd like to give and complete the transfer.</div></li>
                <li><span class="steps__num">3</span><div><strong>Send us your receipt</strong> at <a href="mailto:<?= e(SITE_EMAIL) ?>"><?= e(SITE_EMAIL) ?></a> so we can thank you and record your gift.</div></li>
            </ol>
            <p class="form-note form-note--left">Prefer to give goods? We also accept in-kind donations such as non-perishable food, hygiene products, clothing and school supplies. Requirements are announced before each drive.</p>
        </div>

        <div class="qr-card reveal">
            <p class="eyebrow">Scan to donate</p>
            <?php if (DONATION_QR_IMAGE !== '' && is_file(__DIR__ . '/' . DONATION_QR_IMAGE)): ?>
                <img class="qr-card__image" src="<?= e(DONATION_QR_IMAGE) ?>" alt="QR code for donating to <?= e(SITE_NAME) ?>" width="280" height="280">
            <?php else: ?>
                <div class="qr-card__placeholder" role="img" aria-label="QR code coming soon">
                    <?= svg_qr_placeholder() ?>
                    <span class="qr-card__soon">QR code coming soon</span>
                </div>
            <?php endif; ?>
            <?php if (DONATION_ACCOUNT_NAME !== ''): ?>
                <p class="qr-card__account"><span>Account name</span><strong><?= e(DONATION_ACCOUNT_NAME) ?></strong></p>
            <?php endif; ?>
            <p class="qr-card__note"><?= icon('heart') ?> Thank you for helping make today brighter.</p>
        </div>
    </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
