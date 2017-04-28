	<?php @include_once 'shared/menu.php'; 
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
	
				<!-- INIZIO CARICAMENTO MENU -->
					<?php
						menu();
					?>
				<!-- FINE MENU -->
			
			
				<div class="col-md-8">
				
				<div class="container">
					<div id="benvenuto" >
						<b>Benvenuto <?php echo $utente->nome; ?>!</b>
					</div>
					<div id="avvisi">
					<br>
						<h1>Cambia materie ai docenti</h1>
						<p>Scegli il professore a cui assegnare una materia differente</p>
						<form method="post" action="admin_cambia_materia_docenti_dettagli.php" name="professore-materia" >
							
						<div class="col-md-4">
						<select class="form-control">
						<?php
								$sqlProfessori="SELECT a.Nome, a.Cognome, d.Id_anagrafe FROM anagrafe AS a, docenti AS d WHERE d.Id_anagrafe=a.Id";
								$resProf=$connessione->query($sqlProfessori);
								while($res=$resProf->fetch_assoc()){
									echo '<option value="'.$res["Id_anagrafe"].'">'.$res["Cognome"].' '.$res["Nome"].'</option>';
								//	echo ('<option>'.$res["Nome"].' '.$res["Cognome"].'</option>');
								}
							?>
							</select>
							<br />
							<a href="admin_cambia_materia_docenti_dettagli.php" class="btn btn-primary btn-md btn-block" role="button" aria-pressed="true">Vedi dettagli <br /> Modifica materia assegnata</a>

						</div>	
						
							<div class="col-md-5">
								<!-- <a href="#" class="btn btn-primary btn-md btn-block" role="button" aria-pressed="true">Vedi dettagli <br /> Modifica materia assegnata</a> -->
							</div> 
							<div class="col-md-3">
							</div>
						</form>
						
					
				</div>
			</div>
		</div> 
			<!-- INIZIO FOOTER -->
			<?php @include_once 'shared/footer.php'; ?>
		</body>
	</html>
