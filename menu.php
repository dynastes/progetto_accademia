<?php
@session_start();
@include_once 'utente_loggato.php';
@include_once 'dbconnection.php';
if(!isset($_SESSION['login'])){
		@header("location:index.php");
	} else {
		$utente=$_SESSION['ut'];
		$utente=unserialize($utente);
}

function menu(){
	if(!isset($_SESSION['login'])){
		@header("location:index.php");
	} else {
		$utente=$_SESSION['ut'];
		$utente=unserialize($utente);
		//identificazione dell'utente connesso e attribuzione del giusto menù ad esso
		//admin, studente, docente
		if($utente->get_ruolo()=="studente"){
			$menu='<ul class="nav site-nav" >
			<li><a href="studenti_home.php">Home</a><!-- * --></li>
			<li><a href="#">Profilo</a><!-- * --></li>
			<li class="flyout">
				<a href="#">Piano di studi</a>
				<!-- Flyout -->
				<ul class="flyout-content nav stacked" id="riquadro">
					<li class="over"><a href="studenti_visualizza_piano_studi.php">Visualizza piano di studi</a></li>
					<li  class="over"><a href="#">Gestisci materie integrative</a></li>
				</ul>
			</li>
			<li class="flyout">
				<a href="#">Documenti</a>
				<!-- Flyout -->
				<ul class="flyout-content nav stacked" id="riquadro">
					<li  class="over"><a href="studenti_visualizza_documenti.php">Visualizza documenti</a></li>
					<li  class="over"><a href="studenti_carica_documenti.php">Carica documenti</a></li>
				</ul>
			</li>
			<li><a href="studenti_richiedi_certificato.php">Richiedi Certificato</a><!-- * --></li>
			<li><a href="#">Contatti</a><!-- * --></li>
			<li><a href="logout.php">Disconnetti</a><!-- * --></li>
		</ul>';
		}
		if($utente->get_ruolo()=="docente"){
			$menu='<ul class="nav site-nav" >
				<li><a href="docenti_home.php">Home</a><!-- * --></li>
				<li><a href="docenti_profilo.php">Profilo</a><!-- * --></li>
				<li><a href="docenti_visualizza_orario_lezioni.php">Orario proprie lezioni</a></li>
				<li class="flyout">
					<a href="#">Programma</a>
					<!-- Flyout -->
					<ul class="flyout-content nav stacked" id="riquadro">
						<li class="over"><a href="docenti_visualizza_programma.php">Visualizza programma</a></li>
						<li  class="over"><a href="docenti_carica_programma.php">Carica programma</a></li>
					</ul>
				</li>
				<li class="flyout">
					<a href="#">Avvisi</a>
					<!-- Flyout -->
					<ul class="flyout-content nav stacked" id="riquadro">
						<li  class="over"><a href="docenti_visualizza_avvisi.php">Visualizza avvisi</a></li>
						<li  class="over"><a href="docenti_carica_avvisi.php">Carica avvisi</a></li>
					</ul>
				</li>
				<li><a href="#">Contatti</a><!-- * --></li>
				<li><a href="logout.php">Disconnetti</a><!-- * --></li>
			</ul>';
		}
		if($utente->get_ruolo()=="admin"){
			$menu='<ul class="nav site-nav" >
			<li><a href="admin_home.php">Home</a><!-- * --></li>
			<li><a href="admin_gestione_finanze.php">Gestione Finanze</a><!--(mostrare i pagamenti caricati dagli utenti tramite la loro pagina "Carica Documenti")--></li>
			<li class="flyout">
				<a href="admin_gestisci_docenti.php">Gestisci Docenti</a>
				<!-- Flyout -->
				<ul class="flyout-content nav stacked" id="riquadro">
					<li class="over"><a href="admin_inserisci_materia.php">Inserisci Materia</a></li>
					<li class="over"><a href="admin_cambia_materia_docenti.php">Imposta/cambia materia docenti</a></li>
					<li class="over"><a href="admin_imposta_orari_lezione.php">Imposta orari di lezione</a></li>
				</ul>
			</li>
			<li class="flyout">
				<a href="#">Gestisci Allievi</a>
				<!-- Flyout -->
				<ul class="flyout-content nav stacked" id="riquadro">
					<li  class="over"><a href="admin_trasforma_iscritto_in_studente.php">Trasforma iscritto in studente</a></li>
					<li  class="over"><a href="admin_visualizza_studenti.php">Visualizza tutti gli studenti</a></li>
				</ul>
			</li>
			<li><a href="admin_gestisci_certificati.php">Gestisci Certicifati</a><!-- (viene visualizzata la lsita di certificati richiesti dagli utenti e in attesa di essere creati/autorizzati) --></li>
			<li><a href="admin_richieste_protocolli.php">Richieste Protocolli</a></li> <!-- creare tabella che possa registrare i protocolli in entrata [richieste da parte degli studenti del foglio timbrato delle materie + protocolli generali al di fuori del sito gestionale che necessitano di registrazione] e in uscita [qualsiasi cosa esce dalla segreteria] -->
			<li><a href="logout.php">Disconnetti</a><!-- * --></li>
		</ul>';
	}
	echo $menu;
	}
}
?>


