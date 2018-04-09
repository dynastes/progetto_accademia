<?php @include_once 'shared/menu.php';
if (isset($_SESSION['modifica-orario'])) {
    if ($_SESSION['modifica-orario'] === 1) {
        echo "<div style=\"width:100%;color:green;text-align:center;font-weight:bold;border-style:solid;border-width:2px;border-color:green;background-color:#81F79F;\">Modifica effettuata correttamente</div>";
        $_SESSION['modifica-orario'] = 0;


    }
}
?>
<html>
<head>
    <?php @include_once 'shared/head_inclusions.php'; ?>
    <?php @include_once 'shared/head_fullcalendar_inclusions.php'; ?>
    <?php @include_once 'shared/calendar_inclusion.php'; ?>
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
        <br/>
        <h1>Mostra/inserisci eventi al calendario</h1>
        <br/>
        <p>* Clicca nel calendario per inserire un nuovo evento</p>
        <p>* Fai doppio click su un evento del calendario per cancellarlo</p>

        <label>Scegli il colore con cui evidenziare l'evento che vuoi aggiungere:</label>
        <select id="colore_evento">
            <option value="red" style="background-color:red;color: white;">Rosso</option>
            <option value="blue" style="background-color:blue; color: white;">Blu</option>
            <option value="orange" style="background-color:orange;color: white;">Arancione</option>
            <option value="yellow" style="background-color:yellow;color: black;">Giallo</option>
            <option value="green" style="background-color:green;color: white;">Verde</option>
            <option value="grey" style="background-color:grey;color: white;">Grigio</option>
            <option value="black" style="background-color:black;color: white;">Nero</option>
        </select>
        <br>
        <label>Scegli il colore del testo dell'evento che vuoi aggiungiere </label>
        <select id="colore_testo">
            <option value="white" style="background-color:grey;color: white;">Bianco</option>
            <option value="black" style="background-color:grey; color: black;">Nero</option>
        </select>
    </div>
	<br>
    <div class="row">
        <div class="col-md-12">
            <div id="calendar" style="margin-bottom:50px;"></div>
        </div>
    </div>

</div>
<!-- INIZIO FOOTER -->
<?php @include_once 'shared/footer.php'; ?>
</body>
</html>
