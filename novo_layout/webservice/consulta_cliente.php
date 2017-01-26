<?php
header("Content-Type: text/html; charset=UTF-8",true);
header('Access-Control-Allow-Origin: *');
ob_clean();
include("conexao.php");
echo $id = $_POST['ip'];
$sel = $CONN->query("SELECT * FROM  dl_clientes WHERE id_cliente = $id");
while($valor = $sel->fetch_array()){
		   
		   @$arr[] = array('id' => $valor['id_cliente'], 'nome' => utf8_encode($valor['nome']), 'cep' => ($valor['cep']), 
		                  'rua' => utf8_decode($valor['rua']), 'bairro' => $valor['bairro'], 'numero' => $valor['numero'],
						  'fone' => $valor['fone'], 'email' => $valor['email']);
}	   
	  echo json_encode($arr); 
    
?>