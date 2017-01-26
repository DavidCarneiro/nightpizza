<?php
session_start();
if($_POST) {
require('pages/configuracao.php');

if(empty($_POST[proc])) { $_POST[proc] = $_POST[categoria]; }
$c = $_POST[categoria];
if(empty($_POST[categoria])) {
$cw = "select * from dl_produtos where categoria like '%".$_POST[proc]."%' or nome like '%".$_POST[proc]."%' or descricao like '%".$_POST[proc]."%'  order by id desc";
$c = "Todos";
} else {
$cw = "select * from dl_produtos where categoria = '".$c."' order by id desc";

}
	  $pegar_categorias = $mysqli->query($cw);
	  $pegar_zero = $pegar_categorias->num_rows;
	  
	  if($pegar_zero == 0) { echo '<br><div class="alert alert-info fade in"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true" style="margin-right:0.5%;height:5%;"></span> Nenhum produto encontrado em sua busca. </div>';
	  }
	  
	  include("pages/configuracao.php");
	  	  
echo '<div class="page-header" style="margin:0;padding:0;border:none;">
<h2 style="margin:0;padding:0;"><br><i class="fa fa-align-center" aria-hidden="true"></i> Lista de '.$c.'</h2><br>
</div><br>
';

	  echo "<table class='table table-hover' style='border:none;'>";  
	  while($afez = $pegar_categorias->fetch_assoc()) {

	  echo " <tr height='100%' style='border:none;'><td>
	  <img src='css/produtos/$afez[foto]' style='position:absolute;  z-index: 1;' width='110' height='50'>";
	  if($afez[promocao] == 1) { echo "<img src='css/promocao.png' style='position:absolute;  z-index: 2;'  width='80' height='70'>"; }
	  
	  echo "
 <td style='padding-left:20%;  z-index: 3;'><b> ".sql($afez[nome])."</b><br><span style='font-size:11px;'>".sql($afez[descricao])."</span><td>";
 
      if(strstr($afez[categoria], "Pizza")){
		  echo "
		  <td style='text-align:left;padding-top:3%;'> <b></b></td>
		    <td style='text-align:left;padding-top:3%; font-size:12px;'> <b>R$ ".number_format($afez[preco_b],2,",",".")." B</b></td>
		    <td style='text-align:left;padding-top:3%; font-size:12px;'> <b>R$ ".number_format($afez[preco_p],2,",",".")." P</b></td>
			<td style='text-align:left;padding-top:3%; font-size:12px;'> <b>R$ ".number_format($afez[preco_m],2,",",".")." M</b></td>
			<td style='text-align:left;padding-top:3%; font-size:12px;'> <b>R$ ".number_format($afez[preco_g],2,",",".")." G</b></td>";  
	  }else{
		  echo "<td style='text-align:left;font-size:12px;'> </td>
		    <td style='text-align:left;font-size:12px;'> </td>
			<td style='text-align:left;font-size:12px;'> </td>
			<td style='text-align:left;padding-top:3%;'></b></h4></td>
			<td style='text-align:left;padding-top:3%; font-size:12px;'><b>R$ ".number_format($afez[preco_p],2,",",".")."</b></td>";
	  }
	  
 echo "<td style='text-align:right;width:10%;'>
<form action='' method='post'>
<input type='hidden' name='id' value='".$afez[id]."'>
<input type='hidden' name='pricep' value='".$afez[preco_p]."'>
<input type='hidden' name='pricem' value='".$afez[preco_m]."'>
<input type='hidden' name='priceg' value='".$afez[preco_g]."'>
<input type='hidden' name='name' value='".$afez[nome]."'>
<input type='hidden' name='category' value='".$afez[categoria]."'>";
if($afez[preco_p] == 0 && $afez[preco_m] == 0 && $afez[preco_g] == 0) { echo "<br><font color=red>produto indisponível</font>"; } else {

	echo "<br><input type='image' name='qws' value='`' src='css/+.png'>";

	
} 
echo "
</form>
</tr>";
	  }
	  
	  
	  echo "</table>"; 
}

?>