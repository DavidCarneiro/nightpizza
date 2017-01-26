<?php
header('Access-Control-Allow-Origin: *');
ob_clean();
include("conexao.php");
$cat = $_POST['nome'];
$select = $CONN->query("select * from dl_produtos order by categoria desc");


	 
	   while($valor = $select->fetch_array()){
		   $arr[] = array('id' => $valor['id'], 'nome' => ($valor['nome']), 'desc' => ($valor['descricao']), 'valorb' => $valor['preco_b'], 'valorp' => $valor['preco_p'], 'valorm' => $valor['preco_m'],
 		                  'valorg' => $valor['preco_g'], 'img' => $valor['foto'], 'cat' => $valor['categoria']);
		   /*echo '"id":'.$valor['id'].',';   
		   echo '"nome":'.$valor['nome'].',';
		   echo '"valor":'.$valor['preco'];*/
	   }	 
    echo json_encode($arr);	   
?>