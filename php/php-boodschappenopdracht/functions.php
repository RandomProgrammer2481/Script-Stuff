<?php

function dd($value) {
    
    echo"<pre>";
    print_r($value);
    echo"</pre>";

    die();
}

function urlIs($url) {
    return $_SERVER['REQUEST_URI'] === $url;
}