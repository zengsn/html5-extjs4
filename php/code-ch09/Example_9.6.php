<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html401/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Displaying in an HTML table</title>
</head>
<body>
<table border="1">
<tr>
<th>Title</th>
<th>Author</th>
<th>Pages</th>
</tr>
<?php
//Include our login information
include('db_login.php');
// Connect
$connection = mysql_connect($db_host, $db_username, $db_password);
if (!$connection){
die("Could not connect to the database: <br />". mysql_error( ));
}
// Select the database
$db_select = mysql_select_db($db_database);
if (!$db_select){
die ("Could not select the database: <br />". mysql_error( ));
}
// Assign the query
$query = "SELECT * FROM books NATURAL JOIN authors";
// Execute the query
$result = mysql_query($query);
if (!$result){
die ("Could not query the database: <br />". mysql_error( ));
}
// Fetch and display the results
while ($row = mysql_fetch_array($result, MYSQL_ASSOC)){
$title = $row["title"];
$author = $row["author"];
$pages = $row["pages"];
echo "<tr>";
echo "<td>$title</td>";
echo "<td>$author</td>";
echo "<td>$pages</td>";
echo "</tr>";
}
// Close the connection
mysql_close($connection);
?>
</table>
</body>
</html>