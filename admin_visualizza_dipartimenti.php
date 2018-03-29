<?php
@include_once 'dbconnection.php';
?>

<script type="text/javascript">
function sicuro(dipartimento){
return confirm("Sei sicuro di voler cancellare il dipartimento di \""+dipartimento+"\"?");
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
				<h1>Dipartimenti</h1>
				<p class="text-center"><a class="btn btn-info" href="admin_inserisci_dipartimento.php">Inserisci nuovo dipartimento</a></p>
			</div>


			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6">
					<div class="form-group">
						<table  class="table sortable table-striped">
							<tr>
								<!-- <th style="text-align:center">ID</th> -->
								<!-- <th style="text-align:center" class="sorttable_nosort">Codice </th> -->
								<th style="text-align:center">Nome</th>
								<th class="sorttable_nosort"><!-- Modifica --></th>
								<th class="sorttable_nosort"><!-- Elimina --></th>
							</tr>

<?php
$sql_carica_dipartimenti="SELECT * FROM dipartimenti";
//echo "Query: ".$sql_carica_dipartimenti;
$res_dipartimenti=$connessione->query($sql_carica_dipartimenti);
while($res=$res_dipartimenti->fetch_assoc()) {
?>
							<tr>
								<!-- <td style="text-align:center"><?php //echo $res['Id']; ?></td> -->
								<!-- <td style="text-align:center" contenteditable="true"><?php //echo $res['Codice']; ?></td> -->
								<td><?php echo $res['Nome_dipartimento']; ?></td>
								<td><a href="admin_modifica_dipartimento.php?ID=<?php echo $res['Id']; ?>">Modifica</a></td>
								<td><a href="admin_elimina_dipartimento_query.php?ID=<?php echo $res['Id']; ?>" onclick="return sicuro('<?php echo $res['Nome_dipartimento']; ?>')">Elimina<?php }?></a></td>
							</tr>
						</table>
					</div>
				</div>
				<div class="col-md-3"></div>
			</div>
		</div>
	</body>
	</br></br>
		<?php @include_once 'shared/footer.php'; ?>
</html>
