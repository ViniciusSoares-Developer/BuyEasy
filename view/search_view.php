<main class="container-fluid row">
    <?php if ($productList) : ?>
        <?php foreach ($productList as $product) : ?>
            <div class="col-12 col-sm-6 col-md-3 my-4">
                <a href="?page=product&idP=<?= $product['id'] ?>" style="text-decoration: none;">
                    <div class="card w-100 text-center border-primary">
                        <img class="card-img-top" src="<?= sprintf("%s/%s", constant("URL"), substr($product['image_path'], 3)) ?>" style="height: 20vw; min-height: 100px;" alt="Card image">
                        <div class="card-body">
                            <h4 class="card-title"><?= $product['name'] ?></h4>
                            <p class="card-text">R$ <?= $product['price'] ?></p>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    <?php else : ?>
        <h1 class="text-primary text-center mt-5">Nenhum produto encontrado</h1>
    <?php endif; ?>
</main>