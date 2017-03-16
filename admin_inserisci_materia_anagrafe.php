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
			
			<label for="settore">Settore </label>
			<select id="settore" name="settore">
				<?php 
				while($res=$res_settore->fetch_assoc()) {
					//if($_SESSION['id_settore']==$res['Id']){ 
						?>
						<option value="<?php echo $res['Id']; ?>" selected><?php echo $res['Codice']; ?></option>
					
					<?php
					 //} else { ?>
						<!-- <option value="<?php //echo $res['Id']; ?>"><?php //echo $res['Codice']; ?></option> -->
					<?php 
					//} 
				} 
				?>
			</select>
			

			<input type="submit" value="Inserisci materia">
			
			<label for="nome_materia">Nome materie </label>
			1 <input type="text" id="nome_materia1" name="nome_materia1"><br>
			2 <input type="text" id="nome_materia2" name="nome_materia2"><br>
			3 <input type="text" id="nome_materia3" name="nome_materia3"><br>
			4 <input type="text" id="nome_materia4" name="nome_materia4"><br>
			5 <input type="text" id="nome_materia5" name="nome_materia5"><br>
			6 <input type="text" id="nome_materia6" name="nome_materia6"><br>
			7 <input type="text" id="nome_materia7" name="nome_materia7"><br>
			8 <input type="text" id="nome_materia8" name="nome_materia8"><br>
			9 <input type="text" id="nome_materia9" name="nome_materia9"><br>
			10 <input type="text" id="nome_materia10" name="nome_materia10"><br>
		</form>
	</body>
</html>