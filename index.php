<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

 <?php
  require_once 'sections/title.php';
mysql_connect("pokemoncore.db.11569752.hostedresource.com", "pokemoncore", "Temping12!");
mysql_select_db("pokemoncore");
  ?>
<div id="container">
	<div id="banner">
    </div>
    
    <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-43005482-1', 'pokemoncore.net');
  ga('send', 'pageview');

</script>

    
    <div id="content">
<?php  	//// Here we add money into the clan the user is in
$sql2t = "SELECT * FROM `news` ORDER BY id DESC LIMIT 4  ";
	$resultt = mysql_query($sql2t) or die(mysql_error());
	while($valuest = mysql_fetch_array( $resultt )) {
	?>
</p>
<p>&nbsp;</p>

  <div class="CSSTableGenerator" >
  
  <table width="100%" border="0" class="gridtable">

     <td width="50%">Post By:  </td>
     <td width="50%"><?php  echo $valuest ['title'] ; ?></td>

  <tr>
    <td height="160"><span id="happen2">
      <?php  
	  echo "<center>";
	  echo '<img src="http://www.serebii.net/pokearth/trainers/bw/50.png" border=0>';
	  echo "<p>  </p>";
	  
	  ?>
	  <img src="images/pokemon/Shiny Arceus (Grass).png" alt=""> 
	  <br />
	  <?php
	  echo $valuest ['bywho'] ; 
	 
	  
	  ?>
</span>
      <p>&nbsp;</p>
      <?php  echo $valuest ['date'] ; ?>
      <span><br />
      <br />
      </span></td>
    <td><?php 
	
	 
	  $text = $valuest ['news'];
                                    $text = stripslashes($text);
                                    
									
                                   
                                    echo $text ;
	 
	 
	  echo "</center>";?></td>
  </tr>
</table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>  
<?php   
  
  }
  ?>
</div></div>

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
