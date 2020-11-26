<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Bem-vindo ao Ajuri!</title>

    <link rel="icon" type="image/png" href="images/logo3.png">


</head>
<body >

<!-- style="background-image: url('images/massaru_gordo.jpg');"-->
<?php

session_start();


if(!empty($_SESSION['ID'])){ ?>


<?php
        include_once("telapesquisaPuro.php");
        /*include_once("navbarMenu.php");*/
?>


<?php
}else{

    $_SESSION['msg'] = "
      <div class='alert alert-danger'>
          <i class='fas fa-exclamation-circle'></i>&nbsp;
          </span>

        <span class='sr-only'>
        Error:
        </span>
        Faça login para acessar!
      </div>";
    header("Location: loginTeste.php");

}
?>