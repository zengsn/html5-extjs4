<?php
session_start();
require_once('db_login.php');
require_once('DB.php');
if (empty($_SESSION['user_id'])) {
    if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW'])) {
        header('WWW-Authenticate: Basic realm="Member Area"');
        header("HTTP/1.0 401 Unauthorized");
        echo "You must enter in a username and password combination!";
        exit;
    }
    $connection = DB::connect("mysql://$db_username:$db_password@$db_host/$db_database");
    if (DB::isError($connection)){
        die ("Could not connect to the database: <br />". DB::errorMessage($connection));
    }
    $username = mysql_real_escape_string($_SERVER['PHP_AUTH_USER']);
    $password = mysql_real_escape_string($_SERVER['PHP_AUTH_PW']);
    $query = "SELECT user_id, username FROM users WHERE
    username='".$username."' AND password=MD5('".$password."') LIMIT 1";
    $result = $connection->query($query);
    if(!($row = $result->fetchRow(DB_FETCHMODE_ASSOC))) {
        header('WWW-Authenticate: Basic realm="Member Area"');
        header("HTTP/1.0 401 Unauthorized");
        echo "Your username and password combination was incorrect!";
        exit;
    }
    $_SESSION['user_id'] = $row['user_id'];
    $_SESSION['username'] = $row['username'];
}
echo "You have successfully logged in as ".$_SESSION["username"].".";
?>