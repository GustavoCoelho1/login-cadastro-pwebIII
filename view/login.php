<?php 
    session_start();

    /*if (!isset($_SESSION['login']) || !$_SESSION['login'])
    {
        header('location: login.php?login=n');
    }*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Login</title>
</head>
<body>
    <main>
        <h1 class="lg_titulo">LOGIN</h1>
        <div class="lg_frmLyt">
            <form class="lg_frm" method="POST" action="../controller/logar.php">
                <div class="lg_frmRow">
                    <label for="inputEmail4" class="form-label">Nome de Usuário</label>
                    <input type="text" class="form-control" name="txt_NomeUser" placeholder="Insira o nome de usuário" required>
                </div>

                <div class="lg_frmRow">
                    <label for="inputEmail4" class="form-label">Senha</label>
                    <input type="password" class="form-control" name="txt_Senha" placeholder="Insira a senha" required>
                </div>

                <div class="lg_frmRow">
                    <button class="lg_submit" id="btn_submit" type="submit">Login</button>
                </div>
            </form>
        </div>

        <span class="lg_cadastrar">Ainda não possui cadastro? <a href="cadastrar.php">Cadastre-se</a></span>
    </main> 
</body>
</html>