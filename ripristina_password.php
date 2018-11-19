i<?php
@session_start();
@include_once 'utente_loggato.php';
@include_once 'dbconnection.php';
?>

<!DOCTYPE htmli>
<html lang="en">
<head>

<?php @include_once 'shared/head_inclusions.php';?>
<?php
if (isset ($_SESSION['autorizza_modifica'])) {
		if  ($_SESSION['autorizza_modifica'] == 0) {
			echo "<div style=\"width:100%;background-color:#ff3333;text-align:center;\"><b>Impossibile ripristinare password! - controlla i dati inseriti e riprova.</b></div>";
			unset($_SESSION['autorizza_modifica']);
		}
}
 ?>

</head>
<body>
	<script src='https://www.google.com/recaptcha/api.js'></script>


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
						 <div class="page-header">
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
							<input type="email" class="form-control" name="email" placeholder = "inserisci la tua email" required>
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
						<div class="col-md-10">
							 <?php include("recaptcha.php"); ?>
						</div>
						<div class="col-md-2">
							<button type="button" class="btn btn-info" id="bottone_conferma" disabled> Avanti </button>
							</div>
						</div> <!-- /row form-group (12) -->
						<div id="conferma" class="text-center" style="width:50%;height:50%;background-color:white;position:fixed;top:25%;right:25%;border-radius:6px;border-style:solid;" hidden>
							<h1> Confermi ripristino password? </h1>
							<input type="submit" class="btn btn-info" value="SI">
							<button type="button" class="btn btn-danger" id="bottone_no"> NO </button>
						</div>
				</form>
			</section>
		</div>



<?php @include_once 'shared/footer.php'; ?>
</body>
<script>
	$("#bottone_conferma").click(function(){
		$("#conferma").show();
	});
	$("#bottone_no").click(function(){
		$("#conferma").hide();
	})
</script>
<script>

function recaptchaCallback() {
		var captchResponse = $('#g-recaptcha-response').val();
		if (captchResponse == "") {
				$("#bottone_conferma").prop("disabled",true);
		}
		else {
			$("#bottone_conferma").prop("disabled",false);
		}

};
</script>


</html>
