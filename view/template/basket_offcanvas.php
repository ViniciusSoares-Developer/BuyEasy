<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel">Carrinho</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body container-fluid">
        <?php for ($i=0; $i < 10; $i++):?>
        <section class="row product-cart mb-3">
            <div class="col-8">
                <a class="d-flex align-items-center" href="">
                    <img class="me-3" src="" alt="">
                    <p>nome</p>
                </a>
            </div>
            <div class="col-4">
                <div class="d-flex flex-column">
                    <input class="input-prim" type="number" min="1" value="1" name="" id="">
                    <p class="text-center">R$: 10,00</p>
                </div>
            </div>
        </section>
        <?php endfor?>
    </div>
    <div class="offcanvas-footer d-flex justify-content-end">
        <button class="w-100 btn btn-prim mx-3 my-2">Confirmar</button>
    </div>
</div>