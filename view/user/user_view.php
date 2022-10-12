<main class="container">
    <section class="row justify-content-center">
        <img class="img-user col-6 col-md-3 rounded-circle border border-primary" src="<?= sprintf("%s/%s", constant("URL"), $profile['image_path']) ?>" alt="" />
    </section>
    <section class="row mt-2 justify-content-center text-center text-white">
        <h1 class="col-md-12 text-break bg-primary p-3 rounded">
            <?= $profile['name'] ?>
        </h1>
        <section class="col-12">
            <?php if ($profile['email']) : ?>
                <a class="fs-5 m-2 border border-2 border-primary rounded p-1" href="mailto:<?= $profile['email'] ?>"><i class="fas fa-envelope"> <?= $profile['email'] ?></i></a>
            <?php endif; ?>
            <?php if ($profile['phone']) : ?>
                <a class="fs-5 m-2 border border-2 border-primary rounded p-1" href="tel:+<?= $profile['phone'] ?>"><i class="fas fa-phone-alt"> <?= $profile['phone'] ?></i></a>
            <?php endif; ?>
            <?php if ($profile['whatsapp']) : ?>
                <a class="fs-2 m-2" href="https://wa.me/+55<?= $profile['whatsapp'] ?>" target="__blank"><i class="	fab fa-whatsapp"></i></a>
            <?php endif; ?>
            <?php if ($profile['instagram']) : ?>
                <a class="fs-2 m-2" href="<?= $profile['instagram'] ?>" target="__blank"><i class="fab fa-instagram"></i></a>
            <?php endif; ?>
            <?php if ($profile['facebook']) : ?>
                <a class="fs-2 m-2" href="<?= $profile['facebook'] ?>" target="__blank"><i class="fab fa-facebook-square"></i></a>
            <?php endif; ?>
        </section>
    </section>
    <hr class="border border-2 rounded border-primary">
    <section class="row bg-primary rounded px-2">
        <?php if ($productListUser) : ?>
            <?php foreach ($productListUser as $product) : ?>
                <?php if (isset($_SESSION['user']) && $idU == $_SESSION['user']['id']) : ?>
                    <div class="col-6 col-sm-3 my-4">
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
                                <img class="card-img-top" src="<?= sprintf("%s/%s", constant("URL"), $product['image_path']) ?>" style="height: 20vw; max-height: 300px; min-height: 100px;" alt="Card image">
                                <div class="card-body">
                                    <h4 class="card-title"><?= $product['name'] ?></h4>
                                    <p class="card-text">R$ <?= $product['price'] ?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php else : ?>
                    <div class="col-6 col-sm-3 my-4">
                        <a href="?page=product&idP=<?= $product['id'] ?>&idU=<?= $product['id_merchant'] ?>" style="text-decoration: none;">
                            <div class="card w-100 text-center border-0">
                                <img class="card-img-top" src="<?= sprintf("%s/%s", constant("URL"), $product['image_path']) ?>" style="height: 20vw; max-height: 300px; min-height: 250px;" alt="Card image">
                                <div class="card-body">
                                    <h4 class="card-title"><?= $product['name'] ?></h4>
                                    <p class="card-text">R$ <?= $product['price'] ?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endif ?>
            <?php endforeach; ?>
        <?php else : ?>
            <div class="col text-center">
                <a class="link-light text-decoration-none fs-1" href="?page=add_product">Clique aqui e adicione agora</a>
            </div>
        <?php endif ?>
    </section>
    <section class="row">
        commenters
    </section>
    <section class="row">

    </section>
</main>