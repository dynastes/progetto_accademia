<?php @include_once 'shared/menu.php';
if($_SESSION['inserimento']===1 && $_SESSION['inserimento2']===1){
	echo "<div style=\"width:100%;color:green;text-align:center;font-weight:bold;border-style:solid;border-width:2px;border-color:green;background-color:#81F79F;\">Query pubblicata correttamente</div>";
	$_SESSION['inserimento']=0;
	$_SESSION['inserimento2']=0;
}
$idDocente=$_POST['id-docente'];
?>
<html>
	<head>
		<?php @include_once 'shared/head_inclusions.php';?>

	</head>
	<body>
		<div id="testata">
			<img src="img/img/logo.png">
		</div>
		<div id="principale">
			<div id="menu">
			<!-- INIZIO CARICAMENTO MENU -->
				<?php
					menu();
				?>
			</div> <!-- FINE MENU -->

			<div id="contenuto">
				<div id="benvenuto">
					<b>Benvenuto <?php echo $utente->nome; ?>!</b>
				</div>
				<div name="avvisi">
				<h2>Inserisci voti</h2>
				<label>Scegliere la materia:</label>
					<form id="caricaquery" name="caricaquery" method="post" action="admin_inserisci_voti_next_2.php<?php/* echo $_SERVER['PHP_SELF']; */?>" accept-charset="utf-8">
 						<br />
						<table style="width:30%;">
							<tr>
								<td><label for="usermail">Materia:&nbsp;</label></td> <!--input type="text" name="id-corso" placeholder="1, 2 o 3" required-->
								<td><select name="id-materia">
									<?php
									/* La query necessita l'estrazione dell'ID Docente dalla tabella "materia_docente", in modo tale da capire
									 * da chi è insegnata questa determinata materia. Così facendo, verranno selezionate solo le materie che avranno
									 * nella colonna Id_docente l'ID ricevuto tramite POST. */
									$sqlMateria="SELECT Id, Nome_materia
												FROM materie_anagrafica
												WHERE Id_docente=".$idDocente." ORDER BY Nome_materia";
									$res=$connessione->query($sqlMateria);
									while($resMateria=$res->fetch_assoc()){
										echo '<option value="'.$resMateria["Id"].'">'.$resMateria["Nome_materia"].' ('.$resMateria['Anno'].')'.'</option>';
									}
									?>
									</select>
								</td>
							</tr>
							<tr>
								<td colspan="2"><input  type="submit" value="Avanti" style="margin-top:40px;"></td>
							</tr>
						</table>
					</form>
				</div>
			</div>
		</div>

		<!-- INIZIO FOOTER -->
		<div id="footer" style="bottom:0px;left:0px;width:100%;background-color:black;color:white;height:40px;font-size:14px;float:left">
				<p align="center">
				Copyright © 2015 Accademia Di Belle Arti Kandinskij
				<a href="" rel="nofollow" target="_blank"></a>
				</p>
			</div>
	</body>
</html>
