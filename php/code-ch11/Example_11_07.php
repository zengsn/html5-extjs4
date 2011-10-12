<?php
$options = array('option 1', 'option 2', 'option 3');

//Coming from a checkbox or a multiple select statement
$valid = true;
if (is_array($_GET['input'])) {
    $valid = true;
    foreach($_GET['input'] as $input) {
        if (!in_array($input, $options)) {
            $valid = false;
        }
    }
    if ($valid) {
        //process input
    }
}
?>