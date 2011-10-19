<?php
// Example of Auth_HTTP that also returns additional information
require_once('db_login.php');
require_once("Auth/HTTP.php");
// We use the same connection string as the pear DB functions
$AuthOptions = array('dsn'=>"mysql://$db_username:$db_password@$db_host/$db_database",
                     'table'=>"users", // your table name
                     'usernamecol'=>"username", // the table username column
                     'passwordcol'=>"password", // the table password column
                     'cryptType'=>"md5", // password encryption type in your db
                     'db_fields'=>"*" // enabling fetch for other db columns
                    );
$authenticate = new Auth_HTTP("DB", $AuthOptions);
// Set the realm name
$authenticate->setRealm('Member Area');
// Authentication failed error message
$authenticate->setCancelText('<h2>Access Denied</h2>');
// Request authentication
$authenticate->start(  );

// compare username and password to stored values
if($authenticate->getAuth(  )){
    echo "Welcome back to our site ".$authenticate->username.".<br />";
    echo "Your full name is ";
    echo $authenticate->getAuthData('first_name');
    echo " ";
    echo $authenticate->getAuthData('last_name').".";
}
?>