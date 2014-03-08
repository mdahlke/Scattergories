<?php


class Game {
	protected $con;
	protected $list;
	const NUMBEROFROUNDS = 3;
	const NUMBEROFANSWERS = 12;

	function __construct($con, $list) {
		$this->con = $con;
		$this->list = $list;
	}

}
?>
