<?php
$loaderWord = $loader ?? 'LOST SOUL SUPPLY';
?>
<div id="loader" aria-hidden="true">
    <div class="loader-text">
        <?php
        $chars = preg_split('//u', $loaderWord, -1, PREG_SPLIT_NO_EMPTY);
        foreach ($chars as $i => $ch) :
            $delay = number_format($i * 0.045, 3);
        ?><span style="animation-delay: <?= $delay ?>s"><?= $ch === ' ' ? '&nbsp;' : esc($ch) ?></span><?php
        endforeach;
        ?>
    </div>
    <div class="loader-bar-wrap">
        <div class="loader-bar"></div>
    </div>
</div>

<div class="page-transition" id="pageTransition"></div>
