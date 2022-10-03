<?php define("URL", "http://localhost/projects/backPHP");?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <base href="?page=initial">
    <meta charset="UTF-8">
    <base href="/">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="<?= constant("URL")?>/assets/scripts/script.js" defer></script>
    <link rel="stylesheet" href="<?= constant("URL")?>/assets/styles/styles.css"></link>
    <!-- <link rel="stylesheet" href="style.css"> -->
    <title>BuyEasy</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
</head>
<body>

    <?php require_once "./controller.php";?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>