<?php @include_once 'menu.php'; 
$idDocente=$_POST['id-docente'];
$codiceMateria=$_POST['codice-materia'];
$NomeMateria=$_POST['nome-materia'];
$anno=$_POST['anno'];
$idCorso=$_POST['id-corso'];
$cfa=$_POST['cfa'];
$tipo=$_POST['tipo'];

echo 'Ritorna alla <a href="inserisci-query.php">pagina precedente</a>';
echo "###Inserimento dell'avviso: \n".$testo." scritto da: ".$utente->nome." e con visibilità ".$visibilita."\n\n";
//aggiustare QUERY dopo la creazione della tabella AVVISI
$insert="INSERT INTO materie (Id_docente, Codice_materia, Nome_materia, Anno) VALUES (".$idDocente.",'". $codiceMateria. "','".$NomeMateria."',".$anno.")";
//DEBUG
echo "PRIMA QUERY -> TABELLA: avvisi\n";
echo "\t\t".$insert;
//FINE DEBUG
if ($connessione->query($insert) === TRUE) {
	$_SESSION['inserimento']=1;
	echo "New record created successfully";
	$idMateria=$connessione->insert_id;
	printf ("Il nuovo id inserito: %d. ", $idMateria);

	//inserisco il codice materia e i rimanenti campi non iseriti nella tabella materia-corsi
	$sqlMaterieCorsi="INSERT INTO materie_corsi (Id_materia, Id_corso, Cfa, Tipo) VALUES (".$idMateria.", ".$idCorso.", ".$cfa.", '".$tipo."')";
	//DEBUG
	echo "SECONDA QUERY -> TABELLA: avvisi\n";
	echo "\t\t".$sqlMaterieCorsi;
	//FINE DEBUG
	if ($connessione->query($sqlMaterieCorsi) === TRUE) {
		$_SESSION['inserimento2']=1;
		@header("location:inserisci-query.php");
	} else {
		echo "Error: " . $sql . "<br>" . $connessione->error;
	}
} else {
	echo "Error: " . $sql . "<br>" . $connessione->error;
}
?>

