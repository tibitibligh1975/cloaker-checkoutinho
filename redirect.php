<?php
require_once 'url.php';

function redirect($url, $redirect_type = 302, $add_querystring = true)
{
    if ($add_querystring === true) {
        $url = add_querystring($url);
    }
    
    if (!headers_sent()) {
        if ($redirect_type === 302) {
            header('X-Robots-Tag: noindex, nofollow');
            header('Location: ' . $url);
        } else {
            header('X-Robots-Tag: noindex, nofollow');
            header('Location: ' . $url, true, $redirect_type);
        }
    } else {
        echo "<script type='text/javascript'> window.location='$url';</script>";
    }
}

function jsredirect($url)
{
    echo "<script type='text/javascript'> window.location='$url';</script>";
    return;
}
