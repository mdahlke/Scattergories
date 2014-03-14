<?php session_start();

require( 'GameList.php' );
class GameSheet extends GameList {

	public function __construct( $con, $list, $code ){
		parent::__construct( $con, $list, $code );
	}

	function showGame(){
		$ti = 1; // tab-index

		$sheet = '
			<article id="answersWrapper">
			';
			for( $i = 1; $i <= Game::NUMBEROFROUNDS; $i++ ){
				$sheet .= '
					<div class="round">
						<h3 class="center">Round '.$i.'</h3>
				';
				for( $a = 1; $a <= Game::NUMBEROFANSWERS; $a++, $ti++ ){
					$p = isset( $_SESSION['game'][$i][$a]['points'] ) ? $_SESSION['game'][$i][$a]['points'] : 'none';
//					echo '<pre>';
//					var_dump($_SESSION['game'][$i][$a]['points']);
//					echo '</pre>';
					if( $p !== 'none' ){
						$points = $p;
						$class = $p <= 0 ? 'strike' : '';
					}
					else {
						$class = '';
						$points = '';
					}
					$text = isset( $_SESSION['game'][$i][$a]['text'] ) ? $_SESSION['game'][$i][$a]['text'] : '';
					
					$sheet .= '
						<div class="answer">
							<span class="answerNumber">'.$a.')</span>
							<div class="answerLine">
								<input type="text" class="answerLine '.$class.'" name="answer"
										data-round="'.$i.'" data-number="'.$a.'" tabindex="'.$ti.'"
										value="'.$text.'">
								<span class="scoreTracker">'.$points.'</span>
								<span class="score" id="noPoints">
									<img src="img/x.png" />
								</span>
								<span class="score" id="points">
									<img src="img/check.png" />
								</span>
							</div>
						</div>
					';
				}
				$sheet .= '
					</div>
				';
			}

		$sheet .= '

			</article>
		';

		Game::gameBoard($this->showList(), $sheet);

	}
	
}