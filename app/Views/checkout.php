<?= $this->extend('layouts/main') ?>

<?php
$this->setVar('title', 'Checkout — Lost Soul Supply');
$this->setVar('active', 'cart');
$this->setVar('loader', 'CHECKOUT');
?>

<?= $this->section('styles') ?>
<style>
    .checkout-wrap {
        max-width: 1080px;
        margin: 0 auto;
        padding: clamp(4rem, 10vh, 6rem) 2rem clamp(5rem, 14vh, 8rem);
        display: grid;
        grid-template-columns: minmax(0, 7fr) minmax(0, 5fr);
        gap: clamp(3rem, 7vw, 5rem);
        align-items: start;
    }

    .checkout-form h2,
    .order-summary h2 {
        font-size: clamp(1.6rem, 3.2vw, 2.2rem);
        margin-bottom: 1.8rem;
    }

    .pay-options {
        display: grid;
        gap: 0.8rem;
        margin: 0.6rem 0 2rem;
    }

    .pay-option input {
        position: absolute;
        opacity: 0;
        pointer-events: none;
    }

    .pay-option label {
        display: block;
        border: 1px solid var(--hairline);
        padding: 1rem 1.2rem;
        cursor: pointer;
        transition: border-color 0.3s, background 0.3s;
    }

    .pay-option label strong {
        display: block;
        font-family: var(--font-display);
        font-weight: 400;
        font-size: 0.9rem;
        letter-spacing: 0.24em;
        text-transform: uppercase;
        color: var(--ink);
        margin-bottom: 0.15rem;
    }

    .pay-option label small {
        font-family: var(--font-serif);
        font-style: italic;
        font-size: 0.88rem;
        color: var(--muted);
    }

    .pay-option input:checked + label {
        border-color: var(--accent-deep);
        background: rgba(71, 78, 82, 0.06);
    }

    .pay-option input:focus-visible + label {
        outline: 1px solid var(--accent-deep);
        outline-offset: 2px;
    }

    .order-summary {
        position: sticky;
        top: 110px;
        border: 1px solid var(--hairline);
        padding: 2rem 1.8rem;
    }

    .summary-item {
        display: flex;
        justify-content: space-between;
        gap: 1rem;
        padding: 0.9rem 0;
        border-bottom: 1px solid var(--hairline);
    }

    .summary-item .name {
        font-family: var(--font-serif);
        font-size: 1rem;
        color: var(--text);
    }

    .summary-item .name small {
        color: var(--muted);
        font-style: italic;
    }

    .summary-item .amount {
        font-family: var(--font-display);
        font-size: 0.95rem;
        letter-spacing: 0.06em;
        color: var(--ink);
        white-space: nowrap;
    }

    .summary-total {
        display: flex;
        justify-content: space-between;
        align-items: baseline;
        padding-top: 1.4rem;
    }

    .summary-total small {
        font-family: var(--font-display);
        font-size: 0.7rem;
        letter-spacing: 0.4em;
        text-transform: uppercase;
        color: var(--muted);
    }

    .summary-total strong {
        font-family: var(--font-display);
        font-weight: 400;
        font-size: 1.6rem;
        letter-spacing: 0.05em;
        color: var(--ink);
    }

    .summary-note {
        margin-top: 1.4rem;
        font-family: var(--font-serif);
        font-style: italic;
        font-size: 0.88rem;
        color: var(--muted);
        text-align: center;
    }

    @media (max-width: 860px) {
        .checkout-wrap {
            grid-template-columns: 1fr;
        }

        .order-summary {
            position: static;
            order: -1;
        }
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<main>
    <section class="page-hero bg-diagonals">
        <div class="ghost" aria-hidden="true">CHECKOUT</div>
        <div class="page-hero-content">
            <span class="eyebrow">One Last Step</span>
            <h1>Checkout</h1>
            <hr class="rule" />
        </div>
    </section>

    <div class="checkout-wrap">
        <div class="checkout-form reveal">
            <h2 class="display">Shipping Details</h2>

            <form action="/checkout/process" method="POST">
                <?= csrf_field() ?>

                <div class="form-group">
                    <label for="nama">Full Name</label>
                    <input type="text" id="nama" name="nama" placeholder="e.g. John Doe" required />
                </div>
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" placeholder="e.g. john@email.com" required />
                </div>
                <div class="form-group">
                    <label for="hp">Phone / WhatsApp</label>
                    <input type="text" id="hp" name="hp" placeholder="e.g. 08123456789" required />
                </div>
                <div class="form-group">
                    <label for="alamat">Shipping Address</label>
                    <textarea id="alamat" name="alamat" placeholder="Enter your full address..." required></textarea>
                </div>
                <div class="form-group">
                    <label for="catatan">Notes <span style="text-transform:none;letter-spacing:0;">(optional)</span></label>
                    <textarea id="catatan" name="catatan" placeholder="e.g. Size L, black color..."></textarea>
                </div>

                <div class="form-group">
                    <label>Payment Method</label>
                    <div class="pay-options">
                        <div class="pay-option">
                            <input type="radio" id="pay-qris" name="pembayaran" value="QRIS" required />
                            <label for="pay-qris">
                                <strong>QRIS</strong>
                                <small>Scan &amp; pay from any e-wallet or mobile banking.</small>
                            </label>
                        </div>
                        <div class="pay-option">
                            <input type="radio" id="pay-transfer" name="pembayaran" value="Transfer Bank" />
                            <label for="pay-transfer">
                                <strong>Bank Transfer</strong>
                                <small>BCA / Mandiri &mdash; details after order confirmation.</small>
                            </label>
                        </div>
                        <div class="pay-option">
                            <input type="radio" id="pay-cod" name="pembayaran" value="COD" />
                            <label for="pay-cod">
                                <strong>Cash on Delivery</strong>
                                <small>Pay when the piece reaches your hands.</small>
                            </label>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn--red btn--block"><span>Place Order</span></button>
            </form>
        </div>

        <aside class="order-summary reveal reveal-d1">
            <h2 class="display">Your Order</h2>

            <?php foreach ($cart as $item) : ?>
                <div class="summary-item">
                    <span class="name"><?= esc($item['name']) ?> <small>&times; <?= $item['quantity'] ?></small></span>
                    <span class="amount">Rp <?= number_format($item['price'] * $item['quantity'], 0, ',', '.') ?></span>
                </div>
            <?php endforeach; ?>

            <div class="summary-total">
                <small>Total</small>
                <strong>Rp <?= number_format($total, 0, ',', '.') ?></strong>
            </div>

            <p class="summary-note">Every piece is packed with care &mdash; and a little note, from us to you.</p>
        </aside>
    </div>
</main>
<?= $this->endSection() ?>
