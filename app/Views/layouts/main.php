<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= esc($title ?? 'Lost Soul Supply') ?></title>

    <link rel="icon" href="<?= lss_img('favicon-32.png', 'https://i.ibb.co.com/MSYKpXW/favicon-32x32.png') ?>" type="image/png" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;1,300;1,400&family=Bebas+Neue&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/lss.css">

    <script>
        /* Intro cinematic hanya sekali per sesi */
        (function() {
            var intro = true;
            try {
                intro = !sessionStorage.getItem('lss_intro');
                sessionStorage.setItem('lss_intro', '1');
            } catch (e) {}
            document.documentElement.classList.add(intro ? 'lss-intro' : 'lss-no-intro');
        })();
    </script>

    <?= $this->renderSection('styles') ?>
</head>

<body class="<?= esc($body_class ?? '') ?>">

    <?= $this->include('partials/overlays') ?>
    <?= $this->include('partials/header') ?>

    <?= $this->renderSection('content') ?>

    <?= $this->include('partials/footer') ?>

    <script src="/assets/js/lss.js"></script>
    <?= $this->renderSection('scripts') ?>
</body>

</html>
