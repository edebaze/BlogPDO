<?php
    namespace App\Table;
    
    use App\App;
    
    class Table {
        
        protected static $table;
        
        private static function getTable() {
            if(static::$table == null) {
                $class_name = explode('\\', get_called_class());
                static::$table = 't_' . strtolower(end($class_name)) . 's';
            }
    
            return static::$table;
        }
        
        public static function find($id) {
            $statement = "
                            SELECT *
                            FROM  " . static::getTable() . "
                            WHERE idT_CATEGORIES = ?
                        ";
    
            return App::getDb()->prepare($statement, [$id], get_called_class(), true);
        }
    
        public function __get($key) {
            $method = 'get' . ucfirst($key);
            $this->$key = $this->$method();
            return $this->$key;
        }
        
        public static function all() {
            $statement = "
                            SELECT *
                            FROM  " . static::getTable() . "
                        ";
        
            return App::getDb()->query($statement, get_called_class());
        }
        
    }