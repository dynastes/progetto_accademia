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
		<li><a href="#">Disconnetti</a><!-- * --></li>
	</ul>
	<?php
}
?>


