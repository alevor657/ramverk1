<?php
function esc($var)
{
    return htmlentities($var);
}

function debug($var)
{
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
    exit;
}
