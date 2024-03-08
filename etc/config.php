<?php
//Need both this and global and all files outside classes.
spl_autoload_register(function ($class){
    $class_path = str_replace("\\", DIRECTORY_SEPARATOR, $class);

    $file = dirname(__DIR__) . '/classes/'. $class_path . '.php'; //Allows you to access the classes inside of the classes directory
    if(file_exists($file)){
        require_once $file;
    }
});
?>