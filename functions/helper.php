<?php

if (! function_exists('str_make_slug')) {
    function str_make_slug($string, $separator) {
        return str_slug($string, $separator)
            . $separator
            . time()
            . mt_rand(0, 100);
    }
}
