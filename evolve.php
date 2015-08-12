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
$type = '';

if (mysql_num_rows($query) == 0 || $pokemon['uid'] != $uid) {
	die('error');
}

if (strpos($pokemon['name'], 'Shiny ') === 0) {
	$pokemon['name'] = str_replace('Shiny ', '', $pokemon['name']);
	$type = 'Shiny ';
}


echo '<div class="sub-content"> 
	<div class="header">..::  Evolve ::..</div>';


if (isset($_GET['eid'])) {
	$eid = (int) $_GET['eid'];
	$query = mysql_query("SELECT * FROM `evolution` WHERE `before`='{$pokemon['name']}' AND `id`='{$eid}' LIMIT 1");
	
	if (mysql_num_rows($query) == 0) {
		echo '<div class="error">There was an error.</div>';
	} else {
		$epokemon = mysql_fetch_assoc($query);
		
		$query = mysql_query("SELECT * FROM `user_items` WHERE `uid`='{$uid}' LIMIT 1");
		$userItems = mysql_fetch_assoc($query);
		
		$items = array(
			'Dawn Stone'    => 'dawn_stone',
			'Dusk Stone'    => 'dusk_stone',
			'Fire Stone'    => 'fire_stone',
			'Leaf Stone'    => 'leaf_stone',
			'Moon Stone'    => 'moon_stone',
			'Oval Stone'    => 'oval_stone',
			'Shiny Stone'   => 'shiny_stone',
			'Sun Stone'     => 'sun_stone',
			'Thunder Stone' => 'thunder_stone',
			'Water Stone'   => 'water_stone'
		);

		if ($pokemon['level'] < $epokemon['level'] && $epokemon['level'] != 0) {
			echo '
				<div class="error">
					'.$type.$pokemon['name'].' needs to be level '.$epokemon['level'].' to evolve.
				</div>
			';
		} else if (!empty($epokemon['item']) && $userItems[ $items[ $epokemon['item'] ] ] <= 0) {
			echo '
				<div class="error">
					'.$type.$pokemon['name'].' needs a '.$epokemon['item'].' to evolve.
				</div>
			';
		} else {
			echo '
				<table style="margin: 30px auto;">
					<tr>
						<td><img src="images/pokemon/'.$type.$pokemon['name'].'.png" /></td>
						<td> -> </td>
						<td><img src="images/pokemon/'.$type.$epokemon['after'].'.png" /></td>
					</tr>
					<tr>
						<td colspan="3">'.$type.$pokemon['name'].' has evolved into '.$type.$epokemon['after'].'</td>
					</tr>
				</table>
			';
			
			$q = mysql_query("SELECT * FROM `pokemon` WHERE `name`='{$epokemon['after']}'");
			$moves = mysql_fetch_assoc($q);
			$moveSql = '';
			
			if (isset($_POST['moves'])) {
				$moveSql = ", `move1`='{$moves['move1']}', `move2`='{$moves['move2']}', `move3`='{$moves['move3']}', `move4`='{$moves['move4']}' ";
			}
			
			mysql_query("UPDATE `user_pokemon` SET `name`='{$type}{$epokemon['after']}' {$moveSql} WHERE `id`='{$pid}' LIMIT 1");
			
			if (!empty($epokemon['item'])) {
				$cname = $items[ $epokemon['item'] ];
				mysql_query("UPDATE `user_items` SET `{$cname}`=`{$cname}`-1 WHERE `uid`='{$uid}' LIMIT 1");
			}
		}
	}
} else {
	echo '
		<div style="text-align: center;">
			<img src="images/pokemon/'.$type.$pokemon['name'].'.png" /><br />
			Level: '.$pokemon['level'].'
		</div>
	';


	$query = mysql_query("SELECT * FROM `evolution` WHERE `before`='{$pokemon['name']}'");

	if (mysql_num_rows($query) == 0) {
		echo '<div class="error">'.$type.$pokemon['name'].' does not evolve.</div>';
	} else {
		while ($epokemon = mysql_fetch_assoc($query)) {
			$q = mysql_query("SELECT * FROM `pokemon` WHERE `name`='{$epokemon['after']}'");
			$moves = mysql_fetch_assoc($q);
			echo '
				<hr style="width: 500px; margin: 0 auto;" />
				<form action="evolve.php?id='.$pid.'&eid='.$epokemon['id'].'" method="post" style="text-align: center;">
					<table style="margin: 30px auto; text-align: center;">
						<tr>
							<td><img src="images/pokemon/'.$type.$pokemon['name'].'.png" /></td>
							<td> -> </td>
							<td><img src="images/pokemon/'.$type.$epokemon['after'].'.png" /></td>
						</tr>
						<tr>
							<td colspan="3">
								<input type="checkbox" checked="checked" name="moves" />
								Change moves to '.$moves['move1'].', '.$moves['move2'].', '.$moves['move3'].' and '.$moves['move4'].'?
							</td>
						</tr>
						<tr>
							<td colspan="3"><input type="submit" value="Evolve into '.$type.$epokemon['after'].'" /></td>
						</tr>
					</table>
				</form>
			';
		}
	}
}

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
