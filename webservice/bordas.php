<?php
header('Access-Control-Allow-Origin: *');
ob_clean();
include("conexao.php");
$select = $CONN->query("select * from dl_bordas order by nome");


	 
	   while($valor = $select->fetch_array()){
		   $arr[] = array('id' => $valor['id'], 'nome' => ($valor['nome']), 'valorg' => $valor['valor'];
		   /*echo '"id":'.$valor['id'].',';   
		   echo '"nome":'.$valor['nome'].',';
		   echo '"valor":'.$valor['preco'];*/
	   }	 
    echo json_encode($arr);	   
?>