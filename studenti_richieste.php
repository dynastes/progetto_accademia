<?php @include_once 'menu.php';
if($_SESSION['richiesta-inviata']===1){
	echo "<div style=\"width:100%;color:green;text-align:center;font-weight:bold;border-style:solid;border-width:2px;border-color:green;background-color:#81F79F;\">Richiesta inviata correttamente all'Admin</div>";
	$_SESSION['richiesta-inviata']=0;
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
					<b>Benvenuto <?php echo $utente->nome; ?></b>
				</div>
				<div name="avvisi">
					<h2>Richieste</h2>
					<p>Da questa pagina si possono inviare le richieste per i certificati direttamente alla segreteria.</p>
					<p>Una volta trattata la richiesta, lo stato passerà a "confermato" e si potrà andare a ritirare la versione cartacea.</p>
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
