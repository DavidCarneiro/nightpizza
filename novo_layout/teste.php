
        <meta charset="utf-8">
<?php
include("includes/conexao.php");
					$up5 = $mysqli->query("select count(*) as din from dl_pedidos where pag like '%Dinheiro%' and data = '2017-01-20'");
					$din = ($up5)?$up5->fetch_array():0;
					echo $vdin = ($din)?$din[din]:0;
					$cartao = utf8_decode("Cartão");
					$up6 = $mysqli->query("select count(*) as car from dl_pedidos where pag like '%$cartao%'");
					$car = ($up6)?$up6->fetch_array():0;
					echo $vcar = ($car)?$car[car]:0;
?>