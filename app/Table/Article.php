<?php
    
        namespace App\Table;
        
        use App\App;
        
    class Article extends Table {
        
        public static function getLast() {
            $statement = "
                            SELECT t_articles.idT_ARTICLES, t_articles.titre, t_articles.contenu, t_categories_has_t_articles.T_CATEGORIES_idT_CATEGORIES as categorieId
                            FROM t_articles
                            LEFT JOIN t_categories_has_t_articles
                                ON t_categories_has_t_articles.T_ARTICLES_idT_ARTICLES = t_articles.idT_ARTICLES
                        ";
            
            return self::query($statement);
        }

        public static function lastByCategory($catId) {
            $statement = "
                            SELECT *
                            FROM t_categories_has_t_articles
                            INNER JOIN t_articles
                                ON t_categories_has_t_articles.T_ARTICLES_idT_ARTICLES = t_articles.idT_ARTICLES
                            WHERE t_categories_has_t_articles.T_CATEGORIES_idT_CATEGORIES = ?
                        ";
    
            return self::query($statement, [$catId]);
        }

        public function getURL() {
            return 'index.php?p=article&id=' . $this->idT_ARTICLES;
        }

        public function getExtrait() {
            $html = '<p>' . substr($this->contenu, 0, 50) . '...</p>';
            $html .= '<p><a href="'. $this->getURL() .'"> Voir la suite</a></p>';
            return $html;
        }

    }