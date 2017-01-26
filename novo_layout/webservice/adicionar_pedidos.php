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
if($tam == 'Pequena'){
	$valortmp = $linha['preco_p'];
}
if($tam == 'Média'){
	$valortmp = $linha['preco_m'];
}
if($tam == 'Grande'){
	$valortmp = $linha['preco_g'];
}
if(!$tam){
	$valortmp = $linha['preco_g'];
}
if($_POST['metade']){
  $metade = '/'.$_POST['metade'];
  $cons = $CONN->query("SELECT preco_g FROM dl_produtos WHERE nome = '$metade'");
  $val = $cons->fetch_array();
  $valor = ($valortmp/2) + ($val[valor]/2);
}else{
	$valor = $valortmp;
}
if($_POST[borda]){
	$query = $CONN->query("select * from dl_bordas where id = '".$_POST[borda]."'");
	$brd = $query->fetch_array();
	$borda = '['.$brd[nome].']';
	$valor += $brd[valor];
}
	$nome = $_POST['nome'].' '.$obs1.''.$metade.' '.$obs2.' '.$borda.' '.$tam.' '.$beb;
	


$ip = addslashes($_POST['ip']);


$inserir1 = $CONN->query("insert into dl_carrinho (ip,produto,preco,categoria) values ('$ip','$nome',$valor,'$cat')");

//printf(" %s.\n", $CONN->error);
if($inserir1){
	echo 1;
} else {
	echo 0;
}

?>
