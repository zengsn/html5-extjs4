<?php
session_start(  );
//Do some miscellaneous work
$_SESSION['username'] = 'Michele';

// Logout of the site
session_destroy(  );
echo "At this point we can still see the value of username as ";
echo $_SESSION['username']."<br />";

//Unset the $_SESSION array value
unset ($_SESSION['username']);
if (is_null($_SESSION['username'])) {
    echo "Now the value of username is (blank)";
}
?>