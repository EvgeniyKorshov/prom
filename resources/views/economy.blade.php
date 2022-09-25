<h2>Экономика</h2>

<?php foreach ($categories as $item):?>
<?php if ($item['id'] === 2):?>
<?php foreach ($item['news'] as $item_):?>
<a href="/news/categories/economy/<?= $item_['id']?> "> <?= $item_['title'] . PHP_EOL .  $item_['id']?> </a><br>


<?php endforeach; ?>

<?php endif ?>
<?php endforeach; ?>

<p><a href="/news/categories">Все категории новостей</a></p>
<p><a href="/">На главную</a></p>