<?php @include_once 'menu.php'; 
if($_SESSION["autorizzato"]===1){
	echo "<div style=\"width:100%;color:green;text-align:center;font-weight:bold;border-style:solid;border-width:2px;border-color:green;background-color:#81F79F;\">Autorizzazione effettuata correttamente</div>";
	$_SESSION["autorizzato"]=0;
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
					<b>Benvenuto <?php echo $utente->nome; ?>!!!</b>
					<p>Qui verranno elencati </p>
				</div>
				<table id="box-caricamenti-principale">
					<tr>
						<td class="box-finanze-caricate" style="background-color:#D0D0D0; width:20%;">
							<b>Caricato da...</b>
						</td>
						<td class="box-finanze-caricate" style="background-color:#D0D0D0; width:35%;">
							<b>Tipo certificato</b>
						</td>
						<td class="box-finanze-caricate" style="background-color:#D0D0D0; width:15%;">
							<b>Data Invio</b>
						</td>
						<td class="box-finanze-caricate" style="background-color:#D0D0D0; width:30%;">
							<b>Opzioni</b>
						</td>
					</tr>
					<?php //qui interrogo il DB per sapere la lista dei certificati richiesti dagli utenti
					$stringasql="SELECT a.Nome, a.Cognome, src.Data_invio, src.Id, t.Tipo
								FROM studenti_richieste_certificati AS src, anagrafe AS a, tipo_richieste AS t
								WHERE src.Id_anagrafe=a.Id AND t.Id=src.Tipo AND Stato_richiesta='Non letto'";
					$elencoCaricamenti=$connessione->query($stringasql);
					while($res=$elencoCaricamenti->fetch_assoc()){
						$nomeCognome=$res["Nome"]." ".$res["Cognome"];
						echo '<tr>';
							echo '<td class="box-finanze-caricate">'.$nomeCognome.'</td>';
							echo '<td class="box-finanze-caricate">'.$res["Tipo"].'</td>';
							echo '<td class="box-finanze-caricate">'.$res["Data_invio"].'</td>';
							echo '<td class="box-finanze-caricate"><a href="admin_autorizza_certificati.php?Id='.$res["Id"].'">Autorizza certificato</a></td>';
						echo '</tr>';
					}
					?>
				</table>
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
