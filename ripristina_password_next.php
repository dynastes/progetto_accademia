<?php
@session_start();
@include_once 'utente_loggato.php';
@include_once 'dbconnection.php';


?>
<?php
$utente=$_SESSION['ut'];
$utente=unserialize($utente);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>

<?php @include_once 'shared/head_inclusions.php';?>
<script src='https://www.google.com/recaptcha/api.js'></script>
<?php @include_once 'shared/menu.php';?>
</head>
<body>
<?php
if (isset ($_SESSION['autorizza_modifica'])){
	if(	$_SESSION['autorizza_modifica']==FALSE){
		echo "<div style=\"width:100%;background-color:#FF3333;text-align:center;\"><b>La pasword temporanea inserita è errata. Si prega di ricontrollare e riprovare</b></div>";

	}
	unset($_SESSION['autorizza_modifica']);
}
 ?>
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
              <div class="page-header">
 							<a href="index.php"><b>&lt;&lt; Torna alla dashboard</b></a>
 						 </div>
						 <!-- <a href="index.html"><img src="img/logo.png" height="20%" alt="" ></a>-->
						<section class="loginform cf" style="float:left;">
						<form name="register" action="ripristina_password_next_query.php" method="post" accept-charset="utf-8">
						<div class="row form-group">
							<h2>Ripristina password:</h2>
						</div>

						<div class="row form-group">
							<label>Inserisci password temporanea: </label>
							<input id="pass_temporanea" type="password" name="password_temporanea" class="form-control" placeholder="inserisci password temporanea qui" required>
						</div> <!-- /row form-group (1) -->

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
						<div class="row form-group">
							  <div class="g-recaptcha" data-sitekey="6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI"    data-callback="recaptchaCallback"></div>
						</div>
						<input type="hidden" name="id" value="<?php echo($utente->get_id()); ?>">
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
			$("#error").hide();
		}
		else {
			pass_conf.val("");
			$("#error").show();
		}
	});
	pass_conf.change(function(){
		if((pass_1.val())==(pass_conf.val())){
			$("#error").hide();
		}
		else {
			pass_conf.val("");
			$("#error").show();
		}
	});
</script>

<script>
function recaptchaCallback() {
		alert("callback");
		var captchResponse = $('#g-recaptcha-response').val();
		if (captchResponse == "") {
				$("#bottone_invia").prop("disabled",true);
		}
		else {
			$("#bottone_invia").prop("disabled",false);
		}

};
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
