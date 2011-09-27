<?php
include('db_login.php');
require_once('MDB2.php');
//Translate our database login information into an array.
$dsn = array(
'phptype' => 'mysql',
'username' => $username,
'password' => $password,
'hostspec' => $host,
'database' => $database
);
//Create the connection as an MDB2 instance.
$mdb2 = MDB2::factory($dsn);
if (PEAR::isError($mdb2)) {
die($mdb2->getMessage( ));
}
//Set the fetchmode to field associative.
$mdb2->setFetchMode(MDB2_FETCHMODE_ASSOC);
$query = "SELECT * FROM books NATURAL JOIN authors";
$result =$mdb2->query($query);
if (PEAR::isError($result)){
die("Could not query the database:<br />$query ".$result->getMessage( ));
}
//Display the results.
echo('<table border="1">');
echo '<tr><th>Title</th><th>Author</th><th>Pages</th></tr>';
//Loop through the result set.
while ($row = $result->fetchRow( )) {
echo "<tr><td>";
echo htmlentities($row['title']) . '</td><td>';
echo htmlentities($row['author ']) . '</td><td>';
echo htmlentities($row['pages']) . '</td></tr>';
}
echo("</table>");
//Close the connection.
$result->free( );
?>