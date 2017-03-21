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
		<script>
			$('.selectpicker').selectpicker({
			  style: 'btn-info',
			  size: 4
			});

		</script>
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
						<h1>Cambia materie ai docenti</h1>
						<p>Scegli il professore a cui assegnare una materia differente</p>
						<form method="post" action="admin_cambia_materia_docenti_dettagli.php" name="professore-materia" class="form-control">
							
							<div class="dropdown input-group">
						<select class="selectpicker">
						<?php
								$sqlProfessori="SELECT a.Nome, a.Cognome, d.Id_anagrafe FROM anagrafe AS a, docenti AS d WHERE d.Id_anagrafe=a.Id";
								$resProf=$connessione->query($sqlProfessori);
								while($res=$resProf->fetch_assoc()){
									echo '<option class="" value="'.$res["Id_anagrafe"].'">'.$res["Cognome"].' '.$res["Nome"].'</option>';
								//	echo ('<option>'.$res["Nome"].' '.$res["Cognome"].'</option>');
								}
							?>
							</select>
							</div>
							
							
							
							<input  type="submit" value="Vedi dettagli/Modifica materia assegnata">
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
