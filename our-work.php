<?php
require __DIR__ . '/includes/bootstrap.php';

$page = 'our-work';
$pageTitle = 'Our Work';
$pageDescription = 'Community empowerment, environmental sustainability, partnerships, fund raising, direct service and long-term development: the six areas of Vida Alma\'s work.';
$heroTitle = 'Meaningful change,';
$heroAccent = 'built together.';
$heroLead = 'Through people, communities, and collective action, we create lasting and inclusive change. Our work comes together in six connected areas, from one-day drives to long-term partnerships.';
$heroScene = 'olive';
require __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/page-hero.php';
?>

<nav class="pillar-nav" aria-label="Areas of work">
    <div class="container">
        <ul>
            <?php foreach ($PILLARS as $slug => $pillar): ?>
                <li><a class="pillar-nav__link pillar--<?= e($pillar['color']) ?>" href="#<?= e($slug) ?>"><?= icon($pillar['icon']) ?><span><?= e($pillar['title']) ?></span></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
</nav>

<?php $i = 0; foreach ($PILLARS as $slug => $pillar): $i++; ?>
    <section class="work-area <?= $i % 2 === 0 ? 'work-area--reverse section--tint' : '' ?>" id="<?= e($slug) ?>">
        <div class="container split">
            <div class="split__text reveal">
                <div class="work-area__icon pillar--<?= e($pillar['color']) ?>"><?= icon($pillar['icon']) ?></div>
                <h2 class="section__title"><?= e($pillar['title']) ?></h2>
                <p class="work-area__intro"><?= e($pillar['intro']) ?></p>
                <p><?= e($pillar['body']) ?></p>
                <ul class="checklist">
                    <?php foreach ($pillar['points'] as $point): ?>
                        <li><?= icon('check') ?><?= e($point) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="split__art reveal">
                <?= svg_landscape($pillar['scene'], 'Illustration for ' . $pillar['title'] . '.') ?>
            </div>
        </div>
    </section>
<?php endforeach; ?>

<?php include __DIR__ . '/includes/cta.php'; ?>
<?php require __DIR__ . '/includes/footer.php'; ?>
