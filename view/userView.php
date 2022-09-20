<main class="container  ">
    <section class="row col-12 d-flex justify-content-center">
        <img class="user-img" src="<?="image"?>" alt="Image User">
    </section>
    <section class="row mb-5">
        <h1 class="user-name"><?="Nome usuario"?></h1>
        <p class="user-details">Email: <a href="mailto:<?="viniciussoaresaqw@hotmail.com"?>"><?= "Email@gmail.com"?> <i class="fas fa-envelope"></i></a></p>
        <p class="user-details">Telefone: <a href="tel:+<?= 5581984022978?>"><?= "(81) 9 9999-9999"?><i class="fas fa-phone"></i></a></p>
        <!-- <p>Rede social: <a href="">Facebook</a></p> -->
    </section>

    <?php if (true) : ?>
        <section class="row mb-5">
            <div class="product-view-adm col-md-2">
                <div class="d-flex justify-content-around">
                    <a href=""><button type="button"><i class="fas fa-edit"></i></button></a>
                    <button type="button"><i class="fas fa-trash"></i></button>
                </div>

                <div class="py-2">
                    <a class="product-view p-4 d-flex align-items-center flex-column text-center" href="?page=product">
                        <img src="" alt="">
                        <span class="product-name">Title</span><br>
                        <span class="product-value">R$ 000,00</span>
                    </a>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php if (false) : ?>
        <section class="row mb-5">
            <div class="col-md-2 py-2">
                <a class="product-view p-4 d-flex align-items-center flex-column text-center" href="?page=product">
                    <img src="" alt="">
                    <span class="product-name">Title</span><br>
                    <span class="product-value">R$ 000,00</span>
                </a>
            </div>
        </section>
    <?php endif; ?>

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
            <div class="row px-3 commenter-viewMore text-center"><button>Ver mais</button></div>
        </section>
    </section>


</main>