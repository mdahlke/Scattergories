<?php

require( 'GameList.php' );
class GameSheet extends GameList {

	public function __construct($con, $list){
		parent::__construct($con, $list);
	}

	function showSheet(){
		$ti = 1; // tab-index

		echo '
			<article id="answersWrapper">
			';
			for( $i = 1; $i <= Game::NUMBEROFROUNDS; $i++ ){
				echo '
					<div class="round">
				';
				for( $a = 1; $a <= Game::NUMBEROFANSWERS; $a++, $ti++ ){
					echo '
						<div class="answer">
							<span class="answerNumber">'.$a.')</span>
							<input type="text" class="answerLine" name="answer"
									data-round="'.$i.'" tabindex="'.$ti.'">
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