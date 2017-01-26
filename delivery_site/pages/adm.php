<?php
session_cache_expire(360);
if (basename($_SERVER["REQUEST_URI"]) === basename(__FILE__))
{
	exit('<h1>ERROR 404</h1>Entre em contato conosco e envie detalhes.');
}

?><head>
<meta http-equiv="refresh" content="60;url=?page=adm">

</head>




<br /><br />
<div class="container marketing">



<div class="page-header">
<h2><i class="fa fa-line-chart" aria-hidden="true"></i> Área Administrativa

<?php if(!isset($_SESSION[login])) { } else { ?>
 <a href="?page=adm_global"><button class="btn btn-default" style="margin-left:1%;"><i class="fa fa-lightbulb-o" aria-hidden="true"></i> Configurações Global</button></a>
<a href="?<?=$_SERVER['QUERY_STRING'];?>&mostrar=1"><button class="btn btn-primary" style="margin-left:1%;"><i class="fa fa-barcode" aria-hidden="true"></i> Mostrar Pedidos</button></a>
<?php } ?>
</h2>
</div>
<p class="lead">&Aacute;rea destinada a membros da administra&ccedil;&atilde;o, se estiver no lugar errado clique <a href="?page=cardapio">aqui.</a></p>


<?php if($_SESSION[login] == $cfg[user]) { ?>



<ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="?page=adm"><i class="fa fa-home" aria-hidden="true"></i> In&iacute;cio</a></li>
        <li role="presentation"><a href="?page=adm_categorias"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Categorias</a></li>
        <li role="presentation"><a href="?page=adm_produtos"><i class="fa fa-bars" aria-hidden="true"></i> Produtos</a></li>
		<li role="presentation"><a href="?page=adm_enderecos"><i class="fa fa-motorcycle" aria-hidden="true"></i> Endereços</a></li>
		<li role="presentation"><a href="?page=adm_entregas"><i class="fa fa-motorcycle" aria-hidden="true"></i> Entregas</a></li>
		<li role="presentation"><a href="?page=sair"><i class="fa fa-reply" aria-hidden="true"></i> Sair</a></li>
      </ul><br />
<h3>Vai fechar o caixa?</h3>
Até agora conseguimos <b style="color:green;">R$ 
<?php
$hoje = date('d/m/Y');
$sql0 = $mysqli->query("SELECT count(*) as tped from dl_pedidos where data='$hoje' and status = 'Processando'");
$exibir0 = $sql0->fetch_array();
//echo "<bgsound src='notificacao.mp3' loop=-1>";
if($exibir0['tped'] > 0){
	//echo $exibir0[tped];
    echo '<audio id="myAudio" width="320" height="176">
  <source src="notificacao.mp3" type="audio/mp4">
  Your browser does not support HTML5 video.
</audio>';
}
$sql = $mysqli->query("SELECT SUM(valor) as valor from dl_pedidos where data='$hoje' and status='Entregue'");
$exibir = $sql->fetch_array();
echo number_format($exibir['valor'],2,",",".");
?>.</b>
<br>Contando somente com os pedidos com o status de entregue.<br><br>

Ontem tivemos <b style="color:red;font-size:16px;">
<?php

$ontem = voltadata(1,$hoje);
$sql2 = $mysqli->query("SELECT * from dl_pedidos where data='$ontem'");
$exibir2 = $sql2->num_rows;
echo $exibir2;
?> </b> pedidos.
<br><br />
Hoje tivemos <b style="color:orange;">
<?php
$sql2 = $mysqli->query("SELECT * from dl_pedidos where data='$hoje'");
$exibir2 = $sql2->num_rows;
echo $exibir2;
?> </b> pedidos.
<br>
<b style="color:blue">
<?php
$sql3 = $mysqli->query("SELECT * from dl_pedidos where data='$hoje' and status='Entregue'");
$exibir3 = $sql3->num_rows;
echo $exibir3;
?></b> deles foram entregues.

<br><br>


<?php
$result = $mysqli -> query ("SELECT * from dl_pedidos");
$row_tickets = $result->num_rows;
if($row_tickets == 0) {
echo '<div class="alert alert-danger" role="alert"><b>Erro!</b> nenhum pedido, tente novamente mais tarde.</div>';
} else {

$busca = "SELECT * FROM dl_pedidos";
$total_reg = "10";

$pagina=$_GET['pagina']; if (!$pagina) { $pc = "1"; } else { $pc = $pagina; }


$inicio = $pc - 1; $inicio = $inicio * $total_reg;


$limite = $mysqli->query("$busca order by id desc LIMIT $inicio,$total_reg");
  $todos = $mysqli->query("$busca");
 
  $tr = $todos->num_rows; 
  $tp = $tr / $total_reg; 
 
while($exibir = $limite->fetch_assoc()) {
echo "<table class=table table-bordered>";
echo "<tr><th><a href='./imprimir.php?id=".$exibir[id]."' target='blank'>Pedido ".$exibir[id]."</a></th><th>Telefone</th><th>Local</th><th>Produtos</th><th>Total</th><th>Pagamento</th><th>Obs</th></tr>
      <tr><td><b>".$exibir[nome]."</b><br>".$exibir[email]."</td><td>".$exibir[fone]."</td><td>".($exibir[rua])." ".($exibir[numero])." ".($exibir[cep])." ".($exibir[bairro])."</td><td>".$exibir[descricao]."</td><td>R$".number_format($exibir[valor],2,',','.')."</td><td>".$exibir[pag]."</td><td>".$exibir[obs]."</td></tr>";
echo "</table>";
echo "<form action='' method='post'>
<input type='hidden' name='id' value='".$exibir[id]."'>
<select name='status' style='width:15%;padding:0.4%;' required>
<option value='".$exibir[status]."'>".$exibir[status]."</option>
<option value='Recebido'>Recebido</option>
<option value='Enviado'>Enviado</option>
<option value='Processando'>Processando</option>
<option value='Entregue'>Entregue</option>
<option value='Cliente Ausente'>Cliente Ausente</option>
</select>
<input type='submit' name='modificar' value='Modificar' class='btn btn-warning'>
<input type='submit' name='deletar' value='Deletar' class='btn btn-danger'>
</form>
";
echo "<br><br>";
	}

}
if($_POST[deletar]) {
$mysqli->query("delete from dl_pedidos where id='".$_POST['id']."'");
echo '<script>location.href="?page=adm";</script>';
}

if($_POST[modificar]) {
echo "<script>alert('Modificado, email enviado para o cliente.');</script>";
$mysqli->query("update dl_pedidos set status='".$_POST['status']."' where id='".$_POST[id]."'");
$pegar = $mysqli->query("select * from dl_pedidos where id='".$_POST[id]."'");
$em = $pegar->fetch_assoc();
$sender = "naoresponda@partiupizza.com";
$namesender = "PartiuPizza Delivery";
$assunto = "Mudança no status do pedido";
$mensagemHTML = "O seu pedido <b>#".$em[id]."</b> foi alterado para ".$_POST['status'].".<br>
<a href='http://".$cfg[site]."/?page=pedido&id=".$em[id]."'>http://".$cfg[site]."/?page=pedido&id=".$em[id]."</a>";

$headers = "MIME-version: 1.1\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\n";

$envia = mail($em[email],$assunto,$mensagemHTML,$headers,"-r".$sender);
if($envia){
	echo "<script>alert('Email enviado para: '".$em[email].");</script>";
}
else{
	echo "<script>alert('Erro ao enviar email para: '".$em[email].");</script>";
}
//email($em[email],,$cfg[empresa],$cfg[email]);
}
  
 echo "<center>";

  $anterior = $pc -1;
  $proximo = $pc +1;
  if ($pc>1) {
  echo "<a href='?page=adm&pagina=$anterior' class='btn btn-info'>Anterior</a>";
  }
  echo " ";
  if ($pc<$tp) {
  echo "<a href='?page=adm&pagina=$proximo' class='btn btn-info'>Pr&oacute;ximo</a>";
  }
echo "</center>";
?> 
	  
	  
	  
	  
	  
	  
<?php } else { 

?>

<div style="width:50%">
<form action="" method="post">
<input type="text" name="user" class="form-control" placeholder="Usu&aacute;rio..." /><br />
<input type="password" name="pw" class="form-control" placeholder="Senha..." /><br />

<input type="submit" value="Entrar" name="entrar" style="width:100%;margin-bottom:1%;" class="btn btn-success" />
</form>

<?php
if($_POST[entrar] == "Entrar") {

if(empty($_POST[user]) || empty($_POST[pw])) {

echo '<br><div class="alert alert-info fade in"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true" style="margin-right:0.5%;"></span> Desculpe, existem campos em branco. </div>';
}elseif($_POST[user] === $cfg[user] and $_POST[pw] === $cfg[pw]) {
session_start();
$_SESSION[login] = $cfg[user];
$_SESSION[nome] = $cfg[empresa];
echo '<script>location.href="?page=adm";</script>';
} else {
echo '<br><div class="alert alert-info fade in"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true" style="margin-right:0.5%;"></span> Desculpe, o usu&aacute;rio ou senha inv&aacute;lidos. </div>';

}
}
?>
</div>

<?php } ?>

</div>

<script>
var aud = document.getElementById("myAudio");
    aud.autoplay = true;
    aud.load();

</script>
