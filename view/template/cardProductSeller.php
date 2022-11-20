<div class="col-6 col-md-4 col-lg-2 mb-4">
    <a href="?page=editp&p=<?= $fields['id'] ?>">
        <button class="float-start btn btn-blue rounded-0 rounded-top w-100"><i class="fas fa-edit"></i> Editar</button>
    </a>
    <div class="card w-100 text-center border-black column-gap">
        <a href="?page=product&p=<?= $fields['id'] ?>" class="text-decoration-none text-black">
            <img class="w-100 img1:1" src="<?= $fields["imgPath"] ?>" alt="Card image">
            <div class="card-body px-0">
                <h4 class="card-title w-100">
                    <?=
    strlen($fields["name"]) > 10 ? substr($fields["name"], 0,
                        10) . "..." : $fields["name"]
    ?>
                </h4>
                <p class="card-text">R$ <?= str_replace(".", ",", $fields['price']) ?>
                </p>
            </div>
        </a>
    </div>
</div>