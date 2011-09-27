<?php
// Include our login information
include('db_login.php');
// Connect
$connection = mysql_connect( $db_host, $db_username, $db_password );
if (!$connection){
die ("Could not connect to the database: <br />". mysql_error( ));
}
// Select the database
$db_select=mysql_select_db($db_database);
if (!$db_select){
die ("Could not select the database: <br />". mysql_error( ));
}
// Assign the query
$query = "SELECT * FROM books NATURAL JOIN authors";
// Execute the query
$result = mysql_query( $query );
if (!$result){
die ("Could not query the database: <br />". mysql_error( ));
}
// Fetch and display the results
while ($result_row = mysql_fetch_row(($result))){
echo 'Title: '.$result_row[1] . '<br />';
echo 'Author: '.$result_row[4] . '<br /> ';
echo 'Pages: '.$result_row[2] . '<br /><br />';
}
/ /Close the connection
mysql_close($connection);
?>

<!--
Title: Linux in a Nutshell<br />Author: Ellen Siever<br /> Pages: 476<br />
<br />Title: Linux in a Nutshell<br />Author: Aaron Weber<br /> Pages: 476<br />
<br />Title: Classic Shell Scripting<br />Author: Arnold Robbins<br /> Pages: 256<br />
<br />Title: Classic Shell Scripting<br />Author: Nelson H.F. Beebe<br /> Pages:
256<br /><br />
-->