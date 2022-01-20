<h2>Категории: </h2>
<p><a href="/">В начало<a></p>
<?php foreach($catList as $cat): ?>
    <div>
        <h2><a href="<?=route('category.show', ['title' => $cat['title']])?>"><?=$cat['title']?></a></h2>
    </div><hr>
<?php endforeach; ?>