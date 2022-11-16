<?php if (!empty($productList)) : ?>
    <?php foreach ($productList as $product) : ?>
        <div class="col-6 col-sm-4 col-md-2 my-4">
            <a href="?page=edit_product&p=<?= $product['id'] ?>">
                <button class="float-start btn btn-primary w-100"><i class="fas fa-edit"></i></button>
            </a>
            <!-- item -->
            <a href="?page=product&p=<?= $product['id'] ?>" style="text-decoration: none;">
                <div class="card w-100 text-center border-0">
                    <img class="card-img-top img1:1 border-bottom border-primary" src="<?= $product['imgPath'] ?>" style="height: 20vw; max-height: 250px; min-height: 100px;" alt="Card image">
                    <div class="card-body">
                        <h4 class="card-title"><?= $product['name'] ?></h4>
                        <p class="card-text">R$ <?= $product['price'] ?></p>
                    </div>
                </div>
            </a>
        </div>
    <?php endforeach; ?>
<?php else : ?>
    <div class="col text-center">
        <a class="link-light text-decoration-none fs-1" href="?page=add_product">Clique aqui e adicione agora</a>
    </div>
<?php endif; ?>