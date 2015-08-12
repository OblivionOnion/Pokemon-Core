<?php

function logActivity($message, $uid, $image = '') {
	$uid     = (int) $uid;
	$message = cleanSql($message);
	$image   = cleanSql($image);
	$time    = time();
	
	mysql_query("INSERT INTO `activity` (`message`, `uid`, `time`, `image`) VALUES ('{$message}', '{$uid}', '{$time}', '{$image}')");
}

function getUserTeamIds($uid) {
	$uid = (int) $uid;
	$query = mysql_query("SELECT `poke1`,`poke2`,`poke3`,`poke4`,`poke5`,`poke6` FROM `users` WHERE `id`='{$uid}' LIMIT 1");
	
	if (mysql_num_rows($query) == 0) {
		return false;
	}
	
	return mysql_fetch_assoc($query);
}

function getUserPokemon($pid) {
	$pid = (int) $pid;
	$query = mysql_query("SELECT * FROM `user_pokemon` WHERE `id`='{$pid}' LIMIT 1");
	
	if (mysql_num_rows($query) == 0) {
		return false;
	}
	
	return mysql_fetch_assoc($query);
}

function updateUserMoney($uid, $money) {
	$uid   = (int) $uid;
	$money = (int) $money;
	
	mysql_query("UPDATE `users` SET `money`={$money} WHERE `id`='{$uid}' LIMIT 1");
	
	return true;
}

function getUserMoney($uid) {
	$uid = (int) $uid;
	$query = mysql_query("SELECT `money` FROM `users` WHERE `id`='{$uid}' LIMIT 1");
	
	if (mysql_num_rows($query) == 0) {
		return false;
	}
	
	$userMoney = mysql_fetch_assoc($query);

	return (int) $userMoney['money'];
}

function giveUserPokemonByName($uid, $pokeName, $level, $prefix = '') {

	$pokeName = cleanSql($pokeName);
	$query = mysql_query("SELECT * FROM `pokemon` WHERE `name`='{$pokeName}' LIMIT 1");
	
	if (mysql_num_rows($query) == 0) {
		return false;
	}
	
	$pokeRow = cleanSql( mysql_fetch_assoc($query) );
	$prefix  = cleanSql($prefix);
	$uid     = (int) $uid;
	$level   = (int) $level;
	$exp     = levelToExp($level);
	
	mysql_query("
		INSERT INTO `user_pokemon` (
			`uid`, `name`, `level`, `exp`, `move1`, `move2`, `move3`, `move4`
		) VALUES (
			'{$uid}', '{$prefix}{$pokeRow['name']}', '{$level}', '{$exp}', '{$pokeRow['move1']}', '{$pokeRow['move2']}', '{$pokeRow['move3']}', '{$pokeRow['move4']}'
		)
	");
	
	$query = mysql_query("SELECT `id` FROM `user_pokemon` WHERE `uid`='{$uid}'");
	$numPokes = mysql_num_rows($query);
	if ($numPokes <= 6) {
		if ($numPokes < 1) { $numPokes = 1; }
		$pokeId = mysql_insert_id();
		mysql_query("UPDATE `users` SET `poke{$numPokes}`='{$pokeId}' WHERE `id`='{$uid}'");
	}
	
	return true;
}

function cleanSql($input) {
	
	if (is_array($input)) {
		foreach ($input as $k => $v) {
			$output[$k] = cleanSql($v);
		}
	} else {
		$output = (string) $input;
		$output = mysql_real_escape_string($output);
	}
	
	return $output;
}

function cleanHtml($input) {
	
	if (is_array($input)) {
		foreach ($input as $k => $v) {
			$output[$k] = cleanHtml($v);
		}
	} else {
		$output = (string) $input;
		$output = htmlentities($output, ENT_QUOTES, 'UTF-8');
	}
	
	return $output;
}

function isLoggedIn() {
	return isset($_SESSION['userid']);
}

function adminOnly() {
	if (!isset($_SESSION['userid'])) {
		redirect('../login.php');
	} else if (!isset($_SESSION['admin']) || $_SESSION['admin'] != 1) {
		redirect('../membersarea.php');
	}
}

function redirect($location) {
	header('Location: '.$location);
	exit;
}

function expToLevel($exp) {

	for ($i=100000; $i>0; $i--) {
		if ($exp >= levelToExp($i)) {
			return $i;
		}
	}

	return 0;
}

function levelToExp($level) {
	return ($level*$level)*10;
}

function cellsToRows($cells, $numColumns) {
	$tableRows = '';
	for ( $i=0; $i<count($cells); $i+=$numColumns ) {
		$tableRows .= '<tr>';
		for ($j=$i; $j<$i+$numColumns; $j++) {
			if ( isset($cells[$j]) ) {
				$tableRows .= '<td>'.$cells[$j].'</td>';
			}
		}
		$tableRows .= '</tr>';
	}
	return $tableRows;
}






function mysqlconnect(){

global $db;

$host = 'pokemoncore.db.11569752.hostedresource.com';
$port = 3306; // This is the default port for MySQL
$database = 'pokemoncore';
$username = 'pokemoncore';
$password = 'Temping12!';

    // Construct the DSN, or "Data Source Name".  Really, it's just a fancy name
    // for a string that says what type of server we're connecting to, and how
    // to connect to it.  As long as the above is filled out, this line is all
    // you need :)
    $dsn = "mysql:host=$host;port=$port;dbname=$database";

    // Connect!
    $db = new PDO($dsn, $username, $password);
global $db;
    // Return PDO object
    return $db;
	
}

?>
