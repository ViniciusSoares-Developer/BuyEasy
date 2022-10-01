<?php if($productList):?>
<?php foreach($productList as $product):?>
    <img width="100" height="100" src="<?= sprintf("%s/%s", constant("URL"),substr($product['image_path'],3))?>" alt="">
    <h1><?= $product['name']?></h1>
    <p><?= $product['description']?></p>
    <p>R$ <?= $product['price']?></p>
<?php endforeach?>
<?php else:?>
    <h1>Not Found</h1>
<?php endif?>