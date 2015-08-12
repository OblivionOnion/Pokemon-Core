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


 <div class="sub-content"> 
  <div class="header"><center>..:: Change Team ::..</div>




<?php
$pid = (int) $_GET['id'];
$uid = (int) $_SESSION['userid'];
$query = mysql_query("SELECT * FROM `user_pokemon` WHERE `id`='{$pid}' LIMIT 1");
$pokemon = mysql_fetch_assoc($query);




$teamIds = getUserTeamIds($uid);
$pokemon = getUserPokemon($pid);


if ($pokemon === false) {
 echo '<div class="error">Could not find the pokemon.</div>';
} elseif ($pokemon['uid'] != $uid) {
 echo '<div class="error">This pokemon does not belong to you.</div>';
} elseif (in_array($pokemon['id'], $teamIds)) {
 echo '<div class="error">This pokemon is already in your team</div>';
} else { 
 if (in_array($_POST['pos'], range(1, 6))) {
  $pos = (int) $_POST['pos'];
  
  for ($i=$pos; $i>0; $i--) {
   if ($teamIds['poke'.$i] == 0) {
    $pos = $i;
   }
  }
  
  mysql_query("UPDATE `users` SET `poke{$pos}`='{$pid}' WHERE `id`='{$uid}'");
  
  echo '
   <div class="notice">
    <img src="images/pokemon/'.$pokemon['name'].'.png" /><br />
    '.$pokemon['name'].' has been placed in your team!
   </div>
  ';
 } else {
  echo '
   <div style="text-align: center;">
    <img src="images/pokemon/'.$pokemon['name'].'.png" /><br />
    '.$pokemon['name'].'<br />
    Level: '.$pokemon['level'].'<br />
    Exp: '.$pokemon['exp'].'
   </div>
  ';
  
  $cells = array();
  $pos = 1;
  foreach ($teamIds as $pokeid) {
   $poke = getUserPokemon($pokeid);
   if ($poke === false) { break; }
   
   $cells[] = '
    <img src="images/pokemon/'.$poke['name'].'.png" /><br />
    '.$poke['name'].'<br />
    Level: '.$poke['level'].'<br />
    Exp: '.$poke['exp'].'<br /><br />
    
    <form method="post">
     <input type="hidden" name="pos" value="'.$pos.'" />
     <input type="submit" value="Swap '.$poke['name'].' for '.$pokemon['name'].'" />
    </form>
   ';
   
   $pos++;
  }
  
  echo '
   <table class="pretty-table">
    '.cellsToRows($cells, 3).'
   </table>
  ';
 }
}
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
