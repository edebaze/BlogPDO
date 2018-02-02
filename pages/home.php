

    <div class="row">
    
        <div class="col-xs-8">
        
            <?php foreach(\App\Table\Article::getLast() as $post): ?>
            
                <h2><a href="<?= $post->url; ?>"><?= $post->titre; ?></a></h2>
            
                <p><em></em></p>
            
                <p><?= $post->extrait; ?></p>
            
            <?php endforeach; ?>
        
        </div>
        
        <div class="col-xs-4">
            <ul>
                
                <?php foreach(\App\Table\Categorie::all() as $categorie): ?>
                
                        <li><a href="<?= $categorie->url; ?>"> <?= $categorie->categorie; ?></a></li>
                
                <?php endforeach; ?>
                
                
            </ul>
        </div>
    
    </div>