<html>
  <head>
    <title>Gestisci questionario </title>
  </head>
  <body>
    <div class= "container text-center">
      <script>
        var totale = 0;
      </script>
      <h1>Gestisci questionario </h1>
      <br />
      <form class="text-left" method="post" action="query_inserisci_risposte.php">
      <?php
        session_start();
        include"dbconnection.php";
        include "shared/head_inclusions.php";
        $id = $_POST['codice'];
        //selezionare il numero di domande
        $query = "SELECT questionari.Id as idQuest,questionari.Nome,domande.Nome_domanda,risposte.Id_domanda,risposte.Nome_risposta,risposte.Id,domande.Numero_risposte, (SELECT SUM(Numero_risposte) FROM domande WHERE Id_questionario = ".$id.") AS Numero FROM questionari INNER JOIN domande On questionari.Id = domande.Id_questionario INNER JOIN risposte ON domande.Id = risposte.Id_domanda WHERE questionari.Id = ".$id;
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
              echo("<input type='hidden' value = '".$res['idQuest']."' name= 'idQuestionario' />");
            }
            else {
              echo('<script>
                $(document).ready(function(){
                  $("#invia").prop("disabled",true);
                  var numero'.$id_domanda_vecchio.'=0;
                  var numero_risposte_ammessibili'.$id_domanda_vecchio.'='.$numero_risposte_ammessibili.';
                  $("#restanti'.$id_domanda_vecchio.'").html("risposte rimanenti: " + (numero_risposte_ammessibili'.$id_domanda_vecchio.'-numero'.$id_domanda_vecchio.'));

                  $( ".'.$id_domanda_vecchio.'" ).click(function(){
                    if(this.checked == true)
                    {
                      if(numero'.$id_domanda_vecchio.'== numero_risposte_ammessibili'.$id_domanda_vecchio.')
                      {
                        this.checked = false;
                      }
                      else
                      {
                        numero'.$id_domanda_vecchio.' = numero'.$id_domanda_vecchio.'+1;
                        totale = totale +1;
                          $("#restanti'.$id_domanda_vecchio.'").html("risposte rimanenti: " + (numero_risposte_ammessibili'.$id_domanda_vecchio.'-numero'.$id_domanda_vecchio.'));
                      }
                    }
                    else
                    {
                      numero'.$id_domanda_vecchio.'= numero'.$id_domanda_vecchio.' - 1;
                      totale = totale-1;
                        $("#restanti'.$id_domanda_vecchio.'").html("risposte rimanenti: " + (numero_risposte_ammessibili'.$id_domanda_vecchio.'-numero'.$id_domanda_vecchio.'));
                    }
                    if(totale == '.$risposte_totali.')
                    {
                      $("#invia").prop("disabled",false);

                    }
                    else
                    {
                      $("#invia").prop("disabled",true);

                    }
                  });
                });
                </script>');
            }
            $id_domanda_vecchio = $id_domanda;
            echo("");
            echo("
              </fieldset>
              <br />
              <fieldset>
              <legend>
              ".$res['Nome_domanda']." <br />
                <p id='restanti".$id_domanda."'>
                </p>
              </legend>
              <input type='hidden' value='".$res['Id_domanda']."' name = 'domanda[]'/>
              <input type='hidden' value='".$res['Numero_risposte']."' name = 'numero_risposte[]'/>

              <input  class='".$id_domanda."' type='checkbox' value='".$res['Id']."' name = 'risposta[]'/>".$res['Nome_risposta']."<br />
            ");
            $numero_risposte_ammessibili = $res['Numero_risposte'];
            $risposte_totali = $res['Numero'];


          }
          else {
            echo("<input class='".$id_domanda."' type='checkbox' value='".$res['Id']."' name = 'risposta[]'/>".$res['Nome_risposta']."<br />");

          }
          $giro = $giro+1;
        }
        echo('<script>
        $(document).ready(function(){
          var numero'.$id_domanda_vecchio.'=0;
          var numero_risposte_ammessibili'.$id_domanda_vecchio.'='.$numero_risposte_ammessibili.';

            $("#restanti'.$id_domanda_vecchio.'").append("risposte rimanenti: " + (numero_risposte_ammessibili'.$id_domanda_vecchio.'-numero'.$id_domanda_vecchio.'));
          $( ".'.$id_domanda_vecchio.'" ).click(function(){
            if(this.checked == true)
            {
              if(numero'.$id_domanda_vecchio.'== numero_risposte_ammessibili'.$id_domanda_vecchio.')
              {

                this.checked = false ;
              }
              else
              {
                numero'.$id_domanda_vecchio.' = numero'.$id_domanda_vecchio.'+1;
                totale = totale + 1;
                $("#restanti'.$id_domanda_vecchio.'").html("risposte rimanenti: " + (numero_risposte_ammessibili'.$id_domanda_vecchio.'-numero'.$id_domanda_vecchio.'));
              }
            }
            else
            {
              numero'.$id_domanda_vecchio.'= numero'.$id_domanda_vecchio.' - 1;
              totale = totale -1;
                $("#restanti'.$id_domanda_vecchio.'").html("risposte rimanenti: " + (numero_risposte_ammessibili'.$id_domanda_vecchio.'-numero'.$id_domanda_vecchio.'));
            }
            if(totale == '.$risposte_totali.')
            {
              $("#invia").prop("disabled",false);

            }
            else
            {
              $("#invia").prop("disabled",true);

            }
          });
        });
          </script></fieldset>');
      ?>
      <br />
      <input type="submit" class = "btn btn-default btn-lg" value = "Invia questionario" id ="invia"/>
    </form>
    </div>
</html>
