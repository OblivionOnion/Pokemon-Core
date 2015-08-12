<?php







function mysqlconnect(){



global $db;



$host = 'pokemoncore.db.11569752.hostedresource.com';

$port = 3306; // This is the default port for MySQL

$database = 'pokemoncore';

$username = 'pokemoncore';

$password = 'Temping12!!';



    // Construct the DSN, or "Data Source Name".  Really, it's just a fancy name

    // for a string that says what type of server we're connecting to, and how

    // to connect to it.  As long as the above is filled out, this line is all

    // you need :)

    $dsn = "mysql:host=$host;port=$port;dbname=$database";



    // Connect!

    $db = new PDO($dsn, $username, $password);

global $db;

    // Return PDO object

    return $db;

	

}





?>
