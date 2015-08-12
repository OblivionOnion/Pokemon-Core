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



$tradeid2= mysql_real_escape_string($_GET['id']);

$tradeid = strip_tags($tradeid2);







	//// Here we add money into the clan the user is in



$sql2t = "SELECT * FROM `Trades` WHERE `ID` = '" . $tradeid . "'";

	$resultt = mysql_query($sql2t) or die(mysql_error());

	$valuest = mysql_fetch_array($resultt);



	

	





		









$OtherPerson =  $valuest['OtherPerson' ] ;

	

	

	

	if  ($OtherPerson == $_SESSION['userid'])

 {

$markdeleted=mysql_query("DELETE FROM Trades WHERE id='$tradeid'");

echo "<br /><br />Trade Removed Succesfully"; 

}else {

print ("You can not remove this trade because the trade is not for you.");

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
