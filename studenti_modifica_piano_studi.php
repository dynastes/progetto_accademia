<?php @include_once 'shared/menu_bootstrap.php';
function coloraRighe($a){
	if($a==="Base"){
		return ' background-color:#AACCFF;';
	} else if($a==="Caratterizzante"){
		return ' background-color:#F2FFAA;';
	} else if($a==="Integrativa"){
		return ' background-color:#EEAAFF;';
	}
}

?>
<html>
	<head>
		<?php @include_once 'shared/head_inclusions.php';?>

	</head>
	<body>

	
   <?php menu();?>
	

			<div class="container">
				<div id="benvenuto">
					<b>Benvenuto <?php echo $utente->nome; ?></b>
				</div>
				
				<p>Scrivi qui di seguito la materia che vorresti sostituire e la materia con cui vorresti rimpiazzarla</p>
					<div id="elenco-avvisi">
						<form method="post" action="studenti_modifica_piano_studi_query.php">
							<div class="form-group">
								<textarea name="avviso" style="width:90%;height:20%;"></textarea> 
								<input type="submit" value="Invia richiesta modifica piano di studi" style="margin-top:20px;float:right;">
							</div>
						</form>
					</div>
				</div>
			
		</div>

	<?php @include_once 'shared/footer.php'; ?>
	</body>
</html>
