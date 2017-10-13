<?php
@include_once 'dbconnection.php';

//Prendi l'id del dipartimento
$sql_carica_id_dipartimento="SELECT Id_dipartimento FROM offerta_formativa WHERE Id=".$_GET['ID'];
$id_dipartimento=$connessione->query($sql_carica_id_dipartimento);
$res_id_dipartimento=$id_dipartimento->fetch_assoc();

//Prendi il nome del dipartimento corrispondente
$sql_carica_dipartimento="SELECT * FROM dipartimenti WHERE Id=".$res_id_dipartimento['Id_dipartimento'];
$dipartimento=$connessione->query($sql_carica_dipartimento);
$res_dipartimento=$dipartimento->fetch_assoc();

//Prendi il nome del dipartimento
$sql_carica_nome_periodo_offerta_formativa="SELECT Nome FROM offerta_formativa WHERE Id=".$_GET['ID'];
$nome_nome_periodo_offerta_formativa=$connessione->query($sql_carica_nome_periodo_offerta_formativa);
$res_nome_nome_periodo_offerta_formativa=$nome_nome_periodo_offerta_formativa->fetch_assoc();

//Carica tutta la lista dei settori (Triennio, Biennio, Ciclo_Unico)
$sql_carica_lista_offerta_formativa="SELECT DISTINCT Nome FROM offerta_formativa";
$lista_offerta_formativa=$connessione->query($sql_carica_lista_offerta_formativa);

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
				<h1>Modifica offerta formativa</h1>
			</div>

			<form action="admin_modifica_offerta_formativa_query.php" method="post">
				<div class="row">
					<div class="col-md-4"> </div>
					<div class="row form-group">
					<div class="col-md-4">
					
					<div class="row form-group">
							<div class="col-md-12">
								<div class="input-group">
									<span class="input-group-addon" id="basic-addon1">Dipartimento</span>
									<input type="text" name="nome_dipartimento" class="form-control" value="<?php echo $res_dipartimento['Nome_dipartimento']; ?>" readonly="readonly">						
									<!-- <option selected value="<?php //echo $res_dipartimento['Id']; ?>"><?php //echo $res_dipartimento['Nome_dipartimento']; ?></option> -->									
								</div>
							</div>
						</div>
						<!-- <label for="nome_corso">Nome corso</label><br> -->
						<div class="row form-group">
							<div class="col-md-12">
								<div class="input-group">
									<span class="input-group-addon" id="basic-addon1">Periodo</span>
									<select id="periodo" name="nuovo_periodo" class="form-control">
								
						
						
<?php
while($res_lista_offerta_formativa=$lista_offerta_formativa->fetch_assoc()) {
	if($res_nome_nome_periodo_offerta_formativa['Id'] == $res_lista_offerta_formativa['Id']){?>
          <option selected value="<?php echo $res_lista_offerta_formativa['Id']; ?>"><?php if($res_lista_offerta_formativa['Nome'] == "Ciclo_unico"){echo "Ciclo unico";} else{echo $res_lista_offerta_formativa['Nome'];} ?></option>
<?php 
}else {?>
           <option value="<?php echo $res_lista_offerta_formativa['Id']; ?>"><?php if($res_lista_offerta_formativa['Nome']=="Ciclo_unico"){echo "Ciclo uncio";} else{echo $res_lista_offerta_formativa['Nome'];} ?></option>
<?php
}//chiusura else					
}//chiusura while
?>
									</select>									
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
