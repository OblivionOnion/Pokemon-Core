 <?php mysql_connect("pokemoncore.db.11569752.hostedresource.com", "pokemoncore", "Temping12!");
mysql_select_db("pokemoncore");

?>
  
  <div id="primary">
		<ul>
			<li style="background-image:url('css/images/header.png');">Your Account</li>
			<li><a href="profile.php">My Profile </a></li>
			<li><a href="editprofile.php">Edit Profile </a></li>
			<li><a href="team.php">Team</a></li>
			<li><a href="gyms.php">Battle Gyms</a></li>
			<li><a href="train.php">Training Center</a></li>
			<li><a href="top_trainers.php">Top Trainers </a></li>
			<li><a href="ranking.php">Ranks </a></li>
			<li><a href="promo.php">Promo </a></li>
            	<li><a href="news.php">News </a></li>
            	<li><a href="chat.php">Chatroom </a></li>
		<li><a href="your_pokemon.php">Your Pokemon </a></li>
					<li><a href="pokedex.php">Pokedex </a></li>
					<li><a href="list_pm.php">Messeges 
					<?php



$result43424324 = mysql_query("SELECT * FROM pm WHERE
	user2='".$_SESSION['userid']."'");

$num_rows = mysql_num_rows($result43424324);


echo "$num_rows ";




					?>
					
					</a></li>
						<li><a href="mart.php">Mart </a></li>
						<li><a href="online.php">Online Users </a></li>
						<li><a href="staff.php">Staff List </a></li>
			<li><a href="logout.php">Logout </a></li>
		</ul>
		
    </div>
	
