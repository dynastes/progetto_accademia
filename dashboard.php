<?php
//@session_start();
@include_once 'dbconnection.php';


?>

<html>
	<head>
		<?php @include_once 'shared/head_inclusions.php';?>
		<link href="css/dashboard.css" rel="stylesheet">
		<?php @include_once 'shared/menu.php';?>
		<?php $_SESSION['lang'] = "En"; ?>
	</head>

	<body>
		<?php menu(); ?>
		<?php
		if (isset ($_SESSION['password_modificata'])) {
		    if ($_SESSION['password_modificata'] == true) {
					echo "<div style=\"width:100%;background-color:green;text-align:center;\"><b>Password modificata correttamente! </b></div>";

		        $_SESSION['password_modificata'] = false;
		    }
		}
		 ?>
		<div class="container">
			<?php
					include("shared/lingue.php");
			 ?>
			<div class="dashboard-header text-center">
						<img src="img/logo.png" class="dashboard-logo">
						<h1> <?= titolo_accademia ?> </h1>
						<h3> <?= dashboard ?> - <?php echo($utente->get_ruolo()); ?> <h3>
						<p>
														<b><?= benvenuto ?> <?php echo $utente->nome; ?></b>
						</p>
			</div>
			<?php
			if($utente->get_ruolo() =="admin" or  $utente->get_ruolo() == "editor"){
				echo('	<div class="row">
						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
							<a href="profilo.php" class="btn btn-default custom-button"> <i class="fas fa-user"> </i> &nbsp Profilo </a>
						</div>
						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
						<a href="#" class="dropdown-toggle btn btn-default custom-button" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fas fa-check-square"> </i> &nbsp Feedback<span class="caret"></span></a>
							<ul class="dropdown-menu custom-dropdown">
									<li><a href="aggiungi_questionario.php">Aggiungi questionario feedback</a></li>
									<li><a href="verifica_risposte.php">Verifica risposte studenti</a></li>
							</ul>
						</div>
						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
							<a href="admin_imposta_orari_lezione.php" class="btn btn-default custom-button"><i class="fas fa-calendar-alt"> </i> &nbsp Calendario </a>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
							<a href="#" class="dropdown-toggle btn btn-default custom-button" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fas fa-book"> </i> &nbsp Materie<span class="caret"></span></a>
							<ul class="dropdown-menu custom-dropdown">
									<li><a href="admin_visualizza_offerta_formativa.php">Offerta formativa</a></li>
									<li><a href="admin_visualizza_dipartimenti.php">Dipartimenti</a></li>
									<li><a href="admin_visualizza_corsi.php">Corsi</a></li>
									<li><a href="admin_visualizza_settori.php">Settori</a></li>
									<li><a href="admin_visualizza_materie_anagrafe.php">Materie</a></li>
									<li><a href="admin_visualizza_piano_di_studi.php">Piani di studio</a></li>
							</ul>
						</div>
						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
							<a href="admin_gestione_finanze.php" class="btn btn-default custom-button"><i class="fas fa-file-alt"> </i> &nbsp Documenti </a>
						</div>
						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
						 <a href="#" class="dropdown-toggle btn btn-default custom-button
						 " data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fas fa-chalkboard-teacher"> </i> &nbsp Gestisci Docenti <span class="caret"></span></a>
							  <ul class="dropdown-menu custom-dropdown">
								<li><a href="admin_registra_professori.php">Inserisci nuovo docente</a></li>
								<li><a href="admin_imposta_materia_docenti.php">Imposta/cambia materia docenti</a></li>
								<li><a href="admin_visualizza_docenti.php">Visualizza Docenti</a></li>
							  </ul>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
							<a href="admin_gestisci_certificati.php" class="btn btn-default custom-button"><i class="fas fa-info"> </i> &nbsp Richieste </a>
						</div>
						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
							<a href="#" class="dropdown-toggle btn btn-default custom-button" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user-graduate"> </i>  Allievi <span class="caret"></span></a>
								  <ul class="dropdown-menu custom-dropdown">
									<li><a href="admin_inserisci_studenti.php">Inserisci nuovo utente</a></li>
									<li><a href="admin_trasforma_iscritto_in_studente.php">Immatricola iscritto</a></li>
									<li><a href="admin_visualizza_studenti.php">Visualizza tutti gli studenti</a></li>
												<li><a href="admin_inserisci_voti.php">Inserisci Voti Studenti</a><!-- * --></li>
								  </ul>
						</div>
						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
							 <a href="#" class="dropdown-toggle btn btn-default custom-button" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user-edit"> </i> &nbsp Editors <span class="caret"></span></a>
								  <ul class="dropdown-menu custom-dropdown">
									<li><a href="admin_inserisci_editor.php">Inserisci nuovo editor</a></li>
									<li><a href="admin_visualizza_editor.php">Visualizza tutti gli editor</a></li>
								  </ul>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">

						</div>
						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
							<a href="logout.php" class="btn btn-danger custom-button"><i class="fas fa-door-open"> </i> &nbsp Disconnetti </a>
						</div>
					</div>
				</div>

');
			}
			if($utente->get_ruolo() =="studente"){
				echo('<div class="row">
						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
							<a href="profilo.php" class="btn btn-default custom-button"> <i class="fas fa-user"> </i> &nbsp '.profilo.' </a>
						</div>
						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
							<a href="studenti_visualizza_piano_studi.php" class="btn btn-default custom-button"> <i class="fas fa-book"> </i> &nbsp '.piano_di_studi.'</a>
						</div>
							<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
								<a href="studenti_visualizza_orario_lezione.php" class="btn btn-default custom-button"><i class="fas fa-calendar-alt"> </i> &nbsp '.orario_lezioni.' </a>

							</div>
					</div>
					<br>
					<div class="row">
						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
							<a href="studenti_home.php" class="btn btn-default custom-button"> <i class="fas fa-exclamation"> </i> &nbsp '.avvisi.' </a>
						</div>
						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
							<a href="studenti_home.php?tipo=questionari" class="btn btn-default custom-button"> <i class="fas fa-check-square"> </i> &nbsp '.feedback.' </a>
						</div>
						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
						<a href="#" class="dropdown-toggle btn btn-default custom-button" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fas fa-book"> </i> &nbsp '.documenti_certificati.'<span class="caret"></span></a>
						<ul class="dropdown-menu custom-dropdown">
							<li><a href="studenti_visualizza_documenti.php">'.visualizza_documenti.'</a></li>
							<li><a href="studenti_carica_documenti.php">'.carica_documenti.'</a></li>
							<li><a href="studenti_richieste.php">'.richiedi_documenti_certificati.'</a></li>
							<!--<li><a href="#">Richiedi certificati</a></li>-->
						</ul>
						</div>

					</div>
					<br />
					<div class="row">
						<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">

						</div>
						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
							<a href="logout.php" class="btn btn-danger custom-button"><i class="fas fa-door-open"> </i> &nbsp'.disconnetti.' </a>
						</div>
					</div>
					');

			}
			if($utente->get_ruolo() =="docente"){
				echo('	<div class="row">
						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
							<a href="profilo.php" class="btn btn-default custom-button"> <i class="fas fa-user"> </i> &nbsp Profilo </a>
						</div>

						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
							<a href="docenti_visualizza_orario_lezioni.php" class="btn btn-default custom-button"><i class="fas fa-calendar-alt"> </i> &nbsp Orario Lezioni </a>
						</div>
						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
						 <a href="#" class="dropdown-toggle btn btn-default custom-button
						 " data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fas fa-chalkboard-teacher"> </i> &nbsp Documenti <span class="caret"></span></a>
						 <ul class="dropdown-menu custom-dropdown">
								 <li><a href="docenti_visualizza_programma.php">Visualizza Documenti</a></li>
								 <li><a href="docenti_carica_programma.php">Carica Documenti</a></li>
						 </ul>
						</div>
					</div>
					<br>
					<div class="row">

						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
						 <a href="#" class="dropdown-toggle btn btn-default custom-button
						 " data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fas fa-chalkboard-teacher"> </i> &nbsp Comunicazioni <span class="caret"></span></a>
						 <ul class="dropdown-menu custom-dropdown">
								<li><a href="docenti_visualizza_avvisi.php">Visualizza Comunicazioni</a></li>
								<li><a href="docenti_carica_avvisi.php">Nuova Comunicazione</a></li>
							</ul>
						</div>
						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
							<a href="logout.php" class="btn btn-danger custom-button"><i class="fas fa-door-open"> </i> &nbsp Disconnetti </a>
						</div>
					</div>
					<br>

					<br>
					<div class="row">
						<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">

						</div>

					</div>
				</div>

');
			}
		?>



		<script>
			$(".navbar").hide();
			$(".caret").hide();
				$('.custom-dropdown').css("width",$('.custom-button').css("width"));
			$(window).resize(function(){
				$('.custom-dropdown').css("width",$('.custom-button').css("width"));
			});

		</script>
	</body>
</html>
