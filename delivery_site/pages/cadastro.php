<?php
if($_POST[enviar]){
	$nome = ucwords($_POST[nome]);
	$email = $_POST[email];
	$fone = $_POST[fone];
	$cep = $_POST[cep];
	$numero = $_POST[numero];
	$rua = $_POST[rua];
	$bairro = $_POST[bairro];
	$senha = $_POST[senha];
	$hoje = date("d/m/Y");
	$inserir = $mysqli->query("INSERT INTO dl_clientes (nome,email,fone,cep,rua,numero,bairro,senha,dt_cad) VALUES ('$nome','$email','$fone','$cep','$rua',$numero,'$bairro','$senha','$hoje')");
	if($inserir){
		echo "<script>
				alert('Cadastro Realizado com Sucesso! Faça o Login e Aproveite Nossos Produtos.');
				window.location.href = '?pages=inicio.php';
			  </script>";
	}
	else{
		echo "<script>
				alert('Erro ao Cadastrar');
			  </script>";
		printf("Descrição do Erro: %s.\n", $mysqli->error);
	}
}


?>
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
<h1 class="page-header">Cadastro</h1>
<div style="width:50%;">
<form action="" method="post" enctype="multipart/form-data">
<input name="nome" class="form-control" type="text" placeholder="Nome..." required><br />
<input name="email" class="form-control" type="text" placeholder="Email..." required><br />
<input name="fone" class="form-control" type="text" placeholder="Fone..." required maxlength="11"><br />
<input name="cep" id="cep" class="form-control" type="text" placeholder="Cep..." required maxlength="8"><br />
<input name="numero" id="numero" class="form-control" type="text" placeholder="Número..."  required><br />
<input name="rua" id="rua" class="form-control" type="text" placeholder="Rua..." required><br />
<input name="bairro" id="bairro" class="form-control" type="text" placeholder="Bairro..." required><br />
<input name="senha" class="form-control" type="password" placeholder="Senha..." required><br />
<br />
<input class="btn btn-success btn-block" type="submit" value="Enviar" style="width:100%;" name="enviar">
<br />
</div>
</form>
