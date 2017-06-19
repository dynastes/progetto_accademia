<?php
@include_once 'dbconnection.php';

//Prendi il nome del settore selezionato
$sql_settore="SELECT Codice, Settore FROM settore WHERE Id=".$_GET['ID'];
$settore=$connessione->query($sql_settore);
$res_settore=$settore->fetch_assoc();
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
				<h1>Modifica settore</h1>
			</div>

			<form action="admin_modifica_settore_query.php" method="post">
				<div class="row">
					<div class="col-md-4"> </div>
					<div class="col-md-4">
						<div class="row form-group">
							<div class="input-group">
								<span class="input-group-addon" id="basic-addon1">Codice</span>
								<input type="text" name="nuovo_codice"  class="form-control" value="<?php echo $res_settore['Codice']; ?>">
							</div>
						</div>
						<div class="row form-group">
							<div class="input-group">
								<span class="input-group-addon" id="basic-addon1">Nome</span>
								<input type="hidden" name="id_settore" value="<?php echo $_GET['ID']; ?>">
								<input type="text" name="nuovo_nome_settore" class="form-control" value="<?php echo $res_settore['Settore']; ?>">
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
