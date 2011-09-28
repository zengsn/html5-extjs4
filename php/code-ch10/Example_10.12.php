<?php
require_once('db_login.php');
require_once('DB.php');
$connection = DB::connect("mysql://$db_username:$db_password@$db_host/$db_database");
if (DB::isError($connection)){
    die ("Could not connect to the database: <br />". DB::errorMessage($connection));
}

$connection->nextId('booksSequence');
$connection->nextId('booksSequence');
$connection->nextId('booksSequence');

$title_id = $connection->nextId('booksSequence');
if (PEAR::isError($title_id)) {
    die($title_id->getMessage(  ));
}

$query = "INSERT INTO books VALUES ($title_id,'Python in a Nutshell',600)";
$result = $connection->query($query);
if (DB::isError($result)){
    die("Could not query the database: <br />$query ".DB::errorMessage($result));
}
$query = "INSERT INTO authors VALUES (NULL,$title_id,'Alex Martelli')";
$result = $connection->query($query);
if (DB::isError($result)){
    die("Could not query the database: <br />$query ".DB::errorMessage($result));
}
echo "Inserted successfully!";
$connection->disconnect(  );
?>