<?php
$options = array('option 1', 'option 2', 'option 3');

// Coming from a radio button or single select statement
if (in_array($_GET['input'], $options)) {
    echo "Valid";
} else
{
    echo "Not Valid";
} 
?>