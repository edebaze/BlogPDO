<?php
    use App\App;
    use App\Table\Article;
    use App\Table\Categorie;
    
    $statement = 'SELECT * FROM t_articles WHERE idT_ARTICLES = ?';

    $post = Article::find($_GET['id']);
    
    if($post == false) {
        App::notfound();
    }
    
?>


    <h1> <?= $post->titre; ?> </h1>

    <p><em></em></p>

    <p><?= $post->contenu; ?></p>



