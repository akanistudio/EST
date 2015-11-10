<?php

require_once TWIG_DIR . '/Twig/Autoloader.php';
require_once TWIG_DIR . '/Twig/ExtensionInterface.php';
require_once TWIG_DIR . '/Twig/Extension.php';

class Wp_TwigEngine_Autoloader {
 
    static public function register() {
        ini_set('unserialize_callback_func', 'spl_autoload_call');
        spl_autoload_register(array(new self, 'autoload'));
    }
 
    static public function autoload($class) {
        if (0 !== strpos($class, 'Wp_TwigEngine')) {
            return;
        }
 
        if (file_exists($file = dirname(__FILE__) . '/../' . str_replace(array('_', "\0"), array('/', ''), $class) . '.php')) {
            echo($file);
            exit;
            require $file;
        }
    }
 
}

class OurTwigProxy {
 
    public function __call($function, $arguments) {
 
        if (!function_exists($function)) {
            //trigger_error('call to unexisting function ' . $function, E_USER_ERROR);
            return NULL;
        }
        return call_user_func_array($function, $arguments);
    }
}

Twig_Autoloader::register();
Wp_TwigEngine_Autoloader::register();


?>