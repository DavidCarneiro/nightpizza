<?php 
header('Access-Control-Allow-Origin: *');
ob_clean();
include("conexao.php");
$tmp = str_replace("/","",$_POST['metade']);
  $metade = $_POST['metade'];
  $cons = $CONN->query("SELECT * FROM dl_produtos WHERE nome = '$tmp'");
  $valores = $cons->fetch_array();	

echo $metade;
$nome = $_POST['nome'];
$tam = $_POST['tam'];
$beb = $_POST['beb'];
$obs1 = $_POST['obs1'];
$obs2 = $_POST['obs2'];
$cat = $_POST['cat'];
$cons3 = $CONN->query("select * from dl_produtos where nome = '$nome'");
$linha = $cons3->fetch_array();
if($tam == 'Broto'){
	$valortmp = $linha['preco_b'];
	$valortmp2= $valores['preco_b'];
}
if($tam == 'Pequena'){
	$valortmp = $linha['preco_p'];
	$valortmp2= $valores['preco_p'];
}
if($tam == 'Média'){
	$valortmp = $linha['preco_m'];
	$valortmp2 = $valores['preco_m'];
}
if($tam == 'Grande'){
	$valortmp = $linha['preco_g'];
	$valortmp2 = $valores['preco_g'];
}
if(!$tam){
	$tam = "Grande";
	$valortmp = $linha['preco_g'];
	$valortmp2 = $valores['preco_g'];
}
if($_POST['metade']){
	$valor = round(($valortmp/2)+($valortmp2/2),2);
}
else{
	$valor = $valortmp;
}
if($_POST['borda']){
	if($_POST['borda'] == '[Requeijão]'){
		$valor += 2.50;
	}
	if($_POST['borda'] == '[Chocolate]'){
		$valor += 3.99;
	}
	if($_POST['borda'] == '[Catupiry]'){
		$valor += 5.99;
	}
	if($_POST['borda'] == '[Cream Cheese]'){
		$valor += 5.99;
	}
	if($_POST['borda'] == '[Cheddar]'){
		$valor += 2.99;
	}
	if($_POST['borda'] == '[Calabresa]'){
		$valor += 2.99;
	}
}
$nome = $_POST['nome'].' '.$obs1.' '.$_POST['metade'].' '.$obs2.' '.$_POST['borda'].' '.$tam.' '.$beb;
/*
if($_POST['metade'] && $_POST['borda'] && $obs2 && $beb && $obs1){
	$nome = $_POST['nome'].'-'.$obs1.'/'.$_POST['metade'].'-'.$obs2.'-'.$_POST['borda'].'-'.$tam.' '.$beb;
	$valor = round(($valortmp/2)+($valortmp2/2),2);
}
if($_POST['metade'] && !$_POST['borda'] && $obs2 && $beb && $obs1){
	$nome = $_POST['nome'].'-'.$obs1.'/'.$_POST['metade'].'-'.$obs2.'-'.$tam.' '.$beb;
	$valor = round(($valortmp/2)+($valortmp2/2),2);
}
if(!$_POST['metade'] && !$_POST['borda'] && !$obs2 && !$beb && $obs1){
	$nome = $_POST['nome'].'-'.$tam.'-'.$obs1;
	$valor = $valortmp;
}
if($_POST['metade'] && !$_POST['borda'] && $obs2 && !$beb && $obs1){
	$nome = $_POST['nome'].'-'.$obs1.'/'.$_POST['metade'].'-'.$obs2.'-'.$tam;
	$valor = $valortmp;
}
if($_POST['metade'] && $_POST['borda'] && $obs2 && !$beb && $obs1){
	$nome = $_POST['nome'].'-'.$obs1.'/'.$_POST['metade'].'-'.$obs2.'-'.$_POST['borda'].'-'.$tam;
	$valor = round(($valortmp/2)+($valortmp2/2),2);
}
if(!$_POST['metade'] && !$_POST['borda'] && !$obs2 && !$beb && $obs1){
	$nome = $_POST['nome'].'-'.$obs1.'-'.$tam.' '.$beb;
	$valor = $valortmp;
}
if(!$_POST['metade'] && $_POST['borda'] && $obs2 && $beb && $obs1){
	$nome = $_POST['nome'].'-'.$obs1.'/'.$_POST['borda'].'-'.$obs2.'-'.$_POST['borda'].'-'.$tam.' '.$beb;
	$valor = round(($valortmp/2)+($valortmp2/2),2);
}
if(!$_POST['metade'] && !$_POST['borda'] && !$obs2 && !$beb && !$obs1){
	$nome = $_POST['nome'];
	$valor = $valortmp;
}
if(!$_POST['metade'] && $_POST['borda'] && !$obs2 && !$beb && !$obs1){
	$nome = $_POST['nome'].'-'.$_POST['borda'].'-'.$tam.' '.$beb;
	$valor = $valortmp;
}
if($_POST['metade'] && $_POST['borda'] && !$obs2 && !$beb && !$obs1){
	$nome = $_POST['nome'].'-'.$obs1.'/'.$_POST['metade'].$_POST['borda'].'-'.$tam.' '.$beb;
	$valor = round(($valortmp/2)+($valortmp2/2),2);
}
if($_POST['metade'] && $_POST['borda'] && !$obs2 && !$beb && $obs1){
	$nome = $_POST['nome'].'-'.$obs1.'/'.$_POST['metade'].'-'.$_POST['borda'].'-'.$tam.' '.$beb;
	$valor = round(($valortmp/2)+($valortmp2/2),2);
}
if($_POST['metade'] && !$_POST['borda'] && !$obs2 && !$beb && !$obs1){
	$nome = $_POST['nome'].'/'.$_POST['metade'].'-'.$_POST['borda'].'-'.$tam.' '.$beb;
	$valor = round(($valortmp/2)+($valortmp2/2),2);
}
if($_POST['metade'] && !$_POST['borda'] && !$obs2 && !$beb && $obs1){
	$nome = $_POST['nome'].'-'.$obs1.'/'.$_POST['metade'].'-'.$_POST['borda'].'-'.$tam.' '.$beb;
	$valor = round(($valortmp/2)+($valortmp2/2),2);
}*/
$ip = addslashes($_POST['ip']);


$inserir1 = $CONN->query("insert into dl_carrinho (ip,produto,preco,categoria) values ('$ip','$nome',$valor,'$cat')");

//printf(" %s.\n", $CONN->error);
if($inserir1){
	echo 1;
} else {
	echo 0;
}

?>
