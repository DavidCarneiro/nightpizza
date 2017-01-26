<?php


if (basename($_SERVER["REQUEST_URI"]) === basename(__FILE__))
{
	exit('<h1>ERROR 404</h1>Entre em contato conosco e envie detalhes.');
}
include("global.php");	 
// CONEXAO, N�O MECHER
$server = "localhost";
$user = "root";
$pass = "";
$database = "nightpizza";
$mysqli = new mysqli ($server,$user,$pass,$database);
if (mysqli_connect_errno()) {
   echo 'Não foi possível conectar-se ao banco de dados: ' . mysqli_connect_error();
    if(!@$_GET[page] == "adm_global") {
@$_SESSION[login] = admin;
@$_SESSION[email] = "admin@admin.com";
echo '<script>alert("Olá, sou um bot do php livre, o nosso site delivery se instala sozinho, basta você criar um banco de dados no seu mysql e configurar os seguintes campos abaixos no área administrativa do site. \n \n{usuário: admin}\n {senha: admin} \n \n caso você continue vendo essa mensagem, é por que não foi configurado corretamente, você terá que entrar em contato conosco em www.phplivre.com");</script>';
echo '<script language= "JavaScript">
location.href="?page=adm_global"
</script>';
}
}

// PHP LIVRE - CONFIGURAÇÃO
// CONFIGURE ABAIXO SABORES E PAGAMENTOS ONLINE
    $cons = $mysqli->query("SELECT * FROM dl_produtos WHERE categoria LIKE '%pizza%'");
	
	 
	 $op1_n = "Borda Recheada";
	 $op1_p = "1.00";             // PREÇO
	 $op1=array('4 Queijos','Pizza Vegetariana','Atum','Bacon','Baiana','Pizza Vegetariana Brócolis','Calabresa','Carbonara','Frango com Catupiry','Genovesa','Lombinho','Peito de Peru','Pepperoni','Portuguesa','Strogonoff de Carne','Strogonoff de Frango','Banana','Brigadeiro','Chocolate','Prestígio','Romeu e Julieta');      // OPCOES PARA O PRODUTO
	 
	 $op2_n = "Sabores 1";
	 $op2_p = "Valor de acordo com o sabor";             // PREÇO
	 while($valores = $cons->fetch_assoc()){
	    $op2[] = $valores['nome'];
	 }
	 
	 
	 $op3_n = "Tamanho";
	 $op3_p = "3.00";             // PREÇO
	 $op3=array('4 Queijos','Pizza Vegetariana','Atum','Bacon','Baiana','Pizza Vegetariana Brócolis','Calabresa','Carbonara','Frango com Catupiry','Genovesa','Lombinho','Peito de Peru','Pepperoni','Portuguesa','Strogonoff de Carne','Strogonoff de Frango','Banana','Brigadeiro','Chocolate','Prestígio','Romeu e Julieta');      // OPCOES PARA O PRODUTO
	 
	 $op4_n = "Obs. 1";
	 $op4_p = "4.00";             // PREÇO
	 $op4=array('4 Queijos','Pizza Vegetariana','Atum','Bacon','Baiana','Pizza Vegetariana Brócolis','Calabresa','Carbonara','Frango com Catupiry','Genovesa','Lombinho','Peito de Peru','Pepperoni','Portuguesa','Strogonoff de Carne','Strogonoff de Frango','Banana','Brigadeiro','Chocolate','Prestígio','Romeu e Julieta');      // OPCOES PARA O PRODUTO
	 
	 $op5_n = "Obs. 2";
	 $op5_p = "5.00";             // PREÇO
	 $op5=array('4 Queijos','Pizza Vegetariana','Atum','Bacon','Baiana','Pizza Vegetariana Brócolis','Calabresa','Carbonara','Frango com Catupiry','Genovesa','Lombinho','Peito de Peru','Pepperoni','Portuguesa','Strogonoff de Carne','Strogonoff de Frango','Banana','Brigadeiro','Chocolate','Prestígio','Romeu e Julieta');      // OPCOES PARA O PRODUTO
	 
	 $op6_n = "Tipo do Hambúrguer";
	 $op6_p = "6.00";             // PREÇO
	 $op6=array('Carne','Frango','Bovino');                    // OPCOES PARA O PRODUTO
	 
	 $op7_n = "Alface";
	 $op7_p = "7.00";             // PREÇO
	 $op7=array('Com Alface','Sem Alface');                                  // OPCOES PARA O PRODUTO
	 
	 $op8_n = "Molho";
	 $op8_p = "8.00";             // PREÇO
	 $op8=array('Com Molho','Sem Molho');                                 // OPCOES PARA O PRODUTO
	 
	 $op9_n = "Ovos";
	 $op9_p = "9.00";             // PREÇO
	 $op9=array('Com Ovos','Sem Ovos');                                 // OPCOES PARA O PRODUTO
	 
	 $op10_n = "Suco";
	 $op10_p = "10.00";             // PREÇO
	 $op10=array('A&ccedil;&uacute;car','Ado&ccedil;ante','Sem nada');                               // OPCOES PARA O PRODUTO
	 

// MERCADO PAGO
require_once "mercadopago.php";
$mp = new MP('SEU_CLIENT_ID', 'SEU_CLIENT_SECRET');  // CLIENT_ID E CLIENTE_SECRET
$pg_mp = "contato@phplivre.com";                                // EMAIL DO MERCADO PAGO, CASO QUEIRA DESATIVAR DEIXE EM BRANCO

// PAYPAL
$pg_pp = "contato@phplivre.com";                                // EMAIL DO PAYPAL, CASO QUEIRA DESATIVAR DEIXE EM BRANCO

// MOIP
$pg_moip = "contato@phplivre.com";                                // EMAIL DO MOIP, CASO QUEIRA DESATIVAR DEIXE EM BRANCO

// BCASH
$pg_bcash = "contato@phplivre.com";                                // EMAIL DO BCASH, CASO QUEIRA DESATIVAR DEIXE EM BRANCO


// PAGSEGURO
$pg_ps = "contato@phplivre.com";                                // EMAIL DO PAG SEGURO, CASO QUEIRA DESATIVAR DEIXE EM BRANCO



if(@$_GET[page] === "sair") {
session_start();
session_destroy();
session_unset();
echo '<meta http-equiv="refresh" content="0;url=?page=adm">';
}

if(!function_exists("sql")) {
function sql($campo, $adicionaBarras = false) {
$campo = preg_replace("/(from|alter table|select|insert|delete|update|were|drop table|show tables|#|\*|--|\\\\)/i","",$campo);
$campo = trim($campo);
$campo = strip_tags($campo);
if($adicionaBarras || !get_magic_quotes_gpc())
$campo = addslashes($campo);
return $campo; 
} }


?>