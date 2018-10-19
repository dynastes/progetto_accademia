<?php @include_once 'shared/menu.php'; ?>
<?php
if(isset($_SESSION['profilo_modificato'])){
    echo "<div style=\"width:100%;background-color:green;text-align:center;\"><b>Profilo modificato con successo</b></div>";
    unset($_SESSION['profilo_modificato']);
} ?>
<html>
<head>
    <?php @include_once 'shared/head_inclusions.php'; ?>
    <meta charset="utf-8">
</head>
<body>
    <?php

     ?>
<div id="principale">
    <div id="menu">
        <?php
        menu();
        ?>
    </div> <!-- FINE MENU -->

    <div class="container">

        <div class="row"> <!--page-header-->
            <!--<div class="col-md-1 col-xs-2">
                <div class="thumbnail">
                    <div class="glyphicon glyphicon-user"></div>
                </div>

            </div>-->

            <div class="col-md-11 col-xs-10">
                <h1><?= profilo ?></h1>
            </div>
        </div>
        <hr>

        <?php
        /* Da qui in poi si calcola quanti elementi del profilo dell'utente non sono ancora stati completati.
        Gli elementi da visualizzare sono:
            1. Nome
            2. Cognome
            3. Data di Nascita
            4. email
            5. Codice Fiscale
            6. Indirizzo
            7. Residenza
            8. Telefono
             */
        $dettagli_completati=0;
        if ($utente->nome!=''){
            $dettagli_completati++;
        }
        if ($utente->cognome!=''){
            $dettagli_completati++;
        }
        if ($utente->email!=''){
            $dettagli_completati++;
        }
        if ($utente->cf!=''){
            $dettagli_completati++;
        }
        if ($utente->indirizzo!=''){
            $dettagli_completati++;
        }
        if ($utente->residenza!=''){
            $dettagli_completati++;
        }
        if ($utente->telefono!=''){
            $dettagli_completati++;
        }

        //Ora calcolo la percentuale di completamento del profilo:
        $perc_compl=round(100*$dettagli_completati/7);


        ?>


        <div class="row">
            <div class="col-lg-12">

                <!--<ul class="pager">
                    <li class="previous"><a href="#"><span aria-hidden="true">&larr;</span> Pagina precedente</a></li>
                    <li class="next"><a href="#">Pagina successiva <span aria-hidden="true">&rarr;</span></a></li>
                </ul>-->


                <?php
                if ($perc_compl<100) {
                    ?>
                    <div class="row">
                        <div class="alert alert-danger" role="alert">
                            <p>Il tuo profilo <b>non è ancora completo</b>. Ti chiediamo gentilmente di aggiungere i
                                dati
                                mancanti</p>
                            <br>
                            <div class="progress">
                                <div class="progress-bar progress-bar-danger progress-bar-striped" role="progressbar"
                                     aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"
                                     style="width: <?php echo $perc_compl ?>%">
                                    <?php echo $perc_compl ?>%
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                }
                ?>

                <!--<div class="row">-->
                <!-- INIZIO TABELLA -->
                    <div class="panel panel-default">
                        <div class="panel-heading"><?= dati_personali ?></div>
                        <div class="panel-body">
                            <table class="table table-responsive">
                                <tr>
                                    <td><b><?= nome ?></b></td>
                                    <td><?php echo $utente->nome; ?></td>
                                    <td>
                                        <a href="profilo_modifica.php?data_type=nome&value=<?php echo $utente->nome; ?>" type="button" class="btn btn-default btn-info btn-xs">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> <?= modifica ?>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td><b><?= cognome ?></b></td>
                                    <td><?php echo $utente->cognome; ?></td>
                                    <td>
                                        <a href="profilo_modifica.php?data_type=cognome&value=<?php echo $utente->cognome; ?>" type="button" class="btn btn-default btn-info btn-xs">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> <?= modifica ?>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td><b><?= email ?></b></td>
                                    <td><?php echo $utente->email; ?></td>
                                    <td>
                                        <a href="profilo_modifica.php?data_type=email&value=<?php echo $utente->email; ?>" type="button" class="btn btn-default btn-info btn-xs">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> <?= modifica ?>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td><b><?=codice_fiscale ?></b></td>
                                    <td><?php echo $utente->cf; ?></td>
                                    <td>
                                        <a href="profilo_modifica.php?data_type=cf&value=<?php echo $utente->cf; ?>" type="button" class="btn btn-default btn-info btn-xs">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> <?= modifica ?>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td><b><?= indirizzo ?></b></td>
                                    <td><?php echo $utente->indirizzo; ?></td>
                                    <td>
                                        <a href="profilo_modifica.php?data_type=indirizzo&value=<?php echo $utente->indirizzo; ?>" type="button" class="btn btn-default btn-info btn-xs">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> <?= modifica ?>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td><b><?= residenza ?></b></td>
                                    <td><?php echo $utente->residenza; ?></td>
                                    <td>
                                        <a href="profilo_modifica.php?data_type=residenza&value=<?php echo $utente->residenza; ?>" type="button" class="btn btn-default btn-info btn-xs">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> <?= modifica ?>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td><b><?= telefono ?></b></td>
                                    <td><?php echo $utente->telefono; ?></td>
                                    <td>
                                        <a href="profilo_modifica.php?data_type=telefono&value=<?php echo $utente->telefono; ?>" type="button" class="btn btn-default btn-info btn-xs">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> <?= modifica ?>
                                        </a>
                                    </td>
                                </tr>
                                <!--<tr>
                                    <td><b>Ruolo</b></td>
                                    <td><?php /*echo $utente->ruolo; */?></td>
                                    <td>
                                        <a href=#" type="button" class="btn btn-default btn-info btn-xs">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Modifica
                                        </button>
                                    </td>
                                </tr>-->
                            </table>
                        </div>
                    </div>
                <!--</div>-->

            </div>
        </div>


    </div>

</div>
<br><br>
<?php @include_once 'shared/footer.php'; ?>
</body>
</html>
