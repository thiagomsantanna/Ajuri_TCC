<?php

session_start();
session_destroy();

$_SESSION['msg'] = "<div class='alert alert-success'>Deslogado com sucesso!</div>";
header("Location: index.php");

?>