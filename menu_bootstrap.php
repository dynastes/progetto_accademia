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

		$nav='<nav class="navbar navbar-default">
		<div class="container-fluid">
		<div class="navbar-header">
		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        </button>
        <img src="img/logo.png" width="30%">
        </div>';


		//identificazione dell'utente connesso e attribuzione del giusto menù ad esso
		//admin, studente, docente
		if($utente->get_ruolo()=="studente"){
			$menu='<ul class="nav navbar-nav" >
        <li class="active"><a href="studenti_home_bootstrap.php">Home <span class="sr-only">(current)</span></a></li>
        <li><a href="#">Profilo</a></li>
		<li><a href="#">Piano di studi</a></li>
		<li><a href="studenti_visualizza_piano_studi.php">Visualizza piano di studi</a></li>
		<li><a href="studenti_carriera_accademica.php">Mostra Carriera accademica</a></li>
		<li><a href="studenti_visualizza_orario_lezione.php">Orario lezioni</a></li>
		<li><a href="#">Documenti</a></li>
		<li><a href="studenti_visualizza_documenti.php">Visualizza Documenti</a></li>
		<li><a href="studenti_carica_documenti.php">Carica documenti</a></li>
		<li><a href="studenti_richieste.php">Richiedi documenti</a></li>
		<li><a href="#">Richiedi certificati</a></li>
		<li><a href="logout.php">Disconnetti</a></li>
   </ul>';
		}
		if($utente->get_ruolo()=="docente"){
			$menu='<ul class="nav navbar-nav">
        <li class="active"><a href="docenti_home.php">Home <span class="sr-only">(current)</span></a></li>
        <li><a href="docenti_profilo.php">Profilo</a></li>
		<li><a href="docenti_visualizza_orario_lezioni.php">orario proprie lezioni</a></li>
		<li><a href="#">Documenti</a></li>
		<li><a href="docenti_visualizza_programma.php">Visualizza Documenti</a></li>
		<li><a href="docenti_carica_programma.php">Carica Documenti</a></li>
		<li><a href="#">Avvisi</a></li>
		<li><a href="docenti_visualizza_avvisi.php">Visualizza Avvisi</a></li>
		<li><a href="docenti_carica_avvisi.php">Pubblica avvisi</a></li>
		<li><a href="logout.php">Disconnetti</a></li>
      </ul>';
		}
		if($utente->get_ruolo()=="admin"){//ADMIN
			$menu='<ul class="nav navbar-nav" >
			<li><a href="admin_home.php">Home</a><!-- * --></li>
			<li><a href="admin_gestione_finanze.php">Gestione Documenti</a><!--(mostrare i pagamenti caricati dagli utenti tramite la loro pagina "Carica Documenti")--></li>
			<li><a href="admin_imposta_orari_lezione.php">Imposta Calendario</a></li>
			<li><a href="admin_inserisci_materia_anagrafe.php">Inserisci materie (anagrafe)</a></li>

			<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Gestisci Docenti <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="admin_inserisci_materia.php">Inserisci materia</a></li>
            <li><a href="admin_cambia_materia_docenti.php">Imposta/cambia materia docenti</a></li>
            <li><a href="admin_visualizza_docenti.php">Visualizza Docenti</a></li>
          </ul>
        </li>


			<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Gestisci Allievi <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="admin_inserisci_studenti.php">Inserisci nuovo utente</a></li>
            <li><a href="admin_trasforma_iscritto_in_studente.php">Trasforma iscritto</a></li>
            <li><a href="admin_visualizza_studenti.php">Visualizza tutti gli studenti</a></li>
          </ul>
        </li>

			<li><a href="admin_inserisci_voti.php">Inserisci Voti Studenti</a><!-- * --></li>
			<li><a href="admin_gestisci_certificati.php">Gestisci Richieste</a><!-- (viene visualizzata la lsita di certificati richiesti dagli utenti e in attesa di essere creati/autorizzati) --></li>
			<!--li><a href="admin_richieste_protocolli.php">Richieste Protocolli</a></li--> <!-- creare tabella che possa registrare i protocolli in entrata [richieste da parte degli studenti del foglio timbrato delle materie + protocolli generali al di fuori del sito gestionale che necessitano di registrazione] e in uscita [qualsiasi cosa esce dalla segreteria] -->
			<li><a href="logout.php">Disconnetti</a><!-- * --></li>
		</ul>';
	}
	$chiusure=' </div><!-- /.container-fluid --></nav>';




	echo $nav;
	echo $menu;
	echo $chiusure;
	}
}
?>
