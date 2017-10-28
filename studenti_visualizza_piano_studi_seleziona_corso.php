<?php
@include_once 'shared/menu.php';

$IdCorso=$_GET['IdCorso'];
$IdDipartimento=$_GET['IdDipartimento'];

//aggiorno la query che inserirà il corso nel record dello specifico studente
$sqlUpdateRecord="UPDATE studenti SET Id_corso=".$IdCorso." WHERE Id_anagrafe=".$utente->id;
$resUpdateRecord=$connessione->query($sqlUpdateRecord);


@header("location: studenti_visualizza_piano_studi.php");