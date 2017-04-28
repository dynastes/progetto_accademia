<?php @include_once 'shared/menu.php';
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
		<?php @include_once 'shared/head_inclusions.php';?>

	</head>
	<body>

		<?php
			menu();
		?>
		<div class="container">
			<div class="page-header">
				<h2>Inserisci in dati del nuovo studente</h2>
			</div>
			<div class="col-md-3"></div>

			<div class="col-md-6">
				<form method="post" action="admin_inserisci_studenti_query.php">
					<div class="row">
						<label for="usermail">Nome:</label>
						<input type="text" name="nome-studente" required/>
					</div>


					<label for="usermail">Cognome: </label>
					<input type="text" name="cognome-studente" required/>
					<label for="usermail">Matricola:&nbsp;</label>
					<input type="text" name="matricola-studente" required/>
					<label for="usermail">Diploma:&nbsp;</label>
					<input type="text" name="diploma-studente" required/>
					<label for="usermail">Corso:&nbsp;</label>
					<select name="corso-studente">
						<?php
						$sqlCorso="SELECT Nome_corso, Id FROM corsi";
						$resCorsi=$connessione->query($sqlCorso);
						while($corso=$resCorsi->fetch_assoc()){
							echo '<option value="'.$corso["Id"].'">'.$corso["Nome_corso"].'</option>';
						}
						?>
					</select>
					<label for="usermail">Data Nascita:&nbsp;</label>
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
					<label for="usermail">Codice Fiscale:&nbsp;</label>
					<input type="text" name="codice-fiscale" required/>
					<label for="usermail">Email:&nbsp;</label>
					<input type="text" name="email" required/>
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
							<td colspan="2"><input  type="submit" value="Inserisci lo studente" style="margin-top:40px;"></td>
						</tr>
					</table>
				</form>
			</div>

			<div class="col-md-3"></div>

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
