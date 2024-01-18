<fieldset>
<?php
  session_start();
  //Incluindo a conexão com banco de dados
  include_once("conexao.php");	

  $usu_nome    = $_POST['usunome'];
  $usu_email   = $_POST['usuemail'];
  $usu_senha   = $_POST['ususenha'];
  $usu_codug   = $_POST['usuugcodug'];
  $usu_nomeug  = $_POST['usuugnome'];
  $usu_tipousu = $_POST['usutipousuario'];  
  $usu_datatime= date("Y-m-d H:i:s"); //$_SERVER['REQUEST_TIME'];
  $usu_MSG = 'Erro no Cadastro, tente novamente !';
  
 // verifica se ja existe o usuario ....
  $usu_sSqlrel = "SELECT * FROM usuarios WHERE nome = '$usu_nome'";
  $usu_sSqlrelresul = mysqli_query($conn, $usu_sSqlrel);    // execultando a SQL ...
  $usu_Count = mysqli_num_rows($usu_sSqlrelresul);
  
  if ($usu_Count > 0) { // se encontrar registro atualiza ....
    $usu_sSqlrel = "UPDATE usuarios SET nome='$usu_nome',email='$usu_email',senha='$usu_senha',
	              situacoe_id=1,niveis_acesso_id='$usu_tipousu',created='$usu_datatime',
				  modified='$usu_datatime', ugv='$usu_codug',ugv_nome='$usu_nomeug' WHERE nome = '$usu_nome' ";
    $usu_sSqlrelresul = mysqli_query($conn, $usu_sSqlrel);    // execultando a SQL ...
	$usu_MSG = 'Usuario atualizado com sucesso !';  
  } else { // se nao encontrar registro inclui ....
	$usu_sSqlrel = "INSERT INTO usuarios(id, nome, email, senha, situacoe_id, niveis_acesso_id, created, 
	                modified, ugv, ugv_nome) VALUES ('0', '$usu_nome','$usu_email','$usu_senha','1','$usu_tipousu',
					'$usu_datatime','$usu_datatime', '$usu_codug','$usu_nomeug')";
    $usu_sSqlrelresul = mysqli_query($conn, $usu_sSqlrel);    // execultando a SQL ...
	$usu_MSG = 'Cadastro realizado com sucesso !'; 
	// $usu_MSG = $usu_sSqlrelresul.$usu_sSqlrel.$usu_Count; // somente para depurar e verificar o SQL ....
	}	
	 
	    if ($usu_sSqlrelresul) {
	    echo($usu_MSG);
	} else {
		$usu_MSG = "Falhou ao tentar iserir no Banco de Dados (" . mysqli_error($conn) . ").";
        echo($usu_MSG);
	
	}
  
?>

<br>
<a href="usuario.html">Voltar</a>
</fieldset>
