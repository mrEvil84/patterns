<?php

/**
 * Created by PhpStorm.
 * User: User
 * Date: 21.09.2015
 * Time: 11:13
 */
namespace MagicMethods\SleepExample;


class SleepExample
{
    public static function simulate()
    {
        $user = new User();
        $user->setName('Jan');
        $user->setSurname('Kowalski');

        $serializedUser = serialize($user);
        var_dump($serializedUser);

        $user = unserialize($serializedUser);
        var_dump($user);


        die;
    }
}

class User
{
    private $name;
    private $surname;

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
     * You can chose wchich properties shoud be serialized , here you can also clean object , this fun is fire before serialize()
     * @return array
     */
    public function __sleep()
    {
        return array('name', 'surname');
    }

    /**
     * Function is used intentially to reestablish database connection
     */
    public function  __wakeup()
    {
        echo 'Wakeup function!';
    }

}
