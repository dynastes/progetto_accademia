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
				<h1>Modifica piano di studi</h1>
			</div>
			<ul class="nav nav-tabs">
				<li class="active col-md-4 schede"><a href="#triennio" data-toggle="tab">Triennio</a></li>
				<li class="col-md-4 schede"><a href="#biennio" data-toggle="tab">Biennio</a></li>
				<li class="col-md-4 schede"><a href="#unico" data-toggle="tab">Ciclo unico</a></li>
			</ul>
			<div class="tab-content container">
				<div class="tab-pane active" id="triennio">
					<form action="admin_crea_piano_di_studi_query.php" method="post">
						<div class="row">
							<div class="form-group">
								
								<table class="table">
									<tr><th colspan="7">Elenco piani di studio</th></tr>
									<tr><td>Corso</td><td>Materia</td><td>Modula</td><td>Anno</td><td>CFA</td><td>Categoria</td><td>Tipologia</td></tr>
<?php 
 $sql_carica_piani="SELECT * FROM materie_piano";
 $res_piani=$connessione->query($sql_carica_piani);
 while($res=$res_piani->fetch_assoc()) {
	$Id_corso=$res['Id_corso'];
	$Id_materia=$res['Id_materia'];

	$sql_carica_id="SELECT Nome_corso FROM corsi WHERE Id='".$Id_corso."'";
	$res_id_corso=$connessione->query($sql_carica_id);
	$res_id=$res_id_corso->fetch_assoc();

	$sql_carica_materia="SELECT Nome_materia FROM materie_anagrafica WHERE Id='".$Id_materia."'";
	$res_materia_corso=$connessione->query($sql_carica_materia);
	$res_materia=$res_materia_corso->fetch_assoc();	
?>
									<tr>
										<td><?php //echo $res_id['Nome_corso']; ?></td><td><?php //echo $res_materia['Nome_materia']; ?></td>
										<td><?php //echo $res['Modulo']; ?></td><td><?php //echo $res['Anno']; ?></td>
										<td><?php //echo $res['Cfa']; ?></td>	<td><?php //echo $res['Categoria']; ?></td>
										<td><?php //echo $res['Tipologia']; }?></td>
									</tr>
								</table>
							</div>
						</div>
					</form>
				</div>
			</div><!-- tab-content clearfix -->

		</div>
	</body>
</html>
