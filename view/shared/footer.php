<footer class="container-fluid bg-primary p-5 mt-2">
    <section class="row justify-content-center mb-1">
        <button type="button" class="btn btn-outline-light col-4 col-sm-1" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <i class="fas fa-comment-alt"></i>
        </button>
    </section>
    <section class="row col d-block text-white text-center">
        <a class="text-white text-decoration-none" href="">Info</a> •
        <a class="text-white text-decoration-none" href="">Support</a> •
        <a class="text-white text-decoration-none" href="">Marketing</a>
    </section>
    <section class="row col d-block text-white text-center">
        <a class="text-white text-decoration-none" href="?page=termsOfUser">Termos de uso</a> •
        <a class="text-white text-decoration-none" href="">Politica de privacidade</a>
    </section>
    <section class="row class text-white text-center">
        <p class="m-0">&copy; 2022 copyright - <a class="text-white text-decoration-none" href="https://github.com/ViniciusSoares-Developer">Vinícius Soares Domingos da Silva</a></p>
    </section>
</footer>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary" id="exampleModalLabel">FeedBack para o site</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="POST">
                <div class="modal-body">
                    <input class="form-range w-auto" type="range" name="star_quantity" min="0" max="5" value="0">
                    <label class="fs-3" for="star_quantity"><i class="fas fa-star text-primary"></i></label>
                    <textarea class="col-12 rounded border border-primary" name="commenter" cols="30" rows="5" maxlength="255" placeholder="Max: 255"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <?php if (isset($_SESSION['user']['id'])) : ?>
                        <button type="submit" name="commenter-action" value="commenter" class="btn btn-primary">Comentar</button>
                    <?php else : ?>
                        <a href="?page=login" class="btn btn-primary">Comentar</a>
                    <?php endif; ?>
                </div>
            </form>
        </div>
    </div>
</div>