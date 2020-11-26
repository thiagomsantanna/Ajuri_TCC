<?php

require "conexao.php";
$id = $_SESSION['ID'];

if(isset($_POST["alterar"])){

    if($_SESSION['TIPO'] == "advogado"){

        $nameuser = $_POST["nameuser"];
        $senha = $_POST["senha"];
        $senhaConfirma = $_POST["senha_confirma"];
        $email = $_POST["email"];


        if ($senha == "") {
            echo "<script language=javascript> senhaError(); </script>";
        } else if ($senha == $senhaConfirma) {

            $sql="update tbadvogados set USERNAME='$nameuser', EMAIL='$email', SENHA='$senha'  where ID = '$id'";
				 
             $result = mysqli_query($conn,$sql);

            if($result == true){
                echo "<script language=javascript> senhaConfirm(); </script>";
            }else{
                echo "<script language=javascript> perfilError(); </script>";              
            }

        } else {
            echo "<script language=javascript> senhaError(); </script>";
        }


		/*definindo o comando sql caso a imagem  tenha sido trocada*/
		
	}else{

        $nameuser = $_POST["nameuser"];
        $senha = $_POST["senha"];
        $senhaConfirma = $_POST["senha_confirma"];
        $email = $_POST["email"];

        if ($senha == "") {
            echo "<script language=javascript> senhaError(); </script>";
        } else if ($senha == $senhaConfirma) {

            $sql="update tbusuario set USERNAME='$nameuser', EMAIL='$email', SENHA='$senha'  where ID = '$id'";

            $result = mysqli_query($conn,$sql);
    
            if($result == true){
                echo "<script language=javascript> senhaConfirm(); </script>";
            }else{
                echo "<script language=javascript> perfilError(); </script>";              
            }	 

        } else {
            echo "<script language=javascript> senhaError(); </script>";
        }
        

        /*definindo o comando sql caso a imagem  tenha sido trocada*/
      

    }

        
       
}

      
  

		 	
		
?>	