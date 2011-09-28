<?php
require_once('db_login.php');
require_once('DB.php');
$connection = DB::connect("mysql://$db_username:$db_password@$db_host/$db_database");
if (DB::isError($connection)){
    die ("Could not connect to the database: <br />". DB::errorMessage($connection));
}

$query = "SELECT * FROM purchases NATURAL JOIN books";
$result = $connection->query($query);
if (DB::isError($result)){
    die("Could not query the database: <br />".$query." ".DB::errorMessage($result));
}
echo '<table border="1">';
echo "<tr><th>User</th><th>Title</th><th>Purchased</th><th>Remove</th></tr>";
while ($result_row = $result->fetchRow(DB_FETCHMODE_ASSOC)) {
    echo "<tr><td>";
    echo $result_row["user_id"] . '</td><td>';
    echo $result_row["title"] . '</td><td>';
    echo $result_row["purchased"] . '</td><td>';
    echo '<a href="delete.php?purchase_id='.$result_row["purchase_id"]
.'">Click to remove
from purchases</a></td></tr>';
}
echo '</table>';
$connection->disconnect(  );
?>