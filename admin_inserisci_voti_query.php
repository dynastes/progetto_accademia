<?php
session_start();
@include_once "dbconnection.php";
$idStudente=$_POST['id_studente'];
$idMateria=$_POST['id_materia'];
$voto = $_POST['voto'];
$data=$_POST['data_esame'];
$idProfessore=$_POST['id_professore'];
$sqlInserisci="INSERT INTO materie_studenti (Id_studente,Id_materia,Voto,Id_docente,Data) values($idStudente,$idMateria,$voto,$idProfessore,'$data')";
echo $sqlInserisci;

if($res=$connessione->query($sqlInserisci)){
	$_SESSION['inserimento-voto']=1;
} else {
	$_SESSION['inserimento-voto']=0;
}

header("Location: admin_valutazione_studente.php?ID=".$idStudente."");
?>
