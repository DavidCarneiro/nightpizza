<?php 
date_default_timezone_set('America/Sao_Paulo');
header('Access-Control-Allow-Origin: *');
ob_clean();
include("conexao.php");
$sel = $mysqli->query("select * from dl_empresa");
$emp = $sel->fetch_array();
if($_POST[pagamento] == "Dinheiro") {
				$qrws = "Troco para <b>R$ " . $_POST[troco] . "</b>";
			} else {
				$qrws = "Cart&atilde;o de Cr&eacute;dito";
			}
			$qr = $_POST[valor] + $_POST[tax];
			//echo "<script>alert('Desculpe, o valor mínimo para entregas é de R$ ".$qr.".');</script>";
			if(!$_POST[entrega]){
				echo 0;
			}
			else {
				if($_POST[entrega] == "Entrega" && ((!$_POST[nome]) || (!$_POST[email]) || (!$_POST[tel]) || (!$_POST[numero]))){
					echo 0;
				}elseif($_POST[entrega] == "Retirada na loja" && ((!$_POST[nome]) || (!$_POST[email]) || (!$_POST[tel]))){
					echo 0;
				} elseif($emp[minimo] > $qr) {
					echo 0;
				} else {
					if($_POST[entrega]=="Entrega"){
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
					$ps = $CONN->query("select * from dl_carrinho where ip='".$_SERVER['REMOTE_ADDR']."'");
					while($new_d = $ps->fetch_assoc()){
						$prd = $new_d[produto]." ";
						$qr += $new_d[valor];
					}
					
					$inserir = $CONN->query("insert into dl_pedidos(valor,data,descricao,email,nome,rua,numero,cep,bairro,fone,pag,obs,so,tipo) values('".$qr."','".date('Y-m-d')."',
								  '".$prd."','".$_POST[email]."','".$_POST[nome]."','".$rua."',".$numero.",'".$cep."','".$bairro."','".$_POST[tel]."','".$_POST[pagamento].", ".$qrws."','".$_POST[descricao]."',1,'".$entrega."')");
					if($inserir){
						$CONN->query("delete from dl_carrinho where ip='".$_SERVER['REMOTE_ADDR']."'");
						$chegar = $CONN->query("select * from dl_pedidos order by id desc");
						$chegar2 = $chegar->fetch_assoc();
						$sender = $emp[email];
						$namesender = $emp[nome];
						$assunto = "Pedido Realizado";
						$mensagem = "O seu novo pedido <b>#".$chegar2[id]."</b> foi realizado, aguarde instruções.<br><a href='".$emp[site]."/pedido.php?id=".$chegar2[id]."'>http://".$emp[site]."/?page=pedido&id=".$chegar2[id]."</a>";

						$headers = "MIME-version: 1.1\n";
						$headers .= "Content-type: text/html; charset=iso-8859-1\n";

						mail($_POST[email],$assunto,$mensagem,$headers,"-r".$sender);
						//echo '<script>location.href="pedido.php?id='.$chegar2[id].'";</script>';
					}else{//echo '<script>alert("Problemas ao inserir pedido, contate o administrador!");</script>';
					}
					//printf("Error - SQLSTATE %s.\n", $mysqli->error);
					
					
				}
			}
if($inserir){
	$delete = $CONN->query("DELETE FROM dl_carrinho WHERE ip = '$ip'");
	echo $chegar2[id];
} else {
	echo 0;
}

?>
