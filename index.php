<?php
@session_start();
@include_once 'utente_loggato.php';
@include_once 'dbconnection.php';
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
<div id="wrapper">
	<!-- start header -->
	<header>
        <div class="navbar navbar-default navbar-static-top">
            <div class="container">
			<a href="index.html">
                <div class="navbar-header">
                  
					<img src="logo.png" alt="" />
                </div>
             </a>
        </div>
	</header>
	<!-- end header -->
	<section id="featured">
	<!-- start slider -->
	<div class="container">
		<section class="loginform cf">
		<form name="login" action="index_submit" method="get" accept-charset="utf-8">
			<table align="center" >
			<tr>
				<td>
					<label for="usermail">Email &nbsp;</label>
				
				</td>
				<td>
					
					<input type="email" name="usermail" placeholder="yourname@email.com" required>
				</td>
			</tr>
			<tr>
			<td>
			</br>
			</td>
			
			</tr>
			
			<tr>
				<td>
					<label for="password">Password  &nbsp;</label>
				
				</td>
				<td>
				
					<input type="password" name="password" placeholder="password" required>
				</td>
			</tr>
			<tr>
			<td>
			</br>
			</td>
			
			</tr>
			<tr>
				<td>
					<input type="submit" value="Login">
				</td>
			</tr>
			<tr>
			<td>
			</br>
			</td>
			
			</tr>
			<tr>
			<td>
			<a href="register.html">Registrati</a>
			</br>
			<a href="">Password dimenticata ? </a>
			</td>
			
			</tr>
			</table>
			<div class="footer" style="position:fixed;bottom:0px;left:0px;width:100%;background-color:black;color:white;">


				<p align="center">
				Copyright © 2015 Accademia Di Belle Arti Kandinskij
				<a href="" rel="nofollow" target="_blank"></a>
				</p>



			</div>
		</form>
			
	</section>
	<!-- INSERIRE QUI IL FORM PER IL LOGIN -->
	
	</div>	

	</section>
	
	
	
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
