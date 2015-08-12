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


if (!isset($_SESSION['battle']) || !isset($_SESSION['userid'])) {
header('location: membersarea.php');
exit;
}

$uid = (int) $_SESSION['userid'];


echo '<div class="sub-content"> 
	<div class="header">..::  Battle ::..</div>';


function levelAndPowerDamage($level, $move_power) {
	return ceil(($level/2) * ($move_power/20));
}

if (isset($_POST['cp']) && in_array($_POST['cp'], range(0, 5))) {
	$_SESSION['battle']['mynum'] = $_POST['cp'];
	$_SESSION['battle']['screen'] = 'battle';
}

if (!isset($_SESSION['battle']['screen'])) {
	$_SESSION['battle']['screen'] = 'pickpokemon';
}

if (!isset($_SESSION['battle']['usedpokemon'])) {
	$_SESSION['battle']['usedpokemon'] = array();
}


if (!isset($_SESSION['battle']['wild'])) {
	$_SESSION['battle']['wild'] = false;
}


if (isset($_POST['gotya'])) {
	$fh = @fopen('botters546.txt', 'a') or die();
	fwrite($fh, "{$_SESSION['userid']} - {$_SESSION['username']} - ". date('l jS \of F Y h:i:s A') ." - ". time() . PHP_EOL);
	fclose($fh);
	
	unset($_SESSION['battle']);
	die();
}


$hasWon = true;
foreach ($_SESSION['battle']['opponent'] as $pokemon) {
	if ($pokemon['hp'] > 0) {
		$hasWon = false;
		break;
	}
}
if ($hasWon == true) {
	$_SESSION['battle']['screen'] = 'winscreen';
}

if (isset($_SESSION['battle']['team'])) {
	$hasLost = true;
	foreach ($_SESSION['battle']['team'] as $pokemon) {
		if ($pokemon['hp'] > 0) {
			$hasLost = false;
			break;
		}
	}
	if ($hasLost == true) {
		$_SESSION['battle']['screen'] = 'losescreen';
	}
}
//print_r($_POST);
//unset($_SESSION['battle']['team']);

if (isset($_SESSION['battle']['screen']) && ($_SESSION['battle']['screen'] == 'winscreen' || $_SESSION['battle']['screen'] == 'losescreen')) {
	
	$winlose = $_SESSION['battle']['screen'] == 'winscreen' ? 'won' : 'lost' ;
	
	$fh = @fopen('battlelog3453.txt', 'a') or die();
	fwrite($fh, "{$_SESSION['userid']} - {$_SESSION['username']} - {$winlose} - ". date('l jS \of F Y h:i:s A') ." - ". time() . PHP_EOL);
	fclose($fh);
}

if ($_SESSION['battle']['screen'] == 'pickpokemon') {
	if (!isset($_SESSION['battle']['team'])) {
		$query = mysql_query("SELECT * FROM `users` WHERE `id`='{$uid}'");
		$res = mysql_fetch_assoc($query);
		
		for ($i=1; $i<=6; $i++) {
			$pid = (int) $res['poke'.$i];
			
			if ($pid > 0) {
				$query2 = mysql_query("SELECT * FROM `user_pokemon` WHERE `id`='{$pid}'");
				$res2 = mysql_fetch_assoc($query2);
				$res2['maxhp'] = $res2['level']*5;
				$res2['hp'] = $res2['level']*5;
				$_SESSION['battle']['team'][] = $res2;
			}
		}
	}

	
	function teamTable($team, $myTeam = false) {
		
		$tTable .= '<table class="team-table"><tr>';
		$selPoke = false;
		for ($i=0; $i<6; $i++) {
			$pokemon = $team[$i];
			
			if (!is_array($pokemon)) { break; }
			
			$attr = count($team)%2 == 1 && $i+1 == count($team) ? ' colspan="2"' : '' ;
			
			$rAttr = '';
			if (!$selPoke && $myTeam && $pokemon['hp'] > 0) {
				$rAttr = ' checked="checked"'; 
				$selPoke = true;
			}
			
			$radioStr = $myTeam && $pokemon['hp'] > 0 ? '<input type="radio" name="cp" value="'.$i.'" '.$rAttr.' />' : '' ;
			
			$strikeStart = $pokemon['hp'] <= 0 ? '<strike>' : '' ;
			$strikeStop  = $pokemon['hp'] <= 0 ? '</strike>' : '' ;
			
			$tTable .= '
				<td'.$attr.'>
					<img src="images/pokemon/'.$pokemon['name'].'.png" alt="'.$pokemon['name'].'" /><br />
					
					'.$strikeStart.'
						'.$radioStr.'<br />
						'.$pokemon['name'].'<br />
						Level: '.$pokemon['level'].'<br />
						HP: '.$pokemon['hp'].'/'.$pokemon['maxhp'].'
					'.$strikeStop.'
				</td>
			';
			
			
			if ($i == 1 || $i == 3) {
				$tTable .= '</tr><tr>';
			}
		}
		$tTable .= '</tr></table>';
		
		return $tTable;
	}
	
	$myTeam = &$_SESSION['battle']['team'];
	$opponentTeam = &$_SESSION['battle']['opponent'];
	
	echo '
		<form action="" method="post" style=" margin-bottom: 80px;">
			<table style="margin: 30px auto; text-align: center;">
				<tr>
					<th style="vertical-align: top; padding: 10px;">
						<h2 style="padding: 3px 0;">Your Team</h2>
						'.teamTable($myTeam, true).'
					</th>
					<th style="vertical-align: top; padding: 10px;">
						<h2 style="padding: 3px 0;">Opponents Team</h2>
						'.teamTable($opponentTeam, false).'
					</th>
				</tr>
				<tr>
					<th colspan="2" style="padding: 80px;">
					<p> </p>
							<p> </p>
									<p> </p>
						<input type="submit" name="" value="Fight!" style="padding: 10px 20px;" />
					</th>
				</tr>
			</table>
		</form>
	';
}

if ($_SESSION['battle']['screen'] == 'battle') {
	
	$items = array(
		'poke_ball'    => 'Poke Ball',
		'great_ball'   => 'Great Ball',
		'ultra_ball'   => 'Ultra Ball',
		'master_ball'  => 'Master Ball',
		'potion'       => 'Potion',
		'super_potion' => 'Super Potion',
		'hyper_potion' => 'Hyper Potion'
	);
		
	$opponentTeam = &$_SESSION['battle']['opponent'];
	$myTeam = &$_SESSION['battle']['team'];
	$pnum = &$_SESSION['battle']['mynum'];
	$onum = &$_SESSION['battle']['onum'];
	
	if (!in_array($pnum, $_SESSION['battle']['usedpokemon'])) {
	$_SESSION['battle']['usedpokemon'][] = $pnum;
	}
	
	
	if (isset($_POST['mnum']) && in_array($_POST['mnum'], range(1, 4))) {
		$moveUsed = $myTeam[$pnum]['move'.$_POST['mnum']];
		
		$query = mysql_query("SELECT * FROM `moves` WHERE `name`='{$moveUsed}'");
		$moveRow = mysql_fetch_assoc($query);
		
		$damageDone = levelAndPowerDamage($myTeam[$pnum]['level'], $moveRow['power']);
		$damageDone = $damageDone > $opponentTeam[$onum]['hp'] ? $opponentTeam[$onum]['hp'] : $damageDone ;
		
		$opponentTeam[$onum]['hp'] -= $damageDone;
		
		if ($moveUsed == 'Explosion' || $moveUsed == 'Self Destruct') {
			$myTeam[$pnum]['hp'] = 0;
		}
		
		
	} elseif (isset($_POST['item']) && in_array($_POST['item'], array_keys($items))) {
		$itemKey = $_POST['item'];
		
		$itemQuery = mysql_query("SELECT * FROM `user_items` WHERE `uid`='{$uid}'");
		$userItems = mysql_fetch_assoc($itemQuery);
		$useItem = true;
		
		if (strpos($itemKey, '_ball') !== false && $_SESSION['battle']['wild'] !== true) {
			$useItem = false;
		}
		
		$potions = array(
			'potion' => 50,
			'super_potion' => 150,
			'hyper_potion' => 300
		);
		
		if (strpos($itemKey, '_ball') !== false && $_SESSION['battle']['wild'] === true) {
			$chance = array(
				'poke_ball'   => 10,
				'great_ball'  => 40,
				'ultra_ball'  => 70,
				'master_ball' => 100
			);
			$randChance = rand(1, 100);
			
			if ($userItems[$itemKey] >= 1) {				
				if ($randChance <= $chance[$itemKey]) {
					$_SESSION['battle']['screen'] = 'caughtpokemon';
					$itemMsg = 'You used a '.$items[$itemKey].'<br /> and caught the pokemon';
				} else {
					$itemMsg = 'You used a '.$items[$itemKey].'<br /> and did not catch the pokemon';
				}
			}
		} else if ( in_array($itemKey, array_keys($potions)) ) {
			$itemMsg = 'You used a '.$items[$itemKey].'<br /> and '.$myTeam[$pnum]['name'].' gained '.$potions[$itemKey].' hp.';
			$myTeam[$pnum]['hp'] += $potions[$itemKey];
		}

		if ($userItems[$itemKey] >= 1) {
			if ($useItem === true) {
				mysql_query("UPDATE `user_items` SET `$itemKey`=`$itemKey`-1 WHERE `uid`='{$uid}'");
			}
		} else {
			$itemMsg = 'You do not have a '.$items[$itemKey].'.';
		}
	}
	
	if (isset($_POST['mnum']) || isset($_POST['item'])) {
		$omoveUsed = $opponentTeam[$onum]['move'.rand(1,4)];
		$query = mysql_query("SELECT * FROM `moves` WHERE `name`='{$omoveUsed}'");
		$moveRow = mysql_fetch_assoc($query);
		
		$odamageDone = levelAndPowerDamage($opponentTeam[$onum]['level'], $moveRow['power']);
		$odamageDone = $odamageDone > $myTeam[$pnum]['hp'] ? $myTeam[$pnum]['hp'] : $odamageDone ;
		
		$myTeam[$pnum]['hp'] -= $odamageDone;
		
		if ($omoveUsed == 'Explosion' || $omoveUsed == 'Self Destruct') {
			$opponentTeam[$pnum]['hp'] = 0;
		}
	}
	
	if ($opponentTeam[$onum]['hp'] <= 0) {
		$opponentTeam[$onum]['hp'] = 0;
		$_SESSION['battle']['screen'] = 'pickpokemon';
	}
	
	if ($myTeam[$pnum]['hp'] <= 0) {
		$myTeam[$pnum]['hp'] = 0;
		$_SESSION['battle']['screen'] = 'pickpokemon';
	}
	
	if ($myTeam[$pnum]['hp'] >= $myTeam[$pnum]['maxhp']) {
		$myTeam[$pnum]['hp'] = $myTeam[$pnum]['maxhp'];
	}
	//  id="'.rand(1000, 2000).'"
	echo '
	<form action="" method="post">
	<table style="text-align: center; width: 500px; margin: 0 auto;">
		<tr>
			<td>
				<img src="images/pokemon/'.$myTeam[$pnum]['name'].'.png" alt="'.$myTeam[$pnum]['name'].'" /><br />
				'.$myTeam[$pnum]['name'].'<br />
				HP: '.$myTeam[$pnum]['hp'].'/'.$myTeam[$pnum]['maxhp'].'<br />
			</td>
			<td>
				<img src="images/pokemon/'.$opponentTeam[$onum]['name'].'.png" alt="'.$opponentTeam[$onum]['name'].'" /><br />
				'.$opponentTeam[$onum]['name'].'<br />
				HP: '.$opponentTeam[$onum]['hp'].'/'.$opponentTeam[$onum]['maxhp'].'<br />
			</td>
		</tr>
	';

	if ($opponentTeam[$onum]['hp'] > 0 && $myTeam[$pnum]['hp'] > 0 && $_SESSION['battle']['screen'] != 'caughtpokemon') {
		if ((isset($omoveUsed, $odamageDone) || isset($moveUsed, $damageDone) || isset($itemMsg)) && $_SESSION['battle']['screen'] != 'caughtpokemon') {
			echo '<tr><td>&nbsp;</td></tr><tr>';
			
			if (isset($omoveUsed, $odamageDone)) {
				echo '<td>'.$opponentTeam[$onum]['name'].' used '.$omoveUsed.'<br /> and did '.$odamageDone.' damage.</td>';
			}
			
			if (isset($moveUsed, $damageDone)) {
				echo '<td>'.$myTeam[$pnum]['name'].' used '.$moveUsed.'<br /> and did '.$damageDone.' damage</td>';
			}
			
			if (isset($itemMsg)) {
				echo '<td>'.$itemMsg.'</td>';
			}
			
			echo '</tr>';
		}
	
		echo '
		<tr>><td></td><td>&nbsp;</td></tr>
			<tr><td></td><td>&nbsp;</td></tr>
			<tr>
			
				<td>
					<input type="radio" name="mnum" value="1" checked="checked" />'.$myTeam[$pnum]['move1'].'<br />
					<input type="radio" name="mnum" value="2" />'.$myTeam[$pnum]['move2'].'<br />
					<input type="radio" name="mnum" value="3" />'.$myTeam[$pnum]['move3'].'<br />
					<input type="radio" name="mnum" value="4" />'.$myTeam[$pnum]['move4'].'<br />
				</td>
				<td>
					'.$opponentTeam[$onum]['move1'].'<br />
					'.$opponentTeam[$onum]['move2'].'<br />
					'.$opponentTeam[$onum]['move3'].'<br />
					'.$opponentTeam[$onum]['move4'].'<br />
				</td>
			</tr>
			<tr><td colspan="2"><center><input type="submit" value="Attack!" /></center></td></tr>
		';
		//<input style="display: none;" type="submit" name="gotya" value="Attack!" />
	} else {
		if ($opponentTeam[$onum]['hp'] <= 0) {
			echo '<tr><td colspan="2">'.$opponentTeam[$onum]['name'].' has fainted!</td></tr>';
		} else if ($myTeam[$pnum]['hp'] <= 0) {
			echo '<tr><td colspan="2">'.$myTeam[$pnum]['name'].' has fainted!</td></tr>';
		} else if ($_SESSION['battle']['screen'] == 'caughtpokemon') {
			echo '<tr><td colspan="2">'.$itemMsg.'</td></tr>';
		}
		echo '<tr><td colspan="2"><center><input type="submit" value="Continue!" /></center></td></tr>';
	}
	echo '
	</table>
	</form>
	';
	
	if ($opponentTeam[$onum]['hp'] > 0 && $myTeam[$pnum]['hp'] > 0 && $_SESSION['battle']['screen'] != 'caughtpokemon') {
		$itemQuery = mysql_query("SELECT * FROM `user_items` WHERE `uid`='{$uid}'");
		$userItems = mysql_fetch_assoc($itemQuery);
		
		echo '
			<form action="" method="post">
			<table style="margin: 20px auto;">
		';
		
		foreach ($items as $cname => $item) {
			if (strpos($cname, '_ball') !== false && $_SESSION['battle']['wild'] === false) {
				continue;
			}
			echo '
				<tr>
					<td><img src="images/items/'.$item.'.png" alt="'.$item.'" /></td>
					<td><input type="radio" name="item" value="'.$cname.'" /></td>
					<td>'.$userItems[$cname].' x '.$item.'</td>
				</tr>
			';
		}
		
		echo '
				<tr>
					<td colspan="3"><input type="submit" value="Use Item" /></td>
				</tr>
			</table>
			</form>
		';
	}
	
	if ($opponentTeam[$onum]['hp'] <= 0) {
		$onum++;
	}

} else if ($_SESSION['battle']['screen'] == 'winscreen') {

	mysql_query("UPDATE `users` SET `won`=`won`+1 WHERE `id`='{$uid}'");
	
	$olevel = 0;
	foreach ($_SESSION['battle']['opponent'] as $opoke) {
		$olevel += $opoke['level'];
	}
	
	$team = &$_SESSION['battle']['team'];
	$randMoney = rand(round($olevel*4.5), round($olevel*5));
	
	if ($randMoney < 100) {
		$randMoney = 100;
	}
	
	mysql_query("UPDATE `users` SET `money`=`money`+{$randMoney} WHERE `id`='{$uid}'");
	
	$myTotalLevel = 0;
	foreach ($_SESSION['battle']['usedpokemon'] as $pnum) {
		$myTotalLevel += $team[$pnum]['level'];
	}
	
	
	$randExp = ceil(($olevel / count($_SESSION['battle']['usedpokemon'])) * 15);

	if ($randExp < 150) {
		$randExp = 150;
	}
	

	
	foreach ($_SESSION['battle']['usedpokemon'] as $pnum) {
		/*
		$randExp = ceil((($team[$pnum]['level'] * $olevel) / 10) / count($_SESSION['battle']['usedpokemon']));
		
		if ($randExp < 250) {
			$randExp = 250;
		}
		
		if ($randExp > 5000) {
			$randExp = 5000;
		}
		*/
		
		
		$newExp = $team[$pnum]['exp'] + $randExp;
		echo '
			<div style="text-align:center; margin-bottom: 20px;">
				<img src="images/pokemon/'.$team[$pnum]['name'].'.png" alt="'.$team[$pnum]['name'].'" /><br />
				'.$team[$pnum]['name'].' + '.$randExp.'exp<br />
			
		';
		
		mysql_query("UPDATE `user_pokemon` SET `exp`={$newExp} WHERE `id`='{$team[$pnum]['id']}'") or die('f');

		$newLevel = expToLevel($newExp);
		if ($newLevel != $team[$pnum]['level']) {
			$levelsGained = $newLevel - $team[$pnum]['level'];
			echo $team[$pnum]['name'] . ' gained ' . $levelsGained . ' levels.<br />';
			mysql_query("UPDATE `user_pokemon` SET `level`={$newLevel} WHERE `id`='{$team[$pnum]['id']}'");
		}
		
		echo '</div>';
	}

	$gymMsg = '';
	if (isset($_SESSION['battle']['badge'])) {
		$badge = $_SESSION['battle']['badge'];
		$gymleader = $_SESSION['battle']['gymleader'];

		$gymMsg = '
			<p>
				<img src="images/badges/'.$badge.'.gif" alt="'.$badge.' Badge" />
				You have beaten '.$gymleader.' and earned yourself the '.$badge.' badge!
				<img src="images/badges/'.$badge.'.gif" alt="'.$badge.' Badge" />
			</p>
		';
		
		$query = mysql_query("SELECT `id` FROM `user_badges` WHERE `uid`='{$uid}' AND `badge`='{$badge}' LIMIT 1");
		
		if (mysql_num_rows($query) == 0) {
			mysql_query("INSERT INTO `user_badges` (`uid`, `badge`) VALUES ('{$uid}', '{$badge}')");
		}
		
		logActivity($_SESSION['username'].' beat '.$gymleader, $uid, 'images/gyms/'.$gymleader.'.png');
	}
	
	echo '
		<div style="text-align:center;">
			<h1>You Won!</h1>
			<p>You got $'.$randMoney.' for winning.</p>
			'.$gymMsg.'
		</div>
	';
	
	$rebattleLink = isset($_SESSION['battle']['rebattlelink']) ? $_SESSION['battle']['rebattlelink'].'<br />' : '' ;
	echo '
		<div style="text-align:center; margin: 30px 0px;">
			'.$rebattleLink.'
			<a href="team.php">My Team</a><br />
		</div>
	';
	
	unset($_SESSION['battle']);
	
} else if ($_SESSION['battle']['screen'] == 'losescreen') {
	mysql_query("UPDATE `users` SET `lost`=`lost`+1 WHERE `id`='{$uid}'");

	echo '
		<div style="text-align:center;">
			<h1>You Lost!</h1>
		</div>
	';
	
	$rebattleLink = isset($_SESSION['battle']['rebattlelink']) ? $_SESSION['battle']['rebattlelink'].'<br />' : '' ;
	echo '
		<div style="text-align:center; margin: 30px 0px;">
			'.$rebattleLink.'
			<a href="team.php">My Team</a><br />
		</div>
	';
	
	unset($_SESSION['battle']);
	
} else if ($_SESSION['battle']['screen'] == 'caughtpokemon') {

	$pokemon = $_SESSION['battle']['opponent'][ $_SESSION['battle']['onum'] ];
	
	logActivity($_SESSION['username'].' caught a '.$pokemon['name'], $uid, 'images/pokemon/'.$pokemon['name'].'.png');
	
	$level  = (int) $pokemon['level'];
	$name   = mysql_real_escape_string($pokemon['name']);
	$move1  = mysql_real_escape_string($pokemon['move1']);
	$move2  = mysql_real_escape_string($pokemon['move2']);
	$move3  = mysql_real_escape_string($pokemon['move3']);
	$move4  = mysql_real_escape_string($pokemon['move4']);
	
	$exp = levelToExp($level);
	mysql_query("INSERT INTO `user_pokemon` (`uid`, `name`, `level`, `exp`, `move1`, `move2`, `move3`, `move4`)
	VALUES ('{$uid}', '{$name}', '{$level}', '{$exp}', '{$move1}', '{$move2}', '{$move3}', '{$move4}')");
	
	$query = mysql_query("SELECT `id` FROM `user_pokemon` WHERE `uid`='{$uid}'");
	$numPokes = mysql_num_rows($query);
	if ($numPokes <= 6) {
		if ($numPokes < 1) { $numPokes = 1; }
		$pokeId = mysql_insert_id();
		mysql_query("UPDATE `users` SET `poke{$numPokes}`='$pokeId' WHERE `id`='{$uid}'");
	}
	
	echo '
		<div style="text-align:center;">
			<h1>You caught a '.$pokemon['name'].'!</h1>
			<p><img src="images/pokemon/'.$pokemon['name'].'.png" alt="'.$pokemon['name'].'" /></p>
		</div>
	';
	
	$rebattleLink = isset($_SESSION['battle']['rebattlelink']) ? $_SESSION['battle']['rebattlelink'].'<br />' : '' ;
	echo '
		<div style="text-align:center; margin: 30px 0px;">
			'.$rebattleLink.'
			<a href="team.php">My Team</a><br />
		</div>
	';
	
	unset($_SESSION['battle']);
}

echo '</div>';
echo '</div>';
?>



        
</div>

	
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <div id="copyright">
		Footer
		</div>
    </div>
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
