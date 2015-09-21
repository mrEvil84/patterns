<?php

/**
 * Created by PhpStorm.
 * User: User
 * Date: 21.09.2015
 * Time: 11:13
 */
namespace MagicMethods\DebugInfoExample;


class DebugInfoExample
{
    public static function simulate()
    {
        $user = new User();
        $user->setName('Jan');
        $user->setSurname('Kowalski');

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
     * Since 5.6, called for classes exported by var_exeport();
     */
    public function __debugInfo()
    {
        return [
            'name' => $this->name.'xxxx',
        ];
    }

}
