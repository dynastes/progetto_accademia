<?php @include_once 'shared/menu.php'; 

/*if($_SESSION['materia']===1){
	echo "<div style=\"width:100%;color:green;text-align:center;font-weight:bold;border-style:solid;border-width:2px;border-color:green;background-color:#81F79F;\">Avviso pubblicato correttamente</div>";
	$_SESSION['query']=0;
}*/
$idCorso=$_POST["corso"];
$idMateria=$_POST["materia"];
$anno=$_POST["anno"];
$tipo=$_POST["tipo"];

echo "ID corso: ".$idCorso."<br>";
echo "ID Materia: ".$idMateria."<br>";
echo "Anno: ".$anno."<br>";
echo "Tipo: ".$tipo."<br>";

	$sqlAggiungiMateriaCorso="INSERT INTO piano_studi (Id_corso, Id_materia, Anno, Tipo) values ('".$idCorso."','".$idMateria."','".$anno."','".$tipo."')";
	echo "Query: ".$sqlAggiungiMateriaCorso;
	$res=$connessione->query($sqlAggiungiMateriaCorso);

?>
