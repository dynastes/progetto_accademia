<?php @include_once 'menu.php';
$idStudente=$_POST['id-studente'];
$idMateria=$_POST['id-materia'];
$convalida=$_POST['convalida'];
$giorno=$_POST['giorno-esame'];
$mese=$_POST['mese-esame'];
$anno=$_POST['anno-esame'];

$data=$anno."/".$mese."/".$giorno;
$sqlInserisci="INSERT INTO materie_studenti Id_studente=".$idStudente.", Id_materia=".$idMateria.", Convalida='".$convalida."', Data='".$data."'";
echo $sqlInserisci;

if($res=$connessione->query($sqlInserisci)){
	$_SESSION['inserimento-voto']=1;
} else {
	$_SESSION['inserimento-voto']=0;
}

?>