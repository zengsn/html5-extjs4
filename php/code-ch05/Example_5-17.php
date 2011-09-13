<?php
class Cat {
    // How old the cat is
    var $age;

    function Cat($new_age){

        // Set the age of this cat to the new age
        $this->age = $new_age;
    }
    function Birthday(){

        $this->age++;
    }
}
class Domestic_Cat extends Cat {
    // Constructor
    function Domestic_Cat() {
    }

    // Sleep like a domestic cat
    function sleep() {
        echo("Zzzzzz.<br />");
    }
}
$fluffy=new Domestic_Cat();
$fluffy->Birthday();
$fluffy->sleep();
echo "Age is $fluffy->age <br />";
?>