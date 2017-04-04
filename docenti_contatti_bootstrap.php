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
 

				<div class="container">
					<b>Benvenuto <?php echo $utente->nome;?>!</b>
					<p>Qui sotto vengono elencati gli avvisi pubblicati da lei (sia alla segreteria che a studenti)</p>
				</div>

		<?php @include_once 'shared/footer.php'; ?>
		
	</body>
</html>
