<html>
<head>
    <title>Aggiungi questionario per feedback </title>
    <?php
    include "shared/head_inclusions.php";
    ?>
</head>
<body>
  <?php @include_once 'shared/menu.php';?>
  <?php menu() ?>

<div class="container text-center">
    <h1 class="text-center"> Imoposta risposte</h1>
	
    <h3> <?php 
        echo($_SESSION['nome_questionario']);
        $domanda_corrente = $_GET['domanda_corrente']; ?></h3>
    <br/>
    <p>
        Domanda n. <?php echo($domanda_corrente . " : " . $_SESSION['nome_domanda' . $domanda_corrente]); ?>
    </p>
    <br/>
    <br/>
    <div>
        <div>
            <form action="setta_variabili_nome_risposte.php?domanda_corrente=<?php echo($domanda_corrente); ?>"
                  method="post">
                <?php

                // echo($_SESSION['nome_questionario']."<br />");
                //  echo($_SESSION['numero_domande']."<br />");
                //  echo($_SESSION['nome_domanda']."<br />");
                //  echo($_SESSION['numero_risposte']."<br />");
                for ($i = 1; $i <= $_SESSION['numero_risposte' . $domanda_corrente]; $i++) {
                    echo('<label for ="nome_risposta' . $i . '">Nome risposta &nbsp ' . $i . '</label>');
                    echo('<input class="form-control" type="text" id="nome_risposta' . $i . '" name="nome_risposta' . $i . '"  required/> <br />');
                }

                ?>


                <br/>
                <input class="btn btn-default center-block" type="submit" value="Aggiungi risposte"/>
            </form>
        </div>
    </div>
</div>
</body>
</html>
