<?php @include_once 'shared/menu.php';
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
				<p>Modifica materie piano di studi</p>
					<div id="elenco-avvisi">
						<form method="post" action="studenti_modifica_piano_studi_query.php">
							<div class="form-group">
								<div class="row">
									<div class="col-md-4">
										<input type="hidden" class="form-control" name="materia_originale" placeholder="Materia originale" value="<?php echo($_GET['id_materia']); ?>" />
										<input type="hidden" class="form-control" name="nome_materia_originale" placeholder="Materia originale" value="<?php echo($_GET['nome_materia']); ?>" />
										<label> <?php echo($_GET['nome_materia']); ?> </label>
									</div>
									<div class="col-md-4">
										<input type="text" class="form-control" name="materia_sostituita" placeholder="Materia sostituitiva" />
										<br>
										<input class="btn btn-default" type="submit" value="Invia richiesta variazione piano di studi" style="margin-top:20px;float:right;">
									</div>
								</div>

							</div>
						</form>
					</div>
				</div>

		</div>

	<?php @include_once 'shared/footer.php'; ?>
	</body>
</html>
