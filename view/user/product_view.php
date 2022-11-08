<main class="container mt-4">
    <section class="row text-primary">
        <div class="col-md-5">
            <img class="img-fluid img1:1 h-100 border border-5 border-primary rounded" src="<?= $product['image_path'] ?>" alt="">
        </div>
        <div class="col-md-7 text-center px-5">
            <h1><?= $product['name'] ?></h1>
            <p class="text-start px-5" style="height: 20vw;"><?= $product['description'] ?></p>
            <h4>R$ <?= $product['price'] ?></h4>
            <section class="row my-3 justify-content-center">
                <div class="col-md-6">
                    <form method="POST">
                        <input type="hidden" name="item[id]" value="<?= $product['id'] ?>">
                        <input type="hidden" name="item[img]" value="<?= $product['image_path'] ?>">
                        <input type="hidden" name="item[name]" value="<?= $product['name'] ?>">
                        <input type="hidden" name="item[price]" value="<?= $product['price'] ?>">
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
    <section class="row my-4 justify-content-center align-items-center">
        <h1 class="text-center text-primary col-12 col-sm-3 m-0 p-0">Vendedor:</h1>
        <a class="col-6 col-md-3 text-decoration-none text-center d-block" href="?page=user&idU=<?= $product['id_user'] ?>">
            <img class="rounded-circle" style="width: 250px; height: 250px;" src="<?= $product['image_user'] ?>" alt="<?= $product['name_user']. " Logo"?>">
            <h3><?= $product['name_user'] ?></h3>
        </a>
    </section>
    <?php if (isset($_SESSION['user']) and $_SESSION['user']['type'] !== 2) : ?>
        <section class="row my-4">
            <form method="POST">
                <input class="form-range w-auto" type="range" name="star_quantity" min="0" max="5" value="0">
                <label class="fs-3" for="star_quantity"><i class="fas fa-star text-primary"></i></label>
                <textarea class="col-12 rounded border border-primary" name="commenter" cols="30" rows="5" maxlength="255" placeholder="Max: 255"></textarea>
                <button type="submit" name="commenter-action" value="commenter" class="col-12 btn btn-primary">Comentar</button>
            </form>
        </section>
    <?php endif; ?>
    <?php if ($productCommenters) : ?>
        <section class="row my-4">
            <div class="col-12 my-2">
                <div class="card">
                    <div class="card-header bg-primary text-white text-center">
                        <h1>Comentarios</h1>
                    </div>
                    <div class="card-body text-primary">
                        <?php for ($i = 0; $i < 5; $i++) : ?>
                            <?php if (!empty($productCommenters[$i])) : ?>
                                <div class="col-12 my-2">
                                    <div class="card">
                                        <div class="card-header bg-primary text-white">
                                            <h4 class="float-start"><?= $productCommenters[$i]['name'] ?></h4>
                                            <div class="float-end">
                                                <?php for ($j = 0; $j < $productCommenters[$i]['star']; $j++) : ?>
                                                    <i class="fas fa-star text-white"></i>
                                                <?php endfor; ?>
                                            </div>
                                        </div>
                                        <div class="card-body text-primary">
                                            <p><?= $productCommenters[$i]['commenter'] ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endfor; ?>
                        <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#commenters">
                            Ver todos os comentarios
                        </button>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
    <section class="row bg-primary rounded mt-5 px-2">
        <h4 class="text-white">Mais produtos da loja</h4>
        <?php foreach($productListOfUser as $product) : ?>
                <div class="col-6 col-md-4 col-lg-2 mb-4">
                    <a href="?page=product&idP=<?= $product['id'] ?>&idU=<?= $product['id_merchant']?>" style="text-decoration: none;">
                        <div class="card w-100 text-center border-0">
                            <img class="card-img-top img1:1" src="<?= $product['image_path'] ?>" alt="Card image">
                            <div class="card-body px-0">
                                <h4 class="card-title"><?= substr($product['name'], 0, 15)."..." ?></h4>
                                <p class="card-text">R$ <?= $product['price'] ?></p>
                            </div>
                        </div>
                    </a>
                </div>
        <?php endforeach; ?>
    </section>
    <section class="row bg-primary rounded my-5 px-2">
        <h4 class="text-white">Outros Produtos</h4>
        <?php require_once "view/template/listProducts.php";?>
    </section>
</main>
<div class="modal fade" id="commenters" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary" id="staticBackdropLabel">Comentarios</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php foreach ($productCommenters as $commenter) : ?>
                    <div class="col-12 my-3">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <h4 class="float-start"><?= $commenter['name'] ?></h4>
                                <div class="float-end">
                                    <?php for ($i = 0; $i < $commenter['star']; $i++) : ?>
                                        <i class="fas fa-star text-white"></i>
                                    <?php endfor; ?>
                                </div>
                            </div>
                            <div class="card-body text-primary">
                                <p><?= $commenter['commenter'] ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>