<?php @include_once 'menu_bootstrap.php'; ?>
<html>
	<head>
		<?php @include_once 'shared/head_inclusions.php';?>

	</head>
	<body>
		
			<div class="container" >
			<!-- INIZIO CARICAMENTO MENU -->
				<?php
					menu();
				?>
			<!-- FINE MENU -->

				
					<b>Benvenuto <?php echo $utente->nome; ?>!!!</b>
					<p>In questa pagina sarà possibile cambiare lo status di un iscritto in studente effettivo dell'accademia. Ecco qui sotto l'elenco degli studenti che ancora non sono stati immatricolati</p>
				
				
				<table class="table table-striped">
				<tr>
					<td><b> Nome </b> </td>
					<td><b>Cognome</b></td>
					<td><b>Trasforma in studente</b></td>
					<td>Cancella iscritto</b></td>
				</tr>

				<?php //qui interrogo il DB per sapere la lista di programmi pubblicati dai docenti
				//INIZIO TABELLA CONTENUTI
				$stringasql="SELECT a.Nome, a.Cognome, a.Id FROM anagrafe AS a, studenti AS s WHERE s.Id_anagrafe=a.Id AND s.Matricola=0";
				$elencoStudenti=$connessione->query($stringasql);
				while($res=$elencoStudenti->fetch_assoc()){
					echo "<tr>";
						echo '<td class="box-programmi-caricati">';
							echo $res["Nome"];
						echo '</td>';
						echo '<td class="box-programmi-caricati">';
							echo $res["Cognome"];
						echo '</td>';
						echo '<td class="box-programmi-caricati">';
							echo '<a href="admin_trasforma_iscritto_in_studente_dettagli.php?Id='.$res["Id"].'">Converti iscritto in Studente</a>';
						echo '</td>';
						echo '<td class="box-programmi-caricati">';
							echo '<a href="admin_trasforma_iscritto_in_studente_cancella.php?Id='.$res["Id"].'"><b>X</b></a>';
						echo '</td>';
					echo "</tr>";
				}
				echo "</table>";
				?>
				
			</div>
	

<!-- INIZIO FOOTER -->
		<?php @include_once 'shared/footer.php';?>
	</body>
</html>
