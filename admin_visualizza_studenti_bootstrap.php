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

				
					<b>Benvenuto <?php echo $utente->nome; ?>!</b>
					<p>Qui verranno elencati tutti gli studenti che sono iscritti all'accademia</p>
			
				<table class="table table-striped">
				<tr>
					<td><b>Nome</b></td>
					<td><b>Cognome</b></td>
					<td><b>Matricola</b></td>
					<td><b>Email</b></td>
					<td><b>Indirizzo</b></td>
					<td><b>Telefono</b></td>
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
		

<!-- INIZIO FOOTER -->
		<?php @include_once 'shared/footer.php';?>
	</body>
</html>
