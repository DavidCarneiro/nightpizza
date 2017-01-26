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
	<form method="post" action="">	
		<div class="row">
			<div class="title_sec">
				<h1>Fechar Pedido</h1>
				<!--<h2>WE’RE BRANDING & DIGITAL STUDIO FROM VIET NAM</h2>-->
			</div>		
			<div class="col-lg-8 col-md-8 col-sm-8 ">
				
				

				<div id="cnt_form">
					<div class="status alert alert-success" style="display: none"></div>
						
						        <div class="control-group">
								    <span style="font-size:20px;font-style:bold">Tipo de Entrega</span><br>
									<input type="radio" name="tentrega" value="Entrega" checked id="show"> Entrega 
									<input type="radio" name="tentrega" value="Retirada na loja" id="hide"> Retirada na loja
								</div>
								<div class="form-group">
									<input type="text" name="nome" id="nome" class="form-control name-field" required="required" placeholder="Nome">
								</div>
								<div class="form-group">
									<input type="email" name="email" id="email" class="form-control mail-field" required="required" placeholder="Email">
								</div> 
								<div class="form-group">
									<input type="text" name="tel" id="tel" class="form-control name-field" required="required" placeholder="Telefone">
								</div>
								<div id="ctrl">
									<div class="form-group">
										<input type="text" name="cep" id="cep" class="form-control name-field"  placeholder="Cep">
									</div>
									<div class="form-group">
										<input type="text" name="numero" id="numero" class="form-control name-field"  placeholder="Número da Casa">
									</div>
									<div class="form-group">
										<input type="text" name="rua" id="rua" class="form-control name-field"  placeholder="Rua">
									</div>
									<div class="form-group">
										<input type="text" name="bairro" id="bairro" class="form-control name-field"  placeholder="Bairro">
									</div>
								</div>
								<div class="form-group">
									<input type="text" name="obs" class="form-control name-field"  placeholder="Observação Ex: Próx. a praça...">
								</div>
								<div> 
								    <span style="font-size:20px;font-style:bold">Pagamento</span><br>
									<input type="radio" name="pagamento" value="Dinheiro"  placeholder="Your Name" id="din"> Dinheiro 
									<input type="radio" name="pagamento" value="Cartão"  checked="checked" placeholder="Your Name" id="car"> Cartão<br>
									
								</div>
								<div class="form-group">
									<input type="text" name="troco" id="troco" class="form-control name-field" placeholder="Troco para" style="display:none;">
								</div>
								
								<div class="form-group">
									<input type="submit" class="btn btn-primary" name="fechar" value="Fechar"> <button type="submit" class="btn btn-primary">Voltar ao Cardápio</button>
								</div>
						
					</div>
                 
			</div>	
			
            <div class="col-lg-4 col-md-4 col-sm-4">
				<div class="sidebar">						
									
					<div class="widget">
						<h2>Itens</h2>
						<div class="title_br"></div>
						<ul>
						    <?php 
							  $sel = $mysqli->query("select * from dl_carrinho where ip='".$_SERVER['REMOTE_ADDR']."'");
							  while($carr = $sel->fetch_array()){
							?>
							<li><?=$carr[produto]?> <b>R$<?=$carr[preco]?></b></li>
							  <?php 
							    $total += $carr[preco];
							  } ?>
						</ul>
						<input type="hidden" name="valor" id="valor" value="<?=$total?>">
						<input type="hidden" name="tax" id="tax" value="">
						<b style="font-size:18px"><span>Total</span><span style="float:right">R$<?=$total?></span></b><br>
						<b style="font-size:18px"><span>Taxa de Entrega</span><span style="float:right" id="taxa"></span></b><br>
						<b style="font-size:18px"><span>Total+Taxa</span><span style="float:right" id="ttaxa"></span></b>
					</div>				
											
				</div>
			</div>			
			
			
		</div>
	</form>
	</div>
</section>
<!-- start Blog Section -->

<?php
		  
		  
		  if($_POST[fechar]){
			  //echo $_POST[nome] . ($_POST[email]) . ($_POST[tel]) . $_POST[numero];
			if($_POST[pagamento] == "Dinheiro") {
				$qrws = "Troco para <b>R$ " . $_POST[troco] . "</b>";
			} else {
				$qrws = "Cart&atilde;o de Cr&eacute;dito";
			}
			$qr = $_POST[valor] + $_POST[tax];
			//echo "<script>alert('Desculpe, o valor mínimo para entregas é de R$ ".$qr.".');</script>";
			if(!$_POST[tentrega]){
				echo "<script>alert('Marque o Tipo de entrega');</script>";
			}
			else {
				if($_POST[tentrega] == "Entrega" && (!($_POST[nome]) || !($_POST[email]) || !($_POST[tel]) || !($_POST[numero]))){
					echo "<script>alert('Desculpe, existem campos em branco.');</script>";
				}elseif($_POST[entrega] == "Retirada na loja" && (!($_POST[nome]) || !($_POST[email]) || !($_POST[tel]))){
					echo "<script>alert('Desculpe, existem campos em branco.');</script>";
				} elseif($emp[minimo] > $qr) {
					echo "<script>alert('Desculpe, o valor mínimo para entregas é de R$ ".$emp[minimo].".');</script>";
				} else {
					if($_POST[tentrega]=="Entrega"){
						$cep = $_POST[cep];
						$rua = $_POST[rua];
						$numero = $_POST[numero];
						$bairro = $_POST[bairro];
						$entrega = "Entrega";
					}else{
						$cep = "-";
						$rua = "-";
						$numero = 0;
						$bairro = "-";
						$entrega = "Retirada na loja";
					}
					$ps = $mysqli->query("select * from dl_carrinho where ip='".$_SERVER['REMOTE_ADDR']."'");
					while($new_d = $ps->fetch_assoc()){
						$prd = $new_d[produto]." ";
					}
					
					$inserir = $mysqli->query("insert into dl_pedidos(valor,data,descricao,email,nome,rua,numero,cep,bairro,fone,pag,obs,so,tipo) values('".$qr."','".date('Y-m-d')."',
								  '".$prd."','".$_POST[email]."','".$_POST[nome]."','".$rua."',".$numero.",'".$cep."','".$bairro."','".$_POST[tel]."','".$_POST[pagamento].", ".$qrws."','".$_POST[obs]."',0,'".$entrega."')");
					if($inserir){
						$mysqli->query("delete from dl_carrinho where ip='".$_SERVER['REMOTE_ADDR']."'");
						$chegar = $mysqli->query("select * from dl_pedidos order by id desc");
						$chegar2 = $chegar->fetch_assoc();
						$sender = "naoresponda@sobralpizzadelivery.com.br";
						$namesender = $emp[nome];
						$assunto = "Pedido Realizado";
						$mensagem = "O seu novo pedido <b>#".$chegar2[id]."</b> foi realizado, aguarde instruções.<br><a href='".$emp[site]."/pedido.php?id=".$chegar2[id]."'>http://".$emp[site]."/pedido.php&id=".$chegar2[id]."</a>";

						$headers = "MIME-version: 1.1\n";
						$headers .= "Content-type: text/html; charset=iso-8859-1\n";

						mail($_POST[email],$assunto,$mensagem,$headers,"-r".$sender);
						echo '<script>location.href="pedido.php?id='.$chegar2[id].'";</script>';
					}else{echo '<script>alert("Problemas ao inserir pedido, contate o administrador!");</script>';}
					//printf("Error - SQLSTATE %s.\n", $mysqli->error);
					
					
				}
			}
			
			  
		  }
		?>

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
<script type="text/javascript" >

    $(document).ready(function(){
               $("#numero").blur(function(){
                        $("#rua").val("...")
                $("#bairro").val("...")
				$("#xd").val("Procurando seu endereço...")
            $("#cidade").val("...")
                $("#uf").val("...")
        
        var consulta = $("#cep").val();
                $.getJSON("http://viacep.com.br/ws/"+consulta+"/json/?callback=?", function(dados){
                        
                       
						//alert(dados.logradouro);

                        $("#rua").val(dados.logradouro);
                        $("#bairro").val(dados.bairro);
                        $("#cidade").val(dados.localidade);
                        $("#uf").val(dados.uf);
                        
							var bairro = dados.bairro;
							//alert(bairro);
                $.post('http://zoesolucoes.tempsite.ws/webservice/pega_taxa.php',{bairro:bairro},function(data){
							// resto do código
							//alert('entrou');
							if(data != ""){
							   $("#taxa").html('R$'+data);
							   var t = Number($("#valor").val());
							   //alert(t);
							   var val = Number(data);
							   var soma = t+val;
							   soma = soma.toFixed(2);
							   //alert("R$"+soma);
							   $("#tax").val(data);
							   $("#ttaxa").html('R$'+soma);
							}else{
							   alert("Desculpe, ainda não entregamos nesse endereço.");
							   window.location.href = "cardapio.php";
							}
							
						});
                        });
                });
        });

</script>


    </body>
</html>
