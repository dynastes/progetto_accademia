<?php
@include_once 'shared/menu.php';
$dataType = $_POST['data_type'];
$dataValue = $_POST['value'];

if ($dataType=='nome'){
    $query="UPDATE anagrafe SET Nome='".$dataValue."' WHERE Id=".$utente->id;
    $connessione->query($query);
    //$utente->nome=$dataValue;
}
if ($dataType=='cognome'){
    $query="UPDATE anagrafe SET Cognome='".$dataValue."' WHERE Id=".$utente->id;
    $connessione->query($query);
    $utente->cognome=$dataValue;
}
if ($dataType=='email'){
    $query="UPDATE anagrafe SET Email='".$dataValue."' WHERE Id=".$utente->id;
    $connessione->query($query);
    $utente->email=$dataValue;
}
if ($dataType=='cf'){
    $query="UPDATE anagrafe SET Codice_fiscale='".$dataValue."' WHERE Id=".$utente->id;
    $connessione->query($query);
    $utente->cf=$dataValue;
}
if ($dataType=='indirizzo'){
    $query="UPDATE anagrafe SET Indirizzo='".$dataValue."' WHERE Id=".$utente->id;
    $connessione->query($query);
    $utente->indirizzo=$dataValue;
}
if ($dataType=='residenza'){
    $query="UPDATE anagrafe SET Residenza='".$dataValue."' WHERE Id=".$utente->id;
    $connessione->query($query);
    $utente->residenza=$dataValue;
}
if ($dataType=='telefono'){
    $query="UPDATE anagrafe SET Telefono='".$dataValue."' WHERE Id=".$utente->id;
    $connessione->query($query);
    $utente->telefono=$dataValue;
}

//modificare i valori dentro la classe UTENTE
$utente->reloadUser($connessione);
//azzerare il valore $dataType
$utente=serialize($utente);
$_SESSION['ut'] = $utente;
header("Location:profilo.php");
