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
 


   <p>Please be respectful to all users on the chat.     </p>
   <p>To register a nickname, enter this code into the chatbox, you will be using your current username.     </p>
   <p>/msg nickserv register PASSWORD EMAIL     </p>
   <p>To identify yourself after you have registered a username     </p>
   <p>/msg nickserv identify PASSWORD     </p>
   <p>To change passwords when you are logged in.     </p>
   <p>/msg nickserv set password NEWPASSWORD </p>
   <p>&nbsp;</p>
<p>&nbsp;</p>
 
 
<div name="flashchat" style="height: 375px; width: 100%;">
	<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" width="100%" height="100%" salign="tl" wmode="transparent">
		<param name="allowScriptAccess" value="sameDomain" />
		<param name="movie" value="http://flashirc.geekshed.net/tflash.php?embed=1&amp;joinonconnect=pokemoncore&amp;chatonly=0&amp;isrestricted=0&amp;altfont=0&amp;key=&amp;nick=pokemoncore-user-<?php echo rand(1000, 99999); ?>">
		<param name="quality" value="high">		
		<embed src="http://flashirc.geekshed.net/tflash.php?embed=1&amp;joinonconnect=pokemoncore&amp;chatonly=0&amp;isrestricted=0&amp;altfont=0&amp;key=&amp;nick=pokemoncore-user-<?php echo rand(1000, 99999); ?>" allowScriptAccess="always" allowNetworking="all" quality="high" wmode="transparent" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash" width="100%" height="100%" salign="tl">
		</embed>
	</object>
</div>

<p></p>


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
