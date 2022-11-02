<main class="container">
    <section class="row justify-content-center">
        <img class="img1:1 p-0 col-6 col-md-3 rounded-circle border border-primary" src="<?= $profile['image_path'] ?>" alt="" />
    </section>
    <section class="row mt-2 justify-content-center text-center text-white">
        <h1 class="col-md-12 text-break bg-primary p-3 rounded">
            <?= $profile['name'] ?>
        </h1>
        <section class="col-12">
            <?php if ($profile['email']) : ?>
                <a class="fs-5 m-2 border border-2 border-primary rounded p-1" target="_blanck" href="mailto:<?= $profile['email'] ?>"><i class="fas fa-envelope"> <?= $profile['email'] ?></i></a>
            <?php endif; ?>
            <?php if ($profile['phone']) : ?>
                <a class="fs-5 m-2 border border-2 border-primary rounded p-1" target="_blanck" href="tel:+<?= $profile['phone'] ?>"><i class="fas fa-phone-alt"> <?= $profile['phone'] ?></i></a>
            <?php endif; ?>
            <?php if ($profile['whatsapp']) : ?>
                <a class="fs-2 m-2" target="_blanck" href="https://wa.me/+55<?= $profile['whatsapp'] ?>" target="__blank"><i class="	fab fa-whatsapp"></i></a>
            <?php endif; ?>
            <?php if ($profile['instagram']) : ?>
                <a class="fs-2 m-2" target="_blanck" href="<?= $profile['instagram'] ?>" target="__blank"><i class="fab fa-instagram"></i></a>
            <?php endif; ?>
            <?php if ($profile['facebook']) : ?>
                <a class="fs-2 m-2" target="_blanck" href="<?= $profile['facebook'] ?>" target="__blank"><i class="fab fa-facebook-square"></i></a>
            <?php endif; ?>
        </section>
    </section>
    <hr class="border border-2 rounded border-primary">
    <section class="row bg-primary rounded px-2 pt-4">
        <?php if(isset($_SESSION['user']) && $_SESSION['user']['type'] == '2' && $_SESSION['user']['id'] == $idU) require_once "view/template/listProductsSeller.php";
        else require_once "view/template/listProducts.php";?>
    </section>
</main>