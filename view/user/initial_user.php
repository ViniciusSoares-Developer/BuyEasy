<main class="container">
    <section class="row">
        <!-- Carousel -->
        <div id="demo" class="carousel slide col p-0" data-bs-ride="carousel">
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
                                <img src="https://via.placeholder.com/500x300" alt="Los Angeles" class="d-block w-100" style="height: 25vw; min-height: 150px;">
                            </a>
                        </div>
                    <?php else : ?>
                        <div class="carousel-item">
                            <a href="">
                                <img src="https://via.placeholder.com/500x300" alt="Los Angeles" class="d-block w-100" style="height: 25vw; min-height: 150px;">
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
    <?php require_once "view/template/searchBar.php" ?>
    <section class="row bg-primary rounded px-2 pt-4">
        <?php require_once "view/template/listProducts.php"; ?>
    </section>
    <section class="row">
        <section class="col-md my-4">
            <div class="col-12 my-2">
                <div class="card">
                    <div class="card-header bg-primary text-white text-center">
                        <h1>Comentarios</h1>
                    </div>
                    <div class="card-body text-primary">
                        <?php for ($i = 0; $i < 5; $i++) : ?>
                            <?php if (!empty($feedback[$i])) : ?>
                                <div class="col-12 my-2">
                                    <div class="card">
                                        <div class="card-header bg-primary text-white">
                                            <h4 class="float-start"><?= $feedback[$i]['name'] ?></h4>
                                            <div class="float-end">
                                                <?php for ($j = 0; $j < $feedback[$i]['star']; $j++) : ?>
                                                    <i class="fas fa-star text-white"></i>
                                                <?php endfor; ?>
                                            </div>
                                        </div>
                                        <div class="card-body text-primary">
                                            <p><?= $feedback[$i]['commenter'] ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endfor; ?>
                        <!-- <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#commenters">
                            Ver todos os comentarios
                        </button> -->
                    </div>
                </div>
            </div>
        </section>
        <section class="col-md my-4">
            <div class="col-12 my-2">
                <div class="card">
                    <div class="card-header bg-primary text-white text-center">
                        <h1>Ultimas lojas registradas</h1>
                    </div>
                    <div class="card-body d-flex flex-column align-items-center text-primary">
                        <?php foreach ($recentSeller as $account) : ?>
                            <div class="card w-50" style="min-width: 200px;">
                                <img src="<?= sprintf("%s/%s", constant("URL"), $account['image_path']) ?>" class="card-img-top img1:1" alt="">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $account['name'] ?></h5>
                                    <a href="?page=user&idU=<?= $account['id'] ?>" class="btn btn-primary">Perfil</a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </section>
    </section>
</main>
<!-- <div class="modal fade" id="commenters" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary" id="staticBackdropLabel">Comentarios</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php if ($feedback) : ?>
                    <?php foreach ($feedback as $commenter) : ?>
                        <div class="col-12 my-3">
                            <div class="card">
                                <div class="card-header bg-primary text-white">
                                    <h4 class="float-start"><?= $commenter['name'] ?></h4>
                                    <div class="float-end">
                                        <?php for ($i = 0; $i < $commenter['star']; $i++) : ?>
                                            <i class="fas fa-star text-white"></i>
                                        <?php endfor; ?>
                                    </div>
                                </div>
                                <div class="card-body text-primary">
                                    <p><?= $commenter['commenter'] ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div> -->