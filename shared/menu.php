<?php
@session_start();
@include_once 'utente_loggato.php';
@include_once 'dbconnection.php';
if(!isset($_SESSION['login'])){
		@header("location:index.php");
	} else {
		$utente=$_SESSION['ut'];
		$utente=unserialize($utente);
		if($_SESSION['lingua']=="it"){
			include("lingue/ita.php");
		}
		if($_SESSION['lingua']=="en"){
			include("lingue/en.php");
		}
		if($_SESSION['lingua']=="cn"){
			include("lingue/cn.php");
		}
}

function menu(){
	if(!isset($_SESSION['login'])){
		@header("location:index.php");
	} else {
		$utente=$_SESSION['ut'];
		$utente=unserialize($utente);
		if($utente->get_modP()==1){
		 	echo "<div style=\"width:100%;background-color:#FF3333;text-align:center;\"><b>Per una maggiore sicurezza si prega di modificare la password tramite questo <a href='ripristina_password_next.php'> Link </a></b></div>";

		}
		$nav='<nav class="navbar navbar-default">
						<!--div class="container-fluid"-->
								<div class="navbar-header">
										<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse" aria-expanded="false">
								        <span class="sr-only">Toggle navigation</span>
								        <span class="icon-bar"></span>
								        <span class="icon-bar"></span>
								        <span class="icon-bar"></span>
						        </button>
								    <img src="img/logo.png" class="header-logo">
        				</div>
								<div class="collapse navbar-collapse">';


		//identificazione dell'utente connesso e attribuzione del giusto menù ad esso
		//admin, studente, docente
		$menu='<ul class="nav navbar-nav navbar-right" >
			<li><a href="dashboard.php"><i class="fas fa-book"></i> Dashboard <span class="sr-only">(current)</span></a></li>';
	$chiusure='				<li ><a href="logout.php"><i class="fas fa-door-open"> </i>'.disconnetti.'</a><!-- * --></li>
								</ul>
								</div> <!-- /.collapse navbar-collapse -->
						<!-- </div> /.container-fluid -->
				</nav>';




	echo $nav;
	echo $menu;
	echo $chiusure;

	}
}
?>
