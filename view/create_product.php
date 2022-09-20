<main class="d-flex justify-content-center align-items-center bg-user-form">
	<form class="container p-5 form-user d-flex justify-content-center flex-column position-relative" action="./controller/controllerUser.php" method="post">
		<a class="position-absolute btn-return" href="?page=initial"><button type="button"><i class="fas fa-angle-left"></i></button></a>
		<label class="row">
			<span class="m-1">Imagem do produto:</span>
			<input type="file" name="name" accept="image/*" required/>
		</label>
		<label class="row">
			<span class="m-1">Nome:</span>
			<input type="text" name="name" required />
		</label>
		<label class="row">
			<span class="m-1">Preço:</span>
			<input type="number" name="name" step="0.01" required />
		</label>
		<label class="row">
			<span class="m-1">Description:</span>
			<textarea name="" id="" maxlength="2000" placeholder="Max. 2000 caracteres" cols="30" rows="10"></textarea>
		</label>
		<button class="m-2 p-2" type="submit" name="submit" value="login">
			Adicionar
		</button>
	</form>
</main>