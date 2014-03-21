<?php session_start();
require_once( 'db.inc.php' );

if( $_GET['refer'] !== 'index' ){
	echo 'Bad Referrer. Fix it.';
	exit;
}


$gameCode = $_GET['gameCode'];
$status = $_GET['status'] === 'start' ? 1 : 0;



try {

	$con->query('
		UPDATE game
		SET inProgress = "'. $status .'"
		WHERE code = "'. $gameCode .'"
	');

}
catch( Exception $e ){
	echo $e->getMessage();
}


?>
