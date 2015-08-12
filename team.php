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

	<div class="header">..::  Your Team ::..</div>';



$uid = (int) $_SESSION['userid'];



if ((isset($_GET['u']) && in_array($_GET['p'], range(2,6))) || (isset($_GET['d']) && in_array($_GET['p'], range(1,5)))) {

	$team    = getUserTeamIds($uid);

	$first   = (int) $_GET['p'];

	$second  = (int) $_GET['p'] + (isset($_GET['u']) ? -1 : 1 );

	$fPokeId = (int) $team['poke'.$first ];

	$sPokeId = (int) $team['poke'.$second];

	

	if ($fPokeId == 0 || $sPokeId == 0) {

		echo '<div class="error">You can not move this pokemon.</div>';

	} else {

		mysql_query("UPDATE `users` SET `poke{$second}`='{$fPokeId}', `poke{$first}`='{$sPokeId}' WHERE `id`='{$uid}' LIMIT 1");

	}

}



echo '

	<table class="pretty-table">

		<tr>

			<td>#</td>

			<td>Pokemon</td>

			<td>Level</td>

			<td>Exp</td>

			<td>Moves</td>

			<td>Options</td>

		</tr>

';



$team = getUserTeamIds($uid);



for ($i=1; $i<=6; $i++) {

	$pid = $team['poke'.$i];

	

	if ($pid == 0) {

		break;

	}

	

	$pokemon = getUserPokemon($pid);

	

	echo '

		<tr>

			<td>' . $i . '</td>

			<td><img src="images/pokemon/' . $pokemon['name'] . '.png" alt="' . $pokemon['name'] . '" /><br />' . $pokemon['name'] . '</td>

			<td>' . $pokemon['level'] . '</td>

			<td>' . number_format($pokemon['exp']) . '</td>

			<td>

				' . $pokemon['move1'] . '<br />

				' . $pokemon['move2'] . '<br />

				' . $pokemon['move3'] . '<br />

				' . $pokemon['move4'] . '<br />

			</td>

			<td>

	';

	

	$prevPid = $team['poke' . ($i-1)];

	if ($i <= 1 || (isset($prevPid) && $prevPid == 0)) {

		echo '<strike>Move Up</strike><br />';

	} else {

		echo '<a href="?u&p='.$i.'">Move Up</a><br />';

	}

	

	$nextPid = $team['poke' . ($i+1)];

	if ($i >= 6 || (isset($nextPid) && $nextPid == 0)) {

		echo '<strike>Move Down</strike><br /><br />';

	} else {

		echo '<a href="?d&p='.$i.'">Move Down</a><br /><br />';

	}



	echo '

				<a href="evolve.php?id='.$pokemon['id'].'">Evolve</a><br />

				<a href="change_attacks.php?id='.$pokemon['id'].'">Change Attacks</a>

			</td>

		</tr>

	';

}

echo '</table>';

echo '</div>';

echo '</div>';



?>







        

</div></div><center><script type="text/javascript"><!--

google_ad_client = "ca-pub-9678842478299123";

/* Pokemon Core Ads2 */

google_ad_slot = "8835563699";

google_ad_width = 468;

google_ad_height = 60;

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
