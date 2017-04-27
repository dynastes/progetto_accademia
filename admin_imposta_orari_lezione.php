<?php @include_once 'shared/menu.php'; 
if (isset($_SESSION['modifica-orario']))
{
	if($_SESSION['modifica-orario']===1){
		echo "<div style=\"width:100%;color:green;text-align:center;font-weight:bold;border-style:solid;border-width:2px;border-color:green;background-color:#81F79F;\">Modifica effettuata correttamente</div>";
		$_SESSION['modifica-orario']=0;


	}
}
?>
<html>
	<head>
		<?php @include_once 'shared/head_inclusions.php';?>
		<?php @include_once 'shared/head_fullcalendar_inclusions.php';?>
	</head>
	<body>
				<!-- INIZIO CARICAMENTO MENU -->
					<?php
						menu();
					?>
				<!-- FINE MENU -->

				<div class="container">
						<b>Benvenuto <?php echo $utente->nome; ?>!</b>
					<div id="avvisi">
						<br />
						<h1>Mostra/inserisci eventi al calendario</h1>
						<br />
						<p>Clicca nel calendario per inserire un nuovo evento</p>
						<!--form method="post" action="admin_imposta_orari_lezione_dettagli.php" name="professore-materia">
							<select name="id-materia">
							<?php
								$sqlMaterie="SELECT Id, Nome_materia FROM materie ORDER BY Nome_materia DESC";
								$res=$connessione->query($sqlMaterie);
								while($resMaterie=$res->fetch_assoc()){
									echo '<option value="'.$resMaterie["Id"].'">'.$resMaterie["Nome_materia"].'</option>';
								}
							?>
							</select>
							<input  type="submit" value="Cambia orario per questa lezione">
						</form-->

						<label>Scegli il colore con cui evidenziare l'evento che vuoi aggiungere:</label>
						<select id="colore_evento">
							<option value="red" style="background-color:red;color: white;">Esami</option>
							<option value="blue" style="background-color:blue; color: white;">Lezioni</option>
							<option value="orange" style="background-color:orange;">Conferenze</option>
							<option value="yellow" style="background-color:yellow">Eventi</option>
						</select>
					</div>
				</div>
				<div id="calendar" style="margin-top:100px; margin-bottom:50px;"></div>
		<!-- INIZIO FOOTER -->
		<?php @include_once 'shared/footer.php';?>
	</body>
</html>
