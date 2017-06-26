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
				<h1> Modifca offerta formativa</h1>
			</div>
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<div class="form-group">
						<table  class="table sortable">
							<tr>
								<!-- <th style="text-align:center">ID</th> -->
								<th style="text-align:center" class="sorttable_nosort">Offerta </th>
								<th style="text-align:center">Dipartimento</th>
								<th style="text-align:center">Attivo</th>
								<th class="sorttable_nosort"><!-- Modifica --></th>
								<th class="sorttable_nosort"><!-- Elimina --></th>
							</tr>

<?php
$sql_select_offerte="SELECT DISTINCT Nome FROM offerta_formativa";
$res_select_offerte=$connessione->query($sql_select_offerte);
$num_offerte=mysqli_num_rows($res_select_offerte);
if ($num_offerte == 0){
  echo "Database vuoto!";
}
// se invece trovo delle occorrenze...
else
{
  // avvio un ciclo for che si ripete per il numero di occorrenze trovate
  for ($x = 0; $x < $num_offerte; $x++){
    
    // recupero il contenuto di ogni record rovato
    while($res=$res_select_offerte->fetch_assoc()) {	
    //echo $res['Nome'];
  }
  }
}

$Conta_dipartimenti_triennio=0;
$sql_carica_offerta_formativa="SELECT * FROM offerta_formativa WHERE Nome='Triennio'";
$res_offerta_formativa=$connessione->query($sql_carica_offerta_formativa);
$rowspan_triennio=mysqli_num_rows($res_offerta_formativa);

while($res=$res_offerta_formativa->fetch_assoc()) {		
		$sql_carica_dipartiementi="SELECT * FROM dipartimenti WHERE Id=".$res['Id_dipartimento'];
		$res_dipartiementi=$connessione->query($sql_carica_dipartiementi);
		while($res2=$res_dipartiementi->fetch_assoc()) {
?>
							<tr>
								<!-- <td style="text-align:center"><?php //echo $res['Id']; ?></td> -->
<?php 
if($Conta_dipartimenti_triennio==0){echo "<th rowspan=".$rowspan_triennio." style=\"vertical-align:middle; text-align:center; \" class=\"sorttable_nosort\">Triennio</th>"; $Conta_dipartimenti_triennio=1;}
?>
								<!-- <td style="text-align:center" contenteditable="true"><?php //echo $res['Nome']; ?></td> -->
								<td><?php echo $res2['Nome_dipartimento']; ?></td>
								<td style="text-align:center"><?php echo $res['Attivo']; ?></td>
								<td><a href="#?ID=<?php echo $res['Id']; ?>">Modifica</a></td>
								<td><a href="#?ID=<?php echo $res['Id']; ?>">Dissocia<?php }}?></a></td>
							</tr>
<?php
$Conta_dipartimenti_biennio=0;
$sql_carica_offerta_formativa="SELECT * FROM offerta_formativa WHERE Nome='Biennio'";
$res_offerta_formativa=$connessione->query($sql_carica_offerta_formativa);
$rowspan_biennio=mysqli_num_rows($res_offerta_formativa);

while($res=$res_offerta_formativa->fetch_assoc()) {		
		$sql_carica_dipartiementi="SELECT * FROM dipartimenti WHERE Id=".$res['Id_dipartimento'];
		$res_dipartiementi=$connessione->query($sql_carica_dipartiementi);
		while($res2=$res_dipartiementi->fetch_assoc()) {
?>
							<tr>
								<!-- <td style="text-align:center"><?php //echo $res['Id']; ?></td> -->
<?php 
if($Conta_dipartimenti_biennio==0){echo "<th rowspan=".$rowspan_triennio." style=\"vertical-align:middle; text-align:center; \" class=\"sorttable_nosort\">Biennio</th>"; $Conta_dipartimenti_biennio=1;}
?>
								<!-- <td style="text-align:center" contenteditable="true"><?php //echo $res['Nome']; ?></td> -->
								<td><?php echo $res2['Nome_dipartimento']; ?></td>
								<td style="text-align:center"><?php echo $res['Attivo']; ?></td>
								<td><a href="#?ID=<?php echo $res['Id']; ?>">Modifica</a></td>
								<td><a href="#?ID=<?php echo $res['Id']; ?>">Dissocia<?php }}?></a></td>
							</tr>
<?php
$Conta_dipartimenti_ciclo_unico=0;
$sql_carica_offerta_formativa="SELECT * FROM offerta_formativa WHERE Nome='Ciclo_unico'";
$res_offerta_formativa=$connessione->query($sql_carica_offerta_formativa);
$rowspan_biennio=mysqli_num_rows($res_offerta_formativa);

while($res=$res_offerta_formativa->fetch_assoc()) {		
		$sql_carica_dipartiementi="SELECT * FROM dipartimenti WHERE Id=".$res['Id_dipartimento'];
		$res_dipartiementi=$connessione->query($sql_carica_dipartiementi);
		while($res2=$res_dipartiementi->fetch_assoc()) {
?>
							<tr>
								<!-- <td style="text-align:center"><?php //echo $res['Id']; ?></td> -->
<?php 
if($Conta_dipartimenti_ciclo_unico==0){echo "<th rowspan=".$rowspan_triennio." style=\"vertical-align:middle; text-align:center; \" class=\"sorttable_nosort\">Ciclo Unico</th>"; $Conta_dipartimenti_ciclo_unico=1;}
?>
								<!-- <td style="text-align:center" contenteditable="true"><?php //echo $res['Nome']; ?></td> -->
								<td><?php echo $res2['Nome_dipartimento']; ?></td>
								<td style="text-align:center"><?php echo $res['Attivo']; ?></td>
								<td><a href="#?ID=<?php echo $res['Id']; ?>">Modifica</a></td>
								<td><a href="#?ID=<?php echo $res['Id']; ?>">Dissocia<?php }}?></a></td>
							</tr>
						</table>
					</div>
				</div>
				<div class="col-md-2"></div>
			</div>
		</div>
	</body>
</html>