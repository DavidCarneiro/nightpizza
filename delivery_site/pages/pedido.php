<?php

if (basename($_SERVER["REQUEST_URI"]) === basename(__FILE__))
{
	exit('<h1>ERROR 404</h1>Entre em contato conosco e envie detalhes.');
}
?>
<br /><br />
<div class="container marketing">
<?php
$pegar_car = $mysqli->query("select * from dl_pedidos where id='".sql($_GET[id])."'");
$pegar_ca = $pegar_car->fetch_assoc();

switch($pegar_ca[status]) {
case "Processando": $xds = '<span style="margin-left:2%;" class="label label-info">';
break;
case "Enviado": $xds = '<span style="margin-left:2%;" class="label label-success">';
break;
case "Entregue": $xds = '<span style="margin-left:2%;" class="label label-success">';
break;
case "Devolvido": $xds = '<span style="margin-left:2%;" class="label label-danger">';
break;
case "Cancelado": $xds = '<span style="margin-left:2%;" class="label label-danger">';
break;
case "Cliente Ausente": $xds = '<span style="margin-left:2%;" class="label label-warning">';
break;
default: $xds = '<span style="margin-left:2%;" class="label label-primary">';
}
?>


<div class="page-header">
<h2><i class="fa fa-hourglass-start" aria-hidden="true"></i> Pedido #<?=$pegar_ca[id];?> <?=$xds;?>Status: <?=$pegar_ca[status];?> </span> <a style="font-size:14px;margin-left:1%;" href="javascript:null(0)" onclick="window.print();">[Imprimir]</a></h2>
</div>

<?php
		  $pegar_car = $mysqli->query("select * from dl_pedidos where id='".sql($_GET[id])."'");
		  $pegar_ca = $pegar_car->fetch_assoc();
		  if($pegar_ca == 0) { echo '<center><br><br><img src="css/img_carrinho_vazio.png"/><br>
	<h3>Nenhum pedido</h3>Que tal achar uma coisa gostosa para <a href="?page=cardapio">comer?</a></center>'; } else {
		  echo "<table class=table table-bordered>";
echo "<tr><th>Pedido ".$pegar_ca[id]."</th><th>Telefone</th><th>Local</th><th>Produtos</th><th>Total</th><th>Pagamento</th><th>Obs</th></tr>
      <tr><td><b>".$pegar_ca[nome]."</b><br>".$pegar_ca[email]."</td><td>".$pegar_ca[fone]."</td><td>".($pegar_ca[rua])." ".($pegar_ca[numero])." ".($pegar_ca[cep])." ".($pegar_ca[bairro])."</td><td>".$pegar_ca[descricao]."</td><td>R$".number_format($pegar_ca[valor],2,',','.')."</td><td>".$pegar_ca[pag]."</td><td>".$pegar_ca[obs]."</td></tr>";
echo "</table>";
		  }
		  ?>

<br /><br />
<div style="clear:both;"></div>
<script type="text/javascript"> var shr = document.createElement("script"); shr.setAttribute("data-cfasync", "false"); shr.src = "//dsms0mj1bbhn4.cloudfront.net/assets/pub/shareaholic.js"; shr.type = "text/javascript"; shr.async = "true"; shr.onload = shr.onreadystatechange = function() { var rs = this.readyState; if (rs && rs != "complete" && rs != "loaded") return; var site_id = "39e07923cec488add2e8c7d4263934e0"; try { Shareaholic.init(site_id); } catch (e) {console.log(e)} }; var s = document.getElementsByTagName("script")[0]; s.parentNode.insertBefore(shr, s); </script>
<h3>Para cancelar ou mudar seu pedido ligue para nossa central.</h3>
<h4>O link e informações do seu pedido também foi enviado por email.</h4>
<bR />
<h3><span class="label label-warning"><?=$cfg[tel1];?> \ <?=$cfg[tel2];?></span></h3>

<h2><span class="label label-primary">Obrigado pela preferência!</span></h2>
</div>

