<?php
//@session_start();
@include_once 'dbconnection.php'; 

$id_corso=$_GET['corso'];
$offerta=$_GET['offerta'];
//echo "offerta:".$offerta;

$sql_id_dipartimento_e_Nome_corso="SELECT Id_dipartimento, Nome_corso FROM corsi WHERE Id='".$id_corso."'";
//echo $sql_id_dipartimento_e_Nome_corso."<br>";

$res_id_dipartimento_e_Nome_corso=$connessione->query($sql_id_dipartimento_e_Nome_corso);
$id_dip_e_nom_cor=$res_id_dipartimento_e_Nome_corso->fetch_assoc();

$id_dipartimento=$id_dip_e_nom_cor['Id_dipartimento'];
$nome_corso=$id_dip_e_nom_cor['Nome_corso'];
//echo $id_dipartimento."<br>";
//echo $nome_corso."<br>";

$sql_nome_dipartimento="SELECT Nome_dipartimento FROM dipartimenti WHERE Id='".$id_dipartimento."'";
//echo $sql_nome_dipartimento."<br>";

$res_nome_dipartimento=$connessione->query($sql_nome_dipartimento);
$nome_dip=$res_nome_dipartimento->fetch_assoc();

$nome_dipartimento=$nome_dip['Nome_dipartimento'];
//echo $nome_dipartimento."<br>";

////////////////////////Da Spostare in visualizza_piano_di_studi/////////////////////////////
$livello="";
if($offerta==1 or $offerta==2 or $offerta==3){$livello="Triennio"; $livello_testo="Triennio"; $testo_corso=" TRIENNALE DI PRIMO LIVELLO";$anni=3;}
else if($offerta==4 or $offerta==5 or $offerta==6){$livello="Biennio"; $livello_testo="Biennio"; $testo_corso=" DI DIPLOMA ACCADEMICO DI II LIVELLO IN";$anni=2;}
else if($offerta==7){$livello="Ciclo_unico"; $livello_testo="Ciclo Unico"; $testo_corso="ciao";$anni=5;}

//echo "livello:".$livello." anno:".$anni;
////////////////////////Da Spostare in visualizza_piano_di_studi/////////////////////////////

$sql_id_offerta_formativa="SELECT Id FROM offerta_formativa WHERE Id_dipartimento='".$id_dipartimento."' AND Nome='".$livello."'";

?>
<!DOCTYPE html>
<html lang="it">
	<head>
		<?php @include_once 'shared/head_inclusions.php';?>
			<?php @include_once 'shared/menu.php';?>
	</head>
	
	<body>
		<?php menu(); ?>
		<div class="container">
			<div class="page-header">
				<h1>Modifica piano di studi</h1>
			</div>
			<div class="container">
				<form action="admin_crea_piano_di_studi_query.php" method="post">
					<div class="row">
						<div class="form-group">
							<table class="table table-curved">
							<!-- <table class="table">							 -->
								<tr><th class="title" colspan="9" style="background-color:#FF3535; color:white; text-align:center">DIPARTIMENTO DI <?php echo strtoupper($nome_dipartimento); ?></th></tr>
								<tr><th class="title" colspan="9" style="text-align:center">CORSO<?php echo $testo_corso; ?></th></tr>
								<tr><th class="title" colspan="9" style="background-color:#FF3535; color:white; text-align:center"><?php echo strtoupper($nome_corso); ?></th></tr>
								<tr><th class="title" colspan="9" style="text-align:center">Piano di Studi Consigliato</th></tr>
								<tr style="background-color:#FF3535; color:white;"><th></th><th style="text-align:center;">Codice</th><th>Settore</th><th>Campo Disciplinare</th><th style="text-align:center">Ore</th><th style="text-align:center">CFA</th>
								<th style="text-align:center">Tipo</th><th></th><th></th></tr>
<?php
$crediti_totali=0;
for ($i = 1; $i <= $anni; ++$i) {
	$Conta_attivita_base=0;
	$Conta_attivita_caratterizzante=0;
	$Conta_attivita_integrative=0;
	$Conta_attivita_obbligatorie=0;
	$crediti_anno=0; 
?>
								<tr><th colspan="9" style="background-color:#0393FC; color:white; text-align:center;">ANNO <?php echo $i;?></th></tr>
								<!-- <tr><th colspan="8" style="background-color:#0070c0; text-align:center;">Attività Formative di Base</th></tr> -->
<?php
 $sql_carica_piani="SELECT * FROM materie_piano WHERE Anno=".$i." AND Categoria='Base' AND Id_corso=".$id_corso;
 $res_piani=$connessione->query($sql_carica_piani);
$rowspan_base=mysqli_num_rows($res_piani);
//echo "num:".$rowspan_base;
 while($res=$res_piani->fetch_assoc()) {
	//$Id_corso=$res['Id_corso'];
	$id_materia=$res['Id_materia'];
	if($res['Modulo']!="0"){$modulo=$res['Modulo'];}else{$modulo=" ";}
	$cfa=$res['Cfa'];
	$tipo=$res['Tipologia'];
	$ore=$res['Ore'];
	
	$sql_carica_materia_e_settore="SELECT Nome_materia, Id_settore FROM materie_anagrafica WHERE Id='".$id_materia."'";
	$res_materia_corso_e_settore=$connessione->query($sql_carica_materia_e_settore);
	//$res_materia=$res_materia_corso_e_settore->fetch_assoc();	
	while($res=$res_materia_corso_e_settore->fetch_assoc()) {
		$nome_materia=$res['Nome_materia']; 
		$id_settore=$res['Id_settore'];
		
		$sql_nome_settore_e_codice="SELECT Codice, Settore FROM settore WHERE Id=".$id_settore;
		$res_nec_settore=$connessione->query($sql_nome_settore_e_codice);
		while($res=$res_nec_settore->fetch_assoc()) {
			$crediti_anno+=$cfa;
			$codice_settore=$res['Codice'];
			$nome_settore=$res['Settore'];
?>
								<tr>
								<?php 
								if($Conta_attivita_base==0){echo "<th rowspan=".$rowspan_base." style=\"background-color:#93C9FF; vertical-align:middle; text-align:center;\">Attività Formative di Base</th>"; $Conta_attivita_base=1;}
								//if($Conta_attivita_base==0){echo "<th rowspan=".$rowspan_base." style=\"vertical-align:middle; text-align:center;\">Attività Formative di Base</th>"; $Conta_attivita_base=1;}
								?>
									
									<td style="text-align:center;"><?php echo $codice_settore; ?></td><td><?php echo $nome_settore; ?> </td>
									<td><?php echo $nome_materia." ".$modulo; ?></td><td style="text-align:center"><?php echo $ore; ?></td>
									<td style="text-align:center"><?php echo $cfa; ?></td><td style="text-align:center"><?php echo $tipo;?></td>
									<td><a>Modifica</a></td>
									<td><a>Elimina<?php }}}?></a></td>
								</tr>
								<!-- <tr><th colspan="8" style="background-color:#ffff00;text-align:center;">Attività Formative Caratterizzanti</th></tr> -->
<?php
$sql_carica_piani="SELECT * FROM materie_piano WHERE Anno=".$i." AND Categoria='Caratterizzante' AND Id_corso=".$id_corso;
$res_piani=$connessione->query($sql_carica_piani);
$rowspan_caratterizzante=mysqli_num_rows($res_piani);
//echo "num:".$rowspan_caratterizzante;
 while($res=$res_piani->fetch_assoc()) {
	
	$id_materia=$res['Id_materia'];
	if($res['Modulo']!="0"){$modulo=$res['Modulo'];}else{$modulo=" ";}
	$cfa=$res['Cfa'];
	$tipo=$res['Tipologia'];
	$ore=$res['Ore'];

	$sql_carica_materia_e_settore="SELECT Nome_materia, Id_settore FROM materie_anagrafica WHERE Id='".$id_materia."'";
	$res_materia_corso_e_settore=$connessione->query($sql_carica_materia_e_settore);
	//$res_materia=$res_materia_corso_e_settore->fetch_assoc();	
	while($res=$res_materia_corso_e_settore->fetch_assoc()) {
		$nome_materia=$res['Nome_materia']; 
		$id_settore=$res['Id_settore'];
		
		$sql_nome_settore_e_codice="SELECT Codice, Settore FROM settore WHERE Id=".$id_settore;
		$res_nec_settore=$connessione->query($sql_nome_settore_e_codice);
		while($res=$res_nec_settore->fetch_assoc()) {
			$crediti_anno+=$cfa;
			$codice_settore=$res['Codice'];
			$nome_settore=$res['Settore'];
?>
								<tr>
<?php 
if($Conta_attivita_caratterizzante==0){echo "<th rowspan=".$rowspan_caratterizzante." style=\"background-color:#FFFF78; vertical-align:middle; text-align:center;\">Attività Formative Caratterizzanti</th>"; $Conta_attivita_caratterizzante=1;}
//if($Conta_attivita_caratterizzante==0){echo "<th rowspan=".$rowspan_caratterizzante." style=\"vertical-align:middle; text-align:center;\">Attività Formative Caratterizzanti</th>"; $Conta_attivita_caratterizzante=1;}
?>
									<td style="text-align:center;"><?php echo $codice_settore; ?></td><td><?php echo $nome_settore; ?> </td>
									<td><?php echo $nome_materia." ".$modulo; ?></td><td style="text-align:center"><?php echo $ore; ?></td>
									<td style="text-align:center"><?php echo $cfa; ?></td><td style="text-align:center"><?php echo $tipo;?></td>
									<td><a>Modifica</a></td>
									<td><a>Elimina<?php }}}?></a></td>
								</tr>
								<!-- <tr><th colspan="8" style="background-color:#ff99ff;text-align:center;">Attività Formative Integrative o Affini</th></tr> -->
<?php
$sql_carica_piani="SELECT * FROM materie_piano WHERE Anno=".$i." AND Categoria='Integrativa' AND Id_corso=".$id_corso;
$res_piani=$connessione->query($sql_carica_piani);
$rowspan_integrativa=mysqli_num_rows($res_piani);
//echo "num:".$rowspan_integrativa;
 while($res=$res_piani->fetch_assoc()) {
	
	$id_materia=$res['Id_materia'];
	if($res['Modulo']!="0"){$modulo=$res['Modulo'];}else{$modulo=" ";}
	$cfa=$res['Cfa'];
	$tipo=$res['Tipologia'];
	$ore=$res['Ore'];

	$sql_carica_materia_e_settore="SELECT Nome_materia, Id_settore FROM materie_anagrafica WHERE Id='".$id_materia."'";
	$res_materia_corso_e_settore=$connessione->query($sql_carica_materia_e_settore);
	//$res_materia=$res_materia_corso_e_settore->fetch_assoc();	
	while($res=$res_materia_corso_e_settore->fetch_assoc()) {
		$nome_materia=$res['Nome_materia']; 
		$id_settore=$res['Id_settore'];
		
		$sql_nome_settore_e_codice="SELECT Codice, Settore FROM settore WHERE Id=".$id_settore;
		$res_nec_settore=$connessione->query($sql_nome_settore_e_codice);
		while($res=$res_nec_settore->fetch_assoc()) {
			$crediti_anno+=$cfa;
			$codice_settore=$res['Codice'];
			$nome_settore=$res['Settore'];
?>
								<tr>
<?php 
if($Conta_attivita_integrative==0){echo "<th rowspan=".$rowspan_integrativa." style=\"background-color:#ff99ff; vertical-align:middle; text-align:center;\">Attività Formative Caratterizzanti</th>"; $Conta_attivita_integrative=1;}
//if($Conta_attivita_integrative==0){echo "<th rowspan=".$rowspan_integrativa." style=\"vertical-align:middle; text-align:center;\">Attività Formative Caratterizzanti</th>"; $Conta_attivita_integrative=1;}
?>
									<td style="text-align:center;"><?php echo $codice_settore; ?></td><td><?php echo $nome_settore; ?> </td>
									<td><?php echo $nome_materia." ".$modulo; ?></td><td style="text-align:center"><?php echo $ore; ?></td>
									<td style="text-align:center"><?php echo $cfa; ?></td><td style="text-align:center"><?php echo $tipo;?></td>
									<td><a>Modifica</a></td>
									<td><a>Elimina<?php }}}?></a></td>
								</tr>
								<!--Inserire qui attività obbligatorie per il secondo anno -->
<?php
$sql_esistenza_obbligatorie="SELECT * FROM materie_piano WHERE Anno=".$i." AND Categoria='Obbligatoria' AND Id_corso=".$id_corso;
$res_obbligatorie=$connessione->query($sql_esistenza_obbligatorie);
$rowspan_obbligatorie=mysqli_num_rows($res_obbligatorie);
//echo "row span obb: ".$rowspan_obbligatorie;
$res=$res_obbligatorie->fetch_assoc();
if($res!=false){
	//echo "<tr><th colspan=\"8\" style=\"background-color:orange;text-align:center;\">Attività Formative Obbligatorie</th></tr>";
	$sql_carica_piani="SELECT * FROM materie_piano WHERE Anno=".$i." AND Categoria='Obbligatoria' AND Id_corso=".$id_corso;
	$res_piani=$connessione->query($sql_carica_piani);
	while($res=$res_piani->fetch_assoc()) {
		
		$id_materia=$res['Id_materia'];
		if($res['Modulo']!="0"){$modulo=$res['Modulo'];}else{$modulo=" ";}
		$cfa=$res['Cfa'];
		$tipo=$res['Tipologia'];
		$ore=$res['Ore'];

		$sql_carica_materia_e_settore="SELECT Nome_materia, Id_settore FROM materie_anagrafica WHERE Id='".$id_materia."'";
		$res_materia_corso_e_settore=$connessione->query($sql_carica_materia_e_settore);
		//$res_materia=$res_materia_corso_e_settore->fetch_assoc();	
		while($res=$res_materia_corso_e_settore->fetch_assoc()) {
			$crediti_anno+=$cfa;
			$nome_materia=$res['Nome_materia']; 
			$id_settore=$res['Id_settore'];

			$sql_nome_settore_e_codice="SELECT Codice, Settore FROM settore WHERE Id=".$id_settore;
			$res_nec_settore=$connessione->query($sql_nome_settore_e_codice);
			while($res=$res_nec_settore->fetch_assoc()) {
				$codice_settore=$res['Codice'];
				$nome_settore=$res['Settore'];
								//Parte della tabella che riguarda le "Attività Formative Obbligatorie"
								echo "<tr>";
									
									
if($Conta_attivita_obbligatorie==0){echo "<th rowspan=".$rowspan_obbligatorie." style=\"background-color:#FFB464; vertical-align:middle; text-align:center;\">Attività Formative Obbligatorie</th>"; $Conta_attivita_obbligatorie=1;}
//if($Conta_attivita_obbligatorie==0){echo "<th rowspan=".$rowspan_obbligatorie." style=\"vertical-align:middle; text-align:center;\">Attività Formative Obbligatorie</th>"; $Conta_attivita_obbligatorie=1;}

									echo "<td style=\"text-align:center;\">".$codice_settore."</td><td>".$nome_settore."</td>";
									echo "<td>".$nome_materia." ".$modulo."</td><td style=\"text-align:center\">".$ore."</td>";
									echo "<td style=\"text-align:center\">".$cfa."</td><td style=\"text-align:center\">".$tipo."</td>";
									echo "<td><a>Modifica</a></td>";
									echo "<td><a>Elimina</a></td>";
								echo"</tr>";
			}
		}
	}
}
?>
								<tr class="crediti">
									<td></td>
									<td></td><td></td><th style="background-color:#55FD51; text-align:right">Crediti</th>
									<td style="background-color:#55FD51;"></td>
									<th style="background-color:#55FD51; text-align:center"><?php $crediti_totali+=$crediti_anno; echo $crediti_anno; ?></th>
									<td colspan="3" style="background-color:#55FD51;"></td>
								</tr>
								
								
<?php 
}//Chiusura ciclo for "anni"
?>
								<tr class="crediti_totali">
									<td></td>
									<th colspan="3" style="background-color:#55FD51; text-align:right">Totale Crediti Formativi previsti nel <?php echo $livello_testo;?></th>
									<td style="background-color:#55FD51;"></td>
									<th style="background-color:#55FD51; text-align:center"><?php echo $crediti_totali; ?></th>
									<td colspan="3" style="background-color:#55FD51; text-align:center"></td>
								</tr>
							</table>
						</div>
					</div>
				</form>
			</div><!-- tab-content clearfix -->
		</div>
	</body>
</html>
