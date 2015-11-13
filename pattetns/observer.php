<?php
namespace Patterns\Observer;

/**
 * @package Patterns\Observer
 * @description: przydaje sie gdy modyfikacja jednych danych wplywa na inne, np dodajac newsa trzeba wyslac newsletter, powiadomic rss itd..
 */

interface observer
{
    public function update();
}

class CacheObserver implements observer {
    public function update() {
        var_dump(' Cache Refreshing ... ');
    }
}

class RSSObserver implements observer {
    public function update() {
        var_dump('RSS Update... ');
    }
}

class News {
    private $title, $content, $_observers;

    public function setTitle($title) {
        $this->title= $title;
    }
    public function setContent($content) {
        $this->content= $content;
    }

    /**
     * Dodaje obserwator do listy
     */
    public function addObserver(observer $observer) {
        $this->_observers[]= $observer;
    }

    /**
     * Powiadamia wszystkich obserwatorów
     */
    private function notify() {
        foreach ($this->_observers as $observer) $observer->update();
    }

    public function add() {
        var_dump('Dodanie newsa :');

        $this->notify(); #powiadamia obserwatorów
    }

}


class Simulate
{
    public static function execute()
    {
        $news= new News();

        $news->addObserver(new RSSObserver()); #dodajemy obserwator
        $news->addObserver(new CacheObserver()); #dodajemy obserwator

        $news->setTitle('Tytu? newsa');
        $news->setContent('Tre?? newsa');
        $news->add();
    }
}
