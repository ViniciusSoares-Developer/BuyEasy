<?php foreach ($productList as $product) : ?>
    <div class="col-6 col-sm-3 mb-4">
        <a href="?page=product&idP=<?= $product['id'] ?>&idU=<?= $product['id_merchant']?>" style="text-decoration: none;">
            <div class="card w-100 text-center border-0">
                <img class="card-img-top" src="<?= sprintf("%s/%s", constant("URL"), $product['image_path']) ?>" style="height: 20vw; max-height: 300px; min-height: 250px;" alt="Card image">
                <div class="card-body">
                    <h4 class="card-title"><?= $product['name'] ?></h4>
                    <p class="card-text">R$ <?= $product['price'] ?></p>
                </div>
            </div>
        </a>
    </div>
<?php endforeach; ?>