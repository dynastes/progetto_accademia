<html>
  <head>
    <title>Analizza risposte </title>
  </head>
  <body>
  	   <?php @include_once 'shared/menu.php';?>
  <?php menu() ?>
  <?php
			if($utente->get_ruolo() !="admin" and $utente->get_ruolo() != "editor"){
				header("location: index.php");
			}
		?>
    <div class= "container text-center">

      <h1>Analizza risposte </h1>
      <br />
      <form class="text-left" method="post" action="query_inserisci_risposte.php">
        <script src="https://cdnjs.com/libraries/Chart.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
      <?php
        include"dbconnection.php";
        include "shared/head_inclusions.php";
        $id = $_POST['codice'];
        //selezionare il numero di domande
        $query = "SELECT questionari.Id as idQuest,questionari.Nome,domande.Nome_domanda,risposte.Id_domanda,risposte.Nome_risposta,risposte.Id,domande.Numero_risposte,risposte.Id as Risposta_selezionata,(SELECT SUM(Numero_risposte) FROM domande WHERE Id_questionario = ".$id.") AS Numero,(SELECT COUNT(risposte) FROM risposte_utenti WHERE risposte= Risposta_selezionata) AS Numero_risposte_utenti FROM questionari INNER JOIN domande On questionari.Id = domande.Id_questionario INNER JOIN risposte ON domande.Id = risposte.Id_domanda WHERE questionari.Id = ".$id;
        $dati=$connessione->query($query);
        $id_domanda_vecchio = 0;
        $giro = 0;
        $risposte_totali = 0;
        $labels;;
        while($res = $dati -> fetch_assoc())
        {
          $id_domanda = $res['Id_domanda'];
          if($id_domanda != $id_domanda_vecchio)
          {

            if ($giro ==0)
            {
              echo("<h3> ".$res['Nome']."</h3>");
            }
            else {
              $labels = $labels."],";

                $data = $data."],";

                echo("
                    <div class='col-md-3'>

                    </div>
                  <div class='col-md-6'>
                  <canvas id='myChart".$giro."' width='20' height='20'></canvas>
                  </div>
                  <div class='col-md-3'>
                  
                  </div>
                  <script>
                  var ctx = document.getElementById('myChart".$giro."').getContext('2d');
                  var myChart = new Chart(ctx, {
                      type: 'bar',
                      data: {
                          ".$labels."
                          datasets: [{
                              label: '# of Votes',
                              ".$data."
                              backgroundColor: [
                                  'rgba(255, 99, 132, 0.2)',
                                  'rgba(54, 162, 235, 0.2)',
                                  'rgba(255, 206, 86, 0.2)',
                                  'rgba(75, 192, 192, 0.2)',
                                  'rgba(153, 102, 255, 0.2)',
                                  'rgba(255, 159, 64, 0.2)'
                              ],
                              borderColor: [
                                  'rgba(255,99,132,1)',
                                  'rgba(54, 162, 235, 1)',
                                  'rgba(255, 206, 86, 1)',
                                  'rgba(75, 192, 192, 1)',
                                  'rgba(153, 102, 255, 1)',
                                  'rgba(255, 159, 64, 1)'
                              ],
                              borderWidth: 1
                          }]
                      },
                      options: {
                          scales: {
                              yAxes: [{
                                  ticks: {
                                      beginAtZero:true
                                  }
                              }]
                          }
                      }
                  });
                  </script>
                ");

            }
            $labels = "labels: [";
              $data = "data: [";
            $id_domanda_vecchio = $id_domanda;

            $labels = $labels."'".$res['Nome_risposta']."'";

            $data = $data.$res['Numero_risposte_utenti'];
            echo("");
            echo("
              </fieldset>
              <br />
              <fieldset>
              <legend>
              ".$res['Nome_domanda']." <br />
              </legend>


          ");


        }
          else {
            $labels = $labels.", '".$res['Nome_risposta']."'";
            $data = $data.", ".$res['Numero_risposte_utenti'];



          }
          $giro = $giro+1;
        }
        $labels = $labels."],";

          $data = $data."],";

          echo("
            <canvas id='myChart".$giro."' width='400' height='400'></canvas>
            <script>
            var ctx = document.getElementById('myChart".$giro."').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    ".$labels."
                    datasets: [{
                        label: '# of Votes',
                        ".$data."
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true
                            }
                        }]
                    }
                }
            });
            </script>
          ");

      ?>


      <br />

    </form>
    </div>
</html>
