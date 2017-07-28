<?php
@include_once 'dbconnection.php';

//Prendi il nome della materia selezionata
$sql_carica_nome_materia="SELECT Nome_materia FROM materie_anagrafica WHERE Id=".$_GET['ID'];
$nome_materia=$connessione->query($sql_carica_nome_materia);
$res_nome_materia=$nome_materia->fetch_assoc();

//Prendi il settore corrispondente alla materia selezionata
$sql_carica_settore_materia="SELECT Id_settore FROM materie_anagrafica WHERE Id=".$_GET['ID'];
$settore_materia=$connessione->query($sql_carica_settore_materia);
$res_settore_materia=$settore_materia->fetch_assoc();
//echo "Id Settore: ".$res1['Id_settore'];

//Prendi il codice/nome del settore
$sql_carica_nome_settore_materia="SELECT * FROM settore WHERE Id=".$res_settore_materia['Id_settore'];
$nome_settore_materia=$connessione->query($sql_carica_nome_settore_materia);
$res_nome_settore_materia=$nome_settore_materia->fetch_assoc();
//echo "<br>Nome Settore: ".$res2['Settore'];
//echo "<br>Codice Settore: ".$res2['Codice'];

//Carica tutta la lista dei settori
$sql_carica_lista_settori="SELECT * FROM settore";
$lista_settori=$connessione->query($sql_carica_lista_settori);
?>

<html>
	<head>
		<?php @include_once 'shared/head_inclusions.php';?>
		<?php @include_once 'shared/menu.php';?>
	</head>
	<body>
		<?php menu(); ?>
		<div class="container">
			<div class="page-header">
				<h1>Modifica materia</h1>
			</div>

			<form action="admin_modifica_materia_anagrafe_query.php" method="post">
				<div class="row">
					<div class="col-md-4"> </div>
					<div class="row form-group">
					<div class="col-md-4">
					
					<div class="row form-group">
							<div class="col-md-12">
								<div class="input-group">
									<span class="input-group-addon" id="basic-addon1">Settore</span>
									<select id="settore" name="nuovo_settore" class="form-control">
								
						
						
<?php
while($res_lista_settori=$lista_settori->fetch_assoc()) {
	if($res_nome_settore_materia['Codice'] == $res_lista_settori['Codice']){?>
          <option selected value="<?php echo $res_lista_settori['Id']; ?>"><?php echo $res_lista_settori['Codice']." - ".$res_lista_settori['Settore']; ?></option>
<?php 
}else {?>
           <option value="<?php echo $res_lista_settori['Id']; ?>"><?php echo $res_lista_settori['Codice']." - ".$res_lista_settori['Settore']; ?></option>
<?php
}//chiusura else					
}//chiusura while
?>
									</select>
								</div>
							</div>
						</div>
						<!-- <label for="nome_materia">Nome materie</label><br> -->
						<div class="row form-group">
							<div class="col-md-12">
								<div class="input-group">
									<span class="input-group-addon" id="basic-addon1">Nome</span>
									<input type="hidden" name="id_materia" value="<?php echo $_GET['ID']; ?>">
									<input type="text" id="nome_materia" name="nuovo_nome_materia" class="form-control" value="<?php echo $res_nome_materia['Nome_materia']; ?>">
								</div>
							</div>
						</div>
						<div class="row text-center">
							<input type="submit" value="Salva modifica" class="btn btn-info">
						</div>
					</div>
					<div class="col-md-4"> </div>
				
			</form>
			</div>
		</div>
	</body>
</html>
