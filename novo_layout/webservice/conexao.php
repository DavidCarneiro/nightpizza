<?php
$CONN = new mysqli("zoesolucoes.mysql.dbaas.com.br","zoesolucoes","zoe@@123","zoesolucoes");
if (mysqli_connect_errno()) {
    printf("Falha na conexão: %s\n", mysqli_connect_error());
    exit();
}
/*$CONN = new mysqli("localhost","root","","site_delivery");
if (mysqli_connect_errno()) {
    printf("Falha na conexão: %s\n", mysqli_connect_error());
    exit();
}*/

?>
