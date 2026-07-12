<?= $this->extend('layouts/main') ?>

<?php
$this->setVar('title', 'Our Story — Lost Soul Supply');
$this->setVar('active', 'about');
$this->setVar('loader', 'OUR STORY');
?>

<?= $this->section('styles') ?>
<style>
    /* ── Journal ── */
    .journal {
        max-width: 720px;
        margin: 0 auto;
        padding: clamp(5rem, 14vh, 9rem) 2rem;
    }

    .journal-entry {
        margin-bottom: clamp(4rem, 10vh, 6.5rem);
    }

    .journal-entry .eyebrow {
        margin-bottom: 1.6rem;
    }

    .journal-entry p {
        font-size: clamp(1.1rem, 1.6vw, 1.25rem);
        line-height: 2;
        color: #4a4744;
    }

    /* Drop cap pada paragraf pembuka */
    .journal-entry:first-of-type p:first-of-type::first-letter {
        font-family: var(--font-display);
        font-size: 4.2em;
        line-height: 0.8;
        float: left;
        margin: 0.08em 0.16em 0 0;
        color: var(--accent-deep);
    }

    /* Kalimat besar — nafas di antara paragraf */
    .journal-pull {
        margin: clamp(4rem, 12vh, 7rem) 0;
        text-align: center;
    }

    .journal-pull p {
        font-family: var(--font-serif);
        font-style: italic;
        font-weight: 300;
        font-size: clamp(1.7rem, 4vw, 2.8rem);
        line-height: 1.45;
        color: var(--ink);
    }

    .journal-pull em {
        color: var(--accent-deep);
    }

    .journal-pull .rule {
        margin: 2rem auto 0;
    }

    /* Kata-kata berat, ditampilkan sebagai daftar tipografis */
    .journal-words {
        margin: clamp(4rem, 12vh, 7rem) 0;
        text-align: center;
    }

    .journal-words span {
        display: block;
        font-family: var(--font-display);
        font-size: clamp(1.8rem, 5vw, 3.2rem);
        letter-spacing: 0.22em;
        text-transform: uppercase;
        color: transparent;
        -webkit-text-stroke: 1px rgba(16, 16, 16, 0.35);
        line-height: 1.35;
        transition: color 0.5s ease, -webkit-text-stroke-color 0.5s ease;
    }

    .journal-words span:hover,
    .journal-words span.visible:hover {
        color: var(--red);
        -webkit-text-stroke-color: var(--red);
    }

    /* Penutup / tanda tangan */
    .journal-close {
        text-align: center;
        margin-top: clamp(3rem, 8vh, 5rem);
    }

    .journal-close p.big {
        font-family: var(--font-serif);
        font-style: italic;
        font-size: clamp(1.5rem, 3.4vw, 2.3rem);
        line-height: 1.5;
        color: var(--ink);
        max-width: 26ch;
        margin: 0 auto 2.4rem;
    }

    .journal-close .signature {
        font-family: var(--font-serif);
        font-style: italic;
        font-size: 1.1rem;
        color: var(--muted);
        letter-spacing: 0.16em;
    }

    /* ── Principles ── */
    .principles {
        text-align: center;
    }

    .principles-head {
        margin-bottom: clamp(3rem, 8vh, 5rem);
        position: relative;
        z-index: 1;
    }

    .principles-head .eyebrow {
        margin-bottom: 1.2rem;
    }

    .principles-head h2 {
        font-size: var(--fs-h2);
    }

    .principles-list {
        max-width: 780px;
        margin: 0 auto;
        position: relative;
        z-index: 1;
    }

    .principle {
        padding: clamp(2.2rem, 6vh, 3.4rem) 1rem;
        border-top: 1px solid var(--hairline-w);
    }

    .principle:last-child {
        border-bottom: 1px solid var(--hairline-w);
    }

    .principle h3 {
        font-family: var(--font-display);
        font-weight: 400;
        font-size: clamp(1.9rem, 4.5vw, 3rem);
        letter-spacing: 0.24em;
        text-transform: uppercase;
        color: var(--white);
        margin-bottom: 0.8rem;
        transition: color 0.4s, letter-spacing 0.6s var(--ease-out);
    }

    .principle:hover h3 {
        color: var(--accent-mist);
        letter-spacing: 0.3em;
    }

    .principle small {
        display: block;
        font-family: var(--font-display);
        font-size: 0.65rem;
        letter-spacing: 0.4em;
        color: rgba(255, 255, 255, 0.3);
        margin-bottom: 1rem;
    }

    .principle p {
        font-family: var(--font-serif);
        font-style: italic;
        font-size: 1.05rem;
        color: rgba(255, 255, 255, 0.55);
        max-width: 46ch;
        margin: 0 auto;
    }

    /* ── CTA ── */
    .about-cta {
        text-align: center;
        background: var(--light);
    }

    .about-cta::before {
        content: 'VOICE';
        position: absolute;
        bottom: -0.12em;
        left: -0.04em;
        font-family: var(--font-display);
        font-size: clamp(6rem, 20vw, 15rem);
        color: rgba(16, 16, 16, 0.04);
        line-height: 1;
        pointer-events: none;
        user-select: none;
    }

    .about-cta > * {
        position: relative;
        z-index: 1;
    }

    .about-cta h2 {
        font-size: var(--fs-h2);
    }

    .about-cta p {
        font-style: italic;
        color: var(--muted);
        margin: 1.2rem auto 2.2rem;
        max-width: 44ch;
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<main>
    <!-- ── Hero ── -->
    <section class="page-hero bg-diagonals">
        <div class="ghost" aria-hidden="true">ABOUT</div>
        <div class="page-hero-content">
            <span class="eyebrow">Our Story &mdash; Est. July 1st, 2022</span>
            <h1>A Soul Behind<br>Every Stitch</h1>
            <hr class="rule" />
            <p class="page-hero-sub">This is not a company profile. It is a confession.</p>
        </div>
    </section>

    <!-- ── Journal ── -->
    <section class="journal">
        <article class="journal-entry reveal">
            <span class="eyebrow">I &mdash; The Beginning</span>
            <p>Lost Soul was founded on July 1st, 2022, by its Owner &mdash; still a college
                student at the time. It was never meant to be a business first. It was created
                to express the emotions that were too difficult to put into words.</p>
        </article>

        <div class="journal-words">
            <span class="reveal">Betrayal</span>
            <span class="reveal reveal-d1">Identity Crisis</span>
            <span class="reveal reveal-d2">Depression</span>
            <span class="reveal reveal-d3">Trauma</span>
            <span class="reveal reveal-d4">Confusion</span>
        </div>

        <article class="journal-entry reveal">
            <span class="eyebrow">II &mdash; The Darkest Point</span>
            <p>Throughout the journey, the Owner walked through all of it. At one point, the
                Owner even contemplated ending their life &mdash; but beautiful memories that
                resurfaced became a reason to keep going.</p>
        </article>

        <div class="journal-pull reveal">
            <p>The memories that came back<br>became <em>a reason to stay.</em></p>
            <hr class="rule rule--center reveal-line" />
        </div>

        <article class="journal-entry reveal">
            <span class="eyebrow">III &mdash; The Turning</span>
            <p>That is how Lost Soul became a platform of expression &mdash; a way to convey
                feelings that are hard to speak. Not only an outlet for the Owner, but a space
                for everyone who carries battles of their own, in silence.</p>
        </article>

        <div class="journal-close reveal">
            <p class="big">We care about you. We hope you win the battles that no one knows.</p>
            <p class="signature">&mdash; Owner, Lost Soul Supply</p>
        </div>
    </section>

    <!-- ── Principles ── -->
    <section class="section section--dark bg-diagonals principles">
        <div class="principles-head">
            <span class="eyebrow eyebrow--light reveal">What We Stand For</span>
            <h2 class="display reveal reveal-d1">Three Truths</h2>
        </div>

        <div class="principles-list">
            <div class="principle reveal">
                <small>01</small>
                <h3>Authenticity</h3>
                <p>Every piece is born from real emotions, not trends. We make what we feel.</p>
            </div>
            <div class="principle reveal">
                <small>02</small>
                <h3>Expression</h3>
                <p>Art is the voice of those who struggle to speak. We give that voice a form.</p>
            </div>
            <div class="principle reveal">
                <small>03</small>
                <h3>Community</h3>
                <p>You are never alone. Lost Soul is a space for every lost soul out there.</p>
            </div>
        </div>
    </section>

    <!-- ── CTA ── -->
    <section class="section about-cta">
        <span class="eyebrow reveal">The Collection</span>
        <h2 class="display reveal reveal-d1">Find Your Voice</h2>
        <p class="reveal reveal-d2">Explore the pieces and wear what you feel.</p>
        <a href="/collection" class="btn btn--red reveal reveal-d3"><span>See the Collection</span></a>
    </section>
</main>
<?= $this->endSection() ?>
