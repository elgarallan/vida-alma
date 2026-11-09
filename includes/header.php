<?php
/**
 * Expects: $page (key from NAV_ITEMS), $pageTitle, $pageDescription.
 */
$page = $page ?? 'home';
$fullTitle = isset($pageTitle) ? $pageTitle . ' | ' . SITE_NAME : SITE_NAME . ' | Not tomorrow, but today.';
$description = $pageDescription ?? 'Vida Alma is a foundation turning compassion into action through people, communities and collective change.';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= e($fullTitle) ?></title>
    <meta name="description" content="<?= e($description) ?>">
    <meta name="theme-color" content="#FBF1E4">
    <meta property="og:title" content="<?= e($fullTitle) ?>">
    <meta property="og:description" content="<?= e($description) ?>">
    <script>document.documentElement.classList.add('js');</script>
    <link rel="icon" href="assets/img/favicon-32.png" type="image/png" sizes="32x32">
    <link rel="icon" href="assets/img/icon-512.png" type="image/png" sizes="512x512">
    <link rel="apple-touch-icon" href="assets/img/apple-touch-icon.png">
    <meta property="og:image" content="<?= e(SITE_URL) ?>/assets/img/logo-full.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,400;0,9..144,500;0,9..144,600;1,9..144,400;1,9..144,500&family=Nunito+Sans:opsz,wght@6..12,400;6..12,600;6..12,700&display=swap" rel="stylesheet">
    <?php // The version number changes whenever a file is edited, so browsers always load the latest copy. ?>
    <link rel="stylesheet" href="assets/css/style.css?v=<?= filemtime(__DIR__ . '/../assets/css/style.css') ?>">
    <script src="assets/js/main.js?v=<?= filemtime(__DIR__ . '/../assets/js/main.js') ?>" defer></script>
</head>
<body class="page-<?= e($page) ?>">
<a class="skip-link" href="#main">Skip to content</a>

<header class="site-header" data-header>
    <div class="container site-header__inner">
        <a class="brand" href="index.php" aria-label="<?= e(SITE_NAME) ?> home">
            <?= svg_logo() ?>
            <span class="brand__name"><?= e(strtoupper(SITE_NAME)) ?></span>
        </a>

        <button class="nav-toggle" type="button" aria-expanded="false" aria-controls="site-nav" data-nav-toggle>
            <span class="nav-toggle__bar"></span>
            <span class="nav-toggle__bar"></span>
            <span class="nav-toggle__bar"></span>
            <span class="visually-hidden">Menu</span>
        </button>

        <nav class="site-nav" id="site-nav" aria-label="Main" data-nav>
            <ul>
                <?php foreach (NAV_ITEMS as $key => [$label, $href]): ?>
                    <li>
                        <a href="<?= e($href) ?>"<?= $key === $page ? ' class="is-active" aria-current="page"' : '' ?>><?= e($label) ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>
    </div>
</header>

<main id="main">
