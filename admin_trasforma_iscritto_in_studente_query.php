<?php @include_once 'menu.php';
$idStudente=$_POST["id-studente"];
$matricolaStudente=$_POST["matricola-studente"];
$diplomaStudente=$_POST["diploma-studente"];
$idCorso=$_POST["corso-studente"];

echo $idStudente;
echo $matricolaStudente;
echo $diplomaStudente;
echo $idCorso;


$sqlInserisciStudente='UPDATE studenti SET Anno_accademico=1, Matricola="'.$matricolaStudente.'", Diploma="'.$diplomaStudente.'", Id_corso='.$idCorso.' WHERE Id_anagrafe='.$idStudente;
//$sqlInserisciStudente='UPDATE studenti SET Anno_accademico=0, Matricola="$matricolaStudente", Diploma="$diplomaStudente", Id_corso=$idCorso WHERE Id_anagrafe='.$idStudente;

$res=$connessione->query($sqlInserisciStudente);

if($res){
	$_SESSION["studente-inserito"]=1;
} else {
	$_SESSION["studente-inserito"]=-1;
}
@header('location:admin_trasforma_iscritto_in_studente.php');
?>