<?php @include_once 'shared/menu.php'; ?>
<html>
	<head>
		<?php @include_once 'shared/head_inclusions.php';?>
		<script src="sorttable.js"></script>
		<?php
			if($utente->get_ruolo() !="admin" and $utente->get_ruolo() != "editor"){
				header("location: index.php");
			}
		?>
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
				$stringasql="SELECT s.Id_anagrafe, a.Nome, a.Cognome, a.Email, a.Indirizzo, a.Telefono, s.Matricola FROM anagrafe AS a, studenti AS s WHERE s.Id_anagrafe=a.Id AND s.Matricola!=0 ORDER BY a.Cognome";
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
						if($utente -> get_ruolo() == "admin"){
							echo '<td>';
								echo('<a href="admin_elimina_studente_query.php?ID='.$res['Id_anagrafe'].' onclick="return sicuro('.$res['Id_anagrafe'].')>  Elimina </a>');
							echo '</td>';
						}
					echo '</tr>';
				}
				echo "</table>";
				?>

			</div>
		</div>

		<!-- INIZIO FOOTER -->
		<?php @include_once 'shared/footer.php'; ?>
	</body>
</html>
