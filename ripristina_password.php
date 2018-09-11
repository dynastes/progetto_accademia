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
				 <div class="row">
					 <div class="col-md-2">
						 <a href="index.php">
								 <div class="navbar-header">
										 <img class="img-responsive" src="img/logo.png" alt=""/>
								 </div>
						 </a>
					 </div>
					 <div class="col-md-10">

					 </div>
				 </div>
			</div>
	</header>
	<!-- end header -->
	<!-- start slider -->
						<div class="container">
						 <!-- <a href="index.html"><img src="img/logo.png" height="20%" alt="" ></a>-->
						 <div class="row form-group">
							<a href="index.php"><b>&lt;&lt; Torna alla pagina di Login</b></a>
						 </div>
						<section class="loginform cf" >
						<form name="register" action="ripristina_password_query.php" method="post" accept-charset="utf-8">
						<div class="row form-group">
							<h2>Ripristina password:</h2>
						</div>
						<div class="row form-group">

						<div class="col-md-4">
							<label>Email:</label>
							<input type="text" class="form-control" name="email" placeholder = "inserisci la tua email" required>
						</div> <!-- /row form-group (1) -->

						<div class="col-md-4">
							<label>Scegli domanda di recupero: &nbsp;</label>
							<select class="form-control" name="domanda">
								 <option>Nome di un tuo parente</option>
								 <option>Nome del tuo posto preferito</option>
								 <option>Nome di un oggetto a te caro</option>
							</select>
						</div> <!-- /row form-group (10) -->

						<div class="col-md-4">
							<label>Risposta:</label>
							<input type="text" class="form-control" name ="risposta" placeholder = "inserisci risposta qui" required>
						</div> <!-- /row form-group (1) -->
						</div>
						<div class="row form-group pull-right">
						<div class="col-md-12">
							<input type="submit" class="btn btn-info" value="Avanti">
							</div>
						</div> <!-- /row form-group (12) -->
				</form>
			</section>
		</div>


<?php @include_once 'shared/footer.php'; ?>
</body>
</html>
