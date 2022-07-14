<?php

if (!function_exists('renderImage')) {
    function renderImage($imageFile) {
        if(!$imageFile) return;
        return '<img src='.asset($imageFile).'
        width='.\App\Http\Utiles\Constants::COMPANY_LOGO_INIT_WIDTH.'
        height='.\App\Http\Utiles\Constants::COMPANY_LOGO_INIT_HEIGHT.
        '>';
    }
}


