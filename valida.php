<?php

session_start();

include_once("conexao.php");

$btnLogin = true;

if($btnLogin){

	$usuario = $_GET["txtLogin"];
	$senha = $_GET["txtSenha"];
	//echo "$usuario - $senha";
	
	if((!empty($usuario)) AND (!empty($senha))){
		//Gerar a senha criptografa
		//echo password_hash($senha, PASSWORD_DEFAULT);
		//Pesquisar o usuário no BD
		/*$result_usuario = "SELECT ID, NOME, EMAIL, SENHA FROM tbUsuario WHERE USERNAME='$usuario' LIMIT 1";*/
		
		$sql = "SELECT ID, NOME, EMAIL, SENHA FROM tbUsuario WHERE USERNAME='$usuario' AND SENHA='$senha'";

        
        $resultado_usuario = mysqli_query($conn, $sql);
        
		if(($resultado_usuario) AND ($resultado_usuario->num_rows != 1)){

			$row_usuario = mysqli_fetch_assoc($resultado_usuario);

			if(password_verify($senha, $row_usuario['SENHA'])){

                $_SESSION['ID'] = $row_usuario['ID'];
				$_SESSION['NOME'] = $row_usuario['NOME'];
				$_SESSION['EMAIL'] = $row_usuario['EMAIL'];

				include_once("menu.php");
				
			}else{
				$_SESSION['msg'] = "<div class='alert alert-danger'><i class='far fa-times-circle'></i>Login ou senha incorreto!</div>";
				header("Location: loginTeste.php");
			}
		}
	}else{
		$_SESSION['msg'] = "<div class='alert alert-danger'>Preencha os Campos!</div>";
		header("Location: loginTeste.php");
	}
}else{
	$_SESSION['msg'] = "<div class='alert alert-danger'>Página não encontrada</div>";
	header("Location: loginTeste.php");
}

?>