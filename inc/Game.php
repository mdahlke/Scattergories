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

}
?>
