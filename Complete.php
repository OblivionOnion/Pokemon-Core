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
 





  <table width="100%" border="1" class="gridtable" table="table">
     <tr>
       <td><h2>Trade Pokemon  </h2> </td>
     </tr>
     <tr>
       <td>	
	   
	   
<center>

	  
	       <p>&nbsp;	         </p>
	       <p>&nbsp;</p>
	       <p>
<?php
error_reporting(0);
session_start();




$tradeid2 = mysql_real_escape_string($_GET['id']);
$tradeid = strip_tags($tradeid2);






$sql8 = "SELECT * FROM `Trades` WHERE `ID` = '" . $tradeid. "'";
	$result8 = mysql_query($sql8) or die(mysql_error());
	$valuest = mysql_fetch_array($result8);
	
	

$OtherPerson =  $valuest['OtherPerson' ] ;
	



	
	if  ($OtherPerson == $_SESSION['userid'])
{


$MyUserId = $valuest['Me'];
$OtherUserId = $valuest['OtherPerson'];
$OthersPokemon = $valuest['OthersPokemon'];
$MyPokemon = $valuest['MyPokemon'];
$null = 0 ;

 echo "<b>Other's Pokemon</b>";
   if($MyPokemon!="N;")
  {
  $MyPokemonList = unserialize($MyPokemon);
  foreach ($MyPokemonList as $MyPokeList)
  {

   $Pokemon123 = Mysql_Fetch_Array(Mysql_Query("SELECT * FROM user_pokemon WHERE id = '$MyPokeList'"));
	echo "<br />".$Pokemon123['name']." [".$Pokemon123['level']."] - Exp: ",$Pokemon123['exp'];
	$update1= mysql_query("UPDATE user_pokemon SET uid='".$OtherUserId."'WHERE id = '".$MyPokeList."'");
  }
  
  }
  else
  {
   echo "<br />None";
  }
  
  
  echo "<br /><br /><b>My Pokemon</b>";
  if($OthersPokemon!="N;")
  {


  $OthersPokemonList = unserialize($OthersPokemon);
  foreach ($OthersPokemonList as $OthersPokeList)
  {
    $Pokemon12 = Mysql_Fetch_Array(Mysql_Query("SELECT * FROM user_pokemon WHERE id = '$OthersPokeList'"));
	echo "<br />".$Pokemon12['name']." [".$Pokemon12['level']."] - Exp: ",$Pokemon12['exp'];
	
	$update12=mysql_query("UPDATE user_pokemon SET uid='".$MyUserId."' WHERE id = '".$OthersPokeList."'");
  }
  
  }
  else
  {
	echo "<br />None";
  }
	
	
	 
	
	
echo "<br /><br />Trade Completed Succesfully";
$markdeleted=mysql_query("DELETE FROM Trades WHERE id='$tradeid'");
}


?>







	         </p>
	       <p>&nbsp;	               </p>
</center>      </p>
	 </td>
     </tr>
   </table>
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
        <p>&nbsp;</p>
        <div id="copyright">
		Footer
		</div>
    </div>

    
    
    <div id="footer">
				<div align="center">Pokemon Core Rpg  - Present<br />
				  This site is not affilliated with Nintendo. The Pokemon Company, Creatures, or GameFreak
	  </div>  </div>  <center><script type="text/javascript"><!--
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
