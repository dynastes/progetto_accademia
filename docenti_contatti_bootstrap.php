<html>
	<head>
		<?php @include_once 'shared/head_inclusions.php';?>

	</head>
	<body>
	<?php @include_once 'menu_bootstrap.php'; ?>

	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
   <?php
					menu();
				?>
	</div>			
 

<div id="contenuto">
				<div id="benvenuto">
					<b>Benvenuto <?php echo $utente->nome;?>!</b>
					<p>Qui sotto vengono elencati gli avvisi pubblicati da lei (sia alla segreteria che a studenti)</p>
				</div>

		<!-- INIZIO FOOTER -->
		<div id="footer" style="bottom:0px;left:0px;width:100%;background-color:black;color:white;height:40px;font-size:14px;float:left">
				<p align="center">
				Copyright © 2015 Accademia Di Belle Arti Kandinskij
				<a href="" rel="nofollow" target="_blank"></a>
				</p>
			</div> 
	</body>
</html>
