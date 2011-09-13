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
    function Eat(){

        echo "Chomp chomp.";
    }
    function Meow(){

        echo "Meow.";
    }
}

class Domestic_Cat extends Cat {
    // Constructor
    function Domestic_Cat() {
    }

    // Eat like a Domestic_Cat
    function eat() {
        parent::eat();
        // After we're finished eating, let's meow
        $this->meow();
    }
}
?>