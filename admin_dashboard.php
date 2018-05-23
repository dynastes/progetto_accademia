<?php
//@session_start();
@include_once 'dbconnection.php';


?>

<html>
	<head>
		<?php @include_once 'shared/head_inclusions.php';?>
		<link href="css/dashboard.css" rel="stylesheet">
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
			<div class="dashboard-header text-center">
						<img src="img/logo.png" class="dashboard-logo">	
						<h1> Accademia di Belle Arti Kandinskij  </h1>
					
		
						<h3>Dashboard<h3>
					
			</div>
			<div class="row">
				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
					<a href="profilo.php" class="btn btn-default custom-button"> <i class="fas fa-user"> </i> &nbsp Profilo </a>
				</div>
				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
					<a href="" class="btn btn-default custom-button"><i class="fas fa-check-square"> </i> &nbsp Feedback </a>
				</div>
				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
					<a href="admin_imposta_orari_lezione.php" class="btn btn-default custom-button"><i class="fas fa-calendar-alt"> </i> &nbsp Calendario </a>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
					<a class="btn btn-default custom-button"><i class="fas fa-book"> </i> &nbsp Materie </a>
				</div>
				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
					<a href="admin_gestione_finanze.php" class="btn btn-default custom-button"><i class="fas fa-file-alt"> </i> &nbsp Documenti </a>
				</div>
				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
					<a class="btn btn-default custom-button"><i class="fas fa-chalkboard-teacher"> </i> &nbsp Docenti </a>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
					<a href="admin_gestisci_certificati.php" class="btn btn-default custom-button"><i class="fas fa-info"> </i> &nbsp Richieste </a>
				</div>
				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
					<a class="btn btn-default custom-button"><i class="fas fa-user-graduate"> </i> &nbsp Allievi </a>
				</div>
				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
					<a class="btn btn-default custom-button"><i class="fas fa-user-edit"> </i> &nbsp  Editors</a>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
				
				</div>
				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
					<a class="btn btn-danger custom-button"><i class="fas fa-door-open"> </i> &nbsp Disconnetti </a>
				</div>
			</div>
		</div>
		<script>
			$(".navbar").hide();
		</script>
	</body>
</html>
