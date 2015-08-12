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

	 <div class="CSSTableGenerator" >

	<center>

    

    

  <?php

	/*

		Place code to connect to your DB here.

	*/



// include your code to connect to DB.



	$tbl_name="user_logins";		//your table name

	// How many adjacent pages should be shown on each side?

	$adjacents = 3;

	

	/* 

	   First get total number of rows in data table. 

	   If you have a WHERE clause in your query, make sure you mirror it here.

	*/

	$query = "SELECT COUNT(*) as num FROM $tbl_name";

	$total_pages = mysql_fetch_array(mysql_query($query));

	$total_pages = $total_pages[num];

	

	/* Setup vars for query. */

	$targetpage = "Userlog.php"; 	//your file name  (the name of this file)

	$limit = 5; 								//how many items to show per page

$page2= mysql_real_escape_string($_GET['page']);

$page = strip_tags($page2);

	if($page) 

		$start = ($page - 1) * $limit; 			//first item to display on this page

	else

		$start = 0;								//if no page var is given, set start to 0

	

	/* Get data. */

	$sql = "SELECT * FROM $tbl_name  ORDER BY id  DESC LIMIT $start, $limit";

	$result = mysql_query($sql);

	

	/* Setup page vars for display. */

	if ($page == 0) $page = 1;					//if no page var is given, default to 1.

	$prev = $page - 1;							//previous page is page - 1

	$next = $page + 1;							//next page is page + 1

	$lastpage = ceil($total_pages/$limit);		//lastpage is = total pages / items per page, rounded up.

	$lpm1 = $lastpage - 1;						//last page minus 1

	

	/* 

		Now we apply our rules and draw the pagination object. 

		We're actually saving the code to a variable in case we want to draw it more than once.

	*/

	$pagination = "";

	if($lastpage > 1)

	{	

		$pagination .= "<div class=\"pagination\">";

		//previous button

		if ($page > 1) 

			$pagination.= "<a href=\"$targetpage?page=$prev\">« previous</a>";

		else

			$pagination.= "<span class=\"disabled\">« previous</span>";	

		

		//pages	

		if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up

		{	

			for ($counter = 1; $counter <= $lastpage; $counter++)

			{

				if ($counter == $page)

					$pagination.= "<span class=\"current\">$counter</span>";

				else

					$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					

			}

		}

		elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some

		{

			//close to beginning; only hide later pages

			if($page < 1 + ($adjacents * 2))		

			{

				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)

				{

					if ($counter == $page)

						$pagination.= "<span class=\"current\">$counter</span>";

					else

						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					

				}

				$pagination.= "...";

				$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";

				$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";		

			}

			//in middle; hide some front and some back

			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))

			{

				$pagination.= "<a href=\"$targetpage?page=1\">1</a>";

				$pagination.= "<a href=\"$targetpage?page=2\">2</a>";

				$pagination.= "...";

				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)

				{

					if ($counter == $page)

						$pagination.= "<span class=\"current\">$counter</span>";

					else

						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					

				}

				$pagination.= "...";

				$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";

				$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";		

			}

			//close to end; only hide early pages

			else

			{

				$pagination.= "<a href=\"$targetpage?page=1\">1</a>";

				$pagination.= "<a href=\"$targetpage?page=2\">2</a>";

				$pagination.= "...";

				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)

				{

					if ($counter == $page)

						$pagination.= "<span class=\"current\">$counter</span>";

					else

						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					

				}

			}

		}

		

		//next button



		if ($page < $counter - 1) 

			$pagination.= "<a href=\"$targetpage?page=$next\">next »</a>";

		else

			$pagination.= "<span class=\"disabled\">next »</span>";

		$pagination.= "</div>\n";		

	}

?>

  <?php

		$i = $offset;

		echo "<table width='100%' border='0' cellspacing='0' cellpadding='0'>"; 

echo "<table width='100%' border='1' table class='gridtable' >

		

		

<tr>

<th>Username</th>



</tr>";



		while($row = mysql_fetch_array($result))

		{

		$i++;

		

	

  

    echo "<td>";



	  echo $row['username'] ;

	  echo"<p> </p>";

	  echo $row['ip'] ;

	  echo"<p> </p>";



	  "</td>";

	  

	     

  echo "</tr>";

		

		}

		 echo "</table>"; 

	?>

  <?=$pagination?>

  

  

  



	

</center>

		    </div>

			  </div>

			  </div>

		   

		<div id="copyright">

		Footer

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
