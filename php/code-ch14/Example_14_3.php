<?php
//Remember that setcookie must come before any other line that generates output
setcookie("username","", time(  )-10 );
echo 'Rosebud.';
?>