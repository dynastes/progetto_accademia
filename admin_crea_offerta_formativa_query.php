<?php @include_once 'shared/menu.php'; 

/*if($_SESSION['materia']===1){
	echo "<div style=\"width:100%;color:green;text-align:center;font-weight:bold;border-style:solid;border-width:2px;border-color:green;background-color:#81F79F;\">Avviso pubblicato correttamente</div>";
	$_SESSION['query']=0;
}*/


$periodo=$_POST["campo_periodo"];
$idDipartimento=$_POST["dipartimento"];
$attivo=$_POST["attivo"];

if($periodo==1){$offerta="Triennio";}
elseif($periodo==2){$offerta="Biennio";}
elseif($periodo==3){$offerta="Ciclo_unico";}

echo "Periodo: ".$periodo."<br>";
echo "Dipartimento: ".$idDipartimento."<br>";
echo "Attivo: ".$attivo."<br>";

$sqlAggiungiOffertaFormativa="INSERT INTO offerta_formativa (Id_dipartimento, Nome, Attivo) values ('".$idDipartimento."','".$offerta."','".$attivo."')";
echo "Query: ".$sqlAggiungiOffertaFormativa;
$res=$connessione->query($sqlAggiungiOffertaFormativa);

?>
