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

//prendo la lista dell'offerta formativa (l'ID e stringhe) ...
/*$sql_offerta_formativa="SELECT Nome FROM offerta_formativa GROUP BY Nome";
$query_offerta_formativa=$connessione->query($sql_offerta_formativa);*/
//$res_offerta_formativa=$query_offerta_formativa->fetch_assoc();

//...prendo la lista di dipartimenti per ogni Offerta formativa esistente
$sql_dipartimenti_triennio="SELECT Id_dipartimento FROM offerta_formativa WHERE Nome='Triennio'";
$query_dipartimenti_triennio=$connessione->query($sql_dipartimenti_triennio);

$sql_dipartimenti_biennio="SELECT Id_dipartimento FROM offerta_formativa WHERE Nome='Biennio'";
$query_dipartimenti_biennio=$connessione->query($sql_dipartimenti_biennio);


$sql_dipartimenti_ciclo_unico="SELECT Id_dipartimento FROM offerta_formativa WHERE Nome='Ciclo_unico'";
$query_dipartimenti_ciclo_unico=$connessione->query($sql_dipartimenti_ciclo_unico);





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
<?php
	//echo $query_dipartimenti_triennio;
	while ($res_dipartimenti_triennio=$query_dipartimenti_triennio->fetch_assoc()) {
		//prendo il nome del dipartimento in cui siamo ora
		$sql_dipartimento_nome="SELECT Id, Nome_dipartimento FROM dipartimenti WHERE Id=".$res_dipartimenti_triennio["Id_dipartimento"]." LIMIT 1";
		$query_dipartimento_nome=$connessione->query($sql_dipartimento_nome);
		$res_dipartimento_nome=$query_dipartimento_nome->fetch_assoc();
		?>
							<h4><?php echo "Dipartimento di ".$res_dipartimento_nome["Nome_dipartimento"]; ?></h4>
							<ul>
		<?php
		//qui stampo tutti i corsi che fanno parte: di questo dipartimento;
		$sql_corsi="SELECT Id, Nome_corso FROM corsi WHERE Id_dipartimento=".$res_dipartimento_nome["Id"];
		$query_corsi=$connessione->query($sql_corsi);
		while ($res_corsi=$query_corsi->fetch_assoc()) {
			?>
								<li>
			<?php echo "
									<a href='admin_modifica_piano_di_studi.php?corso=&offerta=1'>".
										$res_corsi['Nome_corso']."
									</a>";
			?>
								</li>
			<?php
		}
		?>
								<li><a href="admin_modifica_piano_di_studi.php?corso=1&offerta=1">Pittura</a></li>
							</ul>
		<?php
	}
?>
							<h4>Dipartimento di Arti Visive</h4>
							<ul>
								<li><a href="admin_modifica_piano_di_studi.php?corso=1&offerta=1">Pittura</a></li>
								<li><a href="admin_modifica_piano_di_studi.php?corso=2&offerta=1">Scultura</a></li>
								<li><a href="admin_modifica_piano_di_studi.php?corso=3&offerta=1">Decorazione</a></li>
								<li><a href="admin_modifica_piano_di_studi.php?corso=4&offerta=1">Grafica</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="tab-pane" id="biennio">
					<div class="row">
						<div class=" form-group">
						<h4>Dipartimento di Arti Visive</h4>
							<ul>
								<li><a href="admin_modifica_piano_di_studi.php?corso=1&offerta=2">Pittura</a></li>
								<li><a href="admin_modifica_piano_di_studi.php?corso=2&offerta=2">Scultura</a></li>
								<li><a href="admin_modifica_piano_di_studi.php?corso=3&offerta=2">Decorazione</a></li>
								<li><a href="admin_modifica_piano_di_studi.php?corso=4&offerta=2">Grafica</a></li>
								<li><a href="admin_modifica_piano_di_studi.php?corso=11&offerta=2">Terapeutica Artistica</a></li>
							</ul>
							<h4>Dipartimento di Progettazione e Arti Applicate</h4>
							<ul>
								<li><a href="admin_modifica_piano_di_studi.php?corso=12&offerta=2">Scenografia Progettazione Plastica</a></li>
								<li><a href="admin_modifica_piano_di_studi.php?corso=6&offerta=2">Fashion Design</a></li>
								<li><a href="admin_modifica_piano_di_studi.php?corso=13&offerta=2">Product Design</a></li>
								<li><a href="admin_modifica_piano_di_studi.php?corso=14&offerta=2">Arti Multimediali del Cinema e del Video</a></li>
								<li><a href="admin_modifica_piano_di_studi.php?corso=15&offerta=2">Fotografia</a></li>
							</ul>
							<h4>Dipartimento di Comunicazione e Didattica dell’Arte</h4>
							<ul>
								<li><a href="admin_modifica_piano_di_studi.php?corso=16&offerta=2">Applicazioni Digitali per i Beni Culturali</a></li>
								<ul>
									<li><a href="admin_modifica_piano_di_studi.php">Indirizzo Archeologico</a></li>
								</ul>
								<li><a href="admin_modifica_piano_di_studi.php?corso=17&offerta=2">Didattica Multimediale</a></li>
							</ul>

						</div>
					</div>
				</div>
				<div class="tab-pane" id="unico">
					<div class="row">
						<div class=" form-group">
							<h4>Dipartimento di Progettazione e arti applicate</h4>
							<ul>
								<li><a href="admin_modifica_piano_di_studi.php?corso=18&offerta=3">Restauro</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div><!-- tab-content clearfix -->

		</div>
	</body>
</html>
