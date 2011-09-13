<?php
// Capitalize a string
function capitalize( $str )
{
  // First, convert all characters to lowercase
  $str = strtolower($str);
  // Second, convert the first character to uppercase
  $str{0} = strtoupper($str{0});  //$str{0} accesses the first character in the string
  echo $str;
}
capitalize("hEllo WoRld!");

?>