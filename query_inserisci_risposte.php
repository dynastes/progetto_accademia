<?php
  include"dbconnection.php";
  $lista_risposte = $_POST['risposta'];
  $lista_domande = $_POST['domanda'];
  $lista_numero_risposte = $_POST['numero_risposte'];
  $id_questionario = $_POST['idQuestionario'];
  $i=0;
  $j=0;
  $k=0;

  //inserimento risposte nel database
  while($i<sizeof($lista_domande))
  {
      if($lista_numero_risposte[$i]>$k)
      {
        echo("domanda ".$lista_domande[$i]);
        echo("risposta ".$lista_risposte[$j]."<br />");

        $query="INSERT INTO `risposte_utenti`(`Id_questionario`, `Id_utente`, `Risposte`, `Id_domanda`) VALUES (".$id_questionario.",1,".$lista_risposte[$j].",".$lista_domande[$i].")";
        echo($query);
        $connessione->query($query);
        $j++;
        $k++;
      }
      else
      {
        $i++;
        $k=0;
      }
  }




 ?>
