<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 02.12.2015
 * Time: 11:55
 */
namespace Traits\TraitsExample;

trait Hello
{
    public function Hello()
    {
        return 'Hello!';
    }
}

trait City
{
    public function City($name)
    {
        return $name;
    }
}

trait Greeting
{
    use Hello, City;

    public function geetingFromGdansk() {
        echo $this->Hello() . ' ' . $this->City('Gdansk');
    }

    public function geetingFromBerlin() {
        echo $this->Hello() . ' ' . $this->City('Berlin');
    }
}

trait MyTrait
{
    public function hello() {
        echo 'hello function in MyTrait!';
    }

    public function city($name) {
        parent::city($name);
        echo 'Trait city : ' . $name;
    }
}

class MyClassForTraitTesting
{
    use MyTrait;

    // metoda klasy o tej samej nazwie co w trait jest wazniejsza od metody zdefiniowanej w trait
    public function hello() {
        echo 'hello function in MyClassForTraitTesting';
    }

    public function city($name) {
        echo 'Class city : ' . $name;
    }
}

class MyClassForTraitTestingChild extends MyClassForTraitTesting
{
    // metoda wstrzyknieta w child nadpisuje metode odziedziczona po rodzicu
  use MyTrait;
}





class TraitsExample
{
    use Greeting;

}

class Simulate
{
    public static function execute()
    {
        //$traitsExample = new TraitsExample();
        //$traitsExample->geetingFromGdansk();
        //$traitsExample->geetingFromBerlin();

        // test of priority methods from traits and classes
        $test = new MyClassForTraitTesting();
        $test->hello();

        $test2 = new MyClassForTraitTestingChild();
        $test2->hello();
        $test2->city('Goldap');


    }
}