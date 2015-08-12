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
    
    

    
    <div id="content">

  <div class="CSSTableGenerator" >
  
  
  
  
   <?php
require_once 'config.php';
require_once 'functions.php';

if (isLoggedIn()) {

 echo '<META HTTP-EQUIV="Refresh" Content="0; URL=membersarea.php">';    
    exit;  

}

define('DEFAULT_STARTER_LEVEL', 25);
define('DEFAULT_STARTER_COLUMNS', 4);
define('DEFAULT_USER_MONEY', 20000);

$pokemonNames = array(
	'Bulbasaur' , 'Charmander' , 'Squirtle' , 'Chikorita' ,
	'Cyndaquil' , 'Totodile'   , 'Treecko'  , 'Torchic'   ,
	'Mudkip'    , 'Turtwig'    , 'Chimchar' , 'Piplup'    ,
	'Snivy'     , 'Tepig'      , 'Oshawott' , 'Eevee'
);

$username  = isset( $_POST['username']  ) ? $_POST['username']  : '' ;
$email     = isset( $_POST['email']     ) ? $_POST['email']     : '' ;
$avatar    = isset( $_POST['avatar']    ) ? $_POST['avatar']    : '' ;
$password  = isset( $_POST['password']  ) ? $_POST['password']  : '' ;
$password2 = isset( $_POST['password2'] ) ? $_POST['password2'] : '' ;
$pokemon   = isset( $_POST['pokemon']   ) ? $_POST['pokemon']   : '' ;
$errorMessage = '';

if(count($_POST) > 0) {

	$sqlUsername = mysql_real_escape_string($username);
	$sqlPassword = sha1($password);
	$sqlEmail    = mysql_real_escape_string($email);
	$sqlAvatar   = mysql_real_escape_string($avatar);
	$sqlPokemon  = mysql_real_escape_string($pokemon);
	$time        = time();
	$errors      = array();
	
	
	if( $username == '' ) {
		$errors[] = 'Your username can not be empty.';
	}
	
	if( !in_array($pokemon, $pokemonNames) ) {
		$errors[] = 'The pokemon you picked is not a starter.';
	}
	
	if($password != $password2) {
		$errors[] = 'The passwords you entered are not the same.';
	}
	
	if(strlen($password) <= 6) {
		$errors[] = 'Your password must contain at least 6 characters.';
	}
	
	if(filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
		$errors[] = 'The email you entered is not valid.';
	}
	
	
	$query = mysql_query("SELECT `id` FROM `users` WHERE `username`='{$sqlUsername}' LIMIT 1");
	if(mysql_num_rows($query) == 1) {
		$errors[] = 'That username is already taken, please choose another.';
	}
	
	$ip = $_SERVER['REMOTE_ADDR'];
	$oneDayAgo = time() - (60*60*24);
	$query = mysql_query("SELECT `id` FROM `users` WHERE `ip`='{$ip}' AND `signup_date`>='{$oneDayAgo}' LIMIT 1");
	if(mysql_num_rows($query) == 1) {
		$errors[] = 'An account has already been made from this ip address.<br />You will be able to make another in 24 hours time.';
	}
	
	
	if (count($errors) > 0) {
		$errorMessage = '<div class="error">'.implode('</div><div class="error">', $errors).'</div>';
	} else {
		
		// make them a user account
		$money = DEFAULT_USER_MONEY;
		mysql_query("
			INSERT INTO `users` (
				`username`, `password`, `email`, `avatar`, `signup_date`, `money`, `ip`
			) VALUES (
				'{$sqlUsername}', '{$sqlPassword}', '{$sqlEmail}', '{$sqlAvatar}', '{$time}', '{$money}', '{$ip}')
		");
		$uid = mysql_insert_id();
		
		
		$pokeQuery  = mysql_query("SELECT * FROM `pokemon` WHERE `name`='{$pokemon}'");
		$pokemonRow = mysql_fetch_assoc($pokeQuery);
		$level = DEFAULT_STARTER_LEVEL;
		$exp   = levelToExp($level);
		
		// give them a pokemon
		$query = mysql_query("
			INSERT INTO `user_pokemon` (
				`uid`, `name`, `level`, `exp`, `move1`, `move2`, `move3`, `move4`
			) VALUES (
				'{$uid}', '{$pokemon}', '{$level}', '{$exp}', '{$pokemonRow['move1']}', '{$pokemonRow['move2']}', '{$pokemonRow['move3']}', '{$pokemonRow['move4']}'
			)
		");
		$pid = mysql_insert_id();
		
		// put the pokemon in the first slot
		mysql_query("UPDATE `users` SET `poke1`='{$pid}' WHERE `id`='{$uid}'");

		//give them some items
		mysql_query("
			INSERT INTO `user_items` (
				`uid`, `poke_ball`, `great_ball`, `ultra_ball`, `master_ball`, 
				`potion`, `super_potion`, `hyper_potion`, `burn_heal`, `full_heal`, 
				`parlyz_heal`, `antidote`, `awakening`, `ice_heal`, `dawn_stone`, 
				`dusk_stone`, `fire_stone`, `leaf_stone`, `moon_stone`, `oval_stone`,
				`shiny_stone`, `sun_stone`, `thunder_stone`, `water_stone`
			) VALUES (
				'{$uid}', '20', '15', '10', '5', '20', '10', '5', 
				'5', '5', '5', '5', '5', '5', '5', '5', '5',
				'5', '5', '5', '5', '5', '5', '5'
			);
		");
		
		$_SESSION['register'] = '<div class="notice">You have successfully been registered!</div>';
		
		 echo '<META HTTP-EQUIV="Refresh" Content="0; URL=login.php">';    
    exit;  
		
	}
}



$starterCells = array();
foreach ($pokemonNames as $name) {
	$starterCells[] = '
		<img src="images/pokemon/'.$name.'.png" alt="'.$name.'" /><br />
		<input type="radio" name="pokemon" value="'.$name.'" />
	';
}


echo '<div class="sub-content"> 
	<div class="header">..::  Register ::..</div>';

echo '
	<div class="content">
		'.$errorMessage.'
		<form action="" method="post">
			<table border="0" style="margin: 30px auto; text-align: left;">
				<tr>
					<td>Username: </td>
					<td><input type="text" name="username" value="'. htmlentities($username, ENT_QUOTES, 'UTF-8').'" /></td>
				</tr>
				<tr>
					<td>Password <small>(6 characters min.)</small>: </td>
					<td><input type="password" name="password" /></td>
				</tr>
				<tr>
					<td>Password again: </td>
					<td><input type="password" name="password2" /></td>
				</tr>
				<tr>
					<td>Email: </td>
					<td><input type="text" name="email" value="'. htmlentities($email, ENT_QUOTES, 'UTF-8').'" /></td>
				</tr>
				<tr>
					<td>Avatar <small>(optional)</small>: </td>
					<td><input type="text" name="avatar" value="'. htmlentities($avatar, ENT_QUOTES, 'UTF-8').'" /></td>
				</tr>
				<tr>
					<td style="vertical-align: top;">Starter: </td>
					<td>
						<table border="0" style="border-collapse: collapse; text-align: center;">
							'.cellsToRows($starterCells, DEFAULT_STARTER_COLUMNS).'
						</table>
					</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td style="padding: 20px 0; text-align: center;"><input type="submit" value="Sign up" /></td>
				</tr>
			</table>
		</form>
	</div>
';

echo '</div>';

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
