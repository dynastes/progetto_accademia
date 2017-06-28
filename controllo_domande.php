<?php
session_start();
if($_GET['domanda_corrente']< $_SESSION['numero_domande'])
{
  $_GET['domanda_corrente'] = $_GET['domanda_corrente'] + 1;
  @header("location: imposta_domande.php?domanda_corrente=".$_GET['domanda_corrente']);
}
else {
  @header("location: controllo_finale.php");
}
 ?>
