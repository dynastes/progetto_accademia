<?php @include_once 'shared/menu.php'; 

/*if($_SESSION['materia']===1){
	echo "<div style=\"width:100%;color:green;text-align:center;font-weight:bold;border-style:solid;border-width:2px;border-color:green;background-color:#81F79F;\">Avviso pubblicato correttamente</div>";
	$_SESSION['query']=0;
}*/
$idCorso=$_POST["corso"];
$idMateria=$_POST["materia"];

if (isset($_POST["modulo"])){$modulo=$_POST["modulo"];}else{$modulo="";}
$anno=$_POST["anno"];
if($anno==1 or $anno==2 or $anno==3){$offerta=1;}
elseif($anno==4 or $anno==5){$offerta=2;}
$categoria=$_POST["categoria"];
$tipo=$_POST["tipo"];
$ore=$_POST["ore"];
$cfa=$_POST["cfa"];


echo "ID corso: ".$idCorso."<br>";
echo "ID Materia: ".$idMateria."<br>";
echo "Modulo: ".$modulo."<br>";
echo "Anno: ".$anno."<br>";
echo "Categoria: ".$categoria."<br>";
echo "Tipo: ".$tipo."<br>";
echo "CFA: ".$cfa."<br>";

	$sqlAggiungiMateriaCorso="INSERT INTO materie_piano (Id_corso, Id_materia, Modulo, Id_offerta_formativa, Anno, Ore, Cfa, Categoria, Tipologia) values ('".$idCorso."','".$idMateria."','".$modulo."','".$offerta."','".$anno."','".$ore."','".$cfa."','".$categoria."','".$tipo."')";
	echo "Query: ".$sqlAggiungiMateriaCorso;
	$res=$connessione->query($sqlAggiungiMateriaCorso);

?>
