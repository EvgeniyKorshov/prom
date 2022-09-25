<?php foreach ($categories as $item):?>
<?php if ($item['id'] === 3):?>
<?php foreach ($item['news'] as $item_):?>
<?php foreach ($item_ as $item_11):?>
<?php if ($item_['id'] === 5):?>
<p><?= $item_11?></p>
<?php endif ?>
<?php endforeach; ?>

<?php endforeach; ?>

<?php endif ?>
<?php endforeach; ?>


<p><a href="/news/categories">Все категории новостей</a></p>
<p><a href="/">На главную</a></p>
