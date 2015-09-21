<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 26.08.2015
 * Time: 10:21
 */
include 'pattetns/builder-factory.php';
include 'magicMethods/SleepExample.php';
include 'magicMethods/ToStringExample.php';
include 'magicMethods/InvokeExample.php';
include 'magicMethods/SetStateExample.php';
include 'magicMethods/DebugInfoExample.php';
include 'magicMethods/CloneExample.php';
include 'magicMethods/IssetExample.php';
include 'magicMethods/CallExample.php';

//use Patterns\BuilderFactory as BuilderFactory;
//use MagicMethods\SleepExample as SleepExample;
//use MagicMethods\SleepExample as ToStringExample;
//use MagicMethods\SleepExample as InvokeExample;
//use MagicMethods\SleepExample as SetStateExample;
//use MagicMethods\DebugInfoExample as DebugInfoExample;
//use MagicMethods\CloneExample as CloneExample;
//use MagicMethods\IssetExample as IssetExample;
use MagicMethods\CallExample as CallExample;


//echo BuilderFactory\Simulate::execute() . '<br/>';
//MagicMethods\SleepExample\SleepExample::simulate();
//MagicMethods\ToStringExample\ToStringExample::simulate();
//MagicMethods\InvokeExample\InvokeExample::simulate();
//MagicMethods\SetStateExample\SetStateExample::simulate();
//MagicMethods\DebugInfoExample\DebugInfoExample::simulate();
//MagicMethods\CloneExample\CloneExample::simulate();
//MagicMethods\IssetExample\IssetExample::simulate();

MagicMethods\CallExample\CallExample::simulate();