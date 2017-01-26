<?php 
header('Access-Control-Allow-Origin: *');
ob_clean();
include("conexao.php");
$id = $_POST[ip];
$nome = $_POST['nome'];
$senha = $_POST['senha'];
$fone = $_POST['fone'];
$email = $_POST['usuario'];
$cep = $_POST['cep'];
$rua = $_POST['rua'];
$numero = $_POST['numero'];
$bairro = $_POST['bairro'];
//$hoje = date("d/m/Y");
$inserir1 = $CONN->query("UPDATE dl_clientes set nome='$nome', senha='$senha', email='$email', numero='$numero', bairro='$bairro', fone='$fone', cep='$cep' WHERE id_cliente = $id");

//printf(" %s.\n", $CONN->error);
if($inserir1){
	echo 1;
} else {
	echo 0;
}

?>
