<main class="container-fluid row justify-content-start m-0">
    <?php if ($productList) : ?>
        <?php foreach ($productList as $fields){
            include "./view/template/cardProduct.php";
        } ?>
    <?php else : ?>
        <h1 class="text-primary text-center mt-5">Nenhum produto encontrado</h1>
    <?php endif; ?>
</main>