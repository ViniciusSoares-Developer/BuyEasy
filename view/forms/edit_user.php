<main class="container">
    <form class="row p-3 border border-3 border-primary rounded" method="post" enctype="multipart/form-data">
        <label for="image" class="form-label">Imagem:
            <input class="form-control" type="file" name="image" id="" accept="image/*" required>
        </label>
        <div class="d-flex justify-content-center flex-wrap">
            <button class="col-12 col-md-2 m-2 btn btn-warning" type="reset">Limpar</button>
            <button class="col-12 col-md-2 m-2 btn btn-success" type="submit" name="submitU" value="editImage">Confirmar</button>
        </div>
    </form>
    <hr class="border border-2 rounded border-primary">
    <form class="row p-3 border border-3 border-primary rounded" method="post" enctype="multipart/form-data">
        <label for="name" class="form-label">
            Nome:
            <input class="form-control" type="text" autocomplete="off" name="name" id="" value="<?= $_SESSION['user']['name'] ?>" required>
        </label>
        <label for="" class="form-label">
            Telefone
            <input class="form-control" type="tel" autocomplete="off" name="phone" id="" pattern="[0-9]{2}[9]{1}[0-9]{4}[0-9]{4}" placeholder="11912345678" value="<?= $_SESSION['user']['phone'] ?>" required>
        </label>
        <label for="" class="form-label">
            Whatsapp:
            <input class="form-control" type="tel" autocomplete="off" name="whatsapp" id="" pattern="[0-9]{2}[9]{1}[0-9]{4}[0-9]{4}" placeholder="11912345678" value="<?= $_SESSION['user']['whatsapp'] ?>" required>
        </label>
        <label for="" class="form-label">
            Instagram:
            <input class="form-control" type="url" autocomplete="off" name="instagram" id="" value="<?= $_SESSION['user']['instagram'] ?>" required>
        </label>
        <label for="" class="form-label">
            Facebook:
            <input class="form-control" type="url" autocomplete="off" name="facebook" id="" value="<?= $_SESSION['user']['facebook'] ?>" required>
        </label>
        <div class="d-flex justify-content-center flex-wrap">
            <button class="col-12 col-md-2 m-2 btn btn-warning" type="reset">Resetar</button>
            <button class="col-12 col-md-2 m-2 btn btn-success" type="submit" name="submitU" value="editInformation">Confirmar</button>
        </div>
    </form>
    <hr class="border border-2 rounded border-primary">
    <form class="row p-3 border border-3 border-primary rounded" method="post">
        <label for="" class="form-label">
            E-mail:
            <input class="form-control" type="email" name="email" placeholder="Email" value="" required>
        </label>
        <label for="" class="form-label">
            Confirmar o e-mail:
            <input class="form-control" type="email" name="confirm_email" placeholder="Confirmar Email" value="" required>
        </label>
        <label for="" class="form-label mt-4">
            Digite sua senha:
            <input class="form-control" type="password" name="password_verify" placeholder="Sua senha" required>
        </label>
        <div class="d-flex justify-content-center flex-wrap">
            <button class="col-12 col-md-2 m-2 btn btn-warning" type="reset">Limpar</button>
            <button class="col-12 col-md-2 m-2 btn btn-success" type="submit" name="submitU" value="editEmail">Confirmar</button>
        </div>
    </form>
    <hr class="border border-2 rounded border-primary">
    <form class="row p-3 border border-3 border-primary rounded" method="post">
        <label for="" class="form-label">
            Nova senha:
            <div class="input-group px2">
                <div class="col-sm-8 p-0">
                    <input class="form-control" type="password" name="confirm_password" id="c_password" required />
                </div>
                <button class="col-sm-4 btn btn-primary" type="button" onclick="toogleVisibility(c_password, this)" class="col-1"><i class="fa fa-eye"></i></button>
            </div>
        </label>
        <label for="" class="form-label">
            Confirmar a nova senha:
            <input class="form-control" type="password" autocomplete="off" name="confirm_password" required>
        </label>
        <label for="" class="form-label mt-4">
            Digite sua senha atual:
            <input class="form-control" type="password" name="password_verify" placeholder="Sua senha" required>
        </label>
        <div class="d-flex justify-content-center flex-wrap">
            <button class="col-12 col-md-2 m-2 btn btn-warning" type="reset">Limpar</button>
            <button class="col-12 col-md-2 m-2 btn btn-success" type="submit" name="submitU" value="editEmail">Confirmar</button>
        </div>
    </form>
</main>