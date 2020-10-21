<?php
 namespace App;
/**
 * Class Autoloader 
 * @package App
 */
class Autoloader{

    /**
     * Enregistre notre autoloader
     *
     * @return void
     */
    public static function register(){
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    /**
     * Inclue le fichier correspondant à notre classe
     *
     * @param [string] $class Le nom  de la classe à charger
     * @return void
     */
    private static function autoload($class){
        if (strpos($class, __NAMESPACE__ . '\\') === 0){
            $class = str_replace(__NAMESPACE__ . '\\', '', $class);
            $class = str_replace('\\', '/', $class);
            require __DIR__ .'/'. $class . '.php';
        }
    }

}