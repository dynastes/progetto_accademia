<?php
//@session_start();
@include_once 'dbconnection.php';

/*prendere dalla tabella la lista di settori con questi campi:
	- ID settore
	- codice

*/

$sql_carica_settore="SELECT * FROM settore";
$res_settore=$connessione->query($sql_carica_settore);
//$res_settore_lista=$res_settore->fetch_assoc();

/*

Prendere inoltre i seguenti campi dalla tabella "materie_anagrafica":
	- Id
	- Nome_materia
	- Id_settore (qui dentro, invece, salvare il valore del settore selezionato nel form)
*/
/*<!DOCTYPE html>
<meta charset="UTF-8">	*/
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
			<div class="dashboard-header text-center">
						<img src="img/logo.png" class="dashboard-logo">	
						<h1> Accademia di Belle Arti Kandinskij  </h1>
					
		
						<h3>Dashboard<h3>
					
			</div>
			<div class="row">
				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
					<button class="btn btn-default custom-button"> <i class="fas fa-user"> </i> &nbsp Profilo </button>
				</div>
				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
					<button class="btn btn-default custom-button"><i class="fas fa-check-square"> </i> &nbsp Feedback </button>
				</div>
				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
					<button class="btn btn-default custom-button"><i class="fas fa-calendar-alt"> </i> &nbsp Calendario </button>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
					<button class="btn btn-default custom-button"><i class="fas fa-book"> </i> &nbsp Materie </button>
				</div>
				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
					<button class="btn btn-default custom-button"><i class="fas fa-file-alt"> </i> &nbsp Documenti </button>
				</div>
				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
					<button class="btn btn-default custom-button"><i class="fas fa-chalkboard-teacher"> </i> &nbsp Docenti </button>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
					<button class="btn btn-default custom-button"><i class="fas fa-info"> </i> &nbsp Richieste </button>
				</div>
				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
					<button class="btn btn-default custom-button"><i class="fas fa-user-graduate"> </i> &nbsp Allievi </button>
				</div>
				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
					<button class="btn btn-default custom-button"><i class="fas fa-user-edit"> </i> &nbsp  Editors</button>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
				
				</div>
				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
					<button class="btn btn-danger custom-button"><i class="fas fa-door-open"> </i> &nbsp Disconnetti </button>
				</div>
			</div>
		</div>
		<script>
			$(".navbar").hide();
		</script>
	</body>
</html>
