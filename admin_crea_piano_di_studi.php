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
				<h1>Crea piano di studi</h1>
			</div>

			<form action="admin_crea_piano_di_studi_query.php" method="post">
				<div class="row">
					<div class="col-md-4"> </div>

					<div class="col-md-4">
						<div class=" form-group">
							<label for="corso">Corso</label>
							<select id="corso" name="corso" class="form-control">
								<option value="" selected disabled>Scegli...</option>
<?php
while($res=$res_settore->fetch_assoc()) {
?>
								<option value="<?php echo $res['Id']; ?>"><?php echo $res['Nome_corso']; }?></option>
							</select>
						</div>
						<label for="materia">Nome materie</label><br>
<?php
$sql_carica_materia="SELECT * FROM materie_anagrafica ORDER BY Nome_materia";
$res_materia=$connessione->query($sql_carica_materia);

?>
						<div class="row form-group">
							
							<div class="col-md-12">
								<select id="materia" name="materia" class="form-control">
									<option value="" selected disabled>Scegli...</option>
<?php
while($res2=$res_materia->fetch_assoc()) {
?>
									<option value="<?php echo $res2['Id']; ?>"><?php echo $res2['Nome_materia']; }?></option>
								</select>
							</div>
							
						</div>
						<label for="modulo">Modulo</label><br>
						<div class="row form-group">
							
							<div class="col-md-12">
								<select id="modulo" name="modulo" class="form-control">
									<option value="" selected disabled>Scegli...</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
								</select>
							</div>	
						</div>
						
						<label for="materia">Anno</label><br>
						<div class="row form-group">
							<div class="col-md-12">
								<select id="anno" name="anno" class="form-control">
									<option value="" selected disabled>Scegli...</option>
									<option value="1">Triennio - 1</option>
									<option value="2">Triennio - 2</option>
									<option value="3">Triennio - 3</option>
									<option value="4">Biennio - 1</option>
									<option value="5">Biennio - 2</option>
								</select>
							</div>
							
						</div>
						<label for="cfa">CFA</label><br>
						<div class="row form-group">
							<div class="col-md-12">
								<input type="number" id="cfa" name="cfa" class="form-control"/>
							</div>
							
						</div>
						<label for="categoria">Categoria</label><br>
						<div class="row form-group">
							
							<div class="col-md-12">
								<select id="categoria" name="categoria" class="form-control">
									<option value="" selected disabled>Scegli...</option>
									<option value="Base">Base</option>
									<option value="Caratterizzante">Caratterizzante</option>
									<option value="Integrativa">Integrativa</option>
								</select>
							</div>
							
						</div>
						
						<label for="tipo">Tipo</label><br>
						<div class="row form-group">
							<div class="col-md-12">
								<select id="tipo" name="tipo" class="form-control">
									<option value="" selected disabled>Scegli...</option>
									<option value="Teorioco">Teorioco</option>
									<option value="Teorico pratico">Teorico pratico</option>
									<option value="Laboratorio">Laboratorio</option>
								</select>
							</div>
						</div>
						
						<div class="row text-center">
							<input type="submit" value="Inserisci materia" class="btn btn-info">
						</div>
						
					</div>
					<div class="col-md-4"> </div>
				</div>
			</form>

		</div>
	</body>
</html>
