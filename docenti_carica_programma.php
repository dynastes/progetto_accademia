<?php @include_once 'shared/menu.php'; ?>
<html>
	<head>
		<?php @include_once 'shared/head_inclusions.php';?>

	</head>
	<body>
	
			
			<!-- INIZIO CARICAMENTO MENU -->
				<?php
					menu();
				?>
			<!-- FINE MENU -->
		
			<div id="container">
				<div id="benvenuto">
					<h1>Carica Programma</h1>
					<b>Utente corrente: <?php echo $utente->nome; ?></b>
				</div>
				<div id="avvisi">
					<?php 
						if(isset($_FILES['FileUtente'])){
							$directory="./caricamenti/docenti/".$utente->id . $utente->nome."/";
							if (!file_exists($directory)) {
								 mkdir($directory, 0777, true);
							}
							$tempPos = $_FILES['FileUtente']['tmp_name'];
							$destPos = $directory.$_FILES['FileUtente']['name']; //percorso e nome del file
							move_uploaded_file($tempPos, $destPos);
							//inserisci nel DB il programma appena caricato nelle cartelle del server
							$stringasql="INSERT INTO docenti_programmi_caricati (Id_docente, Percorso_file, Nome_file, Data_caricamento) VALUES(".$utente->id.",'".$directory."', '".$_FILES['FileUtente']['name']."',SYSDATE())";
							$inserimento=$connessione->query($stringasql);
							if($inserimento){
								echo '<div style="width:100%;color:green;text-align:center;font-weight:bold;border-style:solid;border-width:2px;border-color:green;background-color:#81F79F;">
									Operazione eseguita! Il file "'. $_FILES['FileUtente']['name'] . '" è stato caricato correttamente
									</div>';
							}
							echo 'Per caricare un ulteriore file, <a href="docenti_carica_programma.php">cliccare qui</a>';
						}else{ 
							echo '<p>Carica i documenti contenenti il programma di studi del tuo corso.
							I file caricati devono essere del formato <b>.zip, doc, ppt, jpg</b>. Altri formati potrebbero non essere caricati.
							Dimensione massima consentita: 1MB</p>
							<form width:60%;" action="docenti_carica_programma.php" enctype="multipart/form-data" method="POST">
								<input style="float:left;" type="file" name="FileUtente">
								<input style="float:left;" type="submit" value="Invia file/documento">
							</form>';
						}
					?>
					
				</div>
			</div>
	

			<?php @include_once 'shared/footer.php'; ?>
	</body>
</html>
