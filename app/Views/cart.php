<?= $this->extend('layouts/main') ?>

<?php
$this->setVar('title', 'Your Cart — Lost Soul Supply');
$this->setVar('active', 'cart');
$this->setVar('loader', 'YOUR CART');
?>

<?= $this->section('styles') ?>
<style>
    .cart-wrap {
        max-width: 860px;
        margin: 0 auto;
        padding: clamp(4rem, 10vh, 6rem) 2rem clamp(5rem, 14vh, 8rem);
    }

    .cart-line {
        display: grid;
        grid-template-columns: 88px 1fr auto;
        gap: 1.6rem;
        align-items: center;
        padding: 1.6rem 0.2rem;
        border-top: 1px solid var(--hairline);
    }

    .cart-line:last-of-type {
        border-bottom: 1px solid var(--hairline);
    }

    .cart-line img {
        width: 88px;
        height: 88px;
        object-fit: cover;
        display: block;
        background: #ebe9e4;
    }

    .cart-line-info h3 {
        font-family: var(--font-display);
        font-weight: 400;
        font-size: 1.15rem;
        letter-spacing: 0.16em;
        text-transform: uppercase;
        color: var(--ink);
        margin-bottom: 0.25rem;
    }

    .cart-line-info p {
        font-family: var(--font-serif);
        font-style: italic;
        font-size: 0.92rem;
        color: var(--muted);
    }

    .cart-line-right {
        text-align: right;
    }

    .cart-line-right .amount {
        font-family: var(--font-display);
        font-size: 1.15rem;
        letter-spacing: 0.08em;
        color: var(--ink);
        display: block;
        margin-bottom: 0.5rem;
    }

    .remove-link {
        font-family: var(--font-display);
        font-size: 0.6rem;
        letter-spacing: 0.3em;
        text-transform: uppercase;
        color: var(--muted);
        text-decoration: none;
        border-bottom: 1px solid var(--red-dim);
        padding-bottom: 2px;
        transition: color 0.3s;
    }

    .remove-link:hover {
        color: var(--red);
    }

    .cart-total {
        display: flex;
        align-items: baseline;
        justify-content: space-between;
        padding: 2rem 0.2rem 0;
        margin-bottom: 2.4rem;
    }

    .cart-total small {
        font-family: var(--font-display);
        font-size: 0.75rem;
        letter-spacing: 0.4em;
        text-transform: uppercase;
        color: var(--muted);
    }

    .cart-total strong {
        font-family: var(--font-display);
        font-weight: 400;
        font-size: clamp(1.6rem, 4vw, 2.2rem);
        letter-spacing: 0.06em;
        color: var(--ink);
    }

    .cart-actions {
        display: flex;
        gap: 1.5rem;
        align-items: center;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    /* Empty */
    .cart-empty {
        text-align: center;
        padding: clamp(3rem, 10vh, 6rem) 1rem;
    }

    .cart-empty h2 {
        font-size: var(--fs-h2);
        margin-bottom: 1rem;
    }

    .cart-empty p {
        font-style: italic;
        color: var(--muted);
        margin-bottom: 2.2rem;
    }

    @media (max-width: 640px) {
        .cart-line {
            grid-template-columns: 68px 1fr;
        }

        .cart-line img {
            width: 68px;
            height: 68px;
        }

        .cart-line-right {
            grid-column: 2;
            text-align: left;
        }
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<main>
    <!-- ── Hero ── -->
    <section class="page-hero bg-diagonals">
        <div class="ghost" aria-hidden="true">CART</div>
        <div class="page-hero-content">
            <span class="eyebrow">Almost Yours</span>
            <h1>Your Cart</h1>
            <hr class="rule" />
        </div>
    </section>

    <div class="cart-wrap">
        <?php if (!empty($cart)) : ?>
            <?php $total = 0; ?>
            <div class="reveal">
                <?php foreach ($cart as $product_id => $item) : ?>
                    <div class="cart-line">
                        <img src="<?= esc($item['image'], 'attr') ?>" alt="<?= esc($item['name'], 'attr') ?>"
                            onerror="this.src='https://via.placeholder.com/90x90/101010/9aa7ad?text=LS'" />
                        <div class="cart-line-info">
                            <h3><?= esc($item['name']) ?></h3>
                            <p>Rp <?= number_format($item['price'], 0, ',', '.') ?> &times; <?= $item['quantity'] ?></p>
                        </div>
                        <div class="cart-line-right">
                            <span class="amount">Rp <?= number_format($item['price'] * $item['quantity'], 0, ',', '.') ?></span>
                            <a href="/cart/remove/<?= $product_id ?>" class="remove-link">Remove</a>
                        </div>
                    </div>
                    <?php $total += $item['price'] * $item['quantity']; ?>
                <?php endforeach; ?>
            </div>

            <div class="cart-total reveal">
                <small>Total</small>
                <strong>Rp <?= number_format($total, 0, ',', '.') ?></strong>
            </div>

            <div class="cart-actions reveal">
                <a href="/collection" class="link-line">Keep Exploring</a>
                <a href="/checkout" class="btn btn--red"><span>Proceed to Checkout</span></a>
            </div>
        <?php else : ?>
            <div class="cart-empty">
                <span class="eyebrow reveal">Nothing Here Yet</span>
                <h2 class="display reveal reveal-d1">Your Cart Is Empty</h2>
                <p class="reveal reveal-d2">Some stories are still waiting to be worn.</p>
                <a href="/collection" class="btn btn--red reveal reveal-d3"><span>Explore the Collection</span></a>
            </div>
        <?php endif; ?>
    </div>
</main>
<?= $this->endSection() ?>
