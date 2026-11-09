<?php
/**
 * Illustrations and icons drawn as inline SVG, styled after the brand mockup:
 * a rising sun, layered mountains, a lake and warm rolling hills.
 */

const PALETTE = [
    'sun'        => '#F4AE2A',
    'sunLight'   => '#F8C54E',
    'ray'        => '#F3A922',
    'pink'       => '#EFA88C',
    'blueFar'    => '#86B7C6',
    'blueMid'    => '#5C93AC',
    'blueLight'  => '#A9CFD6',
    'lake'       => '#8CC2CE',
    'yellow'     => '#F0B23F',
    'olive'      => '#9DA74F',
    'oliveDark'  => '#7D8A38',
    'orange'     => '#E5863A',
    'rust'       => '#D7662C',
    'road'       => '#F6E6CC',
    'leaf'       => '#6F7D35',
    'leafLight'  => '#8E9C46',
];

/** Unique id prefix so several SVGs can share a page without id clashes. */
function svg_uid(string $base): string
{
    static $n = 0;
    return $base . '-' . (++$n);
}

/** Tapered sun rays as polygons around a centre point. Angles in degrees (0 = right, 270 = up). */
function sun_rays(float $cx, float $cy, float $r, int $count, float $from, float $to, string $color, float $long, float $short): string
{
    $out = '';
    for ($i = 0; $i < $count; $i++) {
        $angle = deg2rad($from + ($to - $from) * $i / max(1, $count - 1));
        $len = $i % 2 === 0 ? $long : $short;
        $r1 = $r + 18;
        $r2 = $r1 + $len;
        $w1 = 2;
        $w2 = $i % 2 === 0 ? 7 : 5;
        $px = -sin($angle);
        $py = cos($angle);
        $pts = [
            [$cx + cos($angle) * $r1 + $px * $w1, $cy + sin($angle) * $r1 + $py * $w1],
            [$cx + cos($angle) * $r2 + $px * $w2, $cy + sin($angle) * $r2 + $py * $w2],
            [$cx + cos($angle) * $r2 - $px * $w2, $cy + sin($angle) * $r2 - $py * $w2],
            [$cx + cos($angle) * $r1 - $px * $w1, $cy + sin($angle) * $r1 - $py * $w1],
        ];
        $out .= '<polygon points="' . implode(' ', array_map(fn ($p) => round($p[0], 1) . ',' . round($p[1], 1), $pts)) . '" fill="' . $color . '"/>';
    }
    return $out;
}

/** Short white strokes that suggest light on water. */
function water_lines(array $lines): string
{
    $out = '';
    foreach ($lines as [$x, $y, $w]) {
        $out .= '<line x1="' . $x . '" y1="' . $y . '" x2="' . ($x + $w) . '" y2="' . $y . '" stroke="#fff" stroke-opacity=".75" stroke-width="2.4" stroke-linecap="round"/>';
    }
    return $out;
}

/** A small plant: a few leaves fanning out from a point. */
function plant(float $x, float $y, float $scale, string $color): string
{
    $leaf = 'M0 0 C 6 -10, 8 -26, 0 -40 C -8 -26, -6 -10, 0 0 Z';
    $out = '<g transform="translate(' . $x . ' ' . $y . ') scale(' . $scale . ')" fill="' . $color . '">';
    foreach ([-38, -14, 10, 34] as $rot) {
        $out .= '<path d="' . $leaf . '" transform="rotate(' . $rot . ')"/>';
    }
    return $out . '</g>';
}

/** Watercolor-style edge roughening filter. */
function watercolor_filter(string $id): string
{
    return '<filter id="' . $id . '" x="-2%" y="-2%" width="104%" height="104%">'
        . '<feTurbulence type="fractalNoise" baseFrequency="0.04" numOctaves="2" seed="7" result="n"/>'
        . '<feDisplacementMap in="SourceGraphic" in2="n" scale="3.5"/></filter>';
}

/** Hero illustration: mountains, lake, sun and four people helping each other up the hill. */
function svg_hero(): string
{
    $p = PALETTE;
    $id = svg_uid('hero');
    $rays = sun_rays(930, 250, 135, 17, 180, 352, $p['ray'], 95, 60);
    $filter = watercolor_filter($id . '-wc');
    $water = water_lines([[300, 330, 120], [470, 344, 80], [620, 326, 140], [820, 334, 90], [380, 360, 70], [540, 368, 110], [960, 322, 70], [260, 352, 50]]);
    $plants = plant(960, 470, 1.6, $p['leaf']) . plant(1040, 440, 1.3, $p['leafLight']) . plant(1075, 470, 1.9, $p['leaf']) . plant(1000, 300, 1.1, $p['leaf']);

    // One climber, drawn with feet at 0,0. Colours come from CSS variables on each <use>.
    $climber = <<<SVG
<g id="{$id}-climber" fill="none" stroke-linecap="round" stroke-linejoin="round">
  <path d="M0 -55 L-12 -30 L-26 -5" style="stroke:var(--bottom)" stroke-width="11"/>
  <path d="M-33 -3 L-20 -3" stroke="#2F2A33" stroke-width="7"/>
  <path d="M0 -55 L20 -42 L24 -16" style="stroke:var(--bottom)" stroke-width="11"/>
  <path d="M22 -13 L35 -13" stroke="#2F2A33" stroke-width="7"/>
  <path d="M10 -86 L-10 -79 L-34 -70" style="stroke:var(--top)" stroke-width="8"/>
  <path d="M0 -55 L12 -88" style="stroke:var(--top)" stroke-width="21"/>
  <path d="M14 -90 L36 -103 L56 -118" style="stroke:var(--top)" stroke-width="8"/>
  <circle cx="-35" cy="-70" r="4.6" fill="#C98A5E"/>
  <circle cx="57" cy="-119" r="4.6" fill="#C98A5E"/>
  <circle cx="23" cy="-107" r="11" fill="#C98A5E"/>
  <path d="M12 -104 C10 -118 24 -124 33 -114 C27 -114 21 -111 17 -100 Z" style="fill:var(--hair)"/>
</g>
SVG;

    return <<<SVG
<svg class="scene scene--hero" viewBox="0 0 1100 480" preserveAspectRatio="xMaxYMax slice" role="img" aria-label="Illustration: four people helping each other up a hill toward the rising sun, beside a lake and mountains.">
  <defs>
    {$climber}
    <linearGradient id="{$id}-lake" x1="0" y1="0" x2="0" y2="1"><stop offset="0" stop-color="#9ACAD4"/><stop offset="1" stop-color="#76B3C3"/></linearGradient>
    <radialGradient id="{$id}-sun" cx=".45" cy=".4" r=".7"><stop offset="0" stop-color="{$p['sunLight']}"/><stop offset="1" stop-color="{$p['sun']}"/></radialGradient>
    {$filter}
  </defs>
  <g class="scene__rays">{$rays}</g>
  <g filter="url(#{$id}-wc)">
    <circle cx="930" cy="250" r="135" fill="url(#{$id}-sun)"/>
    <path d="M500 300 C580 215 660 190 730 210 C800 232 850 270 905 300 Z" fill="{$p['pink']}"/>
    <path d="M250 318 C330 270 400 228 470 232 C540 236 580 285 650 300 L650 320 L250 320 Z" fill="{$p['blueFar']}"/>
    <path d="M560 312 C640 262 720 252 800 276 C860 294 900 300 980 312 Z" fill="{$p['blueMid']}"/>
    <path d="M380 322 C450 292 520 286 590 300 L620 322 Z" fill="{$p['blueLight']}"/>
    <rect x="200" y="308" width="900" height="80" fill="url(#{$id}-lake)"/>
    <path d="M230 480 C360 400 520 362 690 372 C780 378 840 330 920 300 L1100 292 L1100 480 Z" fill="{$p['yellow']}"/>
    <path d="M620 480 C750 380 900 296 1100 246 L1100 480 Z" fill="{$p['olive']}"/>
    <path d="M150 480 C300 430 430 404 560 422 C610 432 640 458 660 480 Z" fill="{$p['orange']}"/>
    <path d="M940 480 C985 408 1045 372 1100 362 L1100 480 Z" fill="{$p['rust']}"/>
    <path d="M470 480 C600 420 760 330 852 288 C866 282 890 282 906 288 C820 340 742 410 702 480 Z" fill="{$p['road']}"/>
  </g>
  <g class="scene__water">{$water}</g>
  <g class="scene__people">
    <use href="#{$id}-climber" x="575" y="452" style="--top:#2F6F98;--bottom:#2A5E86;--hair:#2F2A33"/>
    <use href="#{$id}-climber" x="665" y="404" style="--top:#F2B13A;--bottom:#E07A33;--hair:#B4562A"/>
    <use href="#{$id}-climber" x="755" y="356" style="--top:#7E8F3B;--bottom:#6C7C33;--hair:#2F2A33"/>
    <g transform="translate(858 298)" fill="none" stroke-linecap="round" stroke-linejoin="round">
      <path d="M6 -55 L0 -28 L-6 -3" stroke="#D96A2B" stroke-width="11"/>
      <path d="M6 -55 L16 -30 L22 -4" stroke="#D96A2B" stroke-width="11"/>
      <path d="M-12 -2 L0 -2 M18 -2 L30 -2" stroke="#2F2A33" stroke-width="7"/>
      <path d="M6 -55 L14 -90" stroke="#E57C34" stroke-width="21"/>
      <path d="M10 -86 L-16 -76 L-42 -62" stroke="#E57C34" stroke-width="8"/>
      <path d="M18 -86 L34 -74 L42 -58" stroke="#E57C34" stroke-width="8"/>
      <circle cx="-43" cy="-61" r="4.6" fill="#C98A5E"/>
      <circle cx="18" cy="-108" r="11" fill="#C98A5E"/>
      <path d="M8 -106 C6 -122 26 -126 30 -110 C34 -98 36 -88 40 -80 C30 -84 26 -96 24 -104 C18 -110 12 -108 8 -106 Z" fill="#9B4322"/>
    </g>
  </g>
  <g class="scene__plants">{$plants}</g>
</svg>
SVG;
}

/**
 * General landscape scene with a centred sun. Used for feature panels and update cards.
 * $variant shifts the foreground palette so cards look distinct.
 */
function svg_landscape(string $variant = 'sun', string $label = 'Illustration of a sun rising over mountains, a lake and rolling hills.', bool $plants = true): string
{
    $p = PALETTE;
    $id = svg_uid('land');

    $hills = [
        'sun'        => [$p['yellow'], $p['olive'], $p['orange'], $p['rust']],
        'teal'       => ['#9CC5B8', $p['olive'], '#5E9DAE', $p['oliveDark']],
        'terracotta' => [$p['orange'], $p['yellow'], $p['rust'], '#B9502A'],
        'olive'      => [$p['olive'], $p['yellow'], $p['oliveDark'], $p['orange']],
    ][$variant] ?? [$p['yellow'], $p['olive'], $p['orange'], $p['rust']];

    $rays = sun_rays(620, 205, 78, 13, 200, 340, $p['ray'], 62, 38);
    $water = water_lines([[180, 268, 70], [330, 280, 110], [520, 266, 60], [640, 284, 90], [260, 300, 60], [780, 272, 50], [450, 304, 80]]);
    $plantSvg = $plants
        ? plant(70, 400, 1.8, $p['leaf']) . plant(130, 405, 1.2, $p['leafLight']) . plant(810, 402, 1.5, $p['leaf']) . plant(860, 400, 1.1, $p['leafLight'])
        : '';
    $filter = watercolor_filter($id . '-wc');
    $a11y = $label === '' ? 'aria-hidden="true" focusable="false"' : 'role="img" aria-label="' . e($label) . '"';

    return <<<SVG
<svg class="scene" viewBox="0 0 900 400" preserveAspectRatio="xMidYMid slice" {$a11y}>
  <defs>
    {$filter}
    <linearGradient id="{$id}-lake" x1="0" y1="0" x2="0" y2="1"><stop offset="0" stop-color="#9ACAD4"/><stop offset="1" stop-color="#6FAEBE"/></linearGradient>
    <radialGradient id="{$id}-sun" cx=".45" cy=".4" r=".7"><stop offset="0" stop-color="{$p['sunLight']}"/><stop offset="1" stop-color="{$p['sun']}"/></radialGradient>
  </defs>
  <rect width="900" height="400" fill="#FBEFDF"/>
  <g class="scene__rays">{$rays}</g>
  <g filter="url(#{$id}-wc)">
    <circle cx="620" cy="205" r="78" fill="url(#{$id}-sun)"/>
    <path d="M0 210 C70 150 150 120 230 140 C290 156 330 190 380 214 L0 230 Z" fill="{$p['blueFar']}"/>
    <path d="M250 230 C330 150 420 130 500 160 C540 176 560 200 600 222 Z" fill="{$p['pink']}"/>
    <path d="M120 236 C200 196 280 190 360 210 C420 224 470 228 520 236 Z" fill="{$p['blueMid']}"/>
    <path d="M600 236 C680 200 760 196 900 214 L900 240 Z" fill="{$p['blueFar']}"/>
    <rect x="0" y="232" width="900" height="96" fill="url(#{$id}-lake)"/>
    <path d="M0 400 L0 330 C120 300 240 304 360 330 C420 344 470 370 520 400 Z" fill="{$hills[2]}"/>
    <path d="M300 400 C420 330 560 300 700 300 C780 300 840 290 900 270 L900 400 Z" fill="{$hills[0]}"/>
    <path d="M560 400 C660 340 780 312 900 300 L900 400 Z" fill="{$hills[1]}"/>
    <path d="M0 400 L0 360 C80 340 180 350 260 400 Z" fill="{$hills[3]}"/>
  </g>
  {$water}
  {$plantSvg}
</svg>
SVG;
}

/** Leafy branch used at the edges of sections. */
function svg_leaf_branch(string $class = '', int $leaves = 9): string
{
    // Points along a curved stem (quadratic bezier from bottom-left to top-right).
    [$x0, $y0, $cx, $cy, $x1, $y1] = [30, 330, 40, 140, 190, 30];
    $leafPath = 'M0 0 C 12 -14, 40 -16, 58 0 C 40 14, 12 14, 0 0 Z';
    $out = '';
    for ($i = 1; $i <= $leaves; $i++) {
        $t = $i / ($leaves + 1);
        $x = (1 - $t) ** 2 * $x0 + 2 * (1 - $t) * $t * $cx + $t ** 2 * $x1;
        $y = (1 - $t) ** 2 * $y0 + 2 * (1 - $t) * $t * $cy + $t ** 2 * $y1;
        $dx = 2 * (1 - $t) * ($cx - $x0) + 2 * $t * ($x1 - $cx);
        $dy = 2 * (1 - $t) * ($cy - $y0) + 2 * $t * ($y1 - $cy);
        $stemAngle = rad2deg(atan2($dy, $dx));
        $side = $i % 2 === 0 ? 1 : -1;
        $angle = $stemAngle + $side * 48;
        $scale = 0.75 + 0.35 * (1 - abs($t - 0.45));
        $fill = $i % 3 === 0 ? PALETTE['leafLight'] : PALETTE['leaf'];
        $out .= '<path d="' . $leafPath . '" fill="' . $fill . '" transform="translate(' . round($x, 1) . ' ' . round($y, 1) . ') rotate(' . round($angle, 1) . ') scale(' . round($scale, 2) . ')"/>';
    }
    $top = '<path d="' . $leafPath . '" fill="' . PALETTE['leafLight'] . '" transform="translate(190 30) rotate(-40) scale(.8)"/>';

    return '<svg class="leaf-branch ' . e($class) . '" viewBox="0 0 240 340" aria-hidden="true" focusable="false">'
        . '<path d="M' . $x0 . ' ' . $y0 . ' Q' . $cx . ' ' . $cy . ' ' . $x1 . ' ' . $y1 . '" fill="none" stroke="' . PALETTE['leaf'] . '" stroke-width="3" stroke-linecap="round"/>'
        . $out . $top . '</svg>';
}

/** Small half-sun with rays, used as a decorative divider above headings. */
function svg_sunburst(string $class = ''): string
{
    $rays = '';
    foreach ([200, 225, 250, 270, 290, 315, 340] as $i => $deg) {
        $a = deg2rad($deg);
        $len = $i % 2 === 0 ? 26 : 18;
        $rays .= sprintf(
            '<line x1="%.1f" y1="%.1f" x2="%.1f" y2="%.1f"/>',
            40 + cos($a) * 10, 40 + sin($a) * 10, 40 + cos($a) * (10 + $len), 40 + sin($a) * (10 + $len)
        );
    }
    return '<svg class="sunburst ' . e($class) . '" viewBox="0 0 80 44" aria-hidden="true" focusable="false">'
        . '<g stroke="currentColor" stroke-width="2.4" stroke-linecap="round">' . $rays . '</g></svg>';
}

/** Line icons for the four pillars and UI. */
function icon(string $name, string $class = ''): string
{
    $paths = [
        'people' => '<circle cx="32" cy="14" r="6"/><circle cx="15" cy="20" r="5"/><circle cx="49" cy="20" r="5"/>'
            . '<path d="M20 44 v-6 a12 12 0 0 1 24 0 v6"/><path d="M4 44 v-4 a11 11 0 0 1 14 -10.5"/><path d="M60 44 v-4 a11 11 0 0 0 -14 -10.5"/>',
        'handshake' => '<path d="M4 22 l10 -8 l10 4 l8 -4 h8 l16 8 l8 -2"/><path d="M4 22 l12 16"/><path d="M60 20 l-10 18"/>'
            . '<path d="M32 18 l-8 8 a3 3 0 0 0 4 4 l8 -6 l12 10"/><path d="M16 38 l4 4 a3 3 0 0 0 4 -4 l-3 -3"/>'
            . '<path d="M21 35 l5 5 a3 3 0 0 0 4 -4 l-4 -4"/><path d="M26 32 l5 5 a3 3 0 0 0 4 -4 l-3 -3"/><path d="M32 37 l2 2 a3 3 0 0 0 4 -4"/><path d="M48 34 l-10 -8"/>',
        'leaf' => '<path d="M32 44 C30 30 22 18 6 14 C6 32 16 42 32 44 Z"/><path d="M32 44 C34 30 42 18 58 14 C58 32 48 42 32 44 Z"/>'
            . '<path d="M32 44 C26 34 18 26 12 20"/><path d="M32 44 C38 34 46 26 52 20"/><path d="M32 44 v6"/>',
        'book' => '<path d="M32 16 C24 10 14 10 6 12 V44 C14 42 24 42 32 48 C40 42 50 42 58 44 V12 C50 10 40 10 32 16 Z"/>'
            . '<path d="M32 16 V48"/><path d="M2 16 V50 C14 47 24 48 32 52 C40 48 50 47 62 50 V16"/>',
        'arrow' => '<path d="M6 32 H56"/><path d="M44 20 L56 32 L44 44"/>',
        'heart' => '<path d="M32 52 C14 40 6 30 6 20 a12 12 0 0 1 26 -4 a12 12 0 0 1 26 4 C58 30 50 40 32 52 Z"/>',
        'mail' => '<rect x="6" y="14" width="52" height="36" rx="4"/><path d="M8 16 L32 34 L56 16"/>',
        'phone' => '<path d="M20 8 L12 10 C8 30 30 54 54 52 L56 44 L44 38 L38 44 C30 40 24 34 20 26 L26 20 Z"/>',
        'pin' => '<path d="M32 58 C20 44 12 34 12 24 a20 20 0 0 1 40 0 C52 34 44 44 32 58 Z"/><circle cx="32" cy="24" r="7"/>',
        'calendar' => '<rect x="8" y="12" width="48" height="42" rx="4"/><path d="M8 24 H56 M20 6 V16 M44 6 V16"/>',
        'clock' => '<circle cx="32" cy="32" r="24"/><path d="M32 18 V32 L42 38"/>',
        'gift' => '<rect x="8" y="24" width="48" height="30" rx="2"/><path d="M4 16 H60 V24 H4 Z M32 16 V54"/><path d="M32 16 C24 4 12 8 18 16 M32 16 C40 4 52 8 46 16"/>',
        'sprout' => '<path d="M32 56 V30"/><path d="M32 34 C32 22 22 16 10 16 C10 28 20 34 32 34 Z"/><path d="M32 30 C32 18 42 10 54 10 C54 22 44 30 32 30 Z"/>',
        'check' => '<path d="M12 34 L26 46 L52 18"/>',
        'recycle' => '<path d="M29 13 L12 43"/><path d="M12 34 L12 43 L19.7 38.4"/>'
            . '<path d="M16 50 H48"/><path d="M42 45 L48 50 L42 55"/>'
            . '<path d="M52 43 L35 13"/><path d="M35 22 L35 13 L42.7 17.6"/>',
        'jar' => '<path d="M18 22 H46 V50 a6 6 0 0 1 -6 6 H24 a6 6 0 0 1 -6 -6 Z"/><path d="M22 12 H42 V22 H22 Z"/>'
            . '<circle cx="32" cy="39" r="8"/><path d="M32 35 V43"/>',
        'box' => '<path d="M8 24 L32 14 L56 24 V46 L32 56 L8 46 Z"/><path d="M8 24 L32 34 L56 24"/><path d="M32 34 V56"/>'
            . '<path d="M20 19 L44 29"/>',
        'gmail' => '<rect x="6" y="14" width="52" height="38" rx="5"/><path d="M12 52 V22 L32 37 L52 22 V52"/>',
        'instagram' => '<rect x="10" y="10" width="44" height="44" rx="13"/><circle cx="32" cy="32" r="10"/><circle cx="44.5" cy="19.5" r="2" fill="currentColor" stroke="none"/>',
        'facebook' => '<circle cx="32" cy="32" r="24"/><path d="M35 56 V31 a7 7 0 0 1 7 -7 h4"/><path d="M27 36 H43"/>',
    ];
    $inner = $paths[$name] ?? '';
    return '<svg class="icon icon--' . e($name) . ' ' . e($class) . '" viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">' . $inner . '</svg>';
}

/** Logo mark: the foundation's official emblem (sun over hills, people helping each other up). */
function svg_logo(): string
{
    return '<img class="logo-mark" src="assets/img/logo-mark.png" width="480" height="391" alt="" decoding="async">';
}

/** Faded QR-style pattern used until the real donation QR code is added. Not scannable. */
function svg_qr_placeholder(): string
{
    $n = 25;
    $cell = 8;
    $isFinder = fn ($x, $y) => ($x < 8 && $y < 8) || ($x >= $n - 8 && $y < 8) || ($x < 8 && $y >= $n - 8);
    mt_srand(2026);
    $mods = '';
    for ($y = 0; $y < $n; $y++) {
        for ($x = 0; $x < $n; $x++) {
            if (!$isFinder($x, $y) && mt_rand(0, 99) < 45) {
                $mods .= '<rect x="' . ($x * $cell) . '" y="' . ($y * $cell) . '" width="' . $cell . '" height="' . $cell . '"/>';
            }
        }
    }
    $finder = '';
    foreach ([[0, 0], [($n - 7) * $cell, 0], [0, ($n - 7) * $cell]] as [$fx, $fy]) {
        $finder .= '<rect x="' . ($fx + 4) . '" y="' . ($fy + 4) . '" width="48" height="48" rx="6" fill="none" stroke="currentColor" stroke-width="8"/>'
            . '<rect x="' . ($fx + 16) . '" y="' . ($fy + 16) . '" width="24" height="24" rx="3"/>';
    }
    $size = $n * $cell;
    return '<svg class="qr-placeholder" viewBox="0 0 ' . $size . ' ' . $size . '" aria-hidden="true" focusable="false">'
        . '<g fill="currentColor" opacity=".18">' . $mods . '</g><g fill="currentColor" opacity=".35">' . $finder . '</g></svg>';
}

/** Simple illustrated portrait placeholder for team members. */
function svg_avatar(string $tone): string
{
    $colors = ['terracotta' => '#D7662C', 'olive' => '#7E8F3B', 'teal' => '#3F7F8F', 'sun' => '#F0B23F'];
    $c = $colors[$tone] ?? '#D7662C';
    return <<<SVG
<svg class="avatar" viewBox="0 0 120 120" aria-hidden="true" focusable="false">
  <circle cx="60" cy="60" r="60" fill="#F6E3CB"/>
  <circle cx="60" cy="60" r="40" fill="#F8C54E" opacity=".55"/>
  <path d="M20 120 C22 92 40 82 60 82 C80 82 98 92 100 120 Z" fill="{$c}"/>
  <circle cx="60" cy="58" r="18" fill="#C98A5E"/>
  <path d="M42 56 C40 36 64 30 76 42 C80 46 79 52 78 56 C72 50 60 46 50 48 C46 50 44 54 42 56 Z" fill="#3A2A22"/>
</svg>
SVG;
}
