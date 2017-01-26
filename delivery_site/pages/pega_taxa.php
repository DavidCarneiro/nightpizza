<?php
include("global.php");
include("configuracao.php");

$cep = $_POST[cep];

$pegar = $mysqli->query("select * from dl_enderecos where cep = '$cep'");
$val = $pegar->fetch_assoc();

echo $val['taxa'];
?>