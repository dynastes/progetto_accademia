<?php @include_once 'shared/menu.php'; ?>
<html>
	<head>
		<?php @include_once 'shared/head_inclusions.php';?>
			<?php
			if($utente->get_ruolo() !="admin"){
				header("location: index.php");
			}
		?>
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
					<p>Qui verranno elencati tutti gli editor </p>
				</div>
				
				<table class="table sortable table-striped">
				<tr>
					<th> Nome </th>
					<th> Cognome </th>
					<th> Email </th>
					<th> Indirizzo </th>
					<th> Telefono </th>
				</tr>

				<?php //qui interrogo il DB per sapere la lista di programmi pubblicati dai docenti
				//INIZIO TABELLA CONTENUTI
				$stringasql="SELECT e.Id_anagrafe, a.Nome, a.Cognome, a.Email, a.Indirizzo, a.Telefono FROM anagrafe AS a, editor AS e WHERE e.Id_anagrafe=a.Id ORDER BY a.Cognome";
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
								echo('<a href="admin_elimina_edior_query.php?ID='.$res['Id_anagrafe'].' onclick="return sicuro('.$res['Id_anagrafe'].')>  Elimina </a>');
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
