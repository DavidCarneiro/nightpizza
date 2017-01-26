<?php
$CONN = new mysqli("localhost","root","","partiupizza");
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
