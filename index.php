<?php
require __DIR__ . '/includes/bootstrap.php';

$page = 'home';
$pageDescription = 'Not tomorrow, but today. Vida Alma turns compassion into action and makes a difference in our communities.';
require __DIR__ . '/includes/header.php';
?>

<section class="hero">
    <div class="hero__art" aria-hidden="true">
        <img class="hero__img" src="assets/img/hero-home.jpg" width="1170" height="585" alt="" fetchpriority="high">
    </div>
    <div class="container hero__inner">
        <div class="hero__content">
            <div class="eyebrow-rule" aria-hidden="true"><span></span><?= svg_sunburst() ?><span></span></div>
            <h1 class="hero__title reveal">Not tomorrow,<br><span class="indent">but <em>today.</em></span></h1>
            <p class="hero__lead reveal">Every day is an opportunity to turn compassion into action and make a difference in our communities.</p>
            <div class="hero__actions reveal">
                <a class="btn btn--primary" href="about.php">Discover Our Mission</a>
                <a class="btn btn--outline" href="get-involved.php">Get Involved</a>
            </div>
        </div>
    </div>
</section>

<section class="pillars" aria-label="Our areas of work">
    <div class="container">
        <ul class="pillars__list pillars__list--six">
            <?php foreach ($PILLARS as $slug => $pillar): ?>
                <li class="pillars__item reveal">
                    <a href="our-work.php#<?= e($slug) ?>" class="pillar pillar--<?= e($pillar['color']) ?>" title="<?= e($pillar['text']) ?>">
                        <?= icon($pillar['icon'], 'pillar__icon') ?>
                        <span class="pillar__title"><?= e($pillar['title']) ?></span>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>

<section class="feature">
    <div class="feature__art reveal">
        <img class="feature__img" src="assets/img/home-together.jpg" width="1170" height="585" alt="Volunteers planting a tree, handing a care package to an older woman, and walking with a child beside a lake at sunrise" loading="lazy" decoding="async">
    </div>
    <div class="feature__content reveal">
        <h2 class="feature__title"><em>Meaningful change,<br>built together.</em></h2>
        <p>Through people, communities, and collective action, we create lasting and inclusive change.</p>
        <a class="btn btn--primary" href="our-work.php">Explore Our Work <?= icon('arrow', 'btn__icon') ?></a>
    </div>
</section>

<div class="tagline-divider" aria-hidden="false">
    <span class="tagline-divider__line"></span>
    <p><?= svg_sunburst('tagline-divider__sun') ?><em><?= e(SITE_TAGLINE) ?></em></p>
    <span class="tagline-divider__line"></span>
</div>

<section class="section section--tint faq" id="faq" aria-labelledby="faq-title">
    <div class="container faq__inner">
        <div class="faq__intro reveal">
            <p class="eyebrow">FAQs</p>
            <h2 id="faq-title" class="section__title">Frequently asked <em>questions</em></h2>
            <p>New to Vida Alma? Here's what people most often ask about who we are, how we work and how to get involved.</p>
            <p>Still have a question?</p>
            <a class="btn btn--outline" href="contact.php">Get in Touch</a>
        </div>
        <div class="faq__list reveal">
            <?php foreach ($FAQS as $i => $faq): ?>
                <details class="faq__item"<?= $i === 0 ? ' open' : '' ?>>
                    <summary class="faq__question">
                        <span><?= e($faq['q']) ?></span>
                        <span class="faq__toggle" aria-hidden="true"></span>
                    </summary>
                    <div class="faq__answer">
                        <?php foreach ($faq['a'] as $paragraph): ?>
                            <p><?= faq_text($paragraph) ?></p>
                        <?php endforeach; ?>
                    </div>
                </details>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php include __DIR__ . '/includes/cta.php'; ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
