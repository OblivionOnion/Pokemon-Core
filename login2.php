<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"

        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">



 <?php		error_reporting(0);

		session_start();

require_once 'functions.php';

  require_once 'sections/title.php';

  

  

  ?>

<div id="container">

	<div id="banner">

    </div>

    <div id="header">

        <p>Pokemon Core Rpg V2.0</p>

    </div>

    

  <?php

  require_once 'sections/leftout.php';

  

  ?>

    

    <div id="content">



  <div class="CSSTableGenerator" >



      <p align="center">

 <form method="post" action="checklogin2.php">

    <table width="100%" border="1" class="gridtable" table="table">

      <tr>

        <td><h2>Login</h2></td>

      </tr>

      <tr>

        <td><p align="center">Username:</p>

            <p align="center">

              <input name="myusername" type="text" id="myusername"  style="&lt;font color=#ff0000&gt;T&lt;/font&gt;" />

            </p>

          <p align="center">Password: </p>

          <p align="center"><font color="#FF0000">

              <input name="mypassword" type="password" id="mypassword"  style="" />

            </font></p>

          <p align="center">&nbsp;</p>

          <p align="center">

              <input type="submit" name="Submit" value="Log in" onclick="this.form.submit();" />

            </p>

          

      </tr>

    </table>

  </form>

</div>

  

  

  

  

      </p>

      <p align="center">&nbsp;</p>

      <p>&nbsp;</p>

      <div id="copyright">

		Footer

	  </div>

  </div>

    <?php

  require_once 'sections/rightout.php';

  

  ?>

    

    

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
