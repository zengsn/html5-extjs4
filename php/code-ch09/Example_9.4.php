<?php
// Include our login information
include('db_login.php');
// Connect
$connection = mysql_connect($db_host, $db_username, $db_password);
if (!$connection){
die ("Could not connect to the database: <br />". mysql_error( ));
}

?>