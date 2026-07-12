<?= $this->extend('layouts/bare') ?>

<?php
$this->setVar('title', 'Login — Lost Soul Supply');
?>

<?= $this->section('content') ?>
<main class="auth-main" data-ghost="LOGIN">
    <div class="auth-card">
        <a href="/home">
            <img class="auth-logo" src="<?= lss_img('logo-mark.png', 'https://i.ibb.co/VxpPWFz/Tak-berjudul3-20230425225531.png') ?>" alt="Lost Soul Supply" />
        </a>

        <h1>Welcome Back</h1>
        <p class="auth-sub">The battles continue &mdash; but you're not alone.</p>

        <?php if (session()->getFlashdata('error')) : ?>
            <div class="alert alert-error"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('success')) : ?>
            <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
        <?php endif; ?>

        <form action="/login/process" method="POST">
            <?= csrf_field() ?>
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" placeholder="john@email.com" required />
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;" required />
            </div>

            <a href="/forgot-password" class="forgot-link">Forgot password?</a>

            <button type="submit" class="btn btn--red btn--block"><span>Sign In</span></button>
        </form>

        <p class="auth-links">Don't have an account? <a href="/register">Sign Up</a></p>

        <a href="/home" class="auth-back">&larr; Back to Home</a>
    </div>
</main>
<?= $this->endSection() ?>
