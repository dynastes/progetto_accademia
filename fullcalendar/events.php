<?php
// liste des �v�nements
 $json = array();
 // requ�te qui r�cup�re les �v�nements
 $requete = "SELECT * FROM evenement ORDER BY id";

 // connexion � la base de donn�es
 try {
 $bdd = new PDO('mysql:host=localhost;dbname=fullcalendar', 'root', '');
 } catch(Exception $e) {
 exit('Impossibile connettersi al DB');
 }
 // ex�cution de la requ�te
 $resultat = $bdd->query($requete) or die(print_r($bdd->errorInfo()));

 // envoi du r�sultat au success
 echo json_encode($resultat->fetchAll(PDO::FETCH_ASSOC));

?>
