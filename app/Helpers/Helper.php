<?php

if (!function_exists('make_slug')) {
    function make_slug($urlString){
        $slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $urlString);
        return $slug;
    }
}

?>