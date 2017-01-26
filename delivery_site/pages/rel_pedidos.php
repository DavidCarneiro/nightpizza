<?php

if (basename($_SERVER["REQUEST_URI"]) === basename(__FILE__))
{
	exit('<h1>ERROR 404</h1>Entre em contato conosco e envie detalhes.');
}

if(!isset($_SESSION[login])) { exit('<h1>ERROR 404</h1>Entre em contato conosco e envie detalhes.'); } else {
?>
<br /><br />
<div class="container marketing">



<div class="page-header">
<h2>Área Administrativa  <a href="?page=adm_global"><button class="btn btn-default" style="margin-left:1%;"><i class="fa fa-lightbulb-o" aria-hidden="true"></i> Configurações Global</button></a>
<a href="?<?=$_SERVER['QUERY_STRING'];?>&mostrar=1"><button class="btn btn-primary" style="margin-left:1%;"><i class="fa fa-barcode" aria-hidden="true"></i> Mostrar Pedidos</button></a>
</h2>
</div>
<p class="lead">&Aacute;rea destinada a membros da administra&ccedil;&atilde;o, se estiver no lugar errado clique <a href="?page=cardapio">aqui.</a></p>


<?php if(isset($_SESSION[login])) { ?>



<ul class="nav nav-tabs" role="tablist">
        <li role="presentation"><a href="?page=adm"><i class="fa fa-home" aria-hidden="true"></i> In&iacute;cio</a></li>
        <li role="presentation"><a href="?page=adm_categorias"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Categorias</a></li>
        <li role="presentation"><a href="?page=adm_produtos"><i class="fa fa-bars" aria-hidden="true"></i> Produtos</a></li>
		<li role="presentation"><a href="?page=adm_enderecos"><i class="fa fa-motorcycle" aria-hidden="true"></i> Endereços</a></li>
		<li role="presentation"><a href="?page=adm_entregas"><i class="fa fa-motorcycle" aria-hidden="true"></i> Entregas</a></li>
		<li role="presentation" class="active"><a href="?page=rel_pedidos"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Relatório de Pedidos(Qtd)</a></li>
		<li role="presentation"><a href="?page=sair"><i class="fa fa-reply" aria-hidden="true"></i> Sair</a></li>
      </ul><br />
	  
	  
	  
<?php 
$cons = $mysqli->query("select * from dl_entregas");
$entrega = $cons->fetch_array();
?>
 
<form action="" method="post">
<table align="center">
<tr>
<td>De:<input type="date" name="dtini"></td> <td>Até: <input type="date" name="dtfim"></td>
<td><input type="submit" name="go" value="Buscar" class="btn btn-danger" /></td>
</table>
</form>


<?php
include("funcoes.php");
if($_POST[go]) {
$ini = recebedata($_POST[dtini]);
$fim = recebedata($_POST[dtfim]);
$up1 = $mysqli->query("select data, count(id) as qt from dl_pedidos where data between '$ini' and '$fim' group by data");
$up4 = $mysqli->query("select count(*) as qt from dl_pedidos");
$periodo = $up1->fetch_array();
$ger = $up4->fetch_array();

echo '<br><table border="1" width="100%">
        <tr>
		  <td align="center"><b>Período De: '.$ini.' Até: '.$fim.'<br>Data</b></td>
		  <td align="center"><b>Web</b></td>
		  <td align="center"><b>App</b></td>
		  <td align="center"><b>Total</b></td>
		</tr>
		<tr>
		  <td align="center">'.$periodo['data'].'</td>';
		  $up2 = $mysqli->query("select count(*) as qt from dl_pedidos where data = '".$periodo['data']."' and so = 0");
		  $plat1 = $up2->fetch_array();
echo     '<td align="center">'.$plat1['qt'].'</td>';
          $up3 = $mysqli->query("select count(*) as qt from dl_pedidos where data = '".$periodo['data']."' and so = 1");
		  $plat2 = $up3->fetch_array();
echo	 '<td align="center">'.$plat2['qt'].'</td>
		  <td align="center">'.$periodo['qt'].'</td>
		</tr>
	  </table>';
}
} else { ?>

<div style="width:50%">
<form action="" method="post">
<input type="text" name="user" class="form-control" placeholder="Usu&aacute;rio..." /><br />
<input type="text" name="pw" class="form-control" placeholder="Senha..." /><br />

<input type="submit" value="Entrar" name="entrar" style="width:100%;margin-bottom:1%;" class="btn btn-success" />
</form>

<?php
if($_POST[entrar]) {

if(empty($_POST[user]) || empty($_POST[pw])) {
echo '<br><div class="alert alert-info fade in"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true" style="margin-right:0.5%;"></span> Desculpe, existem campos em branco. </div>';
}elseif($_POST[user] === $cfg[user] and $_POST[pw] === $cfg[pw]) {
session_start();
$_SESSION[login] = $cfg[user];
$_SESSION[nome] = $cfg[empresa];
echo '<script>location.href="?page=adm";</script>';
} else {
echo '<br><div class="alert alert-info fade in"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true" style="margin-right:0.5%;"></span> Desculpe, o usu&aacute;rio ou senha inv&aacute;lidos. </div>';

}}
?>
</div>

<?php } } ?>

</div>


