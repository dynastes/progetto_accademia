<?php @include_once 'menu_bootstrap.php'; 
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
		<?php @include_once 'shared/head_inclusions.php';?>>

	</head>
	<body>
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<div id="principale">
				<div id="menu">
				<!-- INIZIO CARICAMENTO MENU -->
					<?php
						menu();
					?>
				</div> <!-- FINE MENU -->

				<div class="container">
					<div id="benvenuto">
						<!--<b>Benvenuto <?php echo $utente->nome; ?>!</b>-->
					</div>
					<div id="avvisi">
						<br />
						<h1>Cambia orario delle lezioni</h1>
						<br />
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
		</div>
		<!-- INIZIO FOOTER -->
		<?php @include_once 'shared/footer.php';?>
	</body>
</html>
