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
		<form class="px-5 pt-5" method="POST" enctype="multipart/form-data">
			<div class="row">
				<label class="form-label">Image do produto:</label>
				<input class="col-12 form-control" type="file" name="image" accept="image/jpeg, image/png" required />
			</div>
			<div class="row mt-2">
				<label class="form-label">Nome:</label>
				<input class="col-12 form-control" type="text" name="name" value="<?= $userProduct['name']?>" required />
			</div>
			<div class="row mt-2">
				<label class="form-label">Preço: </label>
				<input class="col-12 form-control" type="number" name="price" min="0" step="0.01" value="<?= $userProduct['price']?>" required />
			</div>
			<div class="row mt-2">
				<label class="form-label w-100">Descrição:</label>
				<textarea class="form-control" name="description" rows="5" style="resize: none;"><?= $userProduct['description']?></textarea>
			</div>
			<button class="w-100 mt-2 btn btn-primary" type="submit" name="submitP" value="edit">
				Editar produto
			</button>
		</form>
	</div>
</main>