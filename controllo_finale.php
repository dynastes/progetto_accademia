<?php
session_start();
$nome = str_replace("'","\'",$_SESSION['nome_questionario']);
include "dbconnection.php";
$query="INSERT INTO questionari (Nome) VALUES('".$nome."')";
$connessione->query($query);
//ultimo id questionario
$query="SELECT Id FROM questionari Order By Id Desc LIMIT 1";
echo($query);
$dati=$connessione->query($query);
while($res = $dati->fetch_assoc())
{
  $ultimo_id = $res['Id'];
}

for($i=1;$i<=$_SESSION['numero_domande'];$i++)
{
  //Inserimento delle domande
  $nome_domanda= str_replace("'","\'",$_SESSION['nome_domanda'.$i]);
  $numero_risposte_ammesse = $_SESSION['numero_risposte_ammesse'.$i];
  $query="INSERT INTO domande (Id_questionario,Nome_domanda,Numero_risposte) VALUES(".$ultimo_id.",'".$nome_domanda."',".$numero_risposte_ammesse.")";
  echo($query);
  $connessione->query($query);
  //ultimo id domanda
  $query="SELECT Id FROM domande Order By Id Desc LIMIT 1";
  echo($query);
  $dati=$connessione->query($query);
  while($res = $dati->fetch_assoc())
  {
    $ultimo_id_query = $res['Id'];
  }

  echo("<p>
  <b>Domanda ".$i."</b>
  </p>");
  echo("<a><b>".$_SESSION['nome_domanda'.$i]."</b></a><br />");
  for($j=1;$j<=$_SESSION['numero_risposte'.$i];$j++)
  {
    //inserimento risposta domanda
    $nome_risposta = str_replace("'","\'",$_SESSION['nome_risposta'.$j.$i]);
    $query="INSERT INTO risposte (Id_domanda,Nome_risposta) VALUES(".$ultimo_id_query.",'".$nome_risposta."')";
    echo($query);
    $connessione->query($query);
    echo($j.") ".$_SESSION['nome_risposta'.$j.$i]."<br />");
  }
}
session_destroy();
//@header("location: index.php");

 ?>
