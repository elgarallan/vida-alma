<?php /** Expects $post from $POSTS. */ ?>
<article class="card reveal" data-category="<?= e($post['category']) ?>">
    <a class="card__link" href="updates.php?post=<?= e(urlencode($post['slug'])) ?>">
        <div class="card__art"><?= svg_landscape($post['scene'], '', false) ?></div>
        <div class="card__body">
            <p class="card__meta">
                <span class="tag"><?= e($post['category']) ?></span>
                <time datetime="<?= e($post['date']) ?>"><?= e(format_date($post['date'])) ?></time>
            </p>
            <h3 class="card__title"><?= e($post['title']) ?></h3>
            <p class="card__excerpt"><?= e($post['excerpt']) ?></p>
            <span class="card__more">Read more <?= icon('arrow') ?></span>
        </div>
    </a>
</article>
