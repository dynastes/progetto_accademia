	<?php @include_once 'menu.php'; 
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
	
			<div class="container">
			<div class="row">
		<div id="testata"  class="col-md-4">
				<img src="img/logo.png">
				<!-- INIZIO CARICAMENTO MENU -->
					<?php
						menu();
					?>
				<!-- FINE MENU -->

			</div>
			<div id="principale">
				<div class="col-md-8">
				
				<div id="contenuto">
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
						</div>	
						<div class="col-md-5">
						<a href="#" class="btn btn-primary btn-md btn-block" role="button" aria-pressed="true">Vedi dettagli/Modifica materia assegnata</a>
							</div>
							<div class="col-md-3">
							</div>
						</form>
						
					
				</div>
			</div>
		</div> 
		</div> <!-- /row -->
			<!-- INIZIO FOOTER -->
			<div id="footer" style="bottom:0px;left:0px;width:100%;background-color:black;color:white;height:40px;font-size:14px;float:left">
					<p align="center">
					Copyright © 2015 Accademia Di Belle Arti Kandinskij
					<a href="" rel="nofollow" target="_blank"></a>
					</p>
				</div> 
				</div>
				</div>
		</body>
	</html>