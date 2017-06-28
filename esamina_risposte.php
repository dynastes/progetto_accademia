<html>
  <head>
    <title>Visualizza questioanri </title>
  </head>
  <body>
    <?php
      include"dbconnection.php";
      include "shared/head_inclusions.php";
      $query = "SELECT *,(SELECT count(Id) FROM domande WHERE Id_questionario = questionari.Id) AS Numero_domande FROM questionari";
      $elenco_questionari=$connessione->query($query);

     ?>
     <div class="container text-center">


    <h1>Visualizza questionari </h1>
    <br />
    <br />
    <br />


        <table class="table table-striped">
          <tr>
            <td>
              <p>
              <b>Nome questionario </b>
              </p>
            </td>
            <td>
              <p>
              <b>Numero domande </b>
              </p>
            </td>
            <td>
                <p>
                  <b>
                    Gestisci
                  </b>
                </p>
            </td>

        </tr>

      <?php
      while($res=$elenco_questionari->fetch_assoc()){
        echo('  <form action="gestisci_questionario.php" method="post">
          <tr>
          <td>
          <p>
          '.$res["Nome"].'
          </p>
          </td>
          <td>
          <p>
          '.$res["Numero_domande"].'
          </p>
          </td>
          <td>
                <input type="hidden" id ="codice" name="codice" value = "'.$res['Id'].'" />
          <button type="submit"  class="btn btn-default btn-lg">
             <span class="glyphicon glyphicon-wrench aria-hidden="true"></span>
          </button>
          </td>
          </tr>
          </form>');
      }
      ?>

    </table>


  </div>
  </body>
</html>
