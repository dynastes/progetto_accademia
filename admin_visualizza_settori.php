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
				<h1>Settore</h1>
			</div>
			<div class="container">
				
					<div class="row">
						<div class="form-group">
		<table class="sortable" class="table">
			<tr>
				<!-- <th style="text-align:center">ID</th> -->
				<th style="text-align:center">Codice </th>
				<th style="text-align:center">Nome</th>
				<th class="sorttable_nosort" style="text-align:center"><!-- Modifica --></th>
				<th class="sorttable_nosort" style="text-align:center"><!-- Elimina --></th>
			</tr>
			
<?php
$sql_carica_settori="SELECT * FROM settore";
//echo "Query: ".$sql_carica_settori;
$res_settori=$connessione->query($sql_carica_settori);
while($res=$res_settori->fetch_assoc()) {  
?>
			<tr>
				<!-- <td style="text-align:center"><?php //echo $res['Id']; ?></td> -->
				<td style="text-align:center" contenteditable="true"><?php echo $res['Codice']; ?></td>
				<td><?php echo $res['Settore']; ?></td>
				<td><a href="admin_modifica_settore.php?ID=<?php echo $res['Id']; ?>">Modifica</a></td>
				<td><a href="admin_elimina_materia_anagrafe_query.php?ID=<?php echo $res['Id']; ?>">Elimina<?php }?></a></td>
			</tr>
		</table>
			</div>
					</div>
				
			</div><!-- tab-content clearfix -->
		</div>
	</body>
</html>