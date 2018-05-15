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
				<?php
			if($utente->get_ruolo() !="admin" and $utente->get_ruolo() != "editor"){
				header("location: index.php");
			}
		?>
	</head>

	<body>
		<?php menu(); ?>
		<div class="container">
			<div class="page-header">
				<h1>Inserisci offerta formativa</h1>
			</div>
			<form action="admin_crea_offerta_formativa_query.php" method="POST">
				<div class="row">
					<div class="col-sm-4"></div>
					<div class="col-sm-4">
						<div class="row form-group">
							<div class="input-group">
								<span class="input-group-addon" id="basic-addon1">Periodo</span>
								<select name="campo_periodo" size="1" class="form-control" required>
									<option value="" selected disabled>Scegli...</option>
									<option value="1">Triennio</option>
									<option value="2">Biennio</option>
									<option value="3">Ciclo Unico</option>
								</select>
							</div>
						</div>
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
								<span class="input-group-addon" id="basic-addon1">Attivo</span>
								<select name="attivo" size="1" class="form-control" required>
									<option value="" selected disabled>Scegli...</option>
									<option value="1">Si</option>
									<option value="0">No</option>
								</select>
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
