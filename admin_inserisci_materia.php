<?php @include_once 'shared/menu.php';
if($_SESSION['inserimento']===1 && $_SESSION['inserimento2']===1){
	echo "<div style=\"width:100%;color:green;text-align:center;font-weight:bold;border-style:solid;border-width:2px;border-color:green;background-color:#81F79F;\">Query pubblicata correttamente</div>";
	$_SESSION['inserimento']=0;
	$_SESSION['inserimento2']=0;
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

		<div id="principale">

			<!-- INIZIO CARICAMENTO MENU -->


			<div id="contenuto">
				<div name="avvisi">

				<form id="caricaquery" name="caricaquery" method="post" action="admin_inserisci_materia_query_execute.php" accept-charset="utf-8">
						<div class="col-md-4">

						</div>
					<div class="col-md-4">
								<h2>Inserisci in dati relativi alla nuova materia</h2>
						<div class="form-group">
										<div class="row center-block">
											<label for="usermail">Docente: &nbsp;</label>

												<select class="form-control"  name="id-docente">
													<?php
													$sqlDocenti="SELECT a.Id, a.Nome, a.Cognome FROM docenti AS d, anagrafe AS a WHERE a.Id=d.Id_anagrafe ORDER BY a.Cognome";
													//$sqlCorso="SELECT Nome_corso, Id FROM corsi";
													$resProf=$connessione->query($sqlDocenti);
													while($docenti=$resProf->fetch_assoc()){
														echo '<option value="'.$docenti["Id"].'">'.$docenti["Cognome"]." ".$docenti["Nome"].'</option>';
													}
													?>
												</select>
										</div>
							</div>
							<div class="form-group">
										<div class="row center-block">
											<label for="usermail">Codice Materia:&nbsp;</label>
											<input class="form-control"   type="text" name="codice-materia">

										</div>
							</div>
							<div class="form-group">
										<div class="row center-block">
											<label for="usermail">Nome materia:&nbsp;</label>
											<input class="form-control"  type="text" name="nome-materia" placeholder="Scultura, Pittura ecc..."  required>


										</div>
							</div>
							<div class="form-group">
										<div class="row center-block">
											<label for="usermail">Anno:&nbsp;</label>
											<input class="form-control"  type="text" name="anno" placeholder="1, 2 oppure 3" required>


										</div>
							</div>
							<div class="form-group">
										<div class="row center-block">
											<label for="usermail">ID Corso:&nbsp;</label> <!--input type="text" name="id-corso" placeholder="1, 2 o 3" required-->
											<select class="form-control" name="id-corso">
												<?php
												$sqlCorso="SELECT Nome_corso, Id FROM corsi";
												$resCorsi=$connessione->query($sqlCorso);
												while($corso=$resCorsi->fetch_assoc()){
													echo '<option value="'.$corso["Id"].'">'.$corso["Nome_corso"].'</option>';
												}
												?>
											</select>

										</div>
							</div>
							<div class="form-group">
										<div class="row center-block">
											<label for="usermail">CFA:&nbsp;</label>
											<input class="form-control"  type="text" name="cfa" required>


										</div>
						</div>
						<div class="form-group">
										<div class="row center-block">
											<label for="usermail">Tipo di materia:&nbsp;</label>
											<select class="form-control"  name="tipo" id="tipo">
											<option value="Fondamentale">Base o Caratterizzante</option>
											<option value="Secondaria">Integrativa</option>
											</select>

										</div>
						</div>
						<div class="form-group">
										<div class="row center-block">
											<button type="submit" class="btn btn-primary center-block" aria-haspopup="false">
												Inserisci righe nel databse
											</button>
										</div>

					</div>
				</div>
					<div class="col-md-4">
					</div>
				</div>
			</form>

				</div>
			</div>
		</div>
</div>

		<!-- INIZIO FOOTER -->
				<?php include_once "shared/footer.php" ?>
	</body>
</html>
