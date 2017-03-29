<?php @include_once 'menu_bootstrap.php';
if($_SESSION['materia']===1){
	echo "<div style=\"width:100%;color:green;text-align:center;font-weight:bold;border-style:solid;border-width:2px;border-color:green;background-color:#81F79F;\">Modifica effettuata correttamente</div>";
	$_SESSION['materia']=0;
}

?>
<html>
	<head>
		
		<?php @include_once 'shared/head_inclusions.php';?>

	</head>
	<body>
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<div id="principale">
				<div id="menu">
				<!-- INIZIO CARICAMENTO MENU -->
					<?php
						menu();
					?>
				</div> <!-- FINE MENU -->
		</div>
			<div class="container">
				<div id="benvenuto">
					<!--<b>Benvenuto <?php echo $utente->nome; ?>!</b>-->
				</div>
				<div id="avvisi">
					<h1>Cambia docente alle materie</h1>
					<?php
					//qui estraggo le info riguardo il professore scelto e la sua materia/materie
					$idDocente=$_POST["nome-professore"];
					$sqlNomeCognome="SELECT a.Nome, a.Cognome, d.Id_anagrafe FROM anagrafe AS a, docenti AS d WHERE d.Id_anagrafe=a.Id";
					$res=$connessione->query($sqlNomeCognome);
					$resNomeCognome=$res->fetch_assoc();
					?>
					<p><b><a href="admin_cambia_materia_docenti.php">&lt;&lt; Torna indietro</a></b></p>
					<p>Ecco i dettagli del professor: <?php echo $resNomeCognome["Cognome"]." ".$resNomeCognome["Nome"] ?></p>
					<form method="post" action="admin_cambia_materia_query.php">
								<!--label>ID Professore:</label-->
								<div class="col-md-9"> 
									<input type="text" value="<?php echo $resNomeCognome['Id_anagrafe'];?>" name="id-docente" hidden />
									<div class="col-md-1">
										<label>Materie:</label>
									</div>
									<div class="col-md-2">
										<select class="form-control" name="materia-da-modificare">
										<?php
											$materiePresenti=0;
											$sqlMateriaDocente="SELECT a.Nome, a.Cognome, d.Id_anagrafe, m.Id, m.Nome_materia, m.Anno
																FROM anagrafe AS a, docenti AS d, materie AS m
																WHERE m.Id_docente =".$resNomeCognome["Id_anagrafe"]."
																AND a.Id =".$resNomeCognome["Id_anagrafe"]."
																AND d.Id_anagrafe =".$resNomeCognome["Id_anagrafe"];
											$res=$connessione->query($sqlMateriaDocente);
											while($resMateriaDocente=$res->fetch_assoc()){
												$materiePresenti=1;//per identificare se nella listbox deve comparire la frase "nessuna materia presente"
												echo '<option value="'.$resMateriaDocente["Id"].'">'.$resMateriaDocente["Nome_materia"].' ('.$resMateriaDocente["Anno"].')'.'</option>';
											}
											if($materiePresenti==0){
												echo '<option value="nessuna-materia">Nessuna materia per questo prof.</option>';
											}
											?>
											
										</select>
									</div>
								</div>
								<!--tr style="margin-top:20px; background-color:#d0d0d0;">
								<td><label>Cosa vuoi fare?</label></td>
								<td><input type="radio" name="opzioni-materia" value="sostituisci" checked>Sostituisci con un'altra materia:</td>
								<td>
									<select name="materia-sostitutiva">
										<?php
										//elenco materie per menù
										$sqlMaterie="SELECT Id, Nome_materia, Anno FROM materie";
										$res=$connessione->query($sqlMaterie);
										while($resMaterie=$res->fetch_assoc()){
											echo '<option value="'.$resMaterie["Id"].'">'.$resMaterie["Nome_materia"].' ('.$resMaterie["Anno"].')'.'</option>';
										} 
										?>
									</select>
								</td>
							</tr-->
								<input type="radio" name="opzioni-materia" value="aggiungi"/>Aggiungi una nuova materia:
									<select name="materia-aggiuntiva">
										<?php
										//elenco materie per menù
										$sqlMaterie="SELECT Id, Nome_materia, Anno FROM materie ORDER BY Nome_materia";
										$res=$connessione->query($sqlMaterie);
										while($resMaterie=$res->fetch_assoc()){
											echo '<option value="'.$resMaterie["Id"].'">'.$resMaterie["Nome_materia"].' ('.$resMaterie["Anno"].')'.'</option>';
										} 
										?>
									</select>
								<input type="radio" name="opzioni-materia" value="elimina"/>Rimuovi materia
									<select name="materia-da-modificare">
									<?php
										$materiePresenti=0;
										$sqlMateriaDocente="SELECT a.Nome, a.Cognome, d.Id_anagrafe, m.Id, m.Nome_materia, m.Anno
															FROM anagrafe AS a, docenti AS d, materie AS m
															WHERE m.Id_docente =".$resNomeCognome["Id_anagrafe"]."
															AND a.Id =".$resNomeCognome["Id_anagrafe"]."
															AND d.Id_anagrafe =".$resNomeCognome["Id_anagrafe"]." ORDER BY m.Nome_materia";
										$res=$connessione->query($sqlMateriaDocente);
										while($resMateriaDocente=$res->fetch_assoc()){
											$materiePresenti=1;//per identificare se nella listbox deve comparire la frase "nessuna materia presente"
											echo '<option value="'.$resMateriaDocente["Id"].'">'.$resMateriaDocente["Nome_materia"].' ('.$resMateriaDocente["Anno"].')'.'</option>';
										}
										if($materiePresenti==0){
											echo '<option value="nessuna-materia">Nessuna materia per questo prof.</option>';
										}
										?>
									</select>
								<input  type="submit" value="Salva"/>
					</form>
				</div>
			</div>
		</div>
	<?php @include_once 'shared/head_inclusions.php';?> 
</body>
	
</html>
