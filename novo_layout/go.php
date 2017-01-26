<?php
session_start();
include("configuracao.php");
?>
<!doctype html>
<html>
<head>

    <meta name="viewport" content="width=device-width, initial-scale=1" />
	<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<link href='https://fonts.googleapis.com/css?family=Lato:400,300,700' rel='stylesheet' type='text/css'>		
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/owl.carousel.css">
        <link rel="stylesheet" href="css/responsive.css">
        <link rel="stylesheet" href="css/style.css">

</head>
<script>
function pega(){
	var val = document.getElementById('opcao2').value;
	//alert(val);
	$("#obs2").attr("placeholder", "Observação "+val+" Ex: Sem cebola, sem milho...");
}
function muda(){
	var valor = document.getElementById('tama').value;
	//alert(valor);
	if(valor == 'Grande'){
		//alert(valor);
		$('#beb').show();
	}else{
		$('#beb').hide();
	}
	if(valor == 'Grande' || valor == 'Média'){
	//alert(valor);
		$('#opcao2').show();
	}else{
		$('#opcao2').hide();
	}
}

</script>
    <style type="text/css">
   
    div {
        width: 600px;
        margin: 5em auto;
        padding: 50px;
        background-color:#F9F9F9;
        border-radius: 1em;
    }
    a:link, a:visited {
        color: #38488f;
        text-decoration: none;
    }
    @media (max-width: 700px) {
        body {
            background-color: #fff;
        }
        div {
            width: auto;
            margin: 0 auto;
            border-radius: 0;
            padding: 1em;
        }
    }
    </style>  
	  
	
</head>

<body>
<div>
<h1><i class="fa fa-hand-pointer-o" aria-hidden="true"></i> Opções</h1>
Selecione as opções adicionais que desejar.<br><br>

<form action="" method="post">
	<?php
	include("includes/conexao.php");
	$idcli = $_SESSION['sessao_id'];
	$user = $_SESSION['sessao_user'];
	$afez2 = $mysqli->query("select * from dl_produtos where id='".$_GET[idq]."'");
	$afez = $afez2->fetch_assoc();

 if(!empty($afez[opcao1])) {
	 echo '<select name="opcao1">';
	 echo '<option selected="selected" disabled="disabled">--- '.$op1_n.' ---</option>';
		echo '<option value="[Requeijão]">Requeijão</option>
			 <option value="[Catupiry]">Catupiry</option>
			 <option value="[Cream Cheese]">Cream Cheese</option>
			 <option value="[Cheddar]">Cheddar</option>
			 <option value="[Calabresa]">Calabresa</option>
			 <option value="[Chocolate]">Chocolate</option>';
	 echo '</select><br><br>'; 
	 }
	 if(!empty($afez[opcao3])) {
	 echo '<select name="tam" id="tama" required>
			 <option selected="selected" disabled="disabled" value="">--- Selecione o Tamanho ---</option>
			 <option value="Broto">Broto</option>
	         <option value="Pequena">Pequena</option>
			 <option value="Média">Média</option>
			 <option value="Grande">Grande</option>
	       </select><br><br>';
	 }
	  if(!empty($afez[opcao2])) {
	 echo '<select name="opcao2" id="opcao2" required>';
	 echo '<option selected="selected" disabled="disabled">--- '.$op2_n.'  '.$op2_p.' ---</option>';
	 for($i=0;$i<sizeof($op2)/2;$i++){
		echo '<option value="/'.$op2[$i].'">'.$op2[$i].'</option>'; 
	 }
	 echo '</select><br><br>'; 
	 //while (list ($key2, $val2) = each ($op2) ) echo '<option value="['.$val2.']">'.$val2.'</option>';
	 //echo '</select><br>'; 
	 }
	 
	 /*echo '<select name="bebida" id="beb" style="display: none;" required>
			 <option selected="selected" disabled="disabled">--- Selecione o Refrigerante ---</option>
	         <option value="Coca-Cola 1L">Coca-Cola 1L</option>
			 <option value="Fanta 1L">Fanta 1L</option>
			 <option value="Kuat 1L">Kuat 1L</option>
	       </select><br><br>';*/
	 if(!empty($afez[opcao4])) {
	   echo '<input type="text" name="obs1" id="obs1" placeholder="Observação '.$afez[nome].' Ex: sem cebola, sem milho...." size="50%"><br><br>';
	 }
	 if(!empty($afez[opcao5])) {
	   echo '<input type="text" name="obs2" id="obs2" placeholder="Observação  Ex: sem cebola, sem milho...." size="50%"><br><br>';
	 }
	  

echo "
<input type='hidden' name='priceb' value='".$afez[preco_b]."'>
<input type='hidden' name='pricep' value='".$afez[preco_p]."'>
<input type='hidden' name='pricem' value='".$afez[preco_m]."'>
<input type='hidden' name='priceg' value='".$afez[preco_g]."'>
<input type='hidden' name='name' value='".$afez[nome]."'>
<input type='hidden' name='category' value='".$afez[categoria]."'>
</tr>

";

	?>
	
<input type="submit" value="ESCOLHER" name="finalizarq" style="width:100%;padding:2%;margin-bottom:1%;" class="btn btn-warning" /><br />
</form>
<?php
if($_POST[finalizarq]) {

// opcoes
if($_POST[tam] == "Broto"){
	$preco = $_POST[priceb];
}
if($_POST[tam] == "Pequena"){
	$preco = $_POST[pricep];
}
if($_POST[tam] == "Média"){
	$preco = $_POST[pricem];
}
if($_POST[tam] == "Grande"){
	$preco = $_POST[priceg];
}
if(!$_POST[tam]){
	$preco = $_POST[priceg];
}
if(empty($_POST[opcao1])) {
$sbs1 = 0;
} else {
$sbs1 = str_replace(",",".",$op1_p);
}
if(empty($_POST[opcao2])) {
$sbs2 = 0;
} else {
$tmp = str_replace("[","",$_POST[opcao2]);
$tmp2 = str_replace("]","",$tmp);

$pega_val = $mysqli->query("SELECT * FROM dl_produtos WHERE nome LIKE '".$tmp2."'");
$val= $pega_val->fetch_assoc();
if($_POST[tam] == "Pequena"){
	$sbs2 = $val['preco_p']/2;
}
if($_POST[tam] == "Média"){
	$sbs2 = $val['preco_m']/2;
}
if($_POST[tam] == "Grande"){
	$sbs2 = $val['preco_g']/2;
}
if(!$_POST[tam]){
	$sbs2 = $val['preco_g']/2;
}

$preco = $preco/2;
}
if($_POST['opcao1']){
	if($_POST['opcao1'] == '[Requeijão]'){
		$valor += 2.50;
	}
	if($_POST['opcao1'] == '[Chocolate]'){
		$valor += 3.99;
	}
	if($_POST['opcao1'] == '[Catupiry]'){
		$valor += 5.99;
	}
	if($_POST['opcao1'] == '[Cream Cheese]'){
		$valor += 5.99;
	}
	if($_POST['opcao1'] == '[Cheddar]'){
		$valor += 2.99;
	}
	if($_POST['opcao1'] == '[Calabresa]'){
		$valor += 2.99;
	}
}
$pr0 = $preco + $sbs1 + $sbs2;

$prods = $_POST[name]." ".$_POST[obs1]." ".$_POST[opcao1]." ".$_POST[obs2]." ".$_POST[opcao2]."  ".$_POST[tam]." ".$_POST[bebida];

$mysqli->query("insert into dl_carrinho(produto,preco,categoria,ip) values('".$prods."','".$pr0."','".$_POST[category]."','".$_SERVER['REMOTE_ADDR']."')");

printf(" %s.\n", $mysqli->error);

?>

<script type="text/javascript">
      window.parent.location.href="../index.php#abt_sec";
   </script>
<?php
}
?>
	</p>
</div>
</body>
</html>
