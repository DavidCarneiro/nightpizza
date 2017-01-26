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
        <li role="presentation" class="active"><a href="?page=adm"><i class="fa fa-home" aria-hidden="true"></i> In&iacute;cio</a></li>
        <li role="presentation"><a href="?page=adm_categorias"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Categorias</a></li>
        <li role="presentation"><a href="?page=adm_produtos"><i class="fa fa-bars" aria-hidden="true"></i> Produtos</a></li>
		<li role="presentation"><a href="?page=adm_entregas"><i class="fa fa-motorcycle" aria-hidden="true"></i> Entregas</a></li>
		<li role="presentation"><a href="?page=sair"><i class="fa fa-reply" aria-hidden="true"></i> Sair</a></li>
      </ul><br />

<h1 class="page-header"><i class="fa fa-lightbulb-o" aria-hidden="true"></i> Configurações Global</h1>
<p class="lead">Para escolher opções dos produtos e pagamentos online configure o arquivo <b>"pages/configuração.php".</b></p>
<br />
<div style="width:40%;">







<form action="" method="post" enctype="multipart/form-data">
<h2>Banco de Dados</h2>
<label>Servidor</label>
<input name="servidor" class="form-control" type="text" value="<?=$cfg[servidor];?>" required><br />

<label>Usuário</label>
<input name="login" class="form-control" type="text" value="<?=$cfg[login];?>" required><br />

<label>Senha</label>
<input name="senha" class="form-control" type="text" value="<?=$cfg[senha];?>"><br />

<label>Database</label>
<input name="database" class="form-control" type="text" value="<?=$cfg[database];?>" placeholder="Você precisa criar sua database no mysql." required><br />

<hr />

<h3>Empresa</h3>
<label>Nome</label>
<input name="empresa" class="form-control" type="text" value="<?=$cfg[empresa];?>" required><br />

<label>Email</label>
<input name="email" class="form-control" type="text" value="<?=$cfg[email];?>" required><br />

<label>Site</label>
<input name="site" class="form-control" type="text" value="<?=$cfg[site];?>" required><br />

<label>Facebook</label>
<input name="facebook" class="form-control" type="text" value="<?=$cfg[facebook];?>" required><br />

<label>Endereço: Cidade/Estado</label>
<input name="endereco" class="form-control" type="text" value="<?=$cfg[endereco];?>" required><br />

<label>Endereço: Rua/Bairro</label>
<input name="endereco2" class="form-control" type="text" value="<?=$cfg[endereco2];?>" required><br />

<label>Telefone 1</label>
<input name="tel1" class="form-control" type="text" value="<?=$cfg[tel1];?>" required><br />

<label>Telefone 2</label>
<input name="tel2" class="form-control" type="text" value="<?=$cfg[tel2];?>" required><br />

<label>Mapa</label>
<input name="map" class="form-control" type="text" value="<?=$map;?>" required><br />


<hr />

<h2>Entregas</h2>
<label>Bairros Disponíveis Para Entregas</label>
<input name="bairros" class="form-control" type="text" value="<?=$cfg[bairros];?>" required><br />

<label>Valor da Entrega</label>
<input name="entrega" class="form-control" type="text" value="<?=$cfg[entrega];?>" required><br />

<label>Valor Mínimo Para Entregas</label>
<input name="minimo" class="form-control" type="text" value="<?=$cfg[minimo];?>" required><br />

<label>Horário de Abertura</label>
<input name="horario" class="form-control" maxlength="2" type="text" value="<?=$cfg[horario];?>" required><br />

<label>Horário de Fechamento</label>
<input name="horario2" class="form-control" maxlength="2" type="text" value="<?=$cfg[horario2];?>" required><br />

<label>Dias de Funcionamento</label>
<input name="diasf" class="form-control" type="text" value="<?=$cfg[diasf];?>" required><br />

<label>Tempo Estimado de Entregas</label>
<input name="entrega_min" class="form-control" type="text" value="<?=$cfg[entrega_min];?>" required><br />

<hr />

<h2>Pagamentos</h2>

<label>Pagamentos Online <i>{configurar arquivo "pages/configuração.php" para configurar os demais dos 7 métodos de pagamentos online}</i></label><br /><br />
<input name="pg_online" type="radio" value="sim" <?php if($pg_online == "sim") { echo 'checked'; } ?> /> Aceitar pagamentos online
<input name="pg_online" type="radio" value="nao" <?php if($pg_online == "nao") { echo 'checked'; } ?> style="margin-left:3%;" /> Não aceitar pagamentos online<br /><br />

<label>Cartões de Créditos Aceitos</label>
<input name="cartoes" class="form-control" type="text" value="<?=$cfg[cartoes];?>" required><br />


<hr />

<h2>Acesso da Área Administrativa</h2>
<label>Usuário</label>
<input name="user" class="form-control" type="text" value="<?=$cfg[user];?>" required><br />

<label>Senha</label>
<input name="pw" class="form-control" type="password" value="<?=$cfg[pw];?>" required><br />

<hr />

<h2>Logomarca</h2><br />
<input type="file" name="fileUpload" class="form-control" width="10"><br />

<h2>Extra</h2>
<label>Deseja que o site encerre as entregas no horário de fechamento da loja automáticamente?</label><br /><br />
<input name="fch" type="radio" value="1" <?php if($fch == 1) { echo checked; } ?> /> Sim, fechar.
<input name="fch" type="radio" value="0" <?php if($fch == 0) { echo checked; } ?>  style="margin-left:3%;" /> Não, fechar manualmente.<br /><br /><br />


<input class="btn btn-default" type="submit" name="enviar" style="width:70%;padding:2%;" value="Pronto, realizar modificações!">
</form>


<?php
if($_POST[enviar]) {

$abrir = fopen("pages/global.php","w+");
fwrite($abrir, '<?php

// PHPLIVRE - ARQUIVO DE CONFIGURAÇÃO
// WWW.PHPLIVRE.COM
$map = "'.$_POST[map].'"; // LINK DO IFRAME DO MAPA DE SUA LOJA, PEGAR NO GOOGLE MAPS.
	 
// MÉTODOS DE PAGAMENTOS ONLINE
$pg_online = "'.$_POST[pg_online].'";                                             // HABILITA OPÇÃO DE PAGAMENTOS ONLINE

$fch = "'.$_POST[fch].'";                                                         /* DESEJA QUE A LOJA FECHE SOZINHA NOS HORÁRIOS? 1: SIM 0: NÃO */
$cfg = array(
     "servidor" => "'.$_POST[servidor].'",              // IP HOST
	 "login" => "'.$_POST[login].'",                      // LOGIN HOST
	 "senha" => "'.$_POST[senha].'",                       // SENHA HOST
	 "database" => "'.$_POST[database].'",                     // DATABASE HOST
	 "empresa" => "'.$_POST[empresa].'",               // NOME DA EMPRESA
	 "email"    => "'.$_POST[email].'",              // EMAIL DE CONTATO
     "site"    => "'.$_POST[site].'",              // SITE DA EMPRESA
	"facebook" => "'.$_POST[facebook].'",             // FACEBOOK DA EMPRESA
	"entrega" => "'.$_POST[entrega].'",                            // TAXA DE ENTREGA
	"minimo" => "'.$_POST[minimo].'",                            // VALOR DO PEDIDO MINIMO
	"horario" => "'.$_POST[horario].'",                           // HORARIO DE ABERTURA SEM MINUTOS
	"horario2" => "'.$_POST[horario2].'",                        // HORARIO DE FECHAMENTO SEM MINUTOS
	"diasf" => "'.$_POST[diasf].'",                         // DIAS DE FUNCIONAMENTO
	"entrega_min" => "'.$_POST[entrega_min].'",                 // TEMPO DE ENTREGA ESTIMADO
	"bairros" => "'.$_POST[bairros].'",            // BAIRROS PARA ENTREGA
	"user" => "'.$_POST[user].'",                          // LOGIN DO ADMIN
	"pw" => "'.$_POST[pw].'",                         // SENHA DO ADMIN
	"tel1" => "'.$_POST[tel1].'",                // TELEFONE 1
	"tel2" => "'.$_POST[tel2].'",              // TELEFONE 2
	"endereco" => "'.$_POST[endereco].'",          // ESTADO E CIDADE
	"endereco2" => "'.$_POST[endereco2].'",        // RUA E NUMERO
	"cartoes" => "'.$_POST[cartoes].'",           // Cartões aceitos
	 );
?>



');
fclose($abrir);


	  move_uploaded_file($_FILES['fileUpload']['tmp_name'], "css/logo.png");

echo "<script>alert('Suas modificações foram realizadas com sucesso!');</script>";
echo '<br><br><div class="alert alert-success" role="alert"><b>Sucesso!</b> suas modificações foram realizadas com sucesso.</div>';
echo '<script language= "JavaScript">
location.href="?page=adm_global"
</script>';
}
?>




</div>

<?php } ?>