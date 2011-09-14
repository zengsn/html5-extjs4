<?php
$Apple="Computer";
$shapes=array('SodaCan' => 'Cylinder',
              'NotePad' => 'Rectangle',
              'Apple' => 'Sphere',
              'Orange' => 'Sphere',
              'PhoneBook' => 'Rectangle');

extract($shapes,EXTR_PREFIX_ALL,"shapes");
//$shapes_SodaCan, $shapes_NotePad, $shapes_Apple, $shapes_Orange, and
//$shapes_PhoneBook are now set

echo "Apple is $Apple.<br />";
echo "Shapes_Apple is $shapes_Apple";
echo "<br />";
echo "Shapes_NotePad is $shapes_NotePad";
?>