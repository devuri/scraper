<?php
$autoload = function ($class) {
    $path = str_replace("\\", "/", $class);
    $file = __DIR__."/".strtolower($path).".php";
    if (file_exists($file)) {
        require_once($file);
    }
};

spl_autoload_register($autoload);
