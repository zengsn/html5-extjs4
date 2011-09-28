<?php
require_once('db_login.php');
require_once('DB.php');
$connection = DB::connect("mysql://$db_username:$db_password@$db_host/$db_database");
if (DB::isError($connection)){
    die ("Could not connect to the database: <br />". DB::errorMessage($connection));
}
$purchase_id = $_GET["purchase_id"];
if (get_magic_quotes_gpc(  )) {  //guard against SQL injection
    $qstring = stripslashes($purchase_id);
}
$purchase_id = mysql_real_escape_string($purchase_id);
$query = "DELETE FROM purchases WHERE purchase_id = '$purchase_id'";
$result = $connection->query($query);
if (DB::isError($result)){
    die("Could not query the database: <br />".$query." ".DB::errorMessage($result));
}
?>
<html>
<head>
    <title>Item deleted!</title>
<meta http-equiv="refresh" content="4"; url=deletion_link.php"> //redirect to
deletion_link.php
</head>
<body>
Item deleted!<br />

<?php
$query = "SELECT * FROM purchases NATURAL JOIN books NATURAL JOIN authors";
$result = $connection->query($query);
if (DB::isError($result)){
    die("Could not query the database: <br />".$query." ".DB::errorMessage($result));
}
echo '<table border="1">';
echo "<tr><th>User</th><th>Title</th><th>Pages</th>";
echo "<th>Author</th><th>Purchased</th></tr>";
while ($result_row = $result->fetchRow(DB_FETCHMODE_ASSOC)) {
    echo "<tr><td>";
    echo $result_row["user_id"] . '</td><td>';
    echo $result_row["title"] . '</td><td>';
    echo $result_row["pages"] . '</td><td>';
    echo $result_row["author"] . "</td><td>";
    echo $result_row["purchased"] . "</td></tr>";
}
echo "</table>";
$connection->disconnect(  );
?>
</body>
</html>