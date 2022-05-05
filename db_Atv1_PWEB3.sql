CREATE DATABASE db_Atv1_PWEB3;

USE db_Atv1_PWEB3;

CREATE TABLE tb_user 
(
    cod_user INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome_user VARCHAR(60) NOT NULL,
    senha_user VARCHAR(100) NOT NULL
);

CREATE TABLE tb_cliente
(
    cod_cli INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome_cli VARCHAR(100) NOT NULL,
    tel_cli VARCHAR(14) NOT NULL,
    dataNasc_cli DATE NOT NULL,

    CEP_cli VARCHAR(9) NOT NULL,
    bairro_cli VARCHAR(80) NOT NULL,
    rua_cli VARCHAR(80) NOT NULL,
    ruaNum_cli VARCHAR(80) NOT NULL,
    cidade_cli VARCHAR(80) NOT NULL,
    estado_cli CHAR(2) NOT NULL,
    cod_user_fk INT NOT NULL,

    CONSTRAINT REL_Cli_User
    FOREIGN KEY (cod_user_fk) REFERENCES tb_user (cod_user);
);