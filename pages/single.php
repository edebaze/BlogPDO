<?php
    $statement = 'SELECT * FROM t_articles WHERE idT_ARTICLES = ?';

    $post = App\App::getDb()->prepare($statement,  [$_GET['id']], 'App\Table\Article', true);
?>


    <h1> <?= $post->titre; ?> </h1>

    <p><?= $post->contenu; ?></p>



