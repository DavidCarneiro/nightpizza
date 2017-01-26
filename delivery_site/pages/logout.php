<?php
session_start();
unset($_SESSION['sessao_user']);
header("location:?page=inicio");
?>