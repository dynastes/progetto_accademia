<?php
@include_once 'dbconnection.php';
?>
<html>
	<head>
		<?php @include_once 'shared/head_inclusions.php';?>
		<?php @include_once 'shared/menu.php'; ?>
			<script src="sorttable.js"></script>
	</head>
	<body>

		<div id="principale">
			<div id="menu">
			<!-- INIZIO CARICAMENTO MENU -->
				<?php
					menu();
				?>
			</div> <!-- FINE MENU -->

			<div class="container">
				<div id="benvenuto">
					<b>Benvenuto <?php echo $utente->nome; ?>!</b>
					<p>Qui verranno elencati tutti i docenti che sono iscritti all'accademia</p>
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
				<table  class="table sortable table-striped ">
				<tr>
					<th>Nome</th>
					<th>Cognome</th>
					<th>Email</th>
					<th>Indirizzo</th>
					<th>Telefono</th>
				</tr>

				<?php //qui interrogo il DB per sapere la lista di programmi pubblicati dai docenti
				//INIZIO TABELLA CONTENUTI
				$stringasql="SELECT a.Nome, a.Cognome, a.Email, a.Indirizzo, a.Telefono,d.Id_anagrafe FROM anagrafe AS a, docenti AS d WHERE d.Id_anagrafe=a.Id ORDER BY a.Cognome";
				$elencoStudenti=$connessione->query($stringasql);
				while($res=$elencoStudenti->fetch_assoc()){
					echo "<tr>";
						echo '<td >';
							echo $res["Nome"];
						echo '</td>';
						echo '<td >';
							echo $res["Cognome"];
						echo '</td>';
						echo '<td >';
							echo $res["Email"];
						echo '</td>';
						echo '<td >';
							echo $res["Indirizzo"];
						echo '</td>';
						echo '<td >';
							echo $res["Telefono"];
						echo '</td>';
						echo '<td >';
							echo $res["Id_anagrafe"];
						echo '</td>';
								
				?>
			<td><a href="admin_elimina_docente_query.php?ID=<?php echo $res['Id_anagrafe']; ?>" onclick="return sicuro('<?php echo $res['Id_anagrafe']; ?>')">Elimina<?php echo "</tr>";}echo "</table>";?></a></td>
				
			
			</div>
		</div>
	</div>
		<!-- INIZIO FOOTER -->
		<?php @include_once 'shared/footer.php'; ?>
	</body>
</html>
