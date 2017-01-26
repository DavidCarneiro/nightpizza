<?php
session_start();
unset($_SESSION[login]);
unset($_SESSION[nome]);
header("location:?page=adm");
?>