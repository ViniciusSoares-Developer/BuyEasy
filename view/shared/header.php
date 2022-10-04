<header class="container-fluid row m-0 p-0">
    <section class="col-sm-3 my-2">
        <a href="?page=initial">
            <img src="" alt="" class="w-100" height="100">
        </a>
    </section>
    <section class="col-2"></section>
    <section class="col-sm-2 my-2">
        <div class="w-100 h-100 d-flex align-items-center justify-content-center">
            <button class="btn btn-primary w-100" type="button" data-bs-toggle="offcanvas" data-bs-target="#cart">
                <i style="font-size: 20px;" class="fas">&#xf291;</i>
            </button>
        </div>
    </section>
    <?php if (!isset($_SESSION['user'])) : ?>
        <section class="col-sm-5 my-2">
            <div class="w-100 h-100 d-flex align-items-center justify-content-center">
                <a href="?page=register" class="me-2"><button class="btn btn-primary">Registrar</button></a>
                <a href="?page=login"><button class="btn btn-primary">Entrar</button></a>
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
<div class="offcanvas offcanvas-start" id="cart">
    <div class="offcanvas-header">
        <h1 class="offcanvas-title">Carrinho</h1>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body">
        <?php if (isset($_SESSION['cart'])) :
            foreach ($_SESSION['cart'] as $item) : ?>
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-3 p-2">
                            <img src="<?= sprintf("%s/%s", constant("URL"), substr($item['img'], 3)) ?>" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-7">
                            <div class="card-body">
                                <h5 class="card-title"><?= $item['name']?></h5>
                                <p class="card-text">R$: <?= $item['price']?></p>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="input-group row m-0 align-items-center h-100">
                                <button class="btn btn-outline-secondary p-0 col-4 h-100">-</button>
                                <input class="form-control p-1 col-4 h-100" type="number" step="1" min="0" value="<?= $item['quant']?>">
                                <button class="btn btn-outline-secondary p-0 col-4 h-100">+</button>
                            </div>
                        </div>
                    </div>
                </div>
        <?php endforeach;
        endif; ?>
    </div>
    <div class="offcanvas-footer">
        <form method="POST">
            
            <button type="submit" name="cart" value="confirm" class="btn btn-success w-100">Finalizar compra</button>
        </form>
    </div>
</div>