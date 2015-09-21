<?php

/**
 * Created by PhpStorm.
 * User: User
 * Date: 21.09.2015
 * Time: 11:13
 */
namespace MagicMethods\CloneExample;


class CloneExample
{
    public static function simulate()
    {
        $addressA = new Address();
        $addressA->setCity('Amsterdam');

       // $addressB = new Address();
       // $addressB->setCity('Berlin');

        $user = new User();
        $user->setName('Jan');
        $user->setSurname('Kowalski');
        $user->setAddress($addressA);

        $userB = clone $user;
        //$userB->setAddress($addressB);


        var_dump($user);
        var_dump($userB);

        die;
    }
}

class Address
{
    private $city;

    static $instances = 0;

    public $instance;


    public function __construct()
    {
        $this->instance = ++self::$instances;
    }


    public function __clone()
    {
        $this->instance = ++self::$instances;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return mixed
     */
    public function getInstance()
    {
        return $this->instance;
    }

}

class User
{
    private $name;
    private $surname;
    private $address;

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

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress(Address $address)
    {
        $this->address = $address;
    }

    /**
     *
     */
    public function __clone()
    {
        // Force a copy of this->object, otherwise
        // it will point to same object.
        $this->address = clone $this->address;
    }

}
