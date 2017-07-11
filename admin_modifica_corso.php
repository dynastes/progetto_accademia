<?php
@include_once 'dbconnection.php';

//Prendi il nome del corso selezionata
$sql_carica_nome_corso="SELECT Nome_corso FROM corsi WHERE Id=".$_GET['ID'];
$nome_corso=$connessione->query($sql_carica_nome_corso);
$res_nome_corso=$nome_corso->fetch_assoc();

//Prendi il dipartimento corrispondente al corso selezionata
$sql_carica_dipartimento_corso="SELECT Id_dipartimento FROM corsi WHERE Id=".$_GET['ID'];
$dipartimento_corso=$connessione->query($sql_carica_dipartimento_corso);
$res_dipartimento_corso=$dipartimento_corso->fetch_assoc();

//Prendi il nome del dipartimento
$sql_carica_nome_dipartimento_corso="SELECT * FROM dipartimenti WHERE Id=".$res_dipartimento_corso['Id_dipartimento'];
$nome_dipartimento_corso=$connessione->query($sql_carica_nome_dipartimento_corso);
$res_nome_dipartimento_corso=$nome_dipartimento_corso->fetch_assoc();

//Carica tutta la lista dei settori
$sql_carica_lista_dipartimenti="SELECT * FROM dipartimenti";
$lista_dipartimenti=$connessione->query($sql_carica_lista_dipartimenti);
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
				<h1>Modifica corso</h1>
			</div>

			<form action="admin_modifica_corso_query.php" method="post">
				<div class="row">
					<div class="col-md-4"> </div>
					<div class="row form-group">
					<div class="col-md-4">
					
					<div class="row form-group">
							<div class="col-md-12">
								<div class="input-group">
									<span class="input-group-addon" id="basic-addon1">Dipartimento</span>
									<select id="dipartimento" name="nuovo_dipartimento" class="form-control">
								
						
						
<?php
while($res_lista_dipartimenti=$lista_dipartimenti->fetch_assoc()) {
	if($res_nome_dipartimento_corso['Id'] == $res_lista_dipartimenti['Id']){?>
          <option selected value="<?php echo $res_lista_dipartimenti['Id']; ?>"><?php echo $res_lista_dipartimenti['Nome_dipartimento']; ?></option>
<?php 
}else {?>
           <option value="<?php echo $res_lista_dipartimenti['Id']; ?>"><?php echo $res_lista_dipartimenti['Nome_dipartimento']; ?></option>
<?php
}//chiusura else					
}//chiusura while
?>
									</select>
								</div>
							</div>
						</div>
						<!-- <label for="nome_corso">Nome corso</label><br> -->
						<div class="row form-group">
							<div class="col-md-12">
								<div class="input-group">
									<span class="input-group-addon" id="basic-addon1">Nome</span>
									<input type="hidden" name="id_corso" value="<?php echo $_GET['ID']; ?>">
									<input type="text" id="nome_corso" name="nuovo_nome_corso" class="form-control" value="<?php echo $res_nome_corso['Nome_corso']; ?>">
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
