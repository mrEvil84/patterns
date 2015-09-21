<?php
namespace Patterns\Facade;

/**
 * @package Patterns\Facade
 * @description: You need facade when you want do things one oafter another , eg. is planning weeding : you ( client )  use planner ( facade )
 * to be shure that everything is done and some is not ommited
 */

class ProductOrder
{
    private $productId;

    public function __construct($productId)
    {
        $this->productId = $productId;
    }

    public function generateOrder()
    {

    }

    private function qtyCheck()
    {

    }
}




class Simulate
{
    public static function execute()
    {
        $log = Log::load();
        $log->doLog('Aplikacja uruchomiona-test builder-factory');
    }
}
