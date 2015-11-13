<?php
namespace Patterns\Adapter;

/**
 * @package Patterns\Decorator
 * @description: adaptuje klase ktora ma inny interfejs niz my potrzebujemy ale ma interesujace funcje
 */

interface Model {
    public function get($limit, $offset);
}

class News {
    public function pobierz($limit, $offset) {
        var_dump('pobieranie danych - ' . $limit . ' offset ' . $offset);
    }
}

class NewsAdapter implements Model {
    private $_adaptedObject;
    public function __construct() {
        $this->_adaptedObject= new News();
    }

    public function get($limit, $offset) {
        return $this->_adaptedObject->pobierz($limit, $offset);
    }
}

class Simulate
{
    public static function execute()
    {

       $newsAdapter = new NewsAdapter();
       $newsAdapter->get('10','2');

    }
}
