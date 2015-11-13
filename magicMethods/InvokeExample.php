<?php

/**
 * Created by PhpStorm.
 * User: User
 * Date: 21.09.2015
 * Time: 11:13
 */
namespace MagicMethods\InvokeExample;


class InvokeExample
{
    public static function simulate()
    {
        $user = new User();
        $user->setName('Jan');
        $user->setSurname('Kowalski');

        //$user();

        echo $user();
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
     * Use object as a function
     * Since 5.3 is called in any string context , obj to string
     * @return string
     */
    public function __invoke()
    {
        var_dump('_invoke()');
        var_dump($this);
    }

}
