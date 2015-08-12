<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"

        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">



 <?php

 

 error_reporting(0);

 session_start();

  require_once 'functions.php';

  $db = mysqlconnect();

  require_once 'sections/title.php';

mysql_connect("pokemoncore.db.11569752.hostedresource.com", "pokemoncore", "Temping12!");

mysql_select_db("pokemoncore");

  ?>

<div id="container">

	<div id="banner">

    </div>

    <div id="header">

        <p>Pokemon Core Rpg V2.0</p>

    </div>

    

  <?php

  require_once 'sections/leftout.php';

  

  ?>

    

    <div id="content">

<?php









$statementt = $db->prepare("SELECT * FROM Banned WHERE 	user  = :name ");

$statementt->execute(array(':name' =>  $_SESSION['username']));

$battle_gett = $statementt->fetch(); // Use fetchAll() if you want all results, or just iterate over the statement, since it implements Iterator

?>

	

	

  <div class="CSSTableGenerator" >

  

  <table width="100%" border="0" class="gridtable">



     <td width="52%">You Was Banned By <?php  echo $battle_gett ['bannedby'] ; ?> </td>

     <td width="48%">Resson For Ban</td>



  <tr>

    <td height="160"><span id="happen2">

      <?php  

	  echo "<center>";

	  echo '<img src="http://pokemontoxic.net/img/avatars/5.png" border=0>';

	  echo "<p>  </p>";

	  

	  ?>

	  <img src="images/pokemon/Shiny Arceus (Grass).png" alt=""> 

	  <br />



</span>

      <p>&nbsp;</p>

Banned In till:



<?php



  echo $battle_gett ['band_to'] ; 

?>

      <span><br />

      <br />

      </span></td>

    <td><?php 

	

	 

	  $text = $battle_gett ['resson'];

                      

                                    

									

                                   

                                    echo $text ;

	 

	 

	  echo "</center>";?></td>

  </tr>

</table>

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





	</div>

	

        <p>&nbsp;</p>

        <p>&nbsp;</p>

        <p>&nbsp;</p>

        <p>&nbsp;</p>

        <div id="copyright">

		Footer

		</div>

    </div>

    <?php

  require_once 'sections/rightout.php';

  

  ?>

    

    

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
