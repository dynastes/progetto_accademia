<?php
@session_start();
@include_once 'utente_loggato.php';
@include_once 'dbconnection.php';
//@include_once 'menu.php'; 

if(	$_SESSION['iscritto-aggiunto']==1){
	echo "<div style=\"width:100%;color:green;text-align:center;font-weight:bold;border-style:solid;border-width:2px;border-color:green;background-color:#81F79F;\">
	La richiesta di iscrizione è stata inoltrata alla segreteria dell'Accademia
	</div>";
	$_SESSION['iscritto-aggiunto']=0;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Gestionale Kandinskij</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="" />
<meta name="author" content="http://bootstraptaste.com" />
<!-- css -->
<link href="css/bootstrap.min.css" rel="stylesheet" />
<link href="css/fancybox/jquery.fancybox.css" rel="stylesheet">
<link href="css/flexslider.css" rel="stylesheet" />
<link href="css/style.css" rel="stylesheet" />


<!-- Theme skin -->
<link href="skins/default.css" rel="stylesheet" />

</head>
<body>
<div id="wrapper" style="margin-bottom:5%;">
	<section id="featured">
	<!-- start header -->
			<header>
		        <div class="navbar navbar-default navbar-static-top">
		            <div class="container">
					<a href="index.html">
		                <div class="navbar-header" style="padding-left:70px;">
		                  
							<img src="logo.png" alt="" />
		                </div>
		             </a>
		        </div>
			</header>
			<!-- end header -->
	<!-- start slider -->
		<div class="container">	
		<p><a href="index.php"><b>&lt;&lt; Torna alla pagina di Login</b></a></p>
			<section class="loginform cf" style="float:left;">
				<form name="register" action="registrati_query.php" method="post" accept-charset="utf-8">
					<h2 align="center">Registrati</h2>
					<table align="center">
						<tr>
							<td>
								<label>Nome &nbsp; </label>
							</td>
							<td>
								<input name ="nome"  type="text" required>
							</td>
						</tr>
						<tr>
							<td>
								</br>
							</td>	
						</tr>
						<tr>
							<td>
								<label>Cognome &nbsp;</label>
							</td>
							<td>
								<input name ="cognome" type="text" required>
							</td>
						</tr>
						<tr>
							<td>
								</br>
							</td>	
						</tr>
						<tr>
							<td>
								<label>Data di nascita &nbsp; </label>
							</td>
							<td>
								<select name="giorno-nascita">
										<?php
										for ($i=1; $i < 32; $i++) { 
											echo '<option value="'.$i.'">'.$i.'</option>';
										 } 
										?>
									</select>
									<select name="mese-nascita">
										<option value="01">Gennaio</option>
										<option value="02">Febbraio</option>
										<option value="03">Marzo</option>
										<option value="04">Aprile</option>
										<option value="05">Maggio</option>
										<option value="06">Giugno</option>
										<option value="07">Luglio</option>
										<option value="08">Agosto</option>
										<option value="09">Settembre</option>
										<option value="10">Ottobre</option>
										<option value="11">Novembre</option>
										<option value="12">Dicembre</option>
									</select>
									<select name="anno-nascita">
										<?php
										$anno=date("Y");
										for ($i=1950; $i < $anno; $i++) { 
											echo '<option value="'.$i.'">'.$i.'</option>';
										 } 
										?>
									</select>
							</td>
						</tr>
						<tr>
							<td>
								</br>
							</td>	
						</tr>
						<tr>
							<td>
								<label>E-mail &nbsp;</label>
							</td>
							<td>
								<input name ="email" type="text" required>
							</td>
						</tr>
						<tr>
							<td>
								</br>
							</td>	
						</tr>
						<tr>
							<td>
								<label>Codice fiscale &nbsp; </label>
							</td>
							<td>
								<input name ="cf" type="text" required>	
							</td>
						</tr>
						<tr>
							<td>
								</br>
							</td>	
						</tr>
						<tr>
							<td>
								<label>Indirizzo &nbsp; </label>
							</td>
							<td>
								<input name ="indirizzo" type="text" required>
							</td>
						</tr>
						<tr>
							<td>
								</br>
							</td>	
						</tr>
						<tr>
							<td>
								<label>Residenza &nbsp;</label>
							</td>
							<td>
								<input name ="residenza" type="text" required>
							</td>
						</tr>
						<tr>
							<td>
								</br>
							</td>	
						</tr>
						<tr>
							<td>
								<label>Telefono &nbsp;</label>
							</td>
							<td>
								<input name ="telefono" type="text" required>
							</td>
						</tr>
						<tr>
							<td>
								</br>
							</td>	
						</tr>
						<tr>
							<td>
								<label>Password &nbsp;</label>
							</td>
							<td>
								<input name ="password" type="text" required>
							</td>
						</tr>
						<tr>
							<td>
								</br>
							</td>	
						</tr>
						<tr>
							<td>
								<!--label> Tipo utente &nbsp;</label>
							</td>
							<td>
								<select name="tipo_utente" >
								  <option>Studente</option>
								  <option>Docente</option>
								</select-->
							</td>
						</tr>
						<tr>
							<td>
								</br>
							</td>	
						</tr>
						<tr>
							<td>
								<input type="submit" value="Registrati">
							</td>
						</tr>
					</table>
				</form>		
			</section>
		</div>	
	</section>
</div> <!-- CHIUSURA DIV WRAPPER -->
<div class="footer" style="position:fixed;bottom:0px;left:0px;width:100%;background-color:black;color:white;">
		<p align="center">Copyright © 2015 Accademia Di Belle Arti Kandinskij <a href="" rel="nofollow" target="_blank"></a>
		</p>
	</div>
<!-- javascript ================================================== --><!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.fancybox.pack.js"></script>
<script src="js/jquery.fancybox-media.js"></script>
<script src="js/google-code-prettify/prettify.js"></script>
<script src="js/portfolio/jquery.quicksand.js"></script>
<script src="js/portfolio/setting.js"></script>
<script src="js/jquery.flexslider.js"></script>
<script src="js/animate.js"></script>
<script src="js/custom.js"></script>
</body>
</html>
