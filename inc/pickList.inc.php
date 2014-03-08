<?php
$con = new mysqli('localhost', 'mdahlke', 'Rpd8749**', 'scattergories');

if( isset($_GET['getList']) ) {
	$sql = $con->query('
		SELECT id, timesPlayed
		FROM list
		WHERE timesPlayed < (SELECT MAX(timesPlayed)
								FROM list
		)
	');

	if ($sql->num_rows === 0) {
		$sql = $con->query('
			SELECT id, timesPlayed
			FROM list
			WHERE timesPlayed <= (
				SELECT MAX(timesPlayed)
				FROM list
			)
		');
	}
	$max = $con->query('
		SELECT MAX(timesPlayed) as played
		FROM list
	')->fetch_object();

	$lists = array();
	$i = 0;
	while ( $list = $sql->fetch_assoc() ) {
	//	$max = $list['timesPlayed'] > $list['timesPlayed'] ? $list['timesPlayed'] : $max;
		//echo $max->played . '<br />';
		if ($list['timesPlayed'] <= $max->played) {
	//		echo $list['id'] . ': ' . $list['timesPlayed'] . ' <= '. $max->played .'<br />';
			$lists[] = array('id' => $list['id'], 'tp' => $list['timesPlayed']);
			$i++;
		}
	}

	$numberOfPossibleLists = count($lists);

	$randomList = rand(0, $numberOfPossibleLists - 1);
	$list = $lists[$randomList]['id'];
	//echo '<pre>';
	//var_dump($max);
	//var_dump($list[$randomList]);
	//echo '</pre>';

	$con->query('
		UPDATE list
		SET timesPlayed = timesPlayed + 1
		WHERE id = "' . $lists[$randomList]['id'] . '"
	');

//	$con->query('
//		UPDATE list SET timesPlayed = 0');

	mysqli_close( $con );

	$nicknames = array(
		'Sweet&nbsp;Cheeks,', 'La&nbsp;Teejery,', 'Baborade,', 'Love&nbsp;Muffin,', 
		'TEEEEEEEEJ!', 'Scat Lass!'
	);
	$nn = count( $nicknames ) - 1;
//	var_dump($nicknames);
	$nickname = $nicknames[rand( 0, $nn )];

	if( rand(0, 1000) > 999 ){
		$return = json_encode( array('nickname' => $nickname, 'list' => 'YOU!', 'filler' => 'I choose:') );
	}
	else {
		$return = json_encode( array('nickname' => $nickname, 'list' => $list, 'filler' => 'I choose list:') );
	}
	echo $return;
}

?>

