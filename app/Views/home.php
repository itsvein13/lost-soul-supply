<?= $this->extend('layouts/main') ?>

<?php
$this->setVar('title', 'Lost Soul Supply');
$this->setVar('active', 'home');
$this->setVar('header_variant', 'overlay');
$this->setVar('loader', 'LOST SOUL SUPPLY');
?>

<?= $this->section('styles') ?>
<style>
    .hero {
        position: relative;
        height: 100vh;
        height: 100svh;
        min-height: 560px;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: var(--white);
        overflow: hidden;
        background: var(--dark);
    }

    .hero-bg-wrap {
        position: absolute;
        inset: -12% 0;
        will-change: transform;
    }

    .hero-bg {
        position: absolute;
        inset: 0;
        background: url('<?= lss_img('hero-bg.png', 'https://i.ibb.co.com/2cq2X9H/lslmtl.png') ?>') center top/cover no-repeat;
        transform: scale(1.14);
        animation: heroZoom 2.6s var(--intro) var(--ease-out) forwards;
    }

    @keyframes heroZoom {
        to {
            transform: scale(1.02);
        }
    }

    .hero::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(to bottom,
                rgba(0, 0, 0, 0.72) 0%,
                rgba(0, 0, 0, 0.38) 45%,
                rgba(0, 0, 0, 0.82) 100%);
        z-index: 1;
    }

    .hero::after {
        content: '';
        position: absolute;
        inset: 0;
        background: radial-gradient(ellipse at center, transparent 46%, rgba(0, 0, 0, 0.62) 100%);
        z-index: 1;
        animation: vignettePulse 7s ease-in-out infinite;
    }

    @keyframes vignettePulse {
        0%,
        100% {
            opacity: 0.85;
        }

        50% {
            opacity: 1;
        }
    }

    .hero-content {
        position: relative;
        z-index: 2;
        max-width: 860px;
        padding: 0 2rem;
    }

    .hero-eyebrow {
        margin-bottom: 2rem;
        opacity: 0;
        animation: fadeUpSoft 0.9s calc(var(--intro) + 0.35s) ease forwards;
    }

    .hero-logo-wrap {
        opacity: 0;
        animation: heroLogoReveal 1.3s calc(var(--intro) + 0.5s) var(--ease-out) forwards;
    }

    .hero-logo-wrap img {
        width: 100%;
        max-width: 760px;
        display: block;
        margin: 0 auto;
    }

    @keyframes heroLogoReveal {
        from {
            opacity: 0;
            transform: scale(0.94) translateY(22px);
            filter: blur(10px);
        }

        to {
            opacity: 1;
            transform: scale(1) translateY(0);
            filter: blur(0);
        }
    }

    .hero-tag {
        margin-top: 1.8rem;
        font-family: var(--font-serif);
        font-style: italic;
        font-weight: 300;
        font-size: clamp(1.05rem, 2vw, 1.3rem);
        color: rgba(255, 255, 255, 0.72);
        letter-spacing: 0.06em;
        opacity: 0;
        animation: fadeUpSoft 1s calc(var(--intro) + 0.85s) ease forwards;
    }

    .hero .btn {
        margin-top: 2.4rem;
        opacity: 0;
        animation: fadeUpSoft 0.9s calc(var(--intro) + 1.05s) ease forwards;
    }

    .hero .btn svg {
        width: 1em;
        height: 1em;
        transition: transform 0.3s;
    }

    .hero .btn:hover svg {
        transform: translateX(5px);
    }

    .scroll-indicator {
        position: absolute;
        bottom: 2.2rem;
        left: 50%;
        transform: translateX(-50%);
        z-index: 2;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 10px;
        opacity: 0;
        animation: fadeUpSoft 0.8s calc(var(--intro) + 1.3s) ease forwards;
    }

    .scroll-indicator span {
        font-family: var(--font-display);
        font-size: 0.6rem;
        letter-spacing: 0.5em;
        text-transform: uppercase;
        color: rgba(255, 255, 255, 0.5);
    }

    .scroll-line {
        width: 1px;
        height: 54px;
        background: rgba(255, 255, 255, 0.18);
        position: relative;
        overflow: hidden;
    }

    .scroll-line::after {
        content: '';
        position: absolute;
        top: -100%;
        left: 0;
        width: 100%;
        height: 100%;
        background: var(--accent-soft);
        animation: scrollDrop 2s ease-in-out infinite;
    }

    @keyframes scrollDrop {
        to {
            top: 200%;
        }
    }

    .collection {
        position: relative;
        background: var(--white);
        padding: clamp(5rem, 12vh, 8rem) 2rem clamp(6rem, 14vh, 9rem);
        overflow: hidden;
        border-bottom: 14px solid var(--dark);
    }

    .collection-mark {
        position: absolute;
        top: 50%;
        left: -12%;
        transform: translateY(-52%);
        width: min(58vw, 880px);
        pointer-events: none;
        user-select: none;
        line-height: 0;
    }

    .collection-mark img {
        width: 100%;
        height: auto;
    }

    .collection-dot {
        position: absolute;
        top: clamp(3rem, 9vh, 6rem);
        left: clamp(2rem, 8vw, 8rem);
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background: var(--red);
    }

    .collection-dot::after {
        content: '';
        position: absolute;
        inset: -7px;
        border: 1px solid var(--red-dim);
        border-radius: 50%;
    }

    .collection-inner {
        position: relative;
        z-index: 1;
        max-width: 1280px;
        margin: 0 auto;
    }

    .collection-head {
        text-align: right;
        margin-bottom: clamp(3.5rem, 9vh, 6rem);
    }

    .collection-head .eyebrow {
        margin-bottom: 1.2rem;
    }

    .collection-title {
        font-family: var(--font-display);
        font-weight: 400;
        font-size: clamp(2.8rem, 9vw, 7.5rem);
        line-height: 0.9;
        letter-spacing: 0.03em;
        text-transform: uppercase;
        color: var(--ink);
        display: inline-block;
        white-space: nowrap;
    }

    .collection-title b {
        display: inline-block;
        font-weight: 400;
    }

    .collection-title b:nth-child(odd) {
        transform: rotate(-2.5deg) translateY(-0.03em);
    }

    .collection-title b:nth-child(even) {
        transform: rotate(2deg) translateY(0.05em);
    }

    .collection-title b:nth-child(3n) {
        color: transparent;
        -webkit-text-stroke: 2px var(--ink);
    }

    .collection-title b:nth-child(4n) {
        font-size: 0.8em;
    }

    .collection-gallery {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: clamp(1.5rem, 4vw, 3.5rem);
        align-items: end;
        max-width: 1000px;
        margin-left: auto;
    }

    .float-item {
        position: relative;
        display: block;
        text-decoration: none;
        text-align: center;
        opacity: 0;
        transform: translateY(44px);
        transition: opacity 0.9s ease, transform 0.9s var(--ease-out);
    }

    .float-item.visible {
        opacity: 1;
        transform: translateY(0);
    }

    .float-item:nth-child(2) {
        transition-delay: 0.18s;
        margin-top: -2.5rem;
    }

    .float-item:nth-child(3) {
        transition-delay: 0.36s;
    }

    .float-item img {
        width: 100%;
        height: auto;
        display: block;
        filter: drop-shadow(0 26px 38px rgba(0, 0, 0, 0.16));
        transition: transform 0.7s var(--ease-out);
    }

    .float-item:hover img {
        transform: translateY(-12px) rotate(-1.5deg) scale(1.02);
    }

    .float-item::before,
    .float-item::after {
        content: '';
        position: absolute;
        width: 24px;
        height: 24px;
        transition: width 0.35s var(--ease-out), height 0.35s var(--ease-out);
    }

    .float-item::before {
        top: -10px;
        left: -10px;
        border-top: 2px solid var(--red);
        border-left: 2px solid var(--red);
    }

    .float-item::after {
        right: -10px;
        bottom: 42px;
        border-bottom: 2px solid var(--red);
        border-right: 2px solid var(--red);
    }

    .float-item:hover::before,
    .float-item:hover::after {
        width: 44px;
        height: 44px;
    }

    .float-cap {
        margin-top: 0.9rem;
    }

    .float-cap h3 {
        font-family: var(--font-display);
        font-weight: 400;
        font-size: 0.95rem;
        letter-spacing: 0.24em;
        text-transform: uppercase;
        color: var(--ink);
        transition: color 0.3s;
    }

    .float-item:hover .float-cap h3 {
        color: var(--red);
    }

    .float-cap span {
        font-family: var(--font-serif);
        font-style: italic;
        font-size: 0.82rem;
        color: var(--muted);
    }

    .collection-more {
        text-align: right;
        margin-top: clamp(3rem, 7vh, 4.5rem);
    }

    @media (max-width: 860px) {
        .collection-mark {
            width: 120vw;
            left: -30%;
            opacity: 0.1;
        }

        .collection-head {
            text-align: left;
        }

        .collection-title {
            white-space: normal;
        }

        .collection-more {
            text-align: left;
        }
    }

    @media (max-width: 640px) {
        .collection-gallery {
            grid-template-columns: 1fr;
            gap: 3.5rem;
            max-width: 340px;
            margin: 0 auto;
        }

        .float-item:nth-child(2) {
            margin-top: 0;
        }
    }

    .manifesto {
        text-align: center;
    }

    .manifesto blockquote {
        font-family: var(--font-serif);
        font-style: italic;
        font-weight: 300;
        font-size: clamp(1.5rem, 3.6vw, 2.5rem);
        line-height: 1.55;
        color: rgba(255, 255, 255, 0.85);
        max-width: 820px;
        margin: 0 auto;
        position: relative;
        z-index: 1;
    }

    .manifesto blockquote em {
        color: var(--accent-mist);
        font-style: italic;
    }

    .manifesto .rule {
        margin: 2.2rem auto;
    }

    .manifesto .link-line--light {
        position: relative;
        z-index: 1;
    }

    .contact-invite {
        text-align: center;
        background: var(--light);
    }

    .contact-invite::before {
        content: 'REACH';
        position: absolute;
        bottom: -0.12em;
        right: -0.04em;
        font-family: var(--font-display);
        font-size: clamp(6rem, 20vw, 15rem);
        color: rgba(16, 16, 16, 0.04);
        line-height: 1;
        pointer-events: none;
        user-select: none;
    }

    .contact-invite>* {
        position: relative;
        z-index: 1;
    }

    .contact-invite h2 {
        font-size: var(--fs-h2);
    }

    .contact-invite p {
        font-style: italic;
        color: var(--muted);
        margin: 1.2rem auto 2.2rem;
        max-width: 46ch;
    }

</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<main>
    <section class="hero" id="home">
        <div class="hero-bg-wrap" data-parallax="0.35">
            <div class="hero-bg"></div>
        </div>

        <div class="hero-content">
            <span class="eyebrow eyebrow--light hero-eyebrow">Est. 2022 &mdash; Jakarta, Indonesia</span>

            <div class="hero-logo-wrap">
                <img src="<?= lss_img('logo-wordmark.png', 'https://i.ibb.co.com/3zvLZWp/LOSTSOULSUPPLY.png') ?>"
                    alt="Lost Soul Supply" />
            </div>

            <p class="hero-tag">Not just clothing &mdash; a voice for the feelings words can't carry.</p>

            <a href="/collection" class="btn btn--light">
                <span>Explore the Collection</span>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                    <path d="M5 12h14M13 6l6 6-6 6" />
                </svg>
            </a>
        </div>

        <div class="scroll-indicator">
            <span>Scroll</span>
            <div class="scroll-line"></div>
        </div>
    </section>

    <section class="collection" id="collection">
        <div class="collection-mark" aria-hidden="true">
            <img src="<?= lss_img('logo-mark-large.png') ?>" alt="" loading="lazy" />
        </div>
        <span class="collection-dot" aria-hidden="true"></span>

        <div class="collection-inner">
            <div class="collection-head reveal">
                <span class="eyebrow">Lost Soul Supply &mdash; Wear What You Feel</span>
                <h2 class="collection-title" aria-label="Our Collection">
                    <span aria-hidden="true"><b>O</b><b>U</b><b>R</b>&nbsp;<b>C</b><b>O</b><b>L</b><b>L</b><b>E</b><b>C</b><b>T</b><b>I</b><b>O</b><b>N</b></span>
                </h2>
            </div>

            <div class="collection-gallery">
                <?php
                $fallback = [
                    ['name' => 'Contra Omens Hoodie', 'image' => lss_img('piece-contra-hoodie.png'), 'url' => '/collection'],
                    ['name' => 'Halftone Tee', 'image' => lss_img('piece-halftone.png'), 'url' => '/collection'],
                    ['name' => 'Contra Omens Tee', 'image' => lss_img('piece-contra-omens.png'), 'url' => '/collection'],
                ];

                $previews = [];
                if (!empty($products)) {
                    foreach ($products as $p) {
                        $previews[] = ['name' => $p['name'], 'image' => $p['image'], 'url' => '/product/' . $p['id']];
                    }
                } else {
                    $previews = $fallback;
                }

                foreach ($previews as $i => $pv) :
                ?>
                    <a href="<?= esc($pv['url'], 'attr') ?>" class="float-item reveal">
                        <img src="<?= esc($pv['image'], 'attr') ?>" alt="<?= esc($pv['name'], 'attr') ?>" loading="lazy"
                            onerror="this.src='https://via.placeholder.com/600x600/101010/9aa7ad?text=LOST+SOUL'" />
                        <div class="float-cap">
                            <h3><?= esc($pv['name']) ?></h3>
                            <span>N&deg; <?= str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT) ?></span>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>

            <div class="collection-more">
                <a href="/collection" class="link-line">View All Pieces</a>
            </div>
        </div>
    </section>

    <section class="section section--dark bg-diagonals manifesto" id="about">
        <div class="ghost" aria-hidden="true">LOST SOUL</div>
        <blockquote class="reveal">
            Lost Soul Supply was born to express what words cannot &mdash;
            every piece carries <em>a wound, a memory, a battle</em> someone is still fighting.
        </blockquote>
        <hr class="rule rule--center reveal-line" />
        <a href="/about" class="link-line link-line--light reveal reveal-d2">Read Our Story</a>
    </section>

    <section class="section contact-invite" id="contact">
        <span class="eyebrow reveal">Reach Out</span>
        <h2 class="display reveal reveal-d1">Talk to Us</h2>
        <p class="reveal reveal-d2">For inquiries, collaborations &mdash; or if you simply need someone to listen.</p>
        <a href="/contact" class="btn btn--red reveal reveal-d3"><span>Contact Us</span></a>
    </section>
</main>
<?= $this->endSection() ?>
