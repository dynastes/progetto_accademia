<?php @include_once 'shared/menu_bootstrap.php';
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

   <?php menu(); ?>
	
	
  	<div class="container">
				<div id="benvenuto">
					<b>Benvenuto <?php echo $utente->nome; ?>!</b>
				</div>
				
					<h2>Richieste</h2>
					<p>Da questa pagina si possono inviare le richieste per i certificati direttamente alla segreteria.</p>
					<p>Una volta trattata la richiesta, lo stato passerà a "confermato" e si potrà andare a ritirare la versione cartacea.</p>
					<!-- ### FORM richiedi certificato ###-->
					<form id="richiedi_certificati" name="richiedi_certificati" method="post" action="studenti_richiedi_certificato_query.php<?php/* echo $_SERVER['PHP_SELF']; */?>" accept-charset="utf-8"> 
						<div class="form-group">
						<label>Seleziona il certificato da richiedere:&nbsp;</label>
						<select class="form-control" name="tipo-certificato">
							<option value="1">Certificato di frequenza</option>
							<option value="2">Certificato di iscrizione</option>
							<option value="3">Certificato per materie sostenute</option>
						</select>
						<br />
						<input class="btn btn-info" type="submit" value="Richiedi certificato">
					</div>
					</form>
					
						<table class="table table-striped">
							<tr>
								<td><b>Data invio richiesta</b></td>
								<td><b>Stato richiesta</b></td>
								<td><b>Tipo richiesta</b></td>
							</tr>
							<?php
								$sqlElencoCertificati="SELECT sr.Data_invio, sr.Stato_richiesta, t.Tipo 
														FROM studenti_richieste AS sr, tipo_richieste AS t 
														WHERE Id_anagrafe=".$utente->id." AND sr.Tipo=t.Id ORDER BY sr.Id DESC";
								$res=$connessione->query($sqlElencoCertificati);
								while($elencoCertificati=$res->fetch_assoc()){
									echo '<tr>';
										echo '<td>'.$elencoCertificati["Data_invio"].'</td>';//data invio richiesta
										echo '<td>'.$elencoCertificati["Stato_richiesta"].'</td>';//stato richiesta (non ancora letta; letta e confermata)
										echo '<td>'.$elencoCertificati["Tipo"].'</td>';
									echo '</tr>';
								}
							?>
						</table>
					
				
			</div>
	
<?php @include_once 'shared/footer.php'; ?>
		
	</body>
</html>
