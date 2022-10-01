<form action="./controller/controllerUser.php" method="post" enctype="multipart/form-data">
    <input type="file" name="image" id="" accept="image/*" required>
    <input type="text" name="name" id="" value="<?= $_SESSION['user']['name']?>" required>
    <input type="tel" name="phone" id="" pattern="[0-9]{2} [9]{1}[0-9]{4}[0-9]{4}" placeholder="00 90000 0000" value="<?= $_SESSION['user']['phone']?>" required>
    <button type="submit" name="submit" value="editInformation">Enviar</button>
</form>
<hr>
<form action="./controller/controllerUser.php" method="post">
    <input type="email" name="email" placeholder="Email" value="" required>
    <input type="email" name="confirm_email" placeholder="Confirmar Email" value="" required>
    <input type="password" name="password_verify" placeholder="Sua senha" required>
    <button type="submit" name="submit" value="editEmail">Enviar</button>
</form>
<hr>
<form action="" method="post">
    <input type="password" name="password" placeholder="Nova senha" required>
    <input type="password" name="confirm_password" placeholder="Confirmar nova senha" required>
    
    <input type="password" name="password_verify" placeholder="Sua senha" required>
    <button type="submit" name="submit" value="editPassword">Enviar</button>
</form>