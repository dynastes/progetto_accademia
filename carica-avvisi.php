<?php @include_once 'menu.php'; 
$testo=$_POST['avviso'];
echo "###Inserimento dell'avviso: \n".$testo." scritto da: ".$utente->nome."\n\n";
//aggiustare QUERY dopo la creazione della tabella AVVISI
$insert="INSERT INTO avvisi (Id_docente, Testo, Data_pubblicazione) VALUES (".$utente->id.",'". $testo. "',SYSDATE())";

if ($connessione->query($insert) === TRUE) {
	$_SESSION['query']=1;
	echo "New record created successfully";
	@header("location:docenti_carica_avvisi.php");
} else {
	echo "Error: " . $sql . "<br>" . $connessione->error;
}
?>

