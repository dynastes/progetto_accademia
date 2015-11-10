<?php
@include('menu.php');

$sqlAutorizza="UPDATE studenti_richieste_certificati SET Stato_richiesta='Confermato' WHERE Id=".$_GET['Id'];

if($connessione->query($sqlAutorizza)){
	$_SESSION['autorizzato']=1;
}
@header('location:admin_gestisci_certificati.php');
?>