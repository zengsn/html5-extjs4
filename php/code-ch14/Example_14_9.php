<?php
require_once('db_login.php');
require_once('DB.php');
if (!isset($_SERVER['PHP_AUTH_USER']) ||
    !isset($_SERVER['PHP_AUTH_PW'])) {
    header('WWW-Authenticate: Basic realm="Member Area"');
    header("HTTP/1.0 401 Unauthorized");
    echo "You must enter in a username and password combination!";
    exit;
}
$web_username = $_SERVER['PHP_AUTH_USER'];
$web_password = $_SERVER['PHP_AUTH_PW'];
$connection = DB::connect("mysql://$db_username:$db_password@$db_host/$db_database");
if (DB::isError($connection)){
    die ("Could not connect to the database: <br />". DB::errorMessage($connection));
}
$query = "SELECT user_id, username";
$query.= "  FROM users WHERE ";
$query.= "username='".$web_username."' AND password=MD5('".$web_password."') LIMIT 1";
$result = $connection->query($query);
if (DB::isError($result)){
    die("Could not query the database: <br />".$query." ".DB::errorMessage($result));
}
if (!$row = $result->fetchRow(DB_FETCHMODE_ASSOC)) {
    header('WWW-Authenticate: Basic realm="Member Area"');
    header("HTTP/1.0 401 Unauthorized");
    echo "Your username and password combination was incorrect!";
    exit;
}
echo("You have successfully logged in as ".$row['username']."!");
?>