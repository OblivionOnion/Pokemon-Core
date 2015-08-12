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
$time = time();
$otime = $time - (60*10);
$query = mysql_query("SELECT * FROM `users` WHERE `lastseen`>='{$otime}' ORDER BY `lastseen` DESC");

echo '<div class="sub-content"> 
	<div class="header">..::  Who Is Online ::..</div>
	<table border="0" style="color: #FFF; text-align: center; margin: 0px auto 30px auto; width: 400px;">
		<tr>
			<td>Username</td>
			<td>Last Seen</td>
			<td>Options</td>
		</tr>
';
while ($row = mysql_fetch_assoc($query)) {
	$lastseenMins = floor(($time-$row['lastseen'])/60);
	$lastseenSecs = ($time-$row['lastseen'])%60;
	$lastseenStr = $lastseenMins > 0 ? $lastseenMins.'mins ' : '' ;
	$lastseenStr .= $lastseenSecs.'secs ago';

	echo '
	  
		<tr>
			<td><a href="profile.php?id='.$row['id'].'">'.htmlspecialchars($row['username']).'</a></td>
			<td>'.$lastseenStr.'</td>
			<td>
				<a href="battle_user.php?id='.$row['id'].'">Battle User</a>
			</td>
		</tr>
		
	';
}
echo '
<br>

<br></table></div>';
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
