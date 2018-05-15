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
        <h1 class="text-center"> Questionario feedback </h1>
        <h2> <?php  echo($_SESSION['nome_questionario']); ?></h2>
          <p>
            Domanda n. <?php echo($_GET['domanda_corrente']); ?>
          </p>
          <br />

      <br />
      <br />
      <br />
      <div>
        <div>
            <form action="setta_variabili_nome_domande.php?domanda_corrente=<?Php echo($_GET['domanda_corrente']); ?>" method="post">
                <label for ="nome">Nome domanda</label>

                <input class="form-control" type="text" id="nome" name="nome_domanda" required />

                <br />
                <label for="numero">Numero risposte</label>
                <select class="form-control" name="numero_risposte" id="numero">
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

                <label for="numero_risp">Numero risposte selezionabili</label>
                <select class="form-control" name="numero_risposte_ammesse" id="numero_risp">
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


                  <input class="btn btn-default center-block" type="submit" value = "Aggiungi domanda" />

          </form>
        </div>
      </div>
    </div>
  </body>
  <script>
  $(document).ready(function(){
    $( "#numero" ).change(function(){
      var numero_risposte = $("#numero").val();
      $("#numero_risp").empty();
      for(var i = 1;i<=numero_risposte;i++)
      {
        $("#numero_risp").append("<option value='"+i+"'>"+i+" </option>");
      }
    });
  });
  </script>
</html>
