<?php
$sender = $_POST[email];
$namesender = $_POST[nome];
$assunto = "Mensagem do Cliente".$_POST[nome];
$mensagem = $_POST[msg];
ini_set();
$headers = "MIME-version: 1.1\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\n";

$envia = mail("davidcarneiro3@gmail.com",$assunto,$mensagem,$headers,"-r".$sender);
if($envia){
	echo '<script>alert("Email enviado com sucesso!");</script>';
}else{
	echo '<script>alert("Problemas ao enviar email! Contate-nos com outro canal de comunicação.");</script>';
}
//echo '<script>location.href="index.php#ctn_sec";</script>';
?>