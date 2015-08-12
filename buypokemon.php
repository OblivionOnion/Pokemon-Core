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


$uid = (int) $_SESSION['userid'];
$userMoney = getUserMoney($uid);

switch ($_GET['type']) {
	case 'shiny':
		$type = 'Shiny ';
	break;
	
	default:
		$type = '';
	break;
}

$defaultPrice = 10000000;
$salePokemon = array(
	'Arceus (Bug)'      => $defaultPrice,
	'Arceus (Dark)'     => $defaultPrice,
	'Arceus (Dragon)'   => $defaultPrice,
	'Arceus (Electric)' => $defaultPrice,
	'Arceus (Fighting)' => $defaultPrice,
	'Arceus (Fire)'     => $defaultPrice,
	'Arceus (Flying)'   => $defaultPrice,
	'Arceus (Ghost)'    => $defaultPrice,
	'Arceus (Grass)'    => $defaultPrice,
	'Arceus (Ground)'   => $defaultPrice,
	'Arceus (Ice)'      => $defaultPrice,
	'Arceus (Poison)'   => $defaultPrice,
	'Arceus (Psychic)'  => $defaultPrice,
	'Arceus (Rock)'     => $defaultPrice,
	'Arceus (Steel)'    => $defaultPrice,
	'Arceus (Unknown)'  => $defaultPrice,
	'Arceus (Water)'    => $defaultPrice,
	'Deoxys (Attack)'   => $defaultPrice,
	'Deoxys (Defence)'  => $defaultPrice,
	'Deoxys (Speed)'    => $defaultPrice,
	'Rotom (Cut)'       => $defaultPrice,
	'Rotom (Frost)'     => $defaultPrice,
	'Rotom (Heat)'      => $defaultPrice,
	'Rotom (Spin)'      => $defaultPrice,
	'Rotom (Wash)'      => $defaultPrice
);

include '_header.php';
echo '<div class="sub-content"> 
	<div class="header">..::  Buy Pokemon ::..</div>';

if (isset($_POST['buyPoke'])) {

	$pokeName = $_POST['buyPoke'];
	if (in_array($pokeName, array_keys($salePokemon))) {
	
		$price = $salePokemon[$pokeName];
		if ($price > $userMoney) {
			echo '<div class="error">You do now have enough money!</div>';
		} else {
			$userMoney -= $price;
			giveUserPokemonByName($uid, $pokeName, 100, $type);
			updateUserMoney($uid, $userMoney);
			
			echo '
				<div class="notice">
					<img src="images/pokemon/'.$type.$pokeName.'.png" /><br />
					You bought a '.$type.$pokeName.'.
				</div>
			';
		}
	} else {
		echo '<div class="error">This pokemon is not for sale!</div>';
	}
}

$cells = array();
foreach ($salePokemon as $name => $price) {
	$cells[] = '
		<img src="images/pokemon/'.$type.$name.'.png" /><br />
		<input type="radio" name="buyPoke" value="'.$name.'" />
		'.$type.$name.'<br />
		$'.number_format($price).'<br />
	';
}


echo '
	<div style="text-align: center; margin: 30px auto; ">
		You have $'.number_format($userMoney).'<br /><br />
		
		<a href="buypokemon.php">Normal</a> &bull;
		<a href="buypokemon.php?type=shiny">Shiny</a>
	</div>
	<form action="" method="post">
		<table class="pretty-table">
			'.cellsToRows($cells, 5).'
			<tr>
				<td colspan="5"><input type="submit" value="Buy Pokemon"></td>
			</tr>
		</table>
	</form>
';



echo "<p>  </p>";

?>


</div>
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
