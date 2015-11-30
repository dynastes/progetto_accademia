<?php @include_once 'menu.php'; 

if($_SESSION['materia']===1){
	echo "<div style=\"width:100%;color:green;text-align:center;font-weight:bold;border-style:solid;border-width:2px;border-color:green;background-color:#81F79F;\">Avviso pubblicato correttamente</div>";
	$_SESSION['query']=0;
}
$idDocente=$_POST["id-docente"];
$idMateria=$_POST["materia-da-modificare"];
$opzioniMateria=$_POST["opzioni-materia"];
$idMateriaSostitutiva=$_POST["materia-sostitutiva"];
$idMateriaAggiuntiva=$_POST["materia-aggiuntiva"];

echo "ID docente: ".$idDocente;
echo "###ID Materia (id?): ".$idMateria;
echo "###Opzione Materia: ".$opzioniMateria;
echo "###Materia che sostituisce: ".$idMateriaSostitutiva;
echo "###Materia da aggiungere: ".$idMateriaAggiuntiva;

if ($opzioniMateria==="sostituisci"){//se "opzioniMateria" è SOSTITUISCI allora:
	// 1. elimina dalla tabella MATERIE l'id del professore e azzeralo
	// 2. inserisci l'id del prof nella nuova materia 
	if($idMateria!="nessuna-materia"){
		$sqlTogliDocente="UPDATE materie SET Id_docente=0 WHERE Id=".$idMateria;
		$res=$connessione->query($sqlTogliDocente);
	}

	$sqlAggiungiDocente="UPDATE materie SET Id_docente=".$idDocente." WHERE Id=".$idMateriaSostitutiva;
	$res2=$connessione->query($sqlAggiungiDocente);


	$_SESSION['materia']=1;

} else if ($opzioniMateria==="elimina"){
	//azzera semplicemente la casella ID_docente in corrispondenza della materia scelta
	$sqlTogliDocente="UPDATE materie SET Id_docente=0 WHERE Id=".$idMateria;
	$res3=$connessione->query($sqlTogliDocente);

	$_SESSION['materia']=1;
}
if ($opzioniMateria==="aggiungi"){
	//aggiungi l'ID del docente alla riga con l'ID materia inerente
	$sqlAggiungiMateria="UPDATE materie SET Id_docente=".$idDocente." WHERE Id=".$idMateriaAggiuntiva;
	$res4=$connessione->query($sqlAggiungiMateria);

	$_SESSION['materia']=1;
}

@header("location:admin_cambia_materia_docenti_dettagli.php");



?>
