<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
		<meta name="keywords" content="Pokemon, PokemonRPG, Pokemonworld, PokemonCrater, PokemonBeast, Pokemonttack, PokemonOnline, PokemonRPG, Pokemonfree, MMORPG, Online Pokemon RPG, Pokemon RPG, Pokemon Core Online , Pokemon Free , Online Games , Pokemon Online Game ,Awesome Game ,Download,Crazy RPG , Google, Core battle arena , Battle Arena , Pokemon Gyms , Battle Online , Free Pokemon , Attack Data , Facebook , tppc, tppcrpg, pokemoncoreed, pkmngalaxy, RPG Pokemon Online, Pokemon Online RPG, RPG" />
<meta name="description" content="Pokemon Core is a new Online Pokemon RPG that is the BEST Pokemon RPG to play." />
        <title>Pokemon Core - Online Pokemon RPG</title>
		<link rel="stylesheet" type="text/css" href="css/style.css" />
	</head>
<body>
<div id="fix">DO NOT DELETE</div>

<div id="header">
</div>

<div id="bg2"></div>
<div id="bg3"></div>

<div id="leftnav">
	<ul>
		<li class="navtitle">Navigation</li>
				<li><a href="index.php">Index Page</a></li>
			<li><a href="login.php">Log In</a></li>
			<li><a href="http://www.pokemoncoreforums.net">Forums</a></li>
			<li><a href="register.php">Sign Up</a></li>
			<li><a href="#chat">Chat Room</a></li>
	</ul>
</div>

<div id="rightnav">
	<ul><li class="navtitle">Navigation</li>
			<li><a href="index.php">Index Page</a></li>
			<li><a href="login.php">Log In</a></li>
			<li><a href="http://www.pokemoncoreforums.net">Forums</a></li>
			<li><a href="register.php">Sign Up</a></li>
			<li><a href="#chat">Chat Room</a></li>
            
            	<li><a href="#">User Count
			<?php
			mysql_connect("pokemoncore.db.11569752.hostedresource.com", "pokemoncore", "Temping12!");
mysql_select_db("pokemoncore");

			$result12 = mysql_query("SELECT * FROM users W");
$num_rows = mysql_num_rows($result12);
echo "$num_rows ";
?></a></li>
	</ul>
</div>

<div id="content">
