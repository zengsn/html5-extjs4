<?php
function query_db($qstring){
    require_once("smarty.php");
    require_once("../db_login.php");
    require_once("DB.php");
    $connection = DB::connect("mysql://$db_username:$db_password@$db_host/
$db_database");
    if (DB::isError($connection)){
        die("Could not connect to the database: <br />". DB::errorMessage
($connection));
    }
    $query = "SELECT * FROM books
        NATURAL JOIN authors
               WHERE books.title like '%$qstring%'";
    $result = $connection->query($query);
    if (DB::isError($result)){
        die ("Could not query the database: <br>". $query. " ".DB::errorMessage
($result));
    }
    while ($result_row = $result->fetchRow(DB_FETCHMODE_ASSOC)) {
        $test[] = $result_row;
    }
    $connection->disconnect(  );
    $smarty->assign('users', $test);
    $smarty->display('table.tpl');
}
?>
<html>
<head>
    <title>Building a Form</title>
</head>
<body>
<?php
$search = $_GET["search"];
$self = htmlentities($_SERVER['PHP_SELF']);
if ($search != NULL){
    echo "The search string is: <strong>$search</strong>.";
    query_db($search);
}
else {
    echo '
    <form action="'.$self.'" method="GET">
         <label>
             Search:
             <input type="text" name="search" id="search" />
         </label>
         <input type="submit" value="Go!">
    </form>';
}
?>
</body>
</html>