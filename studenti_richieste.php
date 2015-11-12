<?php @include_once 'menu.php';
if($_SESSION['richiesta-inviata']===1){
	echo "<div style=\"width:100%;color:green;text-align:center;font-weight:bold;border-style:solid;border-width:2px;border-color:green;background-color:#81F79F;\">Richiesta inviata correttamente all'Admin</div>";
	$_SESSION['richiesta-inviata']=0;
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
				<div name="avvisi">
					<h2>Richieste</h2>
					<p>Con questa pagina può semplicemente inviare una richiesta di certificato all'Admin del sito. La richiesta inviata verrà elencata qui sotto e marcata come "non letta" fin quando l'Admin non la leggerà e la confermerà.</p>
					<p>Appena la richiesta verrà confermata, il suo stato passerà a "confermato" e lei potrà ritirare la richiesta in versione cartacea direttamente dalla segreteria</p>
					<!-- ### FORM richiedi certificato ###-->
					<form id="richiedi_certificati" name="richiedi_certificati" method="post" action="studenti_richiedi_certificato_query.php<?php/* echo $_SERVER['PHP_SELF']; */?>" accept-charset="utf-8"> 
						<label>Seleziona il certificato da richiedere:&nbsp;</label>
						<select name="tipo-certificato">
							<option value="1">Certificato di frequenza</option>
							<option value="2">Certificato di iscrizione</option>
							<option value="3">Certificato per materie sostenute</option>
						</select>
						<input  type="submit" value="Richiedi certificato">
					</form>
					<div>
						<table style="width:100%;">
							<tr>
								<td class="box-avvisi-home" style="width:33%;"><b>Data invio richiesta</b></td>
								<td class="box-avvisi-home" style="width:33%;"><b>Stato richiesta</b></td>
								<td class="box-avvisi-home" style="width:33%;"><b>Tipo richiesta</b></td>
							</tr>
							<?php
								$sqlElencoCertificati="SELECT sr.Data_invio, sr.Stato_richiesta, t.Tipo 
														FROM studenti_richieste AS sr, tipo_richieste AS t 
														WHERE Id_anagrafe=".$utente->id." AND sr.Tipo=t.Id ORDER BY sr.Id DESC";
								$res=$connessione->query($sqlElencoCertificati);
								while($elencoCertificati=$res->fetch_assoc()){
									echo '<tr>';
										echo '<td class="lista-avvisi-home">'.$elencoCertificati["Data_invio"].'</td>';//data invio richiesta
										echo '<td class="lista-avvisi-home">'.$elencoCertificati["Stato_richiesta"].'</td>';//stato richiesta (non ancora letta; letta e confermata)
										echo '<td class="lista-avvisi-home">'.$elencoCertificati["Tipo"].'</td>';
									echo '</tr>';
								}
							?>
						</table>
					</div>
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
