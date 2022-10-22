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
    <?php require_once "view/template/searchBar.php" ?>
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
        <?php require_once "view/template/listProductsSeller.php";?>
    </section>
</main>