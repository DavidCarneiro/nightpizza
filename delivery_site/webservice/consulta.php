<?php
header("Content-Type: text/html; charset=UTF-8",true);
header('Access-Control-Allow-Origin: *');
ob_clean();
include("conexao.php");
$hoje = @date("d/m/Y");
$id = addslashes($_POST['id']);
$select = $CONN->query("SELECT * FROM dl_pedidos WHERE id = '$id'");


	   while($valor = $select->fetch_array()){
		   
		   @$arr[] = array('id' => utf8_encode($valor['id']), 'status' => utf8_decode($valor['status']));
		   /*echo '"id":'.$valor['id'].',';   
		   echo '"nome":'.$valor['nome'].',';
		   echo '"valor":'.$valor['preco'];*/
		   $i++;
	   }
	   
    echo json_encode($arr);
?>