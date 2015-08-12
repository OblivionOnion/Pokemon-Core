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
// In this Page we make an assumption that the user has just came from the Trade.php
// And we also have assumed that the COOKIE called 'Me' has been set earlier on.
// And this is the Basicist type of Script/Code you will see. Without 
// any validating and CSS or Javascript.
	session_start();
	
$Other = $_POST['OtherPerson'];
  $Me = $_SESSION['userid'];
  
  $MyPokemon = serialize($_POST['MyPokemon']);
  $OthersPokemon = serialize($_POST['OthersPokemon']);
  
  
  // The Trade has been inserted into the Database.
  $Insert = Mysql_Query("INSERT INTO Trades (ID, Me, OtherPerson, MyPokemon, OthersPokemon) 
  VALUES ('','".$Me."','".$Other."','".$MyPokemon."','".$OthersPokemon."')");
  
  // You get The inserted ID right after you insert the Trade into the Database.
  $ID = Mysql_Insert_Id();
  
  // You Output a bunch of stuff telling the user about the Trade.
  echo "Your trade has successfully been created.";
    echo "<p> </p>";
  echo "Trade ID: #". $ID;
  echo "<p> </p>";
  echo "Give this number to the person you created the trade to.";

  
  // These are your Pokemon.
    // Here the Pokemon have been unserialized, and put in a foreach 
	// to get each and every value from the array. After you get the 
	// value, you run a Mysql Command to get information about that 
	// Pokemon and you display what ever you want.
  echo "My Pokemon";
  $MyPokemonList = unserialize($MyPokemon);
  foreach ($MyPokemonList as $MyPoke){
    $Pokemon = Mysql_Fetch_Array(Mysql_Query("SELECT * FROM user_pokemon WHERE uid = '".$MyPoke."'"));
	
  }
  
  // These are the Other Person Pokemon.
    // Here the Pokemon have been unserialized, and put in a foreach 
	// to get each and every value from the array. After you get the 
	// value, you run a Mysql Command to get information about that 
	// Pokemon and you display what ever you want.  echo $Other."'s Pokemon";
  echo $Other."'s Pokemon";
  $OthersPokemonList = unserialize($OthersPokemon);
  foreach ($OthersPokemonList as $OthersPoke){
    $Pokemon = Mysql_Fetch_Array(Mysql_Query("SELECT * FROM user_pokemon WHERE uid = '".$OthersPoke."'"));
	
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
