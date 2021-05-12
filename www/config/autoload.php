<?php
/**
 * Klassen Loader
 */
spl_autoload_register(function (string $class) {
    $filePath = str_replace("\\", DIRECTORY_SEPARATOR, $class);
    if (file_exists($filePath . '.class.php')) {
        require $filePath . '.class.php';
    } elseif (file_exists("mvc" . DIRECTORY_SEPARATOR . $filePath . '.class.php')) {
        require "mvc/models" . DIRECTORY_SEPARATOR . $filePath . '.class.php';
    } elseif (file_exists("mvc" . DIRECTORY_SEPARATOR . $filePath . '.class.php')) {
        require "mvc" . DIRECTORY_SEPARATOR . $filePath . '.class.php';
    } elseif (file_exists("core" . DIRECTORY_SEPARATOR . $filePath . '.class.php')) {
        require "core" . DIRECTORY_SEPARATOR . $filePath . '.class.php';
    } else {
        echo 'Datei Klasse <b>' . $filePath . '.php </b> konnte nicht gefunden werden!';
        exit();
    }
});