<?php
	require_once( 'db.inc.php' );

	require( 'GameSheet.php' );
	$game = new GameSheet($con, $_GET['list']);

	echo '
		<section id="boardWrapper">
	';
		$game->showList();
		$game->showSheet();
	echo '
		</section>
	';

?>
