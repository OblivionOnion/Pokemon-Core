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
	

$sql = "SELECT * FROM `users` WHERE `username` = '" . $_SESSION['username'] . "'";
	$result = mysql_query($sql) or die(mysql_error());
	$values = mysql_fetch_array($result);





$typecc = rand(1,4);
$valuecc = rand(2,14);

if(!$_SESSION['cardtypeb']){
$_SESSION['cardtypeb'] = $typecc;
}

if(!$_SESSION['cardvalueb']){
$_SESSION['cardvalueb'] = 7;
}

$user->cardtypeb = $_SESSION['cardtypeb'];
$user->cardvalueb = $_SESSION['cardvalueb'];

if ($_POST['higher']) {
if ($values['money'] < 100){
echo '<div class="title">Not enough cash...</div><div class="contentcontent"><br><center>You don\'t have enough money to play high low.</center><br></div>';

die();
}

$showa = 1;

if($user->cardvalueb < $valuecc){


$gfgdgdfgds = mysql_query("UPDATE users SET money = money + '100'
				WHERE username = '".$_SESSION['username']."'") or die(mysql_error()); 
				
echo '<div class="title">Results</div><div class="contentcontent"><br><center>You got it right and won $100!</center><br></div>';
}else{
$user->gold = $user->gold - 10000;

$gfgdgdfugds = mysql_query("UPDATE users SET money = money - '100'
				WHERE username = '".$_SESSION['username']."'") or die(mysql_error()); 
				
				
echo '<div class="title">Results</div><div class="contentcontent"><br><center>Sorry. You got it wrong and lost $100.</center><br></div>';
}

$_SESSION['cardtypeb'] = $typecc;
$_SESSION['cardvalueb'] = $valuecc;

$user->cardtypeb = $typecc;
$user->cardvalueb = $valuecc;
}



if ($_POST['lower'] != "" && $_POST['higher'] == "") {
if ($values['money'] < 100){
echo '<div class="title">Not enough cash...</div><div class="contentcontent"><br><center>You don\'t have enough money to play high low.</center><br></div>';

die();
}
$showa = 1;
		if($user->cardvalueb > $valuecc){
			
			$gfgdgdfugdkkkks = mysql_query("UPDATE users SET money = money + '100'
				WHERE username = '".$_SESSION['username']."'") or die(mysql_error()); 
				

echo '<div class="title">Results</div><div class="contentcontent"><br><center>You got it right and won $100!</center><br></div>';
		} else {
				$kkkkkkkkkk = mysql_query("UPDATE users SET money = money -'100'
				WHERE username = '".$_SESSION['username']."'") or die(mysql_error()); 
echo '<div class="title">Results</div><div class="contentcontent"><br><center>Sorry. You got it wrong and lost $100.</center><br></div>';
		}

$_SESSION['cardtypeb'] = $typecc;
$_SESSION['cardvalueb'] = $valuecc;

$user->cardtypeb = $typecc;
$user->cardvalueb = $valuecc;

	}



?>

<div class="title"></div>

<div class="contentcontent">
  <table width="100%" border="1" table="table" class="gridtable">
    <tr>
      <th><small><b>Cash:</b> $
        <?=number_format($values['money'])?>
        dollars<br />
        <br />
        Simply guess if the next card is valued higher or lower.<br />
        It costs $100 per go. You can win $100, so have at it!</small></th>
    </tr>
    <tr>
      <td><div align="center">
          <p><img src="cards/<?=$user->cardtypeb?>/<?=$user->cardvalueb?>.gif" /></p>
        <p></p>
        <form action='highlow.php?id=<? echo rand(1,1000); ?>' method='post' name='login' id="login">
            <div align="center">
              <input type='submit' name='higher' value='Higher' class='button' />
              &nbsp;&nbsp;
              <input type='submit' name='lower' value='Lower' class='button' />
            </div>
        </form>
         
        </p>
      </div></td>
    </tr>
  </table>
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
