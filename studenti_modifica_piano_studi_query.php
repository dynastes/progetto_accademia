<?php
@include_once 'shared/menu.php';

$testo=$_POST['avviso'];


$sqlInserisciRichiesta='INSERT INTO studenti_richieste
						(Id_anagrafe, Stato_richiesta, Data_invio, Tipo, Testo)
						VALUES ('.$utente->id.', "Non letto", SYSDATE(), 4, "'.$testo.'")';

echo $sqlInserisciRichiesta;
if($connessione->query($sqlInserisciRichiesta)){
	$_SESSION['inserimento']=1;
}
@header('location:studenti_visualizza_piano_studi.php');

?>
