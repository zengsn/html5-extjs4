<?php
require_once('db_login.php');
require_once('DB.php');
$connection = DB::connect("mysql://$db_username:$db_password@$db_host/$db_database");
if (DB::isError($connection)){
	die ("Could not connect to the database: <br />". DB::errorMessage($connection));
}
$query = "SELECT * FROM books";
$result = $connection->query($query);
if (DB::isError($result)){
	die("Could not query the database: <br />". $query." ".DB::errorMessage($result));
}
echo '<table border="1">';
echo "<tr><th>Title</th><th>Pages</th><th>Buy</th></tr>";
while ($result_row = $result->fetchRow(DB_FETCHMODE_ASSOC)) {
	echo "<tr><td>";
	echo $result_row["title"] . '</td><td>';
	echo $result_row["pages"] . '</td><td>';
	echo '<a href="purchase.php?title_id='.$result_row["title_id"].'">Click	to purchase</a></td></tr>';
}
echo "</table>";
$connection->disconnect( );
?>