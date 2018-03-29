<?php @include_once 'shared/menu.php'; ?>
<html>
	<head>
		<?php @include_once 'shared/head_inclusions.php';?>
		<script src="sorttable.js"></script>
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
					<p>Qui verranno elencati tutti gli studenti che sono iscritti all'accademia</p>
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
				<table class="table sortable table-striped">
				<tr>
					<th> Nome </th>
					<th> Cognome </th>
					<th> Matricola </th>
					<th> Email </th>
					<th> Indirizzo </th>
					<th> Telefono </th>
				</tr>

				<?php //qui interrogo il DB per sapere la lista di programmi pubblicati dai docenti
				//INIZIO TABELLA CONTENUTI
				$stringasql="SELECT a.Nome, a.Cognome, a.Email, a.Indirizzo, a.Telefono, s.Matricola FROM anagrafe AS a, studenti AS s WHERE s.Id_anagrafe=a.Id AND s.Matricola!=0 ORDER BY a.Cognome";
				$elencoStudenti=$connessione->query($stringasql);
				while($res=$elencoStudenti->fetch_assoc()){
					echo "<tr>";
						echo '<td class="box-elenco-studenti">';
							echo $res["Nome"];
						echo '</td>';
						echo '<td class="box-elenco-studenti">';
							echo $res["Cognome"];
						echo '</td>';
						echo '<td class="box-elenco-studenti">';
							echo $res["Matricola"];
						echo '</td>';
						echo '<td class="box-elenco-studenti">';
							echo $res["Email"];
						echo '</td>';
						echo '<td class="box-elenco-studenti">';
							echo $res["Indirizzo"];
						echo '</td>';
						echo '<td class="box-elenco-studenti">';
							echo $res["Telefono"];
						echo '</td>';
					echo "</tr>";
				}
				echo "</table>";
				?>

			</div>
		</div>

		<!-- INIZIO FOOTER -->
		<?php @include_once 'shared/footer.php'; ?>
	</body>
</html>
