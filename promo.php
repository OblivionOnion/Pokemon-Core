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







$uid = (int) $_SESSION['userid'];



function secondsToTimeSince($seconds) {

	$seconds    = (int) $seconds;

	$timeString = '';

	

	$days = floor($seconds / (60*60*24));

	$dStr = $days == 1 ? ' day ' : ' days ' ;

	

	$hours = floor(($seconds / (60*60)) % 24);

	$hStr  = $hours == 1 ? ' hour ' : ' hours ' ;

	

	$mins = floor(($seconds / 60) % 60);

	$mStr = $mins == 1 ? ' minute ' : ' minutes ' ;

	

	$seconds = $seconds % 60;

	

	$timeString .= $days  > 0 ? $days  . $dStr : '' ;

	$timeString .= $hours > 0 ? $hours . $hStr : '' ;

	$timeString .= $mins  > 0 ? $mins  . $mStr : '' ;

	$timeString .= $seconds . ' seconds';

	

	return $timeString; 

}





echo '<div class="sub-content"> 

	<div class="header">..::  Promo ::..</div>';







$query = mysql_query("SELECT `last_promo` FROM `users` WHERE `id`='{$uid}'");

$lastPromo = mysql_fetch_assoc($query);

$lastPromo = $lastPromo['last_promo'];



$midnightToday    = mktime(0, 0, 0, date('m'), date('d'), date('Y'));

$midnightTomorrow = mktime(0, 0, 0, date('m'), date('d')+1, date('Y'));

$timeNow          = time();







echo '<div style="text-align: center; margin: 30px 0px;">';

if ($lastPromo < $midnightToday) {



	$legends = array(

		'Genesect', 'Meloetta', 'Keldeo', 'Kyurem', 'Zekrom', 'Reshiram', 'Landorus',

		'Thundurus', 'Tornadus', 'Terrakion', 'Cobalion', 'Victini', 'Rotom', 'Mesprit',

		'Uxie', 'Azelf', 'Palkia', 'Heatran', 'Darkrai', 'Cresselia', 'Regigigas', 'Mew',

		'Rayquaza', 'Arceus', 'Giratina', 'Lugia', 'Ho-oh', 'Jirachi', 'Kyogre', 'Groudon',

		'Registeel', 'Regice', 'Regirock', 'Latias', 'Latios', 'Celebi', 'Raikou', 'Suicune',

		'Entei', 'Deoxys', 'Dialga', 'Mewtwo', 'Articuno', 'Moltres', 'Zapdos',

		'Manaphy', 'Shaymin', 'Phione', 'Virizion',

		

		'Arceus (Bug)', 'Arceus (Dark)', 'Arceus (Dragon)', 'Arceus (Electric)', 'Arceus (Fighting)',

		'Arceus (Fire)', 'Arceus (Flying)', 'Arceus (Ghost)', 'Arceus (Grass)', 'Arceus (Ground)',

		'Arceus (Ice)', 'Arceus (Poison)', 'Arceus (Psychic)', 'Arceus (Rock)', 'Arceus (Steel)',

		'Arceus (Unknown)', 'Arceus (Water)', 'Deoxys (Attack)', 'Deoxys (Defence)', 'Deoxys (Speed)',

		'Rotom (Cut)', 'Rotom (Frost)', 'Rotom (Heat)', 'Rotom (Spin)', 'Rotom (Wash)'

	);



	$nonLegendsSqlArray = array();

	foreach ($legends as $legend) {

		$nonLegendsSqlArray[] = " `name`!='{$legend}' ";

	}

	$nonLegendsSql = implode(' AND ', $nonLegendsSqlArray);



	$query = mysql_query("SELECT `name` FROM `pokemon` WHERE {$nonLegendsSql} ORDER BY RAND() LIMIT 1") or die();

	$rPoke = mysql_fetch_assoc($query);	

	$level = rand(20, 40);

	$type  = rand(1, 5) == 3 ? 'Shiny ' : '' ;



	giveUserPokemonByName($uid, $rPoke['name'], $level, $type);

	mysql_query("UPDATE `users` SET `last_promo`='{$timeNow}' WHERE `id`='{$uid}'");

	

	echo '

		<img src="images/pokemon/'.$type.$rPoke['name'].'.png" /><br />

		You have received a level '.$level.', '.$type.$rPoke['name'].'!

	';

} else {

	echo '

		You already got the promo for today!<br />

		The next free gift will be available in '.secondsToTimeSince($midnightTomorrow - $timeNow).'

	';

}

echo '</div>';



echo '</div>';



?>

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
