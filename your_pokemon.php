<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

 <?php
  require_once 'config.php';
require_once 'functions.php';
  require_once 'sections/sidebarsin.php';
    require_once 'pagination.class.php';
	
	
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


$sorts = array
(
    1 => ' ORDER BY `name` ASC',
    2 => ' ORDER BY `name` DESC',
    3 => ' ORDER BY `exp` ASC',
    4 => ' ORDER BY `exp` DESC'
);

$uid       = (int) $_SESSION['userid'];
$search    = isset($_GET['search']) ? $_GET['search'] : '' ;

$sort      = $_GET['sort'];
$sortKey   = isset($sort) && in_array($sort, array_keys($sorts)) ? $sort : 1 ;
$orderSql  = $sorts[$sortKey];

$searchSql = '';

if (!empty($search)) {
	$searchSqlSafe  = cleanSql($search);
	$searchHtmlSafe = cleanHtml($search);
	$searchSql      = " AND `name` LIKE '%{$searchSqlSafe}%' ";
}

$countQuery = mysql_query("SELECT `id` FROM `user_pokemon` WHERE `uid`='{$uid}' {$searchSql}");
$numRows    = mysql_num_rows($countQuery);

$pagination = new Pagination($numRows);

if (!empty($search)) {
	$pagination->addQueryStringVar('search', $search);
}

if ($sortKey != 1) {
	$pagination->addQueryStringVar('sort', $sortKey);
}

$query = mysql_query("SELECT * FROM `user_pokemon` WHERE `uid`='{$uid}' {$searchSql} {$orderSql} LIMIT {$pagination->itemsPerPage} OFFSET {$pagination->startItem}");


echo '	
	<form method="get" style="text-align: center; margin: 20px 0px;">
		Search For: <input type="text" name="search" value="'.$searchHtmlSafe.'" /> <input type="submit" value="Search" />
	</form>
';

if (mysql_num_rows($query) == 0) {
	echo '<div class="info">Could not find any pokemon.</div>';
} else {
	$qs = '';
	
	if (!empty($search)) {
		$qs .= '&amp;search=' . urlencode($search);
	}
	
	if (!empty($_GET['page'])) {
		$qs .= '&amp;page=' . (int) $_GET['page'];
	}
	
	$nameOrder = $_GET['sort'] == 1 ? 2 : 1 ;
	$expOrder  = $_GET['sort'] == 4 ? 3 : 4 ;
	
	echo '		
		<table class="pretty-table">
			<tr>
				<td>&nbsp;</td>
				<td><a href="?'.$qs.'&amp;sort='.$nameOrder.'">Pokemon</a></td>
				<td>Level</td>
				<td><a href="?'.$qs.'&amp;sort='.$expOrder.'">Exp</a></td>
				<td>Moves</td>
				<td>Options</td>
			</tr>
	';

	$teamIds = getUserTeamIds($uid);
	while ($pokemon = mysql_fetch_assoc($query)) {

	
		if (in_array($pokemon['id'], $teamIds)) {
			$tradeHtml = '<br /><strike>Put Up For Trade</strike>';
			$sellHtml = '<br /><strike>Put Up For Sale</strike>';
			$teamHtml = '<strike>Put In My Team</strike><br />';
		} else {
			$tradeHtml = '<br /><a href="trade.php?a=puft_process&amp;id='.$pokemon['id'].'">Trade Pokemon</a>';
			$sellHtml = '<br /><a href="sell_pokemon.php?p=sell2&amp;id='.$pokemon['id'].'">Sell Pokemon</a>';
			$teamHtml = '<a href="change_team.php?id='.$pokemon['id'].'">Put In My Team</a><br />';
		}
		
		echo '
			<tr>
				<td><img src="images/pokemon/' . $pokemon['name'] . '.png" alt="' . $pokemon['name'] . '" /></td>
				<td>' . $pokemon['name'] . '</td>
				<td>' . number_format($pokemon['level']) . '</td>
				<td>' . number_format($pokemon['exp']) . '</td>
				<td>
					' . $pokemon['move1'] . '<br />
					' . $pokemon['move2'] . '<br />
					' . $pokemon['move3'] . '<br />
					' . $pokemon['move4'] . '<br />
				</td>
				<td>
					<a href="evolve.php?id='.$pokemon['id'].'">Evolve</a><br />
					<a href="change_attacks.php?id='.$pokemon['id'].'">Change Attacks</a><br />
					'.$teamHtml.'
					'.$tradeHtml.'
					'.$sellHtml.'
				</td>
			</tr>
		';
	}
	echo '</table>';

	$pagination->echoPagination();
}

echo '</div>';
echo '</div>';
?>

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
	  </div>  </div><<center><script type="text/javascript"><!--
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
