<form action="./controller/controllerProduct.php" method="POST" enctype="multipart/form-data">
    <input type="file" name="image" accept="image/*" required>
    <input type="text" name="name" value="<?= $productList['name']?>" required>
    <input type="number" name="price" step="0.01" value="<?= $productList['price']?>" required>
    <textarea name="description" cols="30" rows="10"><?= $productList['description']?></textarea>
    <button type="submit" name="submit" value="edit">Enviar</button>
</form>