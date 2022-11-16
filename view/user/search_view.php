<main class="container-fluid row justify-content-start m-0">
    <?php if ($productList): ?>
    <?php foreach ($productList as $product): ?>
    <div class="col-6 col-md-4 col-lg-2 my-4">
        <a href="?page=product&idP=<?= $product['id'] ?>&idU=<?= $product['id_merchant'] ?>"
            style="text-decoration: none;">
            <div class="card w-100 text-center border-primary">
                <img class="card-img-top img1:1" src="<?= $product['imgPath'] ?>"
                    style="height: 20vw; min-height: 100px;" alt="Card image">
                <div class="card-body">
                    <h4 class="card-title">
                        <?= $product['name'] ?>
                    </h4>
                    <img class="card-img-top img1:1" src="<?= $product['image_path'] ?>"
                        style="height: 20vw; min-height: 100px;" alt="Card image">
                    <div class="card-body px-0">
                        <h4 class="card-title">
                            <?= substr($product['name'], 0, 15) . "..." ?>
                        </h4>
                        <p class="card-text">R$ <?= $product['price'] ?>
                        </p>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <?php endforeach; ?>
    <?php else: ?>
    <h1 class="text-primary text-center mt-5">Nenhum produto encontrado</h1>
    <?php endif; ?>
</main>