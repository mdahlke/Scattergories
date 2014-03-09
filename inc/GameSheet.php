<?php session_start();

require( 'GameList.php' );
class GameSheet extends GameList {

	public function __construct($con, $list, $code){
		parent::__construct($con, $list, $code);
	}

	function showSheet(){
		$ti = 1; // tab-index

		echo '
			<article id="answersWrapper">
			';
			for( $i = 1; $i <= Game::NUMBEROFROUNDS; $i++ ){
				echo '
					<div class="round">
						<h3 class="center">Round '.$i.'</h3>
				';
				for( $a = 1; $a <= Game::NUMBEROFANSWERS; $a++, $ti++ ){
					$p = $_SESSION['game'][$i][$a]['points'];
					if( isset($p) && $p !== 'none' ){
						$points = $p;
						$class = $p <= 0 ? 'strike' : '';
					}
					else {
						$class = '';
						$points = '';
					}
					echo '
						<div class="answer">
							<span class="answerNumber">'.$a.')</span>
							<div class="answerLine">
								<input type="text" class="answerLine '.$class.'" name="answer"
										data-round="'.$i.'" data-number="'.$a.'" tabindex="'.$ti.'"
										value="'.$_SESSION['game'][$i][$a]['text'].'">
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
				echo '
					</div>
				';
			}

		echo '

			</article>
		';

	}


}