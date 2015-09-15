<?php
	$connessione = mysqli_connect("127.0.0.1", "root", "Jumala91", "progetto_accademia");
	
	if($connessione){
		//echo "Connessione al database riuscita!!!!!!!!!!!";
	} else {
		echo "<div style=\"width:100%;background-color:#FF3333;text-align:center;\"><b>Connessione al database non riuscita. Riprova ad eseguire il login</b></div>";
	}
?>