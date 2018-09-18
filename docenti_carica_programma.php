<?php @include_once 'shared/menu.php'; ?>
<html>
	<head>
		<?php @include_once 'shared/head_inclusions.php';?>

	</head>
	<body>

		<div id="principale">
			<!-- INIZIO CARICAMENTO MENU -->
				<?php
					menu();
				?>
			<!-- FINE MENU -->

			<div id="container">
				<div id="benvenuto">
					<h1>Carica Documenti</h1>
					<b>Utente corrente: <?php echo $utente->nome; ?></b>
				</div>
				<div id="avvisi">
					<?php
						$path="";
						$id_root_precedente = null;
						$sqlcartelle = "SELECT * FROM sotto_cartelle ORDER BY Id_root, Ordine"; //av.Id_docente=an.Id AND
						$cartllelista = $connessione->query($sqlcartelle);
						while ($resCartelle= $cartllelista->fetch_assoc()) {
							if($id_root_precedente!=$resCartelle['Id_root']){
								$path="";
								$id_root_precedente = $resCartelle['Id_root'];
								$sqlSottocartella = "SELECT * FROM cartelle WHERE Id = ".$resCartelle['Id_cartella']."";
								$sottoCartellaLista = $connessione->query($sqlSottocartella);
								while ($resSottocartella= $sottoCartellaLista->fetch_assoc()) {
									$cartella_principale = $resSottocartella['Nome_cartella'];
									$path = $path."/".$cartella_principale;
								}
							}
							else{
								$sqlSottocartella = "SELECT * FROM cartelle WHERE Id = ".$resCartelle['Id_cartella']."";
								$sottoCartellaLista = $connessione->query($sqlSottocartella);
								while ($resSottocartella= $sottoCartellaLista->fetch_assoc()) {
									$cartella_principale = $resSottocartella['Nome_cartella'];
									$path = $path."/".$cartella_principale;
								}
							}

						}
						if(isset($_FILES['FileUtente'])){
							$directory="./caricamenti/docenti/".$utente->id . $utente->nome."/";
							if (!file_exists($directory)) {
								 mkdir($directory, 0777, true);
							}
							$tempPos = $_FILES['FileUtente']['tmp_name'];
							$destPos = $directory.$_FILES['FileUtente']['name']; //percorso e nome del file
							$visibilita = $_POST['tipoDocumento'];
							move_uploaded_file($tempPos, $destPos);
							//inserisci nel DB il programma appena caricato nelle cartelle del server
							$stringasql="INSERT INTO docenti_programmi_caricati (Id_docente, Percorso_file, Nome_file, Data_caricamento,Visibilita) VALUES(".$utente->id.",'".$directory."', '".$_FILES['FileUtente']['name']."',SYSDATE(),'".$visibilita."')";
							$inserimento=$connessione->query($stringasql);
							if($inserimento){
								echo '<div style="width:100%;color:green;text-align:center;font-weight:bold;border-style:solid;border-width:2px;border-color:green;background-color:#81F79F;">
									Operazione eseguita! Il file "'. $_FILES['FileUtente']['name'] . '" è stato caricato correttamente
									</div>';
							}
							echo 'Per caricare un ulteriore file, <a href="docenti_carica_programma.php">cliccare qui</a>';
						}else{
							echo '<p>Attraverso questa pagina possono essere caricati i documenti.
							I file devono essere del formato <b>.zip, .doc, .ppt, .jpg</b>. Altri formati potrebbero non essere caricati.
							Dimensione massima consentita: 25MB</p>
							<form width:60%;" action="docenti_carica_programma.php" enctype="multipart/form-data" method="POST">
								<SELECT name="tipoDocumento">
									<option value="segreteria">
										Segreteria
									</option>
									<option value="studenti">
										Studenti
									</option>
								</SELECT>
								<input style="float:left;" type="file" name="FileUtente" required>
								<input style="float:left;" type="submit" value="Invia file/documento">
							</form>';
						}
					?>

				</div>
			</div>
		</div>



			<?php @include_once 'shared/footer.php'; ?>
	</body>
</html>
