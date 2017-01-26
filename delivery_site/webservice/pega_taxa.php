<?php
header('Access-Control-Allow-Origin: *');
ob_clean();
include("conexao.php");

$bairro = $_POST['bairro'];

$pegar = $CONN->query("select * from dl_enderecos where bairro = '$bairro'");
$val = $pegar->fetch_assoc();
if($val){
	echo $val['taxa'];
}
else{
	echo "";
}

?>