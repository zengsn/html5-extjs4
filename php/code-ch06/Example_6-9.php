<?php
$shapes = array('Sodacan' => 'Cylinder',
                'Notepad' => 'Rectangle',
                'Apple' => 'Sphere',
                'Orange' => 'Sphere',
                'Phonebook' => 'Rectangle');

extract($shapes);
// $Sodacan, $Notepad, $Apple, $Orange, and $Phonebook are now set
echo $Apple;
echo "<br />";
echo $Notepad;
?>