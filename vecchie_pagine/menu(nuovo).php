<?php
@session_start();
@include_once 'utente_loggato.php';

if(!isset($_SESSION['login'])){
	@header("location:index.php");
} else {
	$utente=$_SESSION['ut'];
	$utente=unserialize($utente);
	
	?>

	<ul class="nav site-nav" >
		<li><a href="studenti_home.php">Home</a><!-- * --></li>
		<li><a href="studenti_profilo.php">Profilo</a><!-- * --></li>
		<li class="flyout">
			<a href="#">Piano di studi</a>
			<!-- Flyout -->
			<ul class="flyout-content nav stacked" id="riquadro">
				<li class="over"><a href="studenti_visualizza_piano.php">Visualizza piano di studi</a></li>
				<li  class="over"><a href="studenti_gest_mat.php">Gestisci materie integrative</a></li>
			</ul>
		</li>
		<li class="flyout">
			<a href="#">Documenti</a>
			<!-- Flyout -->
			<ul class="flyout-content nav stacked" id="riquadro">
				<li  class="over"><a href="studenti_visualizza_doc.php">Visualizza documenti</a></li>
				<li  class="over"><a href="studenti_carica_doc.php">Carica documenti</a></li>
			</ul>
		</li>
		<li><a href="studenti_contatti.php">Contatti</a><!-- * --></li>
		<li><a href="logout.php">Disconnetti</a><!-- * --></li>
	</ul>
	<?php
}
?>


