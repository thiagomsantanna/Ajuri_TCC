<?php
    $pastaArquivos='fotodeperfil/';
    $img=$_SESSION['FOTODEPERFIL'];
    $id = $_SESSION['ID'];
if(isset($_POST["alterar"])){

    if($_SESSION['TIPO'] == "advogado"){

        if($_FILES["imagem"]["name"] !=""){
				  //coletando o nome e  o nome do arquivo selecionado
			 
			 	  $nomeArquivo=$_FILES["imagem"]["name"];
			 	  $nomeTemporario=$_FILES["imagem"]["tmp_name"];
			 
			 	  //apagando a imagem anterior
			 
           unlink($pastaArquivos.$img);

			 	// tentando copiar o temporario para a pasta de arquivos
			 
				        if(move_uploaded_file($nomeTemporario,$pastaArquivos.$nomeArquivo)){
					 
                    $desc=$_POST["descricao"]; 
                    $tel=$_POST["tel"];
                    $estado=$_POST["estado"];
                    $cidade=$_POST["cidade"];
                    $area=$_POST["area"];
                    $formacao=$_POST["formacao"];
				
				 	          /*definindo o comando sql caso a imagem  tenha sido trocada*/
				 
					          $sql="update tbadvogados set TELEFONE='$tel', COD_ESTADO='$estado', COD_CIDADE='$cidade',DESCRICAO ='$desc', IMAGEM='$nomeArquivo', COD_AREA_DIREITO = '$area', LUGAR_FORMACAO = '$formacao' where ID = '$id'";
				 
				        }
		 	}else{

          $desc=$_POST["descricao"]; 
          $tel=$_POST["tel"];
          $estado=$_POST["estado"];
          $cidade=$_POST["cidade"];
          $area=$_POST["area"];
          $formacao=$_POST["formacao"];

			    /*definindo o comando sql caso a imagem nao tenha sido troca*/
          $sql="update tbadvogados set TELEFONE='$tel', COD_ESTADO='$estado', COD_CIDADE='$cidade',DESCRICAO ='$desc', COD_AREA_DIREITO = '$area', LUGAR_FORMACAO = '$formacao' where ID = '$id'";
			 
		 }
			            /*definindo a conexao - local, usuario, senha e banco de dados*/
			 
			            require "conexao.php";
			 
			            /*executando o comando sql*/
			 
			            $result = mysqli_query($conn,$sql);
			 
                  /*conferindo se o registro foi alterado*/
                  
                  if($result == true){
                    echo "<script language=javascript> perfilConfirm(); </script>";
                    

                   }else{
                    echo "<script language=javascript> perfilError(); </script>";              
                    }

                  
                 
		 }else{

      if($_FILES["imagem"]["name"] !=""){
        //coletando o nome e  o nome do arquivo selecionado
       
         $nomeArquivo=$_FILES["imagem"]["name"];
         $nomeTemporario=$_FILES["imagem"]["tmp_name"];
       
         //apagando a imagem anterior
       
         unlink($pastaArquivos.$img);
       
         // tentando copiar o temporario para a pasta de arquivos
       
         if(move_uploaded_file($nomeTemporario,$pastaArquivos.$nomeArquivo)){
           
           $desc=$_POST["descricao"];
           $tel=$_POST["tel"];
           $estado=$_POST["estado"];
           $cidade=$_POST["cidade"];
  
        
           /*definindo o comando sql caso a imagem  tenha sido trocada*/
         
           $sql="update tbusuario set TELEFONE='$tel', COD_ESTADO='$estado', COD_CIDADE='$cidade',DESCRICAO ='$desc', IMAGEM='$nomeArquivo' where ID = '$id'";
         
         }
       }else{
  
           $desc=$_POST["descricao"];
           $tel=$_POST["tel"];
           $estado=$_POST["estado"];
           $cidade=$_POST["cidade"];
  
       /*definindo o comando sql caso a imagem nao tenha sido troca*/
       $sql="update tbusuario set TELEFONE='$tel', COD_ESTADO='$estado', COD_CIDADE='$cidade',DESCRICAO ='$desc' where ID = '$id'";
       
     }
       /*definindo a conexao - local, usuario, senha e banco de dados*/
       
       require "conexao.php";
       
       /*executando o comando sql*/
       
       $result = mysqli_query($conn,$sql);
       
       /*conferindo se o registro foi alterado*/
       
       if($result == true){
        echo "<script language=javascript> perfilConfirm(); </script>";

       }else{
        echo "<script language=javascript> perfilError(); </script>";              
        }
        
       
     }

      
  }

		 	
		
	
	?>	