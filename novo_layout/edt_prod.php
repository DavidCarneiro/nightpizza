<!doctype html>
<?php 
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
		<link rel="stylesheet" href="css/nav-menu.css">
		<link href='https://fonts.googleapis.com/css?family=Lato:400,300,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/owl.carousel.css">
        <link rel="stylesheet" href="css/responsive.css">
        <link rel="stylesheet" href="css/style.css">
        
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
		
<!-- Start Header Section -->
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
<!-- End Header Section -->

<!-- start blog Section -->
<section id="blg_sec">
	<div class="container">
		<div class="row">
		<?php  
		    session_start();
			if(!isset($_SESSION[usuario])){
				echo "<script>location.href='admin.php';</script>";
			}else{ 
			 
		  
		  if($_POST[atualizar]) {
			
			if(isset($_FILES['fileUpload'])){
				$ext = strtolower(substr($_FILES['fileUpload']['name'],-4));
				if($ext != ""){
					$new_name = md5(@date('dmYHis')) . $ext; 
					$dir = 'css/produtos/'; 
					move_uploaded_file($_FILES['fileUpload']['tmp_name'], $dir.$new_name);
					$mysqli -> query ("update dl_produtos set nome='".$_POST[nome]."',descricao='".$_POST[descricao]."', foto = '".$new_name."',  preco_p='".str_replace(",",".", $_POST[preco_p])."', preco_m='".str_replace(",",".", $_POST[preco_m])."', preco_g='".str_replace(",",".", $_POST[preco_g])."',categoria='".$_POST[categoria]."',promocao='".$_POST[promocao]."',opcao1='".$_POST[opcao1]."',opcao2='".$_POST[opcao2]."',opcao3='".$_POST[opcao3]."',opcao4='".$_POST[opcao4]."',opcao5='".$_POST[opcao5]."' where id='".$_GET[id]."'");
				}else{
					$up = $mysqli -> query ("update dl_produtos set nome='".$_POST[nome]."',descricao='".$_POST[descricao]."', preco_p='".str_replace(",",".", $_POST[preco_p])."', preco_m='".str_replace(",",".", $_POST[preco_m])."', preco_g='".str_replace(",",".", $_POST[preco_g])."',categoria='".$_POST[categoria]."',promocao='".$_POST[promocao]."',opcao1='".$_POST[opcao1]."',opcao2='".$_POST[opcao2]."',opcao3='".$_POST[opcao3]."',opcao4='".$_POST[opcao4]."',opcao5='".$_POST[opcao5]."' where id='".$_GET[id]."'");
					if($up){
						echo '<script>alert("Produto atualizado!");</script>';
						
					}
					else{
						echo '<script>alert("Produto não atualizado!");</script>';
					}
				}
				
			}
			else{
				$up = $mysqli -> query ("update dl_produtos set nome='".$_POST[nome]."',descricao='".$_POST[descricao]."', preco_b='".str_replace(",",".", $_POST[preco_b])."', preco_p='".str_replace(",",".", $_POST[preco_p])."', preco_m='".str_replace(",",".", $_POST[preco_m])."', preco_g='".str_replace(",",".", $_POST[preco_g])."',categoria='".$_POST[categoria]."',promocao='".$_POST[promocao]."',opcao1='".$_POST[opcao1]."',opcao2='".$_POST[opcao2]."',opcao3='".$_POST[opcao3]."',opcao4='".$_POST[opcao4]."',opcao5='".$_POST[opcao5]."' where id='".$_GET[id]."'");
				if($up){
						echo '<script>alert("Produto atualizado!");</script>';
					}
					else{
						echo '<script>alert("Produto não atualizado!");</script>';
					}
			}
		  }
		  $sel = $mysqli->query("select * from dl_produtos where id =".$_GET[id]."");
		  $prod = $sel->fetch_array();
			
			?>
			
			
				<div class="title_sec">
					<h1>Área admnistrativa</h1>
					<h2>edite seus produtos</h2>
				</div>
				<section id="protfolio_sec">
					<div class="col-lg-12">
					  <div class="linkmenu">
						  <a href="admin.php"><i class="fa fa-home" aria-hidden="true"></i>Início</a>  &nbsp;&nbsp;|&nbsp;&nbsp;  
						  <a href="categorias.php"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Categorias</a>  &nbsp;&nbsp;|&nbsp;&nbsp;  
						  <a href="produtos.php" id="active"><i class="fa fa-bars" aria-hidden="true"></i>Produtos</a>  &nbsp;&nbsp;|&nbsp;&nbsp; 
						  <a href="bordas.php"><i class="fa fa-sun-o" aria-hidden="true"></i>Bordas</a>  &nbsp;&nbsp;|&nbsp;&nbsp; 
						  <a href="config.php"><i class="fa fa-gear" aria-hidden="true"></i>Configurações</a>  &nbsp;&nbsp;|&nbsp; &nbsp; 
						  <a href="enderecos.php"><i class="fa fa-map-marker"></i>Endereços</a>  &nbsp;&nbsp;|&nbsp;&nbsp;  
						  <a href="entregas.php"><i class="fa fa-motorcycle" aria-hidden="true"></i>Entregas</a>  &nbsp;&nbsp;|&nbsp;&nbsp;  
						  <a href="demonstrativo.php"><i class="fa fa-bar-chart" aria-hidden="true"></i> Demonstrativo</a>  &nbsp;&nbsp;|&nbsp;&nbsp;  
						  <a href="out.php"><i class="fa fa-reply" aria-hidden="true"></i>Sair</a>
					  </div>
					</div>
				</section>
				<br>
					<div class="col-lg-12" >
						<div id="cnt_form">
							<form id="contact-form" class="contact" method="post" action="">
								<div class="form-group">
								<input type="text" name="nome" class="form-control name-field" value="<?=$prod[nome]?>" required="required" placeholder="Nome">
								</div>
								<div class="form-group">
									<input name="descricao" class="form-control" type="text" placeholder="Descrição..." value="<?=$prod[descricao]?>" required><br />
								</div>
								<div class="form-group">
									<input name="preco_p" class="form-control" type="text" placeholder="Preço P..." value="<?=number_format($prod[preco_p],2,',','.')?>" required><br />
								</div>
								<div class="form-group">
									<input name="preco_m" class="form-control" type="text" placeholder="Preço M..." value="<?=number_format($prod[preco_m],2,',','.')?>" required><br />
								</div>
								<div class="form-group">
									<input name="preco_g" class="form-control" type="text" placeholder="Preço G..." value="<?=number_format($prod[preco_g],2,',','.')?>" required><br />
								</div>
								<div class="form-group">
									<?php
									echo '<select name="categoria" class="form-control" style="width:80%;">
									      <option value="'.$prod[categoria].'">'.$prod[categoria].'</option>';
									$mostrar = $mysqli->query("select * from dl_categorias order by id desc");
									while($exibir = $mostrar->fetch_assoc())  {
									echo '<option value="'.($exibir[nome]).'">'.($exibir[nome]).'</option>';
									}
									echo '</select>';
									?>
								</div>
									<?php if($prod[promocao] == 0){?>							
									<input type="radio" name="promo" value="0" checked="checked" required> Sem Promoção | 
									<input type="radio" name="promo" value="1" required> Com Promoção<br/>
									<?php }?>
									<?php if($prod[promocao] == 1){?>							
									<input type="radio" name="promo" value="0" required> Sem Promoção | 
									<input type="radio" name="promo" value="1" checked="checked" required> Com Promoção<br/>
									<?php }?>
								<h3>Foto</h3>	
								<div class="form-group">
									<input type="file" name="fileUpload" width="10"><br />
								</div>
								<input name="opcao1" type="checkbox" value="1" <?php if($prod[opcao1] == 1) { echo 'checked="checked"'; } ?> /> Tamanho
								<input name="opcao2" type="checkbox" value="1" <?php if($prod[opcao2] == 1) { echo 'checked="checked"'; } ?> /> Borda 
								<input name="opcao3" type="checkbox" value="1" <?php if($prod[opcao3] == 1) { echo 'checked="checked"'; } ?> /> Metade 
								<input name="opcao4" type="checkbox" value="1" <?php if($prod[opcao4] == 1) { echo 'checked="checked"'; } ?> /> Obs1. 
								<input name="opcao5" type="checkbox" value="1" <?php if($prod[opcao5] == 1) { echo 'checked="checked"'; } ?> /> Obs2. 
								<div class="form-group">
									<input type="submit" name="atualizar" class="btn btn-primary" value="Atualizar">
								</div>
								
							</form> 
						</div>				
					</div>
			
		</div>
			
			<?php } ?>
		</div>
	</div>
</section>

<!-- start Blog Section -->

<!-- start footer Section -->
<footer id="ft_sec">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				
					<ul class="copy_right">
						<li>www.hussolucoes.com</li>
						<li>Desenvolvido por Hus Soluções</li>
					</ul>					
			</div>	
		</div>
	</div>
</footer>
<!-- End footer Section -->

<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
        <script src="js/vendor/jquery-1.11.2.min.js"></script>
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
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
		<script>
			$(document).ready(function(){
				$('#din').click(function(){
					$('#troco').show();
				});
				$('#car').click(function(){
					$('#troco').hide();
				});
				$('#hide').click(function(){
					$('#ctrl').hide();
				});
				$('#show').click(function(){
					$('#ctrl').show();
				});
			});
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
<script>
var aud = document.getElementById("myAudio");
    aud.autoplay = true;
    aud.load();

</script>

    </body>
</html>
