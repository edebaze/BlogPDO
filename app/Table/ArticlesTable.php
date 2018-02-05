<?php
    /**
     * Created by PhpStorm.
     * User: admin
     * Date: 05/02/2018
     * Time: 11:10
     */
    
    namespace App\Table;
    
    use \Core\Table\Table;
    
    
    class ArticlesTable extends Table {
    
            public function last() {
                /**
                 * Recupère les derniers articles
                 * @return array
                 */
                
                public function last() {
                    return $this->query("
                        SELECT t_articles.idT_ARTICLES, t_articles.titre, t_articles.contenu, t_categories_has_t_articles.T_CATEGORIES_idT_CATEGORIES as categorieId
                        FROM t_articles
                        LEFT JOIN t_categories_has_t_articles
                            ON t_categories_has_t_articles.T_ARTICLES_idT_ARTICLES = t_articles.idT_ARTICLES
                        ORDER BY t_articles.T_ARTICLES_idT_ARTICLES DESC
                    ");
                }
                
            }
    
    }