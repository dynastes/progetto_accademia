<?php @include_once 'menu.php'; 
function coloraRighe($a){
	if($a==="Base"){
		return ' background-color:#AACCFF;';
	} else if($a==="Caratterizzante"){
		return ' background-color:#F2FFAA;';
	} else if($a==="Integrativa"){
		return ' background-color:#EEAAFF;';
	}
}

?>
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
					<b>Benvenuto <?php echo $utente->nome; ?></b>
				</div>
				<div id="avvisi">
					<p>Qui di seguito saranno elencate tutte le materie del corso in cui sei iscritto.</p>
					<table>
						<tr style="border: 2px solid #FCFCFC;">
							<td colspan="2"><b>Legenda colori</b></td>
						</tr>
						<tr style="border: 2px solid #FCFCFC;">
							<td style="background-color:#AACCFF; width:30px;"></td>
							<td>Attività Formative di Base</td>
						</tr>
						<tr style="border: 2px solid #FCFCFC;">
							<td style="background-color:#F2FFAA; width:30px;"></td>
							<td>Attività Formative Caratterizzanti</td>
						</tr>
						<tr style="border: 2px solid #FCFCFC;">
							<td style="background-color:#EEAAFF; width:30px;"></td>
							<td>Attività Integrative o Affini</td>
						</tr>
					</table>
					<div id="elenco-avvisi">
						<?php
							//acquisisco il corso di cui fa parte l'utente
							$sqlCorso="SELECT Id_corso, Anno_accademico FROM studenti WHERE Id_anagrafe=".$utente->id;
							$Id_corso=$connessione->query($sqlCorso);
							$Id_corso=$Id_corso->fetch_assoc(); //0:id_corso;	1: Anno_accademico
							//$QUERY="SELECT m.Codice_materia AS MATERTIA_codice_materia, m.Nome_materia AS MATERIA_nome_materia, m.Anno AS MATERIA_anno, mc.Cfa AS MAT_COR_cfa, mc.Tipo AS MAT_COR_tipo, c.Nome_corso AS CORSI_nome_corso FROM materie AS m, materie_corsi AS mc, corsi AS c WHERE mc.Id_corso=2";
							//$sqlPianoStudiVECCHIO="SELECT m.Codice_materia, m.Nome_materia, m.Anno, mc.Cfa, mc.Tipo, c.Nome_corso FROM materie AS m, materie_corsi AS mc, corsi AS c WHERE mc.Id_corso=".$Id_corso["Id_corso"]; //aggiungere pure la CONVALIDA
							
							$sqlPianoStudi="SELECT m.Codice_materia, m.Nome_materia, mc.Cfa, mc.Tipo, mc.Descrizione 
											FROM materie AS m, materie_corsi AS mc, corsi AS c 
											WHERE m.Anno=1 AND mc.Id_corso=".$Id_corso["Id_corso"]." AND mc.Id_corso = c.Id AND m.Id = mc.Id_materia ORDER BY m.Anno";

							
							/*$sqlPianoStudi="SELECT m.Codice_materia, m.Nome_materia, m.Anno, mc.Cfa, mc.Tipo, c.Nome_corso, ms.Convalida
											FROM materie AS m, materie_corsi AS mc, corsi AS c, materie_studenti AS ms
											WHERE mc.Id_corso=".$Id_corso["Id_corso"]." AND mc.Id_corso = c.Id AND m.Id = mc.Id_materia AND 
											ms.Id_studente=".$utente->id." AND m.Id=ms.Id_materia";*/

							$PianoDiStudi=$connessione->query($sqlPianoStudi);
							echo '<table id="box-caricamenti-principale">';
							echo '<h2 style="text-align:center;">1° anno</h2>';
							echo '<tr>';
								echo '<td style="width:10%;" class="box-avvisi-home"><b>Codice Materia</b></td>';
								echo '<td style="width:35%;" class="box-avvisi-home"><b>Materia</b></td>';
								echo '<td style="width:5%;" class="box-avvisi-home"><b>CFA</b></td>';
								echo '<td style="width:20%;" class="box-avvisi-home"><b>Tipo materia</b></td>';
							echo '</tr>';
							while($riga=$PianoDiStudi->fetch_assoc()){
								//inizio creazione riga colorata
								echo '<tr>';
									echo '<td style="width:10%;'.coloraRighe($riga["Descrizione"]).'" class="lista-avvisi-home">'.$riga["Codice_materia"].'</td>';
									echo '<td style="width:35%;'.coloraRighe($riga["Descrizione"]).'" class="lista-avvisi-home">'.ucfirst(strtolower($riga["Nome_materia"])).'</td>';
									echo '<td style="width:5%;'.coloraRighe($riga["Descrizione"]).'" class="lista-avvisi-home">'.$riga["Cfa"].'</td>';
									echo '<td style="width:20%;'.coloraRighe($riga["Descrizione"]).'" class="lista-avvisi-home">'.$riga["Descrizione"].'</td>';
								echo '</tr>';
							}
							echo "</table>";

							//################### ANNO 2
							$sqlPianoStudi="SELECT m.Codice_materia, m.Nome_materia, mc.Cfa, mc.Tipo, mc.Descrizione 
											FROM materie AS m, materie_corsi AS mc, corsi AS c 
											WHERE m.Anno=2 AND mc.Id_corso=".$Id_corso["Id_corso"]." AND mc.Id_corso = c.Id AND m.Id = mc.Id_materia ORDER BY m.Anno";

							
							/*$sqlPianoStudi="SELECT m.Codice_materia, m.Nome_materia, m.Anno, mc.Cfa, mc.Tipo, c.Nome_corso, ms.Convalida
											FROM materie AS m, materie_corsi AS mc, corsi AS c, materie_studenti AS ms
											WHERE mc.Id_corso=".$Id_corso["Id_corso"]." AND mc.Id_corso = c.Id AND m.Id = mc.Id_materia AND 
											ms.Id_studente=".$utente->id." AND m.Id=ms.Id_materia";*/

							$PianoDiStudi=$connessione->query($sqlPianoStudi);
							echo '<table id="box-caricamenti-principale">';
							echo '<h2 style="text-align:center;">2° anno</h2>';
							echo '<tr>';
								echo '<td style="width:10%;" class="box-avvisi-home"><b>Codice Materia</b></td>';
								echo '<td style="width:35%;" class="box-avvisi-home"><b>Materia</b></td>';
								echo '<td style="width:5%;" class="box-avvisi-home"><b>CFA</b></td>';
								echo '<td style="width:20%;" class="box-avvisi-home"><b>Tipo materia</b></td>';
							echo '</tr>';
							while($riga=$PianoDiStudi->fetch_assoc()){
								echo '<tr>';
									echo '<td style="width:10%;'.coloraRighe($riga["Descrizione"]).'" class="lista-avvisi-home">'.$riga["Codice_materia"].'</td>';
									echo '<td style="width:35%;'.coloraRighe($riga["Descrizione"]).'" class="lista-avvisi-home">'.ucfirst(strtolower($riga["Nome_materia"])).'</td>';
									echo '<td style="width:5%;'.coloraRighe($riga["Descrizione"]).'" class="lista-avvisi-home">'.$riga["Cfa"].'</td>';
									echo '<td style="width:20%;'.coloraRighe($riga["Descrizione"]).'" class="lista-avvisi-home">'.$riga["Descrizione"].'</td>';
								echo '</tr>';
							}
							echo "</table>";

							//########################Anno 3
							$sqlPianoStudi="SELECT m.Codice_materia, m.Nome_materia, mc.Cfa, mc.Tipo, mc.Descrizione 
											FROM materie AS m, materie_corsi AS mc, corsi AS c 
											WHERE m.Anno=3 AND mc.Id_corso=".$Id_corso["Id_corso"]." AND mc.Id_corso = c.Id AND m.Id = mc.Id_materia ORDER BY m.Anno";

							
							/*$sqlPianoStudi="SELECT m.Codice_materia, m.Nome_materia, m.Anno, mc.Cfa, mc.Tipo, c.Nome_corso, ms.Convalida
											FROM materie AS m, materie_corsi AS mc, corsi AS c, materie_studenti AS ms
											WHERE mc.Id_corso=".$Id_corso["Id_corso"]." AND mc.Id_corso = c.Id AND m.Id = mc.Id_materia AND 
											ms.Id_studente=".$utente->id." AND m.Id=ms.Id_materia";*/

							$PianoDiStudi=$connessione->query($sqlPianoStudi);
							echo '<table id="box-caricamenti-principale">';
							echo '<h2 style="text-align:center;">3° anno</h2>';
							echo '<tr>';
								echo '<td style="width:10%;" class="box-avvisi-home"><b>Codice Materia</b></td>';
								echo '<td style="width:35%;" class="box-avvisi-home"><b>Materia</b></td>';
								echo '<td style="width:5%;" class="box-avvisi-home"><b>CFA</b></td>';
								echo '<td style="width:20%;" class="box-avvisi-home"><b>Tipo materia</b></td>';
							echo '</tr>';
							while($riga=$PianoDiStudi->fetch_assoc()){
								echo '<tr>';
									echo '<td style="width:10%;'.coloraRighe($riga["Descrizione"]).'" class="lista-avvisi-home">'.$riga["Codice_materia"].'</td>';
									echo '<td style="width:35%;'.coloraRighe($riga["Descrizione"]).'" class="lista-avvisi-home">'.ucfirst(strtolower($riga["Nome_materia"])).'</td>';
									echo '<td style="width:5%;'.coloraRighe($riga["Descrizione"]).'" class="lista-avvisi-home">'.$riga["Cfa"].'</td>';
									echo '<td style="width:20%;'.coloraRighe($riga["Descrizione"]).'" class="lista-avvisi-home">'.$riga["Descrizione"].'</td>';
								echo '</tr>';
							}
							echo "</table>";
						?>
					</div>
				</div>
			</div>
		</div>

		<!-- INIZIO FOOTER -->
		<div id="footer" style="bottom:0px;left:0px;width:100%;background-color:black;color:white;height:40px;font-size:14px;float:left">
				<p align="center">
					Copyright © 2015 Accademia Di Belle Arti Kandinskij
				</p>
			</div> 
	</body>
</html>
