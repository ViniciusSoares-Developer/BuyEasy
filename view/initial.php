<main class="container">

    <!-- banner -->
    <section class="row">
        <div id="carouselExampleIndicators" class="carousel slide border-0" data-bs-ride="true">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <a href=""><img class="carousel-content" src="https://img.freepik.com/fotos-gratis/imagem-aproximada-em-tons-de-cinza-de-uma-aguia-careca-americana-em-um-fundo-escuro_181624-31795.jpg?w=2000" alt=""></a>
                </div>
                <div class="carousel-item">
                    <a href=""><img class="carousel-content" src="https://img.freepik.com/fotos-gratis/imagem-aproximada-em-tons-de-cinza-de-uma-aguia-careca-americana-em-um-fundo-escuro_181624-31795.jpg?w=2000" alt=""></a>
                </div>
                <div class="carousel-item">
                    <a href=""><img class="carousel-content" src="https://img.freepik.com/fotos-gratis/imagem-aproximada-em-tons-de-cinza-de-uma-aguia-careca-americana-em-um-fundo-escuro_181624-31795.jpg?w=2000" alt=""></a>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>

    <!-- search -->
    <section class="row">
        <form class="form-search d-flex justify-content-center" action="" method="post">
            <input type="text" placeholder="Buscar">
            <button class="px-3" type="submit"><i class="fa fa-search"></i></button>
        </form>
    </section>

    <!-- top 3 sellers -->
    <!-- <section class="row mx-3 mt-5">
        <span class="text-center title-add-recent mb-2">Melhores vendedores</span>

        <a class="seller-container col-1 mx-4 d-flex align-items-center flex-column" href="">
            <img src="" alt="img vendedor">
            <span>Name</span>
        </a>
    </section> -->

    <!-- hightlights -->
    <section class="row highlight mt-5 d-flex justify-content-center">
        <?php for ($i = 0; $i < 12; $i++) : ?>
            <div class="col-2 d-flex align-items-center flex-column text-center p-2">
                <a class="product-view p-4" href="?page=product">
                    <img class="product-img" src="" alt="">
                    <span class="product-name">Title</span><br>
                    <span class="product-value">R$ 000,00</span>
                </a>
            </div>
        <?php endfor ?>
        <div class="row highlight-viewMore text-center"><a href="#">Ver mais</a></div>
    </section>

    <section class="row comments-container">
        <section class="col me-1">
            <span>Comments</span>
            <div>
                
            </div>
        </section>
        <section class="col ms-1">
            <span>Novos parceiros</span>
            <div>
            </div>
        </section>
    </section>
</main>