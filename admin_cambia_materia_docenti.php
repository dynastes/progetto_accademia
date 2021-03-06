<?php @include_once 'menu.php'; 
if(!empty($_SESSION['materia'])){
	if($_SESSION['materia']===1){ //da errore perchè la parola variabile di sessione "materia" non esiste
		echo "<div style=\"width:100%;color:green;text-align:center;font-weight:bold;border-style:solid;border-width:2px;border-color:green;background-color:#81F79F;\">Modifica effettuata correttamente</div>";
		$_SESSION['materia']=0;
	}
}

?>
<html>
	<head>		
		<?php @include_once 'shared/head_inclusions.php';?>

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
					<h1>Cambia materie ai docenti</h1>
					<p>Scegli il professore a cui assegnare una materia differente</p>
					<form method="post" action="admin_cambia_materia_docenti_dettagli.php" name="professore-materia">
						<select name="nome-professore">
						<?php
							$sqlProfessori="SELECT a.Nome, a.Cognome, d.Id_anagrafe FROM anagrafe AS a, docenti AS d WHERE d.Id_anagrafe=a.Id";
							$resProf=$connessione->query($sqlProfessori);
							while($res=$resProf->fetch_assoc()){
								echo '<option value="'.$res["Id_anagrafe"].'">'.$res["Cognome"].' '.$res["Nome"].'</option>';
							}
						?>
						</select>
						<input  type="submit" value="Vedi dettagli/Modifica materia assegnata">
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
