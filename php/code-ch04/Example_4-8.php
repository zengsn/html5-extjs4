<?php
$logged_in = TRUE;
$user = "Admin";
$banner = ($logged_in==TRUE)?"Welcome back, $user!":"Please login.";

echo "$banner";
?>