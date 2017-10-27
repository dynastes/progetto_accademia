<?php
include "dbconnection.php";
$nome = $_POST['nome'];
$numero = $_POST['numero'];
$materia = $_SESSION['materia'];
echo($materia);

echo($nome);
echo($numero);

//creiamo il questionario
$query="INSERT INTO questionari (Nome,Id_materia) VALUES('".$nome."',".$materia.")";
echo($query);
$connessione->query($query);

//selezioniamo l'ultimo id inserito dei questionari
$query="SELECT Id FROM questionari Order By Id Desc LIMIT 1";
echo($query);
$dati=$connessione->query($query);
while($res = $dati->fetch_assoc())
{
  $ultimo_id = $res['Id'];
}


//aggiungiamo il numero di domande relative al questionario
for($i=0;$i<$numero;$i++)
{
  $query="INSERT INTO domande (Id_questionario) VALUES(".$ultimo_id.")";
  echo($query);
  $connessione->query($query);
}
@header("Location: visualizza_questionari.php");
 ?>
