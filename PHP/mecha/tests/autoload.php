<?php
spl_autoload_register(function ($class){
    require '..' . DIRECTORY_SEPARATOR .'src' . DIRECTORY_SEPARATOR. str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
});