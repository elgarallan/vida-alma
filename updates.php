<?php
require __DIR__ . '/includes/bootstrap.php';

$page = 'updates';
$slug = isset($_GET['post']) && is_string($_GET['post']) ? $_GET['post'] : '';
$post = $slug !== '' ? find_post($POSTS, $slug) : null;

if ($slug !== '' && !$post) {
    http_response_code(404);
}

$categories = array_values(array_unique(array_column($POSTS, 'category')));
$active = isset($_GET['category']) && in_array($_GET['category'], $categories, true) ? $_GET['category'] : '';

if ($post) {
    $pageTitle = $post['title'];
    $pageDescription = $post['excerpt'];
} else {
    $pageTitle = 'Updates';
    $pageDescription = 'News and stories from Vida Alma\'s programs and communities.';
    $heroTitle = 'Stories from';
    $heroAccent = 'the field.';
    $heroLead = $POSTS
        ? 'News, milestones and the people making change happen in our communities.'
        : 'News, milestones and announcements from Vida Alma will appear here.';
    $heroScene = 'teal';
}

require __DIR__ . '/includes/header.php';
?>

<?php if ($post): ?>
    <article class="post">
        <div class="container container--narrow">
            <a class="link-back" href="updates.php">&larr; All updates</a>
            <p class="card__meta">
                <span class="tag"><?= e($post['category']) ?></span>
                <time datetime="<?= e($post['date']) ?>"><?= e(format_date($post['date'])) ?></time>
            </p>
            <h1 class="post__title"><?= e($post['title']) ?></h1>
            <p class="post__lead"><?= e($post['excerpt']) ?></p>
        </div>
        <div class="container post__art"><?= svg_landscape($post['scene'], 'Illustration for this story.') ?></div>
        <div class="container container--narrow post__body">
            <?php foreach ($post['body'] as $paragraph): ?>
                <p><?= e($paragraph) ?></p>
            <?php endforeach; ?>
            <div class="post__footer">
                <a class="btn btn--primary" href="get-involved.php">Get Involved</a>
                <a class="btn btn--outline" href="updates.php">More updates</a>
            </div>
        </div>
    </article>

<?php elseif ($slug !== ''): ?>
    <section class="section">
        <div class="container container--narrow empty-state">
            <h1 class="section__title">We couldn't find that story</h1>
            <p>It may have moved. Have a look at our latest updates instead.</p>
            <a class="btn btn--primary" href="updates.php">See all updates</a>
        </div>
    </section>

<?php else: ?>
    <?php include __DIR__ . '/includes/page-hero.php'; ?>
    <?php if (!$POSTS): ?>
    <section class="section">
        <div class="container container--narrow empty-state reveal">
            <?= svg_sunburst('empty-state__sun') ?>
            <h2 class="section__title">Our first stories are on the way</h2>
            <p>Vida Alma is just getting started. Follow us for announcements, upcoming drives and volunteer opportunities as they happen.</p>
            <div class="empty-state__actions">
                <?php foreach (SOCIAL_LINKS as $name => $social): ?>
                    <a class="btn btn--outline" href="<?= e($social['url']) ?>" target="_blank" rel="noopener"><?= icon($social['icon'], 'btn__icon') ?> <?= e($name) ?></a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php else: ?>
    <section class="section">
        <div class="container">
            <div class="filters" role="group" aria-label="Filter updates by area">
                <a class="filter<?= $active === '' ? ' is-active' : '' ?>" href="updates.php" data-filter=""<?= $active === '' ? ' aria-pressed="true"' : ' aria-pressed="false"' ?>>All</a>
                <?php foreach ($categories as $cat): ?>
                    <a class="filter<?= $active === $cat ? ' is-active' : '' ?>" href="updates.php?category=<?= e(urlencode($cat)) ?>" data-filter="<?= e($cat) ?>" aria-pressed="<?= $active === $cat ? 'true' : 'false' ?>"><?= e($cat) ?></a>
                <?php endforeach; ?>
            </div>
            <div class="card-grid" data-filter-grid>
                <?php foreach ($POSTS as $post): ?>
                    <?php if ($active === '' || $post['category'] === $active): ?>
                        <?php include __DIR__ . '/includes/post-card.php'; ?>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
            <p class="empty-note" data-filter-empty hidden>No updates in this area yet.</p>
        </div>
    </section>
    <?php endif; ?>
<?php endif; ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
