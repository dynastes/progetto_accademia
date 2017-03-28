<?php @include_once 'menu_bootstrap.php'; ?>
<html>
	<head>
		<?php @include_once 'shared/head_inclusions.php';?>

	</head>
	<body>
			<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>

      </button>
      <img src="img/logo.png" width="30%">
    </div>

	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
   <?php
					menu();
				?>
	</div>			
  </div><!-- /.container-fluid -->
</nav> 

			<div id="contenuto">
				<div id="benvenuto">
					<b>Benvenuto <?php echo $utente->nome; ?>!!!</b>
				</div>
				<div id="avvisi">
					<p>Qui di seguito saranno elencate tutte le materie del corso in cui sei iscritto.</p>
					<div id="elenco-avvisi">
						<?php
							//acquisisco il corso di cui fa parte l'utente
							$sqlCorso="SELECT Id_corso, Anno_accademico FROM studenti WHERE Id_anagrafe=".$utente->id;
							$Id_corso=$connessione->query($sqlCorso);
							$Id_corso=$Id_corso->fetch_assoc(); //0:id_corso;	1: Anno_accademico
							//$QUERY="SELECT m.Codice_materia AS MATERTIA_codice_materia, m.Nome_materia AS MATERIA_nome_materia, m.Anno AS MATERIA_anno, mc.Cfa AS MAT_COR_cfa, mc.Tipo AS MAT_COR_tipo, c.Nome_corso AS CORSI_nome_corso FROM materie AS m, materie_corsi AS mc, corsi AS c WHERE mc.Id_corso=2";
							//$sqlPianoStudiVECCHIO="SELECT m.Codice_materia, m.Nome_materia, m.Anno, mc.Cfa, mc.Tipo, c.Nome_corso FROM materie AS m, materie_corsi AS mc, corsi AS c WHERE mc.Id_corso=".$Id_corso["Id_corso"]; //aggiungere pure la CONVALIDA
							
							/*$sqlPianoStudi="SELECT m.Codice_materia, m.Nome_materia, m.Anno, mc.Cfa, mc.Tipo, c.Nome_corso 
											FROM materie AS m, materie_corsi AS mc, corsi AS c 
											WHERE mc.Id_corso=".$Id_corso["Id_corso"]." AND mc.Id_corso = c.Id AND m.Id = mc.Id_materia";*/
							
							$sqlPianoStudi="SELECT m.Codice_materia, m.Nome_materia, m.Anno, ms.Convalida, ms.Data
											FROM materie AS m, materie_studenti AS ms
											WHERE ms.Id_studente=".$utente->id." AND m.Id=ms.Id_materia";

							$PianoDiStudi=$connessione->query($sqlPianoStudi);
							echo '<table id="box-caricamenti-principale">';
							echo '<tr>';
								echo '<td style="width:10%;" class="box-avvisi-home"><b>Codice Materia</b></td>';
								echo '<td style="width:35%;" class="box-avvisi-home"><b>Materia</b></td>';
								echo '<td style="width:5%;" class="box-avvisi-home"><b>Anno</b></td>';
								echo '<td style="width:5%;" class="box-avvisi-home"><b>Voto</b></td>';
								echo '<td style="width:5%;" class="box-avvisi-home"><b>Data</b></td>';
							echo '</tr>';
							while($riga=$PianoDiStudi->fetch_assoc()){
								echo '<tr>';
									echo '<td style="width:10%;" class="lista-avvisi-home">'.$riga["Codice_materia"].'</td>';
									echo '<td style="width:35%;" class="lista-avvisi-home">'.ucfirst(strtolower($riga["Nome_materia"])).'</td>';
									echo '<td style="width:5%;" class="lista-avvisi-home">'.$riga["Anno"].'</td>';
									echo '<td style="width:15%;" class="lista-avvisi-home">'.$riga["Convalida"].'</td>';
									echo '<td style="width:15%;" class="lista-avvisi-home">'.$riga["Data"].'</td>';
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