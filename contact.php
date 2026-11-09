<?php
require __DIR__ . '/includes/bootstrap.php';

// Quick email buttons on the Contact page: label => email subject.
$topics = [
    'General inquiry' => 'General inquiry',
    'Volunteering'    => 'Volunteer sign-up',
    'Donations'       => 'Donation inquiry',
    'Partnerships'    => 'Partnership inquiry',
];

$page = 'contact';
$pageTitle = 'Contact';
$pageDescription = 'Get in touch with the Vida Alma team.';
$heroTitle = 'Let\'s talk';
$heroAccent = 'today.';
$heroLead = 'Questions, ideas or a project you\'d like to build together? We\'d love to hear from you.';
require __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/page-hero.php';
?>

<section class="section">
    <div class="container split split--form">
        <div class="split__text reveal">
            <h2 class="section__title">Get in touch</h2>
            <p>The best way to reach us is by email. You can also say hello or send us a message on social media.</p>
            <ul class="contact-list">
                <li><?= icon('gmail') ?><div><strong>Email</strong><a href="mailto:<?= e(SITE_EMAIL) ?>"><?= e(SITE_EMAIL) ?></a></div></li>
                <?php foreach (SOCIAL_LINKS as $name => $social): ?>
                    <li><?= icon($social['icon']) ?><div><strong><?= e($name) ?></strong><a href="<?= e($social['url']) ?>" rel="noopener" target="_blank"><?= e($social['handle']) ?></a></div></li>
                <?php endforeach; ?>
                <?php if (SITE_PHONE !== ''): ?>
                    <li><?= icon('phone') ?><div><strong>Phone</strong><a href="tel:<?= e(preg_replace('/[^0-9+]/', '', SITE_PHONE)) ?>"><?= e(SITE_PHONE) ?></a></div></li>
                <?php endif; ?>
                <?php if (SITE_ADDRESS !== ''): ?>
                    <li><?= icon('pin') ?><div><strong>Visit</strong><span><?= e(SITE_ADDRESS) ?></span></div></li>
                <?php endif; ?>
            </ul>
        </div>

        <div class="email-card reveal">
            <span class="email-card__icon"><?= icon('gmail') ?></span>
            <h3 class="email-card__title">Email us</h3>
            <p>Choose a topic to open a new email with the subject already filled in.</p>
            <ul class="email-topics">
                <?php foreach ($topics as $label => $subject): ?>
                    <li><a class="email-topic" href="<?= e(mailto($subject)) ?>"><span><?= e($label) ?></span><?= icon('arrow') ?></a></li>
                <?php endforeach; ?>
            </ul>
            <p class="email-card__address">or write to <a href="mailto:<?= e(SITE_EMAIL) ?>"><?= e(SITE_EMAIL) ?></a></p>
        </div>
    </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
