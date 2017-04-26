<?php @include_once 'menu_bootstrap.php'; ?>
<html>
	<head>
		<?php @include_once 'shared/head_inclusions.php';?>

	</head>
	<body>
		
		<div class="container">
			
			<!-- INIZIO CARICAMENTO MENU -->
				<?php
					menu();
				?>
			

			<div id="contenuto">
				<div id="benvenuto">
					<b>Benvenuto <?php echo $utente->nome; ?>!</b>
				</div>
				<div name="avvisi">
				<h2>Inserisci in dati del nuovo studente</h2>
					<form method="post" action="admin_inserisci_studenti_query.php">
						<table class="table table-striped">
							<tr>
								<td><label for="usermail">Nome: &nbsp;</label></td>
								<td><input type="text" name="nome-studente" required/></td>
							</tr>
							<tr>
								<td><label for="usermail">Cognome:&nbsp;</label></td>
								<td><input type="text" name="cognome-studente" required/></td>
							</tr>
							<tr>
								<td><label for="usermail">Matricola:&nbsp;</label></td>
								<td><input type="text" name="matricola-studente" required/></td>
							</tr>
							<tr>
								<td><label for="usermail">Diploma:&nbsp;</label></td>
								<td><input type="text" name="diploma-studente" required/></td>
							</tr>
							<tr>
								<td><label for="usermail">Corso:&nbsp;</label></td> <!--input type="text" name="id-corso" placeholder="1, 2 o 3" required-->
								<td><select name="corso-studente">
									<?php
									$sqlCorso="SELECT Nome_corso, Id FROM corsi";
									$resCorsi=$connessione->query($sqlCorso);
									while($corso=$resCorsi->fetch_assoc()){
										echo '<option value="'.$corso["Id"].'">'.$corso["Nome_corso"].'</option>';
									}
									?>
								</select></td>
							</tr>
							<tr>
								<td><label for="usermail">Data Nascita:&nbsp;</label></td>
								<td>
									<select name="giorno-nascita">
										<?php
										for ($i=1; $i < 32; $i++) { 
											echo '<option value="'.$i.'">'.$i.'</option>';
										 } 
										?>
									</select>
									<select name="mese-nascita">
										<option value="01">Gennaio</option>
										<option value="02">Febbraio</option>
										<option value="03">Marzo</option>
										<option value="04">Aprile</option>
										<option value="05">Maggio</option>
										<option value="06">Giugno</option>
										<option value="07">Luglio</option>
										<option value="08">Agosto</option>
										<option value="09">Settembre</option>
										<option value="10">Ottobre</option>
										<option value="11">Novembre</option>
										<option value="12">Dicembre</option>
									</select>
									<select name="anno-nascita">
										<?php
										$anno=date("Y");
										for ($i=1950; $i < $anno; $i++) { 
											echo '<option value="'.$i.'">'.$i.'</option>';
										 } 
										?>
									</select>
								</td>
							</tr>
							<tr>
								<td><label for="usermail">Codice Fiscale:&nbsp;</label></td>
								<td><input type="text" name="codice-fiscale" required/></td>
							</tr>
							<tr>
								<td><label for="usermail">Email:&nbsp;</label></td>
								<td><input type="text" name="email" required/></td>
							</tr>
							<tr>
								<td><label for="usermail">Residenza:&nbsp;</label></td>
								<td><input type="text" name="residenza" required/></td>
							</tr>
							<tr>
								<td><label for="usermail">Indirizzo:&nbsp;</label></td>
								<td><input type="text" name="indirizzo" required/></td>
							</tr>
							<tr>
								<td><label for="usermail">Telefono:&nbsp;</label></td>
								<td><input type="text" name="telefono" required/></td>
							</tr>
							<tr>
								<td colspan="2"><input  type="submit" value="Inserisci lo studente"></td>
							</tr>
						</table>
					</form>
				</div>
			</div>
		</div>

		<!-- INIZIO FOOTER -->
		<?php @include_once 'shared/footer.php';?>
	</body>
</html>
