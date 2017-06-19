<?php
@include_once 'dbconnection.php';
?>


<!DOCTYPE html>
<html lang="it">
	<head>
		<?php @include_once 'shared/head_inclusions.php';?>
		<?php @include_once 'shared/menu.php';?> 
		<script src="sorttable.js"></script>
	</head>
	
	<body>
	<?php menu(); ?>
		<div class="container">
			<div class="page-header">
				<h1>Modifica anagrafica materie</h1>
			</div>
			<div class="container">
				
					<div class="row">
						<div class="form-group">
		<table class="sortable" class="table">
			<tr>
				<!-- <th style="text-align:center">ID</th> -->
				<th style="text-align:center" class="sorttable_nosort">Codice Settore</th>
				<th style="text-align:center">Settore</th>
				<th style="text-align:center">Nome</th>
				<th class="sorttable_nosort" style="text-align:center"><!-- Modifica --></th>
				<th class="sorttable_nosort" style="text-align:center"><!-- Elimina --></th>
			</tr>
			
<?php
$sql_carica_materie="SELECT * FROM materie_anagrafica";
//echo "Query: ".$sql_carica_materie;
$res_materie=$connessione->query($sql_carica_materie);
while($res=$res_materie->fetch_assoc()) {
	$sql_carica_settore="SELECT * FROM settore WHERE ID=".$res['Id_settore'];
	//echo "Query: ".$sql_carica_settore;
$res_settore=$connessione->query($sql_carica_settore);
while($res2=$res_settore->fetch_assoc()) {
  
?>
			<tr>
				<!-- <td style="text-align:center"><?php //echo $res['Id']; ?></td> -->
				<td style="text-align:center"><?php echo $res2['Codice']; ?></td>
				<td><?php echo $res2['Settore']; ?></td>
				<td><?php echo $res['Nome_materia']; ?></td>
				<td><a href="admin_modifica_materia_anagrafe.php?ID=<?php echo $res['Id']; ?>">Modifica</a></td>
				<td><a href="admin_elimina_materia_anagrafe_query.php?ID=<?php echo $res['Id']; ?>">Elimina<?php }}?></a></td>
			</tr>
		</table>
			</div>
					</div>
				
			</div><!-- tab-content clearfix -->
		</div>
	</body>
</html>