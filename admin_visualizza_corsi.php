<?php
@include_once 'dbconnection.php';
?>

<script type="text/javascript"> 
function sicuro(corso){ 
return confirm("Sei sicuro di voler cancellare il corso \""+corso+"\"? Così facendo eliminerai anche qualsiasi piano di studi associato ad esso!");
} 
</script> 

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
				<h1>Corsi</h1>
				<p class="text-center" ><a class="btn btn-info" href="admin_inserisci_corso.php">Inserisci nuovo corso</a></p>
			</div>
			
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<div class="form-group">
						<table  class="table sortable table-striped">
							<tr>
								<!-- <th style="text-align:center">ID</th> -->
								<th style="text-align:center">Dipartimento</th>
								<th style="text-align:center">Nome</th>
								<th class="sorttable_nosort"><!-- Modifica --></th>
								<th class="sorttable_nosort"><!-- Elimina --></th>
							</tr>

<?php
$sql_carica_corsi="SELECT * FROM corsi ORDER BY Id_dipartimento";
//echo "Query: ".$sql_carica_corsi;
$res_corsi=$connessione->query($sql_carica_corsi);
while($res=$res_corsi->fetch_assoc()) {  
?>
							<tr>
								<!-- <td style="text-align:center"><?php //echo $res['Id']; ?></td> -->
<?php
$sql_carica_nome_dipartimento="SELECT * FROM dipartimenti WHERE Id=".$res['Id_dipartimento'];
//echo "Query: ".$sql_carica_corsi;
$res_dipartimento=$connessione->query($sql_carica_nome_dipartimento);
while($res2=$res_dipartimento->fetch_assoc()) {  
?>
								<td style="text-align:center"><?php echo $res2['Nome_dipartimento']; ?></td>
								<td><?php echo $res['Nome_corso']; ?></td>
								<td><a href="admin_modifica_corso.php?ID=<?php echo $res['Id']; ?>">Modifica</a></td>
								<td><a href="admin_elimina_corso_query.php?ID=<?php echo $res['Id']; ?>" onclick="return sicuro('<?php echo $res['Nome_corso']; ?>')">Elimina<?php }}?></a></td>
							</tr>
						</table>
					</div>
				</div>
				<div class="col-md-2"></div>
			</div>
		</div>		
		<?php @include_once 'shared/footer.php'; ?>
	</body>	
</html>