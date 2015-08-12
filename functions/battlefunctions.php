<?php

function capture()

{

if(isset($_SESSION['views23']))

    $_SESSION['views23'] = $_SESSION['views23']+ 1;

else

$_SESSION['views23'] = 1;



?>



<?php



if  ($_SESSION['views23'] > 50)

 {



 $_SESSION['capcatch'] = 1 ;



echo '<META HTTP-EQUIV="Refresh" Content="0; URL=reCAPTCHA.php">';    

    exit;    



}



else {



print ("");



}

} 



?>
