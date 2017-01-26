<?php

if (basename($_SERVER["REQUEST_URI"]) === basename(__FILE__))
{
	exit('<h1>ERROR 404</h1>Entre em contato conosco e envie detalhes.');
}
?>
<br /><br />
<div class="container marketing">



<div class="page-header">
<h2><i class="fa fa-envelope" aria-hidden="true"></i> Fale Conosco</h2>
</div>
<center><div style="float:left;margin:2% 4% 2% 2%;"><iframe src="<?=$map;?>" width="1024" height="250" frameborder="0" style="border:0"></iframe></div></center>
<div style="clear:both;"></div>

<div style="float:left;margin:2% 4% 2% 2%;width:50%;">
<form action="" method="post">
<input type="text" name="nome" id="cep" class="form-control" maxlength="8" placeholder="Seu nome..." required/><br />
<input type="text" name="email" class="form-control" placeholder="Seu email..." required /><br />
<textarea name="msg" class="form-control" placeholder="Mensagem..." cols="55" rows="5"></textarea><br />
<input type="submit" value="ENVIAR CONTATO" name="finalizar" style="width:100%;margin-bottom:1%;" class="btn btn-primary" />
</form>
</div>

N&oacute;s estamos muito interessados no que voc&ecirc; tem a dizer. Por isso, criamos este espaço especialmente para<br /> voc&ecirc; fazer seus coment&aacute;rios, dar sugest&otilde;es e esclarecer d&uacute;vidas. <br />Escreva pra gente! &Eacute; f&aacute;cil, r&aacute;pido e teremos o maior prazer em responder.
<br /><br />
<b>Endere&ccedil;o</b><br />
<?=$cfg[endereco];?><br />
<?=$cfg[endereco2];?><br />
<br />
<b>Telefones</b><br />
<?=$cfg[tel1];?><br />
<?=$cfg[tel2];?><br />
<br />
<b>Email</b><br />
<?=$cfg[email];?><br />
<br />


<?php
if($_POST[finalizar]) {
email($cfg[email],"Contato","".$_POST[msg]." <br><br>de ".$_POST[nome]." as ".date('d/m/Y H:i').".<br>
".$_POST[email]."",$cfg[empresa],$cfg[email]);
email($_POST[email],"Contato recebido","Seu contato foi recebido, logo responderemos.<br><br>de ".$_POST[nome]." as ".date('d/m/Y H:i').".<br>
".$_POST[email]."",$cfg[empresa],$cfg[email]);
echo '<br><div class="alert alert-info fade in"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true" style="margin-right:0.5%;"></span> Pronto, enviado, entraremos em contato. </div>';
}
?>
</div>


