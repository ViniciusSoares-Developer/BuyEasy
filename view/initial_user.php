<main class="container">
    <section class="row">
        <!-- Carousel -->
        <div id="demo" class="carousel slide col" data-bs-ride="carousel">

            <!-- Indicators/dots -->
            <div class="carousel-indicators">
                <?php for ($i = 0; $i < 4; $i++) : ?>
                    <?php if ($i == 0) : ?>
                        <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
                    <?php else : ?>
                        <button type="button" data-bs-target="#demo" data-bs-slide-to="<?= $i ?>"></button>
                    <?php endif; ?>
                <?php endfor; ?>
            </div>

            <!-- The slideshow/carousel -->
            <div class="carousel-inner">
                <?php for ($i = 0; $i < 4; $i++) : ?>
                    <?php if ($i == 0) : ?>
                        <div class="carousel-item active">
                            <a href="">
                                <img src="https://www.simplilearn.com/ice9/free_resources_article_thumb/what_is_image_Processing.jpg" alt="Los Angeles" class="d-block w-100" style="height: 25vw; min-height: 150px;">
                            </a>
                        </div>
                    <?php else : ?>
                        <div class="carousel-item">
                            <a href="">
                                <img src="https://www.simplilearn.com/ice9/free_resources_article_thumb/what_is_image_Processing.jpg" alt="Los Angeles" class="d-block w-100" style="height: 25vw; min-height: 150px;">
                            </a>
                        </div>
                    <?php endif; ?>
                <?php endfor ?>
            </div>

            <!-- Left and right controls/icons -->
            <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
    </section>
    <section class="row pb-4 px-4" style="height: 5rem;">
        <div class="d-flex justify-content-center">
            <div class="col-sm-8">
                <input class="h-100 form-control border-primary" type="text" id="search" placeholder="Buscar">
            </div>
            <a class="col-sm-2 p-0" href="" onclick="this.href='?page=search&search='+document.getElementById('search').value">
                <button class="btn btn-primary w-100 h-100" type="button"><i class="fa fa-search"></i></button>
            </a>
        </div>
    </section>
    <section class="row bg-primary rounded px-2">
        <?php for($i = 0; $i < 8; $i++) : ?>
            <?php
                $value = $productList ? array_rand($productList) : null;
                if(isset($productList[$i])):?>
            <div class="col-6 col-sm-3 my-4">
                <a href="?page=product&idP=<?= $productList[$value]['id']?>" style="text-decoration: none;">
                    <div class="card w-100 text-center border-0">
                        <img class="card-img-top"
                        src="<?= sprintf("%s/%s", constant("URL"),substr($productList[$value]['image_path'],3))?>"
                        style="height: 20vw; max-height: 300px; min-height: 250px;" alt="Card image">
                        <div class="card-body">
                            <h4 class="card-title"><?= $productList[$value]['name']?></h4>
                            <p class="card-text">R$ <?= $productList[$value]['price']?></p>
                        </div>
                    </div>
                </a>
            </div>
            <?php endif;?>
        <?php endfor; ?>
    </section>
    <section class="row">
        <section class="col me-1">
            <h3 class="text-center">Comments</h3>
            <div>
                
            </div>
        </section>
        <section class="col ms-1">
            <h3 class="text-center">Novos parceiros</h3>
            <div>
            </div>
        </section>
    </section>
</main>