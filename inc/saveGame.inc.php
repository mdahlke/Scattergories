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

if( isset($_GET['code']) ){
	$_SESSION['game'][$round][$number]['code'] = $_GET['code'];
}
if( isset($_GET['point']) ){
	echo $_SESSION['game'][$round][$number]['points'];
	if( $_GET['poing'] == '' ){
		$point = 'none';
	}
	if( is_numeric( $_GET['point'] ) ){
		$point = $_GET['point'];
	}
	if( $_SESSION['game'][$round][$number]['points'] !== 'none' && $point < 0) {
		$point = 0;
	}
	$_SESSION['game'][$round][$number]['points'] = $point;

}
else {
	$point = 'none';
}

$_SESSION['game'][$round][$number]['text'] = $value;


?>
