<?php @include_once 'shared/menu.php';
if(isset($_SESSION['inserimento'])){	
if($_SESSION['inserimento']===1 && $_SESSION['inserimento2']===1){
	echo "<div style=\"width:100%;color:green;text-align:center;font-weight:bold;border-style:solid;border-width:2px;border-color:green;background-color:#81F79F;\">Query pubblicata correttamente</div>";
	$_SESSION['inserimento']=0;
	$_SESSION['inserimento2']=0;
}
}
$idDocente=$_POST['id-docente'];
?>
<html>
	<head>
		<?php @include_once 'shared/head_inclusions.php';?>

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
				</div>
				<div name="avvisi">
				<div class="col-md-8">
				<h2>Inserisci voti</h2>
				<label>Scegliere la materia:</label>
					<form id="caricaquery" name="caricaquery" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" accept-charset="utf-8">
 						<br />
						
							
								<div class="col-md-4">
								<label for="usermail">Materia:&nbsp;</label> <!--input type="text" name="id-corso" placeholder="1, 2 o 3" required-->
								<br />
								
								<select name="id-materia">
									<?php
									/* La query necessita l'estrazione dell'ID Docente dalla tabella "materia_docente", in modo tale da capire
									 * da chi è insegnata questa determinata materia. Così facendo, verranno selezionate solo le materie che avranno
									 * nella colonna Id_docente l'ID ricevuto tramite POST. */
									$sqlMateria="SELECT materie_anagrafica.Id, materie_anagrafica.Nome_materia
																FROM materia_docente INNER JOIN materie_anagrafica on materia_docente.Id_materia_anagrafica = materie_anagrafica.Id
																	WHERE Id_docente=".$idDocente." ORDER BY Nome_materia";
												echo($sqlMateria);
									$res=$connessione->query($sqlMateria);
									while($resMateria=$res->fetch_assoc()){

										echo '<option value="'.$resMateria["Id"].'">'.$resMateria["Nome_materia"].' ('.$resMateria['Anno'].')'.'</option>';
									}
									?>
									</select>
									<br />
									<br />
									<input class="btn btn-info" type="submit" value="Avanti">
								</div>
							
						
					</form>
				</div>
			</div>
		</div>

		<!-- INIZIO FOOTER -->
		<?php @include_once 'shared/footer.php'; ?>
	</body>
</html>
