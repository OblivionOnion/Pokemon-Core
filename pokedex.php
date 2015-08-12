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
	<div class="header">..::  Pokedex ::..</div>';

$uid = (int) $_SESSION['userid'];
$query = mysql_query("
	SELECT
		`pokemon`.`name`,
		IF ((SELECT `id` FROM `user_pokemon` WHERE `name`=`pokemon`.`name` AND `uid`='{$uid}' LIMIT 1), 1, 0) as `caught_normal`,
		IF ((SELECT `id` FROM `user_pokemon` WHERE `name`=CONCAT('Shiny ', `pokemon`.`name`) AND `uid`='{$uid}' LIMIT 1), 1, 0) as `caught_shiny`
	FROM
		`pokemon`
	ORDER BY `pokemon`.`name` ASC
");


echo '
	<table border="0" style="text-align: center; margin: 30px auto; width: 400px;">
';
$lastLetter = '';
while ($pokemon = mysql_fetch_assoc($query)) {

	if ($pokemon['name'][0] != $lastLetter) {
		echo '
			<tr>
				<td colspan="3" style="font-weight: bold; font-size: 30px;">'.strtoupper($pokemon['name'][0]).'</td>
			</tr>
			<tr style="font-weight: bold; text-decoration: underline;">
				<td>Name</td>
				<td>Normal</td>
				<td>Shiny</td>
			</tr>
		';
		$lastLetter = $pokemon['name'][0];
	}

	$normalimage = ($pokemon['caught_normal'] == 1) ? 'pb.gif' : 'dpb.gif' ;
	$shinyimage  = ($pokemon['caught_shiny'] == 1)  ? 'pb.gif' : 'dpb.gif' ;
	
	echo '
		<tr>
			<td>'.$pokemon['name'].'</td>
			<td><img src="images/'.$normalimage.'" /></td>
			<td><img src="images/'.$shinyimage.'" /></td>
		</tr>
	';
}
echo '</table>';

echo '</div>';

echo '</div>';
?>

   
        

	
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
