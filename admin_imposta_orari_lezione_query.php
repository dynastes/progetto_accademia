<?php @include_once 'menu.php'; 
echo $_POST['orario-inizio'];
echo $_POST['orario-fine'];
echo $_POST['id-materia'];
$orarioInizio=$_POST['orario-inizio'];
$orarioFine=$_POST['orario-fine'];
$idMateria=$_POST['id-materia'];

$sqlOrario="UPDATE materie SET Orario_inizio='".$orarioInizio."', Orario_fine='".$orarioFine."' WHERE Id=".$idMateria;
//echo $sqlOrario;
if($connessione->query($sqlOrario)){
	$_SESSION['modifica-orario']=1;
}
@header('location:admin_imposta_orari_lezione.php');


?>