<?php

require_once 'config.php';

require_once 'functions.php';



$_SESSION = array();

session_regenerate_id(true);



$_SESSION['logout'] = '<div class="notice">You have been logged out.</div>';



 echo '<META HTTP-EQUIV="Refresh" Content="0; URL=login.php">';    

    exit;  

?>
