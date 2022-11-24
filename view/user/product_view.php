<main class="container mt-4">
    <section class="row text-black">
        <div class="col-12 col-lg-5">
            <img class="w-100 img1:1 rounded border border-2 border-secondary" src="<?=$productList['imgPath']?>" alt="">
        </div>
        <div class="col-12 col-lg-7 text-center px-5">
            <h1><?=$productList['name']?></h1>
            <p class="text-start px-5 overflow-auto" style="min-height: 19.9vw;max-height: 20vw;">
                <?=$productList['description']?>
            </p>
            <h4>R$ <?=str_replace(".",",",$productList['price'])?></h4>
            <section class="row my-3 justify-content-center">
                <div class="col-md-6">
                    <form method="POST">
                        <input type="hidden" name="item[id]" value="<?= $productList['id'] ?>">
                        <input type="hidden" name="item[img]" value="<?= $productList['imgPath'] ?>">
                        <input type="hidden" name="item[name]" value="<?= $productList['name'] ?>">
                        <input type="hidden" name="item[price]" value="<?= $productList['price'] ?>">
                        <input type="hidden" name="item[quantity]" value="1">
                        <button type="submit" name="submitC" value="add" class="btn btn-blue m-2">Adicionar ao carrinho</button>
                    </form>
                </div>
                <div class="col-md-6">
                    <button class="btn btn-blue m-2">Comprar agora</button>
                </div>
            </section>
        </div>
    </section>
    <section class="row my-4 justify-content-center align-items-center">
        <h1 class="text-center text-blue col-12 col-sm-3 m-0 p-0">Vendedor:</h1>
        <a class="col-6 col-md-3 text-decoration-none text-center d-block" href="?page=user&u">
            <img class="rounded-circle w-100 img1:1" src="<?=$productList['imgUser']?>" alt="Logo">
            <h3 class="text-blue"><?=$productList['nameUser']?></h3>
        </a>
    </section>
    <?php if (isset($_SESSION['user']) and $_SESSION['user']['type'] !== 2) : ?>
        <section class="row my-4">
            <form method="POST">
                <input class="form-range w-auto" id="star" type="range" name="star_quantity" min="0" max="5" value="0">
                <label class="fs-3" for="star_quantity"><i id="label-star" class="fas fa-star text-blue">0</i></label>
                <textarea class="col-12 rounded border " name="commenter" cols="30" rows="5" maxlength="255" placeholder="Max: 255"></textarea>
                <button type="submit" name="submitCo" value="commenter" class="col-12 btn btn-blue">Comentar</button>
            </form>
        </section>
    <?php endif; ?>
    <?php if ($commenterList) : ?>
        <section class="row my-4">
            <div class="col-12 my-2">
                <div class="card">
                    <div class="card-header bg-blue text-white text-center">
                        <h1>Comentarios</h1>
                    </div>
                    <div class="card-body text-blue">
                        <?php for ($i = 0; $i < 5; $i++) : ?>
                            <?php if (!empty($commenterList[$i])) : ?>
                                <div class="col-12 my-2">
                                    <div class="card">
                                        <div class="card-header bg-blue text-white">
                                            <h4 class="float-start"><?= $commenterList[$i]['name'] ?></h4>
                                            <div class="float-end">
                                                <?php for ($j = 0; $j < $commenterList[$i]['star']; $j++) : ?>
                                                    <i class="fas fa-star text-white"></i>
                                                <?php endfor; ?>
                                            </div>
                                        </div>
                                        <div class="card-body text-blue">
                                            <p><?= $commenterList[$i]['text'] ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endfor; ?>
                        <button type="button" class="btn btn-blue w-100" data-bs-toggle="modal" data-bs-target="#commenters">
                            Ver todos os comentarios
                        </button>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
    <section class="row rounded mt-5 px-2">
        <h4 class="text-black">Mais produtos da loja</h4>
        <?php foreach($userProductList as $fields){
            include "./view/template/cardProduct.php";
        }?>
    </section>
    <section class="row rounded my-5 px-2">
        <h4 class="text-black">Outros Produtos</h4>
        <?php foreach($userNotProductList as $fields){
            include "./view/template/cardProduct.php";
        }?>
    </section>
</main>
<div class="modal fade" id="commenters" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-blue" id="staticBackdropLabel">Comentarios</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php foreach ($commenterList as $fields) : ?>
                    <div class="col-12 my-3">
                        <div class="card">
                            <div class="card-header bg-blue text-white">
                                <h4 class="float-start"><?= $fields['name'] ?></h4>
                                <div class="float-end">
                                    <?php for ($i = 0; $i < $fields['star']; $i++) : ?>
                                        <i class="fas fa-star text-white"></i>
                                    <?php endfor; ?>
                                </div>
                            </div>
                            <div class="card-body text-blue">
                                <p><?= $fields['text'] ?></p>
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