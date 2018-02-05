<?php
    
    use Core\Config;
    use Core\Database\MysqlDatabase;

    class App {
    
        public $title = 'Grafikart Blog';
        private $db_instance;
        private static $_instance;
        
        public function getInstance() {
            if(is_null(self::$_instance)) {
                self::$_instance = new App();
            }
            return self::$_instance;
        }
        
        public function load() {
            session_start();
            require ROOT . '/core/Autoloader.php';
            Core\Autoloader::register();
            require ROOT . '/app/Autoloader.php';
            App\Autoloader::register();
        }
        
        public function getTable($name) {
            $class_name = '\\App\\Table\\' . ucfirst($name) . 'Table';
            return new $class_name($this->getDb());
        }
        
        public function getDb() {
            $config = Config::getInstance(ROOT . '/config/config.php');
            if(is_null($this->db_instance)) {
                $this->db_instance = new MysqlDatabase($config->get('db_name'), $config->get('db_user'), $config->get('db_pass'), $config->get('db_host'));
            }
            return $this->db_instance;
        }
        
        
        
        
        
        /*
        
        public static function getDb() {
            if(self::$database === null) {
                self::$database = new Database(self::DB_NAME, self::DB_USER, self::DB_PASS, self::DB_HOST);
            }
            return self::$database;
        }
        
        public static function notfound() {
            header("HTTP/1.0 404 Not Found");
            header('Location : index.php?p=404');
        }
        
        public static function getTitle() {
            return self::$title;
        }
    
        public static function setTitle() {
            self::$title .= ' | ' . $title;
        }
        
        */
    }