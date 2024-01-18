<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
	<title>Monitor de Rede - 7ªICFEx</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="Claudio Filho">
    <link rel="icon" href="imagens/icone.ico">
    
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap-theme.css" rel="stylesheet" type="text/css">
    <link href="css/signin.css" rel="stylesheet" type="text/css">
    <link href="css/cssform.css" rel="stylesheet" type="text/css">
    <style type="text/css">
    body,td,th {
	font-family: Roboto, sans-serif;
}
    </style>
<div class="configuração_do_DIV">  

  <header class="header">
  <img src="imagens/7icfex_logo_site.png">
  <label> 
   <font size="4">SEF - Secretaria de Economia e Finanças               </font><br> 
   <font size="6">7o Centro de Gestao, Contabilidade e Financas do Exército </font><br>
   <font size="4">GERINDO RECURSOS PARA GERAR PODER DE COMBATE                               </font>
  </label>

  </header>
  
  
<aside class="aside login-page form">
  <label> 
   <center><img src="icones/logo_site_monitor_3.png"></center>
   <!-- <font size="2">SEF - Secretaria de Economia e Finanças               </font><br><br> -->  
   <!-- <font size="5">7ª Inspetoria de Contabilidade e Finanças do Exército </font><br><br> -->
   <!-- <font size="2">BRAÇO NORDESTINO DA SEF                               </font><br><br> -->
   <br>
   <font size="5">MONITORAMENTO DE REDE DA 7ª ICFEx </font>
   <br><br><br><br><br><br><br><br>
   <font size="3">Desenvolvido pela Subseção de Infomática da 7ª ICFEx ©</font> 
</label>
 </aside> 

<body class="main" >  

<table border="2" cellpadding="100"> <!-- tamanho das  celulas espaços entre  as celulas bordas -->
<tbody align="center">  <!-- INICO DO T SCORPO -->

<tr> <!-- INICIO DE LINHA 1 --> 

<!-- LINKS DOS SISTEMAS -->

<td width="16,66%">
<img src="icones/intranet.png".png" width="112" height="101" alt=""><br>
Intranet/GLPI <br> 10.46.194.100 <br>
<?php 
$host = '';
exec("ping 10.46.194.100 -c 1 " . $host, $output, $result);
if ($result == 1) { ?>
<br> Status: <br>
<span style="color:red;font-weight:bold;"> Off-Line</span>    
<?php  } else { ?>
<br> Status: <br>
<span style="color:green;font-weight:bold;"> On-line</span>
<?php }; ?>
</td>

<td width="16,66%">
<img src="icones/SIMATEX.png" width="112" height="101" alt=""><br>
SIMATEx <br> 10.46.194.101 <br>
<?php 
$host = '';
exec("ping 10.46.194.101 -c 1 " . $host, $output, $result);
if ($result == 1) { ?>
<br> Status: <br>
<span style="color:red;font-weight:bold;"> Off-Line</span>    
<?php  } else { ?>
<br> Status: <br>
<span style="color:green;font-weight:bold;"> On-line</span>
<?php }; ?>
</td>

<td width="16,66%">
<img src="icones/sped.png" width="112" height="101" alt=""><br>
SPED Reserva <br> 10.46.194.102 <br>
<?php 
$host = '';
exec("ping 10.46.194.102 -c 1 " . $host, $output, $result);
if ($result == 1) { ?>
<br> Status: <br>
<span style="color:red;font-weight:bold;"> Off-Line</span>    
<?php  } else { ?>
<br> Status: <br>
<span style="color:green;font-weight:bold;"> On-line</span>
<?php }; ?>
</td>

<td width="16,66%">
<img src="icones/sisbol.png" width="112" height="101" alt=""><br>
SISBOL <br> 10.46.194.103 <br>
<?php 
$host = '';
exec("ping 10.46.194.103 -c 1 " . $host, $output, $result);
if ($result == 1) { ?>
<br> Status: <br>
<span style="color:red;font-weight:bold;"> Off-Line</span>    
<?php  } else { ?>
<br> Status: <br>
<span style="color:green;font-weight:bold;"> On-line</span>
<?php }; ?>
</td>

<td width="16,66%">
<img src="icones/vbox.png" width="112" height="101" alt=""><br>
Físico V.BOx <br> 10.46.194.104  <br>
<?php 
$host = '';
exec("ping 10.46.194.104 -c 1 " . $host, $output, $result);
if ($result == 1) { ?>
<br> Status: <br>
<span style="color:red;font-weight:bold;"> Off-Line</span>    
<?php  } else { ?>
<br> Status: <br>
<span style="color:green;font-weight:bold;"> On-line</span>
<?php }; ?>
</td>

<td width="16,66%">
<img src="icones/sisbol.png" width="112" height="101" alt=""><br>
SISBOL BackUP <br> 10.46.194.105 <br>
<?php 
$host = '';
exec("ping 10.46.194.105 -c 1 " . $host, $output, $result);
if ($result == 1) { ?>
<br> Status: <br>
<span style="color:red;font-weight:bold;"> Off-Line</span>    
<?php  } else { ?>
<br> Status: <br>
<span style="color:green;font-weight:bold;"> On-line</span>
<?php }; ?>
</td>

</tr> <!-- FIM DE LINHA 1-->

<tr> <!-- INICIO DE LINHA 2-->

<td>
<img src="icones/cam.png" width="112" height="101" alt=""><br>
Servidor de Vigilância <br> 10.46.194.106 <br>
<?php 
$host = '';
exec("ping 10.46.194.106 -c 1 " . $host, $output, $result);
if ($result == 1) { ?>
<br> Status: <br>
<span style="color:red;font-weight:bold;"> Off-Line</span>    
<?php  } else { ?>
<br> Status: <br>
<span style="color:green;font-weight:bold;"> On-line</span>
<?php }; ?>
</td>

<td>
<img src="icones/kASPERSKY.png" width="112" height="101" alt=""><br>
Console Kaspersky <br> 10.46.194.107 <br>
<?php 
$host = '';
exec("ping 10.46.194.107 -c 1 " . $host, $output, $result);
if ($result == 1) { ?>
<br> Status: <br>
<span style="color:red;font-weight:bold;"> Off-Line</span>    
<?php  } else { ?>
<br> Status: <br>
<span style="color:green;font-weight:bold;"> On-line</span>
<?php } ;?>
</td>

<td>
<img src="icones/bkp3.png" width="112" height="101" alt=""><br>
 Servidor Backup Principal <br> 10.46.194.108 <br>
<?php 
$host = '';
exec("ping 10.46.194.108 -c 1 " . $host, $output, $result);
if ($result == 1) { ?>
<br> Status: <br>
<span style="color:red;font-weight:bold;"> Off-Line</span>    
<?php  } else { ?>
<br> Status: <br>
<span style="color:green;font-weight:bold;"> On-line</span>
<?php }; ?>
</td>

<td>
<img src="icones/sped.png" width="112" height="101" alt=""><br>
 SPED  <br> 10.46.194.109 <br>
<?php 
$host = '';
exec("ping 10.46.194.109 -c 1 " . $host, $output, $result);
if ($result == 1) { ?>
<br> Status: <br>
<span style="color:red;font-weight:bold;"> Off-Line</span>    
<?php  } else { ?>
<br> Status: <br>
<span style="color:green;font-weight:bold;"> On-line</span>
<?php }; ?>
</td>

<td>
<img src="icones/samba_2.png" width="112" height="101" alt=""><br>
Zeus <br> 10.46.194.110 <br>
<?php 
$host = '';
exec("ping 10.46.194.110 -c 1 " . $host, $output, $result);
if ($result == 1) { ?>
<br> Status: <br>
<span style="color:red;font-weight:bold;"> Off-Line</span>    
<?php  } else { ?>
<br> Status: <br>
<span style="color:green;font-weight:bold;"> On-line</span>
<?php }; ?>
</td>

<td>
<img src="icones/dhcp.png" width="112" height="101" alt=""><br>
DHCP <br> 10.46.194.111 <br>
<?php 
$host = '';
exec("ping 10.46.194.111 -c 1 " . $host, $output, $result);
if ($result == 1) { ?>
<br> Status: <br>
<span style="color:red;font-weight:bold;"> Off-Line</span>    
<?php  } else { ?>
<br> Status: <br>
<span style="color:green;font-weight:bold;"> On-line</span>
<?php } ;?>
</td>

</tr> <!-- FIM DE LINHA 2-->

<tr> <!-- INICIO DE LINHA 3-->

<td>
<img src="icones/sislogon2.png" width="112" height="101" alt=""><br>
SISLOGON <br> 10.46.194.80 <br>
<?php 
$host = '';
exec("ping 10.46.194.80" . $host, $output, $result);
if ($result == 1) { ?>
<br> Status: <br>
<span style="color:red;font-weight:bold;"> Off-Line</span>    
<?php  } else { ?>
<br> Status: <br>
<span style="color:green;font-weight:bold;"> On-line</span>
<?php } ;?>
</td>

<td>
<img src="icones/IMPRESSORA.png" width="112" height="101" alt=""><br>
Impressora SSPEs <br> 10.46.194.60  <br>
<?php 
$host = '';
exec("ping 10.46.194.60 -c 1 " . $host, $output, $result);
if ($result == 1) { ?>
<br> Status: <br>
<span style="color:red;font-weight:bold;"> Off-Line</span>    
<?php  } else { ?>
<br> Status: <br>
<span style="color:green;font-weight:bold;"> On-line</span>
<?php }; ?>
</td>

<td>
<img src="icones/IMPRESSORA.png" width="112" height="101" alt=""><br>
Impressora Corredor <br> 10.46.194.61 <br>
<?php 
$host = '';
exec("ping 10.46.194.61 -c 1 " . $host, $output, $result);
if ($result == 1) { ?>
<br> Status: <br>
<span style="color:red;font-weight:bold;"> Off-Line</span>    
<?php  } else { ?>
<br> Status: <br>
<span style="color:green;font-weight:bold;"> On-line</span>
<?php }; ?>
</td>

<td>
<img src="icones/IMPRESSORA.png" width="112" height="101" alt=""><br>
Impressora S2/S3 <br> 10.46.194.62 <br>
<?php 
$host = '';
exec("ping 10.46.194.62 -c 1 " . $host, $output, $result);
if ($result == 1) { ?>
<br> Status: <br>
<span style="color:red;font-weight:bold;" background = "red"> Off-Line</span>    
<?php  } else { ?>
<br> Status: <br>
<span style="color:green;font-weight:bold;" BGCOLOR=RED > On-line</span>
<?php } ;?>
</td>

<td>
<img src="icones/VOIP.png" width="112" height="101" alt=""><br>
Servidor EbVOIP <br> 10.46.194.120 <br>
<?php 
$host = '';
exec("ping 10.46.194.120 -c 1 " . $host, $output, $result);
if ($result == 1) { ?>
<br> Status: <br>
<span style="color:red;font-weight:bold;"> Off-Line</span>    
<?php  } else { ?>
<br> Status: <br>
<span style="color:green;font-weight:bold;" > On-line</span>
<?php }; ?>
</td>

<td>
<img src="icones/VOIP.png" width="112" height="101" alt=""><br>
Servidor EbVOIP <br> 10.46.194.121 <br>
<?php 
$host = '';
exec("ping 10.46.194.121 -c 1" . $host, $output, $result);
if ($result == 1) { ?>
<br> Status: <br>
<span style="color:red;font-weight:bold;"> Off-Line</span>    
<?php  } else { ?>
<br> Status: <br>
<span style="color:green;font-weight:bold;"> On-line</span>
<?php }; ?>

</td>
</tr> <!-- FIM DE LINHA 3-->

</tbody> <!-- FIM DO T CORPO -->
</table>

</body> <!-- corpo da pagina-->

<footer class="footer">  
</footer> <!-- rodape-->

</div>

</html>
