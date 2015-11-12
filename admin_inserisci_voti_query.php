<?php @include_once 'menu.php';
$idStudente=$_POST['id-studente'];
$idMateria=$_POST['id-materia'];
$convalida=$_POST['convalida'];
$data=$_POST['data'];
$sqlInserisci="INSERT INTO materie_studenti Id_studente=".$idStudente.", Id_materia=".$idMateria.", Convalida=".$convalida.", Data=".$data;
echo $sqlInserisci;
?>