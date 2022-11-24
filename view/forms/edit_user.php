<main class="container w-75">
    <div class="position-sticky sticky-top w-100 d-flex justify-content-center">
		<?php if ($alert === 'errorEdit') : ?>
			<div class="alert alert-danger alert-dismissible">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <strong>Error!</strong> Ocorreu um erro na edição do perfil, <strong>tente novamente!</strong>
            </div>
		<?php elseif ($alert === 'errorAcess') : ?>
			<div class="alert alert-danger alert-dismissible">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <strong>Error!</strong> Senha de confirmação de usuário inválida
            </div>
		<?php elseif ($alert === 'errorPass') : ?>
			<div class="alert alert-danger alert-dismissible">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <strong>Error!</strong> Senhas diferentes
            </div>
		<?php elseif ($alert === 'errorEmail') : ?>
			<div class="alert alert-danger alert-dismissible">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <strong>Error!</strong> E-mail diferente ou inutilizaveis
            </div>
		<?php endif; ?>
	</div>
    <?php if(isset($_SESSION['user']) && $_SESSION['user']['type'] == '2'):?>
        <form class="row p-3 border border-3  rounded" method="post" enctype="multipart/form-data">
            <label for="image" class="form-label">Imagem:
            <input class="form-control" type="file" name="image" id="" accept="image/*" required>
        </label>
        <div class="d-flex justify-content-center flex-wrap">
            <button class="col-12 col-md-2 m-2 btn btn-secondary" type="reset">Limpar</button>
            <button class="col-12 col-md-2 m-2 btn btn-blue" type="submit" name="submitU" value="alterImage">Confirmar</button>
        </div>
    </form>
    <hr class="border border-2 rounded ">
    <?php endif;?>
    <form class="row p-3 border border-3  rounded" method="post" enctype="multipart/form-data">
        <label for="name" class="form-label">
            Nome:
            <input class="form-control" type="text" autocomplete="off" name="name" id="" value="<?= $_SESSION['user']['name'] ?>" required>
        </label>
        <?php if(isset($_SESSION['user']) && $_SESSION['user']['type'] == '2'):?>
        <label for="" class="form-label">
            Telefone:
            <input class="form-control" type="tel" autocomplete="off" name="number" id="" pattern="[0-9]{2}[9]{1}[0-9]{4}[0-9]{4}" placeholder="11912345678" value="<?= $_SESSION['user']['numberContact'] ?>">
        </label>
        <label for="" class="form-label">
            Email:
            <input class="form-control" type="email" autocomplete="off" name="email" id="" value="<?= $_SESSION['user']['emailContact'] ?>">
        </label>
        <label for="" class="form-label">
            Whatsapp:
            <input class="form-control" type="tel" autocomplete="off" name="whatsapp" id="" pattern="[0-9]{2}[9]{1}[0-9]{4}[0-9]{4}" placeholder="11912345678" value="<?= $_SESSION['user']['whatsapp'] ?>">
        </label>
        <label for="" class="form-label">
            Instagram:
            <input class="form-control" type="url" autocomplete="off" name="instagram" id="" value="<?= $_SESSION['user']['instagram'] ?>">
        </label>
        <?php endif;?>
        <div class="d-flex justify-content-center flex-wrap">
            <button class="col-12 col-md-2 m-2 btn btn-secondary" type="reset">Resetar</button>
            <button class="col-12 col-md-2 m-2 btn btn-blue" type="submit" name="submitU" value="alterInformation">Confirmar</button>
        </div>
    </form>
    <hr class="border border-2 rounded ">
    <form class="row p-3 border border-3 rounded" method="post">
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
            <button class="col-12 col-md-2 m-2 btn btn-secondary" type="reset">Limpar</button>
            <button class="col-12 col-md-2 m-2 btn btn-blue" type="submit" name="submitU" value="editEmail">Confirmar</button>
        </div>
    </form>
    <hr class="border border-2 rounded ">
    <form class="row p-3 border border-3  rounded" method="post">
        <label for="" class="form-label">
            Nova senha:
            <div class="input-group w-100">
                <div class="col-8 col-sm-11 p-0">
                    <input class="form-control rounded-0 rounded-start" type="password" name="password" id="c_password" required />
                </div>
                <button class="col-4 col-sm-1 btn btn-blue" type="button" onclick="toogleVisibility(c_password, this)" class="col-1"><i class="fa fa-eye"></i></button>
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
            <button class="col-12 col-md-2 m-2 btn btn-secondary" type="reset">Limpar</button>
            <button class="col-12 col-md-2 m-2 btn btn-blue" type="submit" name="submitU" value="editPassword">Confirmar</button>
        </div>
    </form>
</main>