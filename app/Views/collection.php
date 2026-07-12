<?= $this->extend('layouts/main') ?>

<?php
$this->setVar('title', 'The Collection — Lost Soul Supply');
$this->setVar('active', 'collection');
$this->setVar('loader', 'THE COLLECTION');
?>

<?= $this->section('styles') ?>
<style>
    /* ── Intro ── */
    .catalog-intro {
        padding: clamp(6rem, 18vh, 10rem) 2rem clamp(4rem, 10vh, 6rem);
        max-width: 1240px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: 1fr auto;
        align-items: end;
        gap: 2.5rem;
        border-bottom: 1px solid var(--hairline);
    }

    .catalog-intro .eyebrow {
        margin-bottom: 1.4rem;
        opacity: 0;
        animation: fadeUpSoft 0.7s calc(var(--intro) + 0.3s) ease forwards;
    }

    .catalog-intro h1 {
        font-size: var(--fs-hero);
        opacity: 0;
        animation: fadeUpSoft 0.9s calc(var(--intro) + 0.42s) var(--ease-out) forwards;
    }

    .catalog-intro .serif-lead {
        max-width: 44ch;
        color: var(--muted);
        margin-top: 1.6rem;
        font-size: clamp(1.05rem, 1.8vw, 1.35rem);
        opacity: 0;
        animation: fadeUpSoft 0.9s calc(var(--intro) + 0.58s) ease forwards;
    }

    .catalog-count {
        text-align: right;
        opacity: 0;
        animation: fadeUpSoft 0.8s calc(var(--intro) + 0.72s) ease forwards;
    }

    .catalog-count strong {
        display: block;
        font-family: var(--font-display);
        font-weight: 400;
        font-size: clamp(2.6rem, 5vw, 4rem);
        line-height: 1;
        color: var(--ink);
    }

    .catalog-count small {
        font-family: var(--font-serif);
        font-style: italic;
        font-size: 0.9rem;
        color: var(--muted);
    }

    /* ── Editorial pieces ── */
    .pieces {
        max-width: 1240px;
        margin: 0 auto;
        padding: clamp(4rem, 10vh, 7rem) 2rem;
        display: flex;
        flex-direction: column;
        gap: clamp(6rem, 16vh, 10rem);
    }

    .piece {
        display: grid;
        grid-template-columns: minmax(0, 7fr) minmax(0, 5fr);
        gap: clamp(2rem, 6vw, 5rem);
        align-items: center;
    }

    .piece:nth-child(even) {
        direction: rtl;
    }

    .piece:nth-child(even)>* {
        direction: ltr;
    }

    .piece-visual {
        position: relative;
    }

    .piece-visual .frame {
        position: relative;
        overflow: hidden;
        background: #ebe9e4;
    }

    .piece-visual img {
        width: 100%;
        aspect-ratio: 4 / 5;
        object-fit: cover;
        display: block;
        transition: transform 1s var(--ease-out), filter 0.6s ease;
    }

    .piece:hover .piece-visual img {
        transform: scale(1.045);
        filter: contrast(1.04);
    }

    /* Corner accents */
    .piece-visual .frame::before,
    .piece-visual .frame::after {
        content: '';
        position: absolute;
        width: 22px;
        height: 22px;
        z-index: 2;
        transition: width 0.35s var(--ease-out), height 0.35s var(--ease-out);
    }

    .piece-visual .frame::before {
        top: 0;
        left: 0;
        border-top: 2px solid var(--red);
        border-left: 2px solid var(--red);
    }

    .piece-visual .frame::after {
        bottom: 0;
        right: 0;
        border-bottom: 2px solid var(--red);
        border-right: 2px solid var(--red);
    }

    .piece:hover .piece-visual .frame::before,
    .piece:hover .piece-visual .frame::after {
        width: 46px;
        height: 46px;
    }

    /* Nomor besar di belakang visual */
    .piece-num {
        position: absolute;
        top: -0.55em;
        left: -0.18em;
        font-family: var(--font-display);
        font-size: clamp(4rem, 9vw, 7rem);
        line-height: 1;
        color: transparent;
        -webkit-text-stroke: 1px rgba(16, 16, 16, 0.16);
        z-index: 3;
        pointer-events: none;
    }

    .piece:nth-child(even) .piece-num {
        left: auto;
        right: -0.18em;
    }

    /* Teks */
    .piece-body .eyebrow {
        margin-bottom: 1rem;
    }

    .piece-body h2 {
        font-size: clamp(2rem, 4.4vw, 3.4rem);
        margin-bottom: 1.2rem;
    }

    .piece-body h2 a {
        color: inherit;
        text-decoration: none;
        transition: color 0.3s;
    }

    .piece-body h2 a:hover {
        color: var(--red);
    }

    .piece-body .story {
        font-size: 1.08rem;
        line-height: 1.85;
        color: #55524e;
        max-width: 46ch;
        margin-bottom: 1.8rem;
    }

    .piece-meta {
        display: flex;
        align-items: center;
        gap: 2rem;
        flex-wrap: wrap;
    }

    .piece-price {
        font-family: var(--font-serif);
        font-style: italic;
        font-size: 1rem;
        color: var(--muted);
        letter-spacing: 0.04em;
    }

    .piece-low {
        font-family: var(--font-display);
        font-size: 0.62rem;
        letter-spacing: 0.3em;
        text-transform: uppercase;
        color: var(--red);
        border: 1px solid var(--red-dim);
        padding: 4px 10px;
    }

    /* Empty state */
    .catalog-empty {
        max-width: 1240px;
        margin: 0 auto;
        padding: clamp(6rem, 20vh, 10rem) 2rem;
        text-align: center;
    }

    .catalog-empty h2 {
        font-size: var(--fs-h2);
        margin-bottom: 1rem;
    }

    .catalog-empty p {
        font-style: italic;
        color: var(--muted);
    }

    /* Outro */
    .catalog-outro {
        border-top: 1px solid var(--hairline);
        max-width: 1240px;
        margin: 0 auto;
        padding: clamp(3rem, 8vh, 5rem) 2rem;
        text-align: center;
    }

    .catalog-outro p {
        font-family: var(--font-serif);
        font-style: italic;
        font-size: 1.1rem;
        color: var(--muted);
        margin-bottom: 1.8rem;
    }

    @media (max-width: 860px) {
        .catalog-intro {
            grid-template-columns: 1fr;
            align-items: start;
        }

        .catalog-count {
            text-align: left;
        }

        .piece,
        .piece:nth-child(even) {
            grid-template-columns: 1fr;
            direction: ltr;
            gap: 1.6rem;
        }

        .piece-num {
            top: auto;
            bottom: -0.5em;
        }
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<main>
    <!-- ── Intro ── -->
    <section class="catalog-intro">
        <div>
            <span class="eyebrow">Lost Soul Supply &mdash; The Archive</span>
            <h1 class="display">The<br>Collection</h1>
            <p class="serif-lead">These are not products. They are chapters &mdash; feelings we never
                learned to say out loud, pressed into fabric.</p>
        </div>

        <?php if (!empty($products)) : ?>
            <div class="catalog-count">
                <strong><?= count($products) ?></strong>
                <small>pieces in the archive</small>
            </div>
        <?php endif; ?>
    </section>

    <?php if (!empty($products)) : ?>
        <!-- ── Pieces ── -->
        <section class="pieces">
            <?php foreach ($products as $i => $product) : ?>
                <article class="piece">
                    <div class="piece-visual reveal">
                        <span class="piece-num" aria-hidden="true"><?= str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT) ?></span>
                        <a href="/product/<?= $product['id'] ?>" class="frame" style="display:block;">
                            <img src="<?= esc($product['image'], 'attr') ?>"
                                alt="<?= esc($product['name'], 'attr') ?>" loading="lazy"
                                onerror="this.src='https://via.placeholder.com/800x1000/101010/9aa7ad?text=LOST+SOUL'" />
                        </a>
                    </div>

                    <div class="piece-body">
                        <span class="eyebrow reveal">
                            <?php if (!empty($product['series'])) : ?>
                                <?= esc($product['series']) ?>
                            <?php else : ?>
                                Series N&deg; <?= str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT) ?>
                            <?php endif; ?>
                        </span>
                        <h2 class="display reveal reveal-d1">
                            <a href="/product/<?= $product['id'] ?>"><?= esc($product['name']) ?></a>
                        </h2>
                        <p class="story reveal reveal-d2"><?= esc($product['description']) ?></p>

                        <div class="piece-meta reveal reveal-d3">
                            <a href="/product/<?= $product['id'] ?>" class="link-line">View Piece</a>
                            <span class="piece-price">Rp <?= number_format($product['price'], 0, ',', '.') ?></span>
                            <?php if ($product['stock'] > 0 && $product['stock'] <= 5) : ?>
                                <span class="piece-low">Last Pieces</span>
                            <?php endif; ?>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>
        </section>

        <!-- ── Outro ── -->
        <section class="catalog-outro">
            <p class="reveal">Every soul deserves to be heard.</p>
            <a href="/about" class="link-line reveal reveal-d1">The Story Behind the Pieces</a>
        </section>
    <?php else : ?>
        <section class="catalog-empty">
            <h2 class="display">The archive is quiet</h2>
            <p>New pieces are on their way. Come back soon.</p>
        </section>
    <?php endif; ?>
</main>
<?= $this->endSection() ?>