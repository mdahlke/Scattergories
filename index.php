<?php session_start(); ?>
<html>
	<head>
		<meta name="viewport" content="width=device-width, user-scalable=no">
		<meta name="mobile-web-app-capable" content="yes">
		<title>Scattergories!</title>
		<link href="css/style.css" rel="stylesheet" type="text/css"/>
		<link rel="shortcut icon" sizes="196x196" href="img/logo.png">
		<script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
		<script src="js/index.js"></script>
	</head>

	<body>
		
		<section id="container">
			<article id="joinGame" class="selectGame">
				<button class="btn-pickIt" type='button'>Join A Game</button>
			</article>
			<article id="createGame" class="selectGame">
				<button class="btn-pickIt" type='button'>Pick it</button>
			</article>
		</section>
		
	</body>

			<?php
				if( isset($_SESSION['list']) ) {
			?>
			<script>
				$(document).ready(function(){
					displaySheet(<?= $_SESSION['list']; ?>);
				});
			</script>
			<?php
				}
			?>
	
</html>