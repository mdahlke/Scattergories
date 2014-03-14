<?php

require( 'Game.php' );
class GameList extends Game {

	function __construct($con, $list, $code) {
		parent::__construct($con, $list, $code);
	}

	function getList(){

	}

	function showList(){
		$list = '
			<article id="listWrapper">
				<h3 class="center">List '.$this->list.'</h3>
		';
		$getList = $this->con->query('
			SELECT *
			FROM list
			WHERE id = "'.$this->list.'"
		')->fetch_assoc();
		for($i = 1; $i <= Game::NUMBEROFANSWERS; $i++){
			$list .= '
				<div class="category">
					<span class="categoryNumber">'.$i.')</span>
					<span class="categoryTopic">'.$getList[$i].'</span>
				</div>
			';
		}
		$list .= '
			</article>
		';
		return $list;

	}

}
?>
