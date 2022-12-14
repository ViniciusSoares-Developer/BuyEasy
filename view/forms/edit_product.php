<main class="position-relative d-flex align-items-center">
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
	<div class="container px-5 py-2" style="max-width: 600px;">
		<form class="p-5 rounded bg-white" method="POST" enctype="multipart/form-data">
			<div class="row">
				<label class="form-label">Image do produto:</label>
				<input class="col-12 form-control" type="file" name="image" accept="image/jpeg, image/png" required />
			</div>
			<div class="row mt-2">
				<label class="form-label">Nome:</label>
				<input class="col-12 form-control" type="text" name="name" value="<?= $productList['name']?>" required />
			</div>
			<div class="row mt-2">
				<label class="form-label">Preço: </label>
				<input class="col-12 form-control" type="number" name="price" min="0" step="0.01" value="<?= $productList['price']?>" required />
			</div>
			<div class="row mt-2">
				<label class="form-label w-100">Descrição:</label>
				<textarea class="form-control" name="description" rows="5" style="resize: none;"><?= $productList['description']?></textarea>
			</div>
			<button class="w-100 mt-2 btn btn-blue" type="submit" name="submitP" value="edit">
				Editar produto
			</button>
		</form>
	</div>
</main>