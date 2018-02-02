<?php
    
    namespace App\Table;
    
    use App\App;
    
    class Categorie extends Table{
        
            protected static $table = 't_categories';
    
            public function getURL() {
                return 'index.php?p=categorie&id=' . $this->idT_CATEGORIES;
            }
        
    }