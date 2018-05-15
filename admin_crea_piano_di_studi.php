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
		<?php
			if($utente->get_ruolo() !="admin" and $utente->get_ruolo() != "editor"){
				header("location: index.php");
			}
		?>
		<script language="javascript">
			/*Questa funzione legga il valore passato come parametro e dato il valore, aggiunge delle opzioni al secondo campo*/
			function selezionaOpzioni(scelta) {
				/*Resetto le opzioni precedenti del campo*/
				var campo_anno = document.form.campo_anno;
				campo_anno.options.length = 0;
				/*verifico la scelta e aggiungo i campi*/
				if (scelta == "1") {
					campo_anno.options[campo_anno.options.length] = new Option('1');
					campo_anno.options[campo_anno.options.length] = new Option('2');
					campo_anno.options[campo_anno.options.length] = new Option('3');
					document.getElementById("anno").disabled=false;
				}
				if (scelta == "2") {
					campo_anno.options[campo_anno.options.length] = new Option('1');
					campo_anno.options[campo_anno.options.length] = new Option('2');
					document.getElementById("anno").disabled=false;
				}
				if (scelta == "3") {
					campo_anno.options[campo_anno.options.length] = new Option('1');
					campo_anno.options[campo_anno.options.length] = new Option('2');
					campo_anno.options[campo_anno.options.length] = new Option('3');
					campo_anno.options[campo_anno.options.length] = new Option('4');
					campo_anno.options[campo_anno.options.length] = new Option('5');
					document.getElementById("anno").disabled=false;
				}
			}
			function aggiornaAnni(scelta){
				var selezionato = document.form.campo_periodo.selectedIndex;
				var campo = document.form.campo_periodo.options;
				selezionaOpzioni(campo[selezionato].value);
			}
		</script>

	</head>

	<body>
		<?php menu(); ?>
		<div class="container">
			<div class="page-header">
				<h1>Crea piano di studi</h1>
			</div>
			<form name="form" action="admin_crea_piano_di_studi_query.php" method="post">
				<div class="row">
					<div class="col-md-4"> </div>

					<div class="col-md-4">
						<div class=" form-group">
							<!--<label for="corso">Corso</label>-->
							<div class="input-group">
								<span class="input-group-addon" id="basic-addon1">Corso</span>
								<select id="corso" name="corso" class="form-control" required>
									<option value="" selected disabled>Scegli...</option>
<?php while($res=$res_settore->fetch_assoc()) {?>
									<option value="<?php echo $res['Id']; ?>"><?php echo $res['Nome_corso']; }?></option>
								</select>
							</div>
						</div>
						<!--<label for="materia">Nome materie</label><br>-->
<?php
$sql_carica_materia="SELECT * FROM materie_anagrafica ORDER BY Nome_materia";
$res_materia=$connessione->query($sql_carica_materia);
?>
						<div class="row form-group">
							<div class="col-md-12">
							<div class="input-group">
								<span class="input-group-addon" id="basic-addon1">Nome materie</span>
									<select id="materia" name="materia" class="form-control" required>
										<option value="" selected disabled>Scegli...</option>
<?php while($res2=$res_materia->fetch_assoc()) {?>
										<option value="<?php echo $res2['Id']; ?>"><?php echo $res2['Nome_materia']; }?></option>
									</select>
								</div>
							</div>
						</div>
						
						<!-- <label for="modulo">Modulo</label><br> -->
						<div class="row form-group">
							<div class="col-md-12">
								<div class="input-group">
									<span class="input-group-addon" id="basic-addon1">Modulo</span>
									<select id="modulo" name="modulo" class="form-control">
										<option value="" selected disabled>Scegli...</option>
										<option value="0">Unico</option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
									</select>
								</div>
							</div>
						</div>
						
						<!-- <label for="materia">Periodo</label><br> -->
						<div class="row form-group">
							<div class="col-md-12">
								<div class="input-group">
									<span class="input-group-addon" id="basic-addon1">Periodo</span>
									<select name="campo_periodo" size="1" class="form-control" onchange="aggiornaAnni();" required>
										<option value="" selected disabled>Scegli...</option>
										<option value="1">Triennio</option>
										<option value="2">Biennio</option>
										<option value="3">Ciclo Unico</option>
									</select>
								</div>
							</div>
						</div>

						<!-- <label for="materia">Anno</label><br> -->
						<div class="row form-group">
							<div class="col-md-12">
								<div class="input-group">
									<span class="input-group-addon" id="basic-addon1">Anno</span>
									<select id="anno" name="campo_anno"  size="1" class="form-control" required disabled>
										<!-- <option value="" selected disabled>Scegli...</option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option> -->
									</select>
								</div>
							</div>
						</div>
						<!-- <label for="cfa">Ore</label><br> -->
						<!-- <div class="row form-group">
							<div class="col-md-12">
								<div class="input-group">
									<span class="input-group-addon" id="basic-addon1">Ore</span>
									<input type="number" min="1" max="250" id="ore" name="ore" class="form-control" required/>
								</div>
							</div>
						</div> -->
						
						<!-- <label for="cfa">CFA</label><br> -->
						<div class="row form-group">
							<div class="col-md-12">
								<div class="input-group">
									<span class="input-group-addon" id="basic-addon1">CFA</span>
									<input type="number" min="1" max="20" id="cfa" name="cfa" class="form-control" required/>
								</div>
							</div>
						</div>
						
							<!-- <label for="tipo">Tipo</label><br> -->
						<div class="row form-group">
							<div class="col-md-12">
								<div class="input-group">
									<span class="input-group-addon" id="basic-addon1">Tipo</span>
									<select id="tipo" name="tipo" class="form-control" required>
										<option value="" selected disabled>Scegli...</option>
										<option value="T">Teorioco</option>
										<option value="TP">Teorico pratico</option>
										<option value="L">Laboratorio</option>
									</select>
								</div>
							</div>
						</div>
						
						<!-- <label for="categoria">Categoria</label><br> -->
						<div class="row form-group">
							<div class="col-md-12">
								<div class="input-group">
									<span class="input-group-addon" id="basic-addon1">Categoria</span>
									<select id="categoria" name="categoria" class="form-control" required>
										<option value="" selected disabled>Scegli...</option>
										<option value="Base">Base</option>
										<option value="Caratterizzante">Caratterizzante</option>
										<option value="Integrativa">Integrativa</option>
										<option value="Obbligatoria">Obbligatoria</option> 
									</select>
								</div>
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
<?php @include_once 'shared/footer.php';?>

		</script>
	</body>
</html>
