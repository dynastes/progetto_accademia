<?php @include_once 'menu.php';
if($_SESSION['query']===1){
	echo "<div style=\"width:100%;color:green;text-align:center;font-weight:bold;border-style:solid;border-width:2px;border-color:green;background-color:#81F79F;\">Avviso pubblicato correttamente</div>";
	$_SESSION['query']=0;
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
				<h2>Pubblica avvisi </h2>
					<p>Per visualizzare tutti gli avvisi pubblicati, cliccare sul seguente link: <a href="docenti_visualizza_avvisi.php">Visualizza Avvisi</a> </p>
					<form id="carica_avvisi" name="carica-avvisi" method="post" action="carica-avvisi.php<?php/* echo $_SERVER['PHP_SELF']; */?>" accept-charset="utf-8">
						
						<textarea rows="20" cols="155" name="avviso" style="width:100%;height:30%;"></textarea> <!-- funziona nei form e serve per scrivere testi su più linee -->
						</br>
						<div style="margin-top:10px;">
							<label>Rendi l'avviso visibile a:</label>
							<select name="visibility" id="visibility">
								<option value="pubblico">Studenti, docenti e amministratori</option>
								<option value="privato">Solo amministratori</option>
							</select>
						</div>
						<br>
						<input  type="submit" value="pubblica avviso">
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
