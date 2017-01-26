<?php
session_start();
include("pages/configuracao.php");
$idcli = $_SESSION['sessao_id'];
$id = $_GET[id];

$cons = $mysqli->query("SELECT * FROM  dl_pedidos  WHERE id =$id");
$val = $cons->fetch_array();
echo "<table width='270px' align='center'>
        <tr align='center'><td colspan='2'><b>".$val[nome]." #".$val[id]."</b></td></tr>
		<tr align='center'><td colspan='2'>".$val[fone]."</td></tr>
		<tr align='center'><td colspan='2'>".$val[data]."</td></tr>
		<tr><td colspan='2'><hr></td></tr>
		<tr><td align='center' colspan='2'><b>Produtos</b></td></tr>
		<tr><td colspan='2'>".$val[descricao]."</td></tr>
		<tr><td colspan='2'><hr></td></tr>
		<tr><td><b>Total</b></td><td align='right'><b>".$val[valor]."</b></td></tr>
		<tr><td><b>Entregar em:</b></td><td align='right'><b>".($val[rua])." ".($val[numero])." ".($val[cep])."".($val[bairro])."</b></td></tr>
		<tr><td><b>".("Observações")."</b></td><td align='right'><b>".($val[obs])."</b></td></tr>
		<tr><td colspan='2'><hr></td></tr>
		<tr><td align='center' colspan='2'><a href='#' onclick='window.print();'><img src='css/imp.png' width='25px' height='25px'></a>
      </table>";
?>