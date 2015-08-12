<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

 <?php
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
echo '<div class="sub-content"> 
	<div class="header">..::  Shop ::..</div>';
$uid = (int) $_SESSION['userid'];

$query = mysql_query("SELECT * FROM `user_items` WHERE `uid`='{$uid}' LIMIT 1");
$itemAmounts = mysql_fetch_assoc($query);

$query = mysql_query("SELECT `money` FROM `users` WHERE `id`='{$uid}' LIMIT 1");
$userMoney = mysql_fetch_assoc($query);
$userMoney = $userMoney['money'];

$items = array(
	'poke_ball' => array(
		'name' => 'Poke Ball',
		'price' => 500
	),
	'great_ball' => array(
		'name' => 'Great Ball',
		'price' => 1000
	),
	'ultra_ball' => array(
		'name' => 'Ultra Ball',
		'price' => 2000
	),
	'master_ball' => array(
		'name' => 'Master Ball',
		'price' => 5000
	),
	'potion' => array(
		'name' => 'Potion',
		'price' => 200
	),
	'super_potion' => array(
		'name' => 'Super Potion',
		'price' => 500
	),
	'hyper_potion' => array(
		'name' => 'Hyper Potion',
		'price' => 1000
	),
	'burn_heal' => array(
		'name' => 'Burn Heal',
		'price' => 300
	),
	'full_heal' => array(
		'name' => 'Full Heal',
		'price' => 1500
	),
	'parlyz_heal' => array(
		'name' => 'Parlyz Heal',
		'price' => 300
	),
	'antidote' => array(
		'name' => 'Antidote',
		'price' => 200
	),
	'awakening' => array(
		'name' => 'Awakening',
		'price' => 200
	),
	'ice_heal' => array(
		'name' => 'Ice Heal',
		'price' => 100
	),
	'dawn_stone' => array(
		'name' => 'Dawn Stone',
		'price' => 100
	),
	'dusk_stone' => array(
		'name' => 'Dusk Stone',
		'price' => 100
	),
	'fire_stone' => array(
		'name' => 'Fire Stone',
		'price' => 100
	),
	'leaf_stone' => array(
		'name' => 'Leaf Stone',
		'price' => 100
	),
	'moon_stone' => array(
		'name' => 'Moon Stone',
		'price' => 100
	),
	'oval_stone' => array(
		'name' => 'Oval Stone',
		'price' => 100
	),
	'shiny_stone' => array(
		'name' => 'Shiny Stone',
		'price' => 100
	),
	'sun_stone' => array(
		'name' => 'Sun Stone',
		'price' => 100
	),
	'thunder_stone' => array(
		'name' => 'Thunder Stone',
		'price' => 100
	),
	'water_stone' => array(
		'name' => 'Water Stone',
		'price' => 100
	)
);

if (isset($_POST['buy'])) {
	
	$totalCost = 0;
	$updateSqlArray = array();
	$newItemAmounts = $itemAmounts;
	$totalItems = 0;
	
	foreach ($_POST as $item => $amount) {
		$amount = (int) $amount;
		$amount = $amount < 1 ? 0 : $amount;
		
		if (array_key_exists($item, $items) && $amount > 0) { 
			$totalCost += $amount * $items[$item]['price'];
			$updateSqlArray[] = "`$item`=`$item`+$amount";
			$newItemAmounts[$item] += $amount;
			$totalItems += $amount;
		}
	}
	
	if ($totalItems == 0) {
		echo '<div class="error">You did not select any items.</div>';
	} elseif ($totalCost > $userMoney) {
		echo '<div class="error">You do not have enough money.</div>';
	} else {
		echo'<div class="notice">Transaction Successful!</div>';
		
		$updateSql = implode(', ', $updateSqlArray);
		mysql_query("UPDATE `user_items` SET {$updateSql} WHERE `uid`='{$uid}'");
		
		mysql_query("UPDATE `users` SET `money`=`money`-$totalCost WHERE `id`='{$uid}'");
		$userMoney -= $totalCost;
		$itemAmounts = $newItemAmounts;
	}
}

$query = mysql_query("SELECT * FROM `user_items` WHERE `uid`='{$uid}'");
$row = mysql_fetch_assoc($query);

echo '
	<div style="text-align: center; margin: 30px auto; ">
		You have $'.number_format($userMoney).'<br /><br />
		
	</div>
	<form action="" method="post">
	<table class="pretty-table">
		<tr>
			<td>&nbsp;</td>
			<td>Name</td>
			<td>You have</td>
			<td>Amount to buy</td>
		</tr>
';

foreach ($items as $cname => $item) {
	echo '
		<tr>
			<td><img src="images/items/'.$item['name'].'.png" align="middle"/></td>
			<td>'.$item['name'].'</td>
			<td>'.$itemAmounts[$cname].'</td>
			<td>
				<select name="'.$cname.'">
					<option value="0">0</option>
					<option value="1">1</option>
					<option value="5">5</option>
					<option value="10">10</option>
					<option value="25">25</option>
					<option value="50">50</option>
					<option value="100">100</option>
                                        <option value="500">500</option>
                                        <option value="1000">1000</option>

				</select> ($'.number_format($item['price']).' each)
			</td>
		</tr>
	';
}

echo '
		<tr>
		
			<td colspan="4">
			<center>
			<input type="submit" name="buy" value="Buy Items">
			</center>
			</td>
			
		</tr>
	</table>
	</form>
';
echo '</div>';
echo '</div>';


?>

   
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
