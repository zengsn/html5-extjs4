<?php
// Define a function to perform the database insert and display the titles 
function insert_db($title, $pages){
    require_once('db_login.php');
    require_once('DB.php');
    $connection = DB::connect("mysql://$db_username:$db_password@$db_host/
$db_database");
    if (DB::isError($connection)){
        die ("Could not connect to the database: <br />". DB::errorMessage(
$connection));
    }

    if (get_magic_quotes_gpc(  )) {  //guard against SQL injection
        $title = stripslashes($title);
        $pages = stripslashes($pages);
    }

    $title = mysql_real_escape_string($title);
    $pages = mysql_real_escape_string($pages);

    // The query includes the form submission values that were passed to the function
    $query = "INSERT INTO books VALUES (NULL,'$title', '$pages')";
    $result = $connection->query($query);
    if (DB::isError($result)){
        die("Could not query the database: <br />". $query." ".DB::errorMessage
($result));
    }
    echo "Inserted OK.<br />";
    // Display the table
    $query = "SELECT * FROM books";
    $result = $connection->query($query);
    if (DB::isError($result)){
        die("Could not query the database: <br />". $query." ".DB::errorMessage
($result));
    }
    echo '<table border="1">';
    echo "<tr><th>Title</th><th>Pages</th></tr>";
    while ($result_row = $result->fetchRow(DB_FETCHMODE_ASSOC)) {
        echo "<tr><td>";
        echo $result_row["title"] . '</td><td>';
        echo $result_row["pages"] . '</td></tr>';
    }
echo "</table>";
$connection->disconnect(  );
}

?>
<html>
<head>
    <title>Inserting From a Form</title>
</head>
<body>
<?php
// Retrieve the variable from the form submission
$title = htmlentities($_GET["title"]);
$pages = htmlentities($_GET["pages"]);
if (($title != NULL ) && ($pages != NULL)){
    insert_db($title,$pages);
}
else {
    // Display the form
    echo '
    <h1>Enter a new title:</h1>
    <form action="'.$_SERVER["PHP_SELF"].'" method="GET">
        <label> Title: <input type="text" name="title" /> </label>
        <label> Pages: <input type="text" name="pages" /> </label>
    <input type="submit" value="Go!" />
    </form>';
}
?>
</body>
</html>