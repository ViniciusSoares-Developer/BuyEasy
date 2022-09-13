<main class="d-flex justify-content-center align-items-center bg-user-form">
	<form class="container p-5 form-user d-flex flex-column position-relative" action="./controller/controllerUser.php" method="post">
		<a class="position-absolute btn-return" href="?page=initial"><button type="button"><i class="fas fa-angle-left"></i></button></a>
		<label class="row">
			<span>Nome de usuario: (max. 40)</span> <input type="text" name="name" autocomplete="none" maxlength="40" required />
		</label>
		<label class="row">
			<span>Email:</span>
			<input type="email" name="email" required />
		</label>
		<label class="row">
			<span>Confirmar email:</span>
			<input type="email" name="confirm_email" required />
		</label>
		<div class="row">
			<span>Senha:</span>
			<div class="password-container col-12 p-0 m-0">
				<input class="col-11" type="password" name="password" id="password" required /><button class="btn-eye" type="button" onclick="toogleVisibility(password, this)" class="col-1"><i class="fa fa-eye"></i></button>
			</div>
		</div>
		<div class="row">
			<span>Confirmar senha:</span>
			<div class="password-container col-12 p-0 m-0">
				<input class="col-11" type="password" name="confirm_password" id="confirm_password" required /><button class="btn-eye" type="button" onclick="toogleVisibility(confirm_password, this)" class="col-1"><i class="fa fa-eye"></i></button>
			</div>
		</div>
		<button class="mt-3 p-2" name="submit" value="register" type="submit">
			Registrar
		</button>
		<section class="row">
			<a class="col-5 p-0 mt-5" href="?page=login"><button class="w-100 account" type="button">Entrar</button></a>
		</section>
	</form>
</main>