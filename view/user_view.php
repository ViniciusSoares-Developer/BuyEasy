<h1><?= $profile['name']?></h1>
<h1><?= $profile['email']?></h1>
<h1><?= $profile['phone']?></h1>
<hr>
<?php if($productListUser):?>
<?php foreach($productListUser as $product):?>
    <a href="?page=product&idP=<?= $product['id']?>">
        <img width="100" height="100" src="<?= sprintf("%s/%s", constant("URL"),substr($product['image_path'],3))?>" alt="">
        <h1><?= $product['name']?></h1>
        <p><?= $product['description']?></p>
        <p>R$ <?= $product['price']?></p>
    </a>
<?php endforeach?>
<?php else:?>
    <h1>User not product</h1>
<?php endif?>