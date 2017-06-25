<?php
@include_once 'dbconnection.php';

//Prendi il nome del settore selezionato
$sql_dipartimento="SELECT Nome_dipartimento FROM dipartimenti WHERE Id=".$_GET['ID'];
$dipartimento=$connessione->query($sql_dipartimento);
$res_dipartimento=$dipartimento->fetch_assoc();
?>

<html>
	<head>
<?php @include_once 'shared/head_inclusions.php';?>
<?php @include_once 'shared/menu.php';?>
	</head>
	<body>
<?php menu(); ?>
		<div class="container">
			<div class="page-header">
				<h1>Modifica dipartimento</h1>
			</div>

			<form action="admin_modifica_dipartimento_query.php" method="post">
				<div class="row">
					<div class="col-md-4"> </div>
					<div class="col-md-4">
						<!-- <div class="row form-group"> -->
							<!-- <div class="input-group"> -->
								<!-- <span class="input-group-addon" id="basic-addon1">Codice</span> -->
								<!-- <input type="text" name="nuovo_codice"  class="form-control" value="<?php //echo $res_settore['Codice']; ?>"> -->
							<!-- </div> -->
						<!-- </div> -->
						<div class="row form-group">
							<div class="input-group">
								<span class="input-group-addon" id="basic-addon1">Nome</span>
								<input type="hidden" name="id_dipartimento" value="<?php echo $_GET['ID']; ?>">
								<input type="text" name="nuovo_nome_dipartimento" class="form-control" value="<?php echo $res_dipartimento['Nome_dipartimento']; ?>">
							</div>
						</div>
						<div class="row text-center">
							<input type="submit" value="Salva modifica" class="btn btn-info">
						</div>
					</div>
					<div class="col-md-4"> </div>
				</div>
			</form>
			
		</div>
	</body>
</html>
