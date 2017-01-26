<meta charset="utf-8">
<?php
session_start();
include("includes/conexao.php");
$idcli = $_SESSION['sessao_id'];
$id = $_GET[id];
$sel = $mysqli->query("SELECT * FROM dl_pedidos WHERE id = $id");
$valores = $sel->fetch_array();

echo "<table width='270px' align='center'>
        <tr align='center'><td colspan='2'><b>".$valores[nome]." #".$valores[id]."</b></td></tr>
		<tr align='center'><td colspan='2'>".$valores[rua].", ".$valores[numero]." ".$valores[bairro]."</td></tr>
		<tr align='center'><td colspan='2'>".$valores[fone]."</td></tr>
		<tr align='center'><td colspan='2'>".$valores[data]."</td></tr>
		<tr><td colspan='2'><hr></td></tr>
		<tr><td align='center' colspan='2'><b>Produtos</b></td></tr>
		<tr><td colspan='2'>".$valores[descricao]."</td></tr>
		<tr><td colspan='2'><hr></td></tr>
		<tr><td><b>Total</b></td><td align='right'><b>".$valores[valor]."</b></td></tr>
		<tr><td><b>".("Pagamento")."</b></td><td align='right'><b>".($valores[pag])."</b></td></tr>
		<tr><td><b>".("Tipo")."</b></td><td align='right'><b>".($valores[tipo])."</b></td></tr>
		<tr><td><b>Entregar em:</b></td><td align='right'><b>".($valores[rua]).", ".($valores[numero])." ".($valores[bairro])."</b></td></tr>
		<tr><td><b>".("Observações")."</b></td><td align='right'><b>".($valores[obs])."</b></td></tr>
		<tr><td colspan='2'><hr></td></tr>
		<tr><td align='center' colspan='2'><a href='#' onclick='window.print();'><img src='img/imp.png' width='25px' height='25px'></a>
      </table>";
?>