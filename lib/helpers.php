<?php
function sanitizePOST($value)
{
    return trim(filter_var($_POST["$value"], FILTER_SANITIZE_SPECIAL_CHARS));
}

function redirect($location)
{
    header("Location: $location");
    die();
}