<?php

$counter = ?3;

for (; $counter < 10; $counter++){
    // Check for division by zero
    if ($counter == 0){
        echo "Stopping to avoid division by zero.";
        break;
    }

    echo "100/$counter<br />";
}

?>