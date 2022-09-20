<main class="container">
    <section class="row">
        <div class="col">
            <img class="image-product" src="" alt="">
        </div>
        <div class="col text-center">
            <h1 class="title-product"><?= "produto nome"?></h1>
            <p class="describe-product text-start"><?= "descrição produto"?></p>
            <h3 class="price-product">R$: <?= "10,00" ?></h3>
            <div class="w-100 d-flex align-items-center flex-column my-3">
                <button class="btn btn-prim">Adicionar ao carrinho</button>
                <button class="btn btn-secon m-2">Comprar</button>
            </div>
        </div>
    </section>

    <section class="row d-flex justify-content-center m-5">
        <a class="seller-container col-1 mx-4 d-flex align-items-center flex-column" href="">
            <img src="" alt="img vendedor">
            <span>Name</span>
        </a>
    </section>

    <section class="row">
        <section class="col-12 commenters">
            <section class="w-100 content-commenter">
                <p class="user-name-commenter">UserName</p>
                <section class="star-commenter">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </section>
                <p class="text-commenter px-4 py-2">
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Libero id exercitationem, quae natus architecto corporis, voluptas in nemo velit alias nisi, tenetur sit blanditiis amet? Nisi rem repellendus provident quisquam!
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Libero id exercitationem, quae natus architecto corporis, voluptas in nemo velit alias nisi, tenetur sit blanditiis amet? Nisi rem repellendus provident quisquam!
                </p>
            </section>
            <div class="row px-3 commenter-viewMore text-center"><button class="py-2">Ver mais</button></div>
        </section>
    </section>

    <section class="row highlight mt-5 d-flex justify-content-center">
        <?php for ($i = 0; $i < 6; $i++) {
            include "view/template/product.php";
        }
        ?>
        <div class="row highlight-viewMore text-center"><a href="#">Ver mais</a></div>
    </section>
</main>