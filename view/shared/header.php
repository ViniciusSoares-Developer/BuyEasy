<header class="container-fluid sticky-top bg-primary bg-gradient top-0 mb-4">
    <section class="row justify-content-center">
        <section class="col-sm-3 my-2">
            <div class="h-100 d-flex align-items-center justify-content-center">
                <button class="btn btn-outline-light" type="button" data-bs-toggle="offcanvas" data-bs-target="#cart">
                    <i style="font-size: 20px;" class="fas">&#xf291;</i>
                </button>
            </div>
        </section>
        <section class="col-6 col-sm-6 my-2">
            <div class="row justify-content-center m-0">
                <a href="?page=initial" class="col-12 col-sm-4 p-0 py-2 d-flex justify-content-center">
                    <img src="assets/images/logoHeader.png" alt="" class="w-100 logo" style="min-width: 200px; filter: drop-shadow(0 0 .2rem white);">
                </a>
            </div>
        </section>
        <?php if (!isset($_SESSION['user'])) : ?>
            <section class="col-sm-3 my-2">
                <div class="w-100 h-100 d-flex align-items-center justify-content-center">
                    <a href="?page=register" class="me-2"><button class="btn btn btn-outline-light">Registrar</button></a>
                    <a href="?page=login"><button class="btn btn btn-outline-light">Entrar</button></a>
                </div>
                </div>
            </section>
        <?php else : ?>
            <section class="col-sm-3 my-2">
                <div class="w-100 h-100 d-flex align-items-center justify-content-center">
                    <a href="?page=user&idU=<?= $_SESSION['user']['id'] ?>" class="me-2"><img src="<?= sprintf("%s/%s", constant("URL"), $_SESSION['user']['image_path']) ?>" class="rounded-circle img1:1 border border-primary" alt="" width="40" height="40" /></a>
                    <div class="dropdown">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fas fa-list"></i>
                        </button>
                        <ul class="dropdown-menu">
                            <?php if ($_SESSION['user']['type'] !== 1) : ?>
                                <li>
                                    <a class="dropdown-item" href="?page=add_product">
                                        <i class="fas fa-cart-plus"></i> Adicionar Produto</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="?page=learning">
                                        <i class="fas fa-book"></i> Aprenda</a>
                                </li>
                            <?php endif; ?>
                            <li>
                                <a class="dropdown-item" href="?page=edit_user"><i class="fas fa-cog"></i> Editar Perfil</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="?page=list_buy"><i class="fas fa-shopping-cart"></i> Compras Realizadas</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="?logout=true">
                                    <i class="fas fa-sign-in-alt"></i> Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </section>
        <?php endif; ?>
    </section>
</header>
<div class="offcanvas offcanvas-start text-primary" id="cart">
    <div class="offcanvas-header">
        <h1 class="offcanvas-title">Carrinho</h1>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body">
        <?php if (!empty($_SESSION['cart'])) :
            foreach ($_SESSION['cart'] as $index => $item) : ?>
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-3 p-2">
                            <img src="<?= sprintf("%s/%s", constant("URL"), $item['img']) ?>" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-7">
                            <div class="card-body">
                                <h5 class="card-title"><?= $item['name'] ?></h5>
                                <p class="card-text">R$: <?= $item['price'] ?></p>
                            </div>
                        </div>
                        <div class="col-12">
                            <form method="GET">
                                <input class="form-control" type="number" step="1" min="0" name="quantity" value="<?= $item['quant'] ?>">
                                <button type="submit" name="index" value="<?= $index ?>" class="btn btn-outline-secondary w-100">Atualizar</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach;?>
        <?php else : ?>
            <h5>Carrinho vazio ...</h5>
        <?php endif; ?>
    </div>
    <div class="offcanvas-footer">
        <p class="fs-4 p-0 m-0">Total: R$<?php
        $total = 0;
        if (isset($_SESSION['cart']))
        foreach($_SESSION['cart'] as $index => $item){
            $total += $item['price'] * $item['quant'];
            if ($index == count($_SESSION['cart'])-1) {
                echo $total;
            }
        }?></p>
        <?php if (isset($_SESSION['user'])) : ?>
            <form method="POST">
                <select class="form-select" name="discount" id="">
                    <option value="" selected>Selecione um cupom</option>
                    <option value="10" <?php if($total<100)echo "disabled"?>>Desconto de 10% para valores acima de R$100</option>
                    <option value="25" <?php if($total<200)echo "disabled"?>>Desconto de 25% para valores acima de R$200</option>
                    <option value="40" <?php if($total<500)echo "disabled"?>>Desconto de 40% para valores acima de R$500</option>
                </select>
                <button type="submit" name="cart" value="confirm" class="btn btn-success w-100" <?php if(empty($_SESSION['cart']))echo"disabled"?>>Finalizar compra</button>
            </form>
        <?php else : ?>
            <a href="?page=login&alert=cart">
                <button class="btn btn-success w-100">Finalizar compra</button>
            </a>
        <?php endif; ?>
    </div>
</div>