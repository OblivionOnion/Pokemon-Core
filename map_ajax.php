<?php
 require_once 'config.php';

$map = (int) $_GET['map'];
$uid = $_SESSION['username'];

if (!isset($_SESSION['catchLegneds'])) {
	require_once 'gym_functions.php';
	$_SESSION['catchLegneds'] = canCatchLegends($uid);
}

switch ($map) {
	case '1':
		// grass
		$wildPokemon = array(
			'Pikachu', 'Caterpie', 'Pidgey', 'Weedle', 'Nidoran (f)', 'Nidoran (m)', 'Exeggcute', 'Bellsprout',
			'Gloom', 'Oddish', 'Bulbasaur', 'Tangela', 'Hoppip', 'Skiploom', 'Jumpluff', 'Nuzleaf', 'Paras',
			'Venonat', 'Smeargle', 'Carnivine', 'Treecko', 'Tropius', 'Miltank', 'Happiny', 'Pichu', 'Buneary',
			'Zigzagoon', 'Venonat', 'Pineco', 'Togepi', 'Aipom', 'Hoppip', 'Taillow', 'Skarmory', 'Shroomish',
			'Slakoth', 'Budew', 'Spinda', 'Bidoof', 'Starly', 'Croagunk', 'Snivy', 'Cottonee', 'Durant', 'Joltik',
			'Rufflet', 'Foongus', 'Karrablast', 'Kricketot', 'Combee', 'Nincada', 'Sewaddle'
		);
		
		$legends = array(
			'Uxie', 'Azelf', 'Mesprit', 'Shaymin', 'Shaymin (Sky)', 'Virizion', 'Celebi',
			'Mew', 'Tornadus', 'Thunderus', 'Jirachi', 'Latias', 'Latios', 'Raikou'
		);
	break;
	
	case '2':
		//water
		$wildPokemon = array(
			'Krabby', 'Shellder', 'Seel', 'Slowpoke', 'Tentacool', 'Poliwag', 'Psyduck', 'Squirtle', 'Horsea',
			'Goldeen', 'Staryu', 'Magikarp', 'Lapras', 'Vaporeon', 'Chinchou', 'Lanturn', 'Krabby', 'Azurill',
			'Remoraid', 'Wingull', 'Shellos (West)', 'Shellos (East)', 'Mantyke', 'Tympole', 'Buizel', 'Cubchoo',
			'Panpour', 'Wailmer', 'Mudkip'
		);
		
		$legends = array(
			'Keldeo', 'Lugia', 'Kyogre', 'Suicune', 'Azelf', 'Mesprit', 'Uxie', 'Latias', 'Latios', 'Raikou', 'Manaphy', 'Phione'
		);
	break;
	
	case '3':
		//rock
		$wildPokemon = array(
			'Onix', 'Geodude', 'Omanyte', 'Kabuto', 'Aerodactyl', 'Larvitar', 'Archen', 'Lunatone', 'Shieldon', 
			'Solrock', 'Lileep', 'Anorith', 'Dratini', 'Charmander', 'Rattata', 'Spearow', 'Ekans', 'Igglybuff',
			'Zubat', 'Meowth', 'Mankey', 'Abra', 'Gastly', 'Cubone', 'Rhyhorn', 'Kangaskhan', 'Ditto', 'Shuckle',
			'Riolu', 'Roggenrola', 'Pawniard', 'Phanpy', 'Bagon', 'Golett', 'Deino', 'Scraggy', 'Durant', 'Cleffa',
			'Mawile', 'Trapinch', 'Shieldon', 'Sandile', 'Axew', 'Druddigon'
		);
		
		$legends = array(
			'Entei', 'Raikou', 'Heatran', 'Reshiram', 'Moltres', 'Zekrom', 'Genesect', 'Darkrai', 'Rayquaza',
			'Giratina', 'Groudon', 'Regice', 'Regirock', 'Registeel', 'Jirachi', 'Mew', 'Mewtwo', 'Ho-oh',
			'Dialga', 'Palkia', 'Landorus', 'Victini', 'Terrakion', 'Cobalion', 'Zapdos'
		);
	break;
	
	case '4':
		//ice
		$wildPokemon = array(
			'Jynx', 'Lapras', 'Cloyster', 'Swinub', 'Delibird', 'Smoochum', 'Spheal', 'Froslass',
			'Sneasel', 'Wynaut', 'Vanillite', 'Jynx', 'Seel', 'Bronzor', 'Smoochum', 'Nincada', 'Swinub',
			'Unown (A)', 'Unown (B)', 'Unown (C)', 'Unown (D)', 'Unown (E)', 'Unown (Em)', 'Unown (F)',
			'Unown (G)', 'Unown (H)', 'Unown (I)', 'Unown (J)', 'Unown (K)', 'Unown (L)', 'Unown (M)',
			'Unown (N)', 'Unown (O)', 'Unown (P)', 'Unown (Q)', 'Unown (Qm)', 'Unown (R)', 'Unown (S)',
			'Unown (T)', 'Unown (U)', 'Unown (V)', 'Unown (W)', 'Unown (X)', 'Unown (Y)', 'Unown (Z)'
		);
		
		$legends = array(
			'Regice', 'Lugia', 'Suicune', 'Deoxys', 'Kyurem', 'Rotom', 'Articuno', 'Regigigas'
		);
	break;
	
	default:
		die();
	break;
}

$x = (int) $_GET['x'];
$x = $x < 0 || $x > 25 ? 3 : $x;

$y = (int) $_GET['y'];
$y = $y < 0 || $y > 25 ? 3 : $y;

$time = time();

mysql_query("UPDATE `users` SET `map_num`='{$map}', `map_x`='{$x}', `map_y`='{$y}', `map_lastseen`='{$time}' WHERE `username`='{$uid}'");

if (rand(1,4) == 3) {
	$type = rand(1, 25) == 3 ? 'Shiny ' : '' ;
	$isLegend = rand(1, 1000) == 500 ? true : false ;

	/*
	// asdd test code
	if ($uid==5) {
		$isLegend = true;
	}
	*/
	
	if ($isLegend && $_SESSION['catchLegneds']) {
		$randomPokemon = $legends[ array_rand($legends) ];
		$randomLevel = rand(50, 80);
	} else {
		$randomPokemon = $wildPokemon[ array_rand($wildPokemon) ];
		$randomLevel = rand(5, 15);
	}
	
	$query = mysql_query("SELECT * FROM `pokemon` WHERE `name`='{$randomPokemon}' LIMIT 1");
	
	if (mysql_num_rows($query) == 1) {
		$_SESSION['battle']['opponent'][0] = mysql_fetch_assoc($query);
		$_SESSION['battle']['opponent'][0]['name'] = $type . $_SESSION['battle']['opponent'][0]['name'];
		$_SESSION['battle']['opponent'][0]['level'] = $randomLevel;
		$_SESSION['battle']['opponent'][0]['maxhp'] = $randomLevel*5;
		$_SESSION['battle']['opponent'][0]['hp'] = $randomLevel*5;
		$_SESSION['battle']['wild'] = true;
		$_SESSION['battle']['rebattlelink'] = '<a href="map.php?map='.$map.'">Back to map</a>';
		$_SESSION['battle']['onum'] = 0;
	
		$query = mysql_query("SELECT * FROM `user_pokemon` WHERE `name`='{$type}{$randomPokemon}' AND `username`='{$uid}' LIMIT 1");	
		
		$json = array('name'=>$type.$randomPokemon, 'level'=>$randomLevel, 'caught'=>mysql_num_rows($query));
		echo json_encode($json);
	} else {
		$fh = @fopen('map_errors.txt', 'a') or die();
		fwrite($fh, "Failed to find: '{$randomPokemon}' ". time() . PHP_EOL);
		fclose($fh);
	
		echo json_encode(array());
	}
} elseif (rand(1,10) == 3) {
	$randMoney = rand(1, 20);
	mysql_query("UPDATE `users` SET `money`=`money`+{$randMoney} WHERE `username`='{$uid}'");
	
	$json = array('money'=>$randMoney);
	echo json_encode($json);
} else {
	echo json_encode(array());
}

?>
