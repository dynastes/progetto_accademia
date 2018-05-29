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
			<div class="page-header">
				<h1>Inserisci materia/e</h1>
			</div>

			<form action="admin_inserisci_materia_anagrafe_query.php" method="post">
				<div class="row">
					<div class="col-md-4"> </div>

					<div class="col-md-4">
						<!--<div class=" form-group">
							<label for="settore">Settore</label>-->
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon1">Settore</span>
							<select id="settore" name="settore" class="form-control">
								<?php
								while($res=$res_settore->fetch_assoc()) {
									//if($_SESSION['id_settore']==$res['Id']){
										?>
										<option value="<?php echo $res['Id']; ?>" selected><?php echo $res['Codice']; ?></option>

									<?php
									 //} else { ?>
										<!-- <option value="<?php //echo $res['Id']; ?>"><?php //echo $res['Codice']; ?></option> -->
									<?php
									//}
								}
								?>
							</select>
						</div>
						<br><label for="nome_materia">Nome materia/e </label><br>
						<div class="row form-group">
							<div class="col-md-12">
								<div class="input-group">
									<span class="input-group-addon" id="basic-addon1">1</span>
									<input type="text" id="nome_materia1" pattern="[A-Za-z]+" name="nome_materia1" class="form-control">
								</div>
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-12">
								<div class="input-group">
									<span class="input-group-addon" id="basic-addon1">2</span>
									<input type="text" id="nome_materia2" pattern="[A-Za-z]+" name="nome_materia2" class="form-control">
								</div>
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-12">
								<div class="input-group">
									<span class="input-group-addon" id="basic-addon1">3</span>
									<input type="text" id="nome_materia3" pattern="[A-Za-z]+" name="nome_materia3" class="form-control">
								</div>
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-12">
								<div class="input-group">
									<span class="input-group-addon" id="basic-addon1">4</span>
									<input type="text" id="nome_materia4" pattern="[A-Za-z]+" name="nome_materia4" class="form-control">
								</div>
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-12">
								<div class="input-group">
									<span class="input-group-addon" id="basic-addon1">5</span>
									<input type="text" id="nome_materia5" pattern="[A-Za-z]+" name="nome_materia5" class="form-control">
								</div>
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-12">
								<div class="input-group">
									<span class="input-group-addon" id="basic-addon1">6</span>
									<input type="text" id="nome_materia6" pattern="[A-Za-z]+" name="nome_materia6" class="form-control">
								</div>
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-12">
								<div class="input-group">
									<span class="input-group-addon" id="basic-addon1">7</span>
									<input type="text" id="nome_materia7" pattern="[A-Za-z]+" name="nome_materia7" class="form-control">
								</div>
							</div>
						</div>
						<!-- <div class="row form-group">
							<div class="col-md-1"><label>2</label></div>
							<div class="col-md-11">
								<input type="text" id="nome_materia2" name="nome_materia2" class="form-control">
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-1"><label>3</label></div>
							<div class="col-md-11">
								<input type="text" id="nome_materia3" name="nome_materia3" class="form-control">
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-1"><label>4</label></div>
							<div class="col-md-11">
								<input type="text" id="nome_materia4" name="nome_materia4" class="form-control">
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-1"><label>5</label></div>
							<div class="col-md-11">
								<input type="text" id="nome_materia5" name="nome_materia5" class="form-control">
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-1"><label>6</label></div>
							<div class="col-md-11">
								<input type="text" id="nome_materia6" name="nome_materia6" class="form-control">
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-1"><label>7</label></div>
							<div class="col-md-11">
								<input type="text" id="nome_materia7" name="nome_materia7" class="form-control">
							</div>
						</div> -->
						<div class="row text-center">
							<input type="submit" value="Inserisci materia/e" class="btn btn-info">
						</div>

					</div>

					<div class="col-md-4"> </div>
				</div>
			</form>

		</div>
	</body>
</html>
