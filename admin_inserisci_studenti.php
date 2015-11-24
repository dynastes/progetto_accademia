<?php @include_once 'menu.php';
if($_SESSION['studente-aggiunto']===1){
	echo "<div style=\"width:100%;color:green;text-align:center;font-weight:bold;border-style:solid;border-width:2px;border-color:green;background-color:#81F79F;\">Studente aggiunto correttamente</div>";
	$_SESSION['studente-aggiunto']=0;
}
if (isset($_POST['avviso']) && $_POST['avviso']!="postato"){
	//echo "Avviso settato!!!! ".$_POST['avviso'];
	/*$insert=$_POST['avviso'];
	if ($connessione->query($insert) === TRUE) {
		 echo "New record created successfully";
	} else {
		 echo "Error: " . $sql . "<br>" . $conn->error;
	}*/
}
?>
<html>
	<head>
		<meta charset="utf-8">
		<title>Gestionale Kandinskij</title>
		<link href="css/style_nuovo.css" rel="stylesheet" />
		<link href="css/style.css" rel="stylesheet" />

		<link href="css/bootstrap.min.css" rel="stylesheet" />
		<link href="js/fancybox/jquery.fancybox.css" rel="stylesheet">
		<link href="js/flexslider.css" rel="stylesheet" />
		<link href="css/style.css" rel="stylesheet" />
		
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	</head>
	<body>
		<div id="testata">
			<img src="img/logo.png">
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
				</div>
				<div name="avvisi" style="margin-left:20px;">
				<h2>Inserisci in dati relativi alla nuova materia</h2>
					<form method="post" action="admin_inserisci_studenti_query.php">
						<table id="box-caricamenti-principale">
							<tr>
								<td class="box-programmi-caricati"><b>Nome</b></td>
								<td class="box-programmi-caricati"><b>Cognome</b></td>
								<td class="box-programmi-caricati"><b>Matricola</b></td>
								<td class="box-programmi-caricati"><b>Diploma</b></td>
								<td class="box-programmi-caricati"><b>Corso</b></td>
							</tr>
							<tr>
								<td class="box-programmi-caricati"><input type="text" name="nome-studente" style="width:90%;" required/></td>
								<td class="box-programmi-caricati"><input type="text" name="cognome-studente" style="width:90%;" required/></td>
								<td class="box-programmi-caricati"><input type="text" name="matricola-studente" style="width:90%;" required/></td>
								<td class="box-programmi-caricati"><input type="text" name="diploma-studente" style="width:90%;"/></td>
								<td class="box-programmi-caricati">
							<?php //qui interrogo il DB per sapere la lista di programmi pubblicati dai docenti
							//INIZIO TABELLA CONTENUTI
							$stringasql="SELECT a.Nome, a.Cognome, a.Id FROM anagrafe AS a, studenti AS s WHERE s.Id_anagrafe=a.Id AND s.Matricola=0";
							$elencoStudenti=$connessione->query($stringasql);
							//nome, cognome, matricola, diploma
									echo '<select name="corso-studente">';
									$sqlCorsi="SELECT Id, Nome_corso FROM corsi";
									$res=$connessione->query($sqlCorsi);
									while($resCorsi=$res->fetch_assoc()){
										echo '<option value="'.$resCorsi["Id"].'" >'.$resCorsi["Nome_corso"].'</option>';
									}
									echo '</select>';
								echo '</td>';
							echo "</tr>";
						echo "</table>";
						?>
						<table id="box-caricamenti-principale">
							<tr>
								<td class="box-iscrizione-studenti" style="width:25%;"><b>Data di nascita</b></td>
								<td class="box-iscrizione-studenti"><b>Codice Fiscale</b></td>
								<td class="box-iscrizione-studenti"><b>Email</b></td>
								<td class="box-iscrizione-studenti"><b>Residenza</b></td>
								<td class="box-iscrizione-studenti"><b>Indirizzo</b></td>
								<td class="box-iscrizione-studenti"><b>Telefono</b></td>
							</tr>
							<tr>
								<!--td class="box-iscrizione-studenti"><input type="text" name="data-nascita" style="width:90%;"/></td-->
								<td class="box-iscrizione-studenti">
									<select name="giorno-nascita">
										<?php
										for ($i=1; $i < 32; $i++) { 
											echo '<option value="'.$i.'">'.$i.'</option>';
										 } 
										?>
									</select>
									<select name="mese-nascita">
										<option value="01">Gennaio</option>
										<option value="02">Febbraio</option>
										<option value="03">Marzo</option>
										<option value="04">Aprile</option>
										<option value="05">Maggio</option>
										<option value="06">Giugno</option>
										<option value="07">Luglio</option>
										<option value="08">Agosto</option>
										<option value="09">Settembre</option>
										<option value="10">Ottobre</option>
										<option value="11">Novembre</option>
										<option value="12">Dicembre</option>
									</select>
									<select name="anno-nascita">
										<?php
										$anno=date("Y");
										for ($i=1950; $i < $anno; $i++) { 
											echo '<option value="'.$i.'">'.$i.'</option>';
										 } 
										?>
									</select>
								</td>
								<td class="box-iscrizione-studenti"><input type="text" name="codice-fiscale" style="width:90%;" required/></td>
								<td class="box-iscrizione-studenti"><input type="text" name="email" style="width:90%;"/></td>
								<td class="box-iscrizione-studenti"><input type="text" name="residenza" style="width:90%;" required/></td>
								<td class="box-iscrizione-studenti"><input type="text" name="indirizzo" style="width:90%;"/></td>
								<td class="box-iscrizione-studenti"><input type="text" name="telefono" style="width:90%;"/></td>
							</tr>
							<?php 
							echo '<tr><td></td><td></td><td></td><td></td><td><input type="submit" value="Crea studente" style="margin-top:20px;"/></td</tr>';
							?>
						</table>
					</form>
				</div>
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
