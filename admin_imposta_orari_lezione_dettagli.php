<?php @include_once 'menu.php'; 
if($_SESSION['materia']===1){
	echo "<div style=\"width:100%;color:green;text-align:center;font-weight:bold;border-style:solid;border-width:2px;border-color:green;background-color:#81F79F;\">Modifica effettuata correttamente</div>";
	$_SESSION['materia']=0;
}
/*$db="9:00";
$date = date('H:i', strtotime($db));
echo $date;*/
$idMateria=$_POST['id-materia'];
?>
<html>
	<head>
		<meta charset="utf-8">
		<title>Gestionale Kandinskij</title>
		<?php @include_once 'shared/head_inclusions.php';?>>

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
					<b>Benvenuto <?php echo $utente->nome; ?>!</b>
				</div>
				<div id="avvisi">
					<h1>Cambia orario delle lezioni</h1>
					<p>Qui di seguito sarà visualizzato l'orario attualmente impostato per la lezione scelta. Una volta cambiato, premere "Cambia Orario" per salvare le modifiche</p>
					<form method="post" action="admin_imposta_orari_lezione_query.php" name="professore-materia">
						
						<?php
							$sqlMateria="SELECT Nome_materia, Orario_inizio, Orario_fine FROM materie WHERE Id=".$idMateria;
							//echo $sqlMateria;
							$res=$connessione->query($sqlMateria);
							$resMateria=$res->fetch_assoc();
						?>
						<label>Nome materia: &nbsp;</label>
						<span><?php echo $resMateria["Nome_materia"]; ?></span><input type="text" name="id-materia" value="<?php echo $idMateria; ?>" hidden><br/>
						<label>Orario inizio lezione: &nbsp;</label><input type="text" name="orario-inizio" value="<?php echo $resMateria["Orario_inizio"]; ?>">
						<label>&nbsp; orario fine lezione: &nbsp;</label><input type="text" name="orario-fine" value="<?php echo $resMateria["Orario_fine"]; ?>">
						<input  type="submit" value="Cambia orario per questa lezione">
					</form>
				</div>
			</div>
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
