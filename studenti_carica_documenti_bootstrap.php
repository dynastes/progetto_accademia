<?php @include_once 'shared/menu_bootstrap.php';
$tipoFile=$_POST['tipoFile'];

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
				<div id="benvenuto">
					<h1>Carica Documenti</h1>
					<b>Utente corrente: <?php echo $utente->nome; ?></b>
				</div>
				<div id="avvisi">
					<?php
						if(isset($_FILES['FileUtente'])){
							$directory="./caricamenti/studenti/".$utente->id . $utente->nome."/";
							if (!file_exists($directory)) {
								 mkdir($directory, 0777, true);
							}
							$tempPos = $_FILES['FileUtente']['tmp_name'];
							$destPos = $directory.$_FILES['FileUtente']['name']; //percorso e nome del file
							move_uploaded_file($tempPos, $destPos);
							//inserisci nel DB il programma appena caricato nelle cartelle del server
							$stringasql="INSERT INTO studenti_documenti_caricati (Id_studente, Percorso_file, Nome_file, Data_caricamento, Tipo) VALUES(".$utente->id.",'".$directory."', '".$_FILES['FileUtente']['name']."',SYSDATE(), ".$tipoFile.")";
							$inserimento=$connessione->query($stringasql);
							if($inserimento){
								echo '<div style="width:100%;color:green;text-align:center;font-weight:bold;border-style:solid;border-width:2px;border-color:green;background-color:#81F79F;">
									Operazione eseguita! Il file "'. $_FILES['FileUtente']['name'] . '" è stato caricato correttamente
									</div>';
							}
							echo 'Per caricare un ulteriore file, <a href="studenti_carica_documenti.php">cliccare qui</a>';
						}else{
							echo '<p>Carica i documenti (in formato immagine o PDF) come ricevute di bonifico, bollettini regionali ecc...).
							I file caricati devono essere del formato <b>.jpg, png, pdf</b> o <b>bmp</b>. Altri formati potrebbero non essere caricati.</p>
							<form width:60%;" action="studenti_carica_documenti.php" enctype="multipart/form-data" method="POST">
								<input style="float:left;" class="btn btn-default" type="file" name="FileUtente">
								<label style="float:left; margin-right:10px;">Scegli quale tipo di file stai caricando</label>
								<select name="tipoFile" style="float:left; margin-right:30px;">
								    <option value="1">Bollettino</option>
								    <option value="2">Bonifico</option>
								    <option value="3">Foto</option>
								 </select>
								<input style="float:left;" type="submit" value="Invia file/documento">
							</form>';
						}
					?>

				</div>
			</div>

<?php @include_once 'shared/footer.php'; ?>

	</body>
</html>
