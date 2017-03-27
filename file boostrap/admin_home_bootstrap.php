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

					<b>Benvenuto <?php echo $utente->nome; ?>!</b>
					<p><b>Tipo utente: <?php echo $utente->ruolo; ?></b></p>
				</div>
				<div id="avvisi">
				<p>QUi di seguito sono visualizzati gli avvisi pubblicati dagli utenti all'admin. Per poterli gestire, andate alla pagina <a href="admin_gestisci_certificati.php">Gestisci Richieste</a></p>
					<table id="box-caricamenti-principale">
						<tr>
							<td class="box-finanze-caricate" style="background-color:#D0D0D0; width:20%;">
								<b>Caricato da...</b>
							</td>
							<td class="box-finanze-caricate" style="background-color:#D0D0D0; width:35%;">
								<b>Tipo richiesta</b>
							</td>
							<td class="box-finanze-caricate" style="background-color:#D0D0D0; width:15%;">
								<b>Data Invio</b>
							</td>
						</tr>
						<?php //qui interrogo il DB per sapere la lista dei certificati richiesti dagli utenti
						$stringasql="SELECT a.Nome, a.Cognome, sr.Data_invio, sr.Id, t.Tipo
									FROM studenti_richieste AS sr, anagrafe AS a, tipo_richieste AS t
									WHERE sr.Id_anagrafe=a.Id AND t.Id=sr.Tipo AND Stato_richiesta='Non letto'";
						$elencoCaricamenti=$connessione->query($stringasql);
						while($res=$elencoCaricamenti->fetch_assoc()){
							$nomeCognome=$res["Nome"]." ".$res["Cognome"];
							echo '<tr>';
								echo '<td class="box-finanze-caricate">'.$nomeCognome.'</td>';
								echo '<td class="box-finanze-caricate">'.$res["Tipo"].'</td>';
								echo '<td class="box-finanze-caricate">'.$res["Data_invio"].'</td>';
							echo '</tr>';
						}
						?>
					</table>
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