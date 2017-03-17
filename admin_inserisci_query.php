<?php @include_once 'menu.php';
if($_SESSION['inserimento']===1 && $_SESSION['inserimento2']===1){
	echo "<div style=\"width:100%;color:green;text-align:center;font-weight:bold;border-style:solid;border-width:2px;border-color:green;background-color:#81F79F;\">Query pubblicata correttamente</div>";
	$_SESSION['inserimento']=0;
	$_SESSION['inserimento2']=0;
}
if (isset($_POST['avviso']) && $_POST['avviso']!="postato"){
	//echo "Avviso settato!!!! ".$_POST['avviso'];
	/*$insert=$_POST['avviso'];
	if ($connessione->query($insert) === TRUE) {
		 echo "New record created successfully";
	} else {
		 echo "Error: " . $sql . "<br>" . $conn->error;
	}*/
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
				</div>
				<div name="avvisi">
				<h2>Inserisci dati nella tabella MATERIE e MATERIE-CORSI </h2>
					<form id="caricaquery" name="caricaquery" method="post" action="inserisci-query-execute.php<?php/* echo $_SERVER['PHP_SELF']; */?>" accept-charset="utf-8">
						<select name="materie" multiple="multiple" style="height:200px;">
							<?php
								$sqlMaterie="SELECT Nome_materia FROM materie ORDER BY Nome_materia";
								$totMaterie=$connessione->query($sqlMaterie);
								while ($materia=$totMaterie->fetch_assoc()){
									echo "<option>".$materia["Nome_materia"]."</option>";
								}
							?>
						 </select>
 						<br />
						<label for="usermail">ID Docente: &nbsp;</label><input style="color:black;" type="text" name="id-docente" placeholder="0" value="0" required><br />
						<label for="usermail">Codice Materia:&nbsp;</label><input style="color:black;" type="text" name="codice-materia" placeholder="ABCDE" required><br />
						<label for="usermail">Nome materia:&nbsp;</label><input type="text" name="nome-materia" placeholder="Scultura di Banane Nere" style="width:220px;" required><br />
						<label for="usermail">Anno:&nbsp;</label><input type="text" name="anno" placeholder="1, 2 oppure 3 (10 per le materie dove l'anno non è specificato)" style="width:420px;" required><br />
						<label for="usermail">ID Corso:&nbsp;</label><input type="text" name="id-corso" placeholder="1, 2 o 3" required><br />
						<label for="usermail">CFA:&nbsp;</label><input type="text" name="cfa" placeholder="numero da 1 a +infinito" required><br />
						<label for="usermail">Tipo di materia:&nbsp;</label>
						<select name="tipo" id="tipo">
								<option value="Fondamentale">Fondamentale</option>
								<option value="Secondaria">Secondaria</option>
							</select><br />
						<input  type="submit" value="Inserisci Query nel posto in cui non ti aspetti">
					</form>
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
