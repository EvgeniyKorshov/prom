<h2>Категории новостей</h2>


<?php foreach ($categories as $item):?>
<a href=" /news/categories/<?= $item['id']?> "> <?= $item['title']?> </a><br>

<?php endforeach; ?>

<p><a href="/">На главную</a></p>