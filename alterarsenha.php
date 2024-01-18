<fieldset>
<?php
  session_start();
  //Incluindo a conexão com banco de dados
  include_once("conexao.php");	
  
  $as_atualizado = false;
  $as_email = $_POST['email'];
  $as_senhaatual = $_POST['senhaatual'];
  $as_senhanova = $_POST['senhanova'];
  $as_MSG = 'Erro ao tentar Acessar o BD !';
  
 // verifica se existe o email cadastrado e a senha atual esta correta....
  $as_sSqlrel = "SELECT * FROM usuarios WHERE email = '$as_email' && senha = '$as_senhaatual' ";
  $as_sSqlrelresul = mysqli_query($conn, $as_sSqlrel);    // execultando a SQL ...
  $as_Count = mysqli_num_rows($as_sSqlrelresul);
  
  if ($as_Count > 0) { // Se existir atualiza a senha ...
  $as_sSqlUPDATE = "UPDATE usuarios SET senha = '$as_senhanova' where email = '$as_email' ";
  $as_sSqlatuallizasenha = mysqli_query($conn, $as_sSqlUPDATE);    // execultando a SQL ...
  $as_atualizado = true;
  } 
  
  if ($as_atualizado) {
	  $as_MSG = 'Senha atuallizada com sucesso !';
    } else {
	  $as_MSG = " E-mail ou Senha Atual Incorreta. ";
	}
   
 //----------------------------------------------------------------------------------
   
   echo($as_MSG);

   session_destroy();
?>

<br>
<a href="alterarsenha.html">Voltar</a>
</fieldset>