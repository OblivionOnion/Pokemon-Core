<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"

        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">



 <?php

  require_once 'config.php';

require_once 'functions.php';

  require_once 'sections/sidebarsin.php';

mysql_connect("pokemoncore.db.11569752.hostedresource.com", "pokemoncore", "Temping12!");

mysql_select_db("pokemoncore");



 $db = mysqlconnect();

  $statementt2 = $db->prepare("select * from users where username = :name");

$statementt2->execute(array(':name' =>  $_SESSION['username']));

$battle_gett2 = $statementt2->fetch(); // Use fetchAll() if you want all results, or just iterate over the statement, since it implements Iterator









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

 if (isset($_GET['claim'])) { 

 $claim= mysql_real_escape_string($_GET['claim']);

$claim2 = strip_tags($claim);   



  

  $statementt = $db->prepare("select * from toxic_shop where id = :name");

$statementt->execute(array(':name' =>  $claim2));

$battle_gett = $statementt->fetch(); // Use fetchAll() if you want all results, or just iterate over the statement, since it implements Iterator







$toxic_coins= mysql_real_escape_string($battle_get['toxic_coins']);

$toxic_coins44 = strip_tags($toxic_coins);







$pokemon_prize2= mysql_real_escape_string($battle_gett['pokemon_prize']);

$pokemon_prize = strip_tags($pokemon_prize2);





$pokemon_name2= mysql_real_escape_string($battle_gett['pokemon_name']);

$pokemon_name = strip_tags($pokemon_name2);



$pokemon_type2= mysql_real_escape_string($battle_gett['pokemon_type']);

$pokemon_type = strip_tags($pokemon_type2);







if ($battle_gett2['coins']  < $pokemon_prize) {

echo "You do not have enough coins to buy this pokemon. Please go back.";

die;

}





if ($battle_gett2['coins']  > $pokemon_prize) {







echo $pokemon_name;

echo "               is now yours.";





	

	$level = '5';

	$exp = '500';

	$move1 = 'ember';

	$move2 = 'ember';

	$move3 = 'ember';

	$move4 = 'ember';

	mysql_query("INSERT INTO `user_pokemon` (`uid`, `name`, `level`, `exp`, `move1`, `move2`, `move3`, `move4`)

	VALUES ('{$_SESSION['userid']}', '{$pokemon_name}', '{$level}', '{$exp}', '{$move1}', '{$move2}', '{$move3}', '{$move4}')");

	

	

	

	

	$gggggggggggggggg = "UPDATE users SET coins=coins-? WHERE username= ?";

	$dadasdasd = $db->prepare($gggggggggggggggg);

	$dadasdasd->execute(array($pokemon_prize,$_SESSION['username'] ));

	end;

	die;

	

	



}





if ($battle_gett2['coins']  == $pokemon_prize) {





echo $pokemon_name;

echo "               is now yours.";



	

	$level = '5';

	$exp = '500';

	$move1 = 'ember';

	$move2 = 'ember';

	$move3 = 'ember';

	$move4 = 'ember';

	mysql_query("INSERT INTO `user_pokemon` (`uid`, `name`, `level`, `exp`, `move1`, `move2`, `move3`, `move4`)

	VALUES ('{$_SESSION['userid']}', '{$pokemon_name}', '{$level}', '{$exp}', '{$move1}', '{$move2}', '{$move3}', '{$move4}')");

	

	

	

	

	$gggggggggggggggg = "UPDATE users SET coins=coins-? WHERE username= ?";

	$dadasdasd = $db->prepare($gggggggggggggggg);

	$dadasdasd->execute(array($pokemon_prize,$_SESSION['username'] ));

	end;

	die;

	

}



   

}

 

 ?>

 <center>

 

   <p>&nbsp;</p>

   <p>Here you can use your Core Coins to buy pokemon. You can gain core coins from the Buy Core Coins shop and there is a little chance you can find Core Coins while in wild battles.   </p>

   <p>Your Have  <?php  echo $battle_gett2['coins'] ;?>   Core Coins </p>

   <table width="579" class="gridtable">

     <tbody>

       <tr>

         <th>Pokemon Image  </th>

         <th>Pokémon</th>

         <th>Level</th>

         <th>Cost</th>

		  <th>Type Of Pokemon</th>

         <th>Claim</th>

       </tr>

    <?php

	

	// Get all the data from the "example" table

$result = mysql_query("SELECT * FROM toxic_shop") 

or die(mysql_error()); 

while($row = mysql_fetch_array( $result )) { 

	?>

	 

	   <tr>

		 <td><img src="http://www.pokemoncore.net/images/Normal/<?php echo $row['pokemon_pic'];?>" /></td>

         <td><?php echo $row['pokemon_name'];?></td>

         <td>5</td>

         <td><?php echo $row['pokemon_prize'];?> coins</td>

		  <td><?php echo $row['pokemon_type'];?> </td>

         <td><a href="coin_shop.php?claim=<?php echo $row['id'];?>">Claim Prize</a></td>

       </tr>

	   

	   <?php

	   } 



	   

	   ?>

	   

     </tbody>

   </table>



<p>&nbsp;</p>  



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
