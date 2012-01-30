<?php 
spl_autoload_register(function ($className) { 
    $possibilities = array( 
        APPLICATION_PATH.'beans'.DIRECTORY_SEPARATOR.$className.'.php', 
        APPLICATION_PATH.'controllers'.DIRECTORY_SEPARATOR.$className.'.php', 
        APPLICATION_PATH.'libraries'.DIRECTORY_SEPARATOR.$className.'.php', 
        APPLICATION_PATH.'models'.DIRECTORY_SEPARATOR.$className.'.php', 
        APPLICATION_PATH.'views'.DIRECTORY_SEPARATOR.$className.'.php', 
        $className.'.php' 
    ); 
    foreach ($possibilities as $file) { 
        if (file_exists($file)) { 
            require_once($file); 
            return true; 
        } 
    } 
    return false; 
}); 
?>
