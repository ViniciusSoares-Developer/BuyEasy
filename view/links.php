<a href="?page=login">Login</a><br>
<a href="?page=register">Registro</a><br>
<input type="text" id="search">
<a href="" onclick="this.href='?page=search&search='+document.getElementById('search').value">Procurar</a><br>
<a href="?page=user&idU=1">USER</a><br>
<a href="?page=user&idU=<?= $_SESSION['user']['id']?>">My Profile</a><br>
<a href="?page=edit_user">Edit Profile</a><br>
<a href="?page=product&idP=1">product</a><br>
<a href="?page=add_product">ADD product</a><br>
<a href="?page=edit_product&idP=4">Edit product</a><br>