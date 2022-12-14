<?php

spl_autoload_register('AutoLoader');

function AutoLoader($className)
{
    $fullPath = __DIR__ . "\\models\\" .  $className . ".php";

    if (file_exists($fullPath))
        require $fullPath;
}

function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
}
