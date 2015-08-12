<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

 <?php
  require_once 'gym_functions.php';


  require_once 'config.php';
require_once 'functions.php';
  require_once 'sections/sidebarsin.php';
mysql_connect("pokemoncore.db.11569752.hostedresource.com", "pokemoncore", "Temping12!");
mysql_select_db("pokemoncore");


  if(isset($_SESSION['username']))
{

}else{
 echo '<META HTTP-EQUIV="Refresh" Content="0; URL=login.php">';    
    exit;
}
  ?>
<div id="container">
	<div id="banner">
    </div>
    
    

    
    <div id="content">

  <div class="CSSTableGenerator" >
 
 
 <?php

$pid = (int) $_GET['id'];
$uid = (int) $_SESSION['userid'];
$query = mysql_query("SELECT * FROM `user_pokemon` WHERE `id`='{$pid}' LIMIT 1");
$pokemon = mysql_fetch_assoc($query);

if (mysql_num_rows($query) == 0 || $pokemon['uid'] != $uid) {
	die('error');
}

$query = mysql_query("SELECT `money` FROM `users` WHERE `id`='{$uid}' LIMIT 1");
$userMoney = mysql_fetch_assoc($query);
$userMoney = $userMoney['money'];

function powerToPrice($power) {
	return ($power*100) + 250;
}


echo '<div class="sub-content"> 
	<div class="header">..::  Change Attacks ::..</div>';


if (isset($_POST['sid'], $_POST['mid'])) {
	$sid = (int) $_POST['sid'];
	$mid = (int) $_POST['mid'];
	
	$query = mysql_query("SELECT * FROM `moves` WHERE `id`='{$mid}' LIMIT 1");
	
	if (!in_array($sid, range(1,4)) || mysql_num_rows($query) == 0) {
		echo '<div class="error">Something went wrong.</div>';
	} else {
		$moveRow = mysql_fetch_assoc($query);
		$price = powerToPrice($moveRow['power']);
		
		if ($userMoney < $price) {
			echo '<div class="error">You do not have enough money.</div>';
		} else {
			mysql_query("UPDATE `user_pokemon` SET `move{$sid}`='{$moveRow['name']}' WHERE `id`='{$pid}' LIMIT 1");
			mysql_query("UPDATE `users` SET `money`=`money`-$price WHERE `id`='{$uid}' LIMIT 1");

			echo '
				<div class="notice">
					Your '.$pokemon['name'].' forgot '.$pokemon['move'.$sid].' and learned '.$moveRow['name'].'!
				</div>
			';
			
			$pokemon['move'.$sid] = $moveRow['name'];
			$userMoney -= $price;
		}
	}
}


$query = mysql_query("SELECT * FROM `moves` ORDER BY `type`, `name`");
$allMoves = array();

// order the moves by type
while ($move = mysql_fetch_assoc($query)) {
	$allMoves[$move['type']][] = $move;
}

echo '
	<form action="" method="post" style="text-align: center;">
		<br /><br />
		You have $'.number_format($userMoney).'.
		<br /><br />
		<img src="images/pokemon/'.$pokemon['name'].'.png" /><br />
		'.$pokemon['name'].'<br /><br />
		
		<input type="radio" name="sid" value="1" />'.$pokemon['move1'].'<br />
		<input type="radio" name="sid" value="2" />'.$pokemon['move2'].'<br />
		<input type="radio" name="sid" value="3" />'.$pokemon['move3'].'<br />
		<input type="radio" name="sid" value="4" />'.$pokemon['move4'].'<br />
		<br /><br /><hr style="width: 500px;" /><br /><br />
';


foreach ($allMoves as $type => $moves) {
	echo '<h2>'.$type.'</h2>';
	
	foreach ($moves as $move) {
		$price = powerToPrice($move['power']);
		echo '
			<input type="radio" name="mid" value="'.$move['id'].'" />
			'.$move['name'].' - $'. $price .'<br />
		';
	}
}
echo '<br /><br /><input type="submit" value="Change Attack" /><br /><br /></form>';

echo '</div>';

?>


</div>



  




<p>&nbsp;</p>




   
    <center><script type="text/javascript"><!--
google_ad_client = "ca-pub-9678842478299123";
/* Pokemon Core Ads2 */
google_ad_slot = "8835563699";
google_ad_width = 728;
google_ad_height = 90;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script></center>    

	
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <div id="copyright">
		Footer
		</div>
    </div>

    
    
    <div id="footer">
				<div align="center">Pokemon Core Rpg  - Present<br />
				  This site is not affilliated with Nintendo. The Pokemon Company, Creatures, or GameFreak
	  </div>  </div><center><script type="text/javascript"><!--
google_ad_client = "ca-pub-9678842478299123";
/* Pokemon Core Ads */
google_ad_slot = "6161298895";
google_ad_width = 728;
google_ad_height = 90;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script></center>

</div>
</body>
</html>
