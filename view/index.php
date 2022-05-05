<?php 
    session_start();

    if (!isset($_SESSION['login']) || !$_SESSION['login'])
    {
        header('location: login.php?login=n');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/index.css">

    <title>Início</title>
</head>
<body>
    <?php include_once('navBar.php') ?>

    <main>
        <div class="idx_msg">Bem-vindo <?=$_SESSION['nomeUser']?></div>
    </main> 

    <?php include_once('footer.php')?>
</body>
</html>