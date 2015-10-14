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
			<li><a href="#">Home</a><!-- * --></li>
			<li><a href="#">Profilo</a><!-- * --></li>
			<li class="flyout">
				<a href="#">Piano di studi</a>
				<!-- Flyout -->
				<ul class="flyout-content nav stacked" id="riquadro">
					<li class="over"><a href="#">Visualizza piano di studi</a></li>
					<li  class="over"><a href="#">Gestisci materie integrative</a></li>
				</ul>
			</li>
			<li class="flyout">
				<a href="#">Documenti</a>
				<!-- Flyout -->
				<ul class="flyout-content nav stacked" id="riquadro">
					<li  class="over"><a href="#">Visualizza documenti</a></li>
					<li  class="over"><a href="#">Carica documenti</a></li>
				</ul>
			</li>
			<li><a href="#">Contatti</a><!-- * --></li>
			<li><a href="logout.php">Disconnetti</a><!-- * --></li>
		</ul>';
		}
		if($utente->get_ruolo()=="docente"){
			$menu='<ul class="nav site-nav" >
				<li><a href="docenti_home.php">Home</a><!-- * --></li>
				<li><a href="#">Profilo</a><!-- * --></li>
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
			<li><a href="#">Home</a><!-- * --></li>
			<li><a href="#">Profilo</a><!-- * --></li>
			<li class="flyout">
				<a href="#">Piano di studi</a>
				<!-- Flyout -->
				<ul class="flyout-content nav stacked" id="riquadro">
					<li class="over"><a href="#">Visualizza piano di studi</a></li>
					<li  class="over"><a href="#">Gestisci materie integrative</a></li>
				</ul>
			</li>
			<li class="flyout">
				<a href="#">Documenti</a>
				<!-- Flyout -->
				<ul class="flyout-content nav stacked" id="riquadro">
					<li  class="over"><a href="#">Visualizza documenti</a></li>
					<li  class="over"><a href="#">Carica documenti</a></li>
				</ul>
			</li>
			<li><a href="#">Contatti</a><!-- * --></li>
			<li><a href="logout.php">Disconnetti</a><!-- * --></li>
		</ul>';
	}
	echo $menu;
	}
}
?>


