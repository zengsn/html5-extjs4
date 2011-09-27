<?php

include('db_login.php');
require_once('DB.php');

$connection = DB::connect("mysql://$db_username:$db_password@$db_host/$db_database");

if (DB::isError($connection)){
	die("Could not connect to the database: <br />".DB::errorMessage($connection));
}

$query = "SELECT * FROM books NATURAL JOIN authors";
$result = $connection->query($query);

(DB::isError($result)){
die("Could not query the database:<br />$query ".DB::errorMessage($result));
}

echo('<table border="1">');
echo '<tr><th>Title</th><th>Author</th><th>Pages</th></tr>';

while ($result_row = $result->fetchRow( )) {
echo "<tr><td>";
echo $result_row[1] . '</td><td>';
echo $result_row[4] . '</td><td>';
echo $result_row[2] . '</td></tr>';
}

echo("</table>");
$connection->disconnect( );

?>