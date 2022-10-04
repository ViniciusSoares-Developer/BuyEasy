<main class="container">
    <section class="row text-primary">
        <div class="col-md-5">
            <img class="img-fluid h-100 border border-5 border-primary rounded" src="<?= sprintf("%s/%s", constant("URL"), substr($product['image_path'], 3)) ?>" alt="">
        </div>
        <div class="col-md-7 text-center px-5">
            <h1><?= $product['name'] ?></h1>
            <p class="text-start px-5" style="height: 20vw;"><?= $product['description'] ?></p>
            <h4>R$ <?= $product['price'] ?></h4>
            <section class="row my-3 justify-content-center">
                <div class="col-md-6">
                    <form method="POST">
                        <input type="hidden" name="item[id]" value="<?= $product['id']?>">
                        <input type="hidden" name="item[img]" value="<?= $product['image_path']?>">
                        <input type="hidden" name="item[name]" value="<?= $product['name']?>">
                        <input type="hidden" name="item[price]" value="<?= $product['price']?>">
                        <input type="hidden" name="item[quant]" value="1">
                        <button type="submit" name="cart" value="add" class="btn btn-primary m-2">Adicionar ao carrinho</button>
                    </form>
                </div>
                <div class="col-md-6">
                    <button class="btn btn-primary m-2">Comprar agora</button>
                </div>
            </section>
        </div>
    </section>
    <section class="row justify-content-center">
        <div class="col-3">
            <a class="text-decoration-none text-center d-block" href="?page=user&idU=<?= $product['id_user'] ?>">
                <img class="img-fluid" style="height: 18vw;" src="<?= sprintf("%s/%s", constant("URL"), substr($product['image_user'], 3)) ?>" alt="">
                <h1><?= $product['name_user'] ?></h1>
            </a>
        </div>
    </section>
    <section class="row bg-primary rounded px-2">
        <?php for($i = 0; $i < 8; $i++) : ?>
            <?php
                $value = $productList ? array_rand($productList) : null;
                if(isset($productList[$i]) && $productList[$value]['id'] !== $product['id']):?>
            <div class="col-6 col-sm-3 my-4">
                <a href="?page=product&idP=<?= $productList[$value]['id']?>" style="text-decoration: none;">
                    <div class="card w-100 text-center border-0">
                        <img class="card-img-top"
                        src="<?= sprintf("%s/%s", constant("URL"),substr($productList[$value]['image_path'],3))?>"
                        style="height: 20vw; max-height: 300px; min-height: 250px;" alt="Card image">
                        <div class="card-body">
                            <h4 class="card-title"><?= $productList[$value]['name']?></h4>
                            <p class="card-text">R$ <?= $productList[$value]['price']?></p>
                        </div>
                    </div>
                </a>
            </div>
            <?php endif;?>
        <?php endfor; ?>
    </section>
</main>