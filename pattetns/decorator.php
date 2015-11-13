<?php
namespace Patterns\Decorator;

/**
 * @package Patterns\Decorator
 * @description: rozszerza funkcjonalnosci klasy bez modyfikacji jej struktury, dzialanie opiera sie o wspolny interfejs
 * po to zeby klasa korzystajaca nie odczula zmiany ze korzysta z innego obiektu tzn. z udekorowanego
 */
interface Service
{
    public function doAction($actionName, $actionParams);
}

class News implements Service
{
    public function doAction($actionName, $actionParams)
    {
        var_dump('News:doAction ');
        var_dump('Action name: ' . $actionName);
        var_dump($actionParams);
    }
}

class ServiceDecorator implements Service
{
    private $decoratedService;

    public function __construct($service)
    {
        $this->decoratedService = $service;
    }

    public function addToStats()
    {
        var_dump('Add to stats');
    }

    public function doAction($actionName, $actionParams)
    {
        $this->addToStats();
        $this->decoratedService->doAction($actionName, $actionParams);
    }
}

class Controller
{
    private $service;

    public function __construct($actionName, $actionParams)
    {


//        $this->service = new News();
        $this->service = new ServiceDecorator(new News());  // tylko jedna linijka sie zmienila
        $this->service->doAction($actionName, $actionParams);


    }



}



class Simulate
{
    public static function execute()
    {

        $controller = new Controller('DodajNewsa','parametry');

    }
}
