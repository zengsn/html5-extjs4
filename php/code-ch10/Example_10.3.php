<?php
require_once('db_login.php');
require_once('DB.php');
$connection = DB::connect("mysql://$db_username:$db_password@$db_host/$db_database");
if (DB::isError($connection)){
	die ("Could not connect to the database: <br />". DB::errorMessage($connection));
}
$query = "INSERT INTO purchases VALUES (NULL,'mdavis',2,NULL)";
$result = $connection->query($query);
if (DB::isError($result)){
	die("Could not query the database: <br />". $query." ".DB::errorMessage($result));
}
echo "Inserted successfully!";
$connection->disconnect( );
?>