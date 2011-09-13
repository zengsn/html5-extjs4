<?php
$some_variable = "Hello World!";
$some_reference = &$some_variable;
$some_reference = "Guten Tag World!";
echo $some_variable;
echo $some_reference;
?>