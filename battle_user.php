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


$uid = (int) $_GET['id'];
$query = mysql_query("SELECT * FROM `users` WHERE `id`='{$uid}' LIMIT 1");		

if (mysql_num_rows($query) == 0) {
	die();
}

$userTeam = mysql_fetch_assoc($query);

for ($i=1; $i<=6; $i++) {
	$pid = $userTeam['poke'.$i];
	
	if ($pid==0) { break; }
	
	$query = mysql_query("SELECT * FROM `user_pokemon` WHERE `id`='{$pid}' LIMIT 1");		
	$_SESSION['battle']['opponent'][$i-1] = mysql_fetch_assoc($query);
	$level = $_SESSION['battle']['opponent'][$i-1]['level'];
	$_SESSION['battle']['opponent'][$i-1]['maxhp'] = $level*5;
	$_SESSION['battle']['opponent'][$i-1]['hp'] = $level*5;
}
$_SESSION['battle']['onum'] = 0;
$_SESSION['battle']['rebattlelink'] = '<a href="battle_user.php?id='.$userTeam['id'].'">Rebattle '.htmlspecialchars($userTeam['username']).'</a>';




 echo '<META HTTP-EQUIV="Refresh" Content="0; URL=battle.php">';    
    exit; 
?>
  
  




	         </p>
	       <p>&nbsp;	               </p>
</center>      </p>
	 </td>
     </tr>
   </table>
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
