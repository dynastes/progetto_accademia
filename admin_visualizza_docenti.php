<?php @include_once 'shared/menu.php'; ?>
<html>
	<head>
		<?php @include_once 'shared/head_inclusions.php';?>

	</head>
	<body>

		<div id="principale">
			<div id="menu">
			<!-- INIZIO CARICAMENTO MENU -->
				<?php
					menu();
				?>
			</div> <!-- FINE MENU -->

			<div class="container">
				<div id="benvenuto">
					<b>Benvenuto <?php echo $utente->nome; ?>!</b>
					<p>Qui verranno elencati tutti i docenti che sono iscritti all'accademia</p>
				</div>
				<!--div class="box-programmi-caricati">
					<p><b>Data Pubblicazione</b></p>
				</div>
				<div class="box-programmi-caricati">
					<p><b>Testo dell'avviso</b></p>
				</div>
				<div class="box-programmi-caricati">
					<p><b>Opzioni</b></p>
				</div>
				<div class="box-programmi-caricati">
					<p><b>Visibilità</b></p>
				</div-->
				<table  class="table">
				<tr>
					<td ><b>Nome</b></td>
					<td ><b>Cognome</b></td>
					<td><b>Email</b></td>
					<td ><b>Indirizzo</b></td>
					<td ><b>Telefono</b></td>
				</tr>

				<?php //qui interrogo il DB per sapere la lista di programmi pubblicati dai docenti
				//INIZIO TABELLA CONTENUTI
				$stringasql="SELECT a.Nome, a.Cognome, a.Email, a.Indirizzo, a.Telefono FROM anagrafe AS a, docenti AS d WHERE d.Id_anagrafe=a.Id ORDER BY a.Cognome";
				$elencoStudenti=$connessione->query($stringasql);
				while($res=$elencoStudenti->fetch_assoc()){
					echo "<tr>";
						echo '<td >';
							echo $res["Nome"];
						echo '</td>';
						echo '<td >';
							echo $res["Cognome"];
						echo '</td>';
						echo '<td >';
							echo $res["Email"];
						echo '</td>';
						echo '<td >';
							echo $res["Indirizzo"];
						echo '</td>';
						echo '<td >';
							echo $res["Telefono"];
						echo '</td>';
					echo "</tr>";
				}
				echo "</table>";
				?>

			</div>
		</div>
	</div>
		<!-- INIZIO FOOTER -->
		<?php @include_once 'shared/footer.php'; ?>
	</body>
</html>
