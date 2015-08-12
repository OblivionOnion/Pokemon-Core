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

  
  
  
<?php


$uid = (int) $_SESSION['userid'];
$cells = array();


$query = mysql_query("
	SELECT
		`users`.`id`,
		`users`.`username`,
		SUM( `user_pokemon`.`exp` ) AS `total_exp` 
              
	FROM
		`user_pokemon`,
		`users`
                
	WHERE
		`users`.`id` = `user_pokemon`.`uid` AND
		`users`.`admin` = '0'
	GROUP BY `user_pokemon`.`uid`
	ORDER BY `total_exp` DESC
	LIMIT 10
");
if ($query) {
	$cell = '
		<h2 style="text-align: center;">Highest Total Experience</h2>
		<table border="0" style="text-align: center; margin: 30px auto;">
			<tr>
				<th>#</th>
				<th>Username</th>
				<th>Total Exp</th>
			</tr>
	';
	$i=1;
	while ($row = mysql_fetch_assoc($query)) {
		$cell .= '
			<tr>
				<td>'.$i++.'</td>
				<td><a href="profile.php?id='.$row['id'].'">'.htmlspecialchars($row['username']).'</a></td>
				<td>'.number_format($row['total_exp']).'</td>
			</tr>
		';
	}
	$cell .= '</table>';
	$cells[] = $cell;
}






$query = mysql_query("
	SELECT
		COUNT( DISTINCT(`user_pokemon`.`name`) ) AS `num_uniques`,
		`users`.`username`,
		`users`.`id`
	FROM
		`user_pokemon`,
		`users`
	WHERE
		`users`.`id`=`user_pokemon`.`uid` AND
		`users`.`admin`='0'
	GROUP BY `uid`
	ORDER BY `num_uniques`
	DESC LIMIT 10
");

if ($query) {
	$cell = '
		<h2 style="text-align: center;">Most Unique Pokemon</h2>
		<table border="0" style="text-align: center; margin: 30px auto;">
			<tr>
				<th>#</th>
				<th>Username</th>
				<th># Uniques</th>
			</tr>
	';
	
	$i=1;
	while ($row = mysql_fetch_assoc($query)) {
		$cell .= '
			<tr>
				<td>'.$i++.'</td>
				<td><a href="profile.php?id='.$row['id'].'">'.htmlspecialchars($row['username']).'</a></td>
				<td>'.number_format($row['num_uniques']).'</td>
			</tr>
		';
	}
	$cell .= '</table>';
	$cells[] = $cell;
}









$query = mysql_query("
	SELECT
		ROUND( AVG(`exp`) ) AS `avg_exp`,
		`users`.`username`,
		`users`.`id`
	FROM
		`user_pokemon`,
		`users`
	WHERE
		`users`.`id`=`user_pokemon`.`uid` AND
		`users`.`admin`='0'
	GROUP BY `user_pokemon`.`uid`
	ORDER BY `avg_exp`
	DESC LIMIT 10
");

if ($query) {
	$cell = '
		<h2 style="text-align: center;">Highest Average Experience</h2>
		<table border="0" style="text-align: center; margin: 30px auto;">
			<tr>
				<th>#</th>
				<th>Username</th>
				<th>Average Experience</th>
			</tr>
	';
	
	$i=1;
	while ($row = mysql_fetch_assoc($query)) {
		$cell .= '
			<tr>
				<td>'.$i++.'</td>
				<td><a href="profile.php?id='.$row['id'].'">'.htmlspecialchars($row['username']).'</a></td>
				<td>'.number_format($row['avg_exp']).'</td>
			</tr>
		';
	}
	$cell .= '</table>';
	$cells[] = $cell;
}




















$query = mysql_query("
	SELECT
		`id`,
		`username`,
		`won`
	FROM
		`users`
	WHERE
		`admin`='0'
	ORDER BY `won` DESC
	LIMIT 10
");

if ($query) {

	$cell = '
		<h2 style="text-align: center;">Most Battles Won</h2>
		<table border="0" style="text-align: center; margin: 30px auto;">
			<tr>
				<th>#</th>
				<th>Username</th>
				<th>Wins</th>
			</tr>
	';
	$i=1;
	while ($row = mysql_fetch_assoc($query)) {
		$cell .= '
			<tr>
				<td>'.$i++.'</td>
				<td><a href="profile.php?id='.$row['id'].'">'.htmlspecialchars($row['username']).'</a></td>
				<td>'.$row['won'].'</td>
			</tr>
		';
	}
	$cell .= '</table>';
	$cells[] = $cell;
}







$query = mysql_query("
	SELECT
		`id`,
		`username`,
		`lost`
	FROM
		`users`
	WHERE
		`admin`='0'
	ORDER BY `lost` DESC
	LIMIT 10
");

if ($query) {

	$cell = '
		<h2 style="text-align: center;">Most Battles Lost</h2>
		<table border="0" style="text-align: center; margin: 30px auto;">
			<tr>
				<th>#</th>
				<th>Username</th>
				<th>Loses</th>
			</tr>
	';
	$i=1;
	while ($row = mysql_fetch_assoc($query)) {
		$cell .= '
			<tr>
				<td>'.$i++.'</td>
				<td><a href="profile.php?id='.$row['id'].'">'.htmlspecialchars($row['username']).'</a></td>
				<td>'.$row['lost'].'</td>
			</tr>
		';
	}
	$cell .= '</table>';
	$cells[] = $cell;
}




$query = mysql_query("
	SELECT
		`id`,
		`username`,
		`money`
	FROM
		`users`
	WHERE
		`admin`='0'
	ORDER BY `money` DESC
	LIMIT 10
");

if ($query) {

	$cell = '
		<h2 style="text-align: center;">Most Money</h2>
		<table border="0" style="text-align: center; margin: 30px auto;">
			<tr>
				<th>#</th>
				<th>Username</th>
				<th>Money</th>
			</tr>
	';
		

	$i=1;
	while ($row = mysql_fetch_assoc($query)) {
		$cell .=  '
			<tr>
				<td>'.$i++.'</td>
				<td><a href="profile.php?id='.$row['id'].'">'.htmlspecialchars($row['username']).'</a></td>
				<td>$'.number_format($row['money']).'</td>
			</tr>
		';
	}
	$cell .= '</table>';
	$cells[] = $cell;
}










echo '
	<div class="sub-content"> 
		<div class="header">..::  Statistics ::..</div>
		<table class="stats-table">
			'.cellsToRows($cells, 2).'
		</table>
	</div>
';



?>
        
        
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
