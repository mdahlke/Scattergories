<?php session_start();
require_once( 'db.inc.php' );

if( $_GET['refer'] !== 'index' ){
	echo 'Bad refer. Fix it.';
	exit;
}

$gameCode = $_GET['gameCode'];
try {
	$status = $con->query('
		SELECT *
		FROM game
		WHERE code = "'. $gameCode .'"
	')->fetch_assoc();
	
	echo json_encode($status);

}
catch( Exception $e ){
	echo $e->getMessage();
}
?>
