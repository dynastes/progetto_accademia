<html>
  <head>
    <title>Aggiungi questionario per feedback </title>
    <?php
        include "shared/head_inclusions.php";
     ?>
  </head>
  <body style="padding-bottom: 70px;">
  <?php @include_once 'shared/menu.php';?>
  <?php menu() ?>
    <div class="container text-center">
        <h1 class="text-center"> Imposta il numero di domande</h1>
      <br />
      <br />
      <br />
      <div>
        <div>
            <form action="setta_variabili_nome_questionario.php" method="post">
                <label for ="nome">Nome questionario</label>

                <input class="form-control" type="text" id="nome" name="nome" required/>

                <br />
                <label for="numero">Numero domande</label>
                <select class="form-control" name="numero" id="numero">
                  <?php
                    for($i = 1; $i<=100; $i++)
                    {
                      echo("<option value='".$i."'>
                      ".$i."
                      </option>");
                    }
                  ?>"
                </select>


                <br />
                <label for="materia">Nome materia</label>
                <select class="form-control" name="materia" id="materia">
                <?php
                include"dbconnection.php";
                include "shared/head_inclusions.php";
                $id = $_POST['codice'];
                //selezionare il numero di domande
                $query = "SELECT * FROM materie_anagrafica";
                $dati=$connessione->query($query);
                while($res = $dati -> fetch_assoc())
                    {
                      echo("<option value='".$res['Id']."'>".$res['Nome_materia']." </option>");
                    }
                 ?>


                </select>
                <br />

                  <input class="btn btn-default center-block" type="submit" value = "Aggiungi questionario" />

          </form>
        </div>
      </div>
    </div>
  </body>
</html>
