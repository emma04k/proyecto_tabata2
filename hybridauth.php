<?php
 require_once ("vendor/autoload.php");
if(isset($_REQUEST['hauth_star'])|| isset($_REQUEST['hauth_done']))
{
    Hybrid_Endpoint::process();
}

 ?>
