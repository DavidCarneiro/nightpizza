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
<ul class="nav nav-tabs" role="tablist">
        <li role="presentation"><a href="?page=adm"><i class="fa fa-home" aria-hidden="true"></i> In&iacute;cio</a></li>
        <li role="presentation" class="active"><a href="?page=adm_categorias"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Categorias</a></li>
        <li role="presentation"><a href="?page=adm_produtos"><i class="fa fa-bars" aria-hidden="true"></i> Produtos</a></li>
		<li role="presentation"><a href="?page=adm_entregas"><i class="fa fa-motorcycle" aria-hidden="true"></i> Entregas</a></li>
		<li role="presentation"><a href="?page=sair"><i class="fa fa-reply" aria-hidden="true"></i> Sair</a></li>
      </ul><br />

<h1 class="page-header">Categorias</h1>
<div style="width:80%;">

<?php
$mostrar = $mysqli->query("select * from dl_categorias order by id desc");
$mostrar2 = $mostrar->num_rows;
if($mostrar2 === 0) {
echo '<div class="alert alert-info" role="alert"><b>Ops!</b> nenhuma categoria no momento.</div>';
} else {
echo '<form action="" method="post">
<table width="auto" border="0">
  <tr>
  <td width="300">
<select name="downs" class="form-control" style="width:80%;" required>
<option value="">--- Selecione ---</option>';
while($exibir = $mostrar->fetch_assoc())  {
echo '<option value="'.$exibir[id].'">'.sql($exibir[nome]).'</option>';
}
echo '</select></td>
<td  width="300"><input class="btn btn-danger btn-block" type="submit" value="Deletar" style="width:50%;" name="deletar"></form></td></tr>
</table>';
}
if($_POST[deletar]) {
$mysqli->query("delete from dl_categorias where id='".$_POST[downs]."'");
echo '<br><div class="alert alert-success" role="alert"><b>Sucesso!</b> categoria deletada.</div>';
}
?>
</div>
<br /><br />
<h1 class="page-header">Adicionar Categorias</h1>
<div style="width:50%;">
<form action="" method="post">
<input name="nome" class="form-control" type="text" placeholder="Nome..." required><br />
<center><input class="btn btn-success btn-block" type="submit" value="Enviar" style="width:70%;" name="enviar">
</center></div>


<br />

<?php 

if($_POST[enviar]) {
$mysqli -> query ("insert into dl_categorias (nome) values ('".$_POST[nome]."')");
echo '<div class="alert alert-success" role="alert"><b>Sucesso!</b> nova categoria adicionado.</div>';
}
} ?>