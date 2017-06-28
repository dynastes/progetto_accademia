<?php

//impostiamo le variabili
session_start();
$nome_domanda = $_POST['nome_domanda'];
$numero_risposte = $_POST['numero_risposte'];
$domanda_corrente = $_GET['domanda_corrente'];
$numero_risposte_ammesse  = $_POST['numero_risposte_ammesse'];

//impostiamo le variabili di Sessione

$_SESSION['nome_domanda'.$domanda_corrente] = $nome_domanda;
$_SESSION['numero_risposte'.$domanda_corrente] = $numero_risposte;
$_SESSION['numero_risposte_ammesse'.$domanda_corrente] = $numero_risposte_ammesse;


//redirect pagina successiva
@header("location: imposta_risposte.php?domanda_corrente=".$domanda_corrente);
 ?>
