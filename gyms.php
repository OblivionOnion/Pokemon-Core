<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

 <?php
  require_once 'config.php';
require_once 'functions.php';
 require_once 'gym_functions.php';
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

if (isset($_GET['leader'])) {
$leaderr= mysql_real_escape_string($_GET['leader']);
$leader = strip_tags($leaderr);


$leaderArray = getLeadersPokemonAndBadge($leader);

	if ($leaderArray !== false) {
		$i = 0;
		foreach ($leaderArray['pokemon'] as $pokeArray) {
			$name  = $pokeArray['name'];
			$level = $pokeArray['level'];
			
			$query = mysql_query("SELECT * FROM `pokemon` WHERE `name`='{$name}' LIMIT 1");		
			$_SESSION['battle']['opponent'][$i] = mysql_fetch_assoc($query);
			$_SESSION['battle']['opponent'][$i]['level'] = $level;
			$_SESSION['battle']['opponent'][$i]['maxhp'] = $level*5;
			$_SESSION['battle']['opponent'][$i]['hp'] = $level*5;
			$i++;
			//echo $name;
		}
		$_SESSION['battle']['onum'] = 0;
		$_SESSION['battle']['badge'] = $leaderArray['badge'];
		$_SESSION['battle']['gymleader'] = $leader;
		$_SESSION['battle']['rebattlelink'] = '<a href="gyms.php?leader='.$leader.'">Rebattle '.$leader.'</a>';
		 echo '<META HTTP-EQUIV="Refresh" Content="0; URL=battle.php">';    
    exit; 
	}
}



echo '<div class="sub-content"> 
	<div class="header">..::  Gyms ::..</div>';

$badges = array();
$query = mysql_query("SELECT * FROM `user_badges` WHERE `uid`='{$uid}'");
while ($row = mysql_fetch_assoc($query)) { $badges[] = $row['badge']; }

$leagueArray = getAllLeaguesLeadersAndBadges();

foreach ($leagueArray as $leagueName => $leader) {
	echo '<table class="pretty-table">';
	echo '<tr><th colspan="7"><h1 style="margin: 0;">'.$leagueName.'</h1></th></tr>';
	
	echo '<tr>';
	$count = 0;
	foreach ($leader as $leaderArray) {
		
		$badgeHtml = '';
		if (in_array($leaderArray['badge'], $badges)) {
			$badgeHtml = ' <img src="images/badges/'.$leaderArray['badge'].'.gif" /> ';
		}
		echo '
			<td style="width: 25%;">
				<a href="gyms.php?leader=' . $leaderArray['name'] . '">
					<img src="images/gyms/' . $leaderArray['name'] . '.png" alt="' . $leaderArray['name'] . '" /><br />
					' . $badgeHtml . $leaderArray['name'] . $badgeHtml. '
				</a>
			</td>
		';
		$count++;
		
		if ($count == 4) {
			echo '</tr><tr>';
		}
	}
	echo '</tr>';
	echo '</table>';
}


?> 



        
</div></div>
	
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
