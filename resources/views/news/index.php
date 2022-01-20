<h2>Категория: <?=$catTitle?></h2>
<p><a href="/">В начало<a> &nbsp; <a href="<?=route('category.index')?>">К выбору категорий<a></p>
<?php foreach($newsList as $news): ?>
    
    <div>
        <h2><a href="<?=route('news.show', ['id' => $news['id']])?>"><?=$news['title']?></a></h2>
        <p>Автор: <?=$news['author']?> &nbsp; Дата добавления: <?=$news['created_at']?></p>
        <p><?=$news['description']?></p>
    </div><hr>
<?php endforeach; ?>
// Для отладки вывода можно исп-ть хелпер dd(<переменная>) - позволяет вывести что то и умереть
// route - хелпер для использования имен роутов