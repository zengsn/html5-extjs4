<?php
require_once('db_login.php');
require_once('DB.php');
$connection = DB::connect("mysql://$db_username:$db_password@$db_host/
$db_database");
if (DB::isError($connection)){
    die ("Could not connect to the database: <br />". DB::errorMessage(
$connection));
}
$title_id = $_GET["title_id"];
if (get_magic_quotes_gpc(  )) {  //guard against SQL injection
     $title_id = stripslashes($title_id);
 }
 $title_id = mysql_real_escape_string($title_id);

 $user_id = 'mdavis';
 $query = "INSERT INTO purchases VALUES (NULL,'$user_id',$title_id,NULL)";
 $result = $connection->query($query);
 if (DB::isError($result)){
     die("Could not query the database: <br />". $query." ".DB::errorMessage(
$result));
 }
?>
<html>
<head>

    <title>Thanks for your purchase!</title>
 <meta http-equiv="refresh" content="4; url=pear_purchase_example.php">
 </head>
 <body>
 Thanks for your purchase!<br />
<?php

   $query = "SELECT * FROM purchases NATURAL JOIN books NATURAL JOIN authors";
   $result = $connection->query($query);
   if (DB::isError($result)){
    die("Could not query the database: <br />". $query." ".DB::errorMessage($result));
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