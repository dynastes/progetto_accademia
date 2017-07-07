<?php @include_once 'shared/menu.php'; 

$id_materia_in_piano=$_GET["Id"];
$previous = $_SERVER['HTTP_REFERER'];

//echo "ID Materia in piano: ".$id_materia_in_piano."<br>";
//echo "previous: ".$previous."<br>";

	$sqlTogliMateriaPiano="DELETE FROM materie_piano WHERE Id=".$id_materia_in_piano;
	//echo "Query: ".$sqlTogliMateriaPiano;
	$res=$connessione->query($sqlTogliMateriaPiano);
	
	//torna alla pagina precedente
	@header('location:'.$previous);

?>
