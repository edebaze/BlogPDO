<?php
    namespace Core;
    /**
     * Class Autoloader
     * @package Tutoriel
     */
    class Autoloader {

        /**
         * Enregistre notre autoloader
         */
        static function register(){
            spl_autoload_register(array(__CLASS__, 'autoload'));
        }


        /**
         * Inclue le fichier correspondant à notre classe
         * @param $class string Le nom de la classe à charger
         */
        static function autoload($class){
            $arrayClass = explode('\\', $class);
            if (__NAMESPACE__ == $arrayClass[0]) {
                if (strpos($class, __NAMESPACE__ . '\\') === 0) {
                    $class = str_replace(__NAMESPACE__ . '\\', '', $class);
                    $class = str_replace('\\', '/', $class);
                }
    
                require_once $class . '.php';
            }
        }

    }