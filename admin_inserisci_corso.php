<?php
//@session_start();
@include_once 'dbconnection.php';
$sql_carica_dipartimenti="SELECT * FROM dipartimenti WHERE NOT Id=1";
$res_dipartimenti=$connessione->query($sql_carica_dipartimenti);
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
				<h1>Inserisci corso</h1>
			</div>
			<form action="admin_inserisci_corso_query.php" method="POST">
				<div class="row">
					<div class="col-sm-4"></div>
					<div class="col-sm-4">
						<div class="row form-group">
							<div class="input-group">
								<span class="input-group-addon" id="basic-addon1">Dipartimento</span>
								<select id="dipartimento" name="dipartimento" class="form-control" required>
									<option value="" selected disabled>Scegli...</option>
<?php while($res=$res_dipartimenti->fetch_assoc()) {?>
									<option value="<?php echo $res['Id']; ?>"><?php echo $res['Nome_dipartimento']; }?></option>
								</select>
							</div>
						</div>
						<div class="row form-group">
							<div class="input-group">
								<span class="input-group-addon" id="basic-addon1">Nome corso</span>
								<input type="text" name="nome_corso" class="form-control">
							</div>
						</div>
						<div class="row form-group">
							<div class="row text-center">
								<input type="submit" value="Inserisci corso" class="btn btn-info">
							</div>
						</div>
					</div>
					<div class="col-sm-4"></div>
				</div>
			</form>
		</div>
	</body>
</html>
