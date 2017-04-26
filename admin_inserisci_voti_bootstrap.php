<?php @include_once 'menu_bootstrap.php';
if($_SESSION['inserimento']===1 && $_SESSION['inserimento2']===1){
	echo "<div style=\"width:100%;color:green;text-align:center;font-weight:bold;border-style:solid;border-width:2px;border-color:green;background-color:#81F79F;\">Query pubblicata correttamente</div>";
	$_SESSION['inserimento']=0;
	$_SESSION['inserimento2']=0;
}

?>
<html>
	<head>
		<meta charset="utf-8">
		<?php @include_once 'shared/head_inclusions.php';?>

	</head>
	<body>
		
		<div class="container" >
			<!-- INIZIO CARICAMENTO MENU -->
				<?php
					menu();
				?>
			 <!-- FINE MENU -->

					<b>Benvenuto <?php echo $utente->nome; ?>!</b>
				
				<div name="avvisi">
				<h2>Inserisci voti</h2>
				<label>Scegliere il professore che ha sostenuto l'esame:</label>
					<form id="caricaquery" name="caricaquery" method="post" action="admin_inserisci_voti_next.php<?php/* echo $_SERVER['PHP_SELF']; */?>" accept-charset="utf-8">
 						<br />
						<table class="table table-striped">
							<tr>
								<td><label for="usermail">Professore:&nbsp;</label></td> <!--input type="text" name="id-corso" placeholder="1, 2 o 3" required-->
								<td><select name="id-docente">
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
								</td>
							</tr>
							<tr>
								<td colspan="2"><input  type="submit" value="Avanti" style="margin-top:40px;"></td>
							</tr>
						</table>
					</form>
				</div>
			</div>
		
<!-- INIZIO FOOTER -->
		<?php @include_once 'shared/footer.php';?>
		
	</body>
</html>
