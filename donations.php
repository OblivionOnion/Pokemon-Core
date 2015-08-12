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

  









<table width="100%" border="1" class="gridtable" table="table">

     <tr>

       <th>Please read be for buying any coins</th>

     </tr>

     <tr>

       <td>Before donating, please read through the important notices:<br />

         <br />

         <ul>

           <li>If you are not using your own money to donate, please ask permission first/make sure you are allowed!</li>

           <br />

           <li>Please note that delivery time for the virtual item is usually a few hours seen has i have to check every payment </li>

           <br />

           <li> Under no circumstances does donating for our game make you above the rules. <br />

             We appreciate all of the support and purchases; however, we wish to   create a fair environment to play in and will take action where it is   needed. </li>

           <br />

           <li> Unfortunately due to the nature of transferring coins and paying for   services, and that it is intangible, we do not accept refunds.</li>

           <br />

           <li>Any attempt to chargeback may result in an immediate ban(s).<br />

             In serious cases your chargeback will be investigated and you will be taken into court.</li>

           <br />

           <li>A lot of these donations will be used for coding/updates   after paying the servers, if you donated - even as little as $1.00, Will help with the Rpg costs. </li>

           <br />

           <li>We accept all currencies - if you pay with a currency other than USD, it will then automatically be converted to USD.</li>

		   

		   <br />

           <li>When buying coins you understand all money made from the rpg goes onto server costs and domain name cost and that we never ever make no profit from the website. </li>

         </ul></td>

     </tr>

   </table>







<p>&nbsp;</p>

<p>&nbsp;</p>

<table width="100%" border="1" class="gridtable" table="table">

     <tr>

       <th>Buy Core Coins </th>

     </tr>

     <tr>

       <td>	

	   

	   

	   

	   







<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">

<input type="hidden" name="cmd" value="_s-xclick">

<input type="hidden" name="hosted_button_id" value="9V3XR6QUW6HGN">

<input type="hidden" name="business" value="lost_hope27@hotmail.com">

     <input type="hidden" name="item_name" value="Core Coins">

	 <input type="hidden" name="item_number" value="1">

	 <input type="hidden" name="amount" value="3.00">

	 <input type="hidden" name="currency_code" value="CAD">

	 <input type="hidden" name="lc" value="CA">

	 <input type="hidden" name="bn" value="PP-BuyNowBF">

	 <input type="hidden" name="return" value="http://pokemoncore.net/corecoins/Paypal_IPN.php">

	 <input type="hidden" name="cancel_return" value="http://pokemoncore.net/donations.php">

	 <input type="hidden" name="rm" value="2">

	 <input type="hidden" name="notify_url" value="http://www.pokemoncore.net/corecoins/Paypal_IPN.php" />

	 <input type="hidden" name="custom" value="<?php echo $_SESSION['username']; ?>">

<table>

<tr><td><input type="hidden" name="on0" value="Core Coins">Core Coins</td></tr><tr><td><select name="os0">

    <option value="100 Core Coins">100 Core Coins $3.00 CAD</option>

	<option value="100 Core Coins">100 Core Coins $3.00 CAD</option>

	<option value="100 Core Coins">100 Core Coins $3.00 CAD</option>

</select> </td></tr>

</table>

    <tr><td><input type="hidden" name="on1" value="user_id">user_id</td></tr><tr><td>

      

      <input name="os1" type="text" value="Enter Your Id Here" maxlength="200"></td></tr>

  </table>

  <p>

  <input type="hidden" name="currency_code" value="CAD">

<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">

<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">

</form>





  <p>&nbsp;</p>

  <p>Or you can just donate and you will get a random gift</p>

  <p>&nbsp; </p>

  



  </div>







</td>

     </tr>

   </table>



<p>&nbsp;</p>  



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
