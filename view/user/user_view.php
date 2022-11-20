<main class="container">
    <section class="row justify-content-center">
        <img class="img1:1 p-0 col-6 col-md-3 rounded-circle " src="<?= $user['imgPath']?>" alt="" />
    </section>
    <section class="row mt-2 justify-content-center text-center text-white">
        <h1 class="col-md-12 text-break bg-blue p-3 rounded">
            <?= $user['name']?>
        </h1>
        <section class="col-12">
            <?php if(!empty($user['emailContact'])):?>
                <a class="fs-5 m-2 text-blue" target="_blanck" href="mailto:<?=$user['emailContact']?>"><i class="fas fa-envelope"> </i></a>
            <?php endif?>
            <?php if(!empty($user['numberContact'])):?>
                <a class="fs-5 m-2 text-blue" target="_blanck" href="tel:+<?=$user['numberContact']?>"><i class="fas fa-phone-alt"> </i></a>
            <?php endif?>
            <?php if(!empty($user['whatsapp'])):?>
                <a class="fs-2 m-2 text-blue" target="_blanck" href="https://wa.me/+55<?=$user['whatsapp']?>" target="__blank"><i class="fab fa-whatsapp"></i></a>
            <?php endif?>
            <?php if(!empty($user['instagram'])):?>
                <a class="fs-2 m-2 text-blue" target="_blanck" href="<?=$user['instagram']?>" target="__blank"><i class="fab fa-instagram"></i></a>
            <?php endif?>
        </section>
    </section>
    <hr class="border border-2 rounded border-primary">
    <section class="row">
        <?php
        if (!empty($_SESSION['user']) && $_SESSION['user']['type']==2 && $_SESSION['user']['id'] == $user['id']) {
            foreach ($productList as $fields) {
                include "./view/template/cardProductSeller.php";
            }
        }
        else {
            foreach ($productList as $fields) {
                include "./view/template/cardProduct.php";
            }
        }
        ?>
    </section>
</main>