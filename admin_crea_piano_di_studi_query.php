<?php @include_once 'shared/menu.php'; 

/*if($_SESSION['materia']===1){
	echo "<div style=\"width:100%;color:green;text-align:center;font-weight:bold;border-style:solid;border-width:2px;border-color:green;background-color:#81F79F;\">Avviso pubblicato correttamente</div>";
	$_SESSION['query']=0;
}*/

$idCorso=$_POST["corso"];
$idMateria=$_POST["materia"];
$anno=$_POST["campo_anno"];
$periodo=$_POST["campo_periodo"];
$categoria=$_POST["categoria"];
$tipo=$_POST["tipo"];
$cfa=$_POST["cfa"];
if (isset($_POST["modulo"])){$modulo=$_POST["modulo"];}else{$modulo="";}

if($periodo==1){$offerta="Triennio";}
elseif($periodo==2){$offerta="Biennio";}
elseif($periodo==3){$offerta="Ciclo_unico";}

if ($tipo=="TP"){$ore=$cfa*25*50/100;}
elseif ($tipo=="T"){$ore=$cfa*25*30/100;}
elseif ($tipo=="L"){$ore=$cfa*25;}

$sql_select_dipartimento="SELECT Id_dipartimento FROM corsi WHERE Id=".$idCorso." LIMIT 1"; 
//echo "Query select dipartimento:".$sql_select_dipartimento;
$query_dipartimento=$connessione->query($sql_select_dipartimento);
$res_dipartimento=$query_dipartimento->fetch_assoc();

$sql_offerta_formativa="SELECT Id FROM offerta_formativa WHERE Id_dipartimento=".$res_dipartimento["Id_dipartimento"]." AND Nome='".$offerta."' LIMIT 1";
//echo "<br> Query select id offerta formativa:".$sql_offerta_formativa;
$query_offerta_formativa=$connessione->query($sql_offerta_formativa);
$res_offerta_formativa=$query_offerta_formativa->fetch_assoc();

echo "ID corso: ".$idCorso."<br>";
echo "ID Materia: ".$idMateria."<br>";
echo "Modulo: ".$modulo."<br>";
echo "Periodo: ".$periodo."<br>";
echo "Offerta: ".$offerta."<br>";
echo "Anno: ".$anno."<br>";
echo "Categoria: ".$categoria."<br>";
echo "CFA: ".$cfa."<br>";
echo "Tipo: ".$tipo."<br>";
echo "Ore: ".$ore."<br>";

$sqlAggiungiMateriaCorso="INSERT INTO materie_piano (Id_corso, Id_materia, Modulo, Id_offerta_formativa, Anno, Ore, Cfa, Categoria, Tipologia) values ('".$idCorso."','".$idMateria."','".$modulo."','".$res_offerta_formativa["Id"]."','".$anno."','".$ore."','".$cfa."','".$categoria."','".$tipo."')";
echo "Query: ".$sqlAggiungiMateriaCorso;
$res=$connessione->query($sqlAggiungiMateriaCorso);

@header('location:admin_visualizza_piano_di_studi.php');
?>
