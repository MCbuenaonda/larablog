<?php

namespace App\Helpers;

class CustomUrl {
    public static function url_slug($str) {
        return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $str)));
    }
}
