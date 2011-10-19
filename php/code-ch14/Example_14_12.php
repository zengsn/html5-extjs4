<?php
session_start(  );
$_SESSION['hello'] = 'Hello World';
echo $_SESSION['hello'];
?>