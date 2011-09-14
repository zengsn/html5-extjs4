<?php
$shapes = array('Soda can' => 'Cylinder',
                'Notepad' => 'Rectangle',
                'Apple' => 'Sphere',
                'Orange' => 'Sphere',
                'Phonebook' => 'Rectangle');
foreach ($shapes as $key => $value) {  // every associative array has $key and $value pairs
    print "The $key is a $value.<br />";
}
?>