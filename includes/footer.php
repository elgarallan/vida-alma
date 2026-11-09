</main>

<footer class="site-footer">
    <div class="container site-footer__grid">
        <div class="site-footer__brand">
            <a class="brand" href="index.php" aria-label="<?= e(SITE_NAME) ?> home">
                <?= svg_logo() ?>
                <span class="brand__name"><?= e(strtoupper(SITE_NAME)) ?></span>
            </a>
            <p>Turning compassion into action, every day, in the communities we share.</p>
            <ul class="social">
                <?php foreach (SOCIAL_LINKS as $name => $social): ?>
                    <li>
                        <a href="<?= e($social['url']) ?>" rel="noopener" target="_blank" aria-label="<?= e(SITE_NAME . ' on ' . $name) ?>" title="<?= e($name . ': ' . $social['handle']) ?>">
                            <?= icon($social['icon']) ?>
                        </a>
                    </li>
                <?php endforeach; ?>
                <li>
                    <a href="mailto:<?= e(SITE_EMAIL) ?>" aria-label="Email <?= e(SITE_NAME) ?>" title="<?= e(SITE_EMAIL) ?>"><?= icon('gmail') ?></a>
                </li>
            </ul>
        </div>

        <nav class="site-footer__links" aria-label="Footer">
            <h2 class="site-footer__heading">Explore</h2>
            <ul>
                <?php foreach (NAV_ITEMS as [$label, $href]): ?>
                    <li><a href="<?= e($href) ?>"><?= e($label) ?></a></li>
                <?php endforeach; ?>
            </ul>
        </nav>

        <div class="site-footer__contact">
            <h2 class="site-footer__heading">Contact</h2>
            <ul class="contact-links">
                <li><a href="mailto:<?= e(SITE_EMAIL) ?>" aria-label="Email: <?= e(SITE_EMAIL) ?>"><?= icon('gmail') ?><span><?= e(SITE_EMAIL) ?></span></a></li>
                <?php foreach (SOCIAL_LINKS as $name => $social): ?>
                    <li><a href="<?= e($social['url']) ?>" rel="noopener" target="_blank" aria-label="<?= e($name . ': ' . $social['handle']) ?>"><?= icon($social['icon']) ?><span><?= e($social['handle']) ?></span></a></li>
                <?php endforeach; ?>
                <?php if (SITE_PHONE !== ''): ?>
                    <li><a href="tel:<?= e(preg_replace('/[^0-9+]/', '', SITE_PHONE)) ?>"><?= icon('phone') ?><span><?= e(SITE_PHONE) ?></span></a></li>
                <?php endif; ?>
                <?php if (SITE_ADDRESS !== ''): ?>
                    <li><span class="contact-links__text"><?= icon('pin') ?><span><?= e(SITE_ADDRESS) ?></span></span></li>
                <?php endif; ?>
            </ul>
        </div>

        <div class="site-footer__newsletter">
            <h2 class="site-footer__heading">Stay in touch</h2>
            <p>Want announcements, upcoming drives and volunteer opportunities in your inbox? Send us an email to join our mailing list.</p>
            <a class="btn btn--primary" href="<?= e(mailto('Subscribe to updates', "Hi Vida Alma,\n\nPlease add me to your mailing list.\n\nThank you!")) ?>"><?= icon('gmail', 'btn__icon') ?> Email to Subscribe</a>
        </div>
    </div>

    <div class="container site-footer__bottom">
        <p>&copy; <?= date('Y') ?> <?= e(SITE_NAME) ?> Foundation. All rights reserved.</p>
        <p class="site-footer__tagline"><?= e(SITE_TAGLINE) ?></p>
    </div>
</footer>
</body>
</html>
