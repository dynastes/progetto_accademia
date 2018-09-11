<?php
@include_once 'shared/menu.php';
$dataType = $_POST['data_type'];


if ($dataType=='nome'){
    $dataValue = $_POST['value'];
    $query="UPDATE anagrafe SET Nome='".$dataValue."' WHERE Id=".$utente->id;
    $connessione->query($query);
    //$utente->nome=$dataValue;
}
if ($dataType=='cognome'){
    $dataValue = $_POST['value'];
    $query="UPDATE anagrafe SET Cognome='".$dataValue."' WHERE Id=".$utente->id;
    $connessione->query($query);
    $utente->cognome=$dataValue;
}
if ($dataType=='email'){
    $dataValue = $_POST['value'];
    $query="UPDATE anagrafe SET Email='".$dataValue."' WHERE Id=".$utente->id;
    $connessione->query($query);
    $utente->email=$dataValue;
}
if ($dataType=='cf'){
    $dataValue = $_POST['value'];
    $query="UPDATE anagrafe SET Codice_fiscale='".$dataValue."' WHERE Id=".$utente->id;
    $connessione->query($query);
    $utente->cf=$dataValue;
}
if ($dataType=='indirizzo'){
    $dataValue = $_POST['value1'].", ".$_POST['value2'];
    $query="UPDATE anagrafe SET Indirizzo='".$dataValue."' WHERE Id=".$utente->id;
    $connessione->query($query);
    $utente->indirizzo=$dataValue;
}
if ($dataType=='residenza'){
    $dataValue = $_POST['value'];
    $query="UPDATE anagrafe SET Residenza='".$dataValue."' WHERE Id=".$utente->id;
    $connessione->query($query);
    $utente->residenza=$dataValue;
}
if ($dataType=='telefono'){
    $dataValue = $_POST['value'];
    $query="UPDATE anagrafe SET Telefono='".$dataValue."' WHERE Id=".$utente->id;
    $connessione->query($query);
    $utente->telefono=$dataValue;
}

//modificare i valori dentro la classe UTENTE
$utente->reloadUser($connessione);
//azzerare il valore $dataType
$utente=serialize($utente);
$_SESSION['ut'] = $utente;
$_SESSION['profilo_modificato'] = true;
header("Location:profilo.php");
