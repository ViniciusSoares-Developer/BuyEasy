
<img width="100" height="100" src="<?= sprintf("%s/%s", constant("URL"),substr($productList['image_path'],3))?>" alt="">
<h1><?= $productList['name']?></h1>
<p><?= $productList['description']?></p>
<p>R$ <?= $productList['price']?></p>

<a href="?page=user&idU=<?=$productList['id_user']?>">
    <img width="100" height="100" src="<?= sprintf("%s/%s", constant("URL"),substr($productList['image_user'],3))?>" alt="">
    <h1><?= $productList['name_user']?></h1>
</a>
