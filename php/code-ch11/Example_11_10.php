<?php
function query_db($qstring) {
    include('db_login.php');  //connection details
    require_once('DB.php');  //PEAR DB
    $connection = DB::connect("mysql://$db_username:$db_password@$db_host/$db_database");

    if (DB::isError($connection)){  //check for connect errors
        die ("Could not connect to the database: <br />". DB::errorMessage($connection));
    }
    if (get_magic_quotes_gpc()) {  //guard against SQL injection
        $qstring = stripslashes($qstring);
    }
    $qstring = mysql_real_escape_string($qstring);
    $query = "SELECT title, pages, author_id, author FROM books NATURAL JOIN authors
               WHERE books.title LIKE '%$qstring%'";  //build the query
    $result = $connection->query($query);
    if (DB::isError($result)){
        die("Could not query the database:<br />".$query." ".DB::errorMessage($result));
    }
    echo ('<table border="1">');
    echo "<tr><th>Title</th><th>Author</th><th>Pages</th></tr>";
    while ($result_row = $result->fetchRow()) {
        echo "<tr><td>";
        echo $result_row[1] . '</td><td>';
        echo $result_row[3] . '</td><td>';
        echo $result_row[2] . '</td></tr>';
    }
    echo ("</table>");
    $connection->disconnect();
}
?>
<html>
<head>
    <title>Building a Form</title>
</head>
<body>
<?php
$search = htmlentities($_GET["search"]);
$self = htmlentities($_SERVER['PHP_SELF']);
if ($search != NULL){
    echo "The search string is: <strong>$search</strong>.";
    query_db($search);
}
else {
    echo ('
    <form action="'.$self.'" method="get">
        <label>Search:
            <input type="text" name="search"/>
        </label>
        <input type="submit" value="Go!" />
    </form>
    ');
}

?>
</body>
</html>