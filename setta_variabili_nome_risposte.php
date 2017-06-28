<?php
session_start();
$domanda_corrente = $_GET['domanda_corrente'];
//impostiamo le variabili
for($i=1;$i<=$_SESSION['numero_risposte'.$domanda_corrente];$i++)
{
  $_SESSION['nome_risposta'.$i.$domanda_corrente] =$_POST['nome_risposta'.$i];
  echo(  $_SESSION['nome_risposta'.$i.$domanda_corrente]."<br />");

}
//redirect pagina successiva
@header("location: controllo_domande.php?domanda_corrente=".$domanda_corrente);

 ?>
