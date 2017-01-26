<?php 
header('Access-Control-Allow-Origin: *');
ob_clean();
include("conexao.php");
function data() {
$data = @date('D');
$mes = @date('M');
$dia = @date('d');
$ano = @date('Y');
 
$semana = array(
'Sun' => 'Domingo',
'Mon' => 'Segunda-Feira',
'Tue' => 'Terca-Feira',
'Wed' => 'Quarta-Feira',
'Thu' => 'Quinta-Feira',
'Fri' => 'Sexta-Feira',
'Sat' => 'Sábado'
);
 
$mes_extenso = array(
'Jan' => 'Janeiro',
'Feb' => 'Fevereiro',
'Mar' => 'Marco',
'Apr' => 'Abril',
'May' => 'Maio',
'Jun' => 'Junho',
'Jul' => 'Julho',
'Aug' => 'Agosto',
'Nov' => 'Novembro',
'Sep' => 'Setembro',
'Oct' => 'Outubro',
'Dec' => 'Dezembro'
);
 
return $semana["$data"] . ", {$dia} de " . $mes_extenso["$mes"] . " de {$ano}";
}
$cep = $_POST[cep];

$pegar = $CONN->query("select * from dl_enderecos where cep = '$cep'");
$val = $pegar->fetch_assoc();

$nome = utf8_encode($_POST['nome']);
$fone = $_POST['fone'];
$rua  = utf8_encode($_POST['rua']);
$bairro  = utf8_encode($_POST['bairro']);
$num  = utf8_encode($_POST['num']);
$obs  = utf8_encode($_POST['obs']);
$troco = number_format($_POST['troco'],2);
$pag = $_POST['pagamento'];
$ip = $_POST['ip'];
@$tmp2 = explode('?',utf8_decode($_POST['valtot']));
@$qr = $_POST['valtot'];
$tipo = $_POST['tipo'];
$cons = $CONN->query("select * from dl_carrinho where ip = '$ip'");
while($prods = $cons->fetch_array()){
	$prds .= $prods['produto'].', ';
	$vlr += $prods['preco']+$val['taxa'];
}
	
$qrws = $_POST['pagamento'].', Troco para: R$'.$_POST['troco'];
$ps = $CONN->query("select * from dl_pedidos order by id desc");
if(!$ps){
	$new_dd = 1;
}
else{
	$new_d = $ps->fetch_assoc();
	$new_dd = $new_d[id] + 1;
}

$descricao ="
<table class=table table-bordered>
<tr style=font-weight:bold;text-align:center;>
<td><span style=margin-left:2%; class=label label-info><a href=?page=pedido&id=".$new_dd." target=_blank>Pedido ".$new_dd."</a></span></td>
<td>Telefone</td>
<td>Local</td>
<td>Produtos</td>
<td>Pagamento</td>
<td>Total</td>
<td>Descrição</td>
</tr>
<tr>
<td><b>".$_POST[nome]."</b><br>".($_POST[email])."</td>
<td>".($_POST[tel])."</td>
<td>".$_POST[bairro].", Rua ".$_POST[rua]." ".$_POST[numero].".</td>
<td>".$prds."</td>
<td>".$qrws." ".data()."</td>
<td><b>R$ ".number_format($vlr,2,",",".")."<b></td>
<td><i>".$_POST[obs]."</i></td>
</tr>
</table>";
if(!$_POST[nome] || !$_POST[email] || !$_POST[tel] || !$_POST[bairro] || !$_POST[rua] || !$_POST[numero]){
	echo "empty";
}else{
		$mysqli->query("insert into dl_pedidos(valor,data,descricao,email,nome,rua,numero,cep,bairro,fone) values('".$qr."','".date('d/m/Y')."',
			  '".$_POST[prds]."','".$_POST[email]."','".$_POST[nome]."','".$_POST[rua]."','".$_POST[numero].",'".$_POST[cep]."','".$_POST[cep]."','".$_POST[bairro]."','".$_POST[tel]."')");
		/*<table class=table table-bordered>
		<tr style=font-weight:bold;text-align:center;>
		<td><span style=margin-left:2%; class=label label-info><a href=?page=pedido&id=".$new_dd." target=_blank>Pedido ".$new_dd."</a></span></td>
		<td>Telefone</td>
		<td>Local</td>
		<td>Produtos</td>
		<td>Pagamento</td>
		<td>Total</td>
		<td>Descrição</td>
		</tr>
		<tr>
		<td><b>".$_POST[nome]."</b><br>".($_POST[email])."</td>
		<td>".($_POST[tel])."</td>
		<td>".$_POST[bairro].", Rua ".$_POST[rua]." ".$_POST[numero].".</td>
		<td>".$prds."</td>
		<td>".$qrws." ".data()."</td>
		<td><b>R$ ".number_format($vlr,2,",",".")."<b></td>
		<td><i>".$_POST[obs]."</i></td>
		</tr>
		</table>
		','".$_POST[email]."')");*/
		//printf("Error - SQLSTATE %s.\n", $CONN->error);
		if($inserir1){
			$delete = $CONN->query("DELETE FROM dl_carrinho WHERE ip = '$ip'");
			$sender = "naoresponda@partiupizza.com";
			$namesender = "PartiuPizza Delivery";
			$assunto = "Pedido Realizado";
			$mensagem = "O seu novo pedido <b>#".$new_dd."</b> foi realizado, aguarde instruções.<br><a href='http://partiupizza.com/?page=pedido&id=".$new_dd."'>http://partiupizza.com/?page=pedido&id=".$new_dd."</a>";

			$headers = "MIME-version: 1.1\n";
			$headers .= "Content-type: text/html; charset=iso-8859-1\n";

			mail($_POST[email],$assunto,$mensagem,$headers,"-r".$sender);
			echo $new_dd;
		} else {
			echo 0;
		}
}


?>
