<?php
error_reporting(0);
	session_start();
	require_once 'functions.php';
$db = mysqlconnect();
mysql_connect("pokemoncore.db.11569752.hostedresource.com", "pokemoncore", "Temping12!");
mysql_select_db("pokemoncore");
//Test if it is a shared client
if (!empty($_SERVER['HTTP_CLIENT_IP'])){
  $ip23=$_SERVER['HTTP_CLIENT_IP'];
//Is it a proxy address
}elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
  $ip23=$_SERVER['HTTP_X_FORWARDED_FOR'];
}else{
  $ip23=$_SERVER['REMOTE_ADDR'];
}



$tbl_name="users"; 

$myusername = mysql_real_escape_string($_POST['myusername']);
	$mypassworduncript = mysql_real_escape_string($_POST['mypassword']);

	$mypassword = sha1($mypassworduncript);


	$sql2t = "SELECT * FROM `Banned` WHERE `user` = '" . $myusername . "' ";
	$resultt = mysql_query($sql2t) or die(mysql_error());
	$valuest = mysql_fetch_array($resultt);
	
	
	
if (mysql_num_rows($resultt)==0) {




$sql="SELECT * FROM $tbl_name WHERE username='$myusername' and  password='$mypassword'";
$result = mysql_query($sql);

// Replace counting function based on database you are using.
$count = mysql_num_rows($result);
// If result matched $myusername and $mypassword, table row must be 1 row

if($count == 1){
  // Register $myusername, $mypassword and redirect to file "login_success.php"
  
$_SESSION['username'] = $myusername ;


$sql2t = "SELECT * FROM `users` WHERE `username` = '" . $myusername . "'  ";
	$resultt = mysql_query($sql2t) or die(mysql_error());
	$valuest = mysql_fetch_array($resultt);
	
	

$_SESSION['userid']   = $valuest['id'];
			$_SESSION['admin']    = $valuest['admin'];
			
	
$sqlll = "INSERT INTO user_logins (username,ip) VALUES (?, ?)";
    $qq = $db->prepare($sqlll);
    $qq->execute(array($_SESSION['username'],$ip23));



	


header("Location: membersarea.php");





}} else {



  echo "Wrong Username or Password";
 

 
 
 
}


?>
