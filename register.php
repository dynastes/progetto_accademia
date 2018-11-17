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
		</div>

	</header>
	<!-- end header -->
	<section id="featured">
	<!-- start slider -->
	<div class="container">

		<section class="registerform cf">
			<form name="register" action="index_submit.php" method="get" accept-charset="utf-8">
				<h2 align="center">Registrati</h2>
				<table class="table">
					<tr>
						<td><label>Nome &nbsp; </label></td>
						<td><input name ="nome"  type="text"></td>
					</tr>
					<tr>
						<td></br></td>
						<td></br></td>
					</tr>
					<tr>
						<td><label>Cognome &nbsp;</label></td>
						<td><input name ="cognome" type="text"></td>
					</tr>
					<tr>
						<td></br></td>
						<td></br></td>
					</tr>
					<tr>
						<td><label>Data di nascita &nbsp; </label></td>
						<td><input name ="data_nascita" type="text"></td>
					</tr>
					<tr>
						<td></br></td>
						<td></br></td>
					</tr>
					<tr>
						<td><label>E-mail &nbsp;</label></td>
						<td><input name ="email" type="text"></td>
					</tr>
						<tr>
						<td></br></td>
						<td></br></td>
					</tr>
					<tr>
						<td><label>Codice fiscale &nbsp; </label></td>
						<td><input name ="cf" type="text"></td>
					</tr>
					<tr>
						<td></br></td>
						<td></br></td>
					</tr>
					<tr>
						<td><label>Indirizzo &nbsp; </label></td>
						<td><input name ="indirizzo" type="text"></td>
					</tr>
					<tr>
						<td></br></td>
						<td></br></td>
					</tr>
					<tr>
						<td><label>Residenza &nbsp;</label></td>
						<td><input name ="residenza" type="text"></td>
					</tr>
					<tr>
						<td></br></td>
						<td></br></td>
					</tr>
					<tr>
						<td><label>Telefono &nbsp;</label></td>
						<td><input name ="telefono" type="text"></td>
					</tr>
					<tr>
						<td></br></td>
						<td></br></td>
					</tr>
					<tr>
						<td><label>Password &nbsp;</label></td>
						<td><input name ="password" type="text"></td>
					</tr>
					<tr>
						<td></br></td>
						<td></br></td>
					</tr>
					<tr>
						<td><label> Tipo utente &nbsp;</label></td>
						<td>
							<select name="tipo_utente" >
								<option>Studente</option>
								<option>Docente</option>
							</select>
						</td>
					</tr>
					<tr>
						<td></br></td>
						<td></br></td>
					</tr>
					<tr>
						<td><input type="submit" value="Registrati"></td>
					</tr>
				</table>
			</form>
		</section>
	</div>
	</section>

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
