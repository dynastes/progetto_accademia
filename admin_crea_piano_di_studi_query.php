<?php @include_once 'shared/menu.php'; 

/*if($_SESSION['materia']===1){
	echo "<div style=\"width:100%;color:green;text-align:center;font-weight:bold;border-style:solid;border-width:2px;border-color:green;background-color:#81F79F;\">Avviso pubblicato correttamente</div>";
	$_SESSION['query']=0;
}*/
$idCorso=$_POST["corso"];
$idMateria=$_POST["materia"];

if (isset($_POST["modulo"])){$modulo=$_POST["modulo"];}else{$modulo="";}
$anno=$_POST["anno"];

$sql_select_dipartimento="SELECT Id_dipartimento FROM corsi WHERE Id=".$idCorso." LIMIT 1";
echo "Query select dipartimento:".$sql_select_dipartimento;
$query_dipartimento=$connessione->query($sql_select_dipartimento);
$res_dipartimento=$query_dipartimento->fetch_assoc();

if($anno==1 or $anno==2 or $anno==3){$offerta="Triennio";}
elseif($anno==4 or $anno==5){$offerta="Biennio";}
elseif($anno==6){$offerta="Ciclo_unico";}

$sql_offerta_formativa="SELECT Id FROM offerta_formativa WHERE Id_dipartimento=".$res_dipartimento["Id_dipartimento"]." AND Nome='".$offerta."' LIMIT 1";
echo "<br> Query select id offerta formativa:".$sql_offerta_formativa;
$query_offerta_formativa=$connessione->query($sql_offerta_formativa);
$res_offerta_formativa=$query_offerta_formativa->fetch_assoc();

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

	$sqlAggiungiMateriaCorso="INSERT INTO materie_piano (Id_corso, Id_materia, Modulo, Id_offerta_formativa, Anno, Ore, Cfa, Categoria, Tipologia) values ('".$idCorso."','".$idMateria."','".$modulo."','".$res_offerta_formativa["Id"]."','".$anno."','".$ore."','".$cfa."','".$categoria."','".$tipo."')";
	echo "Query: ".$sqlAggiungiMateriaCorso;
	$res=$connessione->query($sqlAggiungiMateriaCorso);

?>
