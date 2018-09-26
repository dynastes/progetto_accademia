<?php
@include_once 'shared/menu.php';
@include_once 'dbconnection.php';

$IdCorso=$_GET['IdCorso'];
$IdDipartimento=$_GET['IdDipartimento'];
$idStudente=$_GET['idStudente'];
//aggiorno la query che inserirà il corso nel record dello specifico studente
$sqlUpdateRecord="UPDATE studenti SET Id_corso=".$IdCorso." WHERE Id_anagrafe=".$idStudente;
$resUpdateRecord=$connessione->query($sqlUpdateRecord);

Header("Location: admin_valutazione_studente.php?ID=".$idStudente."");


?>
