<?php @include_once 'shared/menu.php'; ?>
<html>
	<head>
		<?php @include_once 'shared/head_inclusions.php'; ?>
		<meta charset="utf-8">
	</head>
	<body>
	<!-- QUA CAMBIARE IL MENU IN MODO CHE SOLO L'ADMIN POSSA ACCEDERCI --> 
	<div id="menu">
			<?php
				menu();
			?>
<div id="principale">

		<div class="row">
					<div class="col-xs-2"></div>
					<div class="col-xs-2"><button><a href="aggiungi_questionario.php">Aggiungi questionario feedback</a></button></div>
					<div class="col-xs-2"><button><a href="verifica_risposte.php">Verifica risposte studenti</a></button></div>
					<div class="col-xs-2"><button><a href="admin_gestione_finanze.php">Gestione Documenti</a></button></div>
					<div class="col-xs-2"><button><a href="admin_visualizza_offerta_formativa.php">Offerta formativa</a></button></div>
					<div class="col-xs-2"></div>
					</div>
					
					<!-- passato alla seconda riga la penultima -->
					
						<div class="row">
					<div class="col-xs-2"></div>
					<div class="col-xs-2"><button><a href="admin_imposta_materia_docenti.php">Imposta/cambia materia docenti</a></button></div>
					<div class="col-xs-2"><button><a href="admin_visualizza_docenti.php">Visualizza Docenti</a></button></div>
					<div class="col-xs-2"><button><a href="admin_inserisci_studenti.php">Inserisci nuovo utente</a></button></div>
					<div class="col-xs-2"><button><a href="admin_trasforma_iscritto_in_studente.php">Trasforma iscritto</a></button></div>
					<div class="col-xs-2"></div>
					</div>
					
					<div class="row">
					<div class="col-xs-2"></div>
					<div class="col-xs-2"><button><a href="admin_visualizza_dipartimenti.php">Dipartimenti</a></button></div>
					<div class="col-xs-2"><button><a href="admin_visualizza_corsi.php">Corsi</a></button></div>
					<div class="col-xs-2"><button><a href="admin_visualizza_settori.php">Settori</a></button></div>
					<div class="col-xs-2"><button><a href="admin_inserisci_materia_anagrafe.php">Inserisci materie (anagrafe)</a></button></div>
					<div class="col-xs-2"></div>
					</div>
					
					<div class="row">
					<div class="col-xs-2"></div>
					<div class="col-xs-2"><button><a href="admin_visualizza_materie_anagrafe.php">Materie</a></button></div>
					<div class="col-xs-2"><button><a href="admin_crea_piano_di_studi.php">Crea piano di studi</a></button></div>
					<div class="col-xs-2"><button><a href="admin_visualizza_piano_di_studi.php">Piani di studio</a></button></div>
					<div class="col-xs-2"><button><a href="admin_registra_professori.php">Inserisci nuovo docente</a></button></div>
					<div class="col-xs-2"></div>
					</div>
					
				
					
					<div class="row">
					<div class="col-xs-3"></div>
					<div class="col-xs-2"><button><a href="admin_visualizza_studenti.php">Visualizza tutti gli studenti</a></button></div>
					<div class="col-xs-2"><button><a href="admin_inserisci_voti.php">Inserisci Voti Studenti</a></button></div>
					<div class="col-xs-2"><button><a href="admin_imposta_orari_lezione.php">Imposta Calendario</a></button></div>
					<div class="col-xs-3"></div>
					</div>
					
					<div class="row">
					<div class="col-xs-5"></div>
					<div class="col-xs-2"><button><a href="logout.php">Disconnetti</a></button></div>
					<div class="col-xs-5"></div>
					</div>
					
			</div>
			<br><br>
<?php @include_once 'shared/footer.php'; ?>
	</body>
</html>
