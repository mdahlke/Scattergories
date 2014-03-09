<?php session_start();
require_once( 'db.inc.php' );

$game = $con->query('
	SELECT *
	FROM game
	WHERE code = "'.$_GET['code'].'"
')->fetch_assoc();

$list = $game['listID'];
$code = $game['code'];

$return = json_encode(array( 'list' => $list, 'code' => $code ));

$_SESSION['list'] = $list;
$_SESSION['code'] = $code;

mysqli_close( $con );

echo $return;


?>
