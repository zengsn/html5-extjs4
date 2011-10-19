<?php
if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW'])) {
    header('WWW-Authenticate: Basic realm="Member Area"');
    header("HTTP/1.0 401 Unauthorized");
    echo "Please login with a valid username and password.";
    exit;
} else {
   echo "You entered a username of: ".$_SERVER['PHP_AUTH_USER']." ";
   echo "and a password of: ".$_SERVER['PHP_AUTH_PW'].".";
}
?>