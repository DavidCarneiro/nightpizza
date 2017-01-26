<?php 
header('Access-Control-Allow-Origin: *');
ob_clean();
include("conexao.php");

$nome = $_POST['nome'];
$tam = $_POST['tam'];
$beb = $_POST['beb'];
$obs1 = $_POST['obs1'];
$obs2 = $_POST['obs2'];
$cat = $_POST['cat'];
$cons3 = $CONN->query("select * from dl_produtos where nome = '$nome'");
$linha = $cons3->fetch_array();

$valortmp = $linha['preco_p'];


$nome = $_POST['nome'].' '.$obs1;
$valor = $valortmp;


$ip = addslashes($_POST['ip']);


$inserir1 = $CONN->query("insert into dl_carrinho (ip,produto,preco,categoria) values ('$ip','$nome',$valor,'$cat')");

//printf(" %s.\n", $CONN->error);
if($inserir1){
	echo 1;
} else {
	echo 0;
}

?>
