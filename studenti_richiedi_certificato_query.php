<?php
@include_once 'menu.php';

$sqlInserisciCertificato="INSERT INTO studenti_richieste_certificati (Id_anagrafe, Stato_richiesta, Data_invio) VALUES (".$utente->id.", 'Non letto', SYSDATE())";
echo $sqlInserisciCertificato;


if($connessione->query($sqlInserisciCertificato)){
	$_SESSION['richiesta-inviata']=1;
}

@header('location:studenti_richiedi_certificato.php');
?>