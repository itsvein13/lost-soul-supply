<?php

if (!function_exists('lss_img')) {
    function lss_img(string $file, string $fallback = ''): string
    {
        if (is_file(FCPATH . 'assets/img/' . $file)) {
            return '/assets/img/' . $file;
        }

        return $fallback !== '' ? $fallback : '/assets/img/' . $file;
    }
}
