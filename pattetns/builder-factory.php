<?php
namespace Patterns\BuilderFactory;

interface ILog
{
    public function doLog($message);
}

class DbLog implements ILog
{
    public function doLog($message) {
        echo $message;
    }

}

class Log
{
    public static function load()
    {
        return new DbLog();
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
