<main class="position-relative d-flex align-items-center main-form">
    <div class="position-absolute top-0 w-100 d-flex justify-content-center">
        <?php if ($alert === 'error') : ?>
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <strong>Error!</strong> Dados invalidos ou conta inexistente
            </div>
        <?php elseif ($alert === 'sucessR'):?>
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <strong>Sucesso!</strong> Usuario cadastro com sucesso realize o login
            </div>
        <?php elseif ($alert === 'cart'):?>
            <div class="alert alert-warning alert-dismissible">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <strong>Atenção!</strong> faça Login para finalizar a compra
            </div>
        <?php endif; ?>
    </div>
    <div class="container form-max rounded-4 p-4" style="background-color: white; max-width: 600px;">
        <a class="position-absolute" href="?page=initial"><button class="btn btn-primary" type="button"><i class="fas fa-angle-left"></i></button></a>
        <form class="px-5 pt-5" method="post">
            <div class="row">
                <label class="form-label">Login:</label>
                <input class="col-12 form-control" type="text" placeholder="Email / Nome de usuario" name="name" value="<?= isset($_COOKIE['buyeasy_user_name']) ? $_COOKIE['buyeasy_user_name'] : "" ?>" />
            </div>
            <div class="row mt-2">
                <label class="form-label w-100">Senha:</label>
                <div class="col-sm-10 p-0">
                    <input class="form-control" placeholder="Senha" type="password" name="password" id="password" required />
                </div>
                <div class="col-sm-2 p-0">
                    <button class="btn btn-primary w-100" type="button" onclick="toogleVisibility(password, this)" class="col-1"><i class="fa fa-eye"></i></button>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12 form-check">
                    <?php if (isset($_COOKIE['buyeasy_user_name'])) : ?>
                        <input class="form-check-input" type="checkbox" name="remember" checked />
                    <?php else : ?>
                        <input class="form-check-input" type="checkbox" name="remember" />
                    <?php endif; ?>
                    <label for="remember" class="form-check-label">
                        Lembrar-se
                    </label>
                </div>
            </div>
            <button class="w-100 mt-3 btn btn-primary" type="submit" name="submitU" value="login">
                Entrar
            </button>
        </form>
        <hr>
        <div class="text-center">
            <a href="?page=register">Criar Conta</a>
        </div>
    </div>
</main>