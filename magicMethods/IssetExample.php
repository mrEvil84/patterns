<?php

/**
 * Created by PhpStorm.
 * User: User
 * Date: 21.09.2015
 * Time: 11:13
 */
namespace MagicMethods\IssetExample;

/**
 * Examples of overloading in PHP - manage dynamically properties in class
 *  __set() - is run when writing data to inaccessible properties
 *  __get() - is utilized for reading data from inaccessible properties
 *  __isset() -  is triggered by calling isset() or empty() on inaccessible properties.
 *  __unset() - is invoked when unset() is used on inaccessible properties
 *
 *
 * Class IssetExample
 * @package MagicMethods\IssetExample
 */
class IssetExample
{
    public static function simulate()
    {
        $user = new User();
        $user->setName('Jan');
        $user->setSurname('Kowalski2');

        $user->age = 31;
        //var_dump($user->age);


        //var_dump($user);

        //var_dump(isset($user->age));

        //if (isset($user->age)) {
        //   unset($user->age);
        //}
        //var_dump($user);

        die;



    }
}


class User
{
    private $name;
    private $surname;
    private $overloadedData = [];


    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * @param mixed $surname
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;
    }

    // Overloading in PHP provides means to dynamically "create" properties and methods.

    public function __set($name, $value)
    {
        $this->overloadedData[$name] = $value;
    }

    public function __get($name)
    {
        if(array_key_exists($name, $this->overloadedData)) {
            return $this->overloadedData[$name];
        }
    }

    public function __isset($name)
    {
        echo 'isset check ---' . $name . '<br/>';

        return isset($this->overloadedData[$name]);
    }

    public function __unset($name) {
        echo 'unsetting : ' . $name . '<br/>';
        unset($this->overloadedData[$name]);
    }


}
