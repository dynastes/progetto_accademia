<?php @include_once 'shared/menu.php';
if(isset($_SESSION['inserimento'])){
	if($_SESSION['inserimento']===1 && $_SESSION['inserimento2']===1){
		echo "<div style=\"width:100%;color:green;text-align:center;font-weight:bold;border-style:solid;border-width:2px;border-color:green;background-color:#81F79F;\">Query pubblicata correttamente</div>";
		$_SESSION['inserimento']=0;
		$_SESSION['inserimento2']=0;
	}
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
				<div name="avvisi">
				<div class="col-md-12">
				<h2>Inserisci voti</h2>
				<label>Cerca studenti</label>
				<div class="row">
					<div class="col-md-4">
							<input type="text" class="form-control" id="cerca_criteri" placeholder="Nome,Cognome,Matricola,Indirizzo, ecc..." />
					</div>
					<div class="col-md-8">

					</div>
				</div>
				<br />
				<label>Selezionare l'alunno per il caricamento dei voti:</label>
				<table class="table sortable table-striped">
				<tr>
					<th> Matricola </th>
					<th> Nome </th>
					<th> Cognome </th>
					<th> Email </th>
					<th> Indirizzo </th>
					<th> Telefono </th>
					<th> Anno </th>
					<th>Aggiungi voto	</th>
				</tr>

				<?php //qui interrogo il DB per sapere la lista di programmi pubblicati dai docenti
				//INIZIO TABELLA CONTENUTI
				$stringasql="SELECT s.Id_anagrafe, a.Nome, a.Cognome, a.Email, a.Indirizzo, a.Telefono, s.Matricola, s.Anno FROM anagrafe AS a, studenti AS s WHERE s.Id_anagrafe=a.Id AND s.Matricola!=0 ORDER BY s.Anno, s.Matricola, a.Cognome";
				$elencoStudenti=$connessione->query($stringasql);
				while($res=$elencoStudenti->fetch_assoc()){
					echo "<tr>";
						echo '<td class="box-elenco-studenti">';
							echo $res["Matricola"];
						echo '</td>';
						echo '<td class="box-elenco-studenti">';
							echo $res["Nome"];
						echo '</td>';
						echo '<td class="box-elenco-studenti">';
							echo $res["Cognome"];
						echo '</td>';
						echo '<td class="box-elenco-studenti">';
							echo $res["Email"];
						echo '</td>';
						echo '<td class="box-elenco-studenti">';
							echo $res["Indirizzo"];
						echo '</td>';
						echo '<td class="box-elenco-studenti">';
							echo $res["Telefono"];
						echo '</td>';		echo '<td class="box-elenco-studenti">';
									echo $res["Anno"];
								echo '</td>';
						if($utente -> get_ruolo() == "admin"){
							echo '<td>';
								echo('<a href="admin_valutazione_studente.php?ID='.$res['Id_anagrafe'].'" onclick="return sicuro('.$res['Id_anagrafe'].'")>  Aggiungi </a>');
							echo '</td>';
						}
					echo '</tr>';
				}
				echo "</table>";
				?>

				</div>
			</div>
		</div>
		<!-- INIZIO FOOTER -->
		<?php @include_once 'shared/footer.php'; ?>
	</body>
</html>

<script>
	$("#cerca_criteri").change(function(){
		alert("ciao");
	});
</script>
