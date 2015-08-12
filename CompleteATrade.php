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
error_reporting(0);
session_start();




$tradeid2 = mysql_real_escape_string($_GET['id']);
$tradeid = strip_tags($tradeid2);




?>


 


<table width=60%>
<tr>
<th>Complete a Trade</th>
</tr>
<tr>
<td>Enter the ID of trade you want to complete.
<br /><table width=30%>
<tr>
<form action=Complete.php method=GET>
<input type=text name=id>
</tr>
<tr>
<input type=submit value=Submit>
</tr>
</table>



</td>
</tr>
</table>

<table width="60%" cellspacing="1"  border="1" table class="gridtable">

<tr><th>Trade ID</th><th>By User ID</th><th>Delete</th></tr>
<?php 

$myid=$_SESSION['userid'];
$get = "SELECT * FROM Trades WHERE OtherPerson='".$_SESSION['userid']."'";
$done = mysql_query($get);
while($rows = mysql_fetch_array($done))
{
$hellothere=$rows['Me'];
$selectuser=mysql_fetch_assoc(mysql_query("SELECT * FROM users WHERE ID='$hellothere'"));

echo "<tr><td><a href=\"view_trades.php?id=".$rows['ID']."\" onclick=\"OpenPopup(this.href); return false\">".$rows['ID']."</a></td><td>";
echo $rows['Me'];
echo "</td><td><a href='deletetrade.php?id=".$rows['ID']."'>Delete</a></td></tr>";
}
?>
</table>





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
