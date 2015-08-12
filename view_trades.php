<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"

        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">



 <?php

 require_once 'config.php';

require_once 'functions.php';

  require_once 'sections/title.php';

  

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

    <div id="header">

        <p>Pokemon Core Rpg V2.0</p>

    </div>

    

  <?php

  require_once 'sections/leftin.php';

  

  ?>

    

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







$time= mysql_real_escape_string($_GET['id']);

$tradeid = strip_tags($time);









$sql=mysql_fetch_assoc(mysql_query("SELECT * FROM Trades WHERE ID='$tradeid'"));







if($sql['deleted']==0)

{



$MyUserId=$sql['Me'];

$MyPokemon=$sql['MyPokemon'];

$OthersPokemon=$sql['OthersPokemon'];

$OtherUserId=$sql['OtherPerson'];





 echo "<b>Other's Pokemon</b>";

   if($MyPokemon!="N;")

  {

  $MyPokemonList = unserialize($MyPokemon);

  foreach ($MyPokemonList as $MyPokeList)

  {

    $Pokemon = Mysql_Fetch_Array(Mysql_Query("SELECT * FROM user_pokemon WHERE id = '$MyPokeList'"));

	echo "<br />".$Pokemon['name']." - Level: ",$Pokemon['level']." - Exp: ",$Pokemon['exp'];

  }

  

  }

  else

  {

   echo "<br />None";

  }

  

  // These are the Other Person Pokemon.

    // Here the Pokemon have been unserialized, and put in a foreach 

	// to get each and every value from the array. After you get the 

	// value, you run a Mysql Command to get information about that 

	// Pokemon and you display what ever you want.  echo $Other."'s Pokemon";







  echo "<br /><br /><b>My Pokemon</b>";

  if($OthersPokemon!="N;")

  {

  $OthersPokemonList = unserialize($OthersPokemon);

  foreach ($OthersPokemonList as $OthersPokeList)

  {

    $Pokemon12 = Mysql_Fetch_Array(Mysql_Query("SELECT * FROM user_pokemon WHERE id = '$OthersPokeList'"));

	echo "<br />".$Pokemon12['name']." - Level: ",$Pokemon12['level']." - Exp: ",$Pokemon12['exp'];

  }

  

  }

  else

  {

	echo "<br />None";

  }

	

	

	



}

else

{

 echo "Sorry but the trade you are trying to complete has been deleted.";

}

?>













	         </p>

	       <p>&nbsp;	               </p>

</center>      </p>

	 </td>

     </tr>

   </table>

</div>



<p>  </p>

<br>

<br>

<br>

<br>

<br>



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



      <div id="copyright">

		Footer

	  </div>

 </div>

    <?php

  require_once 'sections/righin.php';

  

  ?>

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
