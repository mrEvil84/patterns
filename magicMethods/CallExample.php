<?php

/**
 * Created by PhpStorm.
 * User: User
 * Date: 21.09.2015
 * Time: 11:13
 */
namespace MagicMethods\CallExample;


class CallExample
{
    public static function simulate()
    {
        $user = new User();
        $user->setName('Jan');
        $user->setSurname('Kowalski2');

        $user->setAge(21,12,12);

        User::setAges(1,2,3,4);



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

    public function __call($name, array $args)
    {
        echo "Calling method '$name' "
            . implode(', ', $args). "\n";
    }

    public static function __callStatic($name, array $args)
    {
        echo "Calling static method '$name' "
            . implode(', ', $args). "\n";
    }


}
