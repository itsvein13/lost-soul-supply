<?= $this->extend('layouts/bare') ?>

<?php
$this->setVar('title', 'Reset Password — Lost Soul Supply');
?>

<?= $this->section('content') ?>
<main class="auth-main" data-ghost="RESET">
    <div class="auth-card">
        <a href="/home">
            <img class="auth-logo" src="<?= lss_img('logo-mark.png', 'https://i.ibb.co/VxpPWFz/Tak-berjudul3-20230425225531.png') ?>" alt="Lost Soul Supply" />
        </a>

        <h1>Reset Password</h1>
        <p class="auth-sub">Choose a new password for your account.</p>

        <?php if (session()->getFlashdata('error')) : ?>
            <div class="alert alert-error"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>

        <form action="/reset-password/process" method="POST" id="resetForm">
            <?= csrf_field() ?>
            <input type="hidden" name="token" value="<?= esc($token, 'attr') ?>" />

            <div class="form-group">
                <label for="password">New Password</label>
                <input type="password" id="password" name="password" placeholder="&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;" required minlength="8" />
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm New Password</label>
                <input type="password" id="confirm_password" name="confirm_password" placeholder="&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;" required />
            </div>

            <div class="alert alert-error" id="matchError" style="display:none;">Passwords do not match.</div>

            <button type="submit" class="btn btn--red btn--block"><span>Reset Password</span></button>
        </form>

        <a href="/login" class="auth-back">&larr; Back to Sign In</a>
    </div>
</main>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    document.getElementById('resetForm').addEventListener('submit', function(e) {
        var p = document.getElementById('password').value;
        var c = document.getElementById('confirm_password').value;
        var err = document.getElementById('matchError');
        if (p !== c) {
            e.preventDefault();
            err.style.display = 'block';
        } else {
            err.style.display = 'none';
        }
    });
</script>
<?= $this->endSection() ?>
