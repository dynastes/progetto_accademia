<?php

//impostiamo le variabili
$nome = $_POST['nome'];
$numero = $_POST['numero'];
$materia = $_POST['materia'];

//impostiamo le variabili di Sessione
session_start();
$_SESSION['nome_questionario'] = $nome;
$_SESSION['numero_domande'] = $numero;
$_SESSION['materia_questionario'] = $materia;
$_SESSION['domanda_corrente'] = 1;


//redirect pagina successiva
@header("location: imposta_domande.php?domanda_corrente=".$_SESSION['domanda_corrente']);
 ?>
