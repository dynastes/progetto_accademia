<!--
<?php @include_once 'shared/menu.php'; ?>
convertita la grafica in bootstrap ma i link fanno riferimento alle vecchie pagine
non convertite

-->

<!DOCTYPE html>

<html>
<head>
    <?php @include_once 'shared/head_inclusions.php'; ?>
</head>
<body>


<?php menu(); ?>

<div class="container">
    <div id="avvisi">

        <div id="elenco-avvisi">
            <?php
            if(isset($_GET['tipo'])){
                if($_GET['tipo'] == "questionari"){
                  echo '<table class="table">';
                  echo '<tr>';
                  echo '<th colspan="3">'.titolo_feedback.'</th>';
                  echo '<tr>';
                  echo '<td><b>'.nome.'</b></td>';
                  echo '<td><b>'.compila.'</b></td>';
                  echo '<td><b>'.data_pubblicazione.'</b></td>';
                  echo '</tr>';
                  //assegnazione questionari materie
                  //prendere id_materia_dei questionari e scorrerli tutti
                  $sqlquestionari = "SELECT * FROM questionari"; //av.Id_docente=an.Id AND
                  $questLista = $connessione->query($sqlquestionari);
                  while ($resQuestionari = $questLista->fetch_assoc()) {
                      $idQuestionario = $resQuestionari['Id'];
                      $idMateria = $resQuestionari['Id_materia'];
                      $nomeQuestionario = $resQuestionari['Nome'];
                      $dataQuestionario = $resQuestionari['Data_pub'];
                      $compilato = false;
                      //controlliamo se lo studente ha già risposto
                      $sqlControlloRisposte = "SELECT sum(Id) AS Tot FROM risposte_utenti WHERE Id_questionario = " . $idQuestionario . " AND Id_utente =" . $utente->get_id();

                      $controlloRisposteLista = $connessione->query($sqlControlloRisposte);
                      while ($resControlloRisposte = $controlloRisposteLista->fetch_assoc()) {
                          $controlloRisposte = $resControlloRisposte['Tot'];
                      }
                      if ($controlloRisposte > 0) {
                          $compilato = true;

                      }

                      if ($compilato == false) {
                          $idPianoStudente = "";
                          $sqlPianoStudi = "SELECT * FROM materie_piano WHERE Id_materia = " . $idMateria;
                          $pianoStudiLista = $connessione->query($sqlPianoStudi);
                          while ($resPianoStudi = $pianoStudiLista->fetch_assoc()) {
                              $idPiano = $resPianoStudi['Id'];
                              //selezioiamo ora l'id della tabella studente_piano
                              $sqlStudentePiano = "SELECT * FROM studente_piano WHERE Id_piano = " . $idPiano . " AND Id_studente = " . $utente->get_id();
                              $studentiPianoLista = $connessione->query($sqlStudentePiano);
                              while ($resStudentiPiano = $studentiPianoLista->fetch_assoc()) {
                                  $idPianoStudente = $resStudentiPiano["Id"];
                                  echo '<form action="gestisci_questionario.php" method="post">';
                                  echo '<input type="hidden" value ="' . $idQuestionario . '" name="codice" />';
                                  echo '<tr>';
                                  echo '<td> ' . $nomeQuestionario . ' </td>';
                                  echo '<td> <button class="btn btn-default">Compila</button> </td>';
                                  echo '<td> ' . $dataQuestionario . ' </td>';
                                  echo '</tr>';
                                  echo '</form>';

                              }

                          }
                          //controllo per gli studenti che hanno la materia come materia a scelta
                          $sqlMateriaScelta = "SELECT * FROM materie_scelta WHERE Id_materia_piano_sost = " . $idMateria . " AND Id_studente_piano = " . $idPianoStudente;
                          $materiaSceltaLista = $connessione->query($sqlMateriaScelta);
                          if (@mysqli_num_rows($materiaSceltaLista)) { //controlliamo che la query abbia restituito valori. Se non ne restituisce, la pagina da errore
                              while ($resMateriaScelta = $materiaSceltaLista->fetch_assoc()) {
                                  echo '<form action="gestisci_questionario.php" method="post">';
                                  echo '<input type="hidden" value ="' . $idQuestionario . '" name="codice" />';
                                  echo '<tr>';
                                  echo '<td> ' . $nomeQuestionario . ' </td>';
                                  echo '<td> <button class="btn btn-default">'.compila.'</button> </td>';
                                  echo '<td> ' . $dataQuestionario . ' </td>';
                                  echo '</tr>';
                                  echo '</form>';
                              }
                          }
                      }
                      //selezioniamo ora l'id del piano di studi

                  }
                  echo '</table>';
                }


            }else{
                echo("<p>".spiegazione_calendario."</p>");
                $sqlavvisi = "SELECT an.Nome, an.Cognome, av.Testo, av.Data_pubblicazione FROM avvisi AS av, anagrafe AS an WHERE Visibilita='pubblico' AND an.Id = av.Id_docente ORDER BY av.Data_pubblicazione DESC"; //av.Id_docente=an.Id AND
                $avvisiLista = $connessione->query($sqlavvisi);
                echo '<table class="table">';
                echo '<tr>';
                echo '<td><b>'.nome.'</b></td>';
                echo '<td><b>'.cognome.'</b></td>';
                echo '<td><b>'.testo.'</b></td>';
                echo '<td><b>'.data_pubblicazione.'</b></td>';
                echo '</tr>';
                while ($resAvvisi = $avvisiLista->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $resAvvisi["Nome"] . '</td>';
                    echo '<td>' . $resAvvisi["Cognome"] . '</td>';
                    echo '<td>' . $resAvvisi["Testo"] . '</td>';
                    echo '<td>' . $resAvvisi["Data_pubblicazione"] . '</td>';
                    echo '</tr>';
                }
                echo "</table>";
            }

            ?>
        </div>
    </div>
</div>

<?php @include_once 'shared/footer.php'; ?>

</body>
</html>
