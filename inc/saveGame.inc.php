<?php session_start();

/*
$_SESSION['game'] = array(
	'1' => array(

	),
	'2' => array(

	),
	'3' => array(

	)
);
*/
$round = $_GET['round'];
$number = $_GET['number'];
$value = $_GET['value'];
$point = isset( $_GET['point'] ) && $_GET['point'] != '' ? $_GET['point'] : 'none';

if( isset($_GET['code']) ){
	$_SESSION['game'][$round][$number]['code'] = $_GET['code'];
}
if( isset($_GET['point']) ){
	echo $_SESSION['game'][$round][$number]['points'];
	if( $_SESSION['game'][$round][$number]['points'] !== 'none' && $point < 0) {
		$point = 0;
	}
	//echo $point;
	$_SESSION['game'][$round][$number]['points'] = $point;
}

$_SESSION['game'][$round][$number]['text'] = $value;


?>
