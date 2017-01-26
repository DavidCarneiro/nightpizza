<?php
header('Access-Control-Allow-Origin: *');
header("Content-Type: text/html; charset=UTF-8",true);
ob_clean();
include("funcoes.php");
include("conexao.php");
@$tmp = explode('?',utf8_decode($_POST['valped2']));
@$valped = $_POST['valped2'];
$select = $CONN->query("select * from produtos where fk_usuario = 2 and promo = 1 order by tipo asc");

$quantidade = $CONN->query("select count(*) as qtd from produtos");
$qtd = $quantidade->fetch_array();
$i = 1;
	 
	   while($valor = $select->fetch_array()){	   
		   $arr[] = array('id' => $valor['id'], 'nome' => utf8_encode($valor['nome']), 'desc' => utf8_encode($valor['dsc']), 'valor' => $valor['preco'], 'img' => $valor['img'], 'tipo' => $valor['tipo']);
		   /*echo '"id":'.$valor['id'].',';   
		   echo '"nome":'.$valor['nome'].',';
		   echo '"valor":'.$valor['preco'];*/
		   $i++;
	   }
    echo json_encode($arr);
?>