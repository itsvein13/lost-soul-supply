<?= $this->extend('layouts/main') ?>

<?php
$this->setVar('title', $product['name'] . ' — Lost Soul Supply');
$this->setVar('active', 'collection');
$this->setVar('loader', 'THE PIECE');
?>

<?= $this->section('styles') ?>
<style>
    .piece-page {
        max-width: 1240px;
        margin: 0 auto;
        padding: clamp(3rem, 8vh, 5rem) 2rem clamp(5rem, 14vh, 8rem);
        display: grid;
        grid-template-columns: minmax(0, 7fr) minmax(0, 5fr);
        gap: clamp(2.5rem, 6vw, 5rem);
        align-items: start;
    }

    .piece-page-visual {
        position: sticky;
        top: 110px;
    }

    .piece-page-visual .frame {
        position: relative;
        overflow: hidden;
        background: #ebe9e4;
    }

    .piece-page-visual img {
        width: 100%;
        aspect-ratio: 4 / 5;
        object-fit: cover;
        display: block;
        transform: scale(1.06);
        opacity: 0;
        animation: pieceImgIn 1.2s calc(var(--intro) + 0.35s) var(--ease-out) forwards;
        transition: transform 1s var(--ease-out);
    }

    @keyframes pieceImgIn {
        to {
            opacity: 1;
            transform: scale(1);
        }
    }

    .piece-page-visual:hover img {
        transform: scale(1.03);
    }

    .piece-page-visual .frame::before,
    .piece-page-visual .frame::after {
        content: '';
        position: absolute;
        width: 24px;
        height: 24px;
        z-index: 2;
        transition: width 0.35s var(--ease-out), height 0.35s var(--ease-out);
    }

    .piece-page-visual .frame::before {
        top: 0;
        left: 0;
        border-top: 2px solid var(--red);
        border-left: 2px solid var(--red);
    }

    .piece-page-visual .frame::after {
        bottom: 0;
        right: 0;
        border-bottom: 2px solid var(--red);
        border-right: 2px solid var(--red);
    }

    .piece-page-visual:hover .frame::before,
    .piece-page-visual:hover .frame::after {
        width: 50px;
        height: 50px;
    }

    .piece-page-body {
        padding-top: 0.5rem;
    }

    .back-link {
        display: inline-block;
        font-family: var(--font-display);
        font-size: 0.68rem;
        letter-spacing: 0.3em;
        text-transform: uppercase;
        color: var(--muted);
        text-decoration: none;
        margin-bottom: 2.4rem;
        transition: color 0.3s;
        opacity: 0;
        animation: fadeUpSoft 0.7s calc(var(--intro) + 0.3s) ease forwards;
    }

    .back-link:hover {
        color: var(--red);
    }

    .piece-page-body .eyebrow {
        margin-bottom: 1rem;
        opacity: 0;
        animation: fadeUpSoft 0.7s calc(var(--intro) + 0.42s) ease forwards;
    }

    .piece-page-body h1 {
        font-size: clamp(2.4rem, 5.5vw, 4.2rem);
        margin-bottom: 1.6rem;
        opacity: 0;
        animation: fadeUpSoft 0.9s calc(var(--intro) + 0.52s) var(--ease-out) forwards;
    }

    .piece-story {
        font-size: 1.12rem;
        line-height: 1.95;
        color: #4a4744;
        margin-bottom: 2.4rem;
        opacity: 0;
        animation: fadeUpSoft 0.9s calc(var(--intro) + 0.65s) ease forwards;
    }

    .piece-page-meta {
        border-top: 1px solid var(--hairline);
        border-bottom: 1px solid var(--hairline);
        padding: 1.4rem 0.2rem;
        display: flex;
        align-items: baseline;
        justify-content: space-between;
        gap: 1.5rem;
        flex-wrap: wrap;
        margin-bottom: 2.2rem;
        opacity: 0;
        animation: fadeUpSoft 0.9s calc(var(--intro) + 0.75s) ease forwards;
    }

    .piece-page-price {
        font-family: var(--font-display);
        font-size: 1.6rem;
        letter-spacing: 0.08em;
        color: var(--ink);
    }

    .piece-page-stock {
        font-family: var(--font-serif);
        font-style: italic;
        font-size: 0.95rem;
        color: var(--muted);
    }

    .piece-page-stock strong {
        color: var(--ink);
        font-weight: 500;
    }

    .piece-page-stock.low strong {
        color: var(--red);
    }

    .piece-page-form {
        opacity: 0;
        animation: fadeUpSoft 0.9s calc(var(--intro) + 0.85s) ease forwards;
    }

    .piece-note {
        margin-top: 1.6rem;
        font-family: var(--font-serif);
        font-style: italic;
        font-size: 0.92rem;
        color: var(--muted);
        text-align: center;
    }

    @media (max-width: 860px) {
        .piece-page {
            grid-template-columns: 1fr;
        }

        .piece-page-visual {
            position: static;
        }
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<main>
    <div class="piece-page">
        <div class="piece-page-visual">
            <div class="frame">
                <img src="<?= esc($product['image'], 'attr') ?>"
                    alt="<?= esc($product['name'], 'attr') ?>"
                    onerror="this.src='https://via.placeholder.com/800x1000/101010/9aa7ad?text=LOST+SOUL'" />
            </div>
        </div>

        <div class="piece-page-body">
            <a href="/collection" class="back-link">&larr; Back to the Collection</a>

            <span class="eyebrow">The Archive &mdash; Piece N&deg; <?= str_pad((string) $product['id'], 2, '0', STR_PAD_LEFT) ?></span>
            <h1 class="display"><?= esc($product['name']) ?></h1>

            <p class="piece-story"><?= esc($product['description']) ?></p>

            <div class="piece-page-meta">
                <span class="piece-page-price">Rp <?= number_format($product['price'], 0, ',', '.') ?></span>
                <span class="piece-page-stock<?= $product['stock'] <= 5 ? ' low' : '' ?>">
                    <?php if ($product['stock'] > 0) : ?>
                        <strong><?= $product['stock'] ?></strong> pieces remain
                    <?php else : ?>
                        <strong>Sold out</strong> &mdash; this chapter has closed
                    <?php endif; ?>
                </span>
            </div>

            <?php if ($product['stock'] > 0) : ?>
                <form action="/cart/add" method="POST" class="piece-page-form">
                    <?= csrf_field() ?>
                    <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                    <button type="submit" class="btn btn--red btn--block"><span>Add to Cart</span></button>
                </form>
            <?php endif; ?>

            <p class="piece-note">Every piece carries a story. Wear it for the battles no one knows.</p>
        </div>
    </div>
</main>
<?= $this->endSection() ?>
