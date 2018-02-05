<?php
    namespace Core\Table;
    
    use Core\Database\Database;
    
    
    class Table {
    
            protected $table;
            protected $db;
            
            public function  __construct(Database $db) {
                $this->db = $db;
                if(is_null($this->table)) {
                    $parts = explode('\\', get_class($this));
                    $class_name = end($parts);
                    $this->table = strtolower(str_replace('Table', '', $class_name));
                }
            }
            
            public function all() {
                return $this->db->query('SELECT * FROM t_articles');
            }
    
    }
    
    
    
    
    
    
    
    
    
    
    
    
    /*
    
    class Table {
        
        public static function find($id) {
            $table = 'idT_' . strtoupper(get_called_class()) . 'S';
            $table = str_replace('APP\TABLE\\', '', $table);
            $statement = "
                            SELECT *
                            FROM  " . static::$table . "
                            WHERE ".$table." = ?
                        ";
    
            return App::getDb()->prepare($statement, [$id], get_called_class(), true);
        }
        
        public static function query($statement, $attributes = null, $one = false) {
            
            if($attributes) {
                return App::getDb()->prepare($statement, $attributes, get_called_class(), $one);
            } else {
                return App::getDb()->query($statement, get_called_class(), $one);
            }
            
          
        }
    
        public function __get($key) {
            $method = 'get' . ucfirst($key);
            $this->$key = $this->$method();
            return $this->$key;
        }
        
        public static function all() {
            $statement = "
                            SELECT *
                            FROM  " . static::$table . "
                        ";
        
            return App::getDb()->query($statement, get_called_class());
        }
        
    }
    
    
    */