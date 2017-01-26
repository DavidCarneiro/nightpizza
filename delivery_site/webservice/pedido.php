<?php 
header('Access-Control-Allow-Origin: *');
ob_clean();
include("conexao.php");
$id = $_POST['uid'];
$nome = " ";
$fone = " ";
$end = " ";
$obs = " ";
$conf = 0;
$hoje = date("Y-m-d");

$inserir1 = $CONN->query("insert into pedidos (nome,fone,end,obs,confirmado,dtped,fk_usuario,enviado) values ('$nome','$fone','$end','$obs',$conf,'$hoje',$id,0)");
$sel = $CONN->query("SELECT * FROM pedidos ORDER by id desc limit 1");
$maxid = $sel->fetch_array();
echo $maxid['id'];

?>