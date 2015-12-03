<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 03.12.2015
 * Time: 14:45
 */

// 1. traits

namespace Traits\php54;


// 2. tablice
class CollectionExample {
    // inna skladnia
    public $options = [1,2,3,4];

    //bezposrednie odwolanie sie do zwracanej tablicy
    public function getOptions()
    {
        return $this->options;
    }

    public static function greetings()
    {
        echo 'Hello world !';
    }

}

// interfejs JSONSerializable , mozna wymusic reprezentacje obiektu w postaci json
class myClass implements \JsonSerializable {
    private $data, $multiplier;
    public function __construct($a, $b) {
        $this->data = $a;
        $this->multiplier = $b;
    }

    public function jsonSerialize() {
        return array_fill(0, $this->multiplier, $this->data);
    }
}





class Simulate
{
    public static function execute()
    {
        // nowe wywolanie funkcji z klasy (new CollectionExample())->getOptions()
        /*
        echo 'Option 2 is : ' . (new CollectionExample())->getOptions()[2];
        */

        // nowa skladnia expr
        /*
        $test = new CollectionExample();
        echo 'Option 1 is ' .$test->{'getOptions'}()[1];
        */

        // wywolywanie zmiennych statycznych z expr
        /*
        CollectionExample::{'greetings'}();
        */

        // short tags <?= ... bedzie dzialac zawsze niezaleznie od ustawionej flagi w php

        // json serialization
        echo json_encode(new myClass(123, 3));
    }
}

