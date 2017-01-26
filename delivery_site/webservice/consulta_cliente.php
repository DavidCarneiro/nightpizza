<?php
header("Content-Type: text/html; charset=UTF-8",true);
header('Access-Control-Allow-Origin: *');
ob_clean();
include("conexao.php");
$id = $_POST['ip'];
$sel = $CONN->query("SELECT * FROM  dl_clientes WHERE id_cliente = $id");
while($valor = $sel->fetch_array()){
		   
		   @$arr[] = array('id' => $valor['id_cliente'], 'nome' => ($valor['nome']), 'cep' => ($valor['cep']), 
		                  'rua' => ($valor['rua']), 'bairro' => $valor['bairro'], 'numero' => $valor['numero'],
						  'fone' => $valor['fone'], 'email' => $valor['email']);
}	   
	  echo json_encode($arr); 
    
?>