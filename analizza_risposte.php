<html>
  <head>
    <title>Analizza risposte </title>
  </head>
  <body>
    <div class= "container text-center">

      <h1>Analizza risposte </h1>
      <br />
      <form class="text-left" method="post" action="query_inserisci_risposte.php">
      <?php
        session_start();
        include"dbconnection.php";
        include "shared/head_inclusions.php";
        $id = $_POST['codice'];
        //selezionare il numero di domande
        $query = "SELECT questionari.Id as idQuest,questionari.Nome,domande.Nome_domanda,risposte.Id_domanda,risposte.Nome_risposta,risposte.Id,domande.Numero_risposte,risposte.Id as Risposta_selezionata,(SELECT SUM(Numero_risposte) FROM domande WHERE Id_questionario = ".$id.") AS Numero,(SELECT COUNT(risposte) FROM risposte_utenti WHERE risposte= Risposta_selezionata) AS Numero_risposte_utenti FROM questionari INNER JOIN domande On questionari.Id = domande.Id_questionario INNER JOIN risposte ON domande.Id = risposte.Id_domanda WHERE questionari.Id = ".$id;
        $dati=$connessione->query($query);
        $id_domanda_vecchio = 0;
        $giro = 0;
        $risposte_totali = 0;
        while($res = $dati -> fetch_assoc())
        {
          $id_domanda = $res['Id_domanda'];
          if($id_domanda != $id_domanda_vecchio)
          {
            if ($giro ==0)
            {
              echo("<h3> ".$res['Nome']."</h3>");
            }

            $id_domanda_vecchio = $id_domanda;
            echo("");
            echo("
              </fieldset>
              <br />
              <fieldset>
              <legend>
              ".$res['Nome_domanda']." <br />
              </legend>
              <p>
                ".$res['Nome_risposta']." : ".$res['Numero_risposte_utenti']."
              </p>


          ");
        }
          else {
            echo("
            <p>
              ".$res['Nome_risposta']." : ".$res['Numero_risposte_utenti']."
            </p>");
          }
          $giro = $giro+1;
        }

      ?>
      <br />

    </form>
    </div>
</html>
