<?php

require( 'Game.php' );
class GameList extends Game {

	function __construct($con, $list) {
		parent::__construct($con, $list);
	}

	function getList(){

	}

	function showList(){
		echo '
			<article id="listWrapper">
		';
		$list = $this->con->query('
			SELECT *
			FROM list
			WHERE id = "'.$this->list.'"
		')->fetch_assoc();
		for($i = 1; $i <= Game::NUMBEROFANSWERS; $i++){
			echo '
				<div class="category">
					<span class="categoryNumber">'.$i.')</span>
					<span class="categoryTopic">'.$list[$i].'</span>
				</div>
			';
		}
		echo '
			</article>
		';

	}

}
?>
