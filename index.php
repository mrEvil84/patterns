<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 26.08.2015
 * Time: 10:21
 */
include 'pattetns/builder-factory.php';
include 'pattetns/abstract-factory.php';
include 'pattetns/strategy.php';
include 'pattetns/observer.php';
include 'pattetns/decorator.php';
include 'pattetns/adapter.php';
include 'magicMethods/SleepExample.php';
include 'magicMethods/ToStringExample.php';
include 'magicMethods/InvokeExample.php';
include 'magicMethods/SetStateExample.php';
include 'magicMethods/DebugInfoExample.php';
include 'magicMethods/CloneExample.php';
include 'magicMethods/IssetExample.php';
include 'magicMethods/CallExample.php';
include 'traits/traits.php';

//use Patterns\BuilderFactory as BuilderFactory;
//use Patterns\Observer as Observer;
//use Patterns\Decorator as Decorator;
//use Patterns\Adapter as Adapter;
//use Patterns\AbstractFactory as AbstractFactory;
//use Patterns\Strategy as Strategy;
//use MagicMethods\SleepExample as SleepExample;
//use MagicMethods\SleepExample as ToStringExample;
//use MagicMethods\SleepExample as InvokeExample;
//use MagicMethods\SleepExample as SetStateExample;
//use MagicMethods\DebugInfoExample as DebugInfoExample;
//use MagicMethods\CloneExample as CloneExample;
//use MagicMethods\IssetExample as IssetExample;
//use MagicMethods\CallExample as CallExample;
use Traits\TraitExample;

//echo BuilderFactory\Simulate::execute() . '<br/>';
//echo Observer\Simulate::execute() . '<br/>';
//echo Decorator\Simulate::execute() . '<br/>';
//echo Adapter\Simulate::execute() . '<br/>';
//echo AbstractFactory\Simulate::execute() . '<br/>';
//echo Strategy\Simulate::execute() . '<br/>';
//MagicMethods\SleepExample\SleepExample::simulate();
//MagicMethods\ToStringExample\ToStringExample::simulate();
//MagicMethods\InvokeExample\InvokeExample::simulate();
//MagicMethods\SetStateExample\SetStateExample::simulate();
//MagicMethods\DebugInfoExample\DebugInfoExample::simulate();
//MagicMethods\CloneExample\CloneExample::simulate();
//MagicMethods\IssetExample\IssetExample::simulate();
//MagicMethods\CallExample\CallExample::simulate();
echo Traits\TraitsExample\Simulate::execute();