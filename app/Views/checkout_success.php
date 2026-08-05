<?= $this->extend('layouts/main') ?>

<?php
$this->setVar('title', 'Order Received — Lost Soul Supply');
$this->setVar('active', '');
$this->setVar('loader', 'THANK YOU');
?>

<?= $this->section('styles') ?>
<style>
    .success-wrap {
        max-width: 720px;
        margin: 0 auto;
        padding: clamp(4rem, 10vh, 6rem) 2rem clamp(5rem, 14vh, 8rem);
    }

    .success-card {
        border: 1px solid var(--hairline);
        padding: clamp(1.8rem, 5vw, 2.8rem);
        margin-bottom: 2rem;
    }

    .success-card h2 {
        font-size: 1.5rem;
        letter-spacing: 0.2em;
        margin-bottom: 1.4rem;
    }

    .detail-row {
        display: flex;
        justify-content: space-between;
        gap: 1.5rem;
        padding: 0.85rem 0;
        border-bottom: 1px solid var(--hairline);
    }

    .detail-row:last-of-type {
        border-bottom: 0;
    }

    .detail-row > span:first-child {
        font-family: var(--font-display);
        font-size: 0.68rem;
        letter-spacing: 0.3em;
        text-transform: uppercase;
        color: var(--muted);
        white-space: nowrap;
        padding-top: 0.3em;
    }

    .detail-row > span:last-child {
        font-family: var(--font-serif);
        font-size: 1rem;
        color: var(--text);
        text-align: right;
    }

    .success-total {
        display: flex;
        justify-content: space-between;
        align-items: baseline;
        padding-top: 1.4rem;
    }

    .success-total small {
        font-family: var(--font-display);
        font-size: 0.7rem;
        letter-spacing: 0.4em;
        text-transform: uppercase;
        color: var(--muted);
    }

    .success-total strong {
        font-family: var(--font-display);
        font-weight: 400;
        font-size: 1.6rem;
        color: var(--ink);
    }

    .payment-note {
        margin-top: 1.6rem;
        border-left: 2px solid var(--accent-deep);
        background: rgba(71, 78, 82, 0.06);
        padding: 1.1rem 1.3rem;
        font-size: 0.98rem;
        line-height: 1.8;
    }

    .payment-note strong {
        font-family: var(--font-display);
        font-weight: 400;
        letter-spacing: 0.2em;
        text-transform: uppercase;
        font-size: 0.8rem;
        display: block;
        margin-bottom: 0.3rem;
    }

    .success-actions {
        display: flex;
        gap: 1.6rem;
        align-items: center;
        justify-content: center;
        flex-wrap: wrap;
        margin-top: 2.6rem;
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<main>
    <section class="page-hero bg-diagonals">
        <div class="ghost" aria-hidden="true">THANK YOU</div>
        <div class="page-hero-content">
            <span class="eyebrow">Order N&deg; <?= str_pad((string) $order['id'], 4, '0', STR_PAD_LEFT) ?> &mdash; Received</span>
            <h1>Thank You</h1>
            <hr class="rule" />
            <p class="page-hero-sub">Your piece will carry its story to you soon.</p>
        </div>
    </section>

    <div class="success-wrap">
        <div class="success-card reveal">
            <h2 class="display">Shipping Details</h2>
            <div class="detail-row">
                <span>Name</span>
                <span><?= esc($order['nama']) ?></span>
            </div>
            <div class="detail-row">
                <span>Email</span>
                <span><?= esc($order['email']) ?></span>
            </div>
            <div class="detail-row">
                <span>Phone</span>
                <span><?= esc($order['hp']) ?></span>
            </div>
            <div class="detail-row">
                <span>Address</span>
                <span><?= esc($order['alamat']) ?></span>
            </div>
            <?php if (!empty($order['catatan'])) : ?>
                <div class="detail-row">
                    <span>Notes</span>
                    <span><?= esc($order['catatan']) ?></span>
                </div>
            <?php endif; ?>
            <div class="detail-row">
                <span>Payment</span>
                <span><?= esc($order['pembayaran']) ?></span>
            </div>
        </div>

        <div class="success-card reveal">
            <h2 class="display">Your Pieces</h2>
            <?php foreach ($items as $item) : ?>
                <div class="detail-row">
                    <span><?= esc($item['nama']) ?> &times;<?= $item['qty'] ?></span>
                    <span>Rp <?= number_format($item['harga'] * $item['qty'], 0, ',', '.') ?></span>
                </div>
            <?php endforeach; ?>

            <div class="success-total">
                <small>Total</small>
                <strong>Rp <?= number_format($order['total'], 0, ',', '.') ?></strong>
            </div>

            <?php if ($order['pembayaran'] === 'Transfer Bank') : ?>
                <div class="payment-note">
                    <strong>Bank Transfer</strong>
                    BCA &mdash; 1234567890 a.n. Lost Soul Supply<br>
                    Mandiri &mdash; 0987654321 a.n. Lost Soul Supply<br>
                    Please confirm your transfer via WhatsApp after payment.
                </div>
            <?php elseif ($order['pembayaran'] === 'QRIS') : ?>
                <div class="payment-note">
                    <strong>QRIS Payment</strong>
                    We will send the QR code via WhatsApp / email within a few minutes.
                </div>
            <?php elseif ($order['pembayaran'] === 'COD') : ?>
                <div class="payment-note">
                    <strong>Cash on Delivery</strong>
                    Please prepare the exact amount when the courier arrives.
                    We will confirm the delivery schedule via WhatsApp.
                </div>
            <?php endif; ?>
        </div>

        <div class="success-actions reveal">
            <a href="/collection" class="btn btn--red"><span>Continue Exploring</span></a>
            <a href="/home" class="link-line">Back to Home</a>
        </div>
    </div>
</main>
<?= $this->endSection() ?>
