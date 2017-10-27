<?php @include_once 'shared/menu.php';

/*if($_SESSION['materia']===1){
	echo "<div style=\"width:100%;color:green;text-align:center;font-weight:bold;border-style:solid;border-width:2px;border-color:green;background-color:#81F79F;\">Avviso pubblicato correttamente</div>";
	$_SESSION['query']=0;
}*/
$idDocente=$_POST["id-docente"];
$idMateria=$_POST["materia"];
//$opzioniMateria=$_POST["opzioni-materia"];
$opzioniMateria="aggiungi";
//$idMateriaSostitutiva=$_POST["materia-sostitutiva"];
//$idMateriaSostitutiva="";
//$idMateriaAggiuntiva=$_POST["materia-aggiuntiva"];

echo "ID docente: ".$idDocente."<br>";
echo "###ID Materia: ".$idMateria."<br>";
//echo "###Opzione Materia: ".$opzioniMateria."<br>";
//echo "###Materia che sostituisce: ".$idMateriaSostitutiva."<br>";
//echo "###Materia da aggiungere: ".$idMateriaAggiuntiva."<br>";

/*if ($opzioniMateria==="sostituisci"){//se "opzioniMateria" è SOSTITUISCI allora:
	// 1. elimina dalla tabella MATERIE l'id del professore e azzeralo
	// 2. inserisci l'id del prof nella nuova materia 
	if($idMateria!="nessuna-materia"){
		$sqlTogliDocente="UPDATE materia_docente SET Id_docente=0 WHERE Id=".$idMateria;
		$res=$connessione->query($sqlTogliDocente);
	}

	$sqlAggiungiDocente="UPDATE materia_docente SET Id_docente=".$idDocente." WHERE Id=".$idMateriaSostitutiva;
	$res2=$connessione->query($sqlAggiungiDocente);


	$_SESSION['materia']=1;

} else if ($opzioniMateria==="elimina"){
	//azzera semplicemente la casella ID_docente in corrispondenza della materia scelta
	$sqlTogliDocente="UPDATE materia_docente SET Id_docente=0 WHERE Id=".$idMateria;
	$res3=$connessione->query($sqlTogliDocente);

	$_SESSION['materia']=1;
}*/
if ($opzioniMateria==="aggiungi"){
	//aggiungi l'ID del docente alla riga con l'ID materia inerente

	//controllo se esiste già una riga con la materia in questione
    $sqlControllaRecord="SELECT Id_materia_anagrafica
								FROM materia_docente
								WHERE Id_materia_anagrafica=".$idMateria;
    $resControllo=$connessione->query($sqlControllaRecord);

    if(mysqli_num_rows($resControllo)!=0) {

        //$sqlAggiungiMateria="INSERT INTO materia_docente (Id_docente, Id_materia_anagrafica) values ('".$idDocente."','".$idMateria."')";
        $sqlAggiungiMateria = "UPDATE materia_docente 
						SET Id_docente= '" . $idDocente . "'
						WHERE Id_materia_anagrafica=" . $idMateria; /*todo: aggiungere clausola: se non trova materie in ques
 																		ta select, aggiungere la materia come scritto nella riga 44*/

    } else {
        /*if(mysqli_affected_rows($connessione)==0){*/
        $sqlAggiungiMateria="INSERT INTO materia_docente (Id_docente, Id_materia_anagrafica) values ('".$idDocente."','".$idMateria."')";
        echo "Query: ".$sqlAggiungiMateria;
    }
    $resUpdate = $connessione->query($sqlAggiungiMateria);

	$_SESSION['materia']=1;
}

//@header("location:admin_imposta_materia_docenti_dettagli.php");
@header("location:admin_imposta_materia_docenti.php");



?>
