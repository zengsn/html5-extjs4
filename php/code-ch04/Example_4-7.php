<?php
if ($username == "Admin"){
    echo ('Welcome to the admin page.');
}
elseif ($username == "Guest"){
    echo ('Please take a look around.');
}
else {
    echo ("Welcome back, $username.");
}
?>