<form action="./controller/controllerUser.php" method="post">
	<label> Login: <input type="text" placeholder="Email / Nome de usuario" name="name" value="<?= isset($_COOKIE['buyeasy_user_name'])? $_COOKIE['buyeasy_user_name'] : ""?>"/> </label>
	<label>
		Senha: <input type="password" name="password" />
	</label>
	<div>
		<label class="col-6">
			<?php if(isset($_COOKIE['buyeasy_user_name'])):?>
				<input type="checkbox" name="remember" checked/>
			<?php else:?>
				<input type="checkbox" name="remember"/>
			<?php endif;?>
		Lembrar-se
		</label>
		<a href="">Esqueci a senha?</a>
	</div>
	<button type="submit" name="submit" value="login">
		Entrar
	</button>
</form>
<a href="?page=register">Criar conta</a>