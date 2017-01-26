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
			  $('#box-toggle > ul').hide();
			  
			  $('#box-toggle h2').click(function() {
				$(this).next().toggle('slow, 1000');
			  });
			});
		</script>
		<script type="text/javascript"> 
			$(document).ready(function() {
			  $('#box-toggle > #sub').hide();
			  
			  $('#box-toggle #h2').click(function() {
				$(this).next().toggle('slow, 1000');
			  });
			});
		</script>
		
    </head>
<body >
		
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
		
		
<!-- Start Header Section -->
<header class="main_menu_sec navbar navbar-default navbar-fixed-top">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-12">
				<div class="lft_hd" >
					<a href="index.php"><img src="img/<?=$emp[logo]?>" alt=""/> </a>
				</div>
				<div style="color:#fff;font-size:18px;margin-top:28px;"></div>
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
									<li><a class="page-scroll" href="index.php">Início</a></li> 
									<li><a class="page-scroll" href="cardapio.php">Cardápio</a></li>
									<li><a class="page-scroll" href="consulta.php">Consultar Pedido</a></li>
									<li><a class="page-scroll" href="#abt_sec">Info</a></li>
									<li><a class="page-scroll" href="#pr_sec">Promoções</a></li>
									<li><a class="page-scroll" href="#clt_sec">Avaliações</a></li>
									<li><a class="page-scroll" href="#ctn_sec">Fale Conosco</a></li>
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

<!-- start slider Section -->
<section id="slider_sec">
	<div class="container">
		<div class="row">
			<div class="slider">
					<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
				  <!-- Indicators -->
				  <ol class="carousel-indicators">
					<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
				  </ol>

				  <!-- Wrapper for slides -->
				  <div class="carousel-inner" role="listbox">
					<div class="item active">
						<div class="wrap_caption">
						  <div class="caption_carousel">
							<h1>#PartiuPizza</h1>
							<p>Vem pra PartiuPizza e curta nossos sabores!</p>
						  </div>						
						</div>
					</div>
                    <div class="item">
						<div class="wrap_caption">
						  <div class="caption_carousel">
							<h1>Baixe nosso App</h1>
							<a href="https://itunes.apple.com/br/app/partiupizza-app/id1183113557?mt=8" target="blank"><img src="img/applestore.png" width="110" height="110"></a> | <a href="https://play.google.com/store/apps/details?id=com.phonegap.PartiuPizza&hl=pt_BR" target="blank"><img src="img/playstore.png"  width="110" height="110"></a>
						  </div>						
						</div>
					</div>					
				  </div>

				  <!-- Controls -->
				  <a class="left left_crousel_btn" href="#carousel-example-generic" role="button" data-slide="prev">
					<i class="fa fa-angle-left"></i>
					<span class="sr-only">Previous</span>
				  </a>
				  <a class="right right_crousel_btn" href="#carousel-example-generic" role="button" data-slide="next">
					<i class="fa fa-angle-right"></i>
					<span class="sr-only">Next</span>
				  </a>
				</div>
			</div>	
		</div>			
	</div>	
</section>
<!-- End slider Section -->
<?php 
$up1 = $mysqli->query("select count(*) as mob from dl_pedidos where so = 1");
$mob = $up1->fetch_array();
$up2 = $mysqli->query("select count(*) as web from dl_pedidos where so = 0");
$web = $up2->fetch_array();
$up3 = $mysqli->query("select count(*) as tot from dl_pedidos");
$tot = $up3->fetch_array();
?>
<!-- start about Section -->
<section id="abt_sec">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs12 ">
				<div class="title_sec">
					<h1>Seja você também um louco por pizza!</h1>
				</div>
                				
			</div>		
						
		</div>
	</div>
</section>
<!-- End About Section -->

<!-- start Counting section -->
<section id="counting_sec">
<div class="container">
	<div class="row" style="margin-left:100px;">	

		<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
			<div class="counting_sl">
			<i class="fa fa-mobile"></i>
			<h2 class="counter"><?=$mob[mob]?></h2>
			<h4>Móvel</h4>	
			</div>
		</div>			
		<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
			<div class="counting_sl">
			<i class="fa fa-desktop"></i>
			<h2 class="counter"><?=$web[web]?></h2>
			<h4>Web</h4>	
			</div>
		</div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
			<div class="counting_sl">
			<i class="fa fa-globe"></i>
			<h2 class="counter"><?=$tot[tot]?></h2>
			<h4>Clientes felizes</h4>	
			</div>
		</div>		
												
	</div>					
</div>
</section>

<?php
$sel1 = $mysqli->query("select * from dl_produtos where promocao = 1");

?>



<!-- start our team Section -->
<section id="pr_sec">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs12 ">
				<div class="title_sec">
					<h1>Promoções</h1>
					<h2><p>Confira nossas promoções, tem sempre uma pizza que cabe na sua boca e no seu bolso.</p>Clique <a href="cardapio.php">aqui</a> para ver nosso cardápio.</h2>
				</div>			
			</div>		
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs12">
				<div class="all_team">
				   <?php while($promo = $sel1->fetch_array()){ ?>
					<div class="sngl_team">						
						<img src="img/produtos/<?=$promo[foto]?>" alt=""/>	
						<h3> <span><?=$promo[nome]?></span></h3><br>
						<p><?=$promo[descricao]?></p>	
                        <p><b>R$<?=$promo[preco_p]?>P</b> | <b>R$<?=$promo[preco_m]?>M</b> | <b>R$<?=$promo[preco_g]?>G</b></p>						
					</div>					
				   <?php } ?>													
				</div>			
			</div>
		</div>
	</div>
</section>
<!-- End our team Section -->




<!-- start Happy Client Section  -->
<section id="clt_sec">
	<div class="container">	
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs12 ">
				<div class="title_sec">
					<h1>Avaliações</h1>
					<h2>Veja o que nossos clientes falam sobre nós.</h2>
				</div>			
			</div>		
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs12">
				<div class="al_clt">						
					<center>
						<div id="fb-root"></div>
						<script>(function(d, s, id) {
						  var js, fjs = d.getElementsByTagName(s)[0];
						  if (d.getElementById(id)) return;
						  js = d.createElement(s); js.id = id;
						  js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.3&appId=1630999600456662";
						  fjs.parentNode.insertBefore(js, fjs);
						}(document, 'script', 'facebook-jssdk'));</script>
						<div class="fb-comments" data-href="http://<?=$emp[site];?>" data-width="900" data-numposts="100" data-colorscheme="light"></div>
						
						
					</center>
				</div>

						

									

				</div>
			</div>	
		</div>
	</div>
</section>
<!-- End Happy Client  Section -->

<!-- start contact us Section -->
<section id="ctn_sec">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs12 ">
				<div class="title_sec">
					<h1>Contato</h1>
					<h2>Mande uma mensagem ou ligue para gente.</h2>
				</div>			
			</div>		
			<div class="col-sm-6"> 
				<div id="cnt_form">
					<form id="contact-form" class="contact" name="contact-form" method="post" action="mail.php">
						<div class="form-group">
						<input type="text" name="nome" class="form-control name-field" required="required" placeholder="Nome">
						</div>
						<div class="form-group">
							<input type="email" name="email" class="form-control mail-field" required="required" placeholder="Email">
						</div> 
						<div class="form-group">
							<textarea name="msg" id="msg" required="required" class="form-control" rows="8" placeholder="Menssagem"></textarea>
						</div> 
						<div class="form-group">
							<button type="submit" class="btn btn-primary">Enviar</button>
						</div>
					</form> 
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6">
				<div class="cnt_info">
					<ul>
						<li><i class="fa fa-globe"></i><p><?=$emp[endereco2]?> | <?=$emp[endereco1]?></p></li>
						<li><i class="fa fa-envelope"></i><p><?=$emp[email]?></p></li>
						<li><i class="fa fa-phone"></i><p><?=$emp[fone1]?> | <?=$emp[fone2]?></p></li>
						<li>
							<div id="fb-root"></div>
							<script>(function(d, s, id) {
							  var js, fjs = d.getElementsByTagName(s)[0];
							  if (d.getElementById(id)) return;
							  js = d.createElement(s); js.id = id;
							  js.src = "//connect.facebook.net/pt_BR/all.js#xfbml=1";
							  fjs.parentNode.insertBefore(js, fjs);
							}(document, 'script', 'facebook-jssdk'));</script>
							<div id="likebox" class="fb-like-box" data-href="<?=$emp[facebook];?>" data-width="300" data-show-faces="true" data-stream="false" data-show-border="false" data-header="false"></div>
						</li>
					</ul>
				</div>
			</div>			
		</div>
	</div>
</section>
<!-- End contact us  Section -->

<!-- start located map Section -->
<section id="ltd_map_sec">
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<div class="map">						
			<h1>Onde estamos</h1><a href="#slidingDiv" class="show_hide" rel="#slidingDiv"><i class="fa fa-angle-up"></i></a>
			<div id="slidingDiv">
				<div class="map_area">
					<div id="googleMap" style="width:100%;height:300px;"></div>
				</div>
			</div>	
			</div>
		</div>
	</div>
</div>
</section>

<!-- End located map  Section -->
<!-- start footer Section -->
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
<!-- End footer Section -->

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
				center: new google.maps.LatLng(-3.7927738,-38.4774928)
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
		//easing: '',  // the animation effect you want. Remove this line if you dont want an effect and if you haven't included jQuery UI
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
