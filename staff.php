<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

 <?php
  require_once 'config.php';
require_once 'functions.php';
  require_once 'sections/sidebarsin.php';
mysql_connect("pokemoncore.db.11569752.hostedresource.com", "pokemoncore", "Temping12!");
mysql_select_db("pokemoncore");
  /// Here we get the staff info
$sql23shadow = "SELECT * FROM users WHERE username='Ares'";
$result23shadow = mysql_query($sql23shadow) or die(mysql_error());
$shadow = mysql_fetch_array($result23shadow);

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
 
 
  <table width="100%" height="" table class="gridtable" border="0">
    <tbody>
	 <tr>
     <td width="53%">Administrators</td>
      </tr>
      </tbody>
  </table>
  
  
  <table width="100%" height="" table class="gridtable" border="0">
    <tbody>
	 <tr>
        <th width="22%"><img src="<?php echo $shadow['avatar']; ?>" width="" height="" /></th>
         <th width="36%"><a href="http://www.pokemoncore.net/profile.php?id=1" class="style8">Ares</a></th>
         <th width="42%">Administrator/Coder/Owner</th>
    </tr>
    <table width="100%" height="" table class="gridtable" border="0">
    <tbody>
     <tr>
        <th width="22%"><img src="<?php echo $shadow['avatar']; ?>" width="" height="" /></th>
         <th width="36%"><a href="http://www.pokemoncore.net/profile.php?id=2" class="style8">Brutus</a></th>
         <th width="42%">Administrator/Coder</th>
           
	 </tr>
      </tbody>
  </table>
   
  <p>&nbsp;</p>
  <table width="100%" height="" table="table" class="gridtable" border="0">
    <tbody>
      <tr>
        <td width="53%">Moderators</td>
      </tr>
    </tbody>
  </table>
  <table width="100%" height="" table="table" class="gridtable" border="0">
    <tbody>
     
	 

	 	  	 <?php
$result33 = mysql_query("SELECT *
FROM `users`
WHERE `mod` =1
LIMIT 0 , 30");
while($row33 = mysql_fetch_array($result33))
  {
	  ?>
	  <tr>
	  

        <th width="22%"><img src="<?php echo $row33 ['avatar']; ?>" width="" height="" /></th>
        <th width="36%"><a href="http://www.pokemoncore.net/profile.php?id=<?php echo $row33 ['id']; ?>" class="style8"><?php echo $row33 ['username']; ?></a></th>
        <th width="42%">Moderator</th>
      </tr>
	  
	<?php
	}
	?>
	  
    </tbody>
  </table>
  




<p>&nbsp;</p>
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
