<?php

if (basename($_SERVER["REQUEST_URI"]) === basename(__FILE__))
{
	exit('<h1>ERROR 404</h1>Entre em contato conosco e envie detalhes.');
}

if(!isset($_SESSION[login])) { exit('<h1>ERROR 404</h1>Entre em contato conosco e envie detalhes.'); } else {

?>

<br /><br />
<div class="container marketing">

<script type="text/javascript" >
var consulta = "";
var bairro = "";
    $(document).ready(function(){
               $("#numero").blur(function(){
				   consulta = $("#cep").val();
                   $("#rua").val("...");
                   $("#bairro").val("...");
				   $("#xd").val("Procurando seu endereço...");
                   $("#cidade").val("...");
                   $("#uf").val("...");
        
        
		//alert(consulta);
                
                $.getJSON("http://viacep.com.br/ws/"+consulta+"/json/?callback=?", function(dados){
                        
                       
						//alert(dados.logradouro);

                        $("#rua").val(dados.logradouro);
                        $("#bairro").val(dados.bairro);
                        $("#cidade").val(dados.localidade);
                        $("#uf").val(dados.uf);
						bairro = $("#bairro").val(dados.bairro);
						$.post('http://partiupizza.com/webservice/pega_taxa.php',{bairro:bairro},function(data){
							// resto do código
							alert('entrou');
							alert('entrou');
							if(data != ""){
							   $("#res").html('Valor da taxa: <b>'+data);
							   $("#tax").val(data);
							}else{
							   alert("Desculpe, ainda não entregamos nesse endereço.");
							   window.location.href = "?page=inicio";
							}
							
						});
                        
                        });
                });
        });

</script>

<div class="page-header">
<h2>Área Administrativa  <a href="?page=adm_global"><button class="btn btn-default" style="margin-left:1%;"><i class="fa fa-lightbulb-o" aria-hidden="true"></i> Configurações Global</button></a>
<a href="?<?=$_SERVER['QUERY_STRING'];?>&mostrar=1"><button class="btn btn-primary" style="margin-left:1%;"><i class="fa fa-barcode" aria-hidden="true"></i> Mostrar Pedidos</button></a>
</h2>
</div>
<p class="lead">&Aacute;rea destinada a membros da administra&ccedil;&atilde;o, se estiver no lugar errado clique <a href="?page=cardapio">aqui.</a></p>
<ul class="nav nav-tabs" role="tablist">
        <li role="presentation"><a href="?page=adm"><i class="fa fa-home" aria-hidden="true"></i> In&iacute;cio</a></li>
        <li role="presentation" class="active"><a href="?page=adm_categorias"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Categorias</a></li>
        <li role="presentation"><a href="?page=adm_produtos"><i class="fa fa-bars" aria-hidden="true"></i> Produtos</a></li>
		<li role="presentation"><a href="?page=adm_entregas"><i class="fa fa-motorcycle" aria-hidden="true"></i> Entregas</a></li>
		<li role="presentation"><a href="?page=sair"><i class="fa fa-reply" aria-hidden="true"></i> Sair</a></li>
      </ul><br />

<h1 class="page-header">Endereços</h1>
<div style="width:80%;">

<?php
$mostrar = $mysqli->query("select * from dl_enderecos order by id_end desc");
$mostrar2 = $mostrar->num_rows;
if($mostrar2 === 0) {
echo '<div class="alert alert-info" role="alert"><b>Ops!</b> nenhum endereço no momento.</div>';
} else {
echo '<form action="" method="post">
<table width="auto" border="0">
  <tr>
  <td width="300">
<select name="downs" class="form-control" style="width:80%;" required>
<option value="">--- Selecione ---</option>';
while($exibir = $mostrar->fetch_assoc())  {
echo '<option value="'.$exibir[id_end].'">'.sql($exibir[rua]).','.sql($exibir[bairro]).'</option>';
}
echo '</select></td>
<td  width="300"><input class="btn btn-danger btn-block" type="submit" value="Deletar" style="width:50%;" name="deletar"></form></td></tr>
</table>';
}
if($_POST[deletar]) {
$mysqli->query("delete from dl_enderecos where id_end='".$_POST[downs]."'");
echo '<br><div class="alert alert-success" role="alert"><b>Sucesso!</b> categoria deletada.</div>';
}
?>
</div>
<br /><br />
<h1 class="page-header">Adicionar Endereço</h1>
<div style="width:50%;">
<form action="" method="post">
<input type="text" name="cep" id="cep" class="form-control" value="<?=$_SESSION[dv_cep];?>" maxlength="8" placeholder="CEP" required /><br />
<input type="text" name="numero" id="numero" class="form-control" maxlength="5" placeholder="Número da casa..." required /><br />
<input name="rua" type="text" class="form-control" id="rua" size="60" placeholder="Rua..." autofocus required/><br />
<input name="bairro" type="text" class="form-control" id="bairro" size="60" placeholder="Bairro..." autofocus required/><br />
<input name="taxa" type="text" class="form-control" id="taxa" size="60" placeholder="Taxa... Ex: 2.50" autofocus required/><br />
<center><input class="btn btn-success btn-block" type="submit" value="Enviar" style="width:70%;" name="enviar">
</center></div>


<br />

<?php 

if($_POST[enviar]) {
$mysqli -> query ("insert into dl_enderecos(cep,rua,numero,bairro,taxa) values ('".$_POST[cep]."','".$_POST[rua]."','".$_POST[numero]."','".$_POST[bairro]."','".$_POST[taxa]."')");
echo '<div class="alert alert-success" role="alert"><b>Sucesso!</b> nova categoria adicionado.</div>';
}
} ?>