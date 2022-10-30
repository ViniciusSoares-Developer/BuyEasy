<?php foreach ($productList as $product) : ?>
    <div class="col-6 col-sm-3 mb-4">
        <a href="?page=product&idP=<?= $product['id'] ?>&idU=<?= $product['id_merchant'] ?>" class="grid-container" style="text-decoration: none;">
            <div class="card w-100 text-center border-0 column-gap">
                <img class="card-img-top img1:1 border-bottom border-primary" src="<?= $product['image_path'] ?>" alt="Card image">
                <div class="card-body">
                    <h4 class="card-title"><?= $product['name'] ?></h4>
                    <p class="card-text">R$ <?= $product['price'] ?></p>
                </div>
            </div>
        </a>
    </div>
<?php endforeach; ?>