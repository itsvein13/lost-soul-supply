<?= $this->extend('layouts/bare') ?>

<?php
$this->setVar('title', 'Create Account — Lost Soul Supply');
?>

<?= $this->section('content') ?>
<main class="auth-main" data-ghost="JOIN US">
    <div class="auth-card">
        <a href="/home">
            <img class="auth-logo" src="<?= lss_img('logo-mark.png', 'https://i.ibb.co/VxpPWFz/Tak-berjudul3-20230425225531.png') ?>" alt="Lost Soul Supply" />
        </a>

        <h1>Create Account</h1>
        <p class="auth-sub">Join the souls who wear what they feel.</p>

        <?php if (session()->getFlashdata('error')) : ?>
            <div class="alert alert-error"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>

        <form action="/register/process" method="POST" id="registerForm">
            <?= csrf_field() ?>
            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name" placeholder="John Doe" required />
            </div>
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" placeholder="john@email.com" required />
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;" required minlength="8" />
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm Password</label>
                <input type="password" id="confirm_password" name="confirm_password" placeholder="&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;" required />
            </div>

            <div class="alert alert-error" id="matchError" style="display:none;">Passwords do not match.</div>

            <button type="submit" class="btn btn--red btn--block"><span>Sign Up</span></button>
        </form>

        <p class="auth-links">Already have an account? <a href="/login">Sign In</a></p>

        <a href="/home" class="auth-back">&larr; Back to Home</a>
    </div>
</main>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    document.getElementById('registerForm').addEventListener('submit', function(e) {
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
