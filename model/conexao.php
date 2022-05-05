<?php
class Conexao
{
    public function conectar()
    {
        $usuario = "root";
        $url = "localhost";
        $senhaBD = ""; //Mudar aqui
        $nomeBancoDados = "db_Atv1_PWEB3"; //Mudar aqui

        $conexao = mysqli_connect($url, $usuario, $senhaBD, $nomeBancoDados);

        return $conexao;
    }
}
?>
