<?php
	// ciao
	$id=$_POST['id'];


	// connexion � la base de donn�es
	 try {
	 $bdd = new PDO('mysql:host=localhost;dbname=fullcalendar', 'root', '');
	 } catch(Exception $e) {
	 exit('Impossible de se connecter � la base de donn�es.');
	 }

	$sql = "DELETE FROM evenement WHERE id = :id";
	$q = $bdd->prepare($sql);
	$q->execute(array(':id'=>$id));
?>
