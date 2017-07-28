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
				<h1> Offerta formativa</h1>
				<p class="text-center" ><a class="btn btn-info" href="admin_inserisci_offerta_formativa.php">Inserisci nuova offerta formativa</a></p>
			</div>
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<div class="form-group">
						<table  class="table sortable">
							<tr>
								<th style="text-align:center" class="sorttable_nosort">Offerta</th>
								<th style="text-align:center" class="sorttable_nosort">Dipartimento</th>
								<th style="text-align:center" class="sorttable_nosort">Attivo</th>
								<th class="sorttable_nosort"><!-- Modifica --></th>
								<th class="sorttable_nosort"><!-- Dissocia --></th>
							</tr>

<?php
$sql_select_offerte="SELECT DISTINCT Nome FROM offerta_formativa";
$res_select_offerte=$connessione->query($sql_select_offerte);
$num_offerte=mysqli_num_rows($res_select_offerte);
if ($num_offerte == 0){
  //echo "Database vuoto!";
}
// se invece trovo delle occorrenze...
else
{
  // avvio un ciclo for che si ripete per il numero di occorrenze trovate
  for ($x = 0; $x < $num_offerte; $x++){
    
    // recupero il contenuto di ogni record rovato
    while($res=$res_select_offerte->fetch_assoc()) {	
    //echo $res['Nome'];
 

$Conta_dipartimenti_triennio=0;
$sql_carica_offerta_formativa="SELECT * FROM offerta_formativa WHERE Nome='".$res['Nome']."'";
$res_offerta_formativa=$connessione->query($sql_carica_offerta_formativa);
$rowspan_triennio=mysqli_num_rows($res_offerta_formativa);

$nome = $res['Nome'];


if($res['Nome']=="Ciclo_unico"){$nome = "Ciclo unico";}


while($res=$res_offerta_formativa->fetch_assoc()) {		
		$sql_carica_dipartiementi="SELECT * FROM dipartimenti WHERE Id=".$res['Id_dipartimento'];
		$res_dipartiementi=$connessione->query($sql_carica_dipartiementi);
		if($res['Attivo']==1){$attivo="Si";}else{$attivo="No";}
		while($res2=$res_dipartiementi->fetch_assoc()) {
?>
							<tr>
<?php 
if($Conta_dipartimenti_triennio==0){echo "<th rowspan=".$rowspan_triennio." style=\"vertical-align:middle; text-align:center; \" class=\"sorttable_nosort\">".$nome."</th>"; $Conta_dipartimenti_triennio=1;}
?>
								<td><?php echo $res2['Nome_dipartimento']; ?></td>
								<td style="text-align:center"><?php echo $attivo; ?></td>
								<td><a href="admin_modifica_offerta_formativa.php?ID=<?php echo $res['Id']; ?>">Modifica</a></td>
								<td><a href="#?ID=<?php echo $res['Id']; ?>">Dissocia<?php }}?></a></td>
							</tr>
<?php
	}//while select offerte
  }//ciclo for offerte
}//else offerte>0
?>
						</table>
					</div>
				</div>
				<div class="col-md-2"></div>
			</div>
		</div>
		</br></br>
		<?php @include_once 'shared/footer.php'; ?>
	</body>
</html>