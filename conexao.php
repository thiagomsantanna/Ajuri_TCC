<?php
  /*Definindo as variáveis para a conexão - (local, usuario, senha, bd) */
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "Ajuri";

  /*Efetuando a conexão*/
  $conn = mysqli_connect($servername, $username, $password ,$dbname);

  /*Falha na conexão*/
  if(!$conn){
    die("Falha na conexão: ". mysqli_connect_error());
  }
?>