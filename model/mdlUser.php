<?php
    function logar() 
    {
        $c = new Conexao();
        $conexao = $c -> conectar();

        $txtNome = $_POST["txt_NomeUser"];
        $txtSenha = $_POST["txt_Senha"];

        $usuarios = $conexao -> query("SELECT cod_user AS 'Código', nome_user AS 'Nome_User', senha_user AS 'Senha' FROM tb_user");

        $usuarioValido = false;
        $senhaValida = false;

        foreach($usuarios as $usuario)
        {
            if ($usuario['Nome_User'] === $txtNome)
            {
                $nomeUser = $usuario['Nome_User'];
                $usuarioValido = true;
            }

            if (password_verify($txtSenha, $usuario['Senha']))
            {
                $senhaValida = true;
            }
        }

        if (isset($_SESSION['login'])) 
        {
            unset($_SESSION['login']);
        }

        if (isset($_SESSION['nomeUser'])) 
        {
            unset($_SESSION['nomeUser']);

        }


        if ($usuarioValido == true && $senhaValida == true)
        {
            $_SESSION['login'] = true;
            $_SESSION['nomeUser'] = $nomeUser;

            return true;
        }
        else
        {
            $_SESSION['login'] = false;
            return false;
        }
    }
?>