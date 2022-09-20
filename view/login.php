<main class="d-flex justify-content-center align-items-center bg-user-form">
	<form class="container p-5 form-user d-flex justify-content-center flex-column position-relative" action="./controller/controllerUser.php" method="post">
		<a class="position-absolute btn-return" href="?page=initial"><button type="button"><i class="fas fa-angle-left"></i></button></a>
		<label class="row"> <span class="m-1">Login:</span> <input type="text" placeholder="Email / Nome de usuario" name="name" value="<?=$userCookie?>" required /> </label>
		<div class="row mt-2">
			<span class="m-1">Senha:</span>
			<div class="password-container col-md-12 p-0 m-0">
				<input class="col-11" type="password" name="password" id="password" required /><button class="col-1 btn-eye" type="button" onclick="toogleVisibility(password, this)" class="col-1"><i class="fa fa-eye"></i></button>
			</div>
		</div>
		<div class="row mt-2">
			<label class="col-6 d-flex align-items-center">
				<input type="checkbox" name="remeber" /> <span class="ps-2">Lembrar-se</span>
			</label>
			<a class="col-6 p-0 text-center" href=""><button class="w-100" type="button">Esqueci a senha?</button></a>
		</div>
		<button class="m-2 p-2" type="submit" name="submit" value="login">
			Entrar
		</button>
		<section class="row">
			<a class="col-5 p-0 mt-5" href="?page=register"><button class="w-100 account" type="button">Criar conta</button></a>
		</section>
	</form>
</main>