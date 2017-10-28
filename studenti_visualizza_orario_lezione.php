<?php @include_once 'shared/menu.php'; ?>
<html>
	<head>
        <?php @include_once 'shared/head_inclusions.php'; ?>
        <?php @include_once 'shared/head_fullcalendar_inclusions.php'; ?>
        <?php @include_once 'shared/calendar_inclusion.php'; ?>

	</head>
	<body>

   <?php menu();?>


			<div class="container">
				<div id="benvenuto">
					<b>Benvenuto <?php echo $utente->nome; ?>!</b>
					<p>Qui verranno elencati tutti gli orari delle lezioni/avvenimenti presenti nell'Accademia</p>
				</div>

				<div id="calendar" style="margin-bottom:20px;"></div>
			</div>


	<?php @include_once 'shared/footer.php'; ?>
	</body>
</html>
