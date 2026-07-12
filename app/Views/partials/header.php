<?php
/**
 * @var string $active          Halaman aktif: home|collection|about|contact|cart
 * @var string $header_variant  '' (solid) | 'overlay' (transparan di atas hero gelap)
 */
$active  = $active ?? '';
$variant = ($header_variant ?? '') === 'overlay' ? ' header--overlay' : '';

$navItems = [
    'home'       => ['Home', '/home'],
    'collection' => ['Collection', '/collection'],
    'about'      => ['About', '/about'],
    'contact'    => ['Contact', '/contact'],
    'cart'       => ['Cart', '/cart'],
];
?>
<header class="header<?= $variant ?>" id="mainHeader">
    <nav class="navbar">
        <a href="/home" class="logo" aria-label="Lost Soul Supply">
            <img src="<?= lss_img('logo-mark.png', 'https://i.ibb.co/VxpPWFz/Tak-berjudul3-20230425225531.png') ?>" alt="Lost Soul Supply" />
        </a>

        <ul class="nav-links">
            <?php foreach ($navItems as $key => [$label, $url]) : ?>
                <li><a href="<?= $url ?>" <?= $active === $key ? 'class="active"' : '' ?>><?= $label ?></a></li>
            <?php endforeach; ?>

            <?php if (session()->get('logged_in')) : ?>
                <li class="user-chip">
                    <div class="user-avatar"><?= strtoupper(substr((string) session()->get('user_name'), 0, 1)) ?></div>
                    <div>
                        <div class="user-name"><?= esc(session()->get('user_name')) ?></div>
                        <div class="user-mail"><?= esc(session()->get('user_email')) ?></div>
                    </div>
                    <a href="/logout" class="logout-link">Logout</a>
                </li>
            <?php else : ?>
                <li><a href="/login" <?= $active === 'login' ? 'class="active"' : '' ?>>Login</a></li>
            <?php endif; ?>
        </ul>

        <button class="menu-toggle" aria-label="Menu">
            <span></span><span></span>
        </button>
    </nav>
</header>

<!-- Mobile nav overlay -->
<nav class="mobile-nav" aria-label="Mobile navigation">
    <?php foreach ($navItems as $key => [$label, $url]) : ?>
        <a href="<?= $url ?>" <?= $active === $key ? 'class="active"' : '' ?>><?= $label ?></a>
    <?php endforeach; ?>
    <?php if (session()->get('logged_in')) : ?>
        <a href="/logout">Logout</a>
    <?php else : ?>
        <a href="/login">Login</a>
    <?php endif; ?>
    <div class="mobile-nav-mark">For the battles no one knows.</div>
</nav>
