<?php @include_once 'shared/menu.php';
if ($_SESSION['materia'] === 1) {
    echo "<div style=\"width:100%;color:green;text-align:center;font-weight:bold;border-style:solid;border-width:2px;border-color:green;background-color:#81F79F;\">Modifica effettuata correttamente</div>";
    $_SESSION['materia'] = 0;
}

//qui estraggo le info riguardo il professore scelto e la sua materia/materie
$idDocente = $_POST["id-docente"];


?>
<html>
<head>

    <?php @include_once 'shared/head_inclusions.php'; ?>

</head>
<body>
<!-- INIZIO CARICAMENTO MENU -->
<?php
menu();
?>
<!-- FINE MENU -->

<div class="container">

    <b>Benvenuto <?php echo $utente->nome; ?>!</b>

    <div id="avvisi">
        <h1>Cambia docente alle materie</h1>
        <?php

        //echo "ID Docente: ".$idDocente."<br>";
        $sqlNomeCognome = "SELECT Id, Nome, Cognome FROM anagrafe WHERE Id='" . $idDocente . "'";
        //echo "Query: ".$sqlNomeCognome;
        $result = $connessione->query($sqlNomeCognome);
        if (!$result) {
            $message = 'Invalid query: ' . mysql_error() . "\n";
            $message .= 'Whole query: ' . $sqlNomeCognome;
            die($message);
        }
        while ($row = $result->fetch_assoc()) {
        ?>
        <p><b><a href="admin_imposta_materia_docenti.php" class="btn btn-default">&lt;&lt; Torna indietro</a></b></p>
        <p>Ecco i dettagli del professor: <?php echo $row["Cognome"] . " " . $row["Nome"]; ?></p>
        <form method="post" action="admin_cambia_materia_query.php">
            <!--label>ID Professore:</label-->
            <div class="row">
                <input type="text" value="<?php echo $row['Id'];
                }
                $result->free(); ?>" name="id-docente" hidden/>
                <div class="col-md-3">
                    <label>Materie:</label>
                </div>

                <div class="col-md-6">
                    <select class="form-control" name="materia">
                        <?php
                        $materiePresenti = 0;
                        $sqlMateriaDocente = "SELECT Id, Nome_materia	FROM materie_anagrafica";
                        $res = $connessione->query($sqlMateriaDocente);
                        while ($resMateriaDocente = $res->fetch_assoc()) {
                            $materiePresenti = 1;//per identificare se nella listbox deve comparire la frase "nessuna materia presente"
                            echo '<option value="' . $resMateriaDocente["Id"] . '">' . $resMateriaDocente["Nome_materia"] . '</option>';
                        }
                        if ($materiePresenti == 0) {
                            echo '<option value="nessuna-materia">Nessuna materia per questo prof.</option>';
                        }
                        ?>

                    </select>
                </div>
                <div class="col-md-3">
                    <button class="btn btn-info">Aggiungi materia al docente</button>
                </div>
            </div>
        </form>
    </div>

    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <table class="table table-striped">
                <tr>
                    <th>Nome materia</th>
                    <th>Opzioni</th>
                </tr>
                <?php
                //prendo tutte le materie che insegna il prof
                $sql_IdMaterieDelProf = "SELECT ma.Nome_materia, md.Id
                    FROM materia_docente md, materie_anagrafica ma
                    WHERE md.Id_docente=" . $idDocente . " AND ma.Id=md.Id_materia_anagrafica";
                $sql_IdMaterieDelProf_res = $connessione->query($sql_IdMaterieDelProf);
                while ($resNomeMateria = $sql_IdMaterieDelProf_res->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><?php echo $resNomeMateria['Nome_materia']; ?></td>
                        <td><a class="btn btn-danger" href="admin_imposta_materia_docenti_cancella.php?Id=<?php echo $resNomeMateria['Id']; ?>">Scollega</a>

                        </td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>

<?php @include_once 'shared/footer.php'; ?>
</body>

</html>
