<?php @include_once 'shared/menu.php';

/*if($_SESSION["autorizzato"]===1){
	echo "<div style=\"width:100%;color:green;text-align:center;font-weight:bold;border-style:solid;border-width:2px;border-color:green;background-color:#81F79F;\">Autorizzazione effettuata correttamente</div>";
	$_SESSION["autorizzato"]=0;
}*/
$idTestoRichiesta=$_GET['id'];
//echo $idTestoRichiesta;
?>
	<?php
			if($utente->get_ruolo() !="admin" and $utente->get_ruolo() != "editor"){
				header("location: index.php");
			}
		?>
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

				<div class="container">
						<b>Benvenuto <?php echo $utente->nome; ?>!</b>
						<br />
						<p>Di seguito verrà mostrato il contenuto della richiesta inviata dallo studente</p>
						<p>
						<?php

						$sqlTesto="SELECT Id, Testo, Id_anagrafe, Id_materia FROM studenti_richieste WHERE Id=".$idTestoRichiesta;
						//echo $sqlTesto;
						$res=$connessione->query($sqlTesto);
						$resTesto=$res->fetch_assoc();
						$idStudente = $resTesto['Id_anagrafe'];
						//ottieni nome e cognome persona
						$sqlPersona="SELECT a.Nome, a.Cognome FROM anagrafe AS a, studenti_richieste AS sr WHERE a.Id=".$resTesto['Id_anagrafe'];
						$res=$connessione->query($sqlPersona);
						$resPersona=$res->fetch_assoc();
						$idMateria =$resTesto['Id_materia'];
						echo "<b>".$resPersona['Nome']." ".$resPersona['Cognome']." ha scritto: </b>";
						echo $resTesto['Testo'];


						?>
						</p>

					<b>Seleziona la materia sostituitiva in base ai dati ricevuti dalla comunicazione</b>
					<form action="admin_modifica_materia_studente_query.php" method="post">
							<SELECT name="materia_sostitutiva" id="materia_sostitutiva" class="form-control">
							<?php
								$sqlMaterie="SELECT  Id, Nome_materia FROM materie_anagrafica";
								$res=$connessione->query($sqlMaterie);
								while($resMaterie=$res->fetch_assoc()){
									echo("<option value='".$resMaterie['Id']."'>
									".$resMaterie['Nome_materia']."
									</option>");
								}
							 ?>
						 </SELECT>
						 <script>
						 		var select=$("#materia_sostitutiva");
								select.attr("data-live-search","true");
								select.attr("data-live-search-type","startWith");
								select.addClass("selectPicker");
								select.selectpicker("refresh");
						 </script>
						 <label>Crediti</label>
						 <input type="number" name="crediti"  max="12" min="1" class="form-control" required />
						 <input type="hidden" name="materia_vecchia" value="<?php echo($idMateria); ?>">
						 <input type="hidden" name="id_studente" value="<?php echo($idStudente); ?>">
						 <input type="hidden" name="id_richiesta" value="<?php echo($resTesto['Id']); ?>">
						 <input type="submit" value="Modifica materia" class="btn btn-default" />
					</form>
					<a href="admin_gestisci_certificati.php">&lt;&lt; Torna indietro</a>
				</div>
		<!-- INIZIO FOOTER -->
		<?php @include_once 'shared/footer.php';?>
	</body>
</html>
