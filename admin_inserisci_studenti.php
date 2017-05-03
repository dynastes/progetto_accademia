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

			<form method="post" action="admin_inserisci_studenti_query.php">
				<div class="row form-group">
					<div class="col-md-4">
						<label for="usermail">Nome:</label>
						<input class="form-control"  type="text" name="nome-studente" required/>
					</div>

					<div class="col-md-4">
						<label for="usermail">Cognome: </label>
						<input class="form-control"  type="text" name="cognome-studente" required/>
					</div>

					<div class="col-md-4">
						<label for="usermail">Matricola:</label>
						<input class="form-control"  type="text" name="matricola-studente" required/>
					</div>
				</div> <!-- /row form-group (1) -->

				<div class="row form-group">
					<div class="col-md-4">
						<label for="usermail">Diploma:</label>
						<input class="form-control"  type="text" name="diploma-studente" required/>
					</div>

					<div class="col-md-4">
						<label for="usermail">Corso:</label>
						<select class="form-control" name="corso-studente">
							<?php
							$sqlCorso="SELECT Nome_corso, Id FROM corsi";
							$resCorsi=$connessione->query($sqlCorso);
							while($corso=$resCorsi->fetch_assoc()){
								echo '<option value="'.$corso["Id"].'">'.$corso["Nome_corso"].'</option>';
							}
							?>
						</select>
					</div>

					<div class="col-md-4">
						<label for="usermail">Data Nascita:</label>
						<div class="form-inline">
							<select class="form-control"  name="giorno-nascita">
								<?php
								for ($i=1; $i < 32; $i++) {
									echo '<option value="'.$i.'">'.$i.'</option>';
								 }
								?>
							</select>
							<select class="form-control" name="mese-nascita">
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
							<select class="form-control" name="anno-nascita">
								<?php
									$anno=date("Y");
									for ($i=1950; $i < $anno; $i++) {
										echo '<option value="'.$i.'">'.$i.'</option>';
									 }
								?>
							</select>
						</div>
					</div>
				</div> <!-- /row form-group (2) -->

				<div class="row form-group">
					<div class="col-md-4">
						<label for="usermail">Codice Fiscale:</label>
						<input class="form-control"  type="text" name="codice-fiscale" required/>
					</div>

					<div class="col-md-4">
						<label for="usermail">Email:</label>
						<div class="input-group">
							<div class="input-group-addon">@</div>
							<input class="form-control"  type="text" name="email" required/>
						</div>

					</div>

					<div class="col-md-4">
						<label for="usermail">Residenza:</label>
						<input class="form-control"  type="text" name="residenza" required/>
					</div>
				</div> <!-- /row form-group (3) -->

				<div class="row form-group">
					<div class="col-md-4">
						<label for="usermail">Indirizzo:</label>
						<input class="form-control"  type="text" name="indirizzo" required/>
					</div>

					<div class="col-md-4">
						<label for="usermail">Telefono: </label>
						<div class="input-group">
							<div class="input-group-addon"><span class="glyphicon glyphicon-earphone"></span></div>
							<input class="form-control"  type="text" name="telefono" required/ />
						</div>
					</div>

					<div class="col-md-4">

					</div>
				</div> <!-- /row form-group (4) -->
				<div class="row form-group pull-right">
					<div class="col-md-12">
						<input class="btn btn-info"   type="submit" value="Inserisci lo studente">
					</div>

				</div>
			</form>

		</div>

		<!-- INIZIO FOOTER -->
		<?php @include("shared/footer.php"); ?>
	</body>
</html>
