<?php session_start();
	require_once( 'db.inc.php' );

	require( 'GameSheet.php' );
	$game = new GameSheet($con, $_GET['list'], $_GET['code'], $_SESSION['code']);

	echo '
		<section id="boardWrapper">
	';
		$game->showList();
		$game->showSheet();
	echo '
			<article id="newGameWrapper">

				<p>
					<span class="bold">Game Code: </span>
					<span id="gameCode">'.$_SESSION['code'].'</span>
				</p>
				<span id="newGame" onclick="javascript: newGame();">New Game</span>
			</article>
		</section>
	';

?>
