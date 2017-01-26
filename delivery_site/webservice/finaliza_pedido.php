<?php
header("Content-Type: text/html; charset=UTF-8",true);
header('Access-Control-Allow-Origin: *');
ob_clean();
include("conexao.php");

$ip = addslashes($_POST['ip']);
$select = $CONN->query("SELECT * FROM dl_carrinho WHERE ip = '$ip'");


	   while($valor = $select->fetch_array()){
		   
		   @$arr[] = array('nome' => ($valor['produto']), 'valor' => ($valor['preco']), 
		                  'cat' => ($valor['categoria']));
		   /*echo '"id":'.$valor['id'].',';   
		   echo '"nome":'.$valor['nome'].',';
		   echo '"valor":'.$valor['preco'];*/
		   $i++;
	   }
	   
    echo json_encode($arr);
?>