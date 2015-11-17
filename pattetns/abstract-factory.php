<?php
namespace Patterns\AbstractFactory;

/**
 * Interface Product
 * @package Patterns\AbstractFactory
 * @description uzywana do construkcji podobnych obiektow np. zarzadzanie typem polaczenia z baza danych lub np system pluginow
 */
interface Product
{
    public function getName();
}

class MysqliConnection implements Product
{
    public function getName() {
        return 'mysqli conn';
    }
}

class PdoConnection implements Product
{
    public function getName()
    {
        return 'pdo conn';
    }
}

/**
 * Interface Creator
 * @package Patterns\AbstractFactory
 * @description definiuje sposob wytwarzania zasobow
 */
interface Creator
{
    public function create($type);
}

class ConnectionCreator implements Creator
{
    public function create($type)
    {
        switch($type) {
            case 'mysqli': return new MysqliConnection(); break;
            case 'pdo': return new PdoConnection(); break;
            default: return new MysqliConnection();
        }
    }
}


class Simulate
{
    public static function execute()
    {
        $connectionPreparator = new ConnectionCreator();

        $connectionMysqli = $connectionPreparator->create('mysqli');
        $connectionPdo = $connectionPreparator->create('pdo');

        var_dump($connectionMysqli->getName());
        var_dump($connectionPdo->getName());

    }
}
