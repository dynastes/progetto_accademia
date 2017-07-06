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
						<img src="img/logo.png" alt="" />
					</div>
				 </a>
			</div>		
	</header>
	<!-- end header -->
	<!-- start slider -->
						<div class="container">	
						 <!-- <a href="index.html"><img src="img/logo.png" height="20%" alt="" ></a>-->
						 <div class="row form-group">
							<p><a href="index.php"><b>&lt;&lt; Torna alla pagina di Login</b></a></p>
						 </div>
						<section class="loginform cf" style="float:left;">
						<form name="register" action="registrati_query.php" method="post" accept-charset="utf-8">
						<div class="row form-group">
							<h2>Ripristina password:</h2>
						</div>
						
						<div class="row form-group">
							<label>Email:</label>
							<input type="text" class="form-control" name ="nome" value = "inserisci la tua email" required>
						</div> <!-- /row form-group (1) -->	
						
						<div class="row form-group">
							<label>Scegli domanda di recupero: &nbsp;</label>
							<select class="form-control" >
								 <option>Nome di un tuo parente</option>
								 <option>Nome del tuo posto preferito</option>
								 <option>Nome di un oggetto a te caro</option>
							</select>
						</div> <!-- /row form-group (10) -->
						
						<div class="row form-group">
							<label>Risposta:</label>
							<input type="text" class="form-control" name ="nome" value = "inserisci risposta qui" required>
						</div> <!-- /row form-group (1) -->		
						
						<div class="row form-group">	
							<input type="submit" class="btn btn-info" value="Avanti">
						</div> <!-- /row form-group (12) -->
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