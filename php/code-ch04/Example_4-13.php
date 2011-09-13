<?php
switch ($action):
    case "ADD":
       echo "Perform actions for adding.";
       break;
    case "MODIFY":
       echo "Perform actions for modifying.";
       break;
    case "DELETE":
       echo "Perform actions for deleting.";
       break;
    default:
       echo "Error: Action must be either ADD, MODIFY, or DELETE.";
endswitch;
?>