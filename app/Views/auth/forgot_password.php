<?= $this->extend('layouts/bare') ?>

<?php
$this->setVar('title', 'Forgot Password — Lost Soul Supply');
?>

<?= $this->section('content') ?>
<main class="auth-main" data-ghost="RESET">
    <div class="auth-card">
        <a href="/home">
            <img class="auth-logo" src="<?= lss_img('logo-mark.png', 'https://i.ibb.co/VxpPWFz/Tak-berjudul3-20230425225531.png') ?>" alt="Lost Soul Supply" />
        </a>

        <h1>Forgot Password</h1>
        <p class="auth-sub">It happens. Let's get you back in.</p>

        <?php if (session()->getFlashdata('error')) : ?>
            <div class="alert alert-error"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>

        <form action="/forgot-password/process" method="POST">
            <?= csrf_field() ?>
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" placeholder="john@email.com" required />
            </div>

            <button type="submit" class="btn btn--red btn--block"><span>Send Reset Link</span></button>
        </form>

        <a href="/login" class="auth-back">&larr; Back to Sign In</a>
    </div>
</main>
<?= $this->endSection() ?>
