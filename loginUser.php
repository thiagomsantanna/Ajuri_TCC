<?php

session_start();

include_once ("conexao.php");

/*declarando uma variavel pro botao como true, para checar se foi de fato pressionado*/
$btnLogin = true;

/*if para fazer a filtragem do botao clicado ou nao*/
if($btnLogin){

	/*pegando os dados vindos da tela de login*/
	$usuario=$_GET["txtLogin"];
	$senha=$_GET["txtSenha"];

	/*checando se a senha e o usuario foram de fato preenchidos, ou se enviaram campos vazios */
	if((!empty($usuario)) AND (!empty($senha))){

		/* como nao estavam vazios, SQL para fazer a checagem no banco */
		$sql= "SELECT * FROM tbadvogados WHERE USERNAME = '$usuario' and SENHA = '$senha' ";
		
		$result = mysqli_query($conn,$sql);

		$dados = mysqli_fetch_array($result);


		/*verificando qual tipo de usuario está realizando login */
		if($dados['TIPO'] == "advogado"){
			/*se realmente tiver um usuario cai aq e é pego todos dados de todos campos */
			if($result){
				
				/*verificação agr de se a senha estava correta, antes tinha sido apenas verificado se o usuario existia no banco */
				if(!strcmp($senha, $dados["SENHA"])){
					

					/*pegando todos os dados e colocando em variáveis de session para uso futuro na tela de perfil */
					$cod_estado = $dados['COD_ESTADO'];
                    $cod_cidade = $dados['COD_CIDADE'];
					$cod_area_direito = $dados['COD_AREA_DIREITO'];

                    $sql2="SELECT uf FROM estados WHERE id=$cod_estado";
                    $sql3="SELECT nome_cidades FROM cidades WHERE id=$cod_cidade";
				
					$sql4="SELECT area_direito FROM tb_areas_direito WHERE ID_AREA=$cod_area_direito";

                    $result = mysqli_query($conn,$sql2);
                    $result2 = mysqli_query($conn,$sql3);

                    $dados2 = mysqli_fetch_array($result);
                    $dados3 = mysqli_fetch_array($result2);
					
					$result3 = mysqli_query($conn,$sql4);
					$dados4 = mysqli_fetch_array($result3);
                    
					
                        $_SESSION['ID'] = $dados['ID'];
                        $_SESSION['NOME'] = $dados['NOME'];
						$_SESSION['USERNAME'] = $dados['USERNAME'];
						$_SESSION['IDADE'] = $dados['DATANASC'];
						$_SESSION['TELEFONE'] = $dados['TELEFONE'];
                        $_SESSION['EMAIL'] = $dados['EMAIL'];
						$_SESSION['SENHA'] = $dados['SENHA'];
						$_SESSION['DESCRICAO'] = $dados['DESCRICAO'];
						$_SESSION['LUGAR_FORMACAO'] = $dados['LUGAR_FORMACAO'];
						$_SESSION['FOTODEPERFIL'] = $dados['IMAGEM'];
                        $_SESSION['NOME_ESTADO'] = $dados2['uf'];
                        $_SESSION['NOME_CIDADE'] = $dados3['nome_cidades'];
						$_SESSION['area_direito'] = $dados4['area_direito'];
						$_SESSION['TIPO'] = $dados['TIPO'];
						
						/* leva para essa página após toda a verificação */
                        header("Location: menu.php");
				}else{
					
					$_SESSION['msg'] = "<div class='alert alert-danger'><i class='far fa-times-circle'></i>&nbsp;Login ou senha incorreto!</div>";
					header("Location: index.php");
	
				}

			}
		}else{

			$sqlUser= "SELECT * FROM tbusuario WHERE USERNAME = '$usuario' and SENHA = '$senha' ";
		
			$resultUser = mysqli_query($conn,$sqlUser);
	
			$dadosUser = mysqli_fetch_array($resultUser);

			if($resultUser){
				
				/*verificação agr de se a senha estava correta, antes tinha sido apenas verificado se o usuario existia no banco */
				if(!strcmp($senha, $dadosUser["SENHA"])){
					
					/*pegando todos os dados e colocando em variáveis de session para uso futuro na tela de perfil */
					$cod_estado = $dadosUser['COD_ESTADO'];
                    $cod_cidade = $dadosUser['COD_CIDADE'];

                    $sql2="SELECT uf FROM estados WHERE id=$cod_estado";
                    $sql3="SELECT nome_cidades FROM cidades WHERE id=$cod_cidade";

                    $result = mysqli_query($conn,$sql2);
                    $result2 = mysqli_query($conn,$sql3);

                    $dados2 = mysqli_fetch_array($result);
                    $dados3 = mysqli_fetch_array($result2);

                
                        $_SESSION['ID'] = $dadosUser['ID'];
                        $_SESSION['NOME'] = $dadosUser['NOME'];
						$_SESSION['USERNAME'] = $dadosUser['USERNAME'];
						$_SESSION['IDADE'] = $dadosUser['DATANASC'];
						$_SESSION['TELEFONE'] = $dadosUser['TELEFONE'];
                        $_SESSION['EMAIL'] = $dadosUser['EMAIL'];
						$_SESSION['SENHA'] = $dadosUser['SENHA'];
						$_SESSION['DESCRICAO'] = $dadosUser['DESCRICAO'];
						$_SESSION['FOTODEPERFIL'] = $dadosUser['IMAGEM'];
						$_SESSION['TIPO'] = $dadosUser['TIPO'];
                        $_SESSION['NOME_ESTADO'] = $dados2['uf'];
						$_SESSION['NOME_CIDADE'] = $dados3['nome_cidades'];
						

						/* leva para essa página após toda a verificação */
                        header("Location: menu.php");
				}else{
					
					$_SESSION['msg'] = "<div class='alert alert-danger'><i class='far fa-times-circle'></i>&nbsp;Login ou senha incorreto!</div>";
					header("Location: index.php");
	
				}
			}

		}
	}else{

		$_SESSION['msg'] = "<div class='alert alert-danger'><i class='fas fa-exclamation-circle'></i>&nbsp;Preencha os Campos!</div>";
		header("Location: index.php");

	}

}else{

	$_SESSION['msg'] = "<div class='alert alert-danger'><i class='far fa-times-circle'></i>&nbsp;Página não encontrada</div>";
	header("Location: index.php");

}

?>