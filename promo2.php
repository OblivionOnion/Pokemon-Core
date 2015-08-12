<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

 <?php
  require_once 'config.php';
require_once 'functions.php';
  require_once 'sections/sidebarsin.php';
    require_once 'pagination.class.php';
	
	
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
// We get the name of the promo
$type = mysql_query("SELECT * FROM promo ORDER BY id DESC"); 
$typer = mysql_fetch_array($type);
// Now we get the image of the promo

$pokemonname= mysql_real_escape_string($typer['pokemonname']);
$pokemonname2 = strip_tags($pokemonname);

$sql = "SELECT * FROM pokemon WHERE name='".$pokemonname2."'";
$result = mysql_query($sql) or die(mysql_error());
$battle_get = mysql_fetch_array($result);


$pic= mysql_real_escape_string($battle_get['name']);
$pic = strip_tags($pic);






?>

<?php
$sql2t = "SELECT * FROM `users` WHERE `username` = '" . $_SESSION['username'] . "'";
	$resultt = mysql_query($sql2t) or die(mysql_error());
	$valuest = mysql_fetch_array($resultt);


if ( $valuest['promo'] == 0 ) {

	
	 mysql_query("INSERT INTO user_pokemon (uid, name, level,exp) VALUES ('".$_SESSION['userid']."', '$pokemonname2', '5', '500')")or die(mysql_error());
	 
	      $result23123 = mysql_query("UPDATE users SET promo=promo+1 WHERE username = '{$_SESSION['username']}'")
or die(mysql_error());
	echo "You have just received a ";
	echo "<p> </p>";
	echo $name ;
		echo "<p> </p>";
	
	
	?>
	  <img src="http://www.pokemoncore.net/images/pokemon/<?php echo $pic; ?>" />
		<?php

} else {


	echo "You have all ready got this promo sorry.";
}




?>
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
