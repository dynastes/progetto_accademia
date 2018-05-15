<html>
  <head>
    <title>Verifica rispostes</title>
  </head>
  <body>
    <?php
      include"dbconnection.php";
      include "shared/head_inclusions.php";
      $query = "SELECT *,(SELECT count(Id) FROM domande WHERE Id_questionario = questionari.Id) AS Numero_domande FROM questionari";
      $elenco_questionari=$connessione->query($query);

     ?>
	   <?php @include_once 'shared/menu.php';?>
  <?php menu() ?>
  <?php
			if($utente->get_ruolo() !="admin" and $utente->get_ruolo() != "editor"){
				header("location: index.php");
			}
		?>
     <div class="container text-center">


    <h1>Verifica preferenze  </h1>
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
                  <b>
                    Visualizza rispsote
                  </b>
                </p>
            </td>

        </tr>

      <?php
      while($res=$elenco_questionari->fetch_assoc()){
        echo('  <form action="analizza_risposte.php" method="post">
          <tr>
          <td>
          <p>
          '.$res["Nome"].'
          </p>
          </td>

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
