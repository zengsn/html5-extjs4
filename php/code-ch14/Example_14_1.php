<?php
if (!isset($_COOKIE['username']))
{
    echo ("Oops, the cookie isn't set!");
}
else
{
    echo ("The stored username is ". $_COOKIE['username'] . ".");
}
?>