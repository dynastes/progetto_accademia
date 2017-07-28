<?php
@include_once 'dbconnection.php';
?>

<script type="text/javascript"> 
function sicuro(settore){ 
return confirm("Sei sicuro di voler cancellare il settore \""+settore+"\"?");
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
				<h1>Settori</h1>
				<p class="text-center" ><a class="btn btn-info" href="admin_inserisci_settore.php">Inserisci nuovo settore</a></p>
			</div>
			
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<div class="form-group">
						<table  class="table sortable table-striped">
							<tr>
								<!-- <th style="text-align:center">ID</th> -->
								<th style="text-align:center" class="sorttable_nosort">Codice </th>
								<th style="text-align:center">Nome</th>
								<th class="sorttable_nosort"><!-- Modifica --></th>
								<th class="sorttable_nosort"><!-- Elimina --></th>
							</tr>

<?php
$sql_carica_settori="SELECT * FROM settore WHERE NOT Id=1";
//echo "Query: ".$sql_carica_settori;
$res_settori=$connessione->query($sql_carica_settori);
while($res=$res_settori->fetch_assoc()) {  
?>
							<tr>
								<!-- <td style="text-align:center"><?php //echo $res['Id']; ?></td> -->
								<td style="text-align:center"><?php echo $res['Codice']; ?></td>
								<td><?php echo $res['Settore']; ?></td>
								<td><a href="admin_modifica_settore.php?ID=<?php echo $res['Id']; ?>">Modifica</a></td>
								<td><a href="admin_elimina_settore_query.php?ID=<?php echo $res['Id']; ?>" onclick="return sicuro('<?php echo $res['Settore']; ?>')">Elimina<?php }?></a></td>
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