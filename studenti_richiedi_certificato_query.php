<?php
@include_once 'menu.php';

$tipoCertificato=$_POST["tipo-certificato"];
$sqlInserisciCertificato="INSERT INTO studenti_richieste_certificati 
							(Id_anagrafe, Stato_richiesta, Data_invio, Tipo) 
							VALUES (".$utente->id.", 'Non letto', SYSDATE(), ".$tipoCertificato.")";


if($connessione->query($sqlInserisciCertificato)){
	$_SESSION['richiesta-inviata']=1;
}

@header('location:studenti_richieste.php');
?>