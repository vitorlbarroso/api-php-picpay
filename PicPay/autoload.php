<?php
    spl_autoload_register(function(string $class){
        $file = str_replace('\\', DIRECTORY_SEPARATOR, $class);
        $file .= '.class.php';
        require_once($file);
    })
?>