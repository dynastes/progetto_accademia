<?php
@include('menu.php');
@include('dbconnection.php');
$id_materia = $_POST['materia_sostitutiva'];
$id_materia_piano_vecchia = $_POST['materia_vecchia'];
$nuovi_crediti = $_POST['crediti'];
$id_studente = $_POST['id_studente'];

//si crea una riga della tabella materie_scelta che contiene il vecchio id materia_piano con la nuova materia assegnata e i nuovi crediti per lo studente
$sql_sostituzione = "INSERT INTO materie_scelta (Id_studente, Id_materia_piano_orig, Id_materia_sostitutiva, Crediti) VALUES ($id_studente, $id_materia_piano_vecchia,$id_materia,$nuovi_crediti)";
echo($sql_sostituzione);
$connessione->query($sql_sostituzione);

//si autorizza la richiesta dello studentes
$id_richiesta = $_POST['id_richiesta'];
$sqlAutorizza="UPDATE studenti_richieste SET Stato_richiesta='Confermato' WHERE Id=".$id_richiesta;

if($connessione->query($sqlAutorizza)){
	$_SESSION['autorizzato']=1;
}
header("Location: admin_gestisci_certificati.php");
 ?>
