<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"

        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">



 <?php

 require_once 'config.php';

require_once 'functions.php';

  require_once 'sections/title.php';

  

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

    <div id="header">

        <p>Pokemon Core Rpg V2.0</p>

    </div>

    

  <?php

  require_once 'sections/leftin.php';

  

  ?>

    

  <div id="content">



  <center>

  You have battled a lot today please fill in this reCAPTCHA to carry on battling.

  <br> </br>



    <form action="" method="post">

<?php



require_once('recaptchalib.php');



// Get a key from https://www.google.com/recaptcha/admin/create

$publickey = "6Lfc3-ASAAAAALfTRSQyduQuQhxa9I0xFo2Tgab2";

$privatekey = "6Lfc3-ASAAAAADThPR63RBtaA-suFk3QznsfADIE";



# the response from reCAPTCHA

$resp = null;

# the error code from reCAPTCHA, if any

$error = null;



# was there a reCAPTCHA response?

if ($_POST["recaptcha_response_field"]) {

        $resp = recaptcha_check_answer ($privatekey,

                                        $_SERVER["REMOTE_ADDR"],

                                        $_POST["recaptcha_challenge_field"],

                                        $_POST["recaptcha_response_field"]);



        if ($resp->is_valid) {

                echo "You got it! You can carry on using the rpg now.";

				$_SESSION['views23'] = '0';

        } else {

                # set the error code so that we can display it

                $error = $resp->error;

        }

}

echo recaptcha_get_html($publickey, $error);

?>

    <br/>

    <input type="submit" value="submit" />

    </form>







</center>





      <div id="copyright">

		Footer

	  </div>

 </div>

    <?php

  require_once 'sections/righin.php';

  

  ?>

     </div>

    

    <div id="footer">

				<div align="center">Pokemon Core Rpg  - Present<br />

				  This site is not affilliated with Nintendo. The Pokemon Company, Creatures, or GameFreak

	  </div>  </div><center><!-- Begin BidVertiser code -->

<SCRIPT LANGUAGE="JavaScript1.1" SRC="http://bdv.bidvertiser.com/BidVertiser.dbm?pid=548923&bid=1375006" type="text/javascript"></SCRIPT>

<noscript><a href="http://www.bidvertiser.com">internet marketing</a></noscript>

<!-- End BidVertiser code -->  </center>



</div>

</body>

</html>
