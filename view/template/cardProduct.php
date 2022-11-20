<?php if($fields):?>
<div class="col-6 col-md-4 col-lg-2 mb-4">
    <div class="card w-100 text-center border-black column-gap">
        <a href="?page=product&p=<?= $fields['id']?>" class="text-decoration-none text-black">
            <img class="w-100 img1:1" src="<?= $fields["imgPath"]?>" alt="Card image">
            <div class="card-body px-0">
                <h4 class="card-title w-100">
                    <?= 
                            strlen($fields["name"])>10?substr($fields["name"], 0, 10)."...":$fields["name"]
                        ?>
                </h4>
                <p class="card-text">R$ <?= str_replace(".",",",$fields['price'])?></p>
            </div>
        </a>
    </div>
</div>

<?php else:?>
<div class="col-6 col-md-4 col-lg-2 mb-4">
    <div class="card w-100 text-center border-black column-gap">
        <a href="?page=product&p=<?= $productList[$i]['id']?>" class="text-decoration-none text-black">
            <img class="w-100 img1:1" src="<?= $productList[$i]["imgPath"]?>" alt="Card image">
            <div class="card-body px-0">
                <h4 class="card-title w-100">
                    <?= 
                            strlen($productList[$i]["name"])>10?substr($productList[$i]["name"], 0, 10)."...":$productList[$i]["name"]
                        ?>
                </h4>
                <p class="card-text">R$ <?= str_replace(".",",",$productList[$i]['price'])?></p>
            </div>
        </a>
        <a href="?page=user&u=<?= $productList[$i]['idUser']?>" class="text-decoration-none">
            <div class="card-footer text-start text-black">
                <img src="<?= $productList[$i]['imgUser']?>" class="rounded-circle w-25 img1:1" alt="">
                <span><?= $productList[$i]['nameUser']?></span>
            </div>
        </a>
    </div>
</div>
<?php endif;?>