<?php

$counter=-3;

for (;$counter<10;$counter++){
    //check for division by zero
    if ($counter==0){
        echo "Skipping to avoid division by zero.<br>";
        continue;
    }

    echo "100/$counter ",100/$counter,"<br />";
}

?>