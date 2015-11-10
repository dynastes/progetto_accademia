<?php @include_once 'menu.php';?>
<html>
	<head>
		<meta charset="utf-8">
		<title>Gestionale Kandinskij</title>
		<link href="css/style_nuovo.css" rel="stylesheet" />
		<link href="css/style.css" rel="stylesheet" />

		<link href="css/bootstrap.min.css" rel="stylesheet" />
		<link href="js/fancybox/jquery.fancybox.css" rel="stylesheet">
		<link href="js/flexslider.css" rel="stylesheet" />
		<link href="css/style.css" rel="stylesheet" />
		
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

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
					<p>Ecco i dettagli del professor: <?php echo $resNomeCognome["Cognome"]." ".$resNomeCognome["Nome"] ?></p>
					<form method="post" action="admin_cambia_materia_query.php">
						<table>
							<tr>
								<td><!--label>ID Professore:</label--></td>
								<td><input type="text" value="<?php echo $resNomeCognome['Id_anagrafe'];?>" name="id-docente" hidden></input></td>
							</tr>
							<tr>
								<td><label>Scegli materia da sostituire/eliminare:</label></td>
								<td>
									<select name="materia-da-modificare">
									<?php
										$materiePresenti=0;
										$sqlMateriaDocente="SELECT a.Nome, a.Cognome, d.Id_anagrafe, m.Id, m.Nome_materia
															FROM anagrafe AS a, docenti AS d, materie AS m
															WHERE m.Id_docente =".$resNomeCognome["Id_anagrafe"]."
															AND a.Id =".$resNomeCognome["Id_anagrafe"]."
															AND d.Id_anagrafe =".$resNomeCognome["Id_anagrafe"];
										$res=$connessione->query($sqlMateriaDocente);
										while($resMateriaDocente=$res->fetch_assoc()){
											$materiePresenti=1;//per identificare se nella listbox deve comparire la frase "nessuna materia presente"
											echo '<option value="'.$resMateriaDocente["Id"].'">'.$resMateriaDocente["Nome_materia"].'</option>';
										}
										if($materiePresenti==0){
											echo '<option value="nessuna-materia">Nessuna materia per questo prof.</option>';
										}
										?>
									</select>
								</td>
							</tr>
							<tr>
								<td><label>Operazione da effettuare sulla materia selezionata:</label></td>
								<td><input type="radio" name="opzioni-materia" value="sostituisci" checked>Sostituisci con un'altra
								<br>
								<input type="radio" name="opzioni-materia" value="elimina">Togli relazione materia-professore</td>
								<td>
									<select name="materia-sostitutiva">
										<?php
										//elenco materie per menù
										$sqlMaterie="SELECT Id, Nome_materia FROM materie";
										$res=$connessione->query($sqlMaterie);
										while($resMaterie=$res->fetch_assoc()){
											echo '<option value="'.$resMaterie["Id"].'">'.$resMaterie["Nome_materia"].'</option>';
										} 
										?>
									</select>
								</td>
							</tr>
							<tr>
								<td></td>
								<td><input  type="submit" value="Modifica relazione Materia-Docente"></td>
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
