<?php
    function cadastrar()
    {   
        $conexao = new PDO("mysql:host=localhost;dbname=db_Atv1_PWEB3", "root", "");

        $conexao -> setAttribute(PDO::ATTR_AUTOCOMMIT,0);
        $conexao -> beginTransaction();
        try
        {
            $txtNomeUser = $_POST["txt_NomeUser"];
            $txtSenha = $_POST["txt_Senha"];

            $opcao = ['cos' => 8];
            $senhaC = password_hash($txtSenha, PASSWORD_BCRYPT, $opcao);


            $txtNome = $_POST["txt_NomeCliente"];
            $txtTel = $_POST["txt_Telefone"];
            $txtDataNasc = $_POST["dt_DataNasc"];
            $txtCEP = $_POST["txt_CEP"];
            $txtBairro = $_POST["txt_Bairro"];
            $txtRua = $_POST["txt_Rua"];
            $txtRuaNum = $_POST["txt_Numero"];
            $txtCidade = $_POST["txt_Cidade"];
            $txtEstado = $_POST["txt_Estado"];

            $conexao -> query("INSERT INTO tb_user
                (nome_user, senha_user)
                VALUES (
                    '{$txtNomeUser}',
                    '{$senhaC}'
                )
            ");

            $userID = $conexao -> lastInsertId();

            $resultado = $conexao -> query("INSERT INTO tb_cliente
                (nome_cli, tel_cli, dataNasc_cli, CEP_cli, bairro_cli, rua_cli, ruaNum_cli, cidade_cli, estado_cli, cod_user_fk) 
                VALUES (
                '{$txtNome}',
                '{$txtTel}',
                '{$txtDataNasc}',
                '{$txtCEP}',
                '{$txtBairro}',
                '{$txtRua}',
                '{$txtRuaNum}',
                '{$txtCidade}',
                '{$txtEstado}',
                '{$userID}'
                )
            ");

            $conexao -> commit();

            $resposta = array("sucesso" => $resultado);

            echo json_encode($resposta);
        }
        catch (mysqli_sql_exception $exception)
        {
            $conexao -> rollback();
            $resposta = array("sucesso" => false);
        }
    }
?>