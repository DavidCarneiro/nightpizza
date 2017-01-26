<?php
header("Content-Type: text/html; charset=UTF-8",true);
header('Access-Control-Allow-Origin: *');
ob_clean();
include("conexao.php");
$usuario = $_POST['usuario'];
$senha = $_POST['senha'];
$sel = $CONN->query("SELECT * FROM  dl_clientes WHERE email = '$usuario'");
$usu = $sel->fetch_array();

if($usuario == $usu['email'] && $senha == $usu['senha']){
	echo $usu[nome];
}
else{
	echo 0;
}
	   
	   
    
?>