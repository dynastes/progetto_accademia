<?php @include_once 'shared/menu_bootstrap.php';

if($_SESSION['inserimento']===1){
	echo "<div style=\"width:100%;color:green;text-align:center;font-weight:bold;border-style:solid;border-width:2px;border-color:green;background-color:#81F79F;\">Query pubblicata correttamente</div>";
	$_SESSION['inserimento']=0;
}

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
			<?php @include_once 'shared/head_inclusions.php';?>
	</head>
<body>


   <?php menu(); ?>


			<div class="container">
				<div id="benvenuto">
					<b>Benvenuto <?php echo $utente->nome; ?></b>
				</div>
				<div id="avvisi">
					<p>Qui di seguito saranno elencate tutte le materie del corso in cui sei iscritto.</p>
					<table class="table">
						<tr>
							<td colspan="2"><b>Legenda colori</b></td>
						</tr>
						<tr>
							<td></td>
							<td>Attività Formative di Base</td>
						</tr>
						<tr>
							<td></td>
							<td>Attività Formative Caratterizzanti</td>
						</tr>
						<tr>
							<td></td>
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
							echo '<table class="table">';
							echo '<h2 style="text-align:center;">1° anno</h2>';
							echo '<tr>';
								echo '<td><b>Codice Materia</b></td>';
								echo '<td><b>Materia</b></td>';
								echo '<td><b>CFA</b></td>';
								echo '<td><b>Tipo materia</b></td>';
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
							echo '<table class="table">';
							echo '<h2 style="text-align:center;">2° anno</h2>';
							echo '<tr>';
								echo '<td><b>Codice Materia</b></td>';
								echo '<td><b>Materia</b></td>';
								echo '<td><b>CFA</b></td>';
								echo '<td><b>Tipo materia</b></td>';
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
							echo '<table class="table">';
							echo '<h2 style="text-align:center;">3° anno</h2>';
							echo '<tr>';
								echo '<td><b>Codice Materia</b></td>';
								echo '<td><b>Materia</b></td>';
								echo '<td><b>CFA</b></td>';
								echo '<td><b>Tipo materia</b></td>';
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
						<form method="post" action="studenti_modifica_piano_studi.php">
							<div style="text-align:right; width:100%; height:15%; padding-right:5%;">
								<input type="submit" value="Modifica piano di studi">
							</div>
						</form>
					</div>
				</div>
			</div>


	<?php @include_once 'shared/footer.php'; ?>
	</body>
</html>
