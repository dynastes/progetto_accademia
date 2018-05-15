<?php
//@session_start();
@include_once 'dbconnection.php';
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
				<h1>Inserisci dipartimento</h1>
			</div>
			<form action="admin_inserisci_dipartimento_query.php" method="POST">
				<div class="row">
					<div class="col-sm-4"></div>
					<div class="col-sm-4">
						
						<div class="row form-group">
							<div class="input-group">
								<span class="input-group-addon" id="basic-addon1">Nome</span>
								<input type="text" name="nome_dipartimento" class="form-control">
							</div>
						</div>
						<div class="row form-group">
							<div class="row text-center">
								<input type="submit" value="Inserisci dipartimento" class="btn btn-info">
							</div>
						</div>
					</div>
					<div class="col-sm-4"></div>
				</div>
			</form>
		</div>
	</body>
</html>
