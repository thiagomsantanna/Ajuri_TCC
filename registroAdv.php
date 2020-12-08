<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../styles/master.css">
  <link rel="stylesheet" href="../styles/cadastraAluno.css">
  <link href="https://fonts.googleapis.com/css2?family=Markazi+Text:wght@500;700&family=Oswald:wght@400;700&display=swap" rel="stylesheet">
  <title>Cadastro - Ajuri</title>
</head>
<body>

  <?php
    /*definindo pasta para as fotos*/
    $pastaArquivos='fotodeperfil/';

    /*coletando o nome e o nome temporario do arquivo selecionado*/
		$nomeArquivo=$_FILES["imagem"] ["name"];
    $nomeTemporario=$_FILES ["imagem"] ["tmp_name"];

    if (move_uploaded_file($nomeTemporario,$pastaArquivos.$nomeArquivo))
		{

			    /* Pegando os dados vindos do formulário */
          $nome = $_POST["nome"]; 
          $nomeUsuario= $_POST["nomeusuario"];
          $telefone = $_POST["tel"];
          $data = $_POST["dataNasc"];
          $email = $_POST["email"];
          $senha = $_POST["senha"];
          $formacao = $_POST["formacao"];
      
          /*type select*/
          $estado = $_POST["estado"];
          $cidade = $_POST["cidade"];
          $area = $_POST["area"];

        require "conexao.php";

        /* 2-Definindo o comando sql a ser usado */
      $sql = "insert into tbadvogados (NOME, USERNAME, TELEFONE, DATANASC, EMAIL, SENHA, COD_ESTADO, COD_CIDADE, DESCRICAO, IMAGEM,  COD_AREA_DIREITO, LUGAR_FORMACAO, TIPO) 
      values ('$nome', '$nomeUsuario', '$telefone', '$data', '$email', '$senha', '$estado', '$cidade', 'Edite seu perfil para adicionar uma descrição!', '$nomeArquivo', '$area', '$formacao', 'advogado')";

			$result = mysqli_query($conn,$sql);
			
			//conferindo se o registro foi inserido
      echo "<div>";
      if($result == true){
        header("Location: registroConfirm.php");
        
      }elseif(!$conn -> $sql){

          echo("Error description: <br>" . $conn-> error);
        
      }
      echo "<br>";
      echo "<br>";
      echo "<a href=registroAdvogado.php alt=Voltar>Voltar</a>";
      echo "</div>";
    }

  ?>
</body>
</html>