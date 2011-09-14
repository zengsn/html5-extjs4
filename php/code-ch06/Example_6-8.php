<?php
foreach ($objects as $obj_key => $obj)
{
    echo "$obj_key:<br>";
    while (list ($key,$value)=each ($obj))
    {
        echo "$key = $value ";
    }
    echo "<br />";
}
?>
