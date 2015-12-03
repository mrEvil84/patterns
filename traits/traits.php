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

// konflikty nazewnictwa

trait A {

    public function smallTalk() {
        echo 'a';
    }

    public function bigTalk() {
        echo 'A';
    }
}

trait B {

    public function smallTalk() {
        echo 'b';
    }

    public function bigTalk() {
        echo 'B';
    }
}

class Talker
{
    use A, B {
        B::smallTalk insteadof A;
        A::bigTalk insteadof B;
        B::bigTalk as bBigtalk; //alias , mozna korzystac z metody z B
    }
}

// zmiana typu widocznosci
trait SecretTrait
{
    private function hello($name) {
        echo 'Hello ' . $name . ' !';
    }
}

class UseSecretWelcome
{
    use SecretTrait {
        hello as public;
    }
}

// definiowanie wlasciwosci ktore maja byc widoczne w klasie
trait SharedProperties
{
    public $quota = 100;
    private $connection = 'connection';

    private function getConn() {
        return $this->connection;
    }
}

class ShowSharedProps
{
    use SharedProperties {
        getConn as public;
    }

}

// definiowanie w traitach metod abstrakcyjnych zeby wymuszac ich deklarowanie w klasach

trait Common
{
    abstract public function getName();

}

class Bar
{
    private $name = 'Bar';

    use Common;

    public function getName()
    {
        return $this->name;
    }
}

// definiowanie zmiennych statycznych w metodzie w trait
trait Counter
{

    public function inc() {
        static $count = 0; //weird
        $count = $count + 1;
        return $count;
    }
}

class CounterUse
{
    use Counter;
}

// uzycie zmiennych statycznych klasowych i tych z trait

trait StaticExample
{
    public static $bar;
}

class Foo1 {
    use StaticExample;
}

class Foo2 {
    use StaticExample;
}

class TestStaticClass {
    public static $bar;
}


class Foo3 extends TestStaticClass {}
class Foo4 extends TestStaticClass {}

// stala magiczna __TRAIT__

trait ShowMagic
{
    public function showTraitName()
    {
        echo __TRAIT__;
    }
}

class UseShowMagic
{
    use ShowMagic;
}

//ciekawostki

//- dzia?aj? z mechanizmem przestrzeni nazwach
//- nie mog? mie? tej samej nazwy co klasa, powoduje to wygenerowanie fatala



class Simulate
{
    public static function execute()
    {
        //$traitsExample = new TraitsExample();
        //$traitsExample->geetingFromGdansk();
        //$traitsExample->geetingFromBerlin();

        // test of priority methods from traits and classes
        /*
        $test = new MyClassForTraitTesting();
        $test->hello();

        $test2 = new MyClassForTraitTestingChild();
        $test2->hello();
        $test2->city('Goldap');
        */

        // konflikty nazewnictwa
        /*
        $talker = new Talker();
        $talker->bigTalk();
        $talker->smallTalk();
        $talker->bBigtalk();
        */

        // zmiana trybu widocznosci
        /*
        $useSecretWelcome = new UseSecretWelcome();
        $useSecretWelcome->hello('Secret Welcome');
        */

        // uzycie zmiennych z trait
        /*
        $showSharedProps = new ShowSharedProps();
        echo 'Quota = ' . $showSharedProps->quota;
        echo 'Conn = ' . $showSharedProps->getConn();
        */


        // metody abstrakcyjne deklarowane w trait wymuszaja ich implementacje w klasie uzywajacjej trait
        /*
        $bar = new Bar();
        echo ' name : ' . $bar->getName();
        */

        // uzycie zmiennej statycznej zdef. w trait
        /*
        $counterUse = new CounterUse();
        echo 'Count ' . $counterUse->inc() . '<br/>';
        echo 'Count ' . $counterUse->inc() . '<br/>';
        echo 'Count ' . $counterUse->inc() . '<br/>';
        echo 'Count ' . $counterUse->inc() . '<br/>';
        echo 'Count ' . $counterUse->inc() . '<br/>';
        */

        // uzycie zmiennej statycznej zdef przez trait
        /*
        Foo1::$bar = 'Hello';
        Foo2::$bar = 'World';
        echo Foo1::$bar . ' ' . Foo2::$bar . '<br/>';

        Foo3::$bar = 'Hello';
        Foo4::$bar = 'World';

        echo Foo3::$bar . ' ' . Foo4::$bar . '<br/>';
        */

        // stala magiczna __TRAIT__ zwraca nazwe cechy
        /*
        $useShowMagic = new UseShowMagic();
        $useShowMagic->showTraitName();
        */














    }
}