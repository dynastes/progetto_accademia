<?php
//@session_start();
@include_once 'dbconnection.php';

$corso=$_GET['corso'];
$offerta=$_GET['offerta'];
/*
Dipartimento
"Corso Triennale di primo livello"
Corso es. "Pittura"
*/

$sql_id_dipartimento="SELECT Id_dipartimento FROM corsi WHERE Id='".$corso."'";
//echo $sql_id_dipartimento."<br>";

$res_id_dipartimento=$connessione->query($sql_id_dipartimento);
$id_dip=$res_id_dipartimento->fetch_assoc();

$id_dipartimento=$id_dip['Id_dipartimento'];
//echo $id_dipartimento."<br>";

$sql_nome_dipartimento="SELECT Nome_dipartimento FROM dipartimenti WHERE Id='".$id_dipartimento."'";
//echo $sql_nome_dipartimento."<br>";

$res_nome_dipartimento=$connessione->query($sql_nome_dipartimento);
$nome_dip=$res_nome_dipartimento->fetch_assoc();

$nome_dipartimento=$nome_dip['Nome_dipartimento'];
//echo $nome_dipartimento."<br>";

////////////////////////Da Spostare in visualizza_piano_di_studi/////////////////////////////
$livello="";
if($offerta==1){$livello="Triennio"; $testo_corso=" TRIENNALE DI PRIMO LIVELLO";}
else if($offerta==2){$livello="Biennio"; $testo_corso=" DI DIPLOMA ACCADEMICO DI II LIVELLO IN";}
else if($offerta==3){$livello="Ciclo_unico"; $testo_corso="ciao";}
////////////////////////Da Spostare in visualizza_piano_di_studi/////////////////////////////

$sql_id_offerta_formativa="SELECT Id FROM offerta_formativa WHERE Id_dipartimento='".$id_dipartimento."' AND Nome='".$livello."'";

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">
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
			<div class="tab-content container">
				<form action="admin_crea_piano_di_studi_query.php" method="post">
					<div class="row">
						<div class="form-group">
							
							<table class="table">
								<tr><th colspan="7">Dipartimento di <?php echo $nome_dipartimento; ?></th></tr>
								<tr><th colspan="7">CORSO<?php echo $testo_corso; ?></th></tr>
								<tr><td>Corso</td><td>Materia</td><td>Modula</td><td>Anno</td><td>CFA</td><td>Categoria</td><td>Tipologia</td></tr>
<?php 
 $sql_carica_piani="SELECT * FROM materie_piano WHERE Id_corso='".$corso."'";
 $res_piani=$connessione->query($sql_carica_piani);
 while($res=$res_piani->fetch_assoc()) {
	$Id_corso=$res['Id_corso'];
	$Id_materia=$res['Id_materia'];}

	$sql_carica_id="SELECT Nome_corso FROM corsi WHERE Id='".$Id_corso."'";
	$res_id_corso=$connessione->query($sql_carica_id);
	$res_id=$res_id_corso->fetch_assoc();

	$sql_carica_materia="SELECT Nome_materia FROM materie_anagrafica WHERE Id='".$Id_materia."'";
	$res_materia_corso=$connessione->query($sql_carica_materia);
	$res_materia=$res_materia_corso->fetch_assoc();	
?>
								<tr>
									<td><?php //echo $res_id['Nome_corso']; ?></td><td><?php //echo $res_materia['Nome_materia']; ?></td>
									<td><?php //echo $res['Modulo']; ?></td><td><?php //echo $res['Anno']; ?></td>
									<td><?php //echo $res['Cfa']; ?></td>	<td><?php //echo $res['Categoria']; ?></td>
									<td><?php //echo $res['Tipologia']; }?></td>
								</tr>
							</table>
						</div>
					</div>
				</form>
			</div><!-- tab-content clearfix -->
		</div>
	</body>
</html>
