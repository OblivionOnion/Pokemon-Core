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
  

<?php





echo '<div class="sub-content"> 
	<div class="header">..::  Edit Profile ::..</div>';

$message = '';
$uid = $_SESSION['username'];

if (isset($_POST['cpassword'], $_POST['npassword'], $_POST['napassword'], $_POST['email'], $_POST['avatar'], $_POST['sprite'], $_POST['signature'])) {
	$password     = $_POST['cpassword'];
	$passwordNew  = $_POST['npassword'];
	$passwordNew2 = $_POST['napassword'];
	$email        = $_POST['email'];
	$avatar       = $_POST['avatar'];
	$sprite       = $_POST['sprite'];
	$signature    = $_POST['signature'];
	$errors = array();
	
	$query = mysql_query("SELECT `password` FROM `users` WHERE `id`='{$uid}'");
	$passwordRow = mysql_fetch_assoc($query);
	
	if ($passwordRow['password'] != sha1($password)) {
		$errors[] = 'You entered the wrong password.';
	}
	
	if (!empty($passwordNew) && $passwordNew != $passwordNew2) {
		$errors[] = 'The new passwords you entered did not match.';
	} else if (!empty($passwordNew) && strlen($passwordNew) < 6) {
		$errors[] = 'Your new password muct be at least 6 characters long.';
	}
	
	if(filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
		$errors[] = 'The email you entered is not valid.';
	}
	
	if(!in_array($sprite, range(1, 10))) {
		$sprite = 1;
	}
	
	if (count($errors) > 0) {
		$message = '<div class="error">'.implode('</div><div class="error">', $errors).'</div>';
	} else {
	
		if (!empty($passwordNew)) {
			$newPasswordSql = !empty($passwordNew) ? " `password`='".sha1($passwordNew)."', " : '' ;
		}
		$sqlAvatar = cleanSql($avatar);
		$sqlEmail  = cleanSql($email);
		$sqlSig    = cleanSql($signature);
		$sprite    = (int) $sprite;
		
		
		$query = mysql_query("UPDATE `users` SET {$newPasswordSql} `email`='{$sqlEmail}', `avatar`='{$sqlAvatar}', `map_sprite`='{$sprite}', `signature`='{$sqlSig}' WHERE `id`='{$uid}'");
		
		if ($query) {
			$message = '<div class="notice">Your profile has been edited.</div>';
		} else {
			$message = '<div class="error">Something went wrong.</div>';
		}
	}
}











$query = mysql_query("SELECT * FROM `users` WHERE `id`='{$uid}'");
$userRow = cleanHtml( mysql_fetch_assoc($query) );

$cells = array();
for ($i=1; $i<=10; $i++) {
	$attr = $userRow['map_sprite'] == $i ? ' checked="checked" ' : '' ;
	$cells[] = '
		<img src="images/sprites/'.$i.'.png" /><br />
		<input type="radio" name="sprite" value="'.$i.'" '.$attr.' />
	';
}

echo '
	<h2 class="text-center">Edit Profile</h2>
	'.$message.'
	<form action="" method="post">
		<table class="edit-profile-table">
			<tr>
				<td class="text-right">Current Password <span class="small">(needed)</span>: </td>
				<td><input type="password" name="cpassword" value="" size="30" /></td>
			</tr>
			
			<tr>
				<td class="text-right">New Password <span class="small">(optional)</span>: </td>
				<td><input type="password" name="npassword" value="" size="30" /></td>
			</tr>
			
			<tr>
				<td class="text-right">New Password Again: </td>
				<td><input type="password" name="napassword" value="" size="30" /></td>
			</tr>
			
			<tr>
				<td class="text-right">Email (needed): </td>
				<td><input type="text" name="email" value="'.$userRow['email'].'" size="30" /></td>
			</tr>
			
			<tr>
				<td class="text-right">Avatar: </td>
				<td><input type="text" name="avatar" value="'.$userRow['avatar'].'" size="30" /></td>
			</tr>
			
			<tr>
				<td class="text-right" valign="top">Map Sprite</td>
				<td>
					<table>
						'.cellsToRows($cells, 5).'
					</table>
				</td>
			</tr>
			
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
			
			<tr>
				<td colspan="2" class="text-center">Signature</td>
			</tr>
			
			<tr>
				<td colspan="2" class="text-center">
					<textarea name="signature" cols="50" rows="5">'.$userRow['signature'].'</textarea>
				</td> 
			</tr>
			
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
			
			<tr>
				<td colspan="2" class="text-center">
					<input class="button" type="submit" value="Save" />
				</td>
			</tr>
		
		</table>
    </form>
';

echo '</div>';
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
