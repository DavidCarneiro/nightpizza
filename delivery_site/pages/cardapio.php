<head>
<script type="text/javascript">
<?php
if($_GET[idq]) { ?>
	$(document).ready(function () {
        $.fancybox({
            'width': '40%',
            'height': '40%',
            'autoScale': true,
            'transitionIn': 'fade',
            'transitionOut': 'fade',
            'type': 'iframe',
			keys : {
    close  : null
  },
			'enableEscapeButton': false,
			'hideOnOverlayClick':false,
        'hideOnContentClick':false,
			'closeBtn' : false, helpers : { 
  overlay : {closeClick: false}
},
            'href': 'pages/go.php?idq=<?=$_GET[idq];?>'
        });
		
});
<?php } ?>
</script>
</head>

<div class="container marketing" style="margin-top:5%; width:100%;">
<div class="wrapper">
<div style="float:left;margin:2% 4% 2% 2%;"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3981.0798956211092!2d-38.47968148569829!3d-3.79277379724083!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x7c7458f722eb91d%3A0x4fd3cb43a6cd8c69!2sR.+Crisanto+Moreira+da+Rocha%2C+490+-+Lagoa+Sapiranga+(Coit%C3%A9)%2C+Fortaleza+-+CE%2C+60833-022!5e0!3m2!1spt-BR!2sbr!4v1480653076793" width="200" height="150" frameborder="0" style="border:0" allowfullscreen></iframe></div>
<div style="width:100%;height:40%;background-color:#FFFFFF;padding:1%;border:thin solid #D6D6D6;margin-bottom:2%;">
<img src="css/logo.png" style="margin:0 2% 0 2%;float:right;"width="30%" height="30%"/>
<h3><?=$cfg[empresa];?></h3>

<?php
$cons = $mysqli->query("select * from dl_entregas");
$entrega = $cons->fetch_array();
if($entrega['entregas'] == 1) {
echo '<h4 style="color:#000;"><img src="css/aberto.png" title="Loja aberta"> Aberto <font style="color:#999;font-size:14px;"> (Fecha às '.$cfg[horario2].' horas)</font></h4>';
} else {
echo '<h4 style="color:#000;"><img src="css/fechado.png" title="Loja fechada"> Fechada <font style="color:#999;font-size:14px;">(Abrirá às '.$cfg[horario].' horas)</font></h4>';
}
?> <?=$cfg[diasf];?> das <?=$cfg[horario];?>:00 &agrave;s <?=$cfg[horario2];?>:00.<br />
<h4><span class="glyphicon glyphicon-time" aria-hidden="true" style="margin-right:0.5%;height:5%;color:#BFBFC0;" ></span>  <?=$cfg[entrega_min];?> 
<span class="glyphicon glyphicon-thumbs-up" aria-hidden="true" style="margin-right:0.5%;height:5%;margin-left:2%;color:#BFBFC0;"></span>  <?php
$pegar_xss = $mysqli->query("select * from dl_pedidos");
$pegar_xssw = $pegar_xss->num_rows;
echo $pegar_xssw;
?></h4>
<div style="clear:both;"></div>
</div>
</div>
</div>
<?php

if($entrega['entregas'] == 1){
?>
<form action="" method="post"> 
<table width="100%" border="0">
  <tr>
    <td><div style="width:30%;height:30%;float:right;border:thin solid #EAEAEA;">
	<div style="background-color:#F2F3F3;"><img src="css/car.png" width="100%" /></div>
	
	<br>
	<?php
		  $pegar_car = $mysqli->query("select * from dl_carrinho where ip='".$_SERVER['REMOTE_ADDR']."'");
		  $pegar_ca = $pegar_car->num_rows;
		  if($pegar_ca == 0) { echo '<center><img src="css/img_carrinho_vazio.png" width="20%" height="20%" />
	<h4>Carrinho vazio</h4>Que tal achar uma coisa gostosa<br /> para comer?</center>'; }
		  while($exibir = $pegar_car->fetch_assoc()) {
		  echo "<form action='' method='post'>
		  <input type='hidden' name='id' value='".sql($exibir[id])."'>
		  <input type='hidden' name='produto' value='".sql($exibir[produto])."'>
		  
		  
		  <div style=margin:5%;><input type='submit' name='dell' value='[x]' style='margin:0;padding:0;border:none;background-color:#fff;color:#990000;'> ".sql($exibir[produto])." <div style='float:right;'><b>R$ ".number_format($exibir[preco],2,",",".")."</b></div></div><div style='clear:both;'></div></form>";
		  }
		  ?>
<?php
if($_POST[dell]) {
$mysqli->query("DELETE FROM dl_carrinho WHERE ip='".$_SERVER['REMOTE_ADDR']."' and produto='".$_POST[produto]."'");
echo '<script>location.href="?page=cardapio"</script>';
}
?>	  
<head>
<script language="javascript">
 function changeImage(element) {
     element.src = element.bln ? "css/car2.png" : "css/car22.png";
     element.bln = !element.bln; 
 }
</script>
</head>
	<div id="afs"></div><br>
	<hr style="padding:0;margin:0;">
	<img src="css/car2.png" id="imgName" id="changer" onclick="changeImage(this)">
	<hr style="padding:0;margin-top:0;">
	<div style="margin:5%;width:90%;font-size:12px;color:#000;"><div style="clear:both;"></div>
	Pedido Mínimo <div style="float:right;">R$ <?=$cfg[minimo];?></div><br>
	</div>
	<hr>
	<div style="margin:5%;width:90%;font-size:16px;">Sub-Total do Pedido <div style="font-size:20px;float:right;color:#009900;font-weight:bold;">R$ 
	<?php
$sql = $mysqli->query("SELECT SUM(preco) from dl_carrinho where ip='".$_SERVER['REMOTE_ADDR']."'");

while ($exibir = $sql->fetch_array()){;
if($exibir['SUM(preco)'] == 0) { $exibir['SUM(preco)'] = "0,00"; } else { $exibir['SUM(preco)'] = $exibir['SUM(preco)']; }
echo number_format($exibir['SUM(preco)'],2,",",".");;
}
?><br>
	</div>
</div>
	<a href="?page=fechar" class="btn btn-success" style="width:90%;margin:5% 5% 1% 5%;"><h4 style="font-weight:bold;">Fechar Pedido</h4></a>
	<input type="submit" value="Cancelar" name="cancelar" class="btn btn-danger" style="width:90%;margin:1% 5% 5% 5%;" />
	
	<br>
	<center>Pague na entrega com dinheiro <br><b>OU</b><br>(Crédito/Débito)<br><b>Visa Master Elo</b><br>(Crédito)</br><b>American Dinners Hipercard
	</div></center>
<?php
}

?>
	<table width="68%">
	<tr>
	<td>
	</form>
	
	<form action="" method="post" id="form" name="form" enctype="multipart/form-data">
<td><select name="categoria" class="form-control" style="width:98%;padding:3%;height:30%;color:#A9A9A9;font-size:16px;" id="buscar">
		  <option value="" disabled="disabled" selected="selected">Filtrar Menu</option>
		  <option value="">Todos</option>
		  <?php
		  $pegar_categorias = $mysqli->query("select * from dl_categorias");
		  while($exibir = $pegar_categorias->fetch_assoc()) {
		  echo "<option value='".sql($exibir[nome])."'>".sql($exibir[nome])."</option>";
		  }
		  ?>
		  </select></td>

<td><input type="text" class="form-control" name="proc" onKeyUp="go(resultado,buscar2)" onKeyPress="go(resultado,buscar2)" id="buscar2" placeholder="Prato, ingrediente, etc..." style="width:98%;padding:2.5%;height:20%;color:#A9A9A9;font-size:16px;"></td>
<td width="50">
<button name="go" style="padding:10%;" class="btn btn-lg btn-info" /><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Pesquisar</button>
</td>
</form>


	</td>
	</tr>
	</table>
	<div style="width:68%;max-width:80%;">
<div id="resultado">
<div class="page-header">
<h2><i class="fa fa-cutlery" aria-hidden="true"></i> Card&aacute;pio</h2>
</div>
<p class="lead">
<?php

if($entrega['entregas'] == 1) {
?>
visualize nosso card&aacute;pio e vire um apaixonado pelo sabor! :)</p>
<?php } else {
?>

<font color="#990000"><b>Ooops!</b><br> Desculpe, estamos fechado, volte outra hora ou consulte nossos preços.</font>

<?php }

	?>

</div>
</div>
	</td>
  </tr>
</table>
</form> 
      
<?php
echo $_POST['qws'];
if($_POST[qws]) {
echo $_GET[idq] = $_POST[id];
echo '<script>location.href="?page=cardapio&idq='.$_POST[id].'"</script>';

}
if($_POST[cancelar]) {
$mysqli->query("delete from dl_carrinho where ip='".$_SERVER['REMOTE_ADDR']."'");
?>
<script language= "JavaScript">
location.href="?page=cardapio"
</script>
<?php
}
?>

