<?php
header("Content-Type: text/html; charset=UTF-8",true);
header('Access-Control-Allow-Origin: *');
ob_clean();
include("conexao.php");

$ip = addslashes($_POST['ip']);
$select = $CONN->query("SELECT * FROM dl_carrinho WHERE ip = '$ip'");


	   while($valor = $select->fetch_array()){
		   
		   @$arr[] = array('nome' => utf8_encode($valor['produto']), 'valor' => utf8_decode($valor['preco']), 
		                  'cat' => utf8_decode($valor['categoria']));
		   /*echo '"id":'.$valor['id'].',';   
		   echo '"nome":'.$valor['nome'].',';
		   echo '"valor":'.$valor['preco'];*/
		   $i++;
	   }
	   
    echo json_encode($arr);
?>