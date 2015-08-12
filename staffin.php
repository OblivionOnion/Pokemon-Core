<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"

        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">



<head>





	<title>Staff Only!!!</title>

	<meta http-equiv="content-type" content="text/html;charset=utf-8" />

	<link rel="stylesheet" type="text/css" href="css/style.css">

<?php

error_reporting(0);

session_start();

require_once 'functions.php';

$db = mysqlconnect();

mysql_connect("pokemoncore.db.11569752.hostedresource.com", "pokemoncore", "Temping12!");

mysql_select_db("pokemoncore");





if(!isset($_SESSION['user'])){

echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">';    

    exit; 

}







?>

</head>

<body background="http://www.pokemontoxic.net/css/images/pokemon.jpg" width=100%>

<div id="container">

	<div id="banner">

    </div>

    <div id="header">

        <p><center>Pokemon Core Rpg Staff Access</center></p>

    </div>

  <?php

  require_once 'sections/leftin.php';

  

  ?>

    

    <div id="content">

	

	Only staff can login here. 



		<?php

		



		?>

		

		

		<div id="copyright">

		Footer

		</div>

    </div>

    

     <?php

  require_once 'sections/rightin.php';

  

  ?>

    

    <div id="footer">

				<div align="center">Pokemon Core Rpg  - Present<br />

				  This site is not affilliated with Nintendo. The Pokemon Company, Creatures, or GameFreak

	  </div>

    </div>

</div>

</body>

</html>
