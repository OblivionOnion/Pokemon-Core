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
error_reporting(0);
session_start();
?>

<?php


// In this Page we make an assumption that the user has just came from the Create.php
// And we also have assumed that the COOKIE called 'Me' has been set earlier on.
// And this is the Basicist type of Script/Code you will see. Without 
// any validating and CSS or Javascript.


$OtherPerson= mysql_real_escape_string($_POST['OtherPerson']);
$Other = strip_tags($OtherPerson);



  $Me = $_SESSION['userid'];
  
  // Form will be sent to Created.php Using the POST method.
  echo "<form action = 'Created.php' method = 'POST'>";
  
  // List of My Pokemon.
    // Square Brackets needed to make the Select an Array Of Values. Because
	// user might select more than 1 Pokemon for Trade. Multiple is set to 
	// multiple, so that the user can hit 'Shift' or 'Ctrl' to select more  
	// than 1 Pokemon. And Size 15 shows first 15 Pokemon, for the rest you  
	// have to scroll down in the select field. The Option of the Select fields  
	// meaning the Pokemon, are being ordered by there Name. So Absol would 
	// come before Charizard. Every Option has a vavlue of the Pokemon ID, 
	// because only the ID is unique and cannot be the same as other Pokemons.
	echo "Your pokemon";
	echo "<p>   </p>";
	echo "<p>   </p>";
	echo "<p>   </p>";
  echo "<select name = 'MyPokemon[]' size = '15' multiple = 'multiple'>";
  $MyPokemon = Mysql_Query("SELECT * FROM user_pokemon WHERE uid = '".$Me."' ORDER BY name ASC");
  while ($Pokemon = Mysql_Fetch_Array($MyPokemon)){
    echo "<option value='".$Pokemon['id']."'>".$Pokemon['name']." EXP :".$Pokemon['exp']." - Level: ".$Pokemon['level']."</option>";
  }
  echo "</select>";
  	echo "<p>   </p>";
	echo "<p>   </p>";
	echo "<p>   </p>";
  // List of Others Pokemon.
    // Square Brackets needed to make the Select an Array Of Values. Because
	// user might select more than 1 Pokemon for Trade. Multiple is set to 
	// multiple, so that the user can hit 'Shift' or 'Ctrl' to select more  
	// than 1 Pokemon. And Size 15 shows first 15 Pokemon, for the rest you  
	// have to scroll down in the select field. The Option of the Select fields  
	// meaning the Pokemon, are being ordered by there Name. So Absol would 
	// come before Charizard. Every Option has a vavlue of the Pokemon ID, 
	// because only the ID is unique and cannot be the same as other Pokemons.
	echo "There pokemon";
	  	echo "<p>   </p>";
  echo "<select name = 'OthersPokemon[]' size = '15' multiple = 'multiple'>";
  $OthersPokemon = Mysql_Query("SELECT * FROM user_pokemon WHERE uid = '".$Other."' ORDER BY name ASC");
  while ($Pokemon = Mysql_Fetch_Array($OthersPokemon)){
      echo "<option value='".$Pokemon['id']."'>".$Pokemon['name']."EXP: ".$Pokemon['exp']." - Level: ".$Pokemon['level']."</option>";
  }
  echo "</select>";
  
  // Submit Button and Other Person.
    // The others Person will be sent along in the form to be saved in the 
	// Database, and the Submit Button will help us send the Form to Created.php
  echo "<input type = 'hidden' name = 'OtherPerson' value = '".$Other."'>";
  echo "<input type = 'Submit' value = 'Create Trade' name = 'Create'>";
  
  echo "</form>";
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
	  </div>  </div><center><!-- Begin BidVertiser code -->
<SCRIPT LANGUAGE="JavaScript1.1" SRC="http://bdv.bidvertiser.com/BidVertiser.dbm?pid=548923&bid=1375006" type="text/javascript"></SCRIPT>
<noscript><a href="http://www.bidvertiser.com">internet marketing</a></noscript>
<!-- End BidVertiser code -->  </center>

</div>
</body>
</html>
