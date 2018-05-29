<?php
//@session_start();
@include_once 'dbconnection.php';
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
				<h1>Inserisci settore</h1>
			</div>
			<form action="admin_inserisci_settore_query.php" method="POST">
				<div class="row">
					<div class="col-sm-4"></div>
					<div class="col-sm-4">
						<div class="row form-group">
							<div class="input-group">
								<span class="input-group-addon" id="basic-addon1">Codice</span>
								<input type="text" pattern="[A-Za-z]" name="codice_settore" class="form-control">
							</div>
						</div>
						<div class="row form-group">
							<div class="input-group">
								<span class="input-group-addon" id="basic-addon1">Nome settore</span>
								<input type="text" pattern="[A-Za-z]" name="nome_settore" class="form-control">
							</div>
						</div>
						<div class="row form-group">
							<div class="row text-center">
								<input type="submit" value="Inserisci settore" class="btn btn-info">
							</div>
						</div>
					</div>
					<div class="col-sm-4"></div>
				</div>
			</form>
		</div>
	</body>
</html>
