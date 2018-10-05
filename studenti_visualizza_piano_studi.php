<?php @include_once 'shared/menu.php';
if( @$_SESSION['inserimento']===1){
	echo "<div style=\"width:100%;color:green;text-align:center;font-weight:bold;border-style:solid;border-width:2px;border-color:green;background-color:#81F79F;\">Richiesta inviata correttamente</div>";
	$_SESSION['inserimento']=0;
}

/*function coloraRighe($a){
	if($a==="Base"){
		return ' background-color:#AACCFF;';
	} else if($a==="Caratterizzante"){
		return ' background-color:#F2FFAA;';
	} else if($a==="Integrativa"){
		return ' background-color:#EEAAFF;';
	}
}*/

?>
<html>
<head>
    <?php @include_once 'shared/head_inclusions.php'; ?>
</head>
<body>
<?php menu(); ?>
<div class="container">
    <div class="page-header">
        <h1>Visualizza Piano di Studi</h1>
        <a class="btn btn-default" href="studenti_modifica_piano_studi.php">
            Modifica piano studi
        </a>

    </div>

    <!-- SEZIONE 1-->
    <?php
    $tot_crediti = 0;
    //controllo se l'utente ha un Id_corso>0 inserito nel suo profilo. Se così non è allora mostro la selezione del corso
    $sqlCheckCorso = "SELECT Id_corso FROM studenti WHERE Id_anagrafe=" . $utente->id;
    $resCheckCorso = $connessione->query($sqlCheckCorso);
    $checkCorso = $resCheckCorso->fetch_assoc();
    if ($checkCorso['Id_corso'] == 0) {
        ?>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="form-group">
                    <table class="table sortable table-striped">
                        <tr>
                            <!-- <th style="text-align:center">ID</th> -->
                            <th style="text-align:center">Dipartimento</th>
                            <th style="text-align:center">Nome</th>
                            <th class="sorttable_nosort"><!-- Modifica --></th>
                            <th class="sorttable_nosort"><!-- Elimina --></th>
                        </tr>

                        <?php
                        $sql_carica_corsi = "SELECT * FROM corsi ORDER BY Id_dipartimento";
                        //echo "Query: ".$sql_carica_corsi;
                        $res_corsi = $connessione->query($sql_carica_corsi);
                        while ($res = $res_corsi->fetch_assoc()) {
                        ?>
                        <tr>
                            <!-- <td style="text-align:center"><?php //echo $res['Id']; ?></td> -->
                            <?php
                            $sql_carica_nome_dipartimento = "SELECT * FROM dipartimenti WHERE Id=" . $res['Id_dipartimento'];
                            //echo "Query: ".$sql_carica_corsi;
                            $res_dipartimento = $connessione->query($sql_carica_nome_dipartimento);
                            while ($res2 = $res_dipartimento->fetch_assoc()) {
                            ?>
                            <td style="text-align:center"><?php echo $res2['Nome_dipartimento']; ?></td>
                            <td><?php echo $res['Nome_corso']; ?></td>
                            <td><a class="btn btn-info"
                                   href="studenti_visualizza_piano_studi_seleziona_corso.php?IdCorso=<?php echo $res['Id']; ?>&IdDipartimento=<?php echo $res['Id_dipartimento']; ?>"
                                   onclick="return sicuro('<?php echo $res['Nome_corso']; ?>')">Seleziona<?php }
                                    } ?></a></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div> <!--FINE SEZIONE 1-->
    <?php } else {
        //prendo il corso dello studente
        $sql_corsoStudente="SELECT Id_corso FROM studenti WHERE Id_anagrafe=".$utente->id;
        $query_corsoStudente=$connessione->query($sql_corsoStudente);
        $res_idCorsoStudente=$query_corsoStudente->fetch_assoc();

        $sql_offertaFormativa="SELECT Id_offerta_formativa FROM materie_piano WHERE Id_corso=".$res_idCorsoStudente['Id_corso'];;
        $query_offertaFormativa=$connessione->query($sql_offertaFormativa);
        $res_idOffertaFormativa=$query_offertaFormativa->fetch_assoc();


        $id_corso = $res_idCorsoStudente['Id_corso'];
        $offerta = $res_idOffertaFormativa['Id_offerta_formativa'];


        $sql_id_dipartimento_e_Nome_corso = "SELECT Id_dipartimento, Nome_corso FROM corsi WHERE Id='" . $id_corso . "'";
//echo $sql_id_dipartimento_e_Nome_corso."<br>";

        $res_id_dipartimento_e_Nome_corso = $connessione->query($sql_id_dipartimento_e_Nome_corso);
        $id_dip_e_nom_cor = $res_id_dipartimento_e_Nome_corso->fetch_assoc();

        $id_dipartimento = $id_dip_e_nom_cor['Id_dipartimento'];
        $nome_corso = $id_dip_e_nom_cor['Nome_corso'];
//echo $id_dipartimento."<br>";
//echo $nome_corso."<br>";

        $sql_nome_dipartimento = "SELECT Nome_dipartimento FROM dipartimenti WHERE Id='" . $id_dipartimento . "'";
//echo $sql_nome_dipartimento."<br>";

        $res_nome_dipartimento = $connessione->query($sql_nome_dipartimento);
        $nome_dip = $res_nome_dipartimento->fetch_assoc();

        $nome_dipartimento = $nome_dip['Nome_dipartimento'];
//echo $nome_dipartimento."<br>";

////////////////////////Da Spostare in visualizza_piano_di_studi/////////////////////////////
        $livello = "";
        if ($offerta == 1 or $offerta == 2 or $offerta == 3) {
            $livello = "Triennio";
            $livello_testo = "Triennio";
            $testo_corso = " TRIENNALE DI PRIMO LIVELLO";
            $anni = 3;
        } else if ($offerta == 4 or $offerta == 5 or $offerta == 6) {
            $livello = "Biennio";
            $livello_testo = "Biennio";
            $testo_corso = " DI DIPLOMA ACCADEMICO DI II LIVELLO IN";
            $anni = 2;
        } else if ($offerta == 7) {
            $livello = "Ciclo_unico";
            $livello_testo = "Ciclo Unico";
            $testo_corso = "ciao";
            $anni = 5;
        }

//echo "livello:".$livello." anno:".$anni;
////////////////////////Da Spostare in visualizza_piano_di_studi/////////////////////////////

        $sql_id_offerta_formativa = "SELECT Id FROM offerta_formativa WHERE Id_dipartimento='" . $id_dipartimento . "' AND Nome='" . $livello . "'";


        ?>

        <!--########## Inizio SEZIONE 2-->
        <form action="#" method="post">
            <div class="row">
                <div class="form-group">
                    <table class="table table-curved">
                        <!-- <table class="table">							 -->
                        <tr>
                            <th class="title" colspan="9"
                                style="background-color:#FF3535; color:white; text-align:center">DIPARTIMENTO
                                DI <?php echo strtoupper($nome_dipartimento); ?></th>
                        </tr>
                        <tr>
                            <th class="title" colspan="9" style="text-align:center">
                                CORSO<?php echo $testo_corso; ?></th>
                        </tr>
                        <tr>
                            <th class="title" colspan="9"
                                style="background-color:#FF3535; color:white; text-align:center"><?php echo strtoupper($nome_corso); ?></th>
                        </tr>
                        <tr>
                            <th class="title" colspan="9" style="text-align:center">Piano di Studi Consigliato</th>
                        </tr>
                        <tr style="background-color:#FF3535; color:white;">
                            <th></th>
                            <th style="text-align:center;">Codice</th>
                            <th>Campo Disciplinare</th>
                            <th style="text-align:center">CFA</th>
                            <th>Data esame</th>
                            <th>Voto</th>
                            <th style="text-align:center;">
                                Opzioni
                            </th>
                            <th></th>
                        </tr>
                        <?php
                        $crediti_totali = 0;
                        for ($i = 1; $i <= $anni; ++$i) {
                            $Conta_attivita_base = 0;
                            $Conta_attivita_caratterizzante = 0;
                            $Conta_attivita_integrative = 0;
                            $Conta_attivita_obbligatorie = 0;
                            $crediti_anno = 0;
                            ?>
                            <tr>
                                <th colspan="9" style="background-color:#0393FC; color:white; text-align:center;">
                                    ANNO <?php echo $i; ?></th>
                            </tr>
                            <!-- <tr><th colspan="8" style="background-color:#0070c0; text-align:center;">Attività Formative di Base</th></tr> -->
                            <?php
                            $sql_carica_piani = "SELECT * FROM materie_piano WHERE Anno=" . $i . " AND Categoria='Base' AND Id_corso=" . $id_corso;
                            $res_piani = $connessione->query($sql_carica_piani);
                            $rowspan_base = mysqli_num_rows($res_piani);
//echo "num:".$rowspan_base;
                            while ($res = $res_piani->fetch_assoc()) {
                                $id_materia_in_piano = $res['Id'];
                                //$Id_corso=$res['Id_corso'];
                                $id_materia = $res['Id_materia'];
                                if ($res['Modulo'] != "0") {
                                    $modulo = $res['Modulo'];
                                } else {
                                    $modulo = " ";
                                }
                                $cfa = $res['Cfa'];
                                $tipo = $res['Tipologia'];
                                $ore = $res['Ore'];

                                $sql_carica_materia_e_settore = "SELECT Nome_materia, Id_settore FROM materie_anagrafica WHERE Id='" . $id_materia . "'";
                                $res_materia_corso_e_settore = $connessione->query($sql_carica_materia_e_settore);
                                //$res_materia=$res_materia_corso_e_settore->fetch_assoc();
                                while ($res = $res_materia_corso_e_settore->fetch_assoc()) {
                                    $nome_materia = $res['Nome_materia'];
                                    $id_settore = $res['Id_settore'];

                                    $sql_nome_settore_e_codice = "SELECT Codice, Settore FROM settore WHERE Id=" . $id_settore;
                                    $res_nec_settore = $connessione->query($sql_nome_settore_e_codice);
                                    while ($res = $res_nec_settore->fetch_assoc()) {
                                        $crediti_anno += $cfa;
                                        $codice_settore = $res['Codice'];
                                        $nome_settore = $res['Settore'];
                                        ?>
                                        <tr>
                                        <?php
                                        if ($Conta_attivita_base == 0) {
                                            echo "<th rowspan=" . $rowspan_base . " style=\"background-color:#93C9FF; vertical-align:middle; text-align:center;\">Attività Formative di Base</th>";
                                            $Conta_attivita_base = 1;
                                        }
                                        //if($Conta_attivita_base==0){echo "<th rowspan=".$rowspan_base." style=\"vertical-align:middle; text-align:center;\">Attività Formative di Base</th>"; $Conta_attivita_base=1;}
                                        $stringasql="SELECT * FROM materie_studenti WHERE Id_studente =".$utente->id." AND Id_materia = ".$id_materia."";
                                        $elencoEsami=$connessione->query($stringasql);
                                        $voto ="";
                                        $data ="";
                                        while($res=$elencoEsami->fetch_assoc()){
                                           $passato = 1;
                                           $voto = $res['Voto'];
                                           $data = $res['Data'];
                                           $tot_crediti = $tot_crediti + $cfa;
                                       }

                                        ?>

                                        <td style="text-align:center;"><?php echo $codice_settore; ?></td>
                                        <td><?php echo $nome_materia . " " . $modulo; ?></td>
                                        <td style="text-align:center"><?php echo $cfa; ?></td>
                                        <td><?php echo $data ?></td>
                                        <td><?php echo $voto ?></td>
                                        <td style="text-align:center">
                                            -
                                        </td>
                                    <?php }
                                }
                            } ?>
                            </tr>
                            <!-- <tr><th colspan="8" style="background-color:#ffff00;text-align:center;">Attività Formative Caratterizzanti</th></tr> -->
                            <?php
                            $sql_carica_piani = "SELECT * FROM materie_piano WHERE Anno=" . $i . " AND Categoria='Caratterizzante' AND Id_corso=" . $id_corso;
                            $res_piani = $connessione->query($sql_carica_piani);
                            $rowspan_caratterizzante = mysqli_num_rows($res_piani);
//echo "num:".$rowspan_caratterizzante;
                            while ($res = $res_piani->fetch_assoc()) {
                                $id_materia_in_piano = $res['Id'];
                                $id_materia = $res['Id_materia'];
                                if ($res['Modulo'] != "0") {
                                    $modulo = $res['Modulo'];
                                } else {
                                    $modulo = " ";
                                }
                                $cfa = $res['Cfa'];
                                $tipo = $res['Tipologia'];
                                $ore = $res['Ore'];

                                $sql_carica_materia_e_settore = "SELECT Nome_materia, Id_settore FROM materie_anagrafica WHERE Id='" . $id_materia . "'";
                                $res_materia_corso_e_settore = $connessione->query($sql_carica_materia_e_settore);
                                //$res_materia=$res_materia_corso_e_settore->fetch_assoc();
                                while ($res = $res_materia_corso_e_settore->fetch_assoc()) {
                                    $nome_materia = $res['Nome_materia'];
                                    $id_settore = $res['Id_settore'];

                                    $sql_nome_settore_e_codice = "SELECT Codice, Settore FROM settore WHERE Id=" . $id_settore;
                                    $res_nec_settore = $connessione->query($sql_nome_settore_e_codice);
                                    while ($res = $res_nec_settore->fetch_assoc()) {
                                        $crediti_anno += $cfa;
                                        $codice_settore = $res['Codice'];
                                        $nome_settore = $res['Settore'];
                                        ?>
                                        <tr>
                                        <?php
                                        if ($Conta_attivita_caratterizzante == 0) {
                                            echo "<th rowspan=" . $rowspan_caratterizzante . " style=\"background-color:#FFFF78; vertical-align:middle; text-align:center;\">Attività Formative Caratterizzanti</th>";
                                            $Conta_attivita_caratterizzante = 1;
                                        }
                                      //if($Conta_attivita_caratterizzante==0){echo "<th rowspan=".$rowspan_caratterizzante." style=\"vertical-align:middle; text-align:center;\">Attività Formative Caratterizzanti</th>"; $Conta_attivita_caratterizzante=1;}
                                      $stringasql="SELECT * FROM materie_studenti WHERE Id_studente =".$utente->id." AND Id_materia = ".$id_materia."";
                                      $elencoEsami=$connessione->query($stringasql);
                                      $voto = "";
                                      $data = "";
                                      while($res=$elencoEsami->fetch_assoc()){
                                         $passato = 1;
                                         $voto = $res['Voto'];
                                         $data = $res['Data'];
                                         $tot_crediti = $tot_crediti + $cfa;
                                      }

                                      ?>

                                      <td style="text-align:center;"><?php echo $codice_settore; ?></td>
                                      <td><?php echo $nome_materia . " " . $modulo; ?></td>
                                      <td style="text-align:center"><?php echo $cfa; ?></td>
                                      <td><?php echo $data ?></td>
                                      <td><?php echo $voto ?></td>
                                      <td style="text-align:center">
                                          -
                                      </td><?php }
                                }
                            } ?>
                            </tr>
                            <!-- <tr><th colspan="8" style="background-color:#ff99ff;text-align:center;">Attività Formative Integrative o Affini</th></tr> -->
                            <?php
                            $sql_carica_piani = "SELECT * FROM materie_piano WHERE Anno=" . $i . " AND Categoria='Integrativa' AND Id_corso=" . $id_corso;
                            $res_piani = $connessione->query($sql_carica_piani);
                            $rowspan_integrativa = mysqli_num_rows($res_piani);
//echo "num:".$rowspan_integrativa;
                            while ($res = $res_piani->fetch_assoc()) {
                                $id_materia_in_piano = $res['Id'];
                                $id_materia = $res['Id_materia'];
                                //controlla se lo studente abbia modificato la materia scelta
                                $sql_controllo_materie_scelta = "SELECT * FROM materie_scelta WHERE Id_materia_piano_orig = ".$id_materia_in_piano." AND Id_studente = ".$utente->id."";
                                $res_controllo = $connessione->query($sql_controllo_materie_scelta);
                                $numero_righe = mysqli_num_rows($res_controllo);

                                if ($res['Modulo'] != "0") {
                                    $modulo = $res['Modulo'];
                                } else {
                                    $modulo = " ";
                                }
                                if($numero_righe > 0){
                                    $res_controllo_risultato = $res_controllo->fetch_assoc();
                                    $cfa = $res_controllo_risultato['Crediti'];
                                    $tipo = $res['Tipologia'];
                                    $ore = $res_controllo_risultato['Crediti'] * 24;
                                    $id_materia = $res_controllo_risultato['Id_materia_sostitutiva'];
                                }else{
                                    $cfa = $res['Cfa'];
                                    $tipo = $res['Tipologia'];
                                    $ore = $res['Ore'];
                                }


                                $sql_carica_materia_e_settore = "SELECT Nome_materia, Id_settore FROM materie_anagrafica WHERE Id='" . $id_materia . "'";
                                $res_materia_corso_e_settore = $connessione->query($sql_carica_materia_e_settore);
                                //$res_materia=$res_materia_corso_e_settore->fetch_assoc();
                                while ($res = $res_materia_corso_e_settore->fetch_assoc()) {
                                    $nome_materia = $res['Nome_materia'];
                                    $id_settore = $res['Id_settore'];

                                    $sql_nome_settore_e_codice = "SELECT Codice, Settore FROM settore WHERE Id=" . $id_settore;
                                    $res_nec_settore = $connessione->query($sql_nome_settore_e_codice);
                                    while ($res = $res_nec_settore->fetch_assoc()) {
                                        $crediti_anno += $cfa;
                                        $codice_settore = $res['Codice'];
                                        $nome_settore = $res['Settore'];
                                        ?>
                                        <tr>
                                        <?php
                                        if ($Conta_attivita_integrative == 0) {
                                            echo "<th rowspan=" . $rowspan_integrativa . " style=\"background-color:#ff99ff; vertical-align:middle; text-align:center;\">Attività Formative Integrative o Affini</th>";
                                            $Conta_attivita_integrative = 1;
                                        }
                                        //if($Conta_attivita_integrative==0){echo "<th rowspan=".$rowspan_integrativa." style=\"vertical-align:middle; text-align:center;\">Attività Formative Integrative o Affini</th>"; $Conta_attivita_integrative=1;}
                                        $stringasql="SELECT * FROM materie_studenti WHERE Id_studente =".$utente->id." AND Id_materia = ".$id_materia."";
                                        $elencoEsami=$connessione->query($stringasql);
                                        $voto = "";
                                        $data = "";
                                        while($res=$elencoEsami->fetch_assoc()){
                                        $passato = 1;
                                        $voto = $res['Voto'];
                                        $data = $res['Data'];
                                        $tot_crediti = $tot_crediti + $cfa;
                                        }

                                        ?>

<td style="text-align:center;"><?php echo $codice_settore; ?></td>
<td><?php echo $nome_materia . " " . $modulo; ?></td>
<td style="text-align:center"><?php echo $cfa; ?></td>
<td><?php echo $data ?></td>
<td><?php echo $voto ?></td>
<td style="text-align:center">
        <?php
            if($voto<=0){
                echo('<a href="studenti_modifica_piano_studi.php?id_materia='.$id_materia_in_piano.'&nome_materia='.$nome_materia.' '.$modulo.'" class="btn btn-default">Richiedi <br /> cambio materia </a>');
            }
         ?>

    </td><?php }
                                }
                            } ?>
                            </tr>
                            <!--Inserire qui attività obbligatorie per il secondo anno -->
                            <?php
                            $sql_esistenza_obbligatorie = "SELECT * FROM materie_piano WHERE Anno=" . $i . " AND Categoria='Obbligatoria' AND Id_corso=" . $id_corso;
                            $res_obbligatorie = $connessione->query($sql_esistenza_obbligatorie);
                            $rowspan_obbligatorie = mysqli_num_rows($res_obbligatorie);
//echo "row span obb: ".$rowspan_obbligatorie;
                            $res = $res_obbligatorie->fetch_assoc();
                            if ($res != false) {
                                //echo "<tr><th colspan=\"8\" style=\"background-color:orange;text-align:center;\">Attività Formative Obbligatorie</th></tr>";
                                $sql_carica_piani = "SELECT * FROM materie_piano WHERE Anno=" . $i . " AND Categoria='Obbligatoria' AND Id_corso=" . $id_corso;
                                $res_piani = $connessione->query($sql_carica_piani);
                                while ($res = $res_piani->fetch_assoc()) {
                                    $id_materia_in_piano = $res['Id'];
                                    $id_materia = $res['Id_materia'];
                                    if ($res['Modulo'] != "0") {
                                        $modulo = $res['Modulo'];
                                    } else {
                                        $modulo = " ";
                                    }
                                    $cfa = $res['Cfa'];
                                    $tipo = $res['Tipologia'];
                                    $ore = $res['Ore'];

                                    $sql_carica_materia_e_settore = "SELECT Nome_materia, Id_settore FROM materie_anagrafica WHERE Id='" . $id_materia . "'";
                                    $res_materia_corso_e_settore = $connessione->query($sql_carica_materia_e_settore);
                                    //$res_materia=$res_materia_corso_e_settore->fetch_assoc();
                                    while ($res = $res_materia_corso_e_settore->fetch_assoc()) {
                                        $crediti_anno += $cfa;
                                        $nome_materia = $res['Nome_materia'];
                                        $id_settore = $res['Id_settore'];

                                        $sql_nome_settore_e_codice = "SELECT Codice, Settore FROM settore WHERE Id=" . $id_settore;
                                        $res_nec_settore = $connessione->query($sql_nome_settore_e_codice);
                                        while ($res = $res_nec_settore->fetch_assoc()) {
                                            $codice_settore = $res['Codice'];
                                            $nome_settore = $res['Settore'];
                                            //Parte della tabella che riguarda le "Attività Formative Obbligatorie"
                                            echo "<tr>";


                                            if ($Conta_attivita_obbligatorie == 0) {
                                                echo "<th rowspan=" . $rowspan_obbligatorie . " style=\"background-color:#FFB464; vertical-align:middle; text-align:center;\">Attività Formative Obbligatorie</th>";
                                                $Conta_attivita_obbligatorie = 1;
                                            }
//if($Conta_attivita_obbligatorie==0){echo "<th rowspan=".$rowspan_obbligatorie." style=\"vertical-align:middle; text-align:center;\">Attività Formative Obbligatorie</th>"; $Conta_attivita_obbligatorie=1;}

                                            echo "<td style=\"text-align:center;\">" . $codice_settore . "</td><td>" . $nome_settore . "</td>";
                                            echo "<td>" . $nome_materia . " " . $modulo . "</td><td style=\"text-align:center\">" . $ore . "</td>";
                                            echo "<td style=\"text-align:center\">" . $cfa . "</td><td style=\"text-align:center\">" . $tipo . "</td>";
                                            echo "<td><!--<a>Modifica</a>--></td>";
                                            echo "<td><a href=\"admin_modifica_piano_di_studi_elimina_materia_query.php?Id=" . $id_materia_in_piano . "\">Elimina</a></td>";
                                            echo "</tr>";
                                        }
                                    }
                                }
                            }
                            ?>
                            <tr class="crediti">
                                <td></td>
                                <td></td>
                                <td></td>
                                <th style="background-color:#55FD51; text-align:right">Crediti acquisiti</th>
                                <td style="background-color:#55FD51;"></td>
                                <th style="background-color:#55FD51; text-align:center"> <?php echo($tot_crediti);?>/<?php $crediti_totali += $crediti_anno;
                                    echo $crediti_anno; ?></th>
                                <td colspan="3" style="background-color:#55FD51;"></td>
                            </tr>


                            <?php
                            $tot_crediti = 0;
                        }//Chiusura ciclo for "anni"
                        ?>
                        <tr class="crediti_totali">
                            <td></td>
                            <th colspan="3" style="background-color:#55FD51; text-align:right">Totale Crediti Formativi
                                previsti nel <?php echo $livello_testo; ?></th>
                            <td style="background-color:#55FD51;"></td>
                            <th style="background-color:#55FD51; text-align:center"><?php echo $crediti_totali; ?></th>
                            <td colspan="3" style="background-color:#55FD51; text-align:center"></td>
                        </tr>
                    </table>
                </div>
            </div>
        </form>
    <?php } ?>
</div>

<?php @include_once 'shared/footer.php'; ?>
</body>
</html>
