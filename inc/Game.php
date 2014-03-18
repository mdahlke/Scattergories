<?php session_start();


class Game {
	protected $code;
	protected $con;
	protected $list;
	const NUMBEROFROUNDS = 3;
	const NUMBEROFANSWERS = 12;

	function __construct($con, $list, $code) {
		$this->con = $con;
		$this->list = $list;
		$this->code = $code;
	}

	function showCode(){
		echo $this->code;
	}

	function gameBoard( $list, $sheet ){
		echo '
			<section id="boardWrapper">
		';
		echo $list;
		echo $sheet;
		echo '
			<article id="gameFunctions">
				<div id="gameCodeWrapper">
					<span class="bold">Game Code: </span>
					<span id="gameCode">'.$_SESSION['code'].'</span>
				</div>
				<div id="currentGameFunctions">
					<span id="startTimer" class="scat-btn">Start Timer</span>
					<span id="rollDice" class="scat-btn">Roll Die</span>
					<span id="diceRollResult" style="display:none;"></span>
					<span id="showTotal" class="scat-btn">Show Total</span>
				</div>
				<div id="newGameFunctions">
					<span id="newGame" class="scat-btn" onclick="javascript: newGame();">New Game</span>
				</div>
			</article>
		</section>
	';
	}

}
?>
