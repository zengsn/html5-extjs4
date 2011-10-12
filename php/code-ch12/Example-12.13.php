<?php
$password="secretpassword1";

if (strstr($password,"password")){
    echo('Passwords cannot contain the word "password".');
}
else {
    echo ("Password accepted.");
}
?>