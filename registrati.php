<?php
@session_start();
@include_once 'utente_loggato.php';
@include_once 'dbconnection.php';


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
					<div class="row">
						<div class="col-md-2">
							<a href="index.php">
	                <div class="navbar-header">
	                    <img class="img-responsive" src="img/logo.png" alt=""/>
	                </div>
	            </a>
						</div>
						<div class="col-md-10">

						</div>
					</div>
        </div>
</header>
<!-- end header -->
<!-- start slider -->


    <div class="container">
        <!-- <a href="index.html"><img src="img/logo.png" height="20%" alt="" ></a>-->
        <div class="page-header">
            <p><a href="index.php"><b>&lt;&lt; Torna alla pagina di Login</b></a></p>
        </div>
        <section class="loginform cf">
            <form name="register" action="registrati_query.php" method="post" accept-charset="utf-8">
                <div class="page-header">
                    <h2>Registrati</h2>
                </div>
                <div class="row form-group">
				<div class="col-md-4">
                    <label>Nome: &nbsp; </label>
                    <input type="text" class="form-control" name="nome" required>
               </div>
			   <div class="col-md-4">
                    <label>Cognome: &nbsp;</label>
                    <input type="text" class="form-control" name="cognome" required>
             </div>
			 <div class="col-md-4">
						<label for="usermail">Data Nascita:</label>
						<div class="form-inline">
							<select class="form-control"  name="giorno-nascita">
								<?php
								for ($i=1; $i < 32; $i++) {
									echo '<option value="'.$i.'">'.$i.'</option>';
								 }
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
									$anno=date("Y");
									for ($i=1950; $i < $anno; $i++) {
										echo '<option value="'.$i.'">'.$i.'</option>';
									 }
								?>
							</select>
						</div>
					</div>

			  </div>


                <div class="row form-group">
				<div class="col-md-4">
                    <label>E-mail: &nbsp;</label>
                    <input type="email" class="form-control" name="email" required>
					</div>


               <div class="col-md-4">
                    <label>Codice fiscale: &nbsp; </label>
                    <input type="text" class="form-control" name="cf" required>
					</div>

				<div class="col-md-4">
                    <label>Indirizzo: &nbsp; </label>
                    <input type="text" class="form-control" name="indirizzo" required>
					</div>
                </div> <!-- /row form-group (6) -->

				                <div class="row form-group">
                <div class="col-md-4">
                    <label>Città: &nbsp;</label></td>
                    <input type="text" class="form-control" name="residenza" required>
                </div> <!-- /row form-group (7) -->

                <div class="col-md-4">
                    <label>Telefono: &nbsp;</label>
                    <input type="text" class="form-control" name="telefono" required>
                </div> <!-- /row form-group (8) -->

                <div class="col-md-4">
                    <label>Password: &nbsp;</label>
                    <input type="password" class="form-control" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="minimo 8 caratteri di cui almeno una lettera Maiscuola, una lettera minuscola e un numero" required>
                </div> <!-- /row form-group (9) -->
				</div>

                <div class="row form-group">
				<div class="col-md-4">
                    <label>Scegli domanda di recupero: &nbsp;</label>
                    <select id="domanda" name="domanda" class="form-control">
                        <option value="Nome di un tuo parente">Nome di un tuo parente</option>
                        <option value="Nome del tuo posto preferito">Nome del tuo posto preferito</option>
                        <option value="Nome di un oggetto a te caro">Nome di un oggetto a te caro</option>
                    </select>
                </div>

                <div class="col-md-4">
                     <label>Risposta di recupero: &nbsp;</label>
                    <input name="risposta" type="text" class="form-control">

                </div>
					<div class="col-md-4">
                    <?php include("recaptcha.php"); ?>
                </div>

				</div>
           <div class="row form-group pull-right">
					<div class="col-md-12">
						<input type="checkbox" required />
						<label>Ho letto <a href="https://www.accademiadibelleartikandinskij.it/privacy/" target="_blank">l'informativa sulla privacy</a> e autorizzo il trattamento dei miei dati personali per le finalità ivi indicate.</label>

								  <label> &nbsp; </label>
                  <input type="submit" class="btn btn-info" color="blue" id="bottone_conferma" value="Registrati" disabled>
          </div>


				</div>
				</div>
            </form>
        </section>
    </div>

    <div class="col-md-3"></div>
</div>

<script>
function recaptchaCallback() {
		var captchResponse = $('#g-recaptcha-response').val();
		if (captchResponse == "") {
				$("#bottone_conferma").prop("disabled",true);
		}
		else {
			$("#bottone_conferma").prop("disabled",false);
		}

};
</script>
<?php @include_once 'shared/footer.php'; ?>
</body>
</html>
