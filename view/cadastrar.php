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
    <link rel="stylesheet" href="css/cadastrar.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <title>Cadastro</title>
</head>
<body>
    <main>
        <h1 class="lg_titulo">CADASTRAR</h1>
        
        <div class="lg_frmLyt">
        <div class="btn_voltar" id="btn_voltar"><ion-icon name="arrow-back-outline"></ion-icon></div>

            <form class="lg_frm" id="frm_User" action="">
                <div class="lg_frmRow">
                    <label class="form-label">Nome de Usuário</label>
                    <input type="text" class="form-control" name="txt_NomeUser" placeholder="Crie um nome de usuário">
                </div>

                <div class="lg_frmRow">
                    <label class="form-label">Senha</label>
                    <input type="password" class="form-control" name="txt_Senha" placeholder="Crie uma senha">
                </div>

                <div class="lg_frmRow">
                    <button class="lg_submit" id="btn_proximo" type="button">Próximo</button>
                </div>
            </form>

            <form class="cad_frm" id="frm_Cliente" action="">
                <div class="cad_frmRow1">
                    <div class="cad_frmR1_C1">
                        <label for="">Nome Completo</label>
                        <input type="text" name="txt_NomeCliente" id="" placeholder="Joao Silva Exemplo">
                    </div>

                    <div class="cad_frmR1_C2">
                        <label for="">Telefone</label>
                        <input type="text" name="txt_Telefone" id="" max-length="15" placeholder="(11) 90000-0000">
                    </div>

                    <div class="cad_frmR1_C3">
                        <label for="">Data de Nascimento</label>
                        <input type="date" name="dt_DataNasc" id="">
                    </div>
                </div>

                <div class="cad_frmRow2">
                    <div class="cad_frmR2_C1">
                        <label for="">CEP</label>
                        <input type="text" name="txt_CEP" id="" max-length="9" placeholder="00000-000">
                    </div>

                    <div class="cad_frmR2_C2">
                        <label for="">Estado</label>
                        <input type="text" name="txt_Estado" id="" max-length="45" placeholder="Estado">
                    </div>

                    <div class="cad_frmR2_C3">
                        <label for="">Cidade</label>
                        <input type="text" name="txt_Cidade" id="" max-length="45" placeholder="Cidade">
                    </div>
                </div>

                <div class="cad_frmRow3">
                    <div class="cad_frmR3_C1">
                        <label for="">Bairro</label>
                        <input type="text" name="txt_Bairro" id="" max-length="60" placeholder="Bairro">
                    </div>

                    <div class="cad_frmR3_C2">
                        <label for="">Rua</label>
                        <input type="text" name="txt_Rua" id="" max-length="80" placeholder="Rua">
                    </div>

                    <div class="cad_frmR3_C3">
                        <label for="">Número</label>
                        <input type="text" name="txt_Numero" id="" max-length="4" placeholder="000">
                    </div>
                </div>

                <div class="lg_frmRow">
                    <button class="lg_submit" id="btn_submit" type="button">Cadastrar</button>
                </div>
            </form>

            <div class="cad_msg" id="cadMsg">
                    <ion-icon name=""></ion-icon>
                    <span>Cadastro realizado</span>
            </div> 
        </div>

        <span class="lg_cadastrar">Já possui cadastro? <a href="login.php">Fazer log-in</a></span>
    </main> 

    <script src="js/cadastrar.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>