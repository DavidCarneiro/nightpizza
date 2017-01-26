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
    <title>Delivery</title>

</head>
<body>
<?php
		session_start();
		include("conexao.php");
		$botao =   $_POST['btn'];
	    $usuario = $_POST['usuario'];
		$senha =   $_POST['senha'];
		
		if(@$_SESSION['sessao_id']){
			header("location:principal.php");
		}
		else{
			if($botao == 'Entrar' && (!$usuario || !$senha)){
			?>
				<script> 
					alert('Prencha todos os campos!');
					//history.go(-1);
				</script>
			<?php
			}
			else{
				if($botao == 'Entrar'){
					$query = $CONN->query("select * from usuarios where usuario = '$usuario'");
					$valor = $query->fetch_array();
                    $senha=addslashes($valor['senha']);
					if($valor['senha'] == $senha){ 
					   
					   $sessao_nome = $valor['nome'];
					   $sessao_usuario = $valor['usuario'];
					   $sessao_id      = $valor['id'];

					   $_SESSION['sessao_nome'] = $valor['nome'];
					   $_SESSION['sessao_usuario'] = $valor['usuario'];
					   $_SESSION['sessao_id'] = $valor['id'];
						 
					   ?>
					   <script> 
							//alert('Usuário não cadastrado ou senha errada!');
							window.location = 'index.php';
						</script>
						<?php
					}
					else{
						?>
						<script> 
							alert('Usuário não cadastrado ou senha errada!');
							//window.location = 'index.php';
						</script>
						<?php
						
					}
				}
			}
			
		}
?>

  <form action="index.php" method="post">
		<div data-role="header" data-theme="b" data-position="fixed" >
			<h1 id="infor">login</h1>
		</div><!-- /header -->

		<div role="main" class="ui-content">
		   <input type="text" name="usuario" placeholder="Usuário"> 
		   <input type="password" name="senha" placeholder="Senha"> 
		   <input type="submit" name="btn" value="Entrar">
		</div><!-- /content -->

		<div data-role="footer">
			<h4>sobral pizza  </h4>
		</div><!-- /footer -->
  </form>
	
</body>
</html>
