<?php @include_once 'menu.php';
$idStudente=$_GET["Id"];
$sqlCercaStudente="SELECT a.Nome, a.Cognome, s.Matricola, s.Diploma
										FROM anagrafe AS a, studenti AS s
										WHERE a.Id=".$idStudente." AND s.Id_anagrafe=".$idStudente;
$res=$connessione->query($sqlCercaStudente);
$resStudente=$res->fetch_assoc();


?>

<html>
	<head>
		<?php @include_once 'shared/head_inclusions.php';?>

	</head>
	<body>
		<div id="testata">
			<img src="img/img/logo.png">
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
					<b>Benvenuto <?php echo $utente->nome; ?>!!!</b>
					<p>In questa pagina sarà possibile inserire un nuovo studente completando i campi qui sotto.</p>
				</div>
				<form method="post" action="admin_trasforma_iscritto_in_studente_query.php">
					<table id="box-caricamenti-principale">
						<tr>
							<td class="box-programmi-caricati"><b>ID</b></td>
							<td class="box-programmi-caricati"><b>Nome</b></td>
							<td class="box-programmi-caricati"><b>Cognome</b></td>
							<td class="box-programmi-caricati"><b>Matricola</b></td>
							<td class="box-programmi-caricati"><b>Diploma</b></td>
							<td class="box-programmi-caricati"><b>Corso</b></td>
						</tr>

					<?php //qui interrogo il DB per sapere la lista di programmi pubblicati dai docenti
					//INIZIO TABELLA CONTENUTI
					$stringasql="SELECT a.Nome, a.Cognome, a.Id FROM anagrafe AS a, studenti AS s WHERE s.Id_anagrafe=a.Id AND s.Matricola=0";
					$elencoStudenti=$connessione->query($stringasql);
					//nome, cognome, matricola, diploma
						echo "<tr>";
							echo '<td class="box-programmi-caricati"><input type="text" name="id-studente" value="'.$idStudente.'" style="width:20%;"/></td>';
							echo '<td class="box-programmi-caricati">';
								echo $resStudente["Nome"];
							echo '</td>';
							echo '<td class="box-programmi-caricati">';
								echo $resStudente["Cognome"];
							echo '</td>';
							echo '<td class="box-programmi-caricati">';
								echo '<input type="text" name="matricola-studente" value="'.$resStudente["Matricola"].'">';
							echo '</td>';
							echo '<td class="box-programmi-caricati">';
								echo '<input type="text" name="diploma-studente" value="'.$resStudente["Diploma"].'" required>';
							echo '</td>';
							echo '<td class="box-programmi-caricati">';
								echo '<select name="corso-studente">';
								$sqlCorsi="SELECT Id, Nome_corso FROM corsi";
								$res=$connessione->query($sqlCorsi);
								while($resCorsi=$res->fetch_assoc()){
									echo '<option value="'.$resCorsi["Id"].'" >'.$resCorsi["Nome_corso"].'</option>';
								}
								echo '</select>';
							echo '</td>';
						echo "</tr>";
						echo '<tr><td></td><td></td><td></td><td></td><td><input type="submit" value="Crea studente" style="margin-top:20px;"/></td</tr>';
					echo "</table>";
					?>
				</form>
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
