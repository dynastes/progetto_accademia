<?php @include_once 'shared/menu.php';
if($_SESSION['studente-inserito']===1){
	echo "<div style=\"width:100%;color:green;text-align:center;font-weight:bold;border-style:solid;border-width:2px;border-color:green;background-color:#81F79F;\">Studente aggiunto correttamente</div>";
	$_SESSION['studente-inserito']=0;
} else if($_SESSION['studente-inserito']===-1){
	echo "<div style=\"width:100%;color:red;text-align:center;font-weight:bold;border-style:solid;border-width:2px;border-color:red;background-color:#F78181;\">ATTENZIONE: studente non inserito</div>";
	$_SESSION['studente-inserito']=0;
}
if($_SESSION['cancellazione-iscritto']===1){
	echo "<div style=\"width:100%;color:green;text-align:center;font-weight:bold;border-style:solid;border-width:2px;border-color:green;background-color:#81F79F;\">Iscritto cancellato correttamente</div>";
	$_SESSION['cancellazione-iscritto']=0;
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
					<b>Benvenuto <?php echo $utente->nome; ?>!!!</b>
					<p>In questa pagina sarà possibile cambiare lo status di un iscritto in studente effettivo dell'accademia. Ecco qui sotto l'elenco degli studenti che ancora non sono stati immatricolati</p>
				</div>
				<!--div class="box-programmi-caricati">
					<p><b>Data Pubblicazione</b></p>
				</div>
				<div class="box-programmi-caricati">
					<p><b>Testo dell'avviso</b></p>
				</div>
				<div class="box-programmi-caricati">
					<p><b>Opzioni</b></p>
				</div>
				<div class="box-programmi-caricati">
					<p><b>Visibilità</b></p>
				</div-->
				<table id="box-caricamenti-principale">
				<tr>
					<td class="box-programmi-caricati"><b>Nome</b></td>
					<td class="box-programmi-caricati"><b>Cognome</b></td>
					<td class="box-programmi-caricati"><b>Trasforma in studente</b></td>
					<td class="box-programmi-caricati"><b>Cancella iscritto</b></td>
				</tr>

				<?php //qui interrogo il DB per sapere la lista di programmi pubblicati dai docenti
				//INIZIO TABELLA CONTENUTI
				$stringasql="SELECT a.Nome, a.Cognome, a.Id FROM anagrafe AS a, studenti AS s WHERE s.Id_anagrafe=a.Id AND s.Matricola=0";
				$elencoStudenti=$connessione->query($stringasql);
				while($res=$elencoStudenti->fetch_assoc()){
					echo "<tr>";
						echo '<td class="box-programmi-caricati">';
							echo $res["Nome"];
						echo '</td>';
						echo '<td class="box-programmi-caricati">';
							echo $res["Cognome"];
						echo '</td>';
						echo '<td class="box-programmi-caricati">';
							echo '<a href="admin_trasforma_iscritto_in_studente_matricola.php?Id='.$res["Id"].'">Converti iscritto in Studente</a>';
						echo '</td>';
						echo '<td class="box-programmi-caricati">';
							echo '<a href="admin_trasforma_iscritto_in_studente_cancella.php?Id='.$res["Id"].'"><b>X</b></a>';
						echo '</td>';
					echo "</tr>";
				}
				echo "</table>";
				?>

			</div>
		</div>

		<!-- INIZIO FOOTER -->
		<div class="footer"  id="footer" style="bottom:0px;left:0px;width:100%;background-color:black;color:white;height:40px;font-size:14px;float:left">
				<p align="center">
				Copyright © 2015 Accademia Di Belle Arti Kandinskij
				<a href="" rel="nofollow" target="_blank"></a>
				</p>
			</div>
	</body>
</html>
