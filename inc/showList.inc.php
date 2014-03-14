<?php session_start();
	require_once( 'db.inc.php' );

	require( 'GameSheet.php' );
	echo $_GET['list'];
	$game = new GameSheet( $con, $_GET['list'], $_GET['code'], $_SESSION['code'] );

	$game->showGame();


?>
