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
				<h2>Pubblica avvisi </h2>
					<form id="carica_avvisi" name="carica-avvisi" method="post" action="carica-avvisi.php<?php/* echo $_SERVER['PHP_SELF']; */?>" accept-charset="utf-8">
						
						<textarea rows="20" cols="155" name="avviso" style="width:100%;"></textarea> <!-- funziona nei form e serve per scrivere testi su più linee -->
						</br>
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
