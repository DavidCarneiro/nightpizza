<!doctype html>
<?php 
date_default_timezone_set('America/Sao_Paulo');
include("includes/conexao.php");
$sel = $mysqli->query("select * from dl_empresa");
$emp = $sel->fetch_array();
?>
<html class="no-js" lang="">
    <head>
	    <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title><?=$emp[nome]?> | <?=$emp[site]?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="apple-touch-icon.png">
	<!--[if lt IE 9]> <script src="js/html5shiv.js"></script> 
	<script src="js/respond.min.js"></script> <![endif]--> 		
        <!-- Place favicon.ico in the root directory -->
		<script src="js/jquery-2.1.1.min.js"></script>
		<link href='https://fonts.googleapis.com/css?family=Lato:400,300,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="css/nav-menu.css">
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/owl.carousel.css">
        <link rel="stylesheet" href="css/responsive.css">
        <link rel="stylesheet" href="css/style.css">
        <script type="text/javascript"> 
			$(document).ready(function() {
			  $('#box-toggle > ul').show();
			  
			  $('#box-toggle h2').click(function() {
				$(this).next().toggle('slow, 1000');
			  });
			  
			  $('#box-toggle > sub').show();
			  
			  $('#box-toggle .prod').click(function() {
				$(this).next().toggle('slow, 1000');
			  });
			});
		</script>
		<?php
		   include('includes/conexao.php');
		   if($_POST[cancelar]) {
				$mysqli->query("delete from dl_carrinho where ip='".$_SERVER['REMOTE_ADDR']."'");
		   }

		  if($_POST[finalizarq]) {
			  if($_POST[beb]){
				if($_POST[beb] == 1){
				  $beb = "Coca-Cola 1L";
				}
				if($_POST[beb] == 2){
				  $beb = "Fanta 1,5L";
				}
				if($_POST[beb] == 3){
				  $beb = "Kuat 1,5L";
				}
			  }

			// opcoes
			if($_POST[tam] == "Broto"){
				$preco = $_POST[priceb];
			}
			if($_POST[tam] == "Pequena"){
				$preco = $_POST[pricep];
			}
			if($_POST[tam] == "Média"){
				$preco = $_POST[pricem];
			}
			if($_POST[tam] == "Grande"){
				$preco = $_POST[priceg];
			}
			if(!$_POST[tam]){
				$preco = $_POST[priceg];
			}
			
			if(empty($_POST[opcao3])) {
			$sbs2 = 0;
			} else {
			$tmp = str_replace("/","",$_POST[opcao3]);
			//$tmp2 = str_replace("]","",$tmp);

			$pega_val = $mysqli->query("SELECT * FROM dl_produtos WHERE nome LIKE '".$tmp."'");
			$val = $pega_val->fetch_assoc();
			if($_POST[tam] == "Broto"){
				if($preco > $pega_val[preco_b]){
					$preco = $preco;
				}else{
					$preco = $val['preco_b'];
				}
				
			}
			if($_POST[tam] == "Pequena"){
				if($preco > $val[preco_p]){
					$preco = $preco;
				}else{
					$preco = $val['preco_p'];
				}
				
			}
			if($_POST[tam] == "Média"){
				if($preco > $val[preco_m]){
					$preco = $preco;
				}else{
					$preco = $val['preco_m'];
				}
			}
			if($_POST[tam] == "Grande"){
				if($preco > $val[preco_g]){
					$preco = $preco;
				}else{
					$preco = $val['preco_g'];
				}
			}
			if(!$_POST[tam]){
				if($preco > $val[preco_g]){
					$preco = $preco;
				}else{
					$preco = $val['preco_g'];
				}
			}

			//$preco = $preco/2;
			}
			if($_POST['opcao2']){
				$query = $mysqli->query("select * from dl_bordas where id = ".$_POST[opcao2]."");
				$brd = $query->fetch_array();
				$borda = '[Borda '.$brd[nome].']';
				$sbs1 = $brd[valor];
			}
			
			$pr0 = $preco + $sbs1;

			$prods = $_POST[name]." ".$_POST[obs1]." ".$_POST[opcao3]." ".$_POST[obs2]." ".$borda." ".$_POST[tam]." ".$_POST[beb];

			$mysqli->query("insert into dl_carrinho(produto,preco,categoria,ip) values('".$prods."','".$pr0."','".$_POST[category]."','".$_SERVER['REMOTE_ADDR']."')");

			printf(" %s.\n", $mysqli->error);

			?>
<!--
			<script type="text/javascript">
				  window.parent.location.href="cardapio.php";
			   </script>-->
			<?php
		}
		?>
		
    </head>
<body >
		 <!-- start preloader -->
        <div id="loader-wrapper">
            <div class="logo"></div>
            <div id="loader">
            </div>
        </div>
        <!-- end preloader -->
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
		
		
<!-- Início Header -->
<header class="main_menu_sec navbar navbar-default navbar-fixed-top">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-12">
				<div class="lft_hd">
					<a href="index.php"><img src="img/<?=$emp[logo]?>" alt=""/></a>
				</div>
			</div>			
			<div class="col-lg-9 col-md-9 col-sm-12">
				<div class="rgt_hd">					
					<div class="main_menu">
						<!--<nav id="nav_menu">
							<button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
							<span style="color:#fff;">MENU</span>
							</button>	
						<div id="navbar">
							<ul>
								<li><a class="page-scroll" href="index.php">Início</a></li> 
								<li><a class="page-scroll" href="cardapio.php">Cardápio</a></li>
								<li><a class="page-scroll" href="consulta.php">Consultar Pedido</a></li>
								<li><a class="page-scroll" href="#abt_sec">Info</a></li>
								<li><a class="page-scroll" href="#pr_sec">Promoções</a></li>
								<li><a class="page-scroll" href="#clt_sec">Avaliações</a></li>
								<li><a class="page-scroll" href="#ctn_sec">Fale Conosco</a></li>
							</ul>
						</div>		
						</nav>	-->
                        <nav class="nav nav-aberta">
							<div class="wrap">
								<ul class="listaNav">
									<li><a href="index.php">Início</a></li> 
									<li><a href="cardapio.php">Cardápio</a></li>
									<li><a href="consulta.php">Consultar Pedido</a></li>
									<li><a href="index.php#abt_sec">Info</a></li>
									<li><a href="index.php#pr_sec">Promoções</a></li>
									<li><a href="index.php#clt_sec">Avaliações</a></li>
									<li><a href="index.php#ctn_sec">Fale Conosco</a></li>
								</ul>
							</div>
						</nav>						
						
					</div>					
						
				</div>
			</div>	
		</div>	
	</div>	
</header>
<!-- Fim Header -->

<!-- Início Cardápio -->
<section id="abt_sec">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs12 ">
				<div class="title_sec">
					<h1></h1>
				</div>
				<div class="title_sec">
					<h1>CARDÁPIO</h1>
				</div>
                				
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs12 ">
				<div style="width:100%;height:40%;background-color:#FFFFFF;border:thin solid #D6D6D6;padding:1%;margin-bottom:2%;">

					<?php
					include("includes/conexao.php");
					$cons = $mysqli->query("select * from dl_entregas");
					$entrega = $cons->fetch_array();
					if($entrega['entregas'] == 1) {
						echo '<span style="color:#000;"><img src="img/aberto.png" title="Loja aberta" width="15" heght="15"> Aberto <font style="color:#999;font-size:14px;"> (Fecha às '.$emp[fech].' horas)</font></span>';
					} else {
						echo '<h2 style="color:#000;"><img src="img/fechado.png" title="Loja fechada" width="15" heght="15"> Fechada <font style="color:#999;font-size:14px;">(Abrirá às '.$emp[aber].' horas)</font></h2>';
					}
					?> <?php echo $emp[dias];?> das <?php echo $emp[aber];?>:00 &agrave;s <?php echo $emp[fech];?>:00.
					<h1>Na PartiuPizza você tem a certeza de que tudo é feito com o que há de melhor!</h1>
					<span class="glyphicon glyphicon-time" aria-hidden="true" style="margin-right:0.5%;height:5%;color:#BFBFC0;" ></span>  <?php echo $emp[tempo];?> 
					<span class="glyphicon glyphicon-thumbs-up" aria-hidden="true" style="margin-right:0.5%;height:5%;margin-left:2%;color:#BFBFC0;"></span>  <?php
					$pegar_xss = $mysqli->query("select * from dl_pedidos");
					$pegar_xssw = $pegar_xss->num_rows;
					echo $pegar_xssw;
					?>
					<div style="clear:both;"></div>
				</div>	
			</div>			
			<div class="col-lg-8 col-md-8 col-sm-8 ">
		



<form action="" method="post"> 

    

    <div id="box-toggle">
	 
    <?php $sel = $mysqli->query("select * from dl_categorias");
	 while($cat = $sel->fetch_array()){
       $sele = $mysqli->query("select * from dl_produtos where categoria = '".$cat[nome]."'");	   ?>
		 <div class="tgl">
		   <h2 id="toogle" style="cursor:pointer;"><?=$cat[nome]?></h2>
		   <ul class="classe" style="display:none;"> 
		     <?php while($prod = $sele->fetch_array()){?>
		     <li class="prod"  style="width:100%;">
			    <?php
				
				echo ' <img src="img/produtos/'.$prod[foto].'" width="80" height="80" style="float:left;">';
				echo ' <p>'.$prod[nome].'</p>';
				echo ' <p style="font-size:12px"><i>'.$prod[descricao].'<img src="img/+.png" style="float:right; margin:5px" width="30" heigth="30"></i></p>';
				echo ' <b style="font-size:16px">R$'.$prod[preco_b].' Broto R$'.$prod[preco_p].' Pequena  R$'.$prod[preco_m].' Média  R$'.$prod[preco_g].' Grande</b>';
		  ?></li>
		      
		      <div id="sub" style="display:none;">
			  <form action="" method="post" id="<?=$prod[id]?>" name="form<?=$prod[id]?>">
			  <?php if($prod[opcao1]){ ?>
			  <b>Selecione o Tamanho</b><br>
			  <select name="tam" id="tam<?=$prod[id]?>" onchange="muda('tam<?=$prod[id]?>','ctrl<?=$prod[id]?>');">
			    <option value="">Tamanho</option>
				<option value="Broto">Broto</option>
				<option value="Pequena">Pequena</option>
				<option value="Média">Média</option>
				<option value="Grande">Grande</option>
			  </select>
				<br><br>
				
				<?php } 
			  if($prod[opcao5]){ ?>
			  <div id="ctrl<?=$prod[id]?>" style="display:none;">
				<b>Selecione a Bebida</b><br>
				
					<input type="radio" name="beb" value="Coca-Cola 1L"> Coca-Cola 1L
					<input type="radio" name="beb" value="Fanta 1,5L"> Fanta 1,5L
					<input type="radio" name="beb" value="Kuat 1,5L"> Kuat 1,5L 
				</div>
				<script>
						function muda(el,div){
							var tam = document.getElementById(el).value;
							//alert(tam);
							if(tam == "Grande"){
								document.getElementById(div).style.display = 'block';
							}else{
								document.getElementById(div).style.display = 'none';
							}
						}
				</script>
				<?php }?>				
				<br>
			  <?php  
			  if($prod[opcao2]){ ?>
				<b>Selecione a Borda</b><br>
				<?php 
				$i = 1;
				$cons = $mysqli->query("select * from dl_bordas order by nome asc");
				while($cat = $cons->fetch_array()){
				 if($i % 3 == 0){?>
					<input type="radio" name="opcao2" value="<?=$cat[id]?>"> <?=$cat[nome]?> (R$<?=$cat[valor]?>)<br> <?php
				 }else{ ?>
					 <input type="radio" name="opcao2" value="<?=$cat[id]?>"> <?=$cat[nome]?> (R$<?=$cat[valor]?>) <?php
				 }
				 $i++;
				}?>				
				<br><br>
				<?php } 
			  if($prod[opcao3]){ ?>
				<?php 
				  $cons = $mysqli->query("SELECT * FROM dl_produtos WHERE categoria LIKE '%pizza%'");
				  //$afez = $afez2->fetch_assoc();?>
				  <b>Selecione a Metade</b><br>
				  <select name="opcao3" id="opcao3">
				  <option selected="selected" disabled="disabled">--- Metade de Outro Sabor ---</option>
				 <?php while($valores = $cons->fetch_assoc()){ ?>
					<option value="/<?=$valores['nome']?>"><?=$valores['nome']?></option>
				<?php }	?>
				</select>
				<br><br>
				<?php } 
			  if($prod[opcao4]){ ?>
				<input type="text" name="obs1" id="obs1" style="width:100%;" placeholder="Observação <?=$prod[nome]?> Ex: sem cebola, sem milho...." ><br><br>
				<?php } 
			  if($prod[opcao5]){ ?>
				<input type="text" name="obs2" id="obs2" style="width:100%;" placeholder="Observação  Ex: sem cebola, sem milho...." ><br><br>
				<?php }  ?>
				<?php $cons = $mysqli->query("select * from dl_entregas");
				$entrega = $cons->fetch_array();
				if($entrega['entregas'] == 1) {?>
				<input type="submit" value="ESCOLHER" name="finalizarq" class="btn btn-primary" onClick="document.forms.form<?=$prod[id]?>'].submit();"/><br />
				<?php }else{ ?>
				<h1>Desculpe estamos fechados!</h1>
				<?php }
				  echo "
					<input type='hidden' name='priceb' value='".$prod[preco_b]."'>
					<input type='hidden' name='pricep' value='".$prod[preco_p]."'>
					<input type='hidden' name='pricem' value='".$prod[preco_m]."'>
					<input type='hidden' name='priceg' value='".$prod[preco_g]."'>
					<input type='hidden' name='name' value='".$prod[nome]."'>
					<input type='hidden' name='category' value='".$prod[categoria]."'>";
				?>
				</form>
			  </div>
			<br>
			 <?php } 
			 
			 ?>
		   </ul>
		   <head>
		   
		</head> 
		 </div>
	 <?php }?>

	</div>
    
	
		
			</div>	
            <div class="col-lg-4 col-md-4 col-sm-4">
				<div class="sidebar">
				  <div style="width:100%;height:auto;float:right;border:thin solid #EAEAEA;">
	<div style="background-color:#F2F3F3;"><img src="img/car.png" width="100%" /></div>
	
	<br>
	<?php
		  $pegar_car = $mysqli->query("select * from dl_carrinho where ip='".$_SERVER['REMOTE_ADDR']."'");
		  $pegar_ca = $pegar_car->num_rows;
		  if($pegar_ca == 0) { echo '<center><img src="img/img_carrinho_vazio.png" width="20%" height="20%" />
	      <h4>Carrinho vazio</h4>Que tal achar uma coisa gostosa<br /> para comer?</center>'; }
		  while($exibir = $pegar_car->fetch_assoc()) {
		  echo "<form action='' method='post'>
		  <input type='hidden' name='id' value='".($exibir[id])."'>
		  <input type='hidden' name='produto' value='".($exibir[produto])."'>
		  
		  
		  <div style=margin:5%;><a href='cardapio.php?botao=dell&prod=".$exibir[produto]."'><img src='img/x.png' width='15' height='15'></a> ".($exibir[produto])." <div style='float:right;'><b>R$ ".number_format($exibir[preco],2,",",".")."</b></div></div><div style='clear:both;'></div></form>";
		  }
		  ?>
			<?php
			if($_GET[botao] == 'dell') {
			$mysqli->query("DELETE FROM dl_carrinho WHERE ip='".$_SERVER['REMOTE_ADDR']."' and produto='".$_GET[prod]."'");
			echo '<script>location.href="cardapio.php"</script>';
			}
			?>	  
			<head>
			<script language="javascript">
			 function changeImage(element) {
				 element.src = element.bln ? "img/car2.png" : "img/car22.png";
				 element.bln = !element.bln; 
			 }
			</script>
			</head>
				<div id="afs"></div><br>
				<hr style="padding:0;margin:0;">
				<hr style="padding:0;margin-top:0;">
				<div style="margin:5%;width:90%;font-size:12px;color:#000;"><div style="clear:both;"></div>
				Pedido Mínimo <div style="float:right;">R$ <?=$cfg[minimo];?></div><br>
				</div>
				<hr>
				<div style="margin:5%;width:90%;font-size:16px;">Sub-Total do Pedido <div style="font-size:20px;float:right;color:#009900;font-weight:bold;">R$ 
				<?php
			$sql = $mysqli->query("SELECT SUM(preco) from dl_carrinho where ip='".$_SERVER['REMOTE_ADDR']."'");

			while ($exibir = $sql->fetch_array()){
			if($exibir['SUM(preco)'] == 0) { $exibir['SUM(preco)'] = "0,00"; } else { $exibir['SUM(preco)'] = $exibir['SUM(preco)']; }
			echo number_format($exibir['SUM(preco)'],2,",",".");;
			}
			?><br>
				</div>
			</div>
				<?php

				if($entrega['entregas'] == 1){
					?>
					<a href="fechar.php" class="btn btn-success" style="width:90%;margin:5% 5% 1% 5%;"><h4 style="font-weight:bold;">Fechar Pedido</h4></a>
					<input type="submit" value="Cancelar" name="cancelar" class="btn btn-danger" style="width:90%;margin:1% 5% 5% 5%;" /><br>
					<?php
				}else{
				?>
				   <center><h1>Desculpe, estamos fechados!</h1></center>
				<?php } ?>
				<center>Pague na entrega com dinheiro <br><b>OU</b><br>(Crédito/Débito)<br><b>Visa Master Elo</b><br>(Crédito)</br><b>American Dinners Hipercard
				</div></center>
                </div>
            </div>				
		</div>
	</div>
</section>
<!-- Fim Cardápio -->




<!-- Início footer  -->
<footer id="ft_sec">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				
					<ul class="copy_right">
						<li>www.hussolucoes.com</li>
						<li>Desenvolvido por Hus Soluções</li>
						<li><a href="admin.php" target="bçank">área adiministrativa</a></li>
					</ul>					
			</div>	
		</div>
	</div>
</footer>
<!-- Fim footer -->

<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
        <script src="js/vendor/jquery-1.11.2.min.js"></script>
<script src="js/nav-menu.js"></script>
<script src="js/isotope.pkgd.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/appear.js"></script>
<script src="js/jquery.counterup.min.js"></script>
<script src="js/waypoints.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/showHide.js"></script>
<script src="js/jquery.nicescroll.min.js"></script>
<script src="js/jquery.easing.min.js"></script>
<script src="js/scrolling-nav.js"></script>
<script src="js/plugins.js"></script>

<!-- Google Map js -->
        <script src="https://maps.googleapis.com/maps/api/js"></script>
		<script>
			function initialize() {
			  var mapOptions = {
				zoom: 14,
				scrollwheel: false,
				center: new google.maps.LatLng(41.092586000000000000, -75.592688599999970000)
			  };
			  var map = new google.maps.Map(document.getElementById('googleMap'),
				  mapOptions);
			  var marker = new google.maps.Marker({
				position: map.getCenter(),
				animation:google.maps.Animation.BOUNCE,
				icon: 'img/map-marker.png',
				map: map
			  });
			}
			google.maps.event.addDomListener(window, 'load', initialize);
		</script>
<script src="js/main.js"></script>

<script src="showHide.js" type="text/javascript"></script>

<script type="text/javascript">

$(document).ready(function(){


   $('.show_hide').showHide({			 
		speed: 1000,  // speed you want the toggle to happen	
		easing: '',  // the animation effect you want. Remove this line if you dont want an effect and if you haven't included jQuery UI
		changeText: 1, // if you dont want the button text to change, set this to 0
		showText: 'View',// the button text to show when a div is closed
		hideText: 'Close' // the button text to show when a div is open
					 
	}); 


});

</script>
<script>
    jQuery(document).ready(function( $ ) {
        $('.counter').counterUp({
            delay: 10,
            time: 1000
        });
    });
</script>

<script>

  //Hide Overflow of Body on DOM Ready //
$(document).ready(function(){
    $("body").css("overflow", "hidden");
});

// Show Overflow of Body when Everything has Loaded 
$(window).load(function(){
    $("body").css("overflow", "visible");        
    var nice=$('html').niceScroll({
	cursorborder:"5",
	cursorcolor:"#00AFF0",
	cursorwidth:"3px",
	boxzoom:true, 
	autohidemode:true
	});

});
</script>



    </body>
</html>
