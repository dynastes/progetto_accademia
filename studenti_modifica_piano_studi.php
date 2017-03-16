<?php @include_once 'menu.php'; 
function coloraRighe($a){
	if($a==="Base"){
		return ' background-color:#AACCFF;';
	} else if($a==="Caratterizzante"){
		return ' background-color:#F2FFAA;';
	} else if($a==="Integrativa"){
		return ' background-color:#EEAAFF;';
	}
}

?>
<html>
	<head>
		<?php @include_once 'shared/head_inclusions.php';?>

	</head>
	<body>
		<div id="testata">
			<img src="img/logo.png">
		</div>
		<div id="principale">
			<div id="menu">
			<!-- INIZIO CARICAMENTO MENU -->
				<?php
					menu();
				?>
			</div> <!-- FINE MENU -->

			<div id="contenuto">
				<div id="benvenuto">
					<b>Benvenuto <?php echo $utente->nome; ?></b>
				</div>
				<div id="avvisi">
				<p>Scrivi qui di seguito la materia che vorresti sostituire e la materia con cui vorresti rimpiazzarla</p>
					<div id="elenco-avvisi">
						<form method="post" action="studenti_modifica_piano_studi_query.php">
							<div style="float:bottom;">
								<textarea name="avviso" style="width:100%;height:20%;"></textarea> 
								<input type="submit" value="Invia richiesta modifica piano di studi" style="margin-top:20px;float:right;">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<!-- INIZIO FOOTER -->
		<div id="footer" style="bottom:0px;left:0px;width:100%;background-color:black;color:white;height:40px;font-size:14px;float:left">
				<p align="center">
					Copyright © 2015 Accademia Di Belle Arti Kandinskij
				</p>
			</div> 
	</body>
</html>
