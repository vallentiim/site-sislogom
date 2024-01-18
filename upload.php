<fieldset>
<?php
  session_start();
  //Incluindo a conexão com banco de dados
  include_once("conexao.php");	

  $enviado = false;
  $enviando = true;
  $up_anorelatorio = $_POST['anorelatorio'];
  $up_tiporelatorio = $_POST['tiporelatorio'];
  $up_mes = $_POST['mesrelatorio'];
  $up_ugv = $_SESSION['ugv'];
  $up_MSG = '';
  $up_parte = $_POST['parterel'];
  
  // AUMENTANDO O TEMPO DE ESPERA PARA REMESSA DOS ARQUIVOS E A QUANTIDADE DE MEMORIA....
  ini_set('max_execution_time','600');
  ini_set('memory_limit','512M');
  
 // verifica se o relatorio ja foi enviado ....
 if ($up_tiporelatorio == 'RELAUDITORIA') // SE FOR RELATORIO DE AUDITORIA .....
 {
  $up_sSqlrel = "SELECT * FROM relatorios WHERE rel_ugv = '$up_ugv' and rel_mes = '$up_parte' and rel_ano = '$up_anorelatorio' and rel_tipo = '$up_tiporelatorio'";
  $up_sSqlrelresul = mysqli_query($conn, $up_sSqlrel);    // execultando a SQL ...
  $up_Count = mysqli_num_rows($up_sSqlrelresul); // QUANTIDADE DE LINHAS ...
 } else {                                 // SE NÃO FOR RELATORIO DE AUDITORIA .....
  $up_sSqlrel = "SELECT * FROM relatorios WHERE rel_ugv = '$up_ugv' and rel_mes = '$up_mes' and rel_ano = '$up_anorelatorio' and rel_tipo = '$up_tiporelatorio'";
  $up_sSqlrelresul = mysqli_query($conn, $up_sSqlrel);    // execultando a SQL ...
  $up_Count = mysqli_num_rows($up_sSqlrelresul);
 }
 	 
  if ($up_Count > 0) {
	$up_MSG = 'Relatorio ja enviado, nao e possivel duplicar, confira os parametros e tente novamente.';  
	unset($enviando); // desseta a variavel para não realizar o envio de relatorio duplicado ....
  }
   
 // Organiza NOME do arquivo ...... 
 if (isset($enviando)) {
 
   // se for CONSOLIDADOS OU CONSOLIDADOSREL .zip // SE FOR RELATORIO DE CONSOLIDADO .....
   if ($up_tiporelatorio == 'CONSOLIDADOS' OR $up_tiporelatorio == 'CONSOLIDADOSREL'){
     $nome_temporario=$_FILES["Arquivo"]["tmp_name"]; // cria um arquivo temporario
     $nome_real=$up_ugv.'_'.$up_anorelatorio.'_'.$up_mes.'_'.$up_tiporelatorio.'.zip';

     $up_pasta_e_nome_real = 'dados/'.$nome_real;
     copy($nome_temporario,$up_pasta_e_nome_real);
     } 
     
	 // SE FOR RELATORIO EM PDF RMA/RMB/RSD/RPCM/REEP .....
    if ($up_tiporelatorio == 'RMA' OR $up_tiporelatorio == 'RMB' OR $up_tiporelatorio == 'RSD' OR $up_tiporelatorio == 'RPCM' OR $up_tiporelatorio == 'REEP')
     {
     $nome_temporario=$_FILES["Arquivo"]["tmp_name"]; // cria um arquivo temporario
     $nome_real=$up_ugv.'_'.$up_anorelatorio.'_'.$up_mes.'_'.$up_tiporelatorio.'.pdf';

     $up_pasta_e_nome_real = 'dados/'.$nome_real;
     copy($nome_temporario,$up_pasta_e_nome_real);
     }

    // se for auditoria .zip // SE FOR RELATORIO DE AUDITORIA .....
   if ($up_tiporelatorio == 'RELAUDITORIA')
   {
     $nome_temporario=$_FILES["Arquivo"]["tmp_name"]; // cria um arquivo temporario
     $nome_real=$up_ugv.'_'.$up_anorelatorio.'_'.$up_parte.'_'.$up_tiporelatorio.'.zip';
	 
//     $ftp_server = '10.46.194.104';
//     $ftp_user_name = 'sislogom';
//     $ftp_user_pass = 'Ptmrdj@m015';
//
//     //Arquivo de origem
//     $file = $nome_temporario;
//     //Aonde será salvo
//     $remote_file = $nome_real;

//     $conn_id = ftp_connect($ftp_server);
//     $login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);

//    if (ftp_put($conn_id, $remote_file, $file, FTP_ASCII)) {
//       echo "Upload de $file completo\n";
//       } else {
//       echo "Erro ao enviar o $file\n";
//     }
     
//	 $up_pasta_e_nome_real = ftp_pwd($conn_id).'/'.$nome_real;  

//     echo $up_pasta_e_nome_real;	 

//	 ftp_close($conn_id);
	 
	   
	 
   	$up_pasta_e_nome_real = 'dados/'.$nome_real;
  	copy($nome_temporario,$up_pasta_e_nome_real);
   }
   
   if (isset($up_anorelatorio) && isset($up_tiporelatorio)){
	//INSERE RELATORIO NA TABELA ...
	 if ($up_tiporelatorio == 'RELAUDITORIA') { // SE FOR RELATORIO DE AUDITORIA POIS UTILIZAR ARQUIVO EM PARTES .....
		 $up_Sql = "INSERT INTO relatorios (rel_id,rel_nome,rel_tipo,rel_ano,rel_ugv,rel_mes) VALUES (NULL,'$up_pasta_e_nome_real','$up_tiporelatorio', '$up_anorelatorio', '$up_ugv','$up_parte')";
	     $up_SqlInsert = mysqli_query($conn, $up_Sql);             // execultando a SQL ...  
	 } else {                                  // SE FOR OS DEMAIS RELATORIOS .....
		 $up_Sql = "INSERT INTO relatorios (rel_id,rel_nome,rel_tipo,rel_ano,rel_ugv,rel_mes) VALUES (NULL,'$up_pasta_e_nome_real','$up_tiporelatorio', '$up_anorelatorio', '$up_ugv','$up_mes')";
	     $up_SqlInsert = mysqli_query($conn, $up_Sql);             // execultando a SQL ...
	 }
	
        // PEGA A CHAVE PRIMARIA QUE FOI INSERIDA PARA MOSTRAR NA MENSAGEM ....
        $up_Sql_chave= 'SELECT max(rel_id) as rel_id FROM relatorios'; 
        $up_Sqlchave = mysqli_query($conn, $up_Sql_chave); // EXECUTA A QUERY ...
        $up_resultado= mysqli_fetch_assoc($up_Sqlchave);  // RESULTADO COM APENAS UMA LINHA...
        $up_ChavePrimariadorelatorio = $up_resultado['rel_id'];
	
	if ($up_SqlInsert) {
		$up_MSG = 'Upload Realizado, Chave de validacao Nr: CH00'.$up_ChavePrimariadorelatorio;
	} else {
		$up_MSG = "Falhou ao tentar iserir no Banco de Dados (" . mysqli_error($conn) . ").";
	}	
	//=====================================================================
   }
    echo($up_MSG);
    unset($enviando); 
  } else { 
   echo($up_MSG); 
 }
?>

<br>
<a href="upload.html">Voltar</a>
</fieldset>
