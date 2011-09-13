<?php
function capitalize( &$str, $each=TRUE )
{   // First, convert all characters to lowercase
   $str = strtolower($str);
   if ($each === true) {
      $str = ucwords($str);
   } else {
      $str{0} = strtoupper($str{0});
   }
}
$str = "hEllo WoRld!";
capitalize( $str );
echo $str;
?>