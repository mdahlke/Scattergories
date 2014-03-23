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

	if( $status ){
		echo json_encode( $status );
	}
	else {
		echo json_encode( array( 'error' => 'failed to retrieve value' ) );
	}

}
catch( Exception $e ){
	echo json_encode( array( 'error' => $e->getMessage() ) );
}

?>
