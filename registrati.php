<?php
@session_start();
@include_once 'utente_loggato.php';
@include_once 'dbconnection.php';

if (isset ($_SESSION['iscritto-aggiunto'])) {
    if ($_SESSION['iscritto-aggiunto'] == 1) {
        echo "La richiesta di iscrizione è stata inoltrata alla segreteria dell'Accademia";
        $_SESSION['iscritto-aggiunto'] = 0;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <?php @include_once 'shared/head_inclusions.php'; ?>

    <script src='https://www.google.com/recaptcha/api.js'></script>

</head>
<body>


<!-- start header -->
<header>
    <div class="navbar navbar-default navbar-static-top">
        <div class="container">
            <a href="index.php">
                <div class="navbar-header">
                    <img src="img/logo.png" alt=""/>
                </div>
            </a>
        </div>
</header>
<!-- end header -->
<!-- start slider -->
<div class="container">
    <div class="col-md-3"></div>

    <div class="col-md-6">
        <!-- <a href="index.html"><img src="img/logo.png" height="20%" alt="" ></a>-->
        <div class="row form-group">
            <p><a href="index.php"><b>&lt;&lt; Torna alla pagina di Login</b></a></p>
        </div>
        <section class="loginform cf" style="float:left;">
            <form name="register" action="registrati_query.php" method="post" accept-charset="utf-8">
                <div class="row form-group">
                    <h2>Registrati</h2>
                </div>
                <div class="row form-group">
                    <label>Nome: &nbsp; </label>
                    <input type="text" class="form-control" name="nome" required>
                </div> <!-- /row form-group (1) -->

                <div class="row form-group">
                    <label>Cognome: &nbsp;</label>
                    <input type="text" class="form-control" name="cognome" required>
                </div> <!-- /row form-group (2) -->

                <div class="row form-group">
                    <label>Data di nascita: &nbsp; </label>
                    <div class="form-inline">
                        <select class="form-control" name="giorno-nascita">
                            <?php
                            for ($i = 1; $i < 32; $i++) {
                                echo '<option value="' . $i . '">' . $i . '</option>';
                            }//è possibile inserire date sbagliate es: '31/Febbraio/..'
                            ?>
                        </select>
                        <select class="form-control" name="mese-nascita">
                            <option value="01">Gennaio</option>
                            <option value="02">Febbraio</option>
                            <option value="03">Marzo</option>
                            <option value="04">Aprile</option>
                            <option value="05">Maggio</option>
                            <option value="06">Giugno</option>
                            <option value="07">Luglio</option>
                            <option value="08">Agosto</option>
                            <option value="09">Settembre</option>
                            <option value="10">Ottobre</option>
                            <option value="11">Novembre</option>
                            <option value="12">Dicembre</option>
                        </select>
                        <select class="form-control" name="anno-nascita">
                            <?php
                            $anno = date("Y");
                            for ($i = $anno; $i >= $anno - 120; $i--) {
                                echo '<option value="' . $i . '">' . $i . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div> <!-- /row form-group (3) -->


                <div class="row form-group">
                    <label>E-mail: &nbsp;</label>
                    <input type="text" class="form-control" name="email" required>
                </div> <!-- /row form-group (4) -->

                <div class="row form-group">
                    <label>Codice fiscale: &nbsp; </label>
                    <input type="text" class="form-control" name="cf" required>
                </div> <!-- /row form-group (5) -->

                <div class="row form-group">
                    <label>Indirizzo: &nbsp; </label>
                    <input type="text" class="form-control" name="indirizzo" required>
                </div> <!-- /row form-group (6) -->

                <div class="row form-group">
                    <label>Residenza: &nbsp;</label></td>
                    <input type="text" class="form-control" name="residenza" required>
                </div> <!-- /row form-group (7) -->

                <div class="row form-group">
                    <label>Telefono: &nbsp;</label>
                    <input type="text" class="form-control" name="telefono" required>
                </div> <!-- /row form-group (8) -->

                <div class="row form-group">
                    <label>Password: &nbsp;</label>
                    <input type="password" class="form-control" name="password" required>
                </div> <!-- /row form-group (9) -->

                <div class="row form-group">
                    <label>Scegli domanda di recupero: &nbsp;</label>
                    <select id="domanda" name="domanda" class="form-control">
                        <option value="Nome di un tuo parente">Nome di un tuo parente</option>
                        <option value="Nome del tuo posto preferito">Nome del tuo posto preferito</option>
                        <option value="Nome di un oggetto a te caro">Nome di un oggetto a te caro</option>
                    </select>
                </div> <!-- /row form-group (10) -->

                <div class="row form-group">
                    <label>Risposta di recupero: &nbsp;</label>
                    <input name="risposta" type="text" class="form-control">
                </div> <!-- /row form-group (11) -->
                <div class="row form-group">
                    <div class="g-recaptcha" data-sitekey="6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI"></div>
                </div>
                <div class="row form-group">
                    <input type="submit" class="btn btn-info" value="Registrati">
                </div> <!-- /row form-group (12) -->
            </form>
        </section>
    </div>

    <div class="col-md-3"></div>
</div>

<!-- javascript ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<!-- <script src="js/jquery.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.fancybox.pack.js"></script>
<script src="js/jquery.fancybox-media.js"></script>
<script src="js/google-code-prettify/prettify.js"></script>
<script src="js/portfolio/jquery.quicksand.js"></script>
<script src="js/portfolio/setting.js"></script>
<script src="js/jquery.flexslider.js"></script>
<script src="js/animate.js"></script>
<script src="js/custom.js"></script> -->
<?php @include_once 'shared/footer.php'; ?>
</body>
</html>
