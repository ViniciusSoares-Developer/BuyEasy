<main class="container">
    <section class="row">
        <!-- Carousel -->
        <div id="demo" class="carousel slide col p-0" data-bs-ride="carousel">
            <!-- Indicators/dots -->
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
                <button type="button" data-bs-target="#demo" data-bs-slide-to="3"></button>
            </div>

            <!-- The slideshow/carousel -->
            <div class="carousel-inner rounded">
                <div class="carousel-item active">
                    <img src="assets/src/banner00.png" class="d-block w-100"
                        style="height: auto; min-height: 150px;" />
                </div>
                <div class="carousel-item">
                    <img src="assets/src/banner.png" autoplay class="d-block w-100"
                        style="height: auto; min-height: 150px;" />
                </div>
                <div class="carousel-item">
                    <img src="assets/src/banner2.png" autoplay class="d-block w-100"
                        style="height: auto; min-height: 150px;" />
                </div>
                <div class="carousel-item">
                    <img src="assets/src/bannerBB.png" autoplay class="d-block w-100"
                        style="height: auto; min-height: 150px;" />
                </div>
            </div>

            <!-- Left and right controls/icons -->
            <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev"
                style="width: 10%;">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next"
                style="width: 10%;">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
    </section>
    <section class="row justify-content-center pb-4 px-4 mt-4" style="height: 5rem;">
        <div class="col-sm-8 p-0">
            <input class="h-100 form-control border-blue" type="text" name="s" placeholder="Buscar">
        </div>
        <a class="col-3 col-sm-1 p-0" href=""
            onclick="this.href = '?page=search&s=' + document.getElementsByName('s')[0].value">
            <button class="w-100 btn btn-blue h-100"><i class="fa fa-search"></i></button>
        </a>
    </section>
    <section class="row px-2 pt-4">
        <h3 class="text-black">NOVOS PRODUTOS</h3>
        <?php
        for ($i = 0; $i < 6; $i++) {
            if (!empty($productList[$i])) {
                include "view/template/cardProduct.php";
            }
        }
        ?>
    </section>
    <section class="row">
        <div class="col-12 my-2">
            <div class="card border-blue">
                <div class="card-header bg-blue text-white text-center">
                    <h1>NOVOS VENDEDORES</h1>
                </div>
                <div class="card-body row">
                    <?php foreach ($userList as $fields): ?>
                    <div class="col-6 col-md-4 col-lg-2 p-2">
                        <div class="card text-center border-blue">
                            <img class="card-img-top img1:1" src="<?= $fields['imgPath'] ?>" alt="Card image">
                            <div class="card-body px-0">
                                <h2 class="card-title w-100">
                                    <?= $fields['name'] ?>
                                </h2>
                            </div>
                            <div class="card-footer">
                                <a href="?page=user&u=<?= $fields['id'] ?>"><button class="btn btn-blue">Acessar
                                        perfil</button></a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
    <section class="row my-4">
        <h3 class="text-black">PATROCINADORES</h3>
        <img class="col-12 col-md-6 p-3" src="assets/src/adotevidas.png" alt="">
        <img class="col-12 col-md-6 p-3" src="assets/src/motorapido.png" alt="">
    </section>
</main>