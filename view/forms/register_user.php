<main class="position-relative d-flex align-items-center main-form">
	<div class="position-absolute top-0 w-100 d-flex justify-content-center">
		<?php if ($alert === 'error') : ?>
			<div class="alert alert-danger alert-dismissible">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <strong>Error!</strong> Dados invalidos ou conta existente
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
	<div class="container form-max rounded-4 p-4" style="background-color: white; max-width: 600px;">
		<a class="position-absolute" href="?page=initial"><button class="btn btn-primary" type="button"><i class="fas fa-angle-left"></i></button></a>
		<form class="px-5 pt-5" method="POST">
			<div class="row">
				<label class="form-label">Nome de usuario:</label>
				<input class="col-12 form-control" type="text" placeholder="Email / Nome de usuario" name="name" value="<?= isset($_COOKIE['buyeasy_user_name']) ? $_COOKIE['buyeasy_user_name'] : "" ?>" />
			</div>
			<div class="row mt-2">
				<label class="form-label">E-mail:</label>
				<input class="col-12 form-control" type="email" name="email" placeholder="Email / Nome de usuario" name="name" value="<?= isset($_COOKIE['buyeasy_user_name']) ? $_COOKIE['buyeasy_user_name'] : "" ?>" />
			</div>
			<div class="row mt-2">
				<label class="form-label">Confirmar E-mail:</label>
				<input class="col-12 form-control" type="email" name="confirm_email" placeholder="Email / Nome de usuario" name="name" value="<?= isset($_COOKIE['buyeasy_user_name']) ? $_COOKIE['buyeasy_user_name'] : "" ?>" />
			</div>
			<div class="row mt-2">
				<label class="form-label w-100">Senha:</label>
				<div class="col-sm-10 p-0">
					<input class="form-control" type="password" name="password" id="password" required />
				</div>
				<div class="col-sm-2 p-0">
					<button class="btn btn-primary w-100" type="button" onclick="toogleVisibility(password, this)" class="col-1"><i class="fa fa-eye"></i></button>
				</div>
			</div>
			<div class="row mt-2">
				<label class="form-label w-100">Confirmar Senha:</label>
				<div class="col-sm-10 p-0">
					<input class="form-control" type="password" name="confirm_password" id="c_password" required />
				</div>
				<div class="col-sm-2 p-0">
					<button class="btn btn-primary w-100" type="button" onclick="toogleVisibility(c_password, this)" class="col-1"><i class="fa fa-eye"></i></button>
				</div>
			</div>
			<div class="row col mt-2">
				<div class="col-12 form-check">
					<input class="form-check-input" type="checkbox" name="merchant">
					<label for="merchant" class="form-check-label">Comerciante</label>
				</div>
			</div>
			<p class="text-center mt-2">ao se cadastrar aceita os <a href data-bs-toggle="modal" data-bs-target="#exampleModal">termos e condições</a></p>
			<button class="w-100 btn btn-primary" type="submit" name="submitU" value="register">
				Registrar
			</button>
		</form>
		<hr>
		<div class="text-center">
			<a href="?page=login">Conectar</a>
		</div>
	</div>
</main>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Termos e Condições</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				Termos e condiçoes
			</div>
		</div>
	</div>
</div>