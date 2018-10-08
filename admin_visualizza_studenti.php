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
				<label>Cerca studenti</label>
				<div class="row">
					<div class="col-md-4">
							<input type="text" class="form-control" id="cerca_criteri" placeholder="Nome,Cognome,Matricola,Indirizzo, ecc..." />
					</div>
					<div class="col-md-8">

					</div>
				</div>
				<table class="table sortable table-striped" id="studenti_tabella">
				<tr>
					<th> Nome </th>
					<th> Cognome </th>
					<th> Matricola </th>
					<th> Email </th>
					<th> Indirizzo </th>
					<th> Telefono </th>
					<th> Anno </th>
				</tr>

				<?php //qui interrogo il DB per sapere la lista di programmi pubblicati dai docenti
				//INIZIO TABELLA CONTENUTI
				$stringasql="SELECT s.Id_anagrafe, a.Nome, a.Cognome, a.Email, a.Indirizzo, a.Telefono, s.Matricola, s.Anno FROM anagrafe AS a, studenti AS s WHERE s.Id_anagrafe=a.Id AND s.Matricola!=0 ORDER BY a.Cognome";
				$elencoStudenti=$connessione->query($stringasql);
				while($res=$elencoStudenti->fetch_assoc()){
					echo "<tr class='ricerca_row'>";
						echo '<td class="box-elenco-studenti ricerca">';
							echo $res["Nome"];
						echo '</td>';
						echo '<td class="box-elenco-studenti ricerca">';
							echo $res["Cognome"];
						echo '</td>';
						echo '<td class="box-elenco-studenti ricerca">';
							echo $res["Matricola"];
						echo '</td>';
						echo '<td class="box-elenco-studenti ricerca">';
							echo $res["Email"];
						echo '</td>';
						echo '<td class="box-elenco-studenti ricerca">';
							echo $res["Indirizzo"];
						echo '</td>';
						echo '<td class="box-elenco-studenti ricerca">';
							echo $res["Telefono"];
						echo '</td>';
						echo '<td class="box-elenco-studenti ricerca">';
							echo $res["Anno"];
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
		<script>
			var tabella_completa = $("#studenti_tabella").html();
			$("#cerca_criteri").keyup(function(){
				var input = $("#cerca_criteri").val();
				var filter = input.toUpperCase();
				var gestore_tabella = $("#studenti_tabella"); //serve per gestire il contenuto della tabella quando facciamo le ricerche
				gestore_tabella.html(tabella_completa); //diamo i valori originali della tabella per le nuove ricerche
				var table = $("#studenti_tabella .ricerca_row"); // serve per scorrere le righe eccetto quella dell'header;
				table.each(function(){
					parent = $(this);
					parent.detach();
					parent.find(".ricerca").each(function(){
						td = $(this).html().toUpperCase();
						if(td.includes(filter)){
							parent.appendTo("table");
						}
					});
				});
			});
		</script>
		<!-- INIZIO FOOTER -->
		<?php @include_once 'shared/footer.php'; ?>
	</body>
</html>
