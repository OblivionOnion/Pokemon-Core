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

<div id="playercard">
	<div id="top">
		<div id="trainer-card">

			Trainer Card
		</div>
		<div id="name">

			<?php echo $_SESSION['username'];?>
		</div>
	</div>
	<div id="center">
		<div id="pictures-container">
			<div class="box-inner"></div>

			<div class="box-inner"></div>

			<div class="box-inner"></div>

			<div class="box-inner"></div>

			<div class="box-inner"></div>

			<div class="box-inner"></div>
		</div>
		<div id="avatar">

			<img src="css/images/avatar.png">
		</div>
	</div>
	<div id="bottom">

		<div id="badges">

			Badges

		</div>
	</div>

</div>

<br> </br>
<br> </br>
<br> </br>
<a class="twitter-timeline" href="https://twitter.com/PokemonCoreRPG" data-widget-id="364765979248574466">Tweets by @PokemonCoreRPG</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

      </p>
      <p align="center">&nbsp;</p>
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
      
      <div id="copyright">
		Footer
	  </div>
  </div>
    <?php
  require_once 'sections/righin.php';
  
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
