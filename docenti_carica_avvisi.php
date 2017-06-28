<?php @include_once 'shared/menu.php';

if(isset($_SESSION['query'])){
	if($_SESSION['query']===1){
		echo "<div style=\"width:100%;color:green;text-align:center;font-weight:bold;border-style:solid;border-width:2px;border-color:green;background-color:#81F79F;\">Avviso pubblicato correttamente</div>";
		$_SESSION['query']=0;
	}
}
?>
<html>
	<head>
		<?php @include_once 'shared/head_inclusions.php';?>
	</head>
	<body>
		<!-- INIZIO CARICAMENTO MENU -->
				<?php menu(); ?>

			<div class="container">
				<div id="benvenuto">
					<b>Benvenuto <?php echo $utente->nome; ?>!!!</b>
				</div>
				<div name="avvisi">
				<h2>Pubblica avvisi </h2>
					<p>Per visualizzare tutti gli avvisi pubblicati, cliccare sul seguente link: <a href="docenti_visualizza_avvisi.php">Visualizza Avvisi</a> </p>
					<form id="carica_avvisi" name="carica-avvisi" method="post" action="carica-avvisi.php" accept-charset="utf-8">

						<textarea name="avviso"  rows="15" cols="155"></textarea> <!-- funziona nei form e serve per scrivere testi su più linee -->
						</br>
						<div>
							<label>Rendi l'avviso visibile a:</label>
							<select name="visibility" id="visibility">
								<option value="pubblico">Studenti, docenti e amministratori</option>
								<option value="privato">Solo amministratori</option>
							</select>
						</div>
						<input type="submit" class="btn btn-info" value="Pubblica Avviso">
					</form>
				</div>
	</div>

	<?php @include_once 'shared/footer.php'; ?>

	</body>
</html>
