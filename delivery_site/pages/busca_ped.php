<head>

</head>
<div class="container marketing" style="margin-top:5%;">
<div class="wrapper">
<div style="float:left;margin:2% 4% 2% 2%;"><iframe src="<?=$map;?>" width="250" height="150" frameborder="0" style="border:0"></iframe></div>
<div style="width:100%;height:40%;background-color:#F2F3F3;padding:1%;border:thin solid #D6D6D6;margin-bottom:2%;">
<img src="css/logo.png" style="margin:0 2% 0 2%;float:right;"width="30%" height="30%"/>
<h3><?=$cfg[empresa];?></h3>

 <?=$cfg[diasf];?> das <?=$cfg[horario];?>:00 &agrave;s <?=$cfg[horario2];?>:00.<br />
<h4><span class="glyphicon glyphicon-time" aria-hidden="true" style="margin-right:0.5%;height:5%;color:#BFBFC0;" ></span>  <?=$cfg[entrega_min];?> 
<span class="glyphicon glyphicon-thumbs-up" aria-hidden="true" style="margin-right:0.5%;height:5%;margin-left:2%;color:#BFBFC0;"></span>  </h4>
<div style="clear:both;"></div>
</div>

	<table width="68%">
	<tr>
	<td>
	
	
	<form action="" method="post" enctype="multipart/form-data">


<td><input type="text" class="form-control" name="id" placeholder="Número do pedido" style="width:98%;padding:2.5%;height:20%;color:#A9A9A9;font-size:16px;"></td>
<td width="50">
<input type="submit" name="go" value="Pesquisar" class="btn btn-lg btn-info">
</td>
</form>


	</td>
	</tr>
	</table>
	<div style="width:68%;max-width:80%;">
<div>
<div class="page-header">
<h2><i class="fa fa-cutlery" aria-hidden="true"></i> Consulte seu Pedido</h2>
</div>
<p class="lead">
</div>
</div>
<?php
if($_POST['go'] == 'Pesquisar'){
	//echo '<script>alert("entrou");</script>';
	echo '<script>location.href="?page=pedido&id='.$_POST['id'].'"</script>';
}
?>
