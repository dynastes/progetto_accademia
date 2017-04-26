<!-- 

convertita la grafica in bootstrap ma i link fanno riferimento alle vecchie pagine 
non convertite

-->

 <!DOCTYPE html>

<html>
<head>
	<?php @include_once 'shared/head_inclusions.php';?> 
</head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>

      </button>
      <img src="img/logo.png" width="30%">
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
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
      
  

<!-- POTREBBE ESSERE UTILE IN FUTURO ( DA SALVARE )
      </ul>
      <div>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li>
      </ul>
	  </div>
	  
	  -->
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


		<!-- INIZIO FOOTER -->
		<div id="footer" style="bottom:0px;left:0px;width:100%;background-color:black;color:white;height:40px;font-size:14px;float:left">
				<p align="center">
				Copyright © 2015 Accademia Di Belle Arti Kandinskij
				<a href="" rel="nofollow" target="_blank"></a>
				</p>
			</div> 
</body>
</html>