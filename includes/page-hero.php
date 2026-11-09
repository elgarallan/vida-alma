<?php
/**
 * Inner-page banner. Expects $heroTitle, $heroAccent (italic part), $heroLead, optional $heroScene.
 */
?>
<section class="page-hero">
    <div class="page-hero__art" aria-hidden="true"><?= svg_landscape($heroScene ?? 'sun', '', true) ?></div>
    <?= svg_leaf_branch('page-hero__leaves') ?>
    <div class="container page-hero__inner">
        <div class="eyebrow-rule" aria-hidden="true"><span></span><?= svg_sunburst() ?><span></span></div>
        <h1 class="page-hero__title reveal"><?= e($heroTitle) ?> <em><?= e($heroAccent ?? '') ?></em></h1>
        <p class="page-hero__lead reveal"><?= e($heroLead) ?></p>
    </div>
</section>
