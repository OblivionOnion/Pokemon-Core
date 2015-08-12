<?php
error_reporting(0);
session_start();



/******************************************************
------------------Required Configuration---------------
Please edit the following variables so the members area
can work correctly.
******************************************************/

if (!isset($_SESSION['admin']) || $_SESSION['admin'] != 1) {
	//die('');
}


//We log to the DataBase
mysql_connect("pokemoncore.db.11569752.hostedresource.com", "pokemoncore", "Temping12!");
mysql_select_db("pokemoncore");

//Webmaster Email
$mail_webmaster = 'example@example.com';

//Top site root URL
$url_root = 'http://www.example.com/';


/******************************************************
-----------------Optional Configuration----------------
******************************************************/

//Home page file name
$url_home = 'membersarea.php';

//Design Name
$design = 'default';


// asdd stuffz
$filename = end( explode('/', $_SERVER["SCRIPT_NAME"]) );

if ($filename != 'battle.php') {
unset($_SESSION['battle']);
}

if (isset($_SESSION['userid'])) {
	$uid = (int) $_SESSION['userid'];
	$time = time();
	$id = (int) $_SESSION['username'];	
	mysql_query("UPDATE `users` SET `lastseen`='{$time}' WHERE `id`='{$uid}' LIMIT 1");
}


// basic check for sql injection
if (
	stripos($_SERVER['QUERY_STRING'], 'UNION') !== false ||
	stripos($_SERVER['QUERY_STRING'], 'SELECT') !== false ||
	stripos($_SERVER['QUERY_STRING'], 'SCRIPT') !== false
) {
	$fh = @fopen('sqli_attempts.txt', 'a') or die();
	fwrite($fh, $_SERVER['REMOTE_ADDR'] . ' ' . $_SERVER['SCRIPT_NAME'] . ' ' . $_SERVER['QUERY_STRING']);
	fclose($fh);
}





if (!function_exists('stripslashes_deep')) {
	function stripslashes_deep($value) {
	    $value = is_array($value) ? array_map('stripslashes_deep', $value) : stripslashes($value) ;
	    return $value;
	}
}

// stop magic quotes
if (get_magic_quotes_gpc()) {
	$_POST = stripslashes_deep($_POST);
	$_GET  = stripslashes_deep($_GET);
}



$tbl_name="Banned"; 


$sql="SELECT * FROM $tbl_name WHERE user='".$_SESSION['username']."'";
$result = mysql_query($sql);

// Replace counting function based on database you are using.
$count = mysql_num_rows($result);
// If result matched $myusername and $mypassword, table row must be 1 row

if($count == 1){

 echo '<META HTTP-EQUIV="Refresh" Content="0; URL=banned.php">';    
    exit; 
}


?>
