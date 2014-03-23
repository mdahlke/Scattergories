<?php session_start();
//var_dump($_SESSION['game']);
foreach( $_SESSION['game'] as $game){
	foreach( $game as $round => $k ){
		var_dump($round);
		echo $key;
	}
}

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

