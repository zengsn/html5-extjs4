<?php
// Capitalize a string or only the first letter of each word
function capitalize( $str, $each=TRUE ) {

  // First, convert all characters to lowercase or non-first-word letters may remain
capitalized
  $str = strtolower($str);
  if ($each === TRUE) {
     $str = ucwords ($str);
  } else {
     $str = strtoupper($str);

  }
  echo ("$str <br />");
}
capitalize("hEllo WoRld!");
echo ("Now do the same with the echo parameter set to FALSE.<br>");
capitalize("hEllo WoRld!",FALSE);
?>