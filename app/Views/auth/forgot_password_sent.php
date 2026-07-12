<?= $this->extend('layouts/bare') ?>

<?php
$this->setVar('title', 'Reset Link — Lost Soul Supply');
?>

<?= $this->section('styles') ?>
<style>
    .reset-link-box {
        border: 1px solid var(--hairline);
        border-left: 2px solid var(--red);
        padding: 1.2rem 1.4rem;
        margin: 1.6rem 0;
        text-align: left;
        word-break: break-all;
    }

    .reset-link-box small {
        display: block;
        font-family: var(--font-display);
        font-size: 0.62rem;
        letter-spacing: 0.32em;
        text-transform: uppercase;
        color: var(--muted);
        margin-bottom: 0.5rem;
    }

    .reset-link-box a {
        font-family: var(--font-serif);
        font-size: 0.95rem;
        color: var(--ink);
        text-decoration: none;
        border-bottom: 1px solid var(--red);
        transition: color 0.3s;
    }

    .reset-link-box a:hover {
        color: var(--red);
    }

    .expiry-note {
        font-family: var(--font-serif);
        font-style: italic;
        font-size: 0.9rem;
        color: var(--muted);
        margin-bottom: 1.6rem;
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<main class="auth-main" data-ghost="SENT">
    <div class="auth-card">
        <a href="/home">
            <img class="auth-logo" src="<?= lss_img('logo-mark.png', 'https://i.ibb.co/VxpPWFz/Tak-berjudul3-20230425225531.png') ?>" alt="Lost Soul Supply" />
        </a>

        <h1>Reset Link Ready</h1>
        <p class="auth-sub">Since this app doesn't use an email server yet, here is your password reset link directly:</p>

        <?php $resetLink = session()->get('reset_link'); ?>
        <?php if ($resetLink) : ?>
            <div class="reset-link-box">
                <small>Your Reset Link</small>
                <a href="<?= esc($resetLink, 'attr') ?>"><?= esc($resetLink) ?></a>
            </div>
            <p class="expiry-note">This link expires in 1 hour.</p>
        <?php else : ?>
            <div class="alert alert-error">No reset link found. Please try again.</div>
        <?php endif; ?>

        <a href="/login" class="btn btn--red"><span>Back to Sign In</span></a>
    </div>
</main>
<?= $this->endSection() ?>
