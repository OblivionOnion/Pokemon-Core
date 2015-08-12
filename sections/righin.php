    <div id="secondary">
		<ul>
        <li style="background-image:url('css/images/header.png');">Promo</li>
		
		  <li>
          <?php 
// We get the name of the promo
$type = mysql_query("SELECT * FROM promo ORDER BY id DESC"); 
$typer = mysql_fetch_array($type);
// Now we get the image of the promo

$pokemonname= mysql_real_escape_string($typer['pokemonname']);
$pokemonname2 = strip_tags($pokemonname);

$sql = "SELECT * FROM pokemon WHERE name='".$pokemonname2."'";
$result = mysql_query($sql) or die(mysql_error());
$battle_get = mysql_fetch_array($result);


$pic= mysql_real_escape_string($battle_get['name']);
$pic = strip_tags($pic);

?>
 <img src="http://www.pokemoncore.net/images/pokemon/<?php echo $pic; ?>" />
          
          </li>
		 
          
          
          
			<li style="background-image:url('css/images/header.png');">Maps</li>
			<a href="map.php?map=1">
		  <li>Grass Map</li>
		  </a>
		  <a href="map.php?map=2">
		  <li>Water Map </li>
		  </a>
			<a href="map.php?map=3">
			<li>Rock Map </li>
			</a>
			<a href="map.php?map=4">
			<li>Ice Map </li>
			</a>
			
		</ul>
    </div>
    
	<p> </p>
	<br>
	<br>
	    <div id="secondary">
		<ul>
			<li style="background-image:url('css/images/header.png');">More</li>
			
		<a href="buypokemon.php">
			<li>Buy Pokemon </li>
			</a>
		
		
			
		</ul>
    </div>
    	<p> </p>
	<br>
	<br>
	    <div id="secondary">
		<ul>
			<li style="background-image:url('css/images/header.png');">Minigames</li>
			
		<a href="highlow.php">
			<li>High/Low </li>
			</a>
		
		
			
		</ul>
    </div>
    
    	<p> </p>
	<br>
	<br>
	    <div id="secondary">
		<ul>
			<li style="background-image:url('css/images/header.png');">Trade</li>
			
		<a href="Create.php">
			<li>Make Trade </li>
			</a>
		
        
        		
		<a href="CompleteATrade.php">
			<li>Check Trade </li>
			</a>
		
			
		</ul>
    </div>
    
