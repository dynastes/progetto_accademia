
<html>
	<head>
		<?php @include_once 'shared/head_inclusions.php';?>

	</head>
	<body>
	<?php @include_once 'menu_bootstrap.php'; ?>
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


<div class="container">
				<table id="box-caricamenti-principale">
					<tr>
						<td class="box-documenti-caricati" style="background-color:#D0D0D0;">
							<b>Nome file</b>
						</td>
						<td class="box-documenti-caricati" style="background-color:#D0D0D0;">
							<b>Data caricamento</b>
						</td>
						<td class="box-documenti-caricati" style="background-color:#D0D0D0;">
							<b>Link di download</b>
						</td>
					</tr>
					<?php //qui interrogo il DB per sapere la lista di programmi pubblicati dai docenti
					$stringasql="SELECT Nome_file, Data_caricamento, Percorso_file, Nome_file FROM docenti_programmi_caricati WHERE Id_docente=".$utente->id;
					$elencoCaricamenti=$connessione->query($stringasql);
					while($res=$elencoCaricamenti->fetch_assoc()){
						echo '<tr>';
							echo '<td class="box-documenti-caricati">'.$res["Nome_file"].'</td>';

							echo '<td class="box-documenti-caricati">'.$res["Data_caricamento"].'</td>';
							echo '<td class="box-documenti-caricati">';
								echo '<a href="'.$res["Percorso_file"].$res["Nome_file"].'">Scarica File</a>';
							echo '</td>';
						echo '</tr>';
					}
					?>
				</table>	
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
