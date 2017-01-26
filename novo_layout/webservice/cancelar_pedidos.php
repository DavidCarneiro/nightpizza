<?php
header("Content-Type: text/html; charset=UTF-8",true);
header('Access-Control-Allow-Origin: *');
ob_clean();
include("conexao.php");
$ip = addslashes($_POST['ip']);
$select = $CONN->query("DELETE FROM dl_carrinho WHERE ip = '$ip'");

if($select){
	echo 1;
}
else{
	echo 0;
}

?>