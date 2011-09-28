<?php
require_once('db_login.php');
require_once('DB.php');
$connection = DB::connect("mysql://$db_username:$db_password@$db_host/$db_database");
if (DB::isError($connection)){
    die ("Could not connect to the database: <br />". DB::errorMessage($connection));
}
// Display the table
$query = "SELECT * FROM books";
$result = $connection->query($query);
if (DB::isError($result)){
    die("Could not query the database: <br />".$query." ".DB::errorMessage($result));
}
echo '<table border="1">';
echo "<tr><th>Title</th><th>Pages</th><th>Authors</th></tr>";

while ($result_row = $result->fetchRow(DB_FETCHMODE_ASSOC)) {
    echo "<tr><td>";
    echo htmlentities($result_row["title"]) . '</td><td>';
    echo htmlentities($result_row["pages"]) . '</td><td>';
    $title_id = mysql_real_escape_string($result_row["title_id"]);
    $author_query = "SELECT * FROM authors WHERE title_id = $title_id";
    $author_result = $connection->query($author_query);
    if (DB::isError($author_result)){
        die("Could not query the database: <br />".$author_query." ".
                DB::errorMessage($author_result));
    }
    $author_count = $author_result->numRows(  );
    if (0 == $author_count) {
        echo 'none';
    }
    $counter = 0;
    while ($author_result_row = $author_result->fetchRow(DB_FETCHMODE_ASSOC)) {
        $counter++;
        echo htmlentities($author_result_row["author"]);
        if ($counter != $author_count) {
            echo ', ';
        }
    }
    echo '</td></tr>';
}
echo '</table>';
$connection->disconnect(  );
?>