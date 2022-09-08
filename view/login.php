<form action="./controller/controllerUser.php" method="post">
	<label> Login: <input type="text" placeholder="Email / Nome de usuario" name="name" /> </label>
	<label>
		Senha: <input type="password" name="password" />
	</label>
	<div>
		<label class="col-6">
			<input type="checkbox" /> Lembrar-se</label>
		<a href="">Esqueci a senha?</a>
	</div>
	<button type="submit" name="submit" value="login">
		Entrar
	</button>
</form>
<a href="?page=register">Criar conta</a>