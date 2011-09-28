<?php
include('db_login.php');
require_once( 'DB.php' );
$connection = DB::connect( "mysql://$db_username:$db_password@$db_host/$db_database");
if (!$connection)
{
	die ("Could not connect to the database: <br>". DB::errorMessage( ));
};

$query = 'CREATE TABLE purchases (
	purchase_id int(11) NOT NULL auto_increment,
	user_id varchar(10) NOT NULL,
	title_id int(11) NOT NULL,
	purchased timestamp NOT NULL,
	PRIMARY KEY (purchase_id))';
	
$result = $connection->query($query);
if (DB::isError($result))
{
	die ("Could not query the database: <br>". $query. " ".DB::errorMessage($result));
}
echo ("Table created successfully!");
$connection->disconnect( );
?>