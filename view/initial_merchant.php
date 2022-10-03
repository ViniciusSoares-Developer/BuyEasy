<main class="container-fluid">
    <?php if ($alert === 'errRemove') : ?>
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong>Error!</strong> Erro ao remover
        </div>
    <?php elseif ($alert === 'successRemove') : ?>
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong>Sucesso!</strong> Item removido com sucesso
        </div>
    <?php endif; ?>
    <section class="row justify-content-center pb-4 px-4 mb-5" style="height: 5rem;">
        <div class="col-md-8 p-0">
            <input class="h-100 form-control border-primary" type="text" id="search" placeholder="Buscar">
        </div>
        <a class="col-md-2 p-0" href="" onclick="this.href='?page=search&search='+document.getElementById('search').value">
            <button class="btn btn-primary w-100 h-100" type="button"><i class="fa fa-search"></i></button>
        </a>
    </section>
    <section class="row justify-content-center text-primary">
        <div class="col-md-6 mb-4">
            <div class="card text-center">
                <div class="card-header">
                    <h1>Produtos adicionados</h1>
                </div>
                <div class="card-body">
                    <h3 class="card-title"><?= !empty($productListUser) ? sizeof($productListUser) : 0 ?></h3>
                </div>
            </div>
        </div>
    </section>
    <section class="row bg-primary rounded px-2">
        <?php if ($productListUser) : ?>
            <?php foreach ($productListUser as $product) : ?>
                <div class="col-6 col-sm-2 my-4">
                    <a href="?page=edit_product&idP=<?= $product['id'] ?>">
                        <button class="float-start btn btn-primary"><i class="fas fa-edit"></i></button>
                    </a>
                    <button type="button" data-bs-toggle="modal" data-bs-target="#modal<?= $product['id'] ?>" class="float-end btn btn-primary"><i class="fas fa-trash"></i></button>
                    <!-- modal -->
                    <div class="modal fade" id="modal<?= $product['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <a href="?page=remove&idP=<?= $product['id'] ?>">
                                        <button type="button" name="submit" value="remove" class="btn btn-danger">Confirmar</button>
                                    </a>
                                </div>
                                <div class="modal-footer">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- item -->
                    <a href="?page=product&idP=<?= $product['id'] ?>" style="text-decoration: none;">
                        <div class="card w-100 text-center border-0">
                            <img class="card-img-top" src="<?= sprintf("%s/%s", constant("URL"), substr($product['image_path'], 3)) ?>" style="height: 20vw; max-height: 250px; min-height: 100px;" alt="Card image">
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
        <?php endif ?>
    </section>
</main>