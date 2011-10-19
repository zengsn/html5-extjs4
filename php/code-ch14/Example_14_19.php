<?php
// Using Auth_HTTP to limit access
require_once('db_login.php');
require_once("Auth/HTTP.php");
// We use the same connection string as the pear DB functions
$AuthOpts = array('dsn' => "mysql://$db_username:$db_password@$db_host/$db_database",
                  'table' => "users", // your table name
                  'usernamecol' => "username", // the table username column
                  'passwordcol' => "password", // the table password column
                  'cryptType' => "md5" // password encryption type
                 );
$authenticate = new Auth_HTTP("DB", $AuthOpts);

// Set the realm name
$authenticate->setRealm('Member Area');
// Authentication failed error message
$authenticate->setCancelText('<h2>Access Denied</h2>');
// Request authentication
$authenticate->start(  );
// Compare username and password to stored values
if ($authenticate->getAuth(  )){
    echo "Welcome back to our site ".$authenticate->username.".";
}
?>