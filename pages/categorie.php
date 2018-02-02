<?php
    use App\App;
    use App\Table\Categorie;
    use App\Table\Article;
    
    $categorie = Categorie::find($_GET['id']); if(!$categorie) App::notfound();
    $articles = Article::lastByCategory($_GET['id']);
    $categories = Categorie::all();
?>


<h1><?= $categorie->categorie ?></h1>

<div class="row">
    
        <div class="col-xs-8">
        
            <?php foreach($articles as $post): ?>
    
                <h2><a href="<?= $post->url; ?>"><?= $post->titre; ?></a></h2>
    
                <p><em></em></p>
    
                <p><?= $post->extrait; ?></p>

            <?php endforeach; ?>
        
        </div>
        
        <div class="col-xs-4">
            <ul>
                
                <?php foreach($categories as $cat): ?>
    
                    <li><a href="<?= $cat->url; ?>"> <?= $cat->categorie; ?></a></li>

                <?php endforeach; ?>
                
                
            </ul>
        </div>
    
    </div>

