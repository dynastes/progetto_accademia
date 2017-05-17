<?php
//@session_start();
@include_once 'dbconnection.php';

/*prendere dalla tabella la lista di settori con questi campi:
	- ID settore
	- codice

*/

$sql_carica_settore="SELECT * FROM corsi";
$res_settore=$connessione->query($sql_carica_settore);
//$res_settore_lista=$res_settore->fetch_assoc();

/*

Prendere inoltre i seguenti campi dalla tabella "materie_anagrafica":
	- Id
	- Nome_materia
	- Id_settore (qui dentro, invece, salvare il valore del settore selezionato nel form)
*/
/*
<meta charset="UTF-8">	*/
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">
	<head>
		<?php @include_once 'shared/head_inclusions.php';?>
			<?php @include_once 'shared/menu.php';?>
	</head>

	<body>
		<?php menu(); ?>
		<div class="container">
			<div class="page-header">
				<h1>Visualizza piano di studi</h1>
			</div>
			<ul class="nav nav-tabs">
				<li class="active col-md-4 schede"><a href="#triennio" data-toggle="tab">Triennio</a></li>
				<li class="col-md-4 schede"><a href="#biennio" data-toggle="tab">Biennio</a></li>
				<li class="col-md-4 schede"><a href="#unico" data-toggle="tab">Ciclo unico</a></li>
			</ul>
			<div class="tab-content container">
				<div class="tab-pane active" id="triennio">
					<div class="row">
						<div class="form-group">
							<h4>Dipartimento di Arti Visive</h4>
							<ul>
								<li><a href="#">Pittura</a></li>
								<li><a href="#">Scultura</a></li>
								<li><a href="#">Decorazione</a></li>
								<li><a href="#">Grafica</a></li>
							</ul>
							<h4>Dipartimento di Progettazione e Arti Applicate</h4>
							<ul>
								<li><a href="#">Scenografia</a></li>
								<li><a href="#">Fashion Design</a></li>
								<li><a href="#">Graphic Design</a></li>
								<li><a href="#">Nuove Tecnologie dell’Arte</a></li>
								<ul>
									<li><a href="#">Indirizzo Foto, Cinema e Televisione</a></li>
								</ul>
							</ul>
							<h4>Dipartimento di Comunicazione e Didattica dell’Arte</h4>
							<ul>
								<li><a href="#">Valorizzazione Dei Beni Culturali</a></li>
								<ul>
									<li><a href="#">Indirizzo Archeologia</a></li>
								</ul>
								<li><a href="#">Comunicazione e Didattica dell’Arte</a></li>
								<ul>
									<li><a href="#">Indirizzo Arte Terapia</a></li>
								</ul>
							</ul>
						</div>
					</div>
				</div>
				<div class="tab-pane" id="biennio">
					<div class="row">
						<div class=" form-group">
						<h4>Dipartimento di Arti Visive</h4>
							<ul>
								<li><a href="#">Pittura</a></li>
								<li><a href="#">Scultura</a></li>
								<li><a href="#">Decorazione</a></li>
								<li><a href="#">Grafica</a></li>
								<li><a href="#">Terapeutica Artistica</a></li>
							</ul>
							<h4>Dipartimento di Progettazione e Arti Applicate</h4>
							<ul>
								<li><a href="#">Scenografia Progettazione Plastica</a></li>
								<li><a href="#">Fashion Design</a></li>
								<li><a href="#">Product Design</a></li>
								<li><a href="#">Arti Multimediali del Cinema e del Video</a></li>
								<li><a href="#">Fotografia</a></li>
							</ul>
							<h4>Dipartimento di Comunicazione e Didattica dell’Arte</h4>
							<ul>
								<li><a href="#">Applicazioni Digitali per i Beni Culturali</a></li>
								<ul>
									<li><a href="#">Indirizzo Archeologico</a></li>
								</ul>
								<li><a href="#">Didattica Multimediale</a></li>
							</ul>
						
						</div>
					</div>
				</div>
				<div class="tab-pane" id="unico">
					<div class="row">
						<div class=" form-group">
							//////////////
							
						</div>
					</div>
				</div>
			</div><!-- tab-content clearfix -->

		</div>
	</body>
</html>
