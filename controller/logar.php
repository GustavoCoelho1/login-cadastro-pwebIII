<?php
    session_start();

    include_once("../model/mdlUser.php");
    include_once("../model/conexao.php");

    if (logar())
    {
        header("location: ../view/index.php");
    }
    else
    {
        header("location: ../view/login.php?login=n");
    }
?>