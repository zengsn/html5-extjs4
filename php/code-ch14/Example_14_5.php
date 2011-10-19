<?php
$username = 'jon_doe';
$password = 'MyNameIsJonDoe';
if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW'])) {
    header('WWW-Authenticate: Basic realm="Member Area"');
    header("HTTP/1.0 401 Unauthorized");
    echo "You must enter in a username and password combination!";
    exit;
}
elseif (strcmp($_SERVER['PHP_AUTH_USER'], $username) !== 0 ||
    strcmp($_SERVER['PHP_AUTH_PW'], $password) !== 0) {
    header('WWW-Authenticate: Basic realm="Member Area"');
    header("HTTP/1.0 401 Unauthorized");
    echo "Your username and password combination was incorrect!";
    exit;
}
echo("You have successfully logged in!");
?>