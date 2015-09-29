<?php @include_once 'menu.php'; 
echo "###Inserimento dell'avviso: \n".$_POST['avviso']."\n";
//aggiustare QUERY dopo la creazione della tabella AVVISI
$insert=$_POST['avviso'];
if ($connessione->query($insert) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>

