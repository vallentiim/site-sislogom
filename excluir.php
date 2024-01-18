<fieldset>
<?php
  session_start();
  //Incluindo a conexão com banco de dados
  include_once("conexao.php");	
  
  $ex_STATUS = false;
  $ex_CodRel= $_POST['relcod'];
  $ex_CodUG = $_POST['relugv'];
  $ex_MSG = 'Erro ao tentar Excluir Relatorio!';
  
 // verifica se existe o relatorio a ser deletado ....
  $ex_sSqlrel = "SELECT * FROM relatorios WHERE rel_id = '$ex_CodRel' && rel_ugv = '$ex_CodUG' ";
  $ex_sSqlrelresul = mysqli_query($conn, $ex_sSqlrel);    // execultando a SQL ...
  $ex_Count = mysqli_num_rows($ex_sSqlrelresul);


  if ($ex_Count > 0) { // Se existir relatorio inicia exclusão
  $ex_sSqlDELETE= "delete FROM relatorios WHERE rel_id = '$ex_CodRel' && rel_ugv = '$ex_CodUG'";
  $ex_sSqlexecuta = mysqli_query($conn, $ex_sSqlDELETE);    // execultando a SQL ...
  $ex_STATUS = true;
  } 
 

  if ($ex_STATUS) {
	  $ex_MSG = 'Relatorio Excluido com Sucesso !';
    } else {
	  $ex_MSG = "Não foi possivel Excluir o relatorio, tente novamente mais Tarde ! ";
	}
   
 //----------------------------------------------------------------------------------
   
   echo($ex_MSG);

   session_destroy();
?>

<br>
<a href="excluir.html">Voltar</a>
</fieldset>
