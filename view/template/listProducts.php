<?php if (!($idP && $idU)) :?>
    <?php foreach ($productList as $product) : ?>
        <div class="col-6 col-md-4 col-lg-2 mb-4">
            <a href="?page=product&idP=<?= $product['id'] ?>&idU=<?= $product['id_merchant'] ?>" class="grid-container" style="text-decoration: none;">
                <div class="card w-100 text-center border-primary column-gap">
                    <img class="card-img-top img1:1" src="<?= $product['image_path'] ?>" alt="Card image">
                    <div class="card-body px-0">
                        <h4 class="card-title w-100"><?= substr($product['name'], 0, 15)."..." ?></h4>
                        <p class="card-text">R$ <?= $product['price'] ?></p>
                    </div>
                </div>
            </a>
        </div>
    <?php endforeach; ?>
<?php else :?>
    <?php foreach ($productListAll as $product) : ?>
        <div class="col-6 col-md-4 col-lg-2 mb-4">
            <a href="?page=product&idP=<?= $product['id'] ?>&idU=<?= $product['id_merchant'] ?>" class="grid-container" style="text-decoration: none;">
                <div class="card w-100 text-center border-primary column-gap">
                    <img class="card-img-top img1:1" src="<?= $product['image_path'] ?>" alt="Card image">
                    <div class="card-body px-0">
                        <h4 class="card-title w-100"><?= substr($product['name'], 0, 15)."..." ?></h4>
                        <p class="card-text">R$ <?= $product['price'] ?></p>
                    </div>
                </div>
            </a>
        </div>
    <?php endforeach; ?>
<?php endif;?>