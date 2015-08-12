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



switch ($_GET['d']) {
	case 'g':
		$minLevel = 5;
		$maxLevel = 10;
		$numPokes = 1;
	break;
	
	case 'e':
		$minLevel = 5;
		$maxLevel = 10;
		$numPokes = 3;
	break;

	case 'h':
		$minLevel = 15;
		$maxLevel = 20;
		$numPokes = 6;
	break;

        case 'n':
		$minLevel = 25;
		$maxLevel = 35;
		$numPokes = 6;
	break;
	
	case 'i':
		$minLevel = 40;
		$maxLevel = 50;
		$numPokes = 6;
	break;
       
        case 'm':
		$minLevel = 60;
		$maxLevel = 70;
		$numPokes = 6;
	break;

       case 'a':
		$minLevel = 80;
		$maxLevel = 90;
		$numPokes = 6;
	break;
	
	case 'v':
		$minLevel = 95;
		$maxLevel = 100;
		$numPokes = 6;
	break;

	
	default:
	case 'p':
		$_GET['d'] = 'p';
		$minLevel = 30;
		$maxLevel = 50;
		$numPokes = 3;
	break;
}

$query = mysql_query("SELECT `id` FROM `pokemon` ORDER BY `id` DESC LIMIT 1");
$lastId = mysql_fetch_assoc($query);
$lastId = $lastId['id'];

$cells = array();

for ($i=0;$i<$numPokes;$i++ ){
	$randId = rand(1, $lastId);
	$query = mysql_query("SELECT * FROM `pokemon` WHERE `id`>=$randId AND `name`!='' LIMIT 1");
	$_SESSION['battle']['opponent'][$i] = mysql_fetch_assoc($query);
	
	$randomLevel = rand($minLevel, $maxLevel);
	$_SESSION['battle']['opponent'][$i]['level'] = $randomLevel;
	$_SESSION['battle']['opponent'][$i]['maxhp'] = $randomLevel*5;
	$_SESSION['battle']['opponent'][$i]['hp'] = $randomLevel*5;
	
	$cells[] = '
		<img src="images/pokemon/'.$_SESSION['battle']['opponent'][$i]['name'].'.png" /><br />
		'.$_SESSION['battle']['opponent'][$i]['name'].'<br />
		Level: '.$_SESSION['battle']['opponent'][$i]['level'].'<br />
		HP: '.$_SESSION['battle']['opponent'][$i]['hp'].'/'.$_SESSION['battle']['opponent'][$i]['maxhp'].'
	';
}
$_SESSION['battle']['rebattlelink'] = '<a href="train.php?d='.$_GET['d'].'&rebattle">Rebattle This Training Account</a>';
$_SESSION['battle']['onum'] = 0;

if (isset($_GET['rebattle'])) {
	redirect('battle.php');
}



echo '<div class="sub-content"> 
	<div class="header">..::  Training Area ::..</div>';

echo '
	<div style="text-align: center;">
		<a href="?d=g">Level 5-10</a> &bull; <a href="?d=e">Level 5-10 x3</a> &bull; <a href="?d=h">Level 15-20 x6</a> &bull; <a href="?d=n">Level 25-35 x6</a> &bull; <a href="?d=i">Level 40-50 x6</a> &bull; <a href="?d=m">Level 60-70 x6</a> &bull; <a href="?d=a">Level 80-90 x6</a> &bull;  <a href="?d=v">Level 95-100 x6</a> 

	</div>

	<table border="1" style="border-collapse: collapse; text-align:center; margin: 30px auto; width: 500px;">
		'.cellsToRows($cells, 3).'
		<tr>
			<td colspan="3">
				<form action="battle.php" method="post">
					<input type="submit" value="Battle!">
				</form>
			</td>
		</tr>
	</table>
';
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
