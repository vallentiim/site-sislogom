<?php
	session_start();	
	//Incluindo a conexão com banco de dados
	include_once("conexao.php");	
	//O campo usuário e senha preenchido entra no if para validar
	if((isset($_POST['email'])) && (isset($_POST['senha']))){
		$loginusuario = $_POST['email'];
        $loginsenha   = $_POST['senha'];
        //$usuario = mysqli_real_escape_string($conn, $_POST['email']); //Escapar de caracteres especiais, como aspas, prevenindo SQL injection
		//$senha = mysqli_real_escape_string($conn, $_POST['senha']);
		//$senha = md5($senha);
			
		//Buscar na tabela usuario o usuário que corresponde com os dados digitado no formulário
		$sSql              = "SELECT * FROM usuarios WHERE email = '$loginusuario' && senha = '$loginsenha' LIMIT 1";
		$resultado_usuario = mysqli_query($conn, $sSql);             // execultando a SQL ...
		$resultado         = mysqli_fetch_assoc($resultado_usuario); // comando para pegar a linha da consulta SQL...
		
		//Encontrado um usuario na tabela usuário com os mesmos dados digitado no formulário
		if(isset($resultado)){ // se $resultado tiver algum valor então pega os valores da tabela e registram na SESSÃO... 
			$_SESSION['usuarioId']                     = $resultado['id'];
			$_SESSION['usuarioNome']                   = $resultado['nome'];
			$_SESSION['usuarioNiveisAcessoId']         = $resultado['niveis_acesso_id'];
			$_SESSION['usuarioEmail']                  = $resultado['email'];
			$_SESSION['ugv']                           = $resultado['ugv'];
			$_SESSION['ugv_nome']                      = $resultado['ugv_nome'];
            // VERIFICA QUAL O NIVEL DE ACESSO ....---------------------------------------------------------------
			if($_SESSION['usuarioNiveisAcessoId']      == "1"){ // cadastrador de usuario ...
				header("Location: usuario.html");
			}elseif ($_SESSION['usuarioNiveisAcessoId'] == "2"){ // usuario avançado ...
				header("Location: relatorios_gerenciais.html");
			}elseif ($_SESSION['usuarioNiveisAcessoId'] == "3"){ // usuario comum ...
				header("Location: upload.html");
			} else {
			        $_SESSION['loginErro'] = "Usuário ou senha inválido";
           	        header("Location: index.php");
				    }
		//Não foi encontrado um usuario na tabela usuário com os mesmos dados digitado no formulário
		//redireciona o usuario para a página de login
		}else{	
			//Váriavel global recebendo a mensagem de erro
			$_SESSION['loginErro'] = "Usuário ou senha Inexistente";
			header("Location: index.php");
		}
	//O campo usuário e senha não preenchido entra no else e redireciona o usuário para a página de login
	}else{
		$_SESSION['loginErro'] = "Usuário ou senha inválido";
		header("Location: index.php");
	}
?>