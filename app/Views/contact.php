<?= $this->extend('layouts/main') ?>

<?php
$this->setVar('title', 'Contact — Lost Soul Supply');
$this->setVar('active', 'contact');
$this->setVar('loader', 'CONTACT');
?>

<?= $this->section('styles') ?>
<style>
    .contact-wrap {
        max-width: 1080px;
        margin: 0 auto;
        padding: clamp(4rem, 12vh, 7rem) 2rem;
        display: grid;
        grid-template-columns: minmax(0, 5fr) minmax(0, 6fr);
        gap: clamp(3rem, 8vw, 6rem);
        align-items: start;
    }

    /* ── Kiri: cara menghubungi ── */
    .contact-ways .eyebrow {
        margin-bottom: 1.2rem;
    }

    .contact-ways h2 {
        font-size: var(--fs-h2);
        margin-bottom: 1.4rem;
    }

    .contact-ways .intro {
        font-style: italic;
        color: var(--muted);
        max-width: 40ch;
        margin-bottom: 2.6rem;
    }

    .way {
        display: block;
        text-decoration: none;
        padding: 1.3rem 0.2rem;
        border-top: 1px solid var(--hairline);
        transition: padding-left 0.4s var(--ease-out);
    }

    .way:last-of-type {
        border-bottom: 1px solid var(--hairline);
    }

    .way:hover {
        padding-left: 0.8rem;
    }

    .way small {
        display: block;
        font-family: var(--font-display);
        font-size: 0.62rem;
        letter-spacing: 0.34em;
        text-transform: uppercase;
        color: var(--muted);
        margin-bottom: 0.3rem;
        transition: color 0.3s;
    }

    .way strong {
        font-family: var(--font-serif);
        font-weight: 400;
        font-size: 1.15rem;
        color: var(--ink);
        transition: color 0.3s;
    }

    .way:hover small,
    .way:hover strong {
        color: var(--red);
    }

    /* ── Kanan: form ── */
    .contact-form .eyebrow {
        margin-bottom: 1.2rem;
    }

    .contact-form h2 {
        font-size: var(--fs-h2);
        margin-bottom: 2rem;
    }

    .contact-form .success-msg {
        display: none;
    }

    .contact-form .success-msg.show {
        display: block;
    }

    @media (max-width: 860px) {
        .contact-wrap {
            grid-template-columns: 1fr;
        }
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<main>
    <!-- ── Hero ── -->
    <section class="page-hero bg-diagonals">
        <div class="ghost" aria-hidden="true">CONTACT</div>
        <div class="page-hero-content">
            <span class="eyebrow">Reach Out</span>
            <h1>Talk to Us</h1>
            <hr class="rule" />
            <p class="page-hero-sub">For inquiries, collaborations &mdash; or if you simply need someone to listen.</p>
        </div>
    </section>

    <div class="contact-wrap">
        <!-- ── Ways ── -->
        <div class="contact-ways">
            <span class="eyebrow reveal">Where to Find Us</span>
            <h2 class="display reveal reveal-d1">Reach Us</h2>
            <p class="intro reveal reveal-d2">Every message is read by a human &mdash; usually the same soul who makes the pieces.</p>

            <div class="reveal reveal-d3">
                <a class="way" href="mailto:example@email.com">
                    <small>Email</small>
                    <strong>example@email.com</strong>
                </a>
                <a class="way" href="https://wa.me/6281234567890" target="_blank" rel="noopener">
                    <small>WhatsApp</small>
                    <strong>+62 812-3456-7890</strong>
                </a>
                <a class="way" href="https://instagram.com/yourusername" target="_blank" rel="noopener">
                    <small>Instagram</small>
                    <strong>@yourusername</strong>
                </a>
                <a class="way" href="https://tiktok.com/@yourusername" target="_blank" rel="noopener">
                    <small>TikTok</small>
                    <strong>@yourusername</strong>
                </a>
            </div>
        </div>

        <!-- ── Form ── -->
        <div class="contact-form">
            <span class="eyebrow reveal">Write to Us</span>
            <h2 class="display reveal reveal-d1">Send a Message</h2>

            <form id="contactForm" class="reveal reveal-d2">
                <div class="form-group">
                    <label for="name">Your Name</label>
                    <input type="text" id="name" placeholder="e.g. John Doe" required />
                </div>
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" placeholder="e.g. john@email.com" required />
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea id="message" placeholder="Write your message here..." required></textarea>
                </div>
                <button type="submit" class="btn btn--red btn--block"><span>Send Message</span></button>
                <div class="alert alert-success success-msg" id="successMsg">
                    Message sent. We'll get back to you soon &mdash; hang in there.
                </div>
            </form>
        </div>
    </div>
</main>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    document.getElementById('contactForm').addEventListener('submit', function(e) {
        e.preventDefault();
        var btn = this.querySelector('.btn span');
        btn.textContent = 'Sending...';
        var form = this;
        setTimeout(function() {
            document.getElementById('successMsg').classList.add('show');
            btn.textContent = 'Send Message';
            form.reset();
        }, 900);
    });
</script>
<?= $this->endSection() ?>
