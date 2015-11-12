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
				</div>
				<div name="avvisi">
				<h2>Inserisci in dati relativi alla nuova materia</h2>
					<form id="caricaquery" name="caricaquery" method="post" action="admin_inserisci_materia_query_execute.php<?php/* echo $_SERVER['PHP_SELF']; */?>" accept-charset="utf-8">
						<!--select name="materie" multiple="multiple" style="height:200px;">
							<?php
								$sqlMaterie="SELECT Nome_materia FROM materie ORDER BY Nome_materia";
								$totMaterie=$connessione->query($sqlMaterie);
								while ($materia=$totMaterie->fetch_assoc()){
									echo "<option>".$materia["Nome_materia"]."</option>";
								}
							?>
						 </select-->
 						<br />
						<table style="width:50%;">
							<tr>
								<td><label for="usermail">ID Docente: &nbsp;</label></td>
								<td><input style="color:black;" type="text" name="id-docente" placeholder="0" value="0" ></td>
							</tr>
							<tr>
								<td><label for="usermail">Codice Materia:&nbsp;</label></td>
								<td><input style="color:black;" type="text" name="codice-materia"></td>
							</tr>
							<tr>
								<td><label for="usermail">Nome materia:&nbsp;</label></td>
								<td><input type="text" name="nome-materia" placeholder="Scultura, Pittura ecc..." style="width:220px;" required></td>
							</tr>
							<tr>
								<td><label for="usermail">Anno:&nbsp;</label></td>
								<td><input type="text" name="anno" placeholder="1, 2 oppure 3" style="width:110px;" required></td>
							</tr>
							<tr>
								<td><label for="usermail">ID Corso:&nbsp;</label></td> <!--input type="text" name="id-corso" placeholder="1, 2 o 3" required-->
								<td><select name="id-corso">
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
								<td><label for="usermail">CFA:&nbsp;</label></td>
								<td><input type="text" name="cfa" required></td>
							</tr>
							<tr>
								<td><label for="usermail">Tipo di materia:&nbsp;</label></td>
								<td><select name="tipo" id="tipo">
									<option value="Fondamentale">Fondamentale</option>
									<option value="Secondaria">Secondaria</option>
								</select></td>
							</tr>
							<tr>
								<td colspan="2"><input  type="submit" value="Inserisci righe nel database" style="margin-top:40px;"></td>
							</tr>
						</table>
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
