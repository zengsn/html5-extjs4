<?php
$shapes = array("rectangle", "cylinder", "sphere");
sort($shapes);
//The foreach loop selects each element from the array and assigns its value to $key
//before executing the code in the block.
foreach ($shapes as $key => $val) {
    echo "shapes[" . $key . "] = " . $val . "<br />";
}
?>