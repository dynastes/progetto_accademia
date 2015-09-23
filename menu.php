<?php
@session_start();
@include_once 'utente_loggato.php';
//@include_once 'dbconnection.php';

if(!isset($_SESSION['login'])){
	@header("location:index.php");
} else {
	$utente=$_SESSION['ut'];
	$utente=unserialize($utente);
	/*rendere il menù una funzione di PHP in modo tale da poter
	includere menu.php all'inizio della pagina e poter richiamare il menù 
	dove si vuole con la funzione menu();
	Altro motivo per inserire il menù all'interno di una funzione è quello di poter mettere l'include_once in cima 
	alla pagina in modo tale da far includere nella pagina l'untente loggato, il modulo di login e, quindi, il poter
	richiamare la connessione al database già ad inizio pagina anzichè a metà pagina*/
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
		<li><a href="logout.php">Disconnetti</a><!-- * --></li>
	</ul>
	<?php
}
?>


