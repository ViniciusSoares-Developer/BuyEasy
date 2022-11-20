<main class="container-fluid">
    <?php if ($alert === 'errRemove'): ?>
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>Error!</strong> Erro ao remover
    </div>
    <?php elseif ($alert === 'successRemove'): ?>
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>Sucesso!</strong> Item removido com sucesso
    </div>
    <?php endif; ?>
    <section class="row justify-content-center text-primary mb-5">
        <div class="col-12 col-lg-4 px-5 mb-3">
            <a href="?page=add_product">
                <button class="w-100 h-100 btn btn-blue fs-1">
                    Adicione agora
                </button>
            </a>
        </div>
        <section class="row justify-content-center col-12 col-lg-8 py-1 mb-3" style="height: 5rem;">
            <div class="col-sm-8 p-0">
                <input class="h-100 form-control border-blue" type="text" name="s" placeholder="Buscar">
            </div>
            <a class="col-3 col-sm-1 p-0" href=""
                onclick="this.href = '?page=search&s=' + document.getElementsByName('s')[0].value">
                <button class="w-100 btn btn-blue h-100"><i class="fa fa-search"></i></button>
            </a>
        </section>
    </section>
    <section class="row rounded px-2">
        <h2 class="bg-blue text-center text-white rounded">SEUS PRODUTOS!!</h2>
        <?php if (!empty($productList)): ?>
        <?php foreach ($productList as $fields) {
                include "./view/template/cardProductSeller.php";
            } ?>
        <?php else: ?>
        <div class="col text-center mt-5">
            <h1 class="text-black">Sem produtos a venda!</h1>
        </div>
        <?php endif; ?>
    </section>
</main>