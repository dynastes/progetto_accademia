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
		<?php @include_once 'shared/head_inclusions.php';?>

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
					<b>Benvenuto <?php echo $utente->nome; ?>!</b>
				</div>
				<div name="avvisi" style="margin-left:20px;">
				<h2>Inserisci in dati del nuovo studente</h2>
					<form method="post" action="admin_inserisci_studenti_query.php">
						<table style="width:50%;">
							<tr>
								<td><label for="usermail">Nome: &nbsp;</label></td>
								<td><input type="text" name="nome-studente" style="width:90%;" required/></td>
							</tr>
							<tr>
								<td><label for="usermail">Cognome:&nbsp;</label></td>
								<td><input type="text" name="cognome-studente" style="width:90%;" required/></td>
							</tr>
							<tr>
								<td><label for="usermail">Matricola:&nbsp;</label></td>
								<td><input type="text" name="matricola-studente" style="width:90%;" required/></td>
							</tr>
							<tr>
								<td><label for="usermail">Diploma:&nbsp;</label></td>
								<td><input type="text" name="diploma-studente" style="width:90%;" required/></td>
							</tr>
							<tr>
								<td><label for="usermail">Corso:&nbsp;</label></td> <!--input type="text" name="id-corso" placeholder="1, 2 o 3" required-->
								<td><select name="corso-studente">
									<?php
									$sqlCorso="SELECT Nome_corso, Id FROM corsi";
									$resCorsi=$connessione->query($sqlCorso);
									while($corso=$resCorsi->fetch_assoc()){
										echo '<option value="'.$corso["Id"].'">'.$corso["Nome_corso"].'</option>';
									}
									?>
								</select></td>
							</tr>
							<tr>
								<td><label for="usermail">Data Nascita:&nbsp;</label></td>
								<td>
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
							</tr>
							<tr>
								<td><label for="usermail">Codice Fiscale:&nbsp;</label></td>
								<td><input type="text" name="codice-fiscale" style="width:90%;" required/></td>
							</tr>
							<tr>
								<td><label for="usermail">Email:&nbsp;</label></td>
								<td><input type="text" name="email" style="width:90%;" required/></td>
							</tr>
							<tr>
								<td><label for="usermail">Residenza:&nbsp;</label></td>
								<td><input type="text" name="residenza" style="width:90%;" required/></td>
							</tr>
							<tr>
								<td><label for="usermail">Indirizzo:&nbsp;</label></td>
								<td><input type="text" name="indirizzo" style="width:90%;" required/></td>
							</tr>
							<tr>
								<td><label for="usermail">Telefono:&nbsp;</label></td>
								<td><input type="text" name="telefono" style="width:90%;" required/></td>
							</tr>
							<tr>
								<td colspan="2"><input  type="submit" value="Inserisci righe nel database" style="margin-top:40px;"></td>
							</tr>
						</table>

						<!-- zona vecchia -->

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
