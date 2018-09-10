<?php
@session_start();
@include_once 'utente_loggato.php';
@include_once 'dbconnection.php';

if (isset ($_SESSION['autorizza_modifica'])){
	if(	$_SESSION['autorizza_modifica']==FALSE){
		header("Location: index.php");
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
							<p><a href="index.php"><b>&lt;&lt; Torna alla pagina di Login</b></a></p>
						 </div>
						<section class="loginform cf" style="float:left;">
						<form name="register" action="ripristina_password_next_query.php" method="post" accept-charset="utf-8">
						<div class="row form-group">
							<h2>Ripristina password:</h2>
						</div>

						
						<div class="row form-group">
							<label>Inserisci nuova password:</label>
							<input id="pass_1" type="password" name="password" class="form-control" placeholder="inserisci nuova password qui" required>
						</div> <!-- /row form-group (1) -->

						<div di="pass_conf" class="row form-group">
							<label>Conferma nuova password:</label>
							<input id ="pass_conf" type="password" name="password_conferma" class="form-control" placeholder="conferma nuova password qui" required>
							<div id="error" class="alert alert-danger" role="alert" hidden="true">
								<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
								<span class="sr-only">Error:</span>
								Le password non corrispondono o non è stata inserita la password di conferma
							</div>
						</div> <!-- /row form-group (1) -->
						<input type="hidden" name="id" value="<?php echo($_GET['id']); ?>">
						<div class="row form-group">
							<input id="bottone_invia" type="submit" class="btn btn-info" value="Conferma" disabled="true">
						</div> <!-- /row form-group (12) -->
				</form>
			</section>
		</div>
<script>
	var pass_1 = $("#pass_1");
 	var pass_conf = $("#pass_conf");
	pass_1.change(function(){
		if((pass_1.val())==(pass_conf.val())){
			$("#bottone_invia").prop("disabled",false);
			$("#error").hide();
		}
		else {
			$("#bottone_invia").prop("disabled",true);
			$("#error").show();
		}
	});
	pass_conf.change(function(){
		if((pass_1.val())==(pass_conf.val())){
			$("#bottone_invia").prop("disabled",false);
			$("#error").hide();
		}
		else {
			$("#bottone_invia").prop("disabled",true);
			$("#error").show();
		}
	});
</script>
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
