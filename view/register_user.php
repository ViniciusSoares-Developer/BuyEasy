<form action="./controller/controllerUser.php" method="post">
	<label>
		Nome de usuario: (max. 40) <input type="text" name="name" autocomplete="none" maxlength="40" required />
	</label>
	<label> Email: <input type="email" name="email" required /> </label>
	<label>
		Confirmar email: <input type="email" name="confirm_email" required />
	</label>
	<label position-relative">
		Senha: <input type="password" name="password" required />
		<button type="button"><i class="fas fa-eye"></i></button>
	</label>
	<label>
		Confirmar senha: <input type="password" name="confirm_password" required />
		<button type="button"><i class="fas fa-eye"></i></button=>
	</label>
	<button name="submit" value="register" type="submit">
		Registrar
	</button>
</form>
<a href="?page=login">Entrar</a>