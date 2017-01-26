<?php 
header('Access-Control-Allow-Origin: *');
ob_clean();
include("conexao.php");

$nome = $_POST['nome'];
$senha = $_POST['senha'];
$fone = $_POST['fone'];
$email = $_POST['usuario'];
$cep = $_POST['cep'];
$rua = $_POST['rua'];
$numero = $_POST['numero'];
$bairro = $_POST['bairro'];
$hoje = date("d/m/Y");
$inserir1 = $CONN->query("INSERT INTO dl_clientes (nome,email,fone,cep,rua,numero,bairro,senha,dt_cad) VALUES ('$nome','$email','$fone','$cep','$rua',$numero,'$bairro','$senha','$hoje')");

//printf(" %s.\n", $CONN->error);
if($inserir1){
	echo 1;
} else {
	echo 0;
}

?>
