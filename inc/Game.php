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
			<article id="newGameWrapper">

				<p>
					<span class="bold">Game Code: </span>
					<span id="gameCode">'.$_SESSION['code'].'</span>
				</p>
				<p>
					<span id="newGame" class="scat-btn" onclick="javascript: newGame();">New Game</span>
					<span id="startTimer" class="scat-btn">Start Timer</span>
				</p>
			</article>
		</section>
	';



	}

}
?>
