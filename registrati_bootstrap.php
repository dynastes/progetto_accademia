<?php
@session_start();
@include_once 'utente_loggato.php';
@include_once 'dbconnection.php';

if (isset ($_SESSION['iscritto-aggiunto'])){
	if(	$_SESSION['iscritto-aggiunto']==1){
		echo "La richiesta di iscrizione è stata inoltrata alla segreteria dell'Accademia";
		$_SESSION['iscritto-aggiunto']=0;
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

<?php @include_once 'shared/head_inclusions.php';?>
</head>
<body>


	<!-- start header -->
	<header>
		 <div class="navbar navbar-default navbar-static-top">
            <div class="container">
				<a href="index.php">
					<div class="navbar-header">
						<img src="logo.png" alt="" />
					</div>
				 </a>
			</div>		
	</header>
	<!-- end header -->
	<!-- start slider -->
		<div class="container">	
		 <!-- <a href="index.html"><img src="logo.png" height="20%" alt="" ></a>-->
		<p><a href="index.php"><b>&lt;&lt; Torna alla pagina di Login</b></a></p>
			<section class="loginform cf" style="float:left;">
				<form name="register" action="registrati_query.php" method="post" accept-charset="utf-8">
					<h2>Registrati</h2>
					<table class="table">
						<tr>
							<td><label>Nome &nbsp; </label></td>
							<td><input type="text" class="form-control" name ="nome" required></td>
						</tr>
						<tr>
							<td><label>Cognome &nbsp;</label>
							</td>
							<td><input type="text" class="form-control" name ="cognome" required></td>
						</tr>
						<tr>
							<td><label>Data di nascita &nbsp; </label></td>
							<td><div class="form-group">
									<select name="giorno-nascita">
										<?php
											for ($i=1; $i < 32; $i++) { 
												echo '<option value="'.$i.'">'.$i.'</option>';
											 }//è possibile inserire date sbagliate es: '31/Febbraio/..'
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
											for ($i=$anno; $i >= $anno-120; $i--) { 
												echo '<option value="'.$i.'">'.$i.'</option>';
											 } 
										?>
									</select>
								</div>
							</td>
						</tr>
						<tr>
							<td><label>E-mail &nbsp;</label></td>
							<td><input type="text" class="form-control" name ="email" required></td>
						</tr>
						<tr>
							<td><label>Codice fiscale &nbsp; </label></td>
							<td><input type="text" class="form-control" name ="cf" required></td>
						</tr>
						<tr>
							<td><label>Indirizzo &nbsp; </label></td>
							<td><input type="text" class="form-control" name ="indirizzo" required></td>
						</tr>
						<tr>
							<td><label>Residenza &nbsp;</label></td>
							<td><input type="text" class="form-control" name ="residenza" required></td>
						</tr>
						<tr>
							<td><label>Telefono &nbsp;</label></td>
							<td><input type="text" class="form-control" name ="telefono" required></td>
						</tr>
						<tr>
							<td><label>Password &nbsp;</label></td>
							<td><input type="password" class="form-control" name ="password" required></td>
						</tr>
						<tr>
							<td><input type="submit" class="form-control" value="Registrati"></td>
						</tr>
					</table>
				</form>		
			</section>
		</div>	
	
<!-- javascript ================================================== --><!-- Placed at the end of the document so the pages load faster -->
<!-- <script src="js/jquery.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.fancybox.pack.js"></script>
<script src="js/jquery.fancybox-media.js"></script>
<script src="js/google-code-prettify/prettify.js"></script>
<script src="js/portfolio/jquery.quicksand.js"></script>
<script src="js/portfolio/setting.js"></script>
<script src="js/jquery.flexslider.js"></script>
<script src="js/animate.js"></script>
<script src="js/custom.js"></script> -->
<?php @include_once 'shared/footer.php'; ?>
</body>
</html>
