<?php
/* define o limitador de cache para 'private' */

session_cache_limiter('private');
$cache_limiter = session_cache_limiter();

/* define o prazo do cache em 30 minutos */
session_cache_expire(1440);
$cache_expire = session_cache_expire();
?>
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
echo $_SESSION['sessao_id'];
if($_SESSION['sessao_id'] == ""){
			header("location:index.php");
		}
		else{
			$id = $_SESSION['sessao_id'];
		    $select = $CONN->query("SELECT u.nome as usuario, u.status, p.id AS pid, p.nome AS nome, p.fone AS fone, p.end AS end, p.obs AS obs, p.total AS total, u.usuario, p.enviado, p.pagamento as pagamento, p.troco, p.entrega as tipo
			                        FROM pedidos p INNER JOIN usuarios u ON p.fk_usuario = u.id 
									WHERE u.id = $id AND p.confirmado = 1 
									ORDER BY p.enviado, p.id");	
		if($acao == 'enviar'){
			echo $pid;
			$update = $CONN->query("update pedidos set enviado = 1 where id = $pid");
			if($update){
				echo '<script>alert("Pedido encerrado!"); window.location.href = "principal.php";</script>';
			}
			else{
				echo '<script>alert("Erro ao encerrar!"); window.location.href = "principal.php";</script>';
			}
		}	
			
?>

		<div data-role="header" data-theme="b" data-position="fixed" >
			<h1 id="infor">Painel <?php echo $_SESSION['sessao_nome'];?></h1>
			<a href="#outside" data-icon="bars" data-iconpos="notext">Menu</a>
		</div><!-- /header -->

		<div role="main" class="ui-content">
		 
		  <table align="center" border="0">
		    <tr><th>Pedido</th><th>Nome</th><th>Fone</th><th>Endereço</th><th>Obs.</th><th>Pagamento</th><th>Troco</th><th>Tipo</th><th>Enviado</th></tr>
		   <?php 
		     while($valor = $select->fetch_array()){
				 $valped = $valor['pid'];
				 $sel = $CONN->query("SELECT * FROM pedidos_itens pi INNER JOIN pedidos p on p.id = pi.fk_ped INNER JOIN produtos pr ON pi.fk_produto = pr.id WHERE pi.fk_ped = $valped");
				 ?>
				 <tr>
					 <td align="center"><?php echo $valor['pid'];?></td>
					 <td><?php echo utf8_decode($valor['nome']);?></td>
					 <td><?php echo $valor['fone'];?></td>
					 <td><?php echo utf8_decode($valor['end']);?></td>
					 <td><?php echo utf8_decode($valor['obs']);?></td>
					 <td align="center"><?php echo $valor['pagamento'];?></td>
					 <td align="center"><?php echo $valor['troco'];?></td>
					 <td align="center"><?php echo $valor['tipo'];?></td>
					 <?php 
					   if($valor['enviado'] == 0){
					 ?>
					 <td align="center"><a href="principal.php?acao=enviar&pid=<?php echo $valor['pid'];?>"><img src="img/unlike.png"></a></td>
					 <?php
					   }
					   else{
					 ?>
					 <td align="center"><img src="img/like.png"></td>
					 <?php
					   }
					 ?>
				 </tr>
				 <tr>
				   <td></td><th>Produto</th>
				   <th>Borda</th>
				   <th>Metade</th>
				   <th>Preço</th>
				 </tr>
				 <?php 
				 $total = 0;
				 while($linhas = $sel->fetch_array()){		
				   $idp = $linhas['fk_prod_metade'];
				   $sele = $CONN->query("select nome from produtos where id = $idp");			
				   if($sele){
                      $prod = $sele->fetch_array();					  
					  $metade = $prod['nome'];
				   }
				   else{
					   $metade = 'nenhum';
				   }
                     
		         ?>
			       <tr class="texto">
				      <td></td><td><?php echo $linhas['nome'];?></td>
					  <td><?php echo $linhas['borda'];?></td>
					  <td align="center"><?php echo $metade;?></td>
					  <td align="center"><?php echo $linhas['preco'];?></td>
					  
				   </tr>
		  <?php 
		           $total += $linhas['preco'];
		   }
		   ?>
		     <tr class="preto"><td colspan="4">Total</td><td align="center" colspan="1"><?php echo $total; ?></td></tr>
			 <tr><td colspan="8"><hr></hr></td></tr>
   <?php }?>
			 
		   </table>
		</div><!-- /content -->

		<div data-role="footer">
			<h4>sobral pizza  </h4>
		</div><!-- /footer -->
		<div data-role="panel" id="outside" data-theme="b">
            <ul data-role="listview">
                <li data-icon="back"><a href="#" data-rel="close">Fechar</a></li>
                <li><a href="principal.php">Painel</a></li>
				<li><a href="cadastrar_produto.php">Cadastrar Produto</a></li>
                <li><a href="sair.php" id="sair">Sair</a></li>
                <li>Sobre</li>
            </ul>
        </div>
		
	
	
</body>
</html>

<?php }?>