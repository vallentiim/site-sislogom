<!DOCTYPE html>
<html lang="en">
<head>
	<title>Sislogon - Vs 2.0</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body style="background-color: #00FF00;">
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form">
				      <img src="imagens/logo-om.png" align="right">
					 				  
					  <label> 
                      <font size="2" align="middle">SEF - Secretaria de Economia e Finanças                     </font><br> 
                      <font size="5" align="middle">7º Centro de Gestão, Contabilidade e Finanças do Exército   </font><br>
                      <font size="2" align="right-side">GERINDO RECURSOS PARA GERAR PODER DE COMBATE!           </font>
                      </label>
					
					<br><br>
					<!-- BOTOES-->					
					<div class="wrap-input100 validate-input" >
					<button class="login100-form-btn"><a href="usuario.html"  > Voltar  </a> </button>
                    </div>
										
					<div class="wrap-input100 validate-input" > 
					<button class="login100-form-btn"><a href="index.php"  >Sair  </a> </button>
					</div>

					<div class="flex-sb-m w-full p-t-3 p-b-32">
						<div class="contact100-form-checkbox">  				</div>
						<div>							                        </div>
					</div>
			
					<div class="container-login100-form-btn"> 					</div>
					<div class="text-center p-t-46 p-b-20">  					</div>
					<div class="login100-form-social flex-c-m">					</div>
				</form>
<!--===================================AREA CENTRAL============================================================-->
				<div class="login100-more" style="background-image: url('images/teste.jpg');">
				 
   <fieldset class="container-login100-form-btn">  
 
   <form action="exibe_relatorios_gerenciais.php" method="post" enctype="multipart/form-data" class="login100-formcentral">
    <legend class="login100-form-title"> Usuarios Cadastrados:</legend> <br>
   
   <?php // Bloco PHP .......
   session_start();
   //Incluindo a conexão com banco de dados
    include_once("conexao.php");
	
   // Filtra os relatorios da UG .....
	$exi_usu_sSql          = "SELECT * FROM usuarios";
	$exi_usu_sSqlresultado = mysqli_query($conn, $exi_usu_sSql);             // execultando a SQL ...
    ?>

   <legend> <strong> Usuario Logado:  </strong> <?php echo $_SESSION['usuarioNome'] ?> </legend>      

   <table border="5" align="center" class="alert-success" > 
	  <tr class="alert-success">
		<td align="center" valign="top" nowrap="nowrap" style="text-align:center; width:40px;"><b>Nome do Usuario</b></td>
   		<td align="center" valign="top" nowrap="nowrap" style="text-align:center; width:40px;"><b>E-mail</b></td>
		<td align="center" valign="top" nowrap="nowrap" style="text-align:center; width:30px;"><b>Senha</b></td> 
        <td align="center" valign="top" nowrap="nowrap" style="text-align:center; width:30px;"><b>Nível</b></td>         
		<td align="center" valign="top" nowrap="nowrap" style="text-align:center; width:100px;"><b>Codom</b></td>
		<td align="center" valign="top" nowrap="nowrap" style="text-align:center; width:100px;"><b>Unidade Gestora</b></td>        
     </tr>

	<?php 
	while($exi_usu_item = mysqli_fetch_array($exi_usu_sSqlresultado)) {
        //gera o nome do relatorio ....
		//$exi_rel_nomerelatorio = $exi_rel_item['rel_ugv'].'_'.$exi_rel_item['rel_ano'].'_'.$exi_rel_item['rel_mes'].'_'.$exi_rel_item['rel_tipo'];

		echo "<tr>";
		echo "<td style='text-align:center;'>" . $exi_usu_item['nome'] . "</td>";
		echo "<td style='text-align:center;'>" . $exi_usu_item['email'] . "</td>";
		echo "<td style='text-align:center;'>" . $exi_usu_item['senha'] . "</td>";
		echo "<td style='text-align:center;'>" . $exi_usu_item['niveis_acesso_id'] . "</td>";				
		echo "<td style='text-align:center;'>" . $exi_usu_item['ugv'] . "</td>";
		echo "<td style='text-align:center;'>" . $exi_usu_item['ugv_nome'] . "</td>";		
//		echo "<td style='text-align:center;'>" . "<a href=".$exi_rel_item['rel_nome']. ">".$exi_rel_nomerelatorio."</a></td>";
		echo "</tr>";                            
	} ?>
   </table>	
     
    <!-- BOTOES -->
   <br><br>
   
    
  </form>

 </fieldset> 
										 
				</div>
			</div>
		</div>
	</div>
	
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
