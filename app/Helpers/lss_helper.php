<?php

/**
 * Lost Soul Supply — asset helper.
 *
 * lss_img('hero-bg.png', 'https://remote/fallback.png')
 * Menggunakan file lokal di public/assets/img jika tersedia;
 * jika belum ada, otomatis memakai URL remote (hotlink lama).
 * Cukup taruh file dengan nama yang sama di public/assets/img
 * dan website langsung memakai versi lokal.
 */
if (!function_exists('lss_img')) {
    function lss_img(string $file, string $fallback = ''): string
    {
        if (is_file(FCPATH . 'assets/img/' . $file)) {
            return '/assets/img/' . $file;
        }

        return $fallback !== '' ? $fallback : '/assets/img/' . $file;
    }
}
