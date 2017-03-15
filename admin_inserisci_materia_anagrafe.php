<?php
//@session_start();
@include_once 'dbconnection.php';

/*prendere dalla tabella la lista di settori con questi campi:
	- ID settore
	- codice

*/
$sql_carica_settore="SELECT * FROM settore";
$res_settore=$connessione->query($sql_carica_settore);
//$res_settore_lista=$res_settore->fetch_assoc();




/*

Prendere inoltre i seguenti campi dalla tabella "materie_anagrafica":
	- Id
	- Nome_materia
	- Id_settore (qui dentro, invece, salvare il valore del settore selezionato nel form)
*/
/*<!DOCTYPE html>
<meta charset="UTF-8">	*/
?>

<html>
	<head>
		<title>Inserisci materia</title>
		
	</head>
	<body>
		<h1> inserisci materia </h1>
		<form action="f_inserisci_materia.php" method="post">
			<label for="nome_materia">Nome materia </label>
			<input type="text" id="nome_materia" name="nome_materia">

			<label for="settore">Settore </label>
			<select id="settore" name="settore">
				<?php 
				while($res=$res_settore->fetch_assoc()) { 

					if($_SESSION['id_settore']==$res['Id']){ 
						?>
						<option value="<?php echo $res['Id']; ?>" selected><?php echo $res['Codice']; ?></option>
					
					<?php
					} else { ?>
						<option value="<?php echo $res['Id']; ?>"><?php echo $res['Codice']; ?></option>
					<?php 
					} 
				} 
				?>
				

			</select>

			<input type="submit" value="Inserisci materia">
			
		</form>
	</body>
</html>