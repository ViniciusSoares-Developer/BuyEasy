<header class="container-fluid row sticky-top bg-primary bg-gradient top-0 m-0 p-0">
    <section class="col-sm-3 my-2">
        <a href="?page=initial">
            <img src="" alt="" class="w-100" height="100">
        </a>
    </section>
    <section class="col-2"></section>
    <section class="col-sm-2 my-2">
        <div class="w-100 h-100 d-flex align-items-center justify-content-center">
            <button class="btn btn-outline-light w-100" type="button" data-bs-toggle="offcanvas" data-bs-target="#cart">
                <i style="font-size: 20px;" class="fas">&#xf291;</i>
            </button>
        </div>
    </section>
    <?php if (!isset($_SESSION['user'])) : ?>
        <section class="col-sm-5 my-2">
            <div class="w-100 h-100 d-flex align-items-center justify-content-center">
                <a href="?page=register" class="me-2"><button class="btn btn btn-outline-light">Registrar</button></a>
                <a href="?page=login"><button class="btn btn btn-outline-light">Entrar</button></a>
            </div>
            </div>
        </section>
    <?php else : ?>
        <section class="col-sm-5 my-2">
            <div class="w-100 h-100 d-flex align-items-center justify-content-center">
                <a href="?page=user&idU=<?= $_SESSION['user']['id'] ?>" class="me-2"><img src="<?= sprintf("%s/%s", constant("URL"), substr($_SESSION['user']['image_path'], 3)) ?>" class="rounded-circle border border-primary" alt="" width="40" height="40" /></a>
                <div class="dropdown">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
                        <i class="fas fa-list"></i>
                    </button>
                    <ul class="dropdown-menu">
                        <?php if ($_SESSION['user']['merchant']) : ?>
                            <li>
                                <a class="dropdown-item" href="?page=add_product">
                                    <i class="fas fa-cart-plus"></i> Adicionar Produto</a>
                            </li>
                        <?php endif; ?>
                        <li>
                            <a class="dropdown-item" href="?page=edit_user"><i class="fas fa-cog"></i> Editar Perfil</a>
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
                            <img src="<?= sprintf("%s/%s", constant("URL"), substr($item['img'], 3)) ?>" class="img-fluid rounded-start" alt="...">
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
        <?php if (isset($_SESSION['user'])) : ?>
            <form method="POST">
                <select class="form-select" name="" id="">
                    <option value="" selected>Selecione um cupom</option>
                    <?php if (!empty($cupons)) { foreach($cupons as $cupom) :?>
                        <option value="<?= $cupom['id']?>"><?= $cupom['name']?></option>
                    <?php endforeach; }?>
                </select>
                <button type="submit" name="cart" value="confirm" class="btn btn-success w-100">Finalizar compra</button>
            </form>
        <?php else : ?>
            <a href="?page=login&alert=cart">
                <button class="btn btn-success w-100">Finalizar compra</button>
            </a>
        <?php endif; ?>
    </div>
</div>