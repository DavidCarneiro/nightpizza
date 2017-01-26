<!DOCTYPE html>
<!--
    Copyright (c) 2012-2016 Adobe Systems Incorporated. All rights reserved.

    Licensed to the Apache Software Foundation (ASF) under one
    or more contributor license agreements.  See the NOTICE file
    distributed with this work for additional information
    regarding copyright ownership.  The ASF licenses this file
    to you under the Apache License, Version 2.0 (the
    "License"); you may not use this file except in compliance
    with the License.  You may obtain a copy of the License at

    http://www.apache.org/licenses/LICENSE-2.0

    Unless required by applicable law or agreed to in writing,
    software distributed under the License is distributed on an
    "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY
     KIND, either express or implied.  See the License for the
    specific language governing permissions and limitations
    under the License.
-->
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <meta name="format-detection" content="telephone=no" />
    <meta name="msapplication-tap-highlight" content="no" />
    <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width" />
	
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
	<script src="js/jquery.maskMoney.js"></script>
    <title>Delivery</title>
<style>
.texto{
	font-size: 13px;
	font-style: italic;
}

.preto{
	font-weight: bolder;
}
</style>
</head>
<body>
<?php 
session_cache_expire(30);
session_start();
include("conexao.php");
//$_SESSION['sessao_id'] = 1;
if($_SESSION['sessao_id'] == ""){
			header("location:index.php");
		}
		else{
			$botao = $_POST['btn'];
			$nome = $_POST['nome'];
			$desc = $_POST['desc'];
			$preco = $_POST['preco'];
			$tipo = $_POST['tipo'];
			$id = $_SESSION['sessao_id'];
			if($botao == 'Cadastrar'){
				if($nome != "" || $preco != ""){
				$inserir = $CONN->query("insert into produtos (nome,dsc,preco,tipo,fk_usuario) values ('$nome','$desc',$preco,$tipo,$id)");
				printf("Error - SQLSTATE %s.\n", $CONN->error);
				if($inserir){
					echo '<script>
							alert("Produto adicionado com sucesso");
							window.location.href = "cadastrar_produto.php";
						  </script>';
				}
				else{
					//echo '<script>
						//	alert("Erro ao adicionar produto, verifique as informações e tente novamente.");
							//window.location.href = "cadastrar_produto.php";
						  //</script>';
				}
				}
				else{
					echo '<script>
					 alert("Campos obrigatórios: Nome, Preço");
					</script>';
				}
			} 
		    
			
?>
<form action="cadastrar_produto.php" method="post">
		<div data-role="header" data-theme="b" data-position="fixed" >
			<h1 id="infor">Painel Sobral Pizza Delivery</h1>
			<a href="#outside" data-icon="bars" data-iconpos="notext">Menu</a>
		</div><!-- /header -->

		<div role="main" class="ui-content">
		  <input type="text" name="nome" placeholder="Nome">
		  <input type="text" name="desc" placeholder="Descrição">
		  <input type="text" name="preco" id="valor" placeholder="Preço">
		  <label>
		  <input type="radio" name="tipo" value="0">Prato
		  </label>
		  <label>
		  <input type="radio" name="tipo" value="1">Bebida
		  </label>
		  <label>
		  <input type="radio" name="tipo" value="9">Promoção
		  </label>
		  <input type="submit" class="ui-btn ui-btn-b" name="btn" value="Cadastrar">
		</div><!-- /content -->

		<div data-role="footer">
			<h4>sobral pizza  </h4>
		</div><!-- /footer -->
		<div data-role="panel" id="outside" data-theme="b">
            <ul data-role="listview">
                <li data-icon="back"><a href="#" data-rel="close">Fechar</a></li>
                <li><a href="principal.php">Painel</a></li>
                <li><a href="sair.php" id="sair">Sair</a></li>
                <li>Sobre</li>
            </ul>
        </div>
		
	
</form>
</body>
</html>
<script type="text/javascript">
    $(function(){
        $("#valor").maskMoney();
    });
    </script>
<?php }?>