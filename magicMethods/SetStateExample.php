<?php

/**
 * Created by PhpStorm.
 * User: User
 * Date: 21.09.2015
 * Time: 11:13
 */
namespace MagicMethods\SetStateExample;


class SetStateExample
{
    public static function simulate()
    {
        $user = new User();
        $user->setName('Jan');
        $user->setSurname('Kowalski2');

        $test = var_export($user, true);
        var_dump($test);

        eval('$b=' . var_export($user, true) . ';');
        var_dump($b);

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
     * Since 5.1, called for classes exported by var_exeport();
     */
    public static function __set_state($data)
    {
        $obj = new User;
        $obj->setName($data['name'] . '-test');
        $obj->setSurname($data['surname']. '-test');
        return $obj;
    }

}
