<?php
 // Example of Auth_HTTP the also returns additional information about the user
 require_once('config.php');
 require_once('db_login.php');
 require_once('D:/Develop/xampp/php/PEAR/Auth/HTTP.php');
 // We use the same connection string as the pear DB functions
 $AuthOptions = array(
                      'dsn'=>"mysql://$db_username:$db_password@$db_host/$db_database",
                      'table'=>"users", // your table name
                      'usernamecol'=>"username", // the table username column
                      'passwordcol'=>"password", // the table password column
                      'cryptType'=>"md5", // password encryption type in your db
                      'db_fields'=>"*" // enabling fetch for other db columns
 );
 $authenticate = new Auth_HTTP("DB", $AuthOptions);
 // set the realm name
 $authenticate->setRealm('Member Area');
 // authentication failed error message
 $authenticate->setCancelText('<h2>Access Denied</h2>');
 // request authentication

 $authenticate->start(  );
 // compare username and password to stored values
 if ($authenticate->getAuth(  )) {
     session_start(  );
     $smarty->assign('blog_title',$blog_title);
     $smarty->display('header.tpl');
     //setup session variable
     $_SESSION['username'] = $authenticate->username;
     $_SESSION['first_name'] = $authenticate->getAuthData('first_name');
     $_SESSION['last_name'] = $authenticate->getAuthData('last_name');
     $_SESSION['user_id'] = $authenticate->getAuthData('user_id');
     echo "Login successful. Great to see you ";
     echo $authenticate->getAuthData('first_name');
     echo " ";
     echo $authenticate->getAuthData('last_name').".<br />";
     $smarty->display('footer.tpl');
 }
 ?>