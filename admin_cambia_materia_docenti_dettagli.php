<?php @include_once 'menu.php';
if($_SESSION['materia']===1){
	echo "<div style=\"width:100%;color:green;text-align:center;font-weight:bold;border-style:solid;border-width:2px;border-color:green;background-color:#81F79F;\">Modifica effettuata correttamente</div>";
	$_SESSION['materia']=0;
}

?>
<html>
	<head>
		<meta charset="utf-8">
		<title>Gestionale Kandinskij</title>
		
		
		<link href="css/style_nuovo.css" rel="stylesheet" />

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
						<table>
							<tr style="margin-top:20px;">
								<td><!--label>ID Professore:</label--></td>
								<td><input type="text" value="<?php echo $resNomeCognome['Id_anagrafe'];?>" name="id-docente" hidden></input></td>
							</tr>
							<tr style="margin-top:20px; background-color:#efefef;">
								<td style="width:16%;"><label>Materie:</label></td>
								<td>
									<select name="materia-da-modificare">
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
								</td>
								<td></td>
							</tr>
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
							<tr style="margin-top:20px; background-color:#d0d0d0;">
								<td></td>
								<td><input type="radio" name="opzioni-materia" value="aggiungi">Aggiungi una nuova materia:</td>
								<td>
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
								</td>
							</tr>
							<tr style="margin-top:20px; background-color:#d0d0d0;">
								<td></td>
								<td><input type="radio" name="opzioni-materia" value="elimina">Rimuovi materia</td><br>
								<td>
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

								</td>
							</tr>
							<tr style="margin-top:20px;  background-color:#efefef;">
								<td></td>
								<td><input  type="submit" value="Salva"></td>
							</tr>
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
