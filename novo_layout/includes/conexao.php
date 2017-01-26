<?php
// CONEXAO, N�O MECHER
$server = "zoesolucoes.mysql.dbaas.com.br";
$user = "zoesolucoes";
$pass = "zoe@@123";
$database = "zoesolucoes";
$mysqli = new mysqli ($server,$user,$pass,$database);
if (mysqli_connect_errno()) {
   echo 'Não foi possível conectar-se ao banco de dados: ' . mysqli_connect_error();
}
?>