<?php
require __DIR__ . '/includes/bootstrap.php';

$page = 'about';
$pageTitle = 'About';
$pageDescription = 'Who we are, why we started, and the values behind every Vida Alma program.';
$heroTitle = 'The soul of';
$heroAccent = 'every action.';
$heroLead = 'Vida Alma is a youth-led, non-profit organization focused on human welfare and community empowerment. We uplift underserved children, families, senior citizens, unemployed individuals, and other vulnerable groups through humanitarian outreach, resource distribution, community development, and environmental initiatives.
';
require __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/page-hero.php';
?>

<section class="section">
    <div class="container split">
        <div class="split__text reveal">
            <h2 class="section__title">Our story</h2>
            <p>Vida Alma combines vida, the Spanish word for “life,” and alma, the Spanish word for “soul”. Together, the name represents “the soul of life,” reflecting the spirit that moves us to encourage one another, take action, and make a difference. Inspired by the sunrise that welcomes a new day, Vida Alma embodies hope and renewal, reminding us that we do not have to wait for tomorrow to make today brighter through purposeful action.
            </p>
            <p>Vida Alma advocates for restoring dignity and promoting self-sufficiency among underserved communities. We believe support should go beyond meeting immediate needs; it should empower people to access opportunities, overcome barriers, and actively improve their own circumstances. Our advocacy brings together humanitarian service, community empowerment, and environmental responsibility to foster stronger, more inclusive, and sustainable communities.
            </p>
        </div>
        <div class="split__art reveal"><?= svg_landscape('terracotta', 'Illustration of a warm sunrise over hills and water.') ?></div>
    </div>
</section>

<section class="section section--tint">
    <div class="container mission-grid">
        <div class="mission reveal">
            <?= icon('heart', 'mission__icon') ?>
            <h2 class="mission__title">Our mission</h2>
            <p>To mobilize young people and individuals of all ages through donation drives, volunteer opportunities, fundraising, and community outreach. By gathering resources, partnering with communities, and organizing humanitarian and environmental initiatives, we aim to address immediate needs while encouraging active participation in long-term community development.</p>
        </div>
        <div class="mission reveal">
            <?= icon('sprout', 'mission__icon') ?>
            <h2 class="mission__title">Our vision</h2>
            <p>We envision a society where every person can live with dignity, communities have the capacity to address their own challenges, and people share responsibility for the world around them. We aspire to help create communities that are not only supported in times of need but are also equipped to grow, adapt, and sustain their progress.
            </p>
        </div>
    </div>
</section>

<section class="section" aria-labelledby="values-title">
    <div class="container">
        <h2 id="values-title" class="section__title section__title--center">What we stand for</h2>
        <ol class="values">
            <?php foreach ($VALUES as $i => $value): ?>
                <li class="value reveal">
                    <span class="value__num"><?= str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT) ?></span>
                    <h3 class="value__title"><?= e($value['title']) ?></h3>
                    <p><?= e($value['text']) ?></p>
                </li>
            <?php endforeach; ?>
        </ol>
    </div>
</section>

<section class="section section--tint" aria-labelledby="team-title">
    <div class="container">
        <h2 id="team-title" class="section__title section__title--center">The people behind Vida Alma</h2>
        <p class="section__intro">A small staff team, supported by a board of community members and volunteers.</p>
        <ul class="team">
            <?php foreach (array_merge($TEAM, $COMMITTEE) as $member): ?>
                <li class="team__member reveal">
                    <?= svg_avatar($member['tone']) ?>
                    <h3 class="team__name"><?= e($member['name']) ?></h3>
                    <p class="team__role"><?= e($member['role']) ?></p>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>

<?php include __DIR__ . '/includes/cta.php'; ?>
<?php require __DIR__ . '/includes/footer.php'; ?>
