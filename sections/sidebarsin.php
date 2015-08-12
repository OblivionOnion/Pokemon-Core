<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
	    <meta name="keywords" content="Pokemon, PokemonRPG, Pokemonworld, PokemonCrater, PokemonBeast, Pokemonttack, PokemonOnline, PokemonRPG, Pokemonfree, MMORPG, Online Pokemon RPG, Pokemon RPG, Pokemon Core Online , Pokemon Free , Online Games , Pokemon Online Game ,Awesome Game ,Download,Crazy RPG , Google, Core battle arena , Battle Arena , Pokemon Gyms , Battle Online , Free Pokemon , Attack Data , Facebook , tppcrpg, tppc, pokemoncreed, pkmngalaxy, Pokemon RPG Online, RPG Pokemon Online, RPG" />
<meta name="description" content="Pokemon Core is a new Online Pokemon RPG that is the BEST Pokemon RPG to play." />
        <title>Pokemon Core - Online Pokemon RPG</title>
		<link rel="stylesheet" type="text/css" href="css/style.css" />
	</head>
<body>
<div id="fix">DO NOT DELETE</div>
<a href="profile.php">
<div id="header">
</div> </a>

<div id="bg2"></div>
<div id="bg3"></div>



<div id="leftnav">
	<ul>
		<li class="navtitle">Your Account</li>
				<li><a href="news.php">Home </a></li>
                <li><a href="profile.php">My Profile </a></li>
                <li><a href="editprofile.php">Edit Profile </a></li>
                <li><a href="team.php">Team</a></li>
                <li><a href="your_pokemon.php">Change Team</a></li>
                <li><a href="gyms.php">Battle Gyms</a></li>
                <li><a href="train.php">Training Center</a></li>
                <li><a href="top_trainers.php">Top Trainers </a></li>
                <li><a href="ranking.php">Ranks </a></li>
                <li><a href="promo2.php">Promo </a></li>
                <li><a href="news.php">News </a></li>
               <li><a href="http://www.pokemoncoreforums.net">Forums </a></li>
               <li><a href="chat.php">Chatroom </a></li>
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
                <li></li>
	</ul>
</div>

<div id="rightnav">
	<ul>
	  <li class="navtitle">Maps</li>
			<li><a href="map.php?map=1">Grass Map</a></li>
            <li><a href="map.php?map=2">Water Map </a></li>
            <li><a href="map.php?map=3">Rock Map </a></li>
            <li><a href="map.php?map=4">Ice Map </a></li>
             <li class="navtitle">Buy</li>
			<li><a href="buypokemon.php">Buy Pokemon </a></li>
            <li class="navtitle">Mini Games</li>
		 <li><a href="highlow.php">High/Low </a></li>
         <li class="navtitle">Trades</li>
		 <li><a href="Create.php">Make Trade<a></li>
          <li><a href="CompleteATrade.php">Check Trade <a></li>
           <li class="navtitle">Coins</li>
		 <li><a href="donations.php">NOT WORKING<a></li>
          <li><a href="coin_shop.php">Coin Shop <a></li>
	</ul>
</div>


<div id="content">
