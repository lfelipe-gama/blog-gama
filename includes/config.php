<?php 

// DEFINE DADOS PARA CONEXAO AO BANCO DE DADOS
define("SERVIDOR", "localhost");
define("USUARIO", "root");
define("SENHA", "root");
define("BANCO", "scotchbox");

// VARIÁVEIS DE CONEXÃO
$connect = mysqli_connect(SERVIDOR, USUARIO, SENHA) or die(mysqli_error());
$db = mysqli_select_db($connect, BANCO) or die(mysqli_error());
mysqli_set_charset($connect,'UTF8');

?>