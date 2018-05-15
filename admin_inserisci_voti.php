<?php @include_once 'shared/menu.php';
if($_SESSION['inserimento']===1 && $_SESSION['inserimento2']===1){
	echo "<div style=\"width:100%;color:green;text-align:center;font-weight:bold;border-style:solid;border-width:2px;border-color:green;background-color:#81F79F;\">Query pubblicata correttamente</div>";
	$_SESSION['inserimento']=0;
	$_SESSION['inserimento2']=0;
}
if (isset($_POST['avviso']) && $_POST['avviso']!="postato"){
	//echo "Avviso settato!!!! ".$_POST['avviso'];
	/*$insert=$_POST['avviso'];
	if ($connessione->query($insert) === TRUE) {
		 echo "New record created successfully";
	} else {
		 echo "Error: " . $sql . "<br>" . $conn->error;
	}*/
}
?>
<html>
	<head>
		<meta charset="utf-8">
		<?php @include_once 'shared/head_inclusions.php';?>
			<?php
			if($utente->get_ruolo() !="admin" and $utente->get_ruolo() != "editor"){
				header("location: index.php");
			}
		?>

	</head>
	<body>
		<div id="principale">
			<div id="menu">
			<!-- INIZIO CARICAMENTO MENU -->
				<?php
					menu();
				?>
			</div> <!-- FINE MENU -->

			
			<div class="container">
				<div id="benvenuto">
					<b>Benvenuto <?php echo $utente->nome; ?>!</b>
				</div>
				<div name="avvisi">
				<div class="col-md-8">
				<h2>Inserisci voti</h2>
				<label>Scegliere il professore che ha sostenuto l'esame:</label>
					<form id="caricaquery" name="caricaquery" method="post" action="admin_inserisci_voti_next.php" accept-charset="utf-8">  <?php /* echo $_SERVER['PHP_SELF']; */ ?>
 						<br />
									<div class="col-md-4">
										<label for="usermail">Professore:</label> <!--input type="text" name="id-corso" placeholder="1, 2 o 3" required-->
										<br />
										
										<select class="form-control" name="id-docente">
										<?php
										$sqlDocenti="SELECT d.Id_anagrafe, a.Nome, a.Cognome
													FROM docenti AS d, anagrafe AS a
													WHERE d.Id_anagrafe=a.Id ORDER BY a.Cognome";
										$resDocenti=$connessione->query($sqlDocenti);
										while($docenti=$resDocenti->fetch_assoc()){
											echo '<option value="'.$docenti["Id_anagrafe"].'">'.$docenti["Cognome"].' '.$docenti['Nome'].'</option>';
										}
										?>
										</select>
										<br />
										<input class="btn btn-info" type="submit" value="Avanti">
									</div>
					</form>
				</div>
			</div>
		</div>
		<!-- INIZIO FOOTER -->
		<?php @include_once 'shared/footer.php'; ?>
	</body>
</html>
