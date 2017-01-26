<?php

if (basename($_SERVER["REQUEST_URI"]) === basename(__FILE__))
{
	exit('<h1>ERROR 404</h1>Entre em contato conosco e envie detalhes.');
}
?>
<br /><br />
<div class="container marketing">



<div class="page-header">
<h2><i class="fa fa-commenting-o" aria-hidden="true"></i> Avaliações/Comentários</h2>
</div>
<p class="lead">Avaliações e comentários de nossos clientes.</p>
<center>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.3&appId=1630999600456662";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="fb-comments" data-href="http://<?=$cfg[site];?>" data-width="900" data-numposts="100" data-colorscheme="light"></div></center>
</div>