<html>
  <head>
    <title>Feedback Tool </title>
    <?php
      include "headerinclusion.php";
     ?>
  </head>
  <body>
    <div class="container text-center">
      <h1>Feedback Tool</h1>
      <br />
      <br />

      <a href="aggiungi_questionario.php"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>&nbsp Aggiungi questionario</a>
      <br />
      <br />
      <a href="visualizza_questionari.php">Visualizza questionari</a>
      <br />
      <br />
      <a href="simula_questionari.php">Simula_questionari</a>
      <br />
      <br />
      <a href="grafici_questionari.php">Grafici questionari</a>
<?php
  include"dbconnection.php";
  $query = "SELECT  DISTINCT(risposte) AS Risposta_selezionata, Id_domanda,(SELECT COUNT(risposte) FROM risposte_utenti WHERE risposte= Risposta_selezionata) AS Numero_risposte FROM `risposte_utenti` WHERE Id_questionario = 10 ";
  $dati=$connessione->query($query);
  $domanda_corrente = null;

    while($res = $dati -> fetch_assoc()){
      if($res['Id_domanda']!= $domanda_corrente){
            echo("<p> <b>Domanda ".$res['Id_domanda']."</b></p>");
            echo("<p>
              <b>Numero scelte risposta ".$res['Risposta_selezionata']."</b> : ".$res['Numero_risposte']."
            </p>");
            $domanda_corrente = $res['Id_domanda'];
      }
      else {
        echo("<p>
          <b>Numero scelte risposta ".$res['Risposta_selezionata']."</b> : ".$res['Numero_risposte']."
        </p>");
      }




    }

 ?>
</div>
    </div>
  </body>
</html>
